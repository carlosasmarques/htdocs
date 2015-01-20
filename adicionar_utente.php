<?php
	
	include "GereUtentes.php";
	
	$gere_utentes = new GereUtentes();
	$utentes = new Utentes(0, "", 0, "", 0, "", "",0);
	
	$gere_utentes->adicionarUtente($utentes);

	
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

    <title>FMT | Adicionar Utente</title>

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
                        <li><a href="gerir_transporte_doentes.php">Gestão Transporte Doentes</a>
                        </li>
                        <li><a href="gerir_utente.php">Gestão Utentes</a>
                        </li>
                        <li class="active">Adicionar Utente</li>
                    </ol>

                    <div class="centered col-sm-6 col-md-9">



                        <div class="col-sm-6 col-md-11">
                            <form method="post">
                                <div class="form-group">
                                    <label class="nomeutente">Nome Utente:</label>
                                    <input type="text" class="form-control" id="UT_nome" placeholder="Inserir Nome do Utente">
                                </div>
                            </form>
                        </div>


                        <div class="col-sm-6 col-md-4">
                            <form method="post">
                                <div class="form-group">
                                    <label class="numerosns">Número SNS:</label>
                                    <input type="text" class="form-control" id="UT_sns" placeholder="Inserir Nº SNS">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <form method="post">
                                <div class="form-group">
                                    <label class="datanasc">Data Nascimento:</label>
                                    <input type="date" class="form-control" id="UT_dataNascimento">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <form method="post">
                                <div class="form-group">
                                    <label class="numtelefone">Número Telefone:</label>
                                    <input type="text" class="form-control" id="UT_contactoTelefonico" placeholder="Nº de Telefone">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-11">
                            <form method="post">
                                <div class="form-group">
                                    <p>
                                        <label class="rua">Morada:</label>
                                    </p>
                                    <label class="rua">Rua:</label>
                                    <input type="text" class="form-control" id="UT_morada" placeholder="Inserir a Rua">
                                </div>
                            </form>
                        </div>

                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />

                        <div class="col-sm-6 col-md-2">
                            <form method="post">
                                <div class="form-group">
                                    <label class="nporta">Nº Porta:</label>
                                    <input type="text" class="form-control" id="nporta" placeholder="Inserir Nº de Porta">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <form method="post">
                                <div class="form-group">
                                    <label class="localidade">Localidade:</label>
                                    <input type="text" class="form-control" id="localidade" placeholder="Inserir a Localidade">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <form method="post">
                                <div class="form-group">
                                    <label class="cp">Código Postal:</label>
                                    <input type="text" class="form-control" id="cp" maxlength="8" placeholder="XXXX-YYY">
                                </div>
                            </form>
                        </div>

                        <br />
                        <br />
                        <br />
                        <br />
                        

                        <div class="pull-right">
                            <br />
                            <a href="gerir_utente.php" class="btn btn-danger btn-xl"> Voltar </a>
                            <a class="btn btn-primary btn-xl" href="gerir_utente.php"> Adicionar </a>
                            <br/>
                        </div>
                           <?php
                           if(isset($_POST["UT_nome"]) && !empty($_POST["UT_nome"])&& isset($_POST["UT_sns"]) && !empty($_POST["UT_sns"]) && isset($_POST["UT_dataNascimento"]) && !empty($_POST["UT_dataNascimento"]) && isset($_POST["UT_contactoTelefonico"]) && !empty($_POST["UT_contactoTelefonico"]) && isset($_POST["UT_morada"]) && !empty($_POST["UT_morada"]) ){
                                $utentes = $gere_utentes->adicionarUtente();   
                            }
                           
                           ?>
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
