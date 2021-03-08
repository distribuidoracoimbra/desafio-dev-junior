<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Contrato');

use \App\Entity\Contrato;
use \App\Entity\Empresa;

//Validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
	header('location: index.php?status=error');
	exit;
}

$obContrato = Contrato::getContrato($_GET['id']);
$obEmpresaCe = Empresa::getEmpresa('contratante',$_GET['idce']);
$obEmpresaCo = Empresa::getEmpresa('contratado',$_GET['idco']);

//Validação do contrato 
if(!$obContrato instanceof Contrato){
	header('location: index.php?status=error');
	exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['razaosocialCe'],$_POST['cnpjCe'],$_POST['enderecoCe'],
	$_POST['telefoneCe'],$_POST['razaosocialCo'],$_POST['cnpjCo'],
	$_POST['enderecoCo'],$_POST['telefoneCo'],$_POST['tcontrato'],
	$_POST['carencia'],$_POST['vigencia'],$_POST['valores'],
	$_POST['prazo'],$_POST['status'])){

	$obEmpresaCe->setRazaoSocial($_POST['razaosocialCe']);
	$obEmpresaCe->setCnpj($_POST['cnpjCe']);
	$obEmpresaCe->setEndereco($_POST['enderecoCe']);
	$obEmpresaCe->setTelefone($_POST['telefoneCe']);
	
	$obEmpresaCe->atualizar('contratante');

	$obEmpresaCo->setRazaoSocial($_POST['razaosocialCo']);
	$obEmpresaCo->setCnpj($_POST['cnpjCo']);
	$obEmpresaCo->setEndereco($_POST['enderecoCo']);
	$obEmpresaCo->setTelefone($_POST['telefoneCo']);
	
	$obEmpresaCo->atualizar('contratado');

	$obContrato->setIdCe($_GET['idce']);
	$obContrato->setIdCo($_GET['idco']);
	$obContrato->setTipoContrato($_POST['tcontrato']);
	$obContrato->setCarencia($_POST['carencia']);
	$obContrato->setVigencia($_POST['vigencia']);
	$var = $_POST['valores'];	
	if(strlen($var) < 3) $var = number_format($var,2,".",",");
	else{
		$var = str_replace('.','',$var);
		$var = str_replace(',','.',$var);
	}
	$obContrato->setValores($var);
	$obContrato->setPrazo($_POST['prazo']);
	$obContrato->setStatus($_POST['status']);
	
	$obContrato->atualizar();

	header('location: index.php?status=success');
	exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
