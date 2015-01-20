<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Adicionar Novo Artigo</title>

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
                        <a>Administrador <span class="caret"></span></a>
                        <ul class="sub-menu">
                            <li><a href="alterar_utilizador.php">Perfil</a>
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
                        <li><a href="./inicial.php">Administrador</a>
                        </li>
                        <li><a href="Gestao_stock.php">Gestão de Stocks</a>
                        </li>
                        <li class="active">Adicionar Novo Artigo</li>
                    </ol>
                    <h1 class="page-header">Adicionar Novo Artigo</h1>



                    <div class="table-responsive">



                    </div>
                    <div id="openModal" class="modalDialog">
                        <div>
                            <a href="#close" title="Close" class="close">X</a>

                            <form>
                                <div class="form-group">
                                    <label class="DescricaodoArtigo">Quantidade a Repor:</label>
                                    <input type="text" class="form-control" id="nf1" placeholder="Inserir os dados">
                                </div>

                                <div class="form-group">
                                    <label class="qtminimapermitida">Introduza o Preço de cada Unidade:</label>
                                    <input type="text" class="form-control" id="nu1" placeholder="Inserir os dados">
                                </div>

                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="./Gestao_stock.php">Confirmar</a>

                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="./Gestao_stock.php">Voltar</a>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <form>
                            <div class="form-group">
                                <label class="CodigodoArtigo">Código do Artigo:</label>
                                <input type="text" class="form-control" id="nf2" placeholder="Inserir o Código do Artigo">
                            </div>

                            <div class="form-group">
                                <label class="PreçodoArtigo">Preço do Artigo:</label>
                                <br>
                                <input type="text" class="form-control" id="nu2" placeholder="Inserir o Preço do Artigo em Euros">

                            </div>
                            <div id="openTipo" class="modalDialog">
                                <div>
                                    <a href="#close" title="Close" class="close">X</a>


                                    <div class="form-group">
                                        <label class="DescricaodoArtigo">Novo Tipo de Artigo:</label>
                                        <input type="text" class="form-control" id="nf3" placeholder="Inserir Tipo">
                                    </div>

                                    <a href="./Adicionar_Stock.php" class="btn btn-danger btn-xl pull-right"> Voltar </a>
                                    <a class="btn btn-primary btn-xl pull-right" href="./Adicionar_Stock.php"> Adicionar Novo </a>
                                    <br/>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="TipodeArtigo">Tipo de Artigo ou</label>
                                <a class="btn btn-xs btn-primary" href="#openTipo">Novo Tipo de Artigo</a>
                                <select class="form-control">
                                    <option>Equipamento De Bombeiros</option>
                                    <option>Equipamento Primeiros Socorros</option>
                                    <option>Equipamento Manutencão automóvel</option>
                                    <option>Equipamento Diverso</option>
                                </select>


                            </div>
                        </form>

                    </div>
                    <div class="col-sm-6 col-md-4">
                        <form>
                            <div class="form-group">
                                <label class="DescricaodoArtigo">Descrição do Artigo:</label>
                                <input type="text" class="form-control" id="nf4" placeholder="Inserir a Descrição do Artigo">
                            </div>

                            <div class="form-group">
                                <label class="qtminimapermitida">Quantidade Mínima Permitida:</label>
                                <input type="text" class="form-control" id="nu3" placeholder="Inserir a Quantidade Mínima Permitida">
                            </div>

                            <div class="form-group">
                                <label class="qtminimapermitida">Data da Compra:</label>
                                <input type="date" class="form-control" name="qtmp">
                            </div>
                            <div class="pull-right">
                                <a href="./Gestao_stock.php" class="btn btn-danger btn-xl pull-right"> Voltar </a>
								&nbsp;
                                <a class="btn btn-primary btn-xl pull-right" href="./Gestao_stock.php"> Adicionar Novo </a>
                                <br/>
                            </div>
                        </form>

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
