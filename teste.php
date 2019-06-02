<?php

require_once 'assets/php/classTipoAlimento.php';


$tipo = new TipoAlimento();

?>

<select name="cars" size="4" multiple>
	<option value="teste">
    <?php
    	$stmt = $tipo->index();
    	echo $stmt;
    ?>

            
</select>