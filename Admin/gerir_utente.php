<?php
	include_once "sessaoOk.php";
        include_once "gereutentes.php";
        include_once "daoutentes.php";
	
	$gere_utentes = new GereUtentes();
        $utentes = new Utentes(0, "", 0, "", 0, "", "",0);
	        
        $daoutentes = new DaoUtentes();
        
        // ações "desativar", "ativar"
       
	if(
             
		// verificar variaveis GET
		isset($_GET["id"]) && !empty($_GET["id"]) &&
		isset($_GET["accao"]) && !empty($_GET["accao"])
	){
            
		// ativar
		if(!strcmp($_GET["accao"], "ativar")){
			$daoutentes->activarDesativarUtente(1, $_GET["id"]);
		}
		
		// desativar
		if(!strcmp($_GET["accao"], "desativar")){
			$daoutentes->activarDesativarUtente(0, $_GET["id"]);
		}
	}
       
        
        $utentes = $gere_utentes->listarUtentes();

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Gerir Utentes</title>

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
        <img class="banner" src="../Banner.png" alt="Smiley face" height="150" width="1200">
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
                    <li><a href="inicial.php"><span>Principal</span></a>
                    </li>
                    <li class='has-sub'><a><span>Administrador</span></a>
                        <ul>
                            <li><a href="gerir_utilizadores.php"><span>Gerir Utilizadores</span></a>
                            </li>
                            <li><a href="ver_log_global.php"><span>Ver Log Global</span></a>
                            </li>
                            <li><a href="ver_registo_consumo.php"><span>Ver / Editar Registo de Consumos</span></a>
                            </li>

                        </ul>
                    </li>

                    <li><a href="Gestao_stock.php"><span>Gerir Stocks</span></a>
                    </li>
                    <li class='has-sub'><a><span>Viaturas</span></a>
                        <ul>
                            <li><a href="gerir_viaturas.php"><span>Gerir Viaturas</span></a>
                                <li><a href="manutencao.php"><span>Manutencões</span></a>
                                    <li><a href="abastecer_viatura.php"><span>Abastecimentos</span></a>
                                        <li><a href="gerir_inspecoes.php"><span>Inspeções</span></a>
                        </ul>
                        </li>
                        <li class='has-sub'><a><span>Transporte de Doentes</span></a>
                            <ul>
                                <li><a href="adicionar_transporte_doentes.php"><span>Adicionar Novo Transporte</span></a>
                                </li>
                                <li><a href="gerir_transporte_doentes.php"><span>Gerir Transporte de Doentes</span></a>
                                    <li><a href='gerir_utente.php'><span>Gerir Utentes</span></a>
                            </ul>
                            </li>

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
                                </ul>
                            </li>

                </ul>
            </div>


            <div class="conteudo">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <ol class="breadcrumb" style="width: 800px">
                        <li><a href="inicial.php">Administrador</a>
                        </li>
                        <li><a href="gerir_transporte_doentes.php">Gestão Transporte Doentes</a>
                        </li>
                        <li class="active">Gerir Utentes</li>
                    </ol>

                    <div class="centered">

                        <h2 class="sub-header">Gerir Utentes</h2>

                        <div class="pull-left">
                            <form class="form-inline">
                                <div class="btn-group">
                                    <select class="form-control">
                                        <option value="Nome">Nome</option>
                                        <option value="Número SNS">Número SNS</option>
                                    </select>
                                    &nbsp;
                                    <input class="form-control" type="text" id="procurar" placeholder="Procurar">
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>

                        <div class="pull-right">
                            <a href="adicionar_utente.php" class="btn btn-primary btn-xl">Adicionar Utente</a>
                        </div>


                        <br />
                        <br />
                        <br />
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="list-group">
						<span class="list-group-item">
                                    <span style="min-width: 40px; display: inline-block;">ID</span> 
                                    <span style="min-width: 100px; display: inline-block;">Nome</span>
                                    <span style="min-width: 90px; display: inline-block;">Número SNS</span>
                                    <span style="min-width: 160px; display: inline-block;">Morada</span>
                                    <span style="min-width: 80px; display: inline-block;">Contacto</span>
                                    <span style="min-width: 120px; display: inline-block;">Data Nascimento</span>
                                    <span style="min-width: 110px; display: inline-block;">Data Registo</span>
                                    <span style="min-width: 80px; display: inline-block;">Opções</span>
                                </span>
                                 <?php
                                    for($i=0; $i<count($utentes); $i++){
                                    echo'<div class="list-group-item">';
                                    
                                                // substituir pelos getters certos
                                                echo' <span style="min-width: 40px; display: inline-block;">' . $utentes[$i]->getIdUtentes() . '</span> ';
                                                echo' <span style="min-width: 100px; display: inline-block;">' . $utentes[$i]->getNome() . '</span>';
                                                echo' <span style="min-width: 90px; display: inline-block;">' . $utentes[$i]->getNumeroSNS() . '</span>';
                                                echo' <span style="min-width: 160px; display: inline-block;">' . $utentes[$i]->getMorada() . '</span>';
                                                echo' <span style="min-width: 80px; display: inline-block;">' . $utentes[$i]->getTelefone() . '</span>';
                                                echo' <span style="min-width: 120px; display: inline-block;">' . $utentes[$i]->getDataNascimento() . '</span>';
                                                echo' <span style="min-width: 110px; display: inline-block;">' . $utentes[$i]->getDataRegisto() . '</span>';
                                                echo '<a href="alterar_utente.php?id=' . $utentes[$i]->getIdUtentes() . '&accao=editar" class="btn btn-xs" >Ver / Editar</a>';
                                                echo '<a href="gerir_utente.php?id=' . $utentes[$i]->getIdUtentes() .
                                                        '&accao=' . ($utentes[$i]->getAtivo()==1 ? "desativar" : "ativar") .
                                                        '" class="btn ' . ($utentes[$i]->getAtivo()==1 ? "btn-danger" : "btn-primary") .
                                                        ' btn-xs" >' . ($utentes[$i]->getAtivo()==1 ? "Desativar" : "Ativar") . '</a></div>';
                                                }
                                ?>
                            </div>
                            <br>
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
