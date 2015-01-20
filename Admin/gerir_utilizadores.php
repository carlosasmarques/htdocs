<?php
	include "../GereUtilizadores.php";
	
	$gere_utilizador = new GereUtilizadores();
	$utilizador = new Utilizadores(0, "", 0, "", "", "", "", "", 0, "", "", true, "");
	
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
                <a class="navbar-brand" href="inicial.html">FireManTool</a>
            </div>
            <div class="navbar-collapse collapse" style="background-color: #FFCC33;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="drop-menu" style="z-index: 1">
                        <a>Administrador <span class="caret"></span></a>
                        <ul class="sub-menu">
                            <li><a href="alterar_utilizador.html">Perfil</a>
                            </li>
                            <li><a href="#">Sair</a>
                            </li>
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
                    <li><a href="inicial.html"><span>Principal</span></a>
                    </li>
                    <li class='has-sub'><a><span>Administrador</span></a>
                        <ul>
                            <li><a href="gerir_utilizadores.html"><span>Gerir Utilizadores</span></a>
                            </li>
                            <li><a href="ver_log_global.html"><span>Ver Log Global</span></a>
                            </li>
                            <li><a href="ver_registo_consumo.html"><span>Ver / Editar Registo de Consumos</span></a>
                            </li>

                        </ul>
                    </li>

                    <li><a href="Gestao_stock.html"><span>Gerir Stocks</span></a>
                    </li>
                    <li class='has-sub'><a><span>Viaturas</span></a>
                        <ul>
                            <li><a href="gerir_viaturas.html"><span>Gerir Viaturas</span></a>
                                <li><a href="manutencao.html"><span>Manutencões</span></a>
                                    <li><a href="abastecer_viatura.html"><span>Abastecimentos</span></a>
                                        <li><a href="gerir_inspecoes.html"><span>Inspeções</span></a>
                        </ul>
                        </li>
                        <li class='has-sub'><a><span>Transporte de Doentes</span></a>
                            <ul>
                                <li><a href="adicionar_transporte_doentes.html"><span>Adicionar Novo Transporte</span></a>
                                </li>
                                <li><a href="gerir_transporte_doentes.html"><span>Gerir Transporte de Doentes</span></a>
                                    <li><a href='gerir_utente.html'><span>Gerir Utentes</span></a>
                            </ul>
                            </li>

                            <li><a href='registo_consumos.html'><span>Registo de Consumos</span></a>

                            </li>


                            <li class='has-sub'><a><span>Mensagens</span></a>
                                <ul>
                                    <li><a href='enviar_mensagem.html'><span>Nova Mensagem</span></a>
                                    </li>
                                    <li><a href='mensagens_recebidas.html'><span>Mensagens Recebidas</span></a>
                                    </li>
                                    <li><a href='mensagens_enviadas.html'><span>Mensagens Enviadas</span></a>
                                    </li>
                                </ul>
                            </li>

                </ul>
            </div>


            <div class="conteudo">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <ol class="breadcrumb" style="width: 800px">
                        <li><a href="inicial.html">Administrador</a>
                        </li>
                        <li class="active">Gerir Utilizadores</li>
                    </ol>


                    <div class="centered">

                        <h2 class="sub-header">Gerir Utilizador</h2>

                        <div class="pull-right">
                            <a href="adicionar_utilizador.html" class="btn btn-primary btn-xl">Adicionar Utilizador</a>
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
                                <div class="list-group-item">
                                    <span style="min-width: 160px; display: inline-block;">ID</span> 
                                    <span style="min-width: 160px; display: inline-block;">Nome</span>
                                    <span style="min-width: 160px; display: inline-block;">Função</span>
                                    <span style="min-width: 160px; display: inline-block;">Contacto</span>
                                    <span style="min-width: 160px; display: inline-block;">Opções</span>
                                </div>
                                <div class="list-group-item">
                                    <span style="min-width: 160px; display: inline-block;">0001</span> 
                                    <span style="min-width: 160px; display: inline-block;">Manuel Ribeiro</span>
                                    <span style="min-width: 160px; display: inline-block;">Camionista</span>
                                    <span style="min-width: 160px; display: inline-block;">123456789</span>
                                    <span style="min-width: 160px; display: inline-block;"><a href="alterar_utilizador.html" class="btn btn-xs" >Ver / Alterar</a><a href="ver_log_utilizador.html" class="btn btn-xs" >Ver log</a><a href="#" class="btn btn-danger btn-xs">Desativar</a></span>
                                </div>
								<?php
								for($i=0; $i<count($utilizador); $i++){
									echo'<div class="list-group-item">';
									if($utilizador[$i]->getAtivo()==1){
                                                                            $estado = "Ativo";
                                                                        }else{
                                                                            $estado = "Desativo";
                                                                        } 
									// substituir pelos getters certos
									echo'    <span style="min-width: 40px; display: inline-block;">' . $utilizador[$i]->getIdUtilizadores() . '</span> ';
									echo'    <span style="min-width: 100px; display: inline-block;">' . $utilizador[$i]->getNome() . '</span>';
									echo'    <span style="min-width: 90px; display: inline-block;">' . $utilizador[$i]->getFuncao() . '</span>';
									echo'    <span style="min-width: 160px; display: inline-block;">' . $utilizador[$i]->getTelefone() . '</span>';
									echo'    <span style="min-width: 80px; display: inline-block;"><a href="alterar_utente.php?id=' . $utilizador[$i]->getIdUtilizadores() . '" class="btn btn-xs" >Ver / Alterar</a></span>';
									echo'    <span style="min-width: 80px; display: inline-block;"><a href="alterar_utente.php?id=' . $utilizador[$i]->getIdUtilizadores() . '" class="btn btn-xs" >Ver log</a></span>';
									echo'    <span style="min-width: 80px; display: inline-block;"><a href="alterar_utente.php?id=' . $utilizador[$i]->getIdUtilizadores() . '" class="btn btn-xs" >' .$estado. '</a></span>';
									
									echo'</div>';
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
