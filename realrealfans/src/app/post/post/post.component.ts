import {Component, OnInit, ViewChild, ViewEncapsulation} from '@angular/core';
import {DataService} from '../data.service';
import {environment} from '../../../environments/environment';
import {IonInfiniteScroll} from '@ionic/angular';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.scss'],
})
export class PostComponent implements OnInit {

  @ViewChild(IonInfiniteScroll, {static: false}) infiniteScroll: IonInfiniteScroll;

  items: any[];
  dateFormat = environment.dateFormat;

  constructor(public dataService: DataService) {
  }

  ngOnInit() {
      console.log('> HomePage.ngOnInit');
      this.dataService.getPosts().subscribe((data: any[]) => {
          this.items = data;
          // console.log(this.items);
      });
  }

  getMorePosts(evt) {
      this.dataService.getMorePosts().subscribe((data: any[]) => {
          this.items = data;
          this.infiniteScroll.complete();
      });
  }

  infiniteScrollDisabled() {
      if (this.dataService.hasMorePosts()) {
          return false;
      } else {
          return true;
      }
  }
}
