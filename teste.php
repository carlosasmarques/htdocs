<?php
	// teste.php - teste de funções/métodos individualmente
	
	include "daoutilizador.php";
	
	$daoutilizador = new DaoUtilizador();
	
	$daoutilizador->alterarPalavraPasse(4, "não quero password");

	//echo date_default_timezone_get();
	
	
?>