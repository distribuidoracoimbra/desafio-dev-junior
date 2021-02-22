<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Empresa;
use \App\Entity\Contrato;

$contratados = new Empresa;

//Busca contratado
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

if(strlen($busca)){
	$buscaContratado = 'razaosocial LIKE "%'.str_replace(' ','%',$busca).'%"';
	$auxco = $contratados->getEmpresasContratado($buscaContratado, null, null,'contratado');
	
	$contador = 0;	
	foreach($auxco as $co){
		$buscaId[$contador] = $co->getId();	
		$contador = $contador + 1;
	}
	$buscaId = array_filter($buscaId);
	$buscaId = implode(',', $buscaId);
	$buscaId = strlen($buscaId) ? $buscaId : 0;
}

//Filtro vigencia 
$filtroVigencia = filter_input(INPUT_GET, 'tvigencia', FILTER_SANITIZE_STRING);
$filtroVigencia = in_array($filtroVigencia,['a','e','i'])? $filtroVigencia : '';
if(strlen($filtroVigencia)){
	if($filtroVigencia[0] == 'a') $operadorVigencia = '>';
	elseif($filtroVigencia[0] == 'e') $operadorVigencia = '<';
	else $operadorVigencia = '=';
}


//Filtro data de insercao 
$filtroInsercao = filter_input(INPUT_GET, 'tinsercao', FILTER_SANITIZE_STRING);
$filtroInsercao = in_array($filtroInsercao,['a','e','i'])? $filtroInsercao : '';
if(strlen($filtroInsercao)){
	if($filtroInsercao[0] == 'a') $operadorInsercao = '>';
	elseif($filtroInsercao[0] == 'e') $operadorInsercao = '<';
	else $operadorInsercao = '=';
}

//Filtro  de Status
$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus,['e','a','c'])? $filtroStatus : '';

//Condicoes sql
$condicoes = [
	strlen($buscaId) ? 'idco in('.$buscaId.')' : null,
	strlen($filtroStatus) ? 'status = "'.$filtroStatus.'"' : null,
	strlen($filtroVigencia) ? 'vigencia '.$operadorVigencia.' "'.$_GET['vigencia'].'"' : null,
	strlen($filtroInsercao) ? 'data '.$operadorInsercao.' "'.$_GET['insercao'].'"' : null
];

//Remove posicoes vazias
$condicoes = array_filter($condicoes);

//Adiciona AND para query
$where = implode(' AND ', $condicoes);

//Retorna contratos
$contratos = Contrato::getContratos($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
