using System;
using System.Threading.Tasks;
using ContractMS.Domain.Models;

namespace ContractMS.Repository
{
    public interface IContractMSRepository
    {
        void Add<T>(T entity) where T : class;
        
        void Update<T>(T entity) where T : class;

        void Delete<T>(T entity) where T : class;

        Task<bool> SaveChangesAsync();

        Task<Contractor> GetContractor_Id(int id);

        Task<Contract> GetContract_Id(int id);

        Task<Contract[]> GetAllContracts();
        
        Task<Contractor[]> GetAllContractor();

        //Task<Contract[]> GetAllContracts_Hired(string company_name);

        //Task<Contract[]> GetAllContracts_Validity(string validity);

        //Task<Contract[]> GetAllContracts_Date(DateTime date);

        //Task<Contract[]> GetAllContracts_Status(string status);
    }
}