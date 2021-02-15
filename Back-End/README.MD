# API RESTful do Projeto Desafio para Recrutamento de Desenvolvedor Júnior - Distribuidora Coimbra.

- Desenvolvedor: Thales Junior de Souza Gomes.

#### Este projeto Utiliza:

- C# .NET Core 3.1;
- Entity Framework Core;
- MySQL;

### Configuração do Ambiente
- Certifique - se que C# .NET Core 3.1, Entity Framework Core e MySQL estejam instalados;
- Todas as bibliotecas utilizadas estão referenciadas nos arquivos `*.csproj`;
- A string de conexão com o Mysql (ConnectionStrings) fica localizada no arquivo appsettings.json e appsettings.Development.json deve ser modificada conforme o server, uid e password utilizados;
- navege até a pasta ContractMS.Repository (Exemplo: ../desafio-dev-junior/Back-End/ContractMS.Repository) e digite o comando para que o Entity Framework crie o banco de dados:
> dotnet ef --startup-project ../ContractMS.API database update
- navege até a pasta ContractMS.API (Exemplo: ../desafio-dev-junior/Back-End/ContractMS.API) e digite o comando para executar a aplicação:
> dotnet run 
- API deve funcionar no endereço `http://localhost:5000/api/`




