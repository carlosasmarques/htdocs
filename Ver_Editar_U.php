<?php
	include "GereEquipamentos.php";
	
        $gere_equipamento = new GereEquipamentos();
        $equipamentos = new Equipamentos(0,"","",0,0,"",0,"",false);
        $idEquip = $_GET["id"];
        $equipamentos = $gere_equipamento->verEquipamento($idEquip);
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

    <title>FMT | Ver/Editar</title>

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
                    <li><a href="inicial.php"><span>Principal</span></a>
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
                        <li><a href="inicial.php">Utilizador</a>
                        </li>
                        <li><a href="Gestao_stock_U.html">Gestão de Stocks</a>
                        </li>
                        <li class="active">Ver/Editar</li>
                    </ol>
                    <h1 class="page-header">Ver/Editar</h1>





                    <div class="col-sm-6 col-md-4">
                        <form  method="POST" action="Ver_Editar_U.php">
                            <div class="form-group">
                                <label class="CodigodoArtigo">Código do Artigo:</label>
                                <input type="text" class="form-control" id="codigo" value="<?php echo $equipamentos[$i]->getCodigo() ?>">
                            </div>

                            <div class="form-group">
                                <label class="PreçodoArtigo">Preço do Artigo:</label>
                                <br>
                                <input type="text" class="form-control" id="precoCompra" value="<?php echo $equipamentos[$i]->getPreco() ?>">
                               
                            </div>
                            <div class="form-group">
                                <label class="qtminimapermitida">Data da Compra:</label>
                                <input type="date" class="form-control" name="dataCompra" id="dataCompra" >
                            </div>
                            <div class="form-group">
                                <label class="qtminimapermitida">Quantidade Disponível:</label>
                                <input type="text" class="form-control" id="quantidadeDisponivel" value="<?php echo $equipamentos[$i]->getQuantidadeExistente() ?>">
                            </div>

                        </form>

                    </div>
                    <div class="col-sm-6 col-md-4">
                        <form  method="POST" action="Ver_Editar_U.php">
                            <div class="form-group">
                                <label class="DescricaodoArtigo">Descrição do Artigo:</label>
                                <input type="text" class="form-control" id="descricao" value="<?php echo $equipamentos[$i]->getDescricao() ?>">
                            </div>

                            <div class="form-group">
                                <label class="qtminimapermitida">Quantidade Mínima Permitida:</label>
                                <input type="text" class="form-control" id="quantidadeMinima" value="<?php echo $equipamentos[$i]->getQuantidadeMinima() ?>">
                            </div>

                            <div class="form-group">
                                <label class="TipodeArtigo">Tipo de Artigo:</label>
                                <select class="form-control" name="tipoArtigo" id="tipoArtigo" value="<?php echo $equipamentos[$i]->getTipoEquipamentos() ?>">
                                    <option>Equipamento de Combate a Incendios</option>
                                    <option>Equipamento Médico</option>
                                    <option>Equipamento Mecânico</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <a href="./Gestao_stock_U.html" class="btn btn-danger btn-xl pull-right"> Voltar </a>
                                <a class="btn btn-primary btn-xl pull-right" > Guardar Alterações </a>
                                <br/>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST["quantidadeDisponivel"]) && !empty($_POST["quantidadeDisponivel"])&&isset($_POST["tipoArtigo"]) && !empty($_POST["tipoArtigo"])&& isset($_POST["codigo"]) && !empty($_POST["codigo"])&& isset($_POST["precoCompra"]) && !empty($_POST["precoCompra"]) && isset($_POST["descricao"]) && !empty($_POST["descricao"]) && isset($_POST["quantidadeMinima"]) && !empty($_POST["quantidadeMinima"]) && isset($_POST["dataCompra"]) && !empty($_POST["dataCompra"])){
                                $equipamentos = $gere_equipamento->editarEquipamento($idEquip);   
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