<?php

include 'database.php';

class TipoAlimento{

	private $id;
	private $categoria;

	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getId(){
		return $this->id;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO TipoAlimento(id = :id, categoria = :categoria");
			$stmt->bindParam(":categoria", $this->categoria);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE TipoAlimento SET categoria = :categoria WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":categoria", $this->categoria);
				
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($id){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `TipoAlimento` WHERE `id` = :id");
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