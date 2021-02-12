using System;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using ContractMS.Domain.Models;

namespace ContractMS.Repository
{
    public class ContractMSRepository : IContractMSRepository
    {
        private readonly ContractMSContext _context;
        
        public ContractMSRepository(ContractMSContext context)
        {
            this._context = context;
            this._context.ChangeTracker.QueryTrackingBehavior = QueryTrackingBehavior.NoTracking;
        }

        public void Add<T>(T entity) where T : class
        {
            this._context.Add(entity);
        }

        public void Update<T>(T entity) where T : class
        {
            this._context.Update(entity);
        }

        public void Delete<T>(T entity) where T : class
        {
            this._context.Remove(entity);
        }

        public async Task<bool> SaveChangesAsync()
        {
            return (await this._context.SaveChangesAsync()) > 0; 
        }

        public async Task<Contractor> GetContractor_Id(int id)
        {
            var query = this._context.Contractor.AsNoTracking().Where(c => c.Id == id);
            
            return await query.FirstOrDefaultAsync();
        }

        public async Task<Contract> GetContract_Id(int id)
        {
            var query = this._context.Contract.AsNoTracking().Where(c => c.Id == id);
            
            return await query.FirstOrDefaultAsync();
        }

        public async Task<Contract[]> GetAllContracts()
        {
            var query = this._context.Contract.AsNoTracking().OrderByDescending(e => e.Date_start);

            return await query.ToArrayAsync();
        }

        
        public async Task<Contractor[]> GetAllContractor()
        {
            var query = this._context.Contractor.AsNoTracking();
            
            return await query.ToArrayAsync();
        }
    }
}