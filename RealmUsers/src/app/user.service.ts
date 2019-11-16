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
  baseUrl: string = environment.apiUrl;
  users: User[];

  constructor(private http: HttpClient) { }

  getAll(): Observable<User[]> {
    return this.http.get(`${this.baseUrl}/list`).pipe(
      map((res) => {
        // console.log("getting:: ", this.users);
        // console.log("res:: ",this.users);
        this.users = res['data'];
        return this.users;
      }),
      catchError(this.handleError));
  }

  store(user: User): Observable<User[]> {
    return this.http.post(`${this.baseUrl}/postnewuser`, { data: user })
      .pipe(map((res)=> {
        // this.users = User; // Somthing is weird here. Why is this variable undefinded
        // debugger;
        // this.users.push(res['data']);
        return res['data'];
      }),
      catchError(this.handleError));
  }

  private handleError(error: HttpErrorResponse) {
    console.log(error);
    return throwError('Oops something went wrong. Please try again later');
  }

}
