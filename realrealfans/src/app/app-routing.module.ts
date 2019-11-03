import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { SingleComponent } from './tech/single/single.component';
import { LoginComponent } from './auth/login/login.component';
import { PostComponent } from './post/post/post.component';
import { CreatePostComponent } from './post/create-post/create-post.component';
import { CreateArticleComponent } from './post/create-article/create-article.component';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'posts',
    pathMatch: 'full'
  },
  {
    path: 'single',
    component: SingleComponent
  },
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'posts',
    component: PostComponent
  },
  {
    path: 'create-post',
    component: CreatePostComponent
  },
  {
    path: 'create-article',
    component: CreateArticleComponent
  },
  /*   {
      path: '',
      redirectTo: 'home',
      pathMatch: 'full'
    }, */
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then(m => m.HomePageModule)
  },
  {
    path: 'jsquestion',
    loadChildren: () => import('./list/list.module').then(m => m.ListPageModule)

  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
