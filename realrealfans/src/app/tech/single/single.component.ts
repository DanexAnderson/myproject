import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {DataService} from '../../post/data.service';

@Component({
  selector: 'app-single',
  templateUrl: './single.component.html',
  styleUrls: ['./single.component.scss'],
})
export class SingleComponent implements OnInit {

  item: any;

  constructor(private route: ActivatedRoute, public dataService: DataService) { }

  ngOnInit() {
      // const itemSlug = this.route.snapshot.paramMap.get('slug');
      const itemSlug = 'anime-king';
      this.item = this.dataService.getPostBySlug(itemSlug);
     // console.log(this.item);
  }


}
