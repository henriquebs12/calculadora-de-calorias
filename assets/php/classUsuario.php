<?php

require_once 'database.php';

class Usuario{

	 private $id;
	 private $nome;
	 private $altura;
	 private $peso;
	 private $data_nasc;

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

	public function getAltura(){
		return $this->altura;
	}

	public function getPeso(){
		return $this->peso;
	}

	public function getData(){
		return $this->data_nasc;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setAltura($altura){
		$this->altura = $altura;
	}

	public function setPeso($peso){
		$this->peso = $peso;
	}

	public function setData($data_nasc){
		$this->data_nasc = $data_nasc;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO Usuario(nome, altura, peso, data_nasc) VALUES(:nome, :altura, :peso, :data_nasc)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":peso", $this->peso);
			$stmt->bindParam(":data_nasc", $this->data_nasc);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE Usuario SET nome = :nome, altura = :altura, peso = :peso, data_nasc= :data_nasc WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":peso", $this->peso);
			$stmt->bindParam(":data_nasc", $this->data_nasc);		
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($id){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `Usuario` WHERE `id` = :id");
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