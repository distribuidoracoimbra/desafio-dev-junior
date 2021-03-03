using System.Linq;
using AutoMapper;
using ContractMS.Domain.Models;
using ContractMS.API.DTO;

namespace ContractMS.API.Helpers
{
    public class AutoMapperProfiles : Profile
    {
        public AutoMapperProfiles()
        {
            CreateMap<Contract, ContractDTO>().ReverseMap();
        }
    }
}