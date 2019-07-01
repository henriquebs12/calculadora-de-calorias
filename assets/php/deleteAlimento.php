<?php
	require_once "classAlimento.php";
	$alimento = new Alimento();
	$alimento->delete($_GET['id']);