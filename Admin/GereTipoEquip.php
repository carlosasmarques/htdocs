<?php
include_once "../sessaoOk.php";
include "conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}

class GereTipoEquip{
    function adicionaTipoEquip(){
        $tipoEquipamento = new TipoEquip($_POST["nome"]);
        $daoTipoEquip = new DaoTipoEquip();
        if($daoTipoEquip->adicionaTipoEquip($tipoEquipamento)){
            return "O Tipo de Equipamento foi adicionado com sucesso!";
        } else {
            return "O tipo de Equipamento não foi adicionado com sucesso";
        }
    }

    function listarTiposEquip(){
        $daoTipoEquip = new DaoTipoEquip();
        if(($tiposEquip = $daoTipoEquip->listarTiposEquip()) != NULL){
            return $tiposEquip;
        } else {
            return NULL;
        }
    }

    function ativarTipoEquip(){
        $idTipoEquip = $_POST["id"];
        $daoTipoEquip = new DaoTipoEquip();
        if($daoTipoEquip->ativarDesativarTipoEquip($idTipoEquip, "True")){
            return "O Tipo de Equipamento foi ativado com sucesso!";
        } else {
            return "O Tipo de Equipamento não foi ativado com sucesso!";
        }
    }

    function desativarTipoEquip(){
        $idTipoEquip = $_POST["id"];
        $daoTipoEquip = new DaoTipoEquip();
        if($daoTipoEquip->ativarDesativarTipoEquip($idTipoEquip, "False")){
            return "O Tipo de Equipamento foi desativado com sucesso!";
        } else {
            return "O Tipo de Equipamento não foi desativado com sucesso!";
        }
    }
}
?>