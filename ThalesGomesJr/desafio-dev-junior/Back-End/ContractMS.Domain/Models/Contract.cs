using System;
using System.ComponentModel.DataAnnotations;


namespace ContractMS.Domain.Models
{
    public class Contract
    {
        public int Id { get; set; }

        public int ContractorId { get; set; }
        
        public string Company_name_hired { get; set; }
        
        public string Cnpj_hired { get; set; }

        public string Address_hired { get; set; }

        public string  Telephone_hired { get; set; }

        public string Type_contract { get; set; }

        public string Grace_period { get; set; }

        public decimal Value { get; set;}

        public DateTime Date_payment { get; set; }
        
        public string vigencia { get; set; }

        public DateTime Date_insertion { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Status { get; set; }

    }
}