using System;
using System.ComponentModel.DataAnnotations;

namespace ContractMS.API.DTO
{
    public class ContractDTO
    {
        public int Id { get; set; }

        public int ContractorId { get; set; }
        
        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Company_name_hired { get; set; }
        
        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Cnpj_hired { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Address_hired { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string  Telephone_hired { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Tipo_contrato { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Grace_period { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public decimal Value { get; set;}

        [Required(ErrorMessage = "Campo Obrigatório")]
        public DateTime Date_payment { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public DateTime Date_start { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public DateTime Date_finish { get; set; }

        public string Status { get; set; }

    }
}