<?php
include_once "../sessaoOk.php";
include "conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereAcoesUtilizadores{
        public function guardarAcaoUtilizador(){
            $acao = new AcoesUtilizadores($_POST["acao"]);
            $DaoAcoesUtilizadores = new DaoAcoesUtilizadores();
            if($DaoAcoesUtilizadores->guardarAcaoUtilizador($acao)){
				return "A ação foi adicionada com sucesso!";
			} else {
				return "Não foi possivel adicionar a ação!";
			}
        }
        public function listarAcoesUtilizador(){
            $DaoAcoesUtilizadores = new DaoAcoesUtilizadores();
            if($acao = $DaoAcoesUtilizadores->listarAcoesUtilizadores()!= NULL){
                    return $acao;
                } else {
                	return NULL;
		}
        }
        public function pesquisarAccoesData(){
            $data = new AcoesUtilizadores($_POST["dataHora"]);
            $DaoAcoesUtilizadores = new DaoAcoesUtilizadores();
            if($abastecimento = $daoAbastecimentos->pesquisarAcoesData($data)!= NULL){
                    return $abastecimento;
                } else {
                	return NULL;
		}
        }
        public function pesquisarAccoesUtilizador(){
            $utilizador = new AcoesUtilizadores($_POST["utilizador"]);
            $DaoAcoesUtilizadores = new DaoAcoesUtilizadores();
            if($acao = $DaoAcoesUtilizadores->pesquisarAcoesUtilizador($utilizador)!= NULL){
                    return $acao;
                } else {
                	return NULL;
		}
        }
    }
?>