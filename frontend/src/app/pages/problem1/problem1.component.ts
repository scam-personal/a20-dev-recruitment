import { Component, OnInit } from '@angular/core';
import { PadelService } from 'src/app/services/padel.service';

@Component({
  selector: 'app-problem1',
  templateUrl: './problem1.component.html',
  styleUrls: ['./problem1.component.css']
})
export class Problem1Component implements OnInit {

  public result: string = "";
  public syntax_error: string = "";

  constructor(
    private padelService: PadelService
  ) { }

  ngOnInit(): void {
  }

  send_input(event) {
    this.padelService.solve_padel(JSON.parse(JSON.stringify(event.input_data))).toPromise()
      .then((res) => {
        let response: any = res;
        this.result = JSON.stringify(response.input_data).replace(/"/g, "").replace(/\\n/g, "\r\n");
      })
      .catch((err) => {
        console.error(err);
      });
  }

}
