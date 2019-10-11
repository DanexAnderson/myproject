import { Component, OnInit, Input, ViewChild, ElementRef } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DataService } from '../../post/data.service';
import { environment } from 'src/environments/environment';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-single',
  templateUrl: './single.component.html',
  styleUrls: ['./single.component.scss'],
})
export class SingleComponent implements OnInit {

  item: any;
  dateFormat = environment.dateFormat;
  @Input()
  url = 'http://www.realrealfans.com/anime-king/';
  urlSafe: SafeResourceUrl;
  isloading = true;

  constructor(private route: ActivatedRoute, public dataService: DataService, private sanitizer: DomSanitizer) { }

onLoad() {
setTimeout( () => {

  const iframe = document.getElementById('SingleFrame') as HTMLIFrameElement;

  iframe.contentWindow.postMessage('daneanderson16realrealfans', '*') ;

  iframe.style.display = 'block';
  this.isloading = false;

}, 0.0001);
}



ngOnInit() {

  this.urlSafe = this.sanitizer.bypassSecurityTrustResourceUrl(this.url);
  // const itemSlug = this.route.snapshot.paramMap.get('slug');
  const itemSlug = 'anime-king';
  this.item = this.dataService.getPostBySlug(itemSlug);
  // console.log(this.item);
}


}
