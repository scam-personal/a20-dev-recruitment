import { HashLocationStrategy, LocationStrategy } from '@angular/common';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { Problem1Component } from './pages/problem1/problem1.component';
import { Problem2Component } from './pages/problem2/problem2.component';
import { Problem3Component } from './pages/problem3/problem3.component';
import { PageNotFoundComponent } from './pages/page-not-found/page-not-found.component';
import { SolutionComponent } from './pages/solution/solution.component';

@NgModule({
  declarations: [
    AppComponent,
    Problem1Component,
    Problem2Component,
    Problem3Component,
    PageNotFoundComponent,
    SolutionComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [
    { provide: LocationStrategy, useClass: HashLocationStrategy }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
