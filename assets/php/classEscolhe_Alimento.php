
<?php
	
	require_once "database.php";

	class Escolhe_Alimento{
		private $usuario_id_usuario;
		private $alimento_id_alimento;
		private $quantidade;
		private $data;
		private $horario;


	public function __construct(){
		$database = new Database();
		$dbset = $database->dbset();
		$this->conn = $dbset;
	}

	function getUsuario_Id_Usuario(){
		return $this->usuario_id_usuario;
	}

	function getAlimento_Id_Alimento(){
		return $this->alimento_id_alimento;
	}

	function getQuantidade(){
		return $this->quantidade;
	}

	function getData(){
		return $this->data;
	}

	function getHorario(){
		return $this->horario;
	}

	function setUsuario_Id_Usuario($usuario_id_usuario){
		$this->usuario_id_usuario = $usuario_id_usuario;
	}

	function setAlimento_Id_Alimento($alimento_id_alimento){
		$this->alimento_id_alimento = $alimento_id_alimento;
	}

	function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	function setData($data){
		$this->data = $data;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function selecionar($usuario_id_usuario,$alimento_id_alimento){
		try{
			$stmt = $this->conn->prepare("SELECT ea.quantidade,ea.data,ea.horario,u.nome,a.nome FROM alimento a, usuario u, escolhe_alimento ea WHERE a.idAlimento = ea.Alimento_idAlimento and ea.Usuario_idUsuario = u.idUsuario");
			$stmt->execute();
			return $stmt;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
}

?>