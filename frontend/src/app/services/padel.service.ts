import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment.prod';

@Injectable({
  providedIn: 'root'
})
export class PadelService {

  private headers: HttpHeaders;
  private host: string;

  constructor(
    private http: HttpClient
  ) {
    this.host = environment.host;
    this.headers = new HttpHeaders();
    this.headers = this.headers.set('Content-Type', 'application/json');
  }

  solve_padel(input_data: string) {
    return this.http.post(`${this.host}/padel`, {
      input_data: input_data
    }, { headers: this.headers })
  }
}
