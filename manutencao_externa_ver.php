<?php
	include "manutencaoexter.php";
	include "geremanutencoesexter.php";
	
	$gere_manutencoesexter = new GereManutencoesExter();
	$manutencaoexter = new manutencaoExter(0, 0, "", "", "", "", "", 0);
	
	$manutencaoexter = $gere_manutencoesexter->listarManutExternas();
	
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

    <title>FMT | Manutenção Externa de Viatura</title>
	
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
                  <a>Utilizador <span class="caret"></span></a>
                  <ul class="sub-menu">
                    <li><a href="alterar_utilizador.html">Alterar Password</a></li>
                    <li><a href="#">Sair</a></li>
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
		
	  <li><a href="Gestao_stock_U.html"><span>Gerir Stocks</span></a>
   </li>
   	  <li class='has-sub'><a><span>Viaturas</span></a>
		<ul>
		  <li ><a href="gerir_viaturas.html"><span>Gerir Viaturas</span></a>
          <li ><a href="manutencao.html"><span>Manutencoes</span></a>
          <li ><a href="abastecer_viatura.html"><span>Abastecimentos</span></a>
		  <li ><a href="gerir_inspecoes.html"><span>Inspeções</span></a>
		</ul>
   </li>
	  <li class='has-sub'><a><span>Transporte de Doentes</span></a>
		<ul>
		  <li ><a href="adicionar_transporte_doentes.html"><span>Adicionar Novo Transporte</span></a></li>
		  <li ><a href="gerir_transporte_doentes.html"><span>Gerir Transporte de Doentes</span></a>
		  <li><a href='gerir_utente.html'><span>Gerir Utentes</span></a>
		</ul>
   </li>
          
        <li><a href='registo_consumos.html'><span>Registo de Consumos</span></a>
                                  
        </li>
    
    
   	    <li class='has-sub'><a><span>Mensagens</span></a>
            <ul>
                <li ><a href='enviar_mensagem.html'><span>Nova Mensagem</span></a></li>
				<li ><a href='mensagens_recebidas.html'><span>Mensagens Recebidas</span></a></li>
				<li ><a href='mensagens_enviadas.html'><span>Mensagens Enviadas</span></a></li>
			</ul>
        </li>
    
</ul>          
</div>


<div class="conteudo">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<ol class="breadcrumb" style="width: 800px">
				<li><a href="inicial.php">Utilizador</a></li>
				<li><a href="./manutencao.html">Manutenção de Viaturas</a></li>
				<li >Ver Manutenção Externa de Viatura </li>
			</ol>
		  
		    <h2 class="sub-header">Manutenção Externa</h2>
			<div class="centered">
				<div class="col-sm-6 col-md-4">				
					<form>
						<div class="form-group">
							<label class="viatura">Viatura:</label>
							<label class="form-control">21-38-XT</label>
								
						</div>					
					</form>
					
					
					<form>
						<div class="form-group">
							<label class="kc">Descrição da avaria:</label>
							<label class="form-control" id="kc1"><?php echo $manutencaoexter->getDescricaoAvaria() ?></label>
						</div>
					</form>	
					<form>
						<div class="form-group">
							<label class="kc">Descrição da reparação:</label>
							<label class="form-control" id="kc2"><?php echo $manutencaoexter->getDescReparacao() ?></label>
						</div>
					</form>	
					<form>
						<div class="form-group">
							<label class="horapar">Preço da reparação:</label>
							<label class="form-control" id="horap1"><?php echo $manutencaoexter->getCustoReparacao() ?></label>
						</div>
					</form>	
										
				</div>
				
				<div class="col-sm-6 col-md-4">				
					<form>
						<div class="form-group">
							<label class="horapar">Data da avaria:</label>
							<label class="form-control" id="horap2"><?php echo $manutencaoexter->getDataAvaria() ?></label>
						</div>
					</form>	
					
				
					<form>
						<div class="form-group">
							<label class="horapar">Oficina:</label>
							<label class="form-control" id="horap3"><?php echo $manutencaoexter->getOficina() ?></label>
						</div>
					</form>	
					<form>
						<div class="form-group">
							<label class="horapar">Data da reparação:</label>
							<label class="form-control" id="horap4"><?php echo $manutencaoexter->getDataReparacao() ?></label>
						</div>
					</form>	
						
				</div>
				
				
				
				

		
			</div>
			
	
		</div>	
		  		<a href="./manutencao.html" class="btn btn-danger btn-xl pull-right " > Voltar </a>
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
	