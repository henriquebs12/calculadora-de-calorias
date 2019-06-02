<?php

require_once 'database.php';

class TipoAlimento{

	private $idTipo;
	private $categoria;

	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getidTipo(){
		return $this->idTipo;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setidTipo($idTipo){
		$this->idTipo = $idTipo;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO TipoAlimento(categoria) VALUES(:categoria)");
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
			$stmt = $this->conn->prepare("UPDATE TipoAlimento SET categoria = :categoria WHERE idTipo = :idTipo");
			$stmt->bindParam(":idTipo", $this->idTipo);
			$stmt->bindParam(":categoria", $this->categoria);
				
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($idTipo){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `TipoAlimento` WHERE `idTipo` = :idTipo");
			$stmt->bindParam(":idTipo", $idTipo);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `TipoAlimento` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

}

?>