
## Requisitos

Cetifique-de instalá-los:

* [Eclipse IDE](https://www.eclipse.org/downloads/)

* [Java Development Kit 11 ou superior;](https://www.oracle.com/br/java/technologies/javase-jdk11-downloads.html)
* [Mysql 8.](https://dev.mysql.com/downloads/mysql/)

## Configurando o ambiente no Eclipse IDE
> Obs.: Lembrando que os requistos do MySQL são os mesmos para esse projeto, como explicado na execução do `devcoimbra-exec.jar`.

Faça o download do `devcoimbra.zip` e extraia no diretório em algum diretório.

* Abra o Eclipse IDE;

* Exporte o projeto:
* * Com as seguintes operações: `File` > `Import` > `Maven` > `Existing Maven Projects` > selecione o diretório em que foi extraído o `devcoimbra.zip` e o campo do `pom.xml` > `Finish`;

* Instalando o Spring Suite Tools:
* * `Help` > `Eclipse Marketplace` > pesquise por `Spring Tools 4` e instale. Reinicie o ambiente do Eclipse IDE;

* Instalando o Thymeleaf :
* * `Help` > `Eclipse Marketplace` > pesquise por `Thymeleaf` e instale. Reinicie o ambiente do Eclipse IDE;

* Atualizando o projeto:
* * Selecione o projeto dentro da IDE e com botão esquerdo selecione `Maven` > `Update Project...`;

* Executando: 
* * Selecione o projeto dentro da IDE e com botão esquerdo selecione `Run as` > `Spring Boot App`;

* Rodando: 
> Cerfique em qual porta ira ser executado pelo tomcat, geralmente ele usa porta 8080.
* * Abra o navegador de sua prefrência e cole: `http://localhost:8080/`. E poderá utilizar a aplicação.

> Obs.: Fique atento na `barra inferior direita e console da IDE` onde acontecem as atualizações e mudanças do projeto.

