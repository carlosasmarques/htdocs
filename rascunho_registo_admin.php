<?php
	include "acessobd.php";
	
	$bd = new BaseDados();

	// inserir apenas se a tabela "utilizador" estiver vazia (não inserir 2x)
	if(($bd->contar("utilizador")) == 0){
	
		// verificar se todos os dados foram preenchidos
		if(
		isset($_POST["nome"]) && !empty($_POST["nome"]) &&
		isset($_POST["numero"]) && !empty($_POST["numero"]) &&
		isset($_POST["username"]) && !empty($_POST["username"]) &&
		isset($_POST["password"]) && !empty($_POST["password"]) &&
		isset($_POST["data-nascimento"]) && !empty($_POST["data-nascimento"]) &&
		isset($_POST["funcao"]) && !empty($_POST["funcao"]) &&
		isset($_POST["telefone"]) && !empty($_POST["telefone"]) &&
		isset($_POST["morada"]) && !empty($_POST["morada"]) &&
		$_FILES["logo"]["error"] == 0
		){
			// verificar o tipo e tamanho do ficheiro de foto (< 2Mb)
			if((
			($_FILES["foto"]["type"] == "image/gif") ||
			($_FILES["foto"]["type"] == "image/jpeg") ||
			($_FILES["foto"]["type"] == "image/jpg") ||
			($_FILES["foto"]["type"] == "image/png")
			) && ($_FILES["foto"]["size"] < 2000000)){
			
				// apagar o ficheiro se já existir
				if(file_exists("foto/" . $_FILES["foto"]["name"])){
					unlink("foto/" . $_FILES["foto"]["name"]);
				}
				
				// guardar a foto com o nome corrigido
				$separar = explode(".", $_FILES["foto"]["name"]);
				$ext = $separar[count($separar)-1];
				move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/foto-" . $_POST["username"] . "." . $ext);
				
				// guardar os dados
				$dados = array(
					'nome' => $_POST["nome"],
					'numero' => $_POST["numero"],
					'username' => $_POST["username"],
					'password' => $_POST["password"],
					'data-nascimento' => $_POST["data-nascimento"],
					'funcao' => $_POST["funcao"],
					'telefone' => $_POST["telefone"],
					'morada' => $_POST["morada"],
					'foto' => $_POST["foto"],
				);
				
				/*
					Nota: Chamar o adicionar utilizador
				*/
				
			}else{
				// mostrar mensagem de erro
				echo "Erro ao registar o administrador!";
			}
		}else{
			// mostrar mensagem de erro
			echo "Erro ao registar o administrador!";
		}

		
	}
	
	// já foi registado um administrador
	if(($bd->contar("utilizador")) != 0){
		echo "Erro ao registar o administrador!<br>Já existe um administrador registado na base de dados";
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Configuração inicial</title>
</head>
<body>
	<div id="div-config">
		<h1><img src="img/config.png" alt="configuração"> Configuração inicial</h1>
		<hr>
		<h2>Administrador</h2>
		<hr>
		<form action="----------VERIFICAR----------.php" method="POST" enctype="multipart/form-data">
			<div id="div-formulario">
			
			'nome' => $_POST["nome"],
					'numero' => $_POST["numero"],
					'username' => $_POST["username"],
					'password' => $_POST["pasword"],
					'data-nascimento' => $_POST["data-nascimento"],
					'funcao' => $_POST["funcao"],
					'telefone' => $_POST["telefone"],
					'morada' => $_POST["morada"],
					'foto' => $_POST["foto"],
			
				<label for="nome">Nome</label><br />
				<input type="text" name="nome" id="nome" size="40" maxlength="40" />
				<br /><br />
				<label for="numero">Numero</label><br />
				<input type="text" name="numero" id="numero" size="30" maxlength="30" />
				<br /><br />
				<label for="password">Password</label><br />
				<input type="password" name="password" id="password" size="40" maxlength="40" />
				<br /><br />
				<label for="data-nascimento">Data de nascimento</label><br />
				<input type="text" name="data-nascimento" id="data-nascimento" size="40" maxlength="40" />
				<br /><br />
				<label for="funcao">Função</label><br />
				<input type="text" name="funcao" id="funcao" size="40" maxlength="40" />
				<br /><br />
				<label for="telefone">Telefone</label><br />
				<input type="text" name="telefone" id="telefone" size="40" maxlength="40" />
				<br /><br />
				<label for="morada">Morada</label><br />
				<input type="text" name="morada" id="morada" size="40" maxlength="40" />
				<br /><br />
				<label for="foto">Foto</label><br />
				<input name="foto" id="foto" type="file" />
			</div>
			<br /><br />
			<hr>
			<input type="submit" name="submit" value="Guardar" />
		</form>
	</div>
</body>
</html>