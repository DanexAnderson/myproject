import { Injectable } from '@angular/core';
import {environment} from '../../environments/environment';
import {HttpClient, HttpHeaders} from '@angular/common/http';

const URL = environment.URL;

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private user: any;
  constructor(private http: HttpClient) {
  }
  /**
   * Login to WordPress via JWT. Returns object with the following shape:
   * {
   *      token: "eyJ0eXAiOiJKV1QiLCJhbGci...",
   *      user_email: "someuser@somewhere.com",
   *      user_nicename: "wordpress",
   *      user_display_name: "wordpress"
   * }
   */
  doLogin(username, password) {
      return this.http.post(URL + 'jwt-auth/v1/token', {
          username,
          password
      });
  }
  validateAuthToken(token) {
      let headers = new HttpHeaders();
      headers = headers.set('Authorization', 'Bearer ' + token);
      return this.http.post(URL + 'jwt-auth/v1/token/validate?token=' + token,
          {}, {headers});
  }
  getUser() {
      return this.user;
  }
  setUser(user) {
      this.user = user;
  }



}
