import { Contract } from './Contract';

export class Contractor {

    constructor(){}

    id: number;
    // tslint:disable-next-line: variable-name
    company_name: string;
    cnpj: string;
    address: string;
    telephone: string;
    contract: Contract[];

}