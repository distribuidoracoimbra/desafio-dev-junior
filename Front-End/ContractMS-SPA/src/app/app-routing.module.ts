import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { DetailingComponent } from './detailing/detailing.component';
import { RegistrationComponent } from './registration/registration.component';

const routes: Routes = [
  { path: 'dashboard', component: DashboardComponent},
  { path: 'registration/:id', component: RegistrationComponent},
  { path: 'contract/detailing/:id', component: DetailingComponent},
  { path: '', redirectTo: 'dashboard', pathMatch: 'full'},
  { path: '**', redirectTo: 'dashboard', pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
