create database if not exists desafiocoimbra default
character set utf8
default collate utf8_general_ci;

use desafiocoimbra;

create table if not exists contratante (
	id int auto_increment,	
	razaosocial varchar(255) not null,
	cnpj varchar(18) not null,
	endereco varchar(150) not null,
	telefone varchar(20) not null,
	primary key(id)
) default charset = utf8;

create table if not exists contratado (
	id int auto_increment,
	razaosocial varchar(255) not null,
	cnpj varchar(18) not null,
	endereco varchar(150) not null,
	telefone varchar(20) not null,
	primary key(id)
) default charset = utf8;

create table if not exists contrato(
	id int auto_increment,	
	idco int,
	idce int,
	tcontrato enum('e','a','s','q') not null,
	carencia date not null,
	vigencia date not null,
	valores decimal(19,2) not null,
	prazo int(2) not null,
	status enum('e','a','c') default 'e',
	data timestamp,
	primary key(id),
	foreign key (idco) references contratado(id),
	foreign key (idce) references contratante(id)
) default charset = utf8;
