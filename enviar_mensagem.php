<?php
	include "MensEnv.php";
	include "GereMensEnv.php";
        
	
	$gere_mensenv = new GereMensEnv();
	$mensenv = new MensEnv () ;
	
	$mensenv = $gere_mensenv->enviarMensagem();
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

    <title>FMT | Nova Mensagem</title>

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
                <a class="navbar-brand" href="inicial.html">FireManTool</a>
            </div>
            <div class="navbar-collapse collapse" style="background-color: #FFCC33;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="drop-menu" style="z-index: 1">
                        <a>Utilizador <span class="caret"></span></a>
                        <ul class="sub-menu">
                            <li><a href="alterar_utilizador.html">Alterar Password</a>
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

                    <li><a href="Gestao_stock_U.html"><span>Gerir Stocks</span></a>
                    </li>
                    <li class='has-sub'><a><span>Viaturas</span></a>
                        <ul>
                            <li><a href="gerir_viaturas.html"><span>Gerir Viaturas</span></a>
                                <li><a href="manutencao.html"><span>Manutenções</span></a>
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
                        <li><a href="./inicial.html">Utilizador</a>
                        </li>
                        <li class="active">Nova Mensagem</li>
                    </ol>

                    <!-- a row has to be in a container -->
                    <div class="container">
                        <!-- Contacts -->
                        <div id="contacts">
                            <div class="centered">
                                <!-- Alignment -->
                                <div class="col-sm-offset-3 col-sm-6" style="margin-left: 15%">
                                    <!-- Form itself -->
                                    <form name="sentMessage" class="well" id="enviarmensagem" novalidate>
                                        <h2 class="sub-header">Nova Mensagem</h2>
                                        <div class="control-group">
                                            <div class="controls">
                                                <label class="form-control" id="nomeremetente">Utilizador</label>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Destinatario" id="destinatario" required data-validation-required-message="Insira o Destinatario" />
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Assunto" id="assunto" required data-validation-required-message="Insira o Assunto" />
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <textarea rows="10" cols="100" class="form-control" placeholder="Mensagem" id="mensagem" required data-validation-required-message="Introduza a sua mensagem" data-validation-minlength-message="Insira no minimo 5 caracteres" maxlength="999" style="resize:none"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <a class="btn btn-primary pull-right">Enviar</a>
                                        <br />
                                    </form>
                                    <?php
                                    if(isset($_POST["Destinatario"]) && !empty($_POST["Destinatario"])&& isset($_POST["assunto"]) && !empty($_POST["assunto"]) && isset($_POST["mensagem"]) && !empty($_POST["mensagem"]) ){
                                             $mensenv = $gere_mensenv->enviarMensagem();   
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
