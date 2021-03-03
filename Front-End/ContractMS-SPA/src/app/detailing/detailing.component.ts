import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { BsLocaleService } from 'ngx-bootstrap/datepicker';
import { defineLocale, ptBrLocale } from 'ngx-bootstrap/chronos';
import { Contract } from '../models/Contract';
import { Contractor } from '../models/Contractor';
import { ContractService } from '../Services/contract.service';

defineLocale('pt-br', ptBrLocale);
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
  // tslint:disable-next-line: variable-name
  date_payment: string;
  value: string;

  constructor(private contractService: ContractService, private toastr: ToastrService, private fb: FormBuilder,
              private routerAc: ActivatedRoute, private router: Router , private localeService: BsLocaleService) {
                this.localeService.use('pt-br');
              }

  // tslint:disable-next-line: typedef
  ngOnInit() {
    this.validationEdit();
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
    const id = +this.routerAc.snapshot.paramMap.get('id');
    this.contractService.getContractById(id).subscribe(
      // tslint:disable-next-line: variable-name
      (_contract: Contract) => {
        this.contract = Object.assign({}, _contract);
        this.value = new Intl.NumberFormat('pt-BR', {style: 'currency', currency: 'BRL'}).format(Number(this.contract.value));
        // tslint:disable-next-line: variable-name
        const data_p = new Date(this.contract.date_payment);
        this.date_payment = data_p.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
      }
    );
  }

  // tslint:disable-next-line: typedef
  editContract(contract: Contract, template: any){
    this.openModal(template);
    this.contract = Object.assign({}, contract);
    this.editForm.patchValue(this.contract);
  }

  // tslint:disable-next-line: typedef
  validationEdit(){
    this.editForm = this.fb.group({
      company_name_hired : ['', Validators.required],
      cnpj_hired : ['', Validators.required],
      address_hired : ['', Validators.required],
      telephone_hired : ['', [Validators.required]],
      type_contract : ['', Validators.required],
      grace_period : ['', Validators.required],
      value : ['', Validators.required],
      date_payment : ['', Validators.required],
      vigencia : ['', Validators.required],
      status: ['', Validators.required]
    });
  }

  // tslint:disable-next-line: typedef
  saveEdit(template: any){
    if (this.editForm.valid){
      this.contract = Object.assign({id: this.contract.id}, this.editForm.value);
      console.log(this.contract);
      this.contractService.updateContract(this.contract).subscribe(
        () => {
          template.hide();
          this.getContract();
          this.toastr.success('Contrato editado com Sucesso');
        }, () => {
          this.toastr.error('O Sistema Falhou, tente novamente mais tarde');
        }
      );
    }
  }

  // tslint:disable-next-line: typedef
  openModal(template: any){
    // this.editForm.reset();
    template.show();
  }
    // tslint:disable-next-line: typedef
  deleteContract(contract: Contract, template: any) {
    this.openModal(template);
    this.contract = contract;
  }

  // tslint:disable-next-line: typedef
  confirmDelete(template: any) {
    this.contractService.deleteContract(this.contract.id).subscribe(
      () => {
      template.hide();
      this.router.navigate(['/dashboard']);
      this.toastr.success('Contrato Excluído com Sucesso');
      }, () => {
        this.toastr.error('O Sistema Falhou, tente novamente mais tarde');
      }
    );
  }

}
