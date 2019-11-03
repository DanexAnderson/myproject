import { Component } from '@angular/core';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  public appPages = [
    {
      title: 'Home',
      url: '/home',
      icon: 'home'
    },
    {
      title: 'JS Questions',
      url: '/jsquestion',
      icon: 'list'
    }
    ,
    {
      title: 'Single',
      url: '/single',
      icon: 'images'
    },
    {
      title: 'Login',
      url: '/login',
      icon: 'unlock'
    }
    ,
    {
      title: 'Posts',
      url: '/posts',
      icon: 'mail'
    }
    ,
    {
      title: 'Create Aritcle',
      url: '/create-article',
      icon: 'list-box'
    }
    ,
    {
      title: 'Create Post',
      url: '/create-post',
      icon: 'create'
    }
  ];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }
}
