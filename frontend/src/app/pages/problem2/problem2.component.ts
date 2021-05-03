import { Component, OnInit } from '@angular/core';
import { ChessService } from 'src/app/services/chess.service';

@Component({
  selector: 'app-problem2',
  templateUrl: './problem2.component.html',
  styleUrls: ['./problem2.component.css']
})
export class Problem2Component implements OnInit {

  public result: string = "";
  public syntax_error: string = "";

  constructor(
    private chessService: ChessService
  ) { }

  ngOnInit(): void {
  }

  send_input(event) {
    this.chessService.solve_chess(JSON.parse(JSON.stringify(event.input_data))).toPromise()
      .then((res) => {
        let response: any = res;
        this.result = JSON.stringify(response.input_data).replace(/"/g, "").replace(/\\n/g, "\r\n");
      })
      .catch((err) => {
        console.error(err);
      });
  }

}
