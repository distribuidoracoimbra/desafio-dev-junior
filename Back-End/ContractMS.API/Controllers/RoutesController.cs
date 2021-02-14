using Microsoft.AspNetCore.Mvc;
using ContractMS.Domain.Models;
using ContractMS.Repository;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using System.Collections.Generic;
using AutoMapper;
using ContractMS.API.DTO;
using System;

namespace ContractMS.API.Controllers
{
    [Route("api/")]
    [ApiController]
    public class RoutesController : ControllerBase
    {
        private readonly IContractMSRepository _repo;
        private readonly IMapper _mapper;

        public RoutesController(IContractMSRepository repo, IMapper mapper) 
        { 
            this._repo = repo;
            this._mapper = mapper;

        }

        //Create
        [HttpPost("registration_contract/{id}")]
        public async Task<IActionResult> RegistrationContract(ContractDTO model, int id)
        {
            try
            {  
                var verify = await this._repo.GetAllContractor();

                if (verify.Length == 0)
                {
                    Contractor contractor = new Contractor();
                    contractor.Company_name = "Distribuidora Coimbra";
                    contractor.Cnpj = "06.151.921/0001-31";
                    contractor.Address = "Av. Mamoré, 415 - Três Marias, Porto Velho - RO";
                    contractor.Telephone = "(69) 3216-2600";
                    this._repo.Add(contractor);

                    await this._repo.SaveChangesAsync();
                }

                var result  = await this._repo.GetContractor_Id(id);
                
                model.ContractorId = result.Id;
                model.Status = "Em Edição";
                model.Date_insertion = DateTime.Now;

                var contract = this._mapper.Map<Contract>(model);

                this._repo.Add(contract);
             
                if (await this._repo.SaveChangesAsync())
                {
                    return Created($"/get_contract/{contract.Id}", this._mapper.Map<ContractDTO>(contract));
                }

                return this.StatusCode(StatusCodes.Status500InternalServerError, "Registro de contrato falhou");
            }
            catch (System.Exception)
            {
                return this.StatusCode(StatusCodes.Status500InternalServerError, "Registro de contrato falhou");
            }
        }

        //Read       
        [HttpGet("get_all/{id}")]
        public async Task<IActionResult> GetAll(int id)
        {
            try
            {
                var contract = await this._repo.GetAllContracts();
                var contractor = await this._repo.GetContractor_Id(id);
                
                if (contractor == null) return this.StatusCode(StatusCodes.Status404NotFound, "Contratante não encontrado");

                contractor.Contract = new List<Contract>();
                contractor.Contract.AddRange(contract);
                
                return Ok(contractor);
            }
            catch (System.Exception)
            {
                return this.StatusCode(StatusCodes.Status500InternalServerError, "Banco de dados falhou");
            }
        }

        [HttpGet("get_contract/{id}")]
        public async Task<IActionResult> GetContract(int id)
        {
            try
            {
                var contract = await this._repo.GetContract_Id(id);
                
                if (contract == null) return this.StatusCode(StatusCodes.Status404NotFound, "Contratato não encontrado");

                return Ok(contract);
            }
            catch (System.Exception)
            {
                return this.StatusCode(StatusCodes.Status500InternalServerError, "Banco de dados falhou");
            }
        }
        
        //Update
        [HttpPut("update/{id}")]
        public async Task<ActionResult> Update(int id, ContractDTO model)
        {
            try
            {
                var contract = await this._repo.GetContract_Id(id);

                if (contract == null) return this.StatusCode(StatusCodes.Status404NotFound, "Contrato não encontrado");

                model.Date_insertion = contract.Date_insertion;
                
                this._mapper.Map(model, contract);
                
                this._repo.Update(contract);

                if (await this._repo.SaveChangesAsync())
                {
                    return this.StatusCode(StatusCodes.Status201Created, "contrato atualizado com sucesso");
                }

                return this.StatusCode(StatusCodes.Status500InternalServerError, "Atualização do contrato falhou");
            }
            catch (System.Exception)
            {
                return this.StatusCode(StatusCodes.Status500InternalServerError, "Registro de contrato falhou");
            }
        }

        //delete
        [HttpDelete("delete/{id}")]
        public async Task<IActionResult> Delete(int id)
        {
            try
            {
                var contract = await this._repo.GetContract_Id(id);
                if (contract == null) return this.StatusCode(StatusCodes.Status404NotFound, "Contrato não encontrado");

                this._repo.Delete(contract);

                if (await _repo.SaveChangesAsync())
                {
                    return Ok();
                }

                return this.StatusCode(StatusCodes.Status500InternalServerError, "Exclusão do contrato falhou");
            }
            catch (System.Exception)
            {
                return this.StatusCode(StatusCodes.Status500InternalServerError, "Exclusão do contrato falhou");
            }
        }
    }
}