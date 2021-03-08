<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Contrato{

	private $id;
	private $idCe;
	private $idCo;
	private $tipoContrato;
	private $status;
	private $carencia;
	private $vigencia;
	private $valores;
	private $prazo;
	private $data;

	public function setId($i){ $this->id = $i; }

	public function getId(){ return $this->id; }

	public function setIdCe($ce){ $this->idCe = $ce; }

	public function getIdCe(){ return $this->idCe; }

	public function setIdCo($co){ $this->idCo = $co; }

	public function getIdCo(){ return $this->idCo; }

	public function setTipoContrato($tc){ $this->tipocontrato = $tc; }

	public function getTipoContrato(){ return $this->tipocontrato; }

	public function setStatus($st){ $this->status = $st; }

	public function getStatus(){ return $this->status; }

	public function setCarencia($ca){ $this->carencia = $ca; }

	public function getCarencia(){ return $this->carencia; }

	public function setVigencia($vi){ $this->vigencia = $vi; }

	public function getVigencia(){ return $this->vigencia; }

	public function setValores($va){ $this->valores = $va; }

	public function getValores(){ return $this->valores; }

	public function setPrazo($pr){ $this->prazo = $pr; }

	public function getPrazo(){ return $this->prazo; }

	public function getData(){ return $this->data; }
	
	public function cadastrar(){

		//DEFINIR A DATA
		$this->data = date('Y-m-d H:i:s');
		//INSERIR O CONTRATO NO BANCO 
		$obDatabase = new Database('contrato');
		$this->id = $obDatabase->insert([
			'idco' => $this->getIdCo(),
			'idce' => $this->getIdCe(),
			'tcontrato' => $this->getTipoContrato(),
			'carencia'  => $this->getCarencia(),
			'vigencia'  => $this->getVigencia(),
			'valores'   => $this->getValores(),
			'prazo'     => $this->getPrazo(),
			'status'    => $this->getStatus(),
			'data'      => $this->data

		]);	
		//RETORNAR SUCESSO
		return true;
	}

	public function atualizar(){
		return (new Database('contrato'))->update('id = '.$this->getId(),[
			'idco' => $this->getIdCo(),
			'idce' => $this->getIdCe(),
			'tcontrato' => $this->getTipoContrato(),
			'carencia'  => $this->getCarencia(),
			'vigencia'  => $this->getVigencia(),
			'valores'	=> $this->getValores(),
			'prazo'     => $this->getPrazo(),
			'status'    => $this->getStatus(),
		]);
	}

	public function excluir(){
		return (new Database('contrato'))->delete('id = '.$this->getId());
	}

	public static function getContratos($where = null, $order = null, $limit = null){
		return (new Database('contrato'))->select($where,$order,$limit)
										->fetchAll(PDO::FETCH_CLASS,self::class);
	}

	public static function getContrato($id){
		return (new Database('contrato'))->select('id = '.$id)
										->fetchObject(self::class);
	}

}
