<?php
include "login.php";

$administrador = new GereAdministracao();
if($administrador->listarUtilizadores() != NULL){
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
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Autenticação</h2>
            <input type="text" class="form-control" placeholder="Utilizador" title="Introduza o seu nome de utilizador" name="username" autofocus>
            <input type="password" class="form-control" placeholder="Palavra-passe" title="Introduza a sua palavra-passe de autenticação" name="password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me">Lembra-te de mim
            </label>
            <label class="">
                <a href="esquecer_pass.html">Esqueceu-se da palavra-passe?</a>
            </label>
            <a class="btn btn-lg btn-primary btn-block" title="Pressione para concluir a autenticação" onsubmit="login.php">Entrar</a>
        </form>
    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php
    } else {
?>  <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Registar Administrador</h2>
				<label class="form-control" for="nome">Nome</label><br />
				<input class="form-control" type="text" name="nome" id="nome" size="40" maxlength="40" />
				<label class="form-control" for="numero">Numero</label><br />
				<input class="form-control" type="number" name="numero" id="numero" size="30" maxlength="30" />
				<label class="form-control" for="password">Password</label><br />
				<input class="form-control" type="password" name="password" id="password" size="40" maxlength="40" />
				<label class="form-control" for="data-nascimento">Data de nascimento</label><br />
				<input class="form-control" type="text" name="data-nascimento" id="data-nascimento" size="40" maxlength="40" />
				<label class="form-control" for="funcao">Função</label><br />
				<input class="form-control" type="text" name="funcao" id="funcao" size="40" maxlength="40" />
				<label class="form-control" for="telefone">Telefone</label><br />
				<input class="form-control" type="number" name="telefone" id="telefone" size="40" maxlength="40" />
				<label class="form-control" for="morada">Morada</label><br />
				<input class="form-control" type="text" name="morada" id="morada" size="40" maxlength="40" />
				<label class="form-control" for="foto">Foto</label><br />
				<input class="form-control" name="foto" id="foto" type="file" />
        <a class="btn btn-lg btn-primary btn-block" title="Pressione para concluir o registo" onsubmit="GereAdministração.php">Registar</a>
		</form>
    </div>
<?php
    }
?>
</body>
</html>