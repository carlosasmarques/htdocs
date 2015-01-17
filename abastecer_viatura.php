<?php
        include "Viaturas.php";
	include "GereViaturas.php";
	
        $gere_viaturas = new GereViaturas();
        $viaturas = new Viaturas(0, "", "", "", "", "", "", "", 0, "", 0, 0, "", true);
        $idViatura = $_GET["id"];
        $viaturas = $gere_viaturas->listarViaturas();
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

    <title>FMT | Gerir Abastecimentos</title>
	
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
          <a class="navbar-brand" href="inicial.html">FireManTool</a>
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
   <li><a href="inicial.html"><span>Principal</span></a></li>
		
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
		  <li><a href="./inicial.html">Utilizador</a></li>
		  <li class="active">Gerir Abastecimentos</li>
		</ol>


          <h2 class="sub-header">Gerir Abastecimentos</h2>
          <div class="table-responsive">
		  
				<div class="pull-left">
					<form class="form-inline">
						<div method="POST" class="btn-group">
							&nbsp;&nbsp;&nbsp;
							<input  class="form-control" type="text" id="procurar" placeholder="Procurar">
							<select class="form-control" >
								<option value="matricula">Matrícula</option>
							</select>
                                                        <?php
							    if(isset($_POST["procurar"]) && !empty($_POST["procurar"])){
                                                                $viaturas = $gere_viaturas->pesquisaPorMatricula();
                                                            }
							?>
							<br />
							<br />
						</div>
					</form>
				</div>

				
		  </div>
			<a class="btn btn-primary btn-xl pull-right"  href="./adicionar_abastecimento.html"> Abastecer Viatura </a>
			
		 

           <div class="col-sm-9 col-md-10" style="width:90%;margin-top:5px;">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
						<span class="list-group-item">
								<span class="name" style="min-width: 60px; display: inline-block;">ID</span> 
								<span class="Quantidade" style="min-width: 120px; display: inline-block;">Matrícula</span>
								<span class="Quantidade" style="min-width: 140px; display: inline-block;">Quantidade</span>
								<span class="Quantidade" style="min-width: 120px; display: inline-block;">Quilómetros</span>
								<span class="Quantidade" style="min-width: 150px; display: inline-block;">Consumo</span>
								<span class="opcao" style="min-width: 120px; display: inline-block;">Opção</span>
								
								</span>
                                    <?php
                                                for($i=0; $i<count($viaturas); $i++){
                                                        echo'<div class="list-group-item">';


                                                        echo'    <span style="min-width: 40px; display: inline-block;">' . $viaturas[$i]->getMatricula() . '</span> ';
                                                        echo'    <span style="min-width: 100px; display: inline-block;">' . $viaturas[$i]->getCapacidadeDeposito() . '</span>';
                                                        echo'    <span style="min-width: 90px; display: inline-block;">' . $viaturas[$i]->getQuilometragem() . '</span>';
                                                        echo'    <span style="min-width: 160px; display: inline-block;">' . $viaturas[$i]->getConsumoMedio() . '</span>';
                                                        echo'    <span style="min-width: 80px; display: inline-block;"><a href="Ver_Editar_U.php?id=' . $viaturas[$i]->getId() . '" class="btn btn-xs" >Ver / Editar</a></span>';
                                                        echo'    <span style="min-width: 80px; display: inline-block;"><a href="Gestao_Stock_U.php?id=' . $viaturas[$i]->getId() . '" class="btn btn-xs" >Repor</a></span>';
                                                        echo'</div>';
                                                }
                                    ?>
                        <br>
                        

		  </div>
        </div>
      </div>
			
    </div>
        </div>
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
