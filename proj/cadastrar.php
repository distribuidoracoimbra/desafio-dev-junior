<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Contrato');

use \App\Entity\Empresa;
use \App\Entity\Contrato;

$obEmpresaCe = new Empresa;
$obEmpresaCo = new Empresa;
$obContrato = new Contrato;


//VALIDAÇÃO DO POST
if(isset($_POST['razaosocialCe'],$_POST['cnpjCe'],$_POST['enderecoCe'],
	$_POST['telefoneCe'],$_POST['razaosocialCo'],$_POST['cnpjCo'],
	$_POST['enderecoCo'],$_POST['telefoneCo'],$_POST['tcontrato'],
	$_POST['carencia'],$_POST['vigencia'],$_POST['valores'],
	$_POST['prazo'])){

	$obEmpresaCe->setRazaoSocial($_POST['razaosocialCe']);
	$obEmpresaCe->setCnpj($_POST['cnpjCe']);
  	$obEmpresaCe->setEndereco($_POST['enderecoCe']);
	$obEmpresaCe->setTelefone($_POST['telefoneCe']);
	$obEmpresaCe->cadastrar('contratante');

	$obEmpresaCo->setRazaoSocial($_POST['razaosocialCo']);
	$obEmpresaCo->setCnpj($_POST['cnpjCo']);
  	$obEmpresaCo->setEndereco($_POST['enderecoCo']);
	$obEmpresaCo->setTelefone($_POST['telefoneCo']);
	$obEmpresaCo->cadastrar('contratado');
	
	$obContrato->setIdCe($obEmpresaCe->getId());
	$obContrato->setIdCo($obEmpresaCo->getId());
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
	$obContrato->setStatus('e');
	
	$obContrato->cadastrar();

	header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
