import { Component, OnInit } from '@angular/core';
import { BsModalService } from 'ngx-bootstrap/modal';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { BsLocaleService } from 'ngx-bootstrap/datepicker';
import { defineLocale, ptBrLocale } from 'ngx-bootstrap/chronos';
import { ToastrService } from 'ngx-toastr';
import { Contractor } from '../models/Contractor';
import { Contract } from '../models/Contract';
import { ContractService } from '../Services/contract.service';

defineLocale('pt-br', ptBrLocale);
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  // tslint:disable-next-line: variable-name
  _filterList: string;
  get filterList(): string {
    return this._filterList;
  }

  set filterList(value: string){
    this._filterList = value;
    this.contractFiltered = this.filterList ? this.filterContracts(this.filterList) : this.contracts;
  }

  contractFiltered: Contract[];
  contracts: Contract[];
  contractor: Contractor;
  id = 1;

  constructor(private contractService: ContractService, private toastr: ToastrService) { }

  // tslint:disable-next-line: typedef
  ngOnInit() {
    this.getContractor();
  }

  // tslint:disable-next-line: typedef
  getContractor(){
    this.contractService.getContractor_Contracts(this.id).subscribe(
      // tslint:disable-next-line: variable-name
      (_contractor: Contractor) => {
        this.contractor = Object.assign({}, _contractor);
        this.contracts = this.contractor.contract;
      }
    );
  }

  filterContracts(filterBy: string): Contract[]{
    filterBy = filterBy.toLocaleLowerCase();
    return this.contracts.filter(
      c => c.company_name_hired.toLocaleLowerCase().indexOf(filterBy) !== -1);
  }
}
