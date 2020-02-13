import { Component, OnInit, EventEmitter } from '@angular/core';
import { FormGroup, FormBuilder, Validators, FormArray } from '@angular/forms';
import { DataService } from '../data.service';


@Component({
  selector: 'app-create-article',
  templateUrl: './create-article.component.html',
  styleUrls: ['./create-article.component.scss'],
})
export class CreateArticleComponent implements OnInit {

  public form: FormGroup;

  // photoArr: { title: string, caption: string, description: string, file: File, url: string; }[];
  private mode = 'create';
  isloading = false;


  constructor(private formBuilder: FormBuilder, private dataService: DataService) {
    this.form = this.formBuilder.group({
      // text_input: ['', Validators.required],
      content: ['Content Test', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
      atitle: ['ATitle Test', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
      photos: this.formBuilder.array([])
    });
  }


  onPost() {


    if (this.form.invalid) { return; }

    this.isloading = true;

    if (this.mode === 'create') {

      this.dataService.createPostMulti(this.photos.controls, this.form.value);

    } else {
      return;
    }


    // this.form.reset(); // Remove post data from form fields

    this.isloading = false;

  }


  createItem(item) {
    this.photos.push(this.formBuilder.group(item));
    // console.log(this.photos.controls[0]);
    //  this.photoArr.push(item);
  }
  removeItem() {
    // this.photoArr.pop();
    // this.photos.removeAt(this.photos.length - 1);
  }

  // Help to get all photos controls as form array.
  get photos(): FormArray {
    return this.form.get('photos') as FormArray;
  }

  detectFiles(event) {
    const files = event.target.files;

    if (files) {
      for (const file of files) {
        const reader = new FileReader();
        reader.onload = (e: any) => {
          this.createItem({
            file,
            // url: e.target.result
            url: reader.result,
            title: ['Title Test', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
            //  caption: ['Caption Test', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
            description: ['Description Test', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],

          });
        };
        reader.readAsDataURL(file);

      }
    }
  }


  ngOnInit() {
    // this.photoArr = [];
  }

}
