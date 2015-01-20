<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FMT | Esqueci-me da Palavra Passe</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="../Login.css" rel="stylesheet">
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

<body style="background-image: url(../fmt2.jpg);">

    <div class="container pull-right">

        <!-- Contacts -->
        <div id="contacts">
            <div class="centered">
                <!-- Alignment -->
                <div class="col-sm-offset-3 col-sm-6" style="margin-left: 15%">
                    <!-- Form itself -->
                    <form name="sentMessage" class="well" id="enviarmensagem" novalidate>
                        <h2 class="sub-header">Mensagem</h2>
                        <div class="control-group">
                            <div class="controls">

                                <input type="text" class="form-control" placeholder="Nome de Administrador" id="name" required data-validation-required-message="Insira o Nome de Administrador" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <label class="form-control" id="nomedestinatario">Administrador</label>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control" Value="Esqueci-me da minha palavra passe" id="assunto" required data-validation-required-message="Insira o Assunto" />
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <textarea rows="10" cols="100" class="form-control" placeholder="Introduza a mensagem" id="message" required data-validation-required-message="Introduza a sua mensagem" data-validation-minlength-message="Insira no minimo 5 caracteres" maxlength="999" style="resize:none">Esqueci-me da minha palavra passe e gostava de conseguir aceder ao sistema, etc...</textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                        <br />
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>

</html>