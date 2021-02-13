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

  getContractor_Contracts(id: number): Observable<Contractor>{
    return this.http.get<Contractor>(`${this.baseURL}/get_all/${id}`);
  }

  getContractById(id: number): Observable<Contract>{
    return this.http.get<Contract>(`${this.baseURL}/get_contract/${id}`);
  }
}
