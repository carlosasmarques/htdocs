<?php
	// login.php - trata de iniciar a sessão dos utilizadores

	include "daoutilizador.php";
        include_once "utilizadores.php";

	if(isset($_POST["username"]) && !empty($_POST["username"]) &&
           isset($_POST["password"]) && !empty($_POST["password"])){
		// abrir ligação à base de dados
		$bd = new BaseDados();
		$daoutilizador = new DaoUtilizador();
        $utilizador = new Utilizadores("", "", "", "", "", "", "", "", "", "", "", "", "");
		
		// carrega o utilizador com o username dado
		$utilizador = $daoutilizador->obtemUtilizadorUsername($_POST["username"]);
		 
		// verifica se foi carregado um objeto na variável "utilizador"
		if ($utilizador == null){
			header("Location: index.php?erro=1");
		}else{
						
			//verifica se o username que veio da base de dados é igual ao inserido
			if(
				!strcmp($_POST["username"], $utilizador->getUsername()) &&
				!strcmp($_POST["password"], $utilizador->getPassword()) &&
				$utilizador->getAtivo() == 1){
					
				// Guardar o nome de utilizador da sessão
				$_SESSION["user"] = $utilizador->getUsername(); 
				
				// Verificar se se trata de um utilizador comum ou administrador
				$_SESSION["tipo_user"] = $utilizador->getTipoUtilizador();
				header("Location: inicial.php");	
			}else{
				header("Location: index.php?erro=3");
			}
		}
	}else{
		//header("Location: index.php?erro=2");
	}
?>