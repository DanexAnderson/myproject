import { Component, OnInit } from '@angular/core';
import {Validators, FormBuilder, FormGroup, FormControl} from '@angular/forms';
import {Router} from '@angular/router';
import {LoadingController} from '@ionic/angular';
import {AuthService} from '../auth.service';
import {DataService} from '../../post/data.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;
  errorMessage: string;
  constructor(
      public formBuilder: FormBuilder,
      public loadingController: LoadingController,
      public authService: AuthService,
      public dataService: DataService,
      private router: Router) {
  }
  ngOnInit() {
      this.loginForm = this.formBuilder.group({
          username: new FormControl('', Validators.compose([
              Validators.required
          ])),
          password: new FormControl('', Validators.required)
      });
  }
  async login(value) {
      const loading = await this.loadingController.create({
          duration: 5000,
          message: 'Please wait...'
      });
      loading.present();
      this.authService.doLogin(value.username, value.password)
          .subscribe(res => {
                  this.authService.setUser(res);
                  // Reset the post items so that next time, they are completely
                  // reloaded for the newly authenticated user...
                  this.dataService.items = [];
                  loading.dismiss();
                 // this.router.navigateByUrl('home');
                  this.router.navigateByUrl('posts');
              },
              err => {
                  this.errorMessage = 'Invalid credentials.';
                  loading.dismiss();
                  console.log(err);
              });
  }


}
