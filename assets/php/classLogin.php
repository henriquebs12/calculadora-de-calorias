<?php 

include_once 'database.php';

class Login{
	
	private $id; 
	private $email;
	private $senha;


	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getId(){
		return $this->id;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setId($id){
		$this->id = $id;
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

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO login(email, senha) VALUES(:email, :senha)");
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE login SET email = :email, senha = :senha WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);		
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete($id){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `login` WHERE `id` = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function existeEmail(){
		try{
			$stmt = $this->conn->prepare("SELECT * FROM login WHERE email = :email");
			$stmt->bindParam(":email", $this->email);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($result)){
				return true;
			}
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function existeConta(){
		try{
			$stmt = $this->conn->prepare("SELECT * FROM login WHERE email = :email and senha = :senha");
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":senha", $this->senha);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($result)){
				return $result->id;
			}
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return null;
		}
	}

	public function indexEmail(){
        $stmt = $this->conn->prepare("SELECT * FROM `login`");
        $stmt->execute();
        return $stmt;
    }

}

?>
