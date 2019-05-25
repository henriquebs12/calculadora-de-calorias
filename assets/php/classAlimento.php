<?php

include 'databasephp';

class Alimento{

	private $id;
	private $nome;
	private $valorCal;
	private $quantProt;
	private $quantCarb;
	private $porcao;
	private $teorLip;
	private $teorFib;

	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getValorCal(){
		return $this->valorCal;
	}

	public function getQuantProt(){
		return $this->quantProt;
	}

	public function getQuantCarb(){
		return $this->quantCarb;
	}

	public function getPorcao(){
		return $this->porcao;
	}

	public function getTeorLip(){
		return $this->teorLip;
	}

	public function getTeorFib(){
		return $this->teorFib;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setValorCal($valorCal){
		$this->valorCal = $valorCal;
	}

	public function setQuantProt($quantProt){
		$this->quantProt = $quantProt;
	}

	public function setQuantCarb($quantCarb){
		$this->quantCarb = $quantCarb;
	}

	public function setPorcao($porcao){
		$this->porcao = $porcao;
	}

	public function setTeorLip($teorLip){
		$this->teorLip = $teorLip;
	}

	public function setTeorFib($teorFib){
		$this->teorFib = $teorFib;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO Alimento(nome = :nome, valorCal = :valorCal, quantProt = :quantProt, quantCarb = :quantCarb, porcao = :porcao, teorLip = : teorLip, teorFib = :teorFib)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":valorCal", $this->valorCal);
			$stmt->bindParam(":quantProt", $this->quantProt);
			$stmt->bindParam(":quantCarb", $this->quantCarb);
			$stmt->bindParam(":porcao", $this->porcao);
			$stmt->bindParam(":teorLip", $this->teorLip);
			$stmt->bindParam(":teorFib", $this->teorFib);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE Alimento SET nome = :nome, valorCal = :valorCal, quantProt = :quantProt, quantCarb = :quantCarb, porcao = :porcao, teorLip = : teorLip, teorFib = :teorFib WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":valorCal", $this->valorCal);
			$stmt->bindParam(":quantProt", $this->quantProt);
			$stmt->bindParam(":quantCarb", $this->quantCarb);
			$stmt->bindParam(":porcao", $this->porcao);
			$stmt->bindParam(":teorLip", $this->teorLip);
			$stmt->bindParam(":teorFib", $this->teorFib);		
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($id){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `Alimento` WHERE `id` = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

}

?>