<?php
	include_once "sessaoOk.php";
	include "Abastecimentos.php";
	include "GereAbastecimentos.php";
	include "Viaturas.php";
	include "GereViaturas.php";
        
        $gere_abastecimento = new GereAbastecimentos();
        $abastecimento = new Abastecimentos(0,"","",0, "", "", "");
        $gere_viaturas = new GereViaturas();
        $viaturas = new Viaturas(0, "", "", "", "", "", 0, 0, 0, 0, 0, 0, "", true);
        //$viaturas = new Viaturas(0, "", "", "", "", "", "", "", 0, "", 0, 0, "", true);

        $viaturas = $gere_viaturas ->listarViaturas();
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

    <title>FMT | Abastecer Viatura</title>
	
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
	
  <body style="margin:auto;">

     <div class="navbar navbar-inverse nav-sidebar " style="margin:auto;" role="navigation">
	<img class="banner" src="Banner.png" alt="Smiley face"  height = "150" width= "1200">
      <div class="container-fluid">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicial.php">FireManTool</a>
        </div>
        <div class="navbar-collapse collapse" style="background-color: #FFCC33;">
          <ul class="nav navbar-nav navbar-right">
           <li class="drop-menu" style="z-index: 1">
                  <a><?php echo $_SESSION["user"]; ?><span class="caret"></span></a>
                  <ul class="sub-menu">
                    <li><a href="alterar_utilizador.php">Alterar Password</a></li>
                    <li><a href="login.php?logout=1">Sair</a></li>
                  </ul>
               </li>
				
          </ul>
        </div>
      </div>
    </div>

 <div class="container-fluid">
      <div class="centered">
        <div id='cssmenu'>
<ul>
   <li><a href="inicial.php"><span>Principal</span></a></li>
		
	  <li><a href="Gestao_stock_U.php"><span>Gerir Stocks</span></a>
   </li>
   	  <li class='has-sub'><a><span>Viaturas</span></a>
		<ul>
		  <li ><a href="gerir_viaturas.php"><span>Gerir Viaturas</span></a>
          <li ><a href="manutencao.php"><span>Manutencoes</span></a>
          <li ><a href="abastecer_viatura.php"><span>Abastecimentos</span></a>
		  <li ><a href="gerir_inspecoes.php"><span>Inspeções</span></a>
		</ul>
   </li>
	  <li class='has-sub'><a><span>Transporte de Doentes</span></a>
		<ul>
		  <li ><a href="adicionar_transporte_doentes.php"><span>Adicionar Novo Transporte</span></a></li>
		  <li ><a href="gerir_transporte_doentes.php"><span>Gerir Transporte de Doentes</span></a>
		  <li><a href='gerir_utente.php'><span>Gerir Utentes</span></a>
		</ul>
   </li>
          
        <li><a href='registo_consumos.php'><span>Registo de Consumos</span></a>
                                  
        </li>
    
    
   	    <li class='has-sub'><a><span>Mensagens</span></a>
            <ul>
                <li ><a href='enviar_mensagem.php'><span>Nova Mensagem</span></a></li>
				<li ><a href='mensagens_recebidas.php'><span>Mensagens Recebidas</span></a></li>
				<li ><a href='mensagens_enviadas.php'><span>Mensagens Enviadas</span></a></li>
			</ul>
        </li>
    
</ul>          
</div>
<div class="conteudo">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<ol class="breadcrumb" style="width: 800px">
				<li><a href="inicial.php">Utilizador</a></li>
				<li><a href="./abastecer_viatura.php">Gerir Abastecimentos</a></li>
				<li >Abastecer Viatura</li>
			</ol>
		  
			<div class="centered">
				 <h2 class="sub-header">Abastecer Viatura</h2>
				<div class="col-sm-6 col-md-4">				
                                    <form method="POST">
						<div class="form-group">
							<label class="viatura">Viatura:</label>
							<select class="form-control">
								<option id="matricula">Indique a matrícula da viatura...</option>
					<?php
                                            for($i=0; $i<count($viaturas); $i++){
							echo "<option>".$viaturas[$i]->getMatricula()."</option>";
			
                                            }
                                        ?>			
							</select>
						</div>					
					</form>
					
					<form method="POST">
						<div class="form-group">
							<label class="horapar">Quantidade de Combustível:</label>
							<input type="text" class="form-control" id="quantidadeCombustivel" placeholder="Quantidade em Litros" maxlength="5">
						</div>
					</form>	
					<form method="POST">
						<div class="form-group">
							<label class="data">Local:</label>
							<input type="text" class="form-control" id="localAbast" placeholder="Inserir dados">
						</div>				
					</form>	
										
				</div>
				
				<div class="col-sm-6 col-md-4">				
					<form method="POST">
						<div class="form-group">
							<label class="data">Data do abastecimento:</label>
							<input type="date" class="form-control" id="dataAbastecimento">
						</div>				
					</form>	
					
				
					<form method="POST">
						<div class="form-group">
							<label class="kc">Quilómetros:</label>
							<input type="text" class="form-control" id="quilometragem" placeholder="Altere os dados">
						</div>
					</form>	
						
				</div>
				
				
			<?php
                                 if(isset($_POST["matricula"]) && !empty($_POST["matricula"])&& isset($_POST["localAbast"]) && !empty($_POST["localAbast"]) && isset($_POST["quantidadeCombustivel"]) && !empty($_POST["quantidadeCombustivel"]) && isset($_POST["dataAbastecimento"]) && !empty($_POST["dataAbastecimento"]) && isset($_POST["mediaDesteAbastecimento"]) && !empty($_POST["mediaDesteAbastecimento"])){
                                    $abastecimento =$gere_abastecimento->adicionarAbastecimento();
                                }
                        ?>

		
			</div>
	
		</div>	
		  		<a href="./abastecer_viatura.php" class="btn btn-danger btn-xl pull-right" > Voltar </a>
			<a class="btn btn-primary btn-xl pull-right"  href="./abastecer_viatura.php"> Guardar </a><br/>
	</div>
	</div>
    </div>
      
    
		
	  


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
