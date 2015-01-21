<?php
include_once "sessaoOk.php";
include_once "GereTransportes.php";
include_once "GereUtilizadores.php";
include_once "gereviaturas.php";

$gere_utilizador = new GereUtilizadores ();
$utilizador = new Utilizadores ( 0, "", 0, "", "", "", "", "", 0, "", "", 0, "" );
$utilizador = $gere_utilizador->listarUtilizador ();

$gere_transportes = new GereTransportes ();

//$gere_transportes->adicionarTransporte ( $transportes );

$gere_viaturas = new GereViaturas ();
$viaturas = new Viaturas ( 0, "", "", "", "", 0, 0, 0, 0, 0, 0, 0, "", 0 );
$viaturas = $gere_viaturas->listarViaturas ();

	
if(
	isset($_POST["func"]) && !empty($_POST["func"]) &&
	isset($_POST["viatur"]) && !empty($_POST["viatur"]) &&
	isset($_POST["dataTransporte"]) && !empty($_POST["dataTransporte"]) &&
	isset($_POST["horaDePartida"]) && !empty($_POST["horaDePartida"]) &&
	isset($_POST["horaDeChegada"]) && !empty($_POST["horaDeChegada"]) &&
	isset($_POST["origem"]) && !empty($_POST["origem"]) &&
	isset($_POST["destino"]) && !empty($_POST["destino"]) &&
	isset($_POST["observacoes"]) && !empty($_POST["observacoes"]) &&
	isset($_POST["condut"]) && !empty($_POST["condut"]) &&
	isset($_POST["quilometrospartida"]) && !empty($_POST["quilometrospartida"]) ){
	
	
	
	$transportes = new Transportes (0, $_POST["func"], $_POST["viatur"], $_POST["dataTransporte"], $_POST["horaDePartida"], $_POST["horaDeChegada"], $_POST["origem"], $_POST["destino"], $_POST["observacoes"], $_POST["condut"], $_POST["quilometrospartida"]);
	
	 $gere_transportes->adicionarTransporte($transportes);
}
	 

?>


<!DOCTYPE html>
<html lang="pt-pt">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>FMT | Adicionar Transporte Doentes</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">

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

<body style="margin: auto;">

	<div class="navbar navbar-inverse nav-sidebar " style="margin: auto;"
		role="navigation">
		<img class="banner" src="Banner.png" alt="Smiley face" height="150"
			width="1200">
		<div class="container-fluid">
			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="inicial.php">FireManTool</a>
			</div>
			<div class="navbar-collapse collapse"
				style="background-color: #FFCC33;">
				<ul class="nav navbar-nav navbar-right">
					<li class="drop-menu" style="z-index: 1"><a><?php echo $_SESSION["user"]; ?><span
							class="caret"></span></a>
						<ul class="sub-menu">
							<li><a href="alterar_utilizador.php">Alterar Password</a></li>
							<li><a href="login.php?logout=1">Sair</a></li>
						</ul></li>

				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="centered">
			<div id='cssmenu'>
				<ul>
					<li><a href="inicial.php"><span>Principal</span></a></li>

					<li><a href="Gestao_stock_U.php"><span>Gerir Stocks</span></a></li>
					<li class='has-sub'><a><span>Viaturas</span></a>
						<ul>
							<li><a href="gerir_viaturas.php"><span>Gerir Viaturas</span></a>
							
							<li><a href="manutencao.php"><span>Manutencoes</span></a>
							
							<li><a href="abastecer_viatura.php"><span>Abastecimentos</span></a>
							
							<li><a href="gerir_inspecoes.php"><span>Inspeções</span></a>
						
						</ul></li>
					<li class='has-sub'><a><span>Transporte de Doentes</span></a>
						<ul>
							<li><a href="adicionar_transporte_doentes.php"><span>Adicionar
										Novo Transporte</span></a></li>
							<li><a href="gerir_transporte_doentes.php"><span>Gerir Transporte
										de Doentes</span></a>
							
							<li><a href='gerir_utente.php'><span>Gerir Utentes</span></a>
						
						</ul></li>

					<li><a href='registo_consumos.php'><span>Registo de Consumos</span></a>

					</li>


					<li class='has-sub'><a><span>Mensagens</span></a>
						<ul>
							<li><a href='enviar_mensagem.php'><span>Nova Mensagem</span></a>
							</li>
							<li><a href='mensagens_recebidas.php'><span>Mensagens Recebidas</span></a>
							</li>
							<li><a href='mensagens_enviadas.php'><span>Mensagens Enviadas</span></a>
							</li>
						</ul></li>

				</ul>
			</div>


			<div class="conteudo">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<ol class="breadcrumb" style="width: 800px">
						<li><a href="inicial.php">Utilizador</a></li>
						<li><a href="gerir_transporte_doentes.php">Gestão Transporte
								Doentes</a></li>
						<li>Adicionar Transporte Doentes</li>
					</ol>

					<form action="adicionar_transporte_doentes.php" method="post">
						<div class="centered">

							<div class="col-sm-6 col-md-4">


								<div class="form-group">
									<label class="funci">Funcionário:</label> <select
										class="form-control" id="func" name="func">
										<option value="">Escolha Funcionário...</option>
                                    	<?php
                                    	for($u=0; $u<count($utilizador); $u++){
											echo '<option value="' . $utilizador[$u]->getIdUtilizadores() . '">' . $utilizador[$u]->getNome() . '</option>';
										}
                                    	?>
                                    </select>
								</div>

								<div class="form-group">
									<label class="viatura">Viatura:</label> <select
										class="form-control" id="viatur" name="viatur">
										<option value="desc">Escolha Viatura...</option>
										<?php
										for($v=0; $v<count($viaturas); $v++){
											echo '<option value="' . $viaturas[$v]->getIdViaturas() . '">' . $viaturas[$v]->getMarca() . '</option>';
										}
										?>
                                    </select>
								</div>

								<div class="form-group">
									<label class="data">Data Transporte :</label> <input
										type="date" class="form-control" id="dataTransporte" name="dataTransporte">
								</div>

								<div class="form-group">
									<label class="horapar">Hora Partida:</label> <input type="text"
										class="form-control" id="horaDePartida" name="horaDePartida" placeholder="hh:mm"
										maxlength="5">
								</div>

								<div class="form-group">
									<label class="horache">Hora Chegada:</label> <input type="text"
										class="form-control" id="horaDeChegada" name="horaDeChegada" placeholder="hh:mm"
										maxlength="5">
								</div>

								<div class="form-group">
									<label class="origem">Origem Transporte:</label> <input
										type="text" class="form-control" id="origem" name="origem"
										placeholder="Inserir dados">
								</div>

								<div class="form-group">
									<label class="destino">Destino Transporte:</label> <input
										type="text" class="form-control" id="destino" name="destino"
										placeholder="Inserir dados">
								</div>


							</div>

							<div class="col-sm-6 col-md-4">

								<!--                         		<div class="form-group"> -->
								<!--                                 	<label class="utent">Utente:</label> -->
								<!-- 									<select class="form-control"> -->
								<!-- 										<option value="desc">Escolha Utente para o Transporte...</option> -->
								<!-- 										<option value="data">Amilcar</option> -->
								<!-- 										<option value="hora">João</option> -->
								<!-- 										<option value="hora">Freitas</option> -->
								<!-- 									</select> -->
								<!-- 								</div> -->

								<div class="form-group">
									<label class="Desc">Descrição:</label>
									<textarea class="form-control" name="observacoes"  id="observacoes" rows="5"
										cols="30" placeholder="Insira a Descrição"></textarea>
								</div>

								<div class="form-group">
									<label class="cond">Condição Utente:</label> <select
										class="form-control" id="condut" name="condut">
										<option value="cond">Escolha Condição...</option>
										<option value="sentado">Sentado</option>
										<option value="acamado">Acamado</option>
										<option value="cadeirarodas">Cadeira de Rodas</option>
									</select>
								</div>

								<div class="form-group">
									<label class="ks">Quilómetros Saída:</label> <input type="text"
										class="form-control" id="quilometrospartida" name="quilometrospartida"
										placeholder="Insira os dados">
								</div>

								<div class="pull-right">

									<a class="btn btn-danger btn-xl"
										href="gerir_transporte_doentes.php"> Voltar </a>
										<input class="btn btn-primary btn-xl" type="submit" value="Adicionar"><br />

								</div>

							</div>





						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/docs.min.js"></script>
</body>

</html>
