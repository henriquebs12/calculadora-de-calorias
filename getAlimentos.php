<?php
require_once 'assets/php/database.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
	function getALimentos(){
		try{
			$database = new Database();
			$conn = $database->dbset();
			$quant_itens = 10;
			if (isset($_GET['p'])) {
				$p = $_GET['p'] - 1;
			}else{
				$p = 0;
			}

			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria LIMIT {$quant_itens} offset {$p}"; //Pega todos os alimentos
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(PDO::FETCH_OBJ);
			echo json_encode($c); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}
	getAlimentos(); //Chama o método}
