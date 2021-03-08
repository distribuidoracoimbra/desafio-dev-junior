<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Contrato;
use \App\Entity\Empresa;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A VAGA
$obContrato = Contrato::getContrato($_GET['id']);

$obEmpresaCe = Empresa::getEmpresa('contratante',$_GET['idce']);
$obEmpresaCo = Empresa::getEmpresa('contratado',$_GET['idco']);

//VALIDAÇÃO DA VAGA
if(!$obContrato instanceof Contrato){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obContrato->excluir();
  $obEmpresaCe->excluir('contratante');
  $obEmpresaCo->excluir('contratado');
	
	header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';
