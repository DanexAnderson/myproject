import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
// import 'rxjs/add/operator/map';
// import {of} from 'rxjs/observable/of';
import { of } from 'rxjs';
import { Observable } from 'rxjs';
import { AuthService } from '../auth/auth.service';

const URL = environment.URL;


@Injectable({
    providedIn: 'root'
})
export class DataService {


    items: any[] = [];
    posts = [];
    media = [];
    page = 1;
    totalPages = 1;
    constructor(private http: HttpClient, private authService: AuthService) {
    }
    /**
     * Gets a page of posts or all posts formerly fetched
     */
    getPosts(): any {
        if (this.items.length > 0) {
            return of(this.items);
        } else {
            const user = this.authService.getUser();
            if (user) {
                return this.http.get(URL + 'wp/v2/posts?_embed&status=any&token=' + user.token,
                    { observe: 'response', headers: { Authorization: 'Bearer ' + user.token } })
                    .pipe(map(this.processPostData, this));
            } else {

                 return this.http.get(URL + 'wp/v2/posts?_embed', { observe: 'response' })
                    .pipe(map(this.processPostData, this));
            }
        }
    }
    /**
     * Gets the next page of posts
     */
    getMorePosts(): any {
        this.page++;
        return this.http.get(URL + 'wp/v2/posts?_embed&page=' + this.page, { observe: 'response' })
            .pipe(map(this.processPostData, this));
    }
    // A place for post-processing, before making the fetched data available to view.
    processPostData(resp: HttpResponse<any[]>) {
        this.totalPages = +resp.headers.get('X-WP-TotalPages'); // unary (+) operator casts the string to a number
        resp.body.forEach((item: any) => {
            this.items.push(item);
        });
        return this.items;
    }
    getPostBySlug(slug): any {

        return this.items.find(item => item.slug === slug);
    }
    hasMorePosts() {
        return this.page < this.totalPages;
    }

    // Subscribe to CreatePost Response Data
    createPost(formData): any {
        const user = this.authService.getUser();
        const postData = {
            title: formData.title,
            content: formData.content,
            status: 'draft'
        };

        if (user) {

            let headers = new HttpHeaders();
            headers = headers.set('Authorization', 'Bearer ' + user.token);
            return this.http.post(URL + 'wp/v2/posts?_embed&status=any&token=' + user.token, postData, { headers })
                .subscribe( initPost => {

                    this.posts.push(initPost); // Must at Response to a Global Variable or Interface
                   // console.log( this.posts[0]);


                    const mediaData = new FormData();

                    mediaData.append('title', formData.caption); // Caption Used in form is set as Title in Media Api
                    // Caption in Media Api is use to create Media Category
                    mediaData.append('caption', '#' + formData.title + this.posts[0].id);
                    mediaData.append('description', formData.description);
                    mediaData.append('file', formData.image);  // , formData.title formData.image
                    mediaData.append('status', formData.status);
                    mediaData.append('post', this.posts[0].id);

                    headers =  headers.append('Accept', 'application/json');
                    headers = headers.append('Content-Disposition', 'attachment; filename=' + formData.image.name);
                    headers =  headers.append('Cache-Control', 'no-cache');

                    console.log(headers);

                    return this.http.post(URL + 'wp/v2/media?_embed&status=publish&token=' + user.token, mediaData, { headers })
                    .subscribe( mediaRes => {

                        this.media.push(mediaRes);

                        console.log(this.media[0]);

                       // return this.http.post(URL + 'wp/v2/posts?_embed&status=any&token=' + user.token, postData, { headers });


                    }
                    );


                });
        } else {
            console.log('No User Data');
            return; }
    }

    getSinglePage() {

}


}
