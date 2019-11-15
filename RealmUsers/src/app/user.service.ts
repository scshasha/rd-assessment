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
  baseUrl: environment.apiUrl;

  constructor(private http: HttpClient) { }

  // @todo
  getAll(): Observable<User[]> {
    return this.http.get(`${this.baseUrl}/list`).pipe(
      map((res) => {
        this.users = res['data'];
        return this.cars;
      });
    );
  }

}
