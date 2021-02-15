import { Component, OnInit } from '@angular/core';
import { BsModalService } from 'ngx-bootstrap/modal';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { BsLocaleService } from 'ngx-bootstrap/datepicker';
import { defineLocale, ptBrLocale } from 'ngx-bootstrap/chronos';
import { ToastrService } from 'ngx-toastr';
import { Contractor } from '../models/Contractor';
import { Contract } from '../models/Contract';
import { ContractService } from '../Services/contract.service';
import { Router } from '@angular/router';

defineLocale('pt-br', ptBrLocale);
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  // tslint:disable-next-line: variable-name
  _filterList_date_insertion: string;
  get filterList_date_insertion(): string {
    return this._filterList_date_insertion;
  }

  set filterList_date_insertion(value: string){
    this._filterList_date_insertion = value;
    this.contractsFiltered = this.filterList_date_insertion ? this.filterContracts_date_insertion(this.filterList_date_insertion) : this.contracts;
  }

  // tslint:disable-next-line: variable-name
  _filterList_hired: string;
  get filterList_hired(): string {
    return this._filterList_hired;
  }

  set filterList_hired(value: string){
    this._filterList_hired = value;
    this.contractsFiltered = this.filterList_hired ? this.filterContracts_hired(this.filterList_hired) : this.contracts;
  }

  // tslint:disable-next-line: variable-name
  _filterList_vigencia: string;
  get filterList_vigencia(): string {
    return this._filterList_vigencia;
  }

  set filterList_vigencia(value: string){
    this._filterList_vigencia = value;
    this.contractsFiltered = this.filterList_vigencia ? this.filterContracts_vigencia(this.filterList_vigencia) : this.contracts;
  }

  // tslint:disable-next-line: variable-name
  _filterList_status: string;
  get filterList_status(): string {
    return this._filterList_status;
  }

  set filterList_status(value: string){
    this._filterList_status = value;
    this.contractsFiltered = this.filterList_status ? this.filterContracts_status(this.filterList_status) : this.contracts;
  }

  contractsFiltered: Contract[];
  contracts: Contract[];
  contractor: Contractor;
  // tslint:disable-next-line: variable-name
  contractor_id = 1;

  constructor(private contractService: ContractService, private toastr: ToastrService) { }

  // tslint:disable-next-line: typedef
  ngOnInit() {
    this.getContractor();
  }

  // tslint:disable-next-line: typedef
  getContractor(){
    this.contractService.getContractor_Contracts(this.contractor_id).subscribe(
      // tslint:disable-next-line: variable-name
      (_contractor: Contractor) => {
        this.contractor = Object.assign({}, _contractor);
        this.contracts = this.contractor.contract;
        this.contracts.forEach(contract => {
          contract.value =  new Intl.NumberFormat('pt-BR', {style: 'currency', currency: 'BRL'}).format(Number(contract.value));
          const data = new Date(contract.date_insertion);
          contract.date_insertion_view = data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
        });
        this.contractsFiltered = this.contracts;
      }
    );
  }

  filterContracts_date_insertion(filterBy: string): Contract[]{
    filterBy = filterBy.toLocaleLowerCase();
    return this.contracts.filter(
      c => c.date_insertion_view.toLocaleLowerCase().indexOf(filterBy) !== -1);
  }

  filterContracts_hired(filterBy: string): Contract[]{
    filterBy = filterBy.toLocaleLowerCase();
    return this.contracts.filter(
      c => c.company_name_hired.toLocaleLowerCase().indexOf(filterBy) !== -1);
  }

  filterContracts_vigencia(filterBy: string): Contract[]{
    filterBy = filterBy.toLocaleLowerCase();
    return this.contracts.filter(
      c => c.vigencia.toLocaleLowerCase().indexOf(filterBy) !== -1);
  }

  filterContracts_status(filterBy: string): Contract[]{
    filterBy = filterBy.toLocaleLowerCase();
    return this.contracts.filter(
      c => c.status.toLocaleLowerCase().indexOf(filterBy) !== -1);
  }
}
