<?php

require_once 'database.php';

class Usuario{

	 private $idUsuario; 
	 private $nome;
	 private $altura;
	 private $peso;
	 private $data_nasc;
	 private $email;
	 private $senha;
	 private $genero;
	 private $is_admin;

	 public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getidUsuario(){
		return $this->idUsuario;
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

	public function getEmail(){
		return $this->email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function getIs_admin(){
		return $this->is_admin;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function setidUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
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

	public function setEmail($email){
		if(strlen($email) <= 45){
			$this->email = $email;
			return 1;
		}
		return 0;
	}

	public function setSenha($senha){
		if(strlen($senha) <= 45){
			$this->senha = sha1($senha);
			return 1;
		}
		return 0;
	}


	public function setIs_admin($is_admin){
		$this->is_admin = $is_admin;
	}

	public function setGenero($genero){
		$this->genero = $genero;
	}

	public function isAdmin(Int $id){
		try{
			$stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE idUsuario = {$id}");
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($result)){
				return $result->is_admin;
			}
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return null;
		}
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO Usuario(nome, email, senha, altura, peso, data_nasc, genero, is_admin) VALUES(:nome, :email, :senha, :altura, :peso, :data_nasc, :genero, :is_admin)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":peso", $this->peso);
			$stmt->bindParam(":data_nasc", $this->data_nasc);
			$stmt->bindParam(":genero", $this->genero);
			$stmt->bindParam(":is_admin", $this->is_admin);
			$stmt->execute();
			$sql = "SELECT * FROM Usuario WHERE email = :email AND senha = :senha";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data->idUsuario;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view($id){
        $stmt = $this->conn->prepare("SELECT * FROM `Usuario` WHERE `idUsuario` LIKE '%" . $id . "%'");
        $stmt->bindParam(":id", $this->idUsuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        
    }

   

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE Usuario SET nome = :nome, email = :email, senha = :senha, altura = :altura, peso = :peso, data_nasc= :data_nasc, genero = :genero, is_admin = :is_admin WHERE idUsuario = :idUsuario");
			$stmt->bindParam(":idUsuario", $this->idUsuario);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":peso", $this->peso);
			$stmt->bindParam(":data_nasc", $this->data_nasc);	
			$stmt->bindParam(":genero", $this->genero);
			$stmt->bindParam(":is_admin", $this->is_admin);	
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($idUsuario){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `Usuario` WHERE `idUsuario` = :idUsuario");
			$stmt->bindParam(":idUsuario", $idUsuario);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}


	public function selecionar($Usuario_idUsuario,$Alimento_idAlimento){
		try{
			$sql = "SELECT u.nome,a.nome, ea.quantidade, ea.data, ea.horario FROM Alimento a, Usuario u, Escolhe_Alimento ea WHERE a.idAlimento = ea.Alimento_idAlimento and ea.Usuario_idUsuario = u.idUsuario and u.idUsuario = $Usuario_idUsuario and a.idAlimento = $Alimento_idAlimento";
			
			$resultado = $this->conn->query($sql);
			$row = $resultado->fetch();
			//echo $row[0] . " - " . $row[1] . " - " . $row[2] . " - " . $row[3] . " - " . $row[4];
			return $row;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function existeConta(){
		try{
			$stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE email = :email and senha = :senha");
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($result)){
				return $result->idUsuario;
			}
		}catch(Exception $e){
			echo $e->getMessage();
			return null;
		}
	}
}


?>