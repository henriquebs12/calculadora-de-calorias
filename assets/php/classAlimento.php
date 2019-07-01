<?php

require_once 'database.php';

class Alimento{

	private $id;
	private $nome;
	private $valorCal;
	private $quantProt;
	private $quantCarb;
	private $porcao;
	private $teorLip;
	private $teorFib;
	private $TipoAlimento_idCategoria;

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

	public function getTipoAlimento_idCategoria(){
		return $this->TipoAlimento_idCategoria;
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

	public function setTipoAlimento_idCategoria($TipoAlimento_idCategoria){
		$this->TipoAlimento_idCategoria = $TipoAlimento_idCategoria;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO Alimento(nome, valorCal, quantProt, quantCarb, porcao, teorLip, teorFib, TipoAlimento_idCategoria) VALUES (:nome, :valorCal, :quantProt, :quantCarb, :porcao, :teorLip, :teorFib, :TipoAlimento_idCategoria)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":valorCal", $this->valorCal);
			$stmt->bindParam(":quantProt", $this->quantProt);
			$stmt->bindParam(":quantCarb", $this->quantCarb);
			$stmt->bindParam(":porcao", $this->porcao);
			$stmt->bindParam(":teorLip", $this->teorLip);
			$stmt->bindParam(":teorFib", $this->teorFib);
			$stmt->bindParam(":TipoAlimento_idCategoria", $this->TipoAlimento_idCategoria);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE Alimento SET nome = :nome, valorCal = :valorCal, quantProt = :quantProt, quantCarb = :quantCarb, porcao = :porcao, teorLip = : teorLip, teorFib = :teorFib, TipoAlimento_idCategoria = :TipoAlimento_idCategoria WHERE id = :id");
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
			$stmt = $this->conn->prepare("DELETE FROM `Alimento` WHERE `idAlimento` = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function select() {
		try{
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $c;
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function escolheAlimento($alimento_id, $quantidade, $data, $horario, $usuario_id){
		try{

			$stmt = $this->conn->prepare("INSERT INTO Escolhe_Alimento(quantidade, data, horario, Usuario_idUsuario, Alimento_idAlimento) VALUES (:quantidade, :data, :horario, :usuario, :alimento)");
			$stmt->bindParam(":alimento", $this->nome);
			$stmt->bindParam(":quantidade", $quantidade);
			$stmt->bindParam(":horario", $horario);
			$stmt->bindParam(":usuario", $usuario_id);
			$stmt->bindParam(":data", $data);
			$stmt->execute();
			return 1;

		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}
}

?>