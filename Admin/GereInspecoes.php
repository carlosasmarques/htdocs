<?php
include_once "../sessaoOk.php";
include "conf.php";


if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereInspecoes{
        public function adicionarInspecaoPer(){
            $inspecaoPer = new inspecoes($idInspecao,$_POST["dataLimite"],$_POST["estado"]);
            $daoInspecao = new DaoInspecoes();
            
            if($daoInspecao->adicionarInspecaoPer($inspecaoPer)){
				return "A inspeção foi adicionada com sucesso!";
			} else {
				return "Não foi possivel adicionar a inspeção!";
			}    
        }
        public function editarInspecaoPer(){
            $inspecao = new inspecoes($idInspecao,$_POST["dataLimite"],$_POST["estado"]);
            $daoInspecao = new DaoInspecoes();
            
            if($daoInspecao->editarInspecao($inspecao)){
				return "A inspeção foi editada com sucesso!";
			} else {
				return "Não foi possivel editar a inspeção!";
			}  
 
        }
        public function registarComoFeita($idInsp){
            $idInspecao = new inspecoes();
            $daoInspecao = new DaoInspecoes();
            if($inspecao->registarComoFeita($idInsp)){
               return "A inspeção foi registada com sucesso!";
                } else {
                    return "Não foi possivel registar a inspeção!";
		}  
        }
        public function pesquisarInspecaoMatric(){
            $matricula = new inspecoes($_POST["matricula"]);
            $daoInspecao = new DaoInspecoes();
            if($inspecao = $daoViaturas->pesquisarInspecaoMatric($matricula)!= NULL){
                    return $inspecao;
                } else {
                	return NULL;
		}
        }
        public function pesquisarInspecaoMarca(){
            $marca = new inspecoes($_POST["marca"]);
            $daoInspecao = new DaoInspecoes();
            if($inspecao = $daoViaturas->pesquisarInspecaoMarca($marca)!= NULL){
                    return $inspecao;
                } else {
                	return NULL;
		}
        }
        public function listarInspecoesPer(){
            $daoInspecao = new DaoInspecoes();
            if($inspecao = $daoInspecao->listarInspecoesPer($idViatura)!= NULL){
                    return $viaturas;
                } else {
                	return NULL;
		}
        }
        public function verInspecaoPer(){
            $id = new inspecoes($_POST["id"]);
            $daoInspecao = new DaoInspecoes();
            if($inspecao = $daoInspecao->verInspecaoPer($id)!= NULL){
                    return $inspecao;
                } else {
                	return NULL;
		}
        }
        public function verificarInspecaoPer(){
            $daoInspecao = new DaoInspecoes();
            if($inspecao = $daoInspecao->verificarInspecaoPer()!= NULL){
                    return $inspecao;
                } else {
                	return NULL;
		}
        }
    }
?>
