import { NgForm, FormGroup, FormControl, Validators } from '@angular/forms';
import { DataService } from '../data.service';
import { mimeType } from './mine-type.validator';
import { Component, OnInit, EventEmitter, Output, OnDestroy } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { AuthService } from 'src/app/auth/auth.service';

import { Subscription } from 'rxjs';

@Component({
  selector: 'app-create-post',
  templateUrl: './create-post.component.html',
  styleUrls: ['./create-post.component.scss'],
})
export class CreatePostComponent implements OnInit, OnDestroy  {

  constructor(private dataService: DataService, public route: ActivatedRoute, private authService: AuthService) { }

title = '';
caption = '';
descript = '';
content = '';
post: any;
private mode = 'create'; // mode has to be Private
postId = null;
isloading = false;
form: FormGroup;
imagePrev: any;
// private authStatusSubs: Subscription;


onPost() {

  if (this.form.invalid ) { return; }

  this.isloading = true;

  const formData = {

    title: this.form.value.title,
    caption: this.form.value.caption,
    description: this.form.value.description,
    content: this.form.value.content,
    image: this.form.value.image,
    status: 'publish'
    };

  if (this.mode === 'create') {

    this.dataService.createPost(formData);

  } else {
    return;
  }
 // this.form.reset(); // Remove post data from form fields

  this.isloading = false;
}

onImagePicked(event: Event) {

  const file = (event.target as HTMLInputElement).files[0];
  this.form.patchValue({image: file});
  this.form.get('image').updateValueAndValidity();
  const reader = new FileReader();
  reader.onload = () => {
    this.imagePrev = reader.result;
  };
  reader.readAsDataURL(file);

  // console.log(this.form.value.image);
}



ngOnInit() {

/*   this.authStatusSubs = this.authService.getAuthStatus().subscribe(
    authStatus => {
      this.isloading = false;
    }); */
  this.form = new FormGroup({
    title: new FormControl
    ('title', {validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur'}),
    content: new FormControl
    ('content', {validators: [Validators.required, Validators.minLength(2)]}),
    caption: new FormControl
    ('caption', {validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur'}),
    description: new FormControl
    ('description', {validators: [Validators.required, Validators.minLength(2)]}),
    image: new FormControl
    (null, {validators: [Validators.required], asyncValidators: [mimeType]})
  });

/*   this.route.paramMap.subscribe((paramMap: ParamMap) => { // event ParamMap
    if (paramMap.has('postId')) { // Check if URL parameter exist with Id
      this.mode = 'edit';
      this.postId = paramMap.get('postId'); // Get URL parameter
      this.isloading = true;
      this.postService.getPostData(this.postId).subscribe(postData => {
        this.isloading = false;
        this.post = {
          id: postData._id,
           title: postData.title,
           content: postData.content,
            imagePath: postData.imagePath,
            creator: postData.creator
           };

        this.form.setValue({
        title: this.post.title,
          content: this.post.content,
          image: this.post.imagePath});
      });
    } else {this.mode = 'create'; this.postId = null; }
  }); */
}

ngOnDestroy() {
 // this.authStatusSubs.unsubscribe();
}


}
































/*

private base64textString = '';

handleFileSelect(evt) {
  const files = evt.target.files;
  const file = files[0];

  if (files && file) {
    const reader = new FileReader();

    reader.onload = this._handleReaderLoaded.bind(this);

    reader.readAsBinaryString(file);
}
}

_handleReaderLoaded(readerEvt) {
  const binaryString = readerEvt.target.result;
  this.base64textString = btoa(binaryString);
  // console.log(btoa(binaryString));
 }





 */
