<?php

include 'daoutilizador.php';
include 'utilizadores.php';

$bd = new BaseDados();

if ($bd->contar("utilizadores") == 0){
    
    inserirAdministrador($administrador);
}

function inserirAdministrador(){
    $nome = "Administrador";
    $numero = "0";
    $username = "administrador";
    $password = "1234";
    $tipoUtilizador = "0";
    $dataDeRegisto = "now()";
    $morada = "Rua Dr. Alberto Moura Pinto";
    $telefone = "235721503";
    $dataNascimento = "now()";
    $funcao = "administrador";
    $ativo = "1";
    $caminhoFoto = "./fotografias/administrador.png";
    
    $admin = new Utilizadores(NULL, $nome, $numero, $username, $password, $tipoUtilizador, $dataDeRegisto, $morada, 
                              $telefone, $dataNascimento, $funcao, $ativo, $caminhoFoto);
    
    $daoUtilizador = new DaoUtilizador();
    
    $daoUtilizador->adicionarUtilizador($utilizador);
}

?>