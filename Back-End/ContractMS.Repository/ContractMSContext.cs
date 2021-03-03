using Microsoft.EntityFrameworkCore;
using ContractMS.Domain.Models;

namespace ContractMS.Repository
{
    public class ContractMSContext : DbContext
    {
        public ContractMSContext(DbContextOptions<ContractMSContext> options) : base(options){}

        public DbSet<Contractor> Contractor { get; set; }

        public DbSet<Contract> Contract { get; set; }

       /*
        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<Contract>().HasKey(c => new { c.ContractorId, c.HiredId });
        }
        */
    }
}