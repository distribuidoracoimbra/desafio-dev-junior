import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Contractor } from '../models/Contractor';
import { Contract } from '../models/Contract';

@Injectable({
  providedIn: 'root'
})
export class ContractService {

  baseURL = 'http://localhost:5000/api';

  constructor(private http: HttpClient) {}

  // tslint:disable-next-line: typedef
  registerContract(contract: Contract, id: number){
    return this.http.post(`${this.baseURL}/registration_contract/${id}`, contract);
  }

  // tslint:disable-next-line: typedef
  updateContract(contract: Contract){
    return this.http.put(`${this.baseURL}/update/${contract.id}`, contract);
  }

  // tslint:disable-next-line: typedef
  deleteContract(id: number){
    return this.http.delete(`${this.baseURL}/delete/${id}`);
  }

  getContractor_Contracts(id: number): Observable<Contractor>{
    return this.http.get<Contractor>(`${this.baseURL}/get_all/${id}`);
  }

  getContractById(id: number): Observable<Contract>{
    return this.http.get<Contract>(`${this.baseURL}/get_contract/${id}`);
  }
}
