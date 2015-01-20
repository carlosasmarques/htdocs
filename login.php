<?php
	// login.php - trata de iniciar a sessão dos utilizadores

	include "daoutilizador.php";

	if(
		isset($_POST["username"]) && !empty($_POST["username"]) &&
		isset($_POST["password"]) && !empty($_POST["password"])
	){
		
		// abrir ligação à base de dados
		$bd = new BaseDados();
		$daoutilizador = new DaoUtilizador();

		// carrega o utilizador com o username dado
		$utilizador = $daoutilizador->obtemUtilizadorUsername($_POST["username"]);
		 
		// verifica se foi carregado um objeto na variável "utilizador"
		if ($utilizador = null){
			header("Location: index.php?erro=1");
		}else{
						
			//verifica se o username que veio da base de dados é igual ao inserido
			if(
				!strcmp($_POST["username"], $username->getUsername()) &&
				!strcmp($_POST["password"], $username->getPassword()) &&
				$username->getActivo() == true
			){
				// Guardar o nome de utilizador da sessão
				$_SESSION["user"] = $username->getUsername(); 
				
				// Verificar se se trata de um utilizador comum ou administrador
				$_SESSION["tipo_user"] = $username->getTipoUtilizador();
					
			}else{
				header("Location: index.php?erro=1");
			}
		}
	}else{
		header("Location: index.php?erro=2");
	}
?>