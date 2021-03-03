import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute} from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { BsLocaleService } from 'ngx-bootstrap/datepicker';
import { defineLocale, ptBrLocale } from 'ngx-bootstrap/chronos';
import { Contract } from '../models/Contract';
import { ContractService } from '../Services/contract.service';

defineLocale('pt-br', ptBrLocale);
@Component({
  selector: 'app-registration',
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.css']
})
export class RegistrationComponent implements OnInit {

  registerForm: FormGroup;
  contract: Contract;

  constructor(private fb: FormBuilder, private contractService: ContractService,
              private toastr: ToastrService, private routerAc: ActivatedRoute, private localeService: BsLocaleService) {
                this.localeService.use('pt-br');
              }

  // tslint:disable-next-line: typedef
  ngOnInit() {
    this.validation();
  }

  // tslint:disable-next-line: typedef
  validation(){
    this.registerForm = this.fb.group({
      company_name_hired : ['', Validators.required],
      cnpj_hired : ['', Validators.required],
      address_hired : ['', Validators.required],
      telephone_hired : ['', [Validators.required]],
      type_contract : ['', Validators.required],
      grace_period : ['', Validators.required],
      value : ['', Validators.required],
      date_payment : ['', Validators.required],
      vigencia : ['', Validators.required]
    });
  }

  // tslint:disable-next-line: typedef
  registrationContract(){
    const id = +this.routerAc.snapshot.paramMap.get('id');
    this.contract = Object.assign({}, this.registerForm.value);
    this.contractService.registerContract(this.contract, id).subscribe(
      () => {
        this.registerForm.reset();
        this.toastr.success('Contrato Registrato com Sucesso');
      }, error => {
        this.toastr.error('Erro ao tentar registrar contrato');
      }
    );
  }
}
