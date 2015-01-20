<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Mensagens Enviadas</title>

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
                        <a>Utilizador <span class="caret"></span></a>
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
                                <li><a href="manutencao.php"><span>Manutenções</span></a>
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
                        <li class="active">Mensagens Enviadas</li>
                    </ol>

                    <div class="container" style="width: 950px;">



                        <div class="centered">
                            <h2 class="sub-header">Mensagens Enviadas</h2>

                            <div class="pull-left">
                                <form class="form-inline">
                                    <div class="btn-group">
                                        &nbsp;&nbsp;&nbsp;

                                        <label class="form-control" id="nome">Nome:</label>

                                        <input class="form-control" type="text" id="procurar" placeholder="Procurar">
                                        <br />
                                        <br />
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-9 col-md-10" style="width:90%;">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <div class="list-group">
                                            <span class="list-group-item">
                            <span class="name" style="min-width: 150px; display: inline-block;">Nome</span> 
                                            <span class="assunto" style="min-width: 200px; display: inline-block;">Assunto</span>
                                            <span class="data" style="min-width: 100px; display: inline-block;">Data</span>
                                            <span class="hora" style="min-width: 80px; display: inline-block;">Hora</span>
                                            <span class="estado" style="min-width: 100px; display: inline-block;">Estado</span>
                                            <span class="opcao" style="min-width: 100px; display: inline-block;">Opções</span>
                                            </span>

                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Anderson Talisca</span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Médico</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">30/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">12:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Visto</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>

                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Juan Quintero </span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Luta a Incendios</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">31/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">17:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Não Vista</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>

                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Fredy Montero</span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Mecanico</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">30/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">10:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Vista</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>

                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Anderson Talisca</span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Médico</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">30/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">12:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Visto</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>

                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Juan Quintero </span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Luta a Incendios</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">31/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">17:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Não Vista</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>


                                            <div class="list-group-item">
                                                <span class="name" style="min-width: 150px; display: inline-block;">Fredy Montero</span> 
                                                <span class="assunto" style="min-width: 200px; display: inline-block;">Material Mecanico</span> 
                                                <span class="data" style="min-width: 100px; display: inline-block;">30/10/2014</span>
                                                <span class="hora" style="min-width: 80px; display: inline-block;">10:10</span>
                                                <span class="estado" style="min-width: 100px; display: inline-block;">Vista</span>
                                                <a href="ver_mensagem.php" class="btn btn-primary btn-xs">Abrir</a>
                                                <button class="btn btn-danger btn-xs">Apagar</button>
                                            </div>

                                        </div>
                                    </div>
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
