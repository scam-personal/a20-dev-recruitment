import { Component, OnInit } from '@angular/core';
import { StringsService } from 'src/app/services/strings.service';

@Component({
  selector: 'app-problem3',
  templateUrl: './problem3.component.html',
  styleUrls: ['./problem3.component.css']
})
export class Problem3Component implements OnInit {

  public result: string = "";
  public syntax_error: string = "";

  constructor(
    private stringsService: StringsService
  ) { }

  ngOnInit(): void {
  }

  send_input(event) {
    this.stringsService.solve_strings(JSON.parse(JSON.stringify(event.input_data))).toPromise()
      .then((res) => {
        let response: any = res;
        this.result = JSON.stringify(response.input_data).replace(/"/g, "").replace(/\\n/g, "\r\n");
      })
      .catch((err) => {
        console.error(err);
      });
  }

}
