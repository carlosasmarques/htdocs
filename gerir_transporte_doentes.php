<?php
    include "GereTransportes.php";

    $gere_transportes = new GereTransportes();
    $transportes = new Transportes(0, "", "", "", "", "", "", "", 0, 0);

    $transporte = $gere_transportes->listarTransporte();
	
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

    <title>FMT | Gerir Transporte Doentes</title>

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
        <img class="banner" src="Banner.png" alt="Smiley face" height="150" width="1200">
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
                        <a href="#">Utilizador <span class="caret"></span></a>
                        <ul class="sub-menu">
                            <li><a href="alterar_utilizador.php">Alterar Password</a>
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
                    <li><a href="inicial.php"><span>Principal</span></a>
                    </li>

                    <li><a href="Gestao_stock_U.php"><span>Gerir Stocks</span></a>
                    </li>
                    <li class='has-sub'><a><span>Viaturas</span></a>
                        <ul>
                            <li><a href="gerir_viaturas.php"><span>Gerir Viaturas</span></a>
                                <li><a href="manutencao.php"><span>Manutencoes</span></a>
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
                        <li><a href="inicial.php">Utilizador</a>
                        </li>
                        <li class="active">Gerir Transporte de Doentes</li>
                    </ol>

                    <div class="centered">

                        <h2 class="sub-header">Gerir Transporte de Doentes</h2>

                        <div class="pull-left">
                            <form class="form-inline">
                                <div class="btn-group">
                                    <select class="form-control">
                                        <option value="Utentes">Utentes</option>
                                        <option value="Funcionário">Funcionário</option>
                                        <option value="viatura utilizada">Viatura Utilizada</option>
                                    </select>
                                    &nbsp;
                                    <input class="form-control" type="text" id="procurar" placeholder="Procurar">
                                    <br />
                                    <br />
                                </div>
                            </form>
                        </div>

                        <div class="pull-right">
                            <form class="form-inline">
                                <div>
                                    <a href="adicionar_transporte_doentes.php" class="btn btn-primary btn-xl">Novo Transporte</a>
                                    <a href="adicionar_utente.php" class="btn btn-primary btn-xl">Novo Utente</a>
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
                                    <span style="min-width: 80px; display: inline-block;">ID</span> 
                                    <span style="min-width: 160px; display: inline-block;">Utentes</span>
                                    <span style="min-width: 160px; display: inline-block;">Data Transporte</span>
                                    <span style="min-width: 100px; display: inline-block;">Origem</span>
                                    <span style="min-width: 100px; display: inline-block;">Destino</span>
                                    <span style="min-width: 120px; display: inline-block;">Viatura Utilizada</span>
                                    <span style="min-width: 80px; display: inline-block;">Opções</span>
                                </div>
                                <?php
									for($i=0; $i<count($transporte); $i++){
												
                                                echo'<div class="list-group-item">';
											
                                                echo'    <span style="min-width: 80px; display: inline-block;">' . $transporte[$i][0] . '</span> ';
                                                echo'    <span style="min-width: 160px; display: inline-block;">' . $transporte[$i][1] . '</span>';
                                                echo'    <span style="min-width: 160px; display: inline-block;">' . $transporte[$i][2] . '</span>';
                                                echo'    <span style="min-width: 100px; display: inline-block;">' . $transporte[$i][3] . '</span>';
                                                echo'    <span style="min-width: 100px; display: inline-block;">' . $transporte[$i][4] . '</span>';
                                                echo'    <span style="min-width: 120px; display: inline-block;">' . $transporte[$i][5] . '</span>';
                                                echo'    <span style="min-width: 80px; display: inline-block;"><a href="alterar_transporte_doentes.php?id=' . $transporte[$i][0] . '" class="btn btn-xs" >Repor</a></span>';

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
