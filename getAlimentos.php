<?php
require_once 'assets/php/database.php';
	function getALimentos(){
		try{
			$database = new Database();
			$conn = $database->dbset();

			$sql = "SELECT `idAlimento`, `nome`,`valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Categoria` FROM `Alimento` as A JOIN `TipoAlimento` as B on A.TipoAlimento_idTipo = B.idCategoria"; //Pega todos os alimentos
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$c = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return var_dump(json_encode($c)); //Retorna um JSON dos alimentos
		}catch(Exception $e){
			echo $e->getMessage();
			return 0;
		}
	}
	getAlimentos(); //Chama o método}
