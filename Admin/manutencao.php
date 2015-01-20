<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Gerir Manutencões de Viaturas</title>
	
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
                  <a>Administrador <span class="caret"></span></a>
                  <ul class="sub-menu">
                    <li><a href="alterar_utilizador.php">Perfil</a></li>
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
		  <li><a href="inicial.php">Administrador</a></li>
		  <li class="active">Manutenção de viaturas</li>
		</ol>


          <h2 class="sub-header">Manutenção de Viaturas</h2>
          <div class="table-responsive">
		  
				<div class="pull-left">
					<form class="form-inline">
						<div class="btn-group">
							&nbsp;&nbsp;&nbsp;
							<input class="form-control" type="text" id="procurar" placeholder="Procurar">
							<select class="form-control" >
								<option value="codigo">Matrícula</option>
								<option value="codigo">Marca</option>
							</select>
							
							
							<br/>
							<br/>
						</div>
					</form>
				</div>
				
				<div class="pull-right">
					<form class="form-inline">
						<div class="btn-group">
							&nbsp;&nbsp;&nbsp;
							
							<select class="form-control" >
								<option value="interna">Interna</option>
								<option value="externa">Externa</option>
								<option value="externa">Futura</option>
							</select>
							
							
							<br />
							<br />
						</div>
						<a class="btn btn-primary btn-xl pull-right"  href="./manutencao_interna.php"> Nova Manutenção </a>
					</form>
				</div>

				
		  </div>

					
			
			
		 

           <div class="col-sm-9 col-md-10" style="width:90%;margin-top:5px;">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
						<span class="list-group-item">
								<span class="name" style="min-width: 80px; display: inline-block;">ID</span> 
								<span class="Descrição" style="min-width: 90px; display: inline-block;">Tipo</span>
								<span class="Quantidade" style="min-width: 110px; display: inline-block;">Marca</span>
								<span class="Quantidade" style="min-width: 80px; display: inline-block;">Matrícula</span>
								<span class="Quantidade" style="min-width: 140px; display: inline-block;">Data da Manutenção</span>
								<span class="Quantidade" style="min-width: 100px; display: inline-block;">Custo</span>
								<span class="opcao" style="min-width: 100px; display: inline-block;">Opção</span>
								
								</span>
							
							<div  class="list-group-item">
                            <span class="Codigo" style="min-width: 70px; display: inline-block;">001</span> 
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Interna</span>
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Mercedes</span>
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >45-AI-10</span>
							<span class="Quantidade" style="min-width: 140px; display: inline-block;" >14/05/2014</span>
							<span class="Descrição" style="min-width: 90px; display: inline-block;" >-</span> 
                           
							<a href="manutencao_interna_ver.php" class="btn btn-xs" >Ver/Editar</a>
							</div>
							
							<div  class="list-group-item">
                            <span class="Codigo" style="min-width: 70px; display: inline-block;">002</span> 
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Externa</span>
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Mercedes</span>
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >13-AH-35</span>
							<span class="Quantidade" style="min-width: 140px; display: inline-block;" >06/10/2014</span>
							<span class="Descrição" style="min-width: 90px; display: inline-block;" >130</span> 
							<a href="manutencao_externa_ver.php" class="btn btn-xs" >Ver/Editar</a>
							</div>
							
							<div  class="list-group-item">
                            <span class="Codigo" style="min-width: 70px; display: inline-block;">003</span> 
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Futura</span>							
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >Mercedes</span>
							<span class="Quantidade" style="min-width: 100px; display: inline-block;" >21-38-XT</span>
							<span class="Quantidade" style="min-width: 140px; display: inline-block;" >18/11/2014</span>
							<span class="Descrição" style="min-width: 90px; display: inline-block;" >50</span> 
     
							<a href="manutencao_futura_ver.php" class="btn btn-xs" >Ver/Editar</a>
							</div>
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
