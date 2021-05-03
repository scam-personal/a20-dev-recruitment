import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment.prod';

@Injectable({
  providedIn: 'root'
})
export class StringsService {

  private headers: HttpHeaders;
  private host: string;
  constructor(
    private http: HttpClient
  ) {
    this.host = environment.host;
    this.headers = new HttpHeaders();
    this.headers = this.headers.set('Content-Type', 'application/json');
  }

  solve_strings(input_data: string) {
    return this.http.post(`${this.host}/strings`, {
      input_data: input_data
    }, { headers: this.headers })
  }
}
