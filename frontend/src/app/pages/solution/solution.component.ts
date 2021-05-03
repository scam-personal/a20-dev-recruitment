import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-solution',
  templateUrl: './solution.component.html',
  styleUrls: ['./solution.component.css']
})
export class SolutionComponent implements OnInit {

  @Input() title: string = "";
  @Input() id: string = "";
  @Input() result: string = "";
  @Input() syntax_error: string = "";

  @Output() send = new EventEmitter();

  public input: string = "";

  constructor() { }

  ngOnInit(): void {
  }

  send_input() {
    this.send.emit({ input_data: this.input });
  }

}
