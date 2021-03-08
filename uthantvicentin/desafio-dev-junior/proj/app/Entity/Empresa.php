<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Empresa{
	private $id;
	private $razaoSocial;
	private $cnpj;
	private $endereco;
	private $telefone;

	public function setId($i){ $this->id = $i;	}

	public function getId(){ return $this->id; }

	public function setRazaoSocial($rs){ $this->razaoSocial = $rs; }

	public function getRazaoSocial(){ return $this->razaoSocial; }

	public function setCnpj($cn){ $this->cnpj = $cn; }

	public function getCnpj(){ return $this->cnpj; }

	public function setEndereco($en){ $this->endereco = $en; }

	public function getEndereco(){ return $this->endereco; }

	public function setTelefone($te){ $this->telefone = $te; }

	public function getTelefone(){ return $this->telefone; }

	public function cadastrar($tipo){

		$obDatabase = new Database($tipo);
		$this->id = $obDatabase->insert([
			'razaosocial' => $this->getRazaoSocial(),
			'cnpj' => $this->getCnpj(),
			'endereco'=> $this->getEndereco(),
			'telefone' => $this->getTelefone()
		]);

		return true;
	}

	public function atualizar($tipo){
		return (new Database($tipo))->update('id = '.$this->getId(),[
			'razaosocial' => $this->getRazaoSocial(),
			'cnpj' => $this->getCnpj(),
			'endereco' => $this->getEndereco(),
			'telefone' => $this->getTelefone()
		]);
	}

	public static function getEmpresasContratado($where = null, $order = null, $limit = null, $tipo){
		return (new Database($tipo))->selectContratado($where,$order,$limit)
									->fetchAll(PDO::FETCH_CLASS,self::class);
	}

	public static function getEmpresas($where = null, $order = null, $limit = null, $tipo){
		return (new Database($tipo))->select($where,$order,$limit)
									->fetchAll(PDO::FETCH_CLASS,self::class);
	}

	public static function getEmpresa($tipo, $ident){
		return (new Database($tipo))->select('id = '.$ident)
									->fetchObject(self::class);
	}

	public function excluir($tipo){
		return (new Database($tipo))->delete('id = '.$this->getId());
	}
}
