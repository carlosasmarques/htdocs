<?php
	// teste.php - teste de funções/métodos individualmente
	
	include_once "daoutilizador.php";
	include_once "daoviaturas.php";
	
	//$daoutilizador = new DaoUtilizador();	
	//$daoutilizador->alterarPalavraPasse(4, "não quero password");
	
	$daoViaturas = new DaoViaturas();
	
	$daoViaturas->ativarDesativarViatura(1, "0");

	//echo date_default_timezone_get();
	
	
?>