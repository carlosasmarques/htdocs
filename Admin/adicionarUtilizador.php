<?php

include 'daoAdministracao.php';
include 'utilizadores.php';

$bd = new BaseDados();

    adicionarUtilizador();

    function adicionarUtilizador(){
        $utilizador = new Utilizadores(NULL, $_POST["nome"], $_POST["numero"],$_POST["username"],$_POST["password"], $_POST["tipoUtilizador"] ,$_POST["morada"], $_POST["contacto"],$_POST["dataNascimento"], $_POST["funcao"]);
        $daoAdmin = new DaoAdministracao();
        if($daoAdmin->adicionarUtilizador($utilizador)){
            return "O Utilizador foi adicionado com sucesso!";
        } else {
            return "Não foi possivel adicionar o Utilizador!";
        }
    }