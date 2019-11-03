import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, FormArray } from '@angular/forms';

@Component({
  selector: 'app-create-article',
  templateUrl: './create-article.component.html',
  styleUrls: ['./create-article.component.scss'],
})
export class CreateArticleComponent implements OnInit {

  public form: FormGroup;

  photoArr: { title: string, caption: string, description: string, file: File, url: string; }[];

  constructor(private formBuilder: FormBuilder) {
    this.form = this.formBuilder.group({
      text_input: ['', Validators.required],
      photos: this.formBuilder.array([])
    });
  }

  // We will create multiple form controls inside defined form controls photos.
  /*   createItem(data): FormGroup {
      return this.formBuilder.group(data);
    } */

  createItem(item) {
    this.photos.push(this.formBuilder.group(item));
    // console.log(this.photos.controls[0].value.url);
    this.photoArr.push(item);
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
            title: ['', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
            caption: ['', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],
            description: ['', { validators: [Validators.required, Validators.minLength(2)], updateOn: 'blur' }],

          });
        };
        reader.readAsDataURL(file);

      }
    }
  }

  ngOnInit() {
    this.photoArr = [];
  }

}
