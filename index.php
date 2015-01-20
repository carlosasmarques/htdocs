<?php
	/*
		index.php - formulario de login dos utilizadores
	
		Era só jajão!
	*/
	
	include "acessobd.php";
	$bd = new BaseDados();
	if($bd->contar("utilizadores") == 0){
		header("Location: verificaSessao.php");
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form class="form-signin" action="login.php" method="post">
            <h2 class="form-signin-heading">Autenticação</h2>
            <input type="text" class="form-control" placeholder="Utilizador" title="Introduza o seu nome de utilizador" name="username" autofocus>
            <input type="password" class="form-control" placeholder="Palavra-passe" title="Introduza a sua palavra-passe de autenticação" name="password">
			
			<?php
				if(isset($_GET["erro"]) && !empty($_GET["erro"])){
					if($_GET["erro"] == 1){
						echo '<div class="alert alert-danger">Utilizador ou palavra-passe errados!</div>';
					}
					
					if($_GET["erro"] == 2){
						echo '<div class="alert alert-danger">Não inseriu o utilizador ou palavra-passe!</div>';
					}
				}
				
			?>
			
            <label class="checkbox">
                <input type="checkbox" value="remember-me">Lembra-te de mim
            </label>
            <label class="">
                <a href="esquecer_pass.html">Esqueceu-se da palavra-passe?</a>
            </label>
			<input class="btn btn-lg btn-primary btn-block" type="submit" id= "input-login" name="input-login" value="Entrar" />
        </form>
    </div>
    <!-- /container -->
</body>
</html>
