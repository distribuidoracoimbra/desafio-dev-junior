/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { ContractService } from './contract.service';

describe('Service: Contract', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ContractService]
    });
  });

  it('should ...', inject([ContractService], (service: ContractService) => {
    expect(service).toBeTruthy();
  }));
});
