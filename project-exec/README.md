Como executar o `devcoimbra-exec.jar` do projeto?
=
## Requisitos

Cetifique-de instalá-los:

* [Java Development Kit 11 ou superior;](https://www.oracle.com/br/java/technologies/javase-jdk11-downloads.html)
* [Mysql 8.](https://dev.mysql.com/downloads/mysql/)

> Obs.: O `.jar` foi gerado com `usuário: root` e `senha: root`, padrões para acesso ao MySQL. Caso estejam diferentes o `Hibernate` não conseguirá executar suas dependências com o MySQL.

## Executando

Após fazer o donwload do `devcoimbra-exec.jar`, navegue até o diretório de download, usando o `cmd` ou `Windows Power Shell` ou `terminal do Linux` e execute a seguinte linha de comando:

<code> java -jar devcoimbra-exec.jar </code>

> Cerfique em qual porta ira ser executado pelo tomcat, geralmente ele usa porta `8080`.

Abra o navegador de sua preferência e cole `http://localhost:8080/`. E poderá utilizar a aplicação.
