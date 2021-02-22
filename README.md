# Solução do Desafio para Recrutamento de Desenvolvedor Júnior

* Nome: Uthant Vicentin Leite;
* E-mail: [uthantvicentin@unir.br](uthantvicentin@unir.br) 
* Rede Social: [Linkedin](https://www.linkedin.com/in/uthant-vicentin-82218418a/)

## Requisitos para executar a aplicação
 1. Docker
 2. Docker-compose

 [Link para download](https://www.docker.com/products/docker-desktop)

### Windows
 *O executavel para windows já contem as duas dependências*.

Certifique-se de instalar a atualização do kernel do Linux para Windows. 

https://docs.microsoft.com/pt-br/windows/wsl/install-win10#step-4---download-the-linux-kernel-update-package.

Caso tenha algum empecilho com a instalação, basta seguir o [Manual](https://docs.docker.com/docker-for-windows/install/).

### Linux

#### Debian Like (Ubuntu)
Instale o curl:
```
apt-get install curl -y
```
Baixe a ultima versão do docker:
```
curl -L https://github.com/docker/compose/releases/download/1.28.0/docker-compose-Linux-x86_64 -o /usr/bin/docker-compose
```
Dê permissão de administrador para o comando:
```
chmod +x /usr/bin/docker-compose
```

#### Arch
Baixe os pacotes do repositório geral:
```
pacman -S docker docker-compose
```

### Pós-instalação
***O Docker irá fazer uso portas 80 e 3306.***

***Caso tenha algum servidor ativo com essas portas, desligue.***


Navegue até a raiz do projeto e execute:

***Execute no PowerShell em modo Administrador (Windows).***
```
docker-compose up
```
Aguarde o fim do download e instalação das dependências do projeto e, após a instalação, execute a url em localhost.
#### [http://localhost/vagas/](http://localhost/vagas/)

Se o projeto não estiver carregado, aguarde até a conclusão do passo anterior.
