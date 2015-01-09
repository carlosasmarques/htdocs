<?php
include "conf.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
class GereEquipamentos{
    function adicionarEquipamentos(){
        $equipamento = new Equipamento($_POST["descricao"], $_POST["tipoArtigo"], $_POST["codigo"], $_POST["quantidadeDisponivel"], $_POST["quantidadeMinima"], $_POST["precoCompra"], $_POST["dataCompra"], "True");
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->adicionarEquipamento($equipamento)){
            return "O Equipamento foi adicionado com sucesso!";
        } else {
            return "O Equipamento não foi adicionado com sucesso!";
        }
    }

    function pesquisarEquipNome(){
        $descricao = $_POST["descricao"];
        $daoEquipamento = new DaoEquipamento();
        if(($equipamento = $daoEquipamento->pesquisaEquipNome($descricao))!= NULL){
            return $equipamento;
        } else {
            return NULL;
        }
    }

    function pesquisaEquipCodigo(){
        $codigo = $_POST["codigo"];
        $daoEquipamento = new DaoEquipamento();
        if(($equipamentos = $daoEquipamento->pesquisaEquipCodigo($codigo)) != NULL){
            return $equipamentos;
        } else {
            return NULL;
        }
    }

    function pesquisaEquipTipo(){
        $tipoEquip = $_POST["tipoEquip"];
        $daoEquipamento = new DaoEquipamento();
        if(($equipamentos = $daoEquipamento->pesquisaEquipTipo($tipoEquip)) != NULL){
            return $equipamentos;
        } else {
            return NULL;
        }
    }

    function editarEquipamento(){
        $equipamento = new Equipamento($_POST["id"], $_POST["descricao"], $_POST["tipoArtigo"], $_POST["codigo"], $_POST["quantidadeDisponivel"], $_POST["quantidadeMinima"], $_POST["precoCompra"], $_POST["dataCompra"], "True");
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->editarEquipamento($equipamento)){
            return "O Equipamento foi bem editado!";
        } else {
            return "O Equipamento não foi bem editado!";
        }
    }

    function verEquipamento(){
        $idEquipamento = $_POST["id"];
        $daoEquipamento = new DaoEquipamento();
        if(($equipamento = $daoEquipamento->verEquipamento($idEquipamento))){
            return $equipamento;
        } else {
            return NULL;
        }
    }

    function reporStockEquip(){
        $idEquipamento = $_POST["id"];
        $quantidadeDisponivel = $_POST["quantidadeDisponivel"];
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->reporStockEquip($idEquipamento, $quantidadeDisponivel)){
            return "O stock do equipamento foi reposto com sucesso!";
        } else {
            return "O stock do equipamento não foi bem reposto";
        }
    }

    function desativarEquip(){
        $idEquipamento = $_POST["id"];
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->activarDesativarEquip($idEquipamento, "False")){
            return "O Equipamento foi desativado com sucesso!";
        } else {
            return "O Equipamento não foi desativado com sucesso!";
        }
    }

    function ativarEquip(){
        $idEquipamento = $_POST["id"];
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->activarDesativarEquip($idEquipamento, "True")){
            return "O Equipamento foi ativado com sucesso!";
        } else {
            return "O Equipamento não foi ativado com sucesso!";
        }
    }

    function verificaStockEquip(){
        $idEquipamento = $_POST["id"];
        $daoEquipamento = new DaoEquipamento();
        if(($equipamento = $daoEquipamento->verificaStockEquip($idEquipamento)) != NULL){
            return $equipamento;
        } else {
            return NULL;
        }
    }

    function listarEquipamentos(){
        $daoEquipamento = new DaoEquipamento();
        if(($equipamentos = $daoEquipamento->listarEquipamentos()) != NULL){
            return $equipamentos;
        } else {
            return NULL;
        }
    }
}
?>