<?php
include "conf.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereAbastecimentos{
        public function adicionarAbastecimento(){
            $abastecimento = new abastecimentos($_POST["matricula"],$_POST["quantidadeCombustivel"],$_POST["dataAbastecimento"],$_POST["mediaDesteAbastecimento"]);
            $daoAbastecimento = new DaoAbastecimentos();
            if($daoAbastecimento->adicionarAbastecimento($abastecimento)){
				return "O abastecimento foi adicionado com sucesso!";
			} else {
				return "Não foi possivel adicionar o abastecimento!";
			}
        }
        public function editarAbastecimento(){
            $abastecimento = new abastecimentos($_POST["id"], $_POST["matricula"],$_POST["quantidadeCombustivel"],$_POST["dataAbastecimento"],$_POST["mediaDesteAbastecimento"]);
            $daoAbastecimento = new DaoAbastecimentos();
            if($daoAbastecimento->editarAbastecimento($abastecimento)){
				return "O abastecimento foi editado com sucesso!";
			} else {
				return "Não foi possivel editar o abastecimento!";
			}
       
        }
        public function pesquisarAbastecimento(){
            $id = new abastecimentos($_POST["id_viatura"]);
            $daoAbastecimentos = new DaoAbastecimentos();
            if($abastecimento = $daoAbastecimentos->pesquisarAbastecimento($id)!= NULL){
                    return $abastecimento;
                } else {
                	return NULL;
		}
        }
        private function listarAbastecimento(){
            $daoAbastecimentos = new DaoAbastecimentos();
            if($abastecimento = $daoAbastecimentos->listarAbastecimento()!= NULL){
                    return $abastecimento;
                } else {
                	return NULL;
		}
        }
        private function verAbastecimento(){
            $id = new abastecimentos($_POST["id"]);
            $daoAbastecimentos = new DaoAbastecimentos();
            if($abastecimento = $daoAbastecimentos->verAbastecimento($id)!= NULL){
                    return $abastecimento;
                } else {
                	return NULL;
		}
        }
    }
?>