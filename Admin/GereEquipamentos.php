<?php
include_once "sessaoOk.php";
include_once "../conf.php";
include_once "daoequipamento.php";


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

    function editarEquipamento($idEquip){
        $equipamento = new Equipamento($idEquipamento, $_POST["descricao"], $_POST["tipoArtigo"], $_POST["codigo"], $_POST["quantidadeDisponivel"], $_POST["quantidadeMinima"], $_POST["precoCompra"], $_POST["dataCompra"], "True");
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->editarEquipamento($equipamento)){
            return "O Equipamento foi bem editado!";
        } else {
            return "O Equipamento não foi bem editado!";
        }
    }

    function verEquipamento($idEquip){
        //$idEquipamento = new Equipamentos();
        $daoEquipamento = new DaoEquipamento();
        if(($equipamento = $daoEquipamento->verEquipamento($idEquip))){
            return $equipamento;
        } else {
            return NULL;
        }
    }

    function reporStockEquip($idEquip){
        $quantidadeDisponivel = $_POST["quantidadeDisponivel"];
        $precoUnidade = $_POST["precoU"];
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->reporStockEquip($idEquip,$quantidadeDisponivel,$precoUnidade)){
            return "O stock do equipamento foi reposto com sucesso!";
        } else {
            return "O stock do equipamento não foi bem reposto";
        }
    }

    function desativarEquip($idEquip){
        //$idEquipamento = new Equipamentos();
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->activarDesativarEquip($idEquip, "False")){
            return "O Equipamento foi desativado com sucesso!";
        } else {
            return "O Equipamento não foi desativado com sucesso!";
        }
    }

    function ativarEquip($idEquip){
       // $idEquipamento = new Equipamentos();
        $daoEquipamento = new DaoEquipamento();
        if($daoEquipamento->activarDesativarEquip($idEquip, "True")){
            return "O Equipamento foi ativado com sucesso!";
        } else {
            return "O Equipamento não foi ativado com sucesso!";
        }
    }

    function verificaStockEquip($idEquip){
      //  $idEquipamento = new Equipamentos();
        $daoEquipamento = new DaoEquipamento();
        if(($equipamento = $daoEquipamento->verificaStockEquip($idEquip)) != NULL){
            return $equipamento;
        } else {
            return NULL;
        }
    }

    function listarEquipamentos(){
        $daoEquipamento = new DaoEquipamento();
		echo "ola4";
		 
		$equipamentos = $daoEquipamento->listarEquipamentos();
		//print_r ($equipamentos);
        if($equipamentos != NULL){
            echo "ola5";
			return $equipamentos;
        } else {
            return NULL;
        }
    }
}
?>