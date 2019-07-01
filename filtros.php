<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
require_once 'assets/php/database.php';

	function getAlimentosOrdemDecrescenteCalorias(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY valor_cal DESC"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteCalorias(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY valor_cal ASC"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemAlfabetica(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY nome ASC"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteProteinas(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY quantidade_proteina ASC"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteLipideos(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY teor_lipidico ASC"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	/*chamando as funcoes*/

	getAlimentosOrdemDecrescenteCalorias();
	getAlimentosOrdemCrescenteCalorias();
	getAlimentosOrdemAlfabetica();
	getAlimentosOrdemCrescenteProteinas();
	getAlimentosOrdemCrescenteLipideos();

?>