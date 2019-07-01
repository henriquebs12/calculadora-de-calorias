
<?php
	
	require_once "database.php";

	class Escolhe_Alimento{
		private $Usuario_idUsuario;
		private $Alimento_idAlimento;
		private $quantidade;
		private $data;
		private $horario;


	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	public function getUsuario_idUsuario(){
		return $this->Usuario_idUsuario;
	}

	public function getAlimento_idAlimento(){
		return $this->Alimento_idAlimento;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function getData(){
		return $this->data;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function setUsuario_idUsuario($Usuario_idUsuario){
		$this->Usuario_idUsuario = $Usuario_idUsuario;
	}

	public function setAlimento_idAlimento($Alimento_idAlimento){
		$this->Alimento_idAlimento = $Alimento_idAlimento;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function selecionar($Usuario_idUsuario,$Alimento_idAlimento){
		try{
			$stmt = $this->conn->prepare("SELECT ea.quantidade,ea.data,ea.horario,u.nome,a.nome FROM alimento a, usuario u, escolhe_alimento ea WHERE a.idAlimento = :Alimento_idAlimento and ea.Usuario_idUsuario = :Usuario_idUsuario");
			$stmt->bindParam(":quantidade",$this->quantidade);
			$stmt->bindParam(":data",$this->data);
			$stmt->bindParam(":horario",$this->horario);
			$stmt->bindParam(":nome",$this->Usuario_idUsuario);
			$stmt->bindParam(":nome",$this->Alimento_idAlimento);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_OBJ);
			return $row;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
}

?>