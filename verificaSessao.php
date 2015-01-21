<?php

include_once 'daoutilizador.php';
include_once 'utilizadores.php';

$bd = new BaseDados();

if ($bd->contar("utilizadores") == 0){
    
    inserirAdministrador();
	
}

function inserirAdministrador(){
	
	// definir o fuso horario para deixar de dar Warnings
	date_default_timezone_set('Europe/Lisbon');
	
    $nome = "Administrador";
    $numero = "0";
    $username = "administrador";
    $password = "1234";
    $tipoUtilizador = "Administrador";
    $dataDeRegisto = date('Y-m-d', time());
    $morada = "Rua Dr. Alberto Moura Pinto";
    $telefone = "235721503";
    $dataNascimento = date('Y-m-d', time());
    $funcao = "patrão";
    $ativo = "1";
    $caminhoFoto = "./fotografias/administrador.png";
    
    $admin = new Utilizadores(NULL, $nome, $numero, $username, $password, $tipoUtilizador, $dataDeRegisto, $morada, 
                              $telefone, $dataNascimento, $funcao, $ativo, $caminhoFoto);
    
    $daoUtilizador = new DaoUtilizador();
    
    $daoUtilizador->adicionarUtilizador($admin);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Autenticação</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="Login.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
		<div class="alert alert-success">Base de dados vazia!<br>Foi criado o primeiro administrador<br><a class="btn btn-lg btn-primary btn-block" href="index.php">Voltar</a></div>
    </div>
    <!-- /container -->
</body>
</html>
