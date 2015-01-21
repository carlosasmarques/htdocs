<?php
	include_once "../sessaoOk.php";
	include_once "../GereUtilizadores.php";
        include_once "daoutilizador.php";
	
	$gere_utilizador = new GereUtilizadores();
	$utilizador = new Utilizadores(0, "", 0, "", "", "", "", "", 0, "", "", 0, "");
        
        $daoutilizador = new DaoUtilizador();
        
        if(
		// verificar variaveis GET
		isset($_GET["id"]) && !empty($_GET["id"]) &&
		isset($_GET["accao"]) && !empty($_GET["accao"])
	){
		// ativar
		if(!strcmp($_GET["accao"], "ativar")){
			$daoutilizador->ativarDesativarUtilizador(1, $_GET["id"]);
		}
		
		// desativar
		if(!strcmp($_GET["accao"], "desativar")){
			$daoutilizador->ativarDesativarUtilizador(0, $_GET["id"]);
		}
	}
        
        $utilizador = $gere_utilizador->listarUtilizador();

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

    <title>FMT | Gerir Utilizadores</title>

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
                        <li class="active">Gerir Utilizadores</li>
                    </ol>


                    <div class="centered">

                        <h2 class="sub-header">Gerir Utilizador</h2>

                        <div class="pull-right">
                            <a href="adicionar_utilizador.php" class="btn btn-primary btn-xl">Adicionar Utilizador</a>
                        </div>


                        <div class="pull-left">
                            <form class="form-inline">
                                <div class="btn-group">
                                    <select class="form-control">
                                        <option value="Nome">Nome</option>
                                        <option value="Nº Funcionário">Nº Funcionário</option>
                                    </select>
                                    &nbsp;
                                    <input class="form-control" type="text" id="procurar" placeholder="Procurar">
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>

                        <br />
                        <br />
                        <br />
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                      <div class="list-group">
						<span class="list-group-item">
                                    <span style="min-width: 160px; display: inline-block;">ID</span> 
                                    <span style="min-width: 160px; display: inline-block;">Nome</span>
                                    <span style="min-width: 160px; display: inline-block;">Função</span>
                                    <span style="min-width: 160px; display: inline-block;">Contacto</span>
                                    <span style="min-width: 160px; display: inline-block;">Opções</span>
                                </span>
                               
								<?php
								for($i=0; $i<count($utilizador); $i++){
									echo'<div class="list-group-item">';
									
									// substituir pelos getters certos
									echo'    <span style="min-width: 160px; display: inline-block;">' . $utilizador[$i]->getIdUtilizadores() . '</span> ';
									echo'    <span style="min-width: 160px; display: inline-block;">' . $utilizador[$i]->getNome() . '</span>';
									echo'    <span style="min-width: 160px; display: inline-block;">' . $utilizador[$i]->getFuncao() . '</span>';
									echo'    <span style="min-width: 160px; display: inline-block;">' . $utilizador[$i]->getTelefone() . '</span>';
									echo '<a href="alterar_utilizador.php?id=' . $utilizador[$i]->getIdUtilizadores() . '" class="btn btn-xs" >Ver / Editar</a>';
                                                                        echo '<a href="gerir_utilizadores.php?id=' . $utilizador[$i]->getIdUtilizadores() .
                                                                                    '&accao=' . ($utilizador[$i]->getAtivo()==1 ? "desativar" : "ativar") .
                                                                                    '" class="btn ' . ($utilizador[$i]->getAtivo()==1 ? "btn-danger" : "btn-primary") .
                                                                                    ' btn-xs" >' . ($utilizador[$i]->getAtivo()==1 ? "Desativar" : "Ativar") . '</a></div>';                                                                       
                                                                                                                                            
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
