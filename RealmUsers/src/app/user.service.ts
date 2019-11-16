import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { environment } from './../environments/environment';

import { Observable, throwError } from 'rxjs';
import { map, catchError } from 'rxjs/operators';

import { User } from './user';


@Injectable({
  providedIn: 'root'
})
export class UserService {

  users: User[];
  baseUrl: string = environment.apiUrl;

  constructor(private http: HttpClient) { }

  // @todo
  getAll(): Observable<User[]> {
    return this.http.get(`${this.baseUrl}/list`).pipe(
      map((res) => {
        console.log("res:: ",res);
        this.users = res['data'];
        return this.users;
      }),
      catchError(this.handleError));
  }

  store(user: User): Observable<User> {
    return this.http.post(`${this.baseUrl}/postnewuser`, { data: user })
      .pipe(map((res)=> {
        this.users.push(res['data']);
        return this.users;
      }),
      catchError(this.handleError));
  }

  private handleError(error: HttpErrorResponse) {
    console.log(error);
    return throwError('Oops something went wrong. Please try again later');
  }

}
