using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

namespace ContractMS.Domain.Models
{
    public class Contractor
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Company_name { get; set; }
        
        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Cnpj { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string Address { get; set; }

        [Required(ErrorMessage = "Campo Obrigatório")]
        public string  Telephone { get; set; }

        public List<Contract> Contract { get; set; }
    }
}