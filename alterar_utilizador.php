<?php
	include_once "sessaoOk.php";
	include "Utilizadores.php";
	include "GereUtilizadores.php"; 
        
	
	$gere_utilizador = new GereUtilizadores();
	$utilizador = new Utilizadores("", 0, "", "", "", "", "", 0, "", "", "", "");
	
	$utilizador = $gere_utilizador->alterarDadosUtilizador();
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

    <title>FMT | Alterar Utilizador</title>

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
                        <a><?php echo $_SESSION["user"]; ?><span class="caret"></span></a>
                        <ul class="sub-menu">
                            <li><a href="alterar_utilizador.php">Alterar Password</a>
                            </li>
                            <li><a href="login.php?logout=1">Sair</a>
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
                        <li class="active">Perfil</li>
                    </ol>

                    <div class="centered">

                        <div class="col-sm-6 col-md-12" style="padding-left:30px;">
                            <div class="pull-left">
                                <br>
                                <img src="exavatar.png" class="img-responsive" alt="Responsive image" style="height: 180px; width: 145px;">

                            </div>


                            <div class="col-sm-6 col-md-4">
                                <form  method="POST" action="alterar_utilizador.php">
                                    <div class="form-group">
                                        <label class="numerofuncionario">Número de Funcionário:</label>
                                        <label class="form-control" id="nf"><?php echo $utilizador->getNumero() ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="nomefuncionario">Nome Utilizador:</label>
                                        <label class="form-control" id="nu"><?php echo $utilizador->getUsername() ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="funcao">Função:</label>
                                        <label class="form-control" id="f"><?php echo $utilizador->getFuncao() ?></label>
                                    </div>
                                </form>

                            </div>

                            <div class="col-sm-6 col-md-4">
                                <form>

                                    <div class="form-group">
                                        <label class="password">Password Antiga:</label>
                                        <input type="password" class="form-control" id="passantiga" value="<?php echo $utilizador->getPassword() ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="password">Password Nova:</label>
                                        <input type="password" class="form-control" id="passnova">
                                    </div>

                                    <div class="form-group">
                                        <label class="password">Confirmar Password:</label>
                                        <input type="password" class="form-control" id="confirmarpass" >
                                    </div>
                                </form>
                                    
                                <?php
                                    if ($_POST['$password']) {
                                    if (strcmp($passantiga, $password)) {
                                    if (strcmp($passnova, $confirmarpass) ) {
                                        $sql = "UPDATE acesso SET senha = '$passnova' ";
                                    if ($sql == 0) {
                                        echo 'salvo com sucesso';
                                            }
                                        }
                                    else
                                        echo 'as senhas não são iguais, tente novamente';
                                        }
                                    else
                                        echo 'senha atual errada';
                                        }
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-12">
                            <div class="col-sm-6 col-md-7">
                                <form  method="POST" action="alterar_utilizador.php">
                                    <div class="form-group">
                                        <label class="nome">Nome:</label>
                                        <label class="form-control" id="nome"><?php echo $utilizador->getNome() ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="morada">Morada:</label>
                                        <label class="form-control" id="mor"><?php echo $utilizador->getMorada() ?></label>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <form  method="POST" action="alterar_utilizador.php">
                                    <div class="form-group">
                                        <label class="contacto">Contacto:</label>
                                        <label class="form-control" id="contacto"><?php echo $utilizador->getTelefone() ?></label>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <form  method="POST" action="alterar_utilizador.php">
                                    <div class="form-group">
                                        <label class="datanascimento">Data Nascimento:</label>
                                        <label id="datadenascimento" class="form-control"><?php echo $utilizador->getDataNascimento() ?></label>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <br>
                        <div class="col-sm-6 col-md-10" style="padding-left:30px;">
                            <div class="col-sm-6 col-md-3 pull-right">
							<br><br>
                                <a class="btn btn-primary btn-xl" href="#"> Atualizar </a>
                                <br/>
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
