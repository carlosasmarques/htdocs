<?php
	include_once "sessaoOk.php";
	include "transportes.php";
	include "GereTransportes.php";
        include "utentes.php";
	
	$gere_transportes = new GereTransportes();
	$transportes = new Transportes(0, "", "", "", "", "", "", "",0);
	
	$transportes = $gere_transportes->adicionarTransporte();

	include "utentes.php";
	include "gereutentes.php";
	
	$gere_utentes = new GereUtentes();
	$utentes = new Utentes(0, "", 0, "", 0, "", "");
	
	$utentes = $gere_utentes->listarUtentes();
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

    <title>FMT | Adicionar Transporte Doentes</title>

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
                        <li>Adicionar Transporte Doentes</li>
                    </ol>

                    <div class="centered">

                        <div class="col-sm-6 col-md-4">
                            <form>
                                <div class="form-group">
                                    <label class="viatura">Viatura:</label>
                                    <select class="form-control">
                                        <option value="desc">Escolha Viatura...</option>
                                        <option value="data">Mercedes</option>
                                        <option value="hora">BMW</option>
                                        <option value="hora">Mclaren</option>
                                        <option value="hora">Fiat Punto dos Velhos</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <form>
                                <div class="form-group">
                                    <label class="funci">Funcionário:</label>
                                    <select class="form-control">
                                        <option value="desc">Escolha Funcionário...</option>
                                        <option value="data">Américo</option>
                                        <option value="hora">Abélio</option>
                                        <option value="hora">Almeida</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Utente</th>
                                    <th>Condição Utente</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                            echo'    <tr> ';
                            echo'        <td>' . $utentes->getidUtentes() . '</td>';
                            echo'        <td>' . $utentes->getnome() . '</td>';
                            echo'        <td>   sssss  </td>'; // erro
                            echo'        <td><a href="#" class="btn btn-danger btn-xl">Remover</a>';
                            echo'        </td>';
                            echo'    </tr>';
                                ?>
                                
                                <tr>
                                    <td>   </td>
                                    <td>
                                        <form>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option value="desc">Escolha Utente para o Transporte...</option>
                                                    <option value="data">Amilcar</option>
                                                    <option value="hora">João</option>
                                                    <option value="hora">Freitas</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option value="cond">Escolha Condição...</option>
                                                    <option value="sentado">Sentado</option>
                                                    <option value="acamado">Acamado</option>
                                                    <option value="cadeirarodas">Cadeira de Rodas</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td><a href="adicionar_utente.php" class="btn btn-primary btn-xl">Adicionar Utente</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="col-sm-6 col-md-3">
                            <form>
                                <div class="form-group">
                                    <label class="data">Data Transporte :</label>
                                    <input type="date" class="form-control" id="dataTransporte">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-2">
                            <form>
                                <div class="form-group">
                                    <label class="horapar">Hora Partida:</label>
                                    <input type="text" class="form-control" id="horaDePartida" placeholder="hh:mm" maxlength="5">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-2">
                            <form>
                                <div class="form-group">
                                    <label class="horache">Hora Chegada:</label>
                                    <input type="text" class="form-control" id="horaDeChegada" placeholder="hh:mm" maxlength="5">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <form>
                                <div class="form-group">
                                    <label class="origem">Origem Transporte:</label>
                                    <input type="text" class="form-control" id="origem" placeholder="Inserir dados">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <form>
                                <div class="form-group">
                                    <label class="destino">Destino Transporte:</label>
                                    <input type="text" class="form-control" id="destino" placeholder="Inserir dados">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <form>
                                <div class="form-group">
                                    <label class="Desc">Descrição:</label>
                                    <textarea class="form-control"  id = "observacoes" rows="5" cols="30" placeholder="Insira a Descrição"></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <form>
                                <div class="form-group">
                                    <label class="ks">Quilómetros Saída:</label>
                                    <input type="text" class="form-control" id="quilometrospartida" placeholder="Insira os dados">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <form>
                                <div class="form-group">
                                    <label class="kc">Quilómetros Chegada:</label>
                                    <input type="text" class="form-control" id="quilometroschegada" placeholder="Insira os dados">
                                </div>
                            </form>
                        </div>


                        <div class="pull-right">
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
							<a class="btn btn-danger btn-xl" href="gerir_transporte_doentes.php"> Voltar </a>
                            <a class="btn btn-primary btn-xl" href="gerir_transporte_doentes.php"> Adicionar </a>
                            <br/>
                        </div>
                            
                         <?php
                           if(isset($_POST["dataTransporte"]) && !empty($_POST["dataTransporte"])&& isset($_POST["horaDePartida"]) && !empty($_POST["horaDePartida"]) && isset($_POST["horaDeChegada"]) && !empty($_POST["horaDeChegada"]) && isset($_POST["origem"]) && !empty($_POST["origem"]) && isset($_POST["destino"]) && !empty($_POST["destino"]) && isset($_POST["observacoes"]) && !empty($_POST["observacoes"])&& isset($_POST["quilometrospartida"]) && !empty($_POST["quilometrospartida"])&& isset($_POST["quilometroschegada"]) && !empty($_POST["quilometroschegada"])){
                                $transportes = $gere_transportes->adicionarTransporte();   
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
