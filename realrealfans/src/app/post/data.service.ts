import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
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
                return this.http.get(URL + 'rrf/v1/getposts?status=any&token=' + user.token,
                    { observe: 'response', headers: { Authorization: 'Bearer ' + user.token } })
                    .pipe(map(this.processPostData, this));
            } else {

                return this.http.get(URL + 'rrf/v1/getposts/', { observe: 'response' })
                    //  return this.http.get(URL + 'wp/v2/posts?_embed', { observe: 'response' })
                    .pipe(map(this.processPostData, this));
            }
        }
    }
    /**
     * Gets the next page of posts
     */
    getMorePosts(): any {
        this.page++;
        return this.http.get(URL + 'rrf/v1/getposts?_embed&page=' + this.page, { observe: 'response' })
            // return this.http.get(URL + 'wp/v2/posts?_embed&page=' + this.page, { observe: 'response' })
            .pipe(map(this.processPostData, this));
    }
    // A place for post-processing, before making the fetched data available to view.
    processPostData(resp: HttpResponse<any[]>) {
        // console.log(resp);
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

        if (user) {

            let headers = new HttpHeaders();
            headers = headers.set('Authorization', 'Bearer ' + user.token);
            headers = headers.append('Accept', 'application/json');
            headers = headers.append('Content-Disposition', 'attachment; filename=' + formData.image.name);
            headers = headers.append('Cache-Control', 'no-cache');

            const mediaData = new FormData();

            mediaData.append('post_title', formData.title),
                mediaData.append('content', formData.content),
                mediaData.append('post_status', 'draft'),
                mediaData.append('media_title', formData.caption); // Caption Used in form is set as Title in Media Api
            mediaData.append('description', formData.description);
            mediaData.append('file', formData.image);  // , formData.title formData.image
            mediaData.append('media_status', formData.status);

            return this.http.post(URL + 'rrf/v1/createpost?_embed&status=any&token=' + user.token, mediaData, { headers })
                .subscribe(post => {

                    console.log(post);
                });
        } else {
            console.log('No User Data');
            return;
        }
    }

    createPostMulti(formData, oData): any {
        const user = this.authService.getUser();

        if (user) {

            let headers = new HttpHeaders();
            headers = headers.set('Authorization', 'Bearer ' + user.token);
            headers = headers.append('Accept', 'application/json');
            headers = headers.append('Cache-Control', 'no-cache');

            const mediaData = new FormData();

            for (const item of formData) {

                headers = headers.append('Content-Disposition', 'attachment; filename=' + item.value.file.name);
                mediaData.append('media_title[]', item.value.title);
                // mediaData.append('caption_title[]', item.value.caption); // Caption Used in  is set as Title in Media Api
                mediaData.append('description[]', item.value.description);
                mediaData.append('files[]', item.value.file);  // , Data.title Data.image
            }
            mediaData.append('content', oData.content);
            mediaData.append('post_title', oData.atitle);
            // mediaData.append('media_status', 'publish');

            // See values within the formData
            /* mediaData.forEach((value, key) => {
                console.log(key + ' ' + value);
            }); */

            return this.http.post(URL + 'rrf/v1/createarticle?_embed&status=any&token=' + user.token, mediaData, { headers })
                .subscribe(post => {

                    console.log(post);
                });

        } else {

            console.log('No User Data');
            return;
        }
    }

    getSinglePage() {

    }

}
