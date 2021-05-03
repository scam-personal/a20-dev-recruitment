import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageNotFoundComponent } from './pages/page-not-found/page-not-found.component';
import { Problem1Component } from './pages/problem1/problem1.component';
import { Problem2Component } from './pages/problem2/problem2.component';
import { Problem3Component } from './pages/problem3/problem3.component';

const routes: Routes = [
  { path: '', component: Problem1Component },
  { path: 'problem-1', component: Problem1Component },
  { path: 'problem-2', component: Problem2Component },
  { path: 'problem-3', component: Problem3Component },
  { path: '*', component: PageNotFoundComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }