import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { Contract } from '../models/Contract';
import { Contractor } from '../models/Contractor';
import { ContractService } from '../Services/contract.service';

@Component({
  selector: 'app-detailing',
  templateUrl: './detailing.component.html',
  styleUrls: ['./detailing.component.css']
})
export class DetailingComponent implements OnInit {

  contractor: Contractor;
  contract: Contract;
  editForm: FormGroup;
  // tslint:disable-next-line: variable-name
  contractor_id = 1;

  constructor(private contractService: ContractService, private toastr: ToastrService, 
              private router: ActivatedRoute, private fb: FormBuilder) { }

  // tslint:disable-next-line: typedef
  ngOnInit() {
    this.getContract();
    this.getContractor();
  }

  // tslint:disable-next-line: typedef
  getContractor(){
    this.contractService.getContractor_Contracts(this.contractor_id).subscribe(
      // tslint:disable-next-line: variable-name
      (_contractor: Contractor) => {
        this.contractor = Object.assign({}, _contractor);
      }
    );
  }

  // tslint:disable-next-line: typedef
  getContract(){
    const id = +this.router.snapshot.paramMap.get('id');
    this.contractService.getContractById(id).subscribe(
      // tslint:disable-next-line: variable-name
      (_contract: Contract) => {
        this.contract = Object.assign({}, _contract);
      }
    );
  }
  // tslint:disable-next-line: typedef
  openModal(template: any){
    this.editForm.reset();
    template.show();
  }
    // tslint:disable-next-line: typedef
  deleteContract(contract: Contract, template: any) {
    this.openModal(template);
    this.contract = contract;
  }

}
