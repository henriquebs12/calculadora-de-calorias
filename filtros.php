<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
require_once 'assets/php/database.php';

	function getAlimentosOrdemDecrescenteCalorias($p = 0){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;

			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY valor_cal DESC LIMIT {$quant_itens} offset {$p}"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteCalorias($p = 0){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY valor_cal ASC LIMIT {$quant_itens} offset {$p}"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemAlfabetica($p = 0){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY nome ASC LIMIT {$quant_itens} offset {$p}"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteProteinas($p = 0){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY quantidade_proteina ASC LIMIT {$quant_itens} offset {$p}"; 
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}

	function getAlimentosOrdemCrescenteLipideos($p = 0){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;
			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria ORDER BY teor_lipidico ASC LIMIT {$quant_itens} offset {$p}"; 
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

	$filtro = $_GET['f'];
	$p = (isset($_GET['p'])) ? $_GET['p'] - 1 : 0;

	if ($filtro == 'cal_dec' ) {
		getAlimentosOrdemDecrescenteCalorias($p);
	}elseif($filtro == 'cal_asc'){
		getAlimentosOrdemCrescenteCalorias($p);
	}elseif($filtro == 'alf'){
		getAlimentosOrdemAlfabetica($p);
	}elseif($filtro == 'prot_asc'){
		getAlimentosOrdemCrescenteProteinas($p);
	}elseif($filtro == 'lip_asc'){
		getAlimentosOrdemCrescenteLipideos($p);
	}


?>