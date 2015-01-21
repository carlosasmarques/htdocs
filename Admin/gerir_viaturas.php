<?php
	include_once "sessaoOk.php";
	include_once "gereviaturas.php";
	include_once "daoviaturas.php";
	
	$gere_viaturas = new GereViaturas();
	$viaturas = new Viaturas(0, "", "", "", "", 0, 0, 0, 0, 0, 0, 0, "", 0);
	
	$daoViaturas = new DaoViaturas();

	// ações "desativar", "ativar"
	if(
		// verificar variaveis GET
		isset($_GET["id"]) && !empty($_GET["id"]) &&
		isset($_GET["accao"]) && !empty($_GET["accao"])
	){
		// ativar
		if(!strcmp($_GET["accao"], "ativar")){
			$daoViaturas->ativarDesativarViatura(1, $_GET["id"]);
		}
		
		// desativar
		if(!strcmp($_GET["accao"], "desativar")){
			$daoViaturas->ativarDesativarViatura(0, $_GET["id"]);
		}
	}
	
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

    <title>FMT | Gerir Viatura</title>
	
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">

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
	<img class="banner" src="../Banner.png" alt="Smiley face"  height = "150" width= "1200">
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
                    <li><a href="alterar_utilizador.php">Perfil</a></li>
                    <li><a href="../login.php?logout=1">Sair</a></li>
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
	  <li class='has-sub'><a><span>Administrador</span></a>
		<ul>
		  <li ><a href="gerir_utilizadores.php"><span>Gerir Utilizadores</span></a></li>
		  <li ><a href="ver_log_global.php"><span>Ver Log Global</span></a></li>
          <li ><a href="ver_registo_consumo.php"><span>Ver / Editar Registo de Consumos</span></a></li> 
		  
		</ul>
   </li>
		
	  <li><a href="Gestao_stock.php"><span>Gerir Stocks</span></a>
   </li>
   	  <li class='has-sub'><a><span>Viaturas</span></a>
		<ul>
		  <li ><a href="gerir_viaturas.php"><span>Gerir Viaturas</span></a>
          <li ><a href="manutencao.php"><span>Manutencões</span></a>
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
		  <li><a href="./inicial.php">Administrador</a></li>
		  <li class="active">Gerir Viaturas</li>
		</ol>


          <h2 class="sub-header">Gerir Viaturas</h2>
          <div class="table-responsive">
		  
				<div class="pull-left">
					<form class="form-inline">
						<div class="btn-group">
							&nbsp;&nbsp;&nbsp;
							<input class="form-control" type="text" id="procurar" placeholder="Procurar">
							<select class="form-control" >
								<option value="descriçao">Marca</option>
								<option value="codigo">Matrícula</option>
							</select>
							
							
							<br />
							<br />
						</div>
					</form>
				</div>

				
		  </div>
			<a class="btn btn-primary btn-xl pull-right"  href="./adicionar_viatura.php"> Adicionar Novo </a>
			
		 

           <div class="col-sm-9 col-md-10" style="width:90%;margin-top:5px;">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
						<span class="list-group-item">
								<span class="name" style="min-width: 40px; display: inline-block;">ID</span> 
								<span class="Descrição" style="min-width: 100px; display: inline-block;">Tipo</span>
								<span class="Quantidade" style="min-width: 100px; display: inline-block;">Marca</span>
								<span class="Quantidade" style="min-width: 100px; display: inline-block;">Matrícula</span>
								<span class="Quantidade" style="min-width: 100px; display: inline-block;">Tipo Comb.</span>
								<span class="Quantidade" style="min-width: 100px; display: inline-block;">Consumo</span>
								
								<span class="opcao" style="min-width: 120px; display: inline-block;">Opções</span>
								
						</span>
							
							
                                                            
		<?php
		for ($i = 0; $i < count($viaturas); $i++) {
			
			echo '<div  class="list-group-item">';
			
			// substituir pelos getters certos
			echo '<span class="TipoViatura" style="min-width: 40px; display: inline-block;">' . $viaturas[$i]->getIdViaturas() . '</span> ';
			echo '<span class="TipoViatura" style="min-width: 100px; display: inline-block;">' . $viaturas[$i]->getTipo() . '</span> ';
			echo '<span class="Marca" style="min-width: 100px; display: inline-block;">' . $viaturas[$i]->getMarca() . '</span>';
			echo '<span class="Matricula" style="min-width: 110px; display: inline-block;">' . $viaturas[$i]->getDataMatricula() . '</span>';
			echo '<span class="Combustivel" style="min-width: 100px; display: inline-block;">' . $viaturas[$i]->getCombustivel() . '</span>';
			echo '<span class="Combustivel" style="min-width: 100px; display: inline-block;">' . $viaturas[$i]->getConsumoMedio() . '</span>';
			echo '<a href="editar_viatura.php?id=' . $viaturas[$i]->getIdViaturas() . '" class="btn btn-xs" >Ver / Editar</a>';
			echo '<a href="gerir_viaturas.php?id=' . $viaturas[$i]->getIdViaturas() .
				'&accao=' . ($viaturas[$i]->getActiva()==1 ? "desativar" : "ativar") .
				'" class="btn ' . ($viaturas[$i]->getActiva()==1 ? "btn-danger" : "btn-primary") .
				' btn-xs" >' . ($viaturas[$i]->getActiva()==1 ? "Desativar" : "Ativar") . '</a></div>';
		}
		?>                                                                                     														

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
