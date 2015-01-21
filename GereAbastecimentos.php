<?php
include_once "sessaoOk.php";
include_once "conf.php";
include_once "daoabastecimentos.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereAbastecimentos{
        public function adicionarAbastecimento(){
              $daoabastecimentos = new DaoAbastecimentos();
            
            $daoabastecimentos->adicionarAbastecimento($abastecimento);
        }
        public function editarAbastecimento($idAbast){
            $abastecimento = new abastecimentos($idAbast, $_POST["matricula"],$_POST["localAbast"],$_POST["quantidadeCombustivel"],$_POST["quilometragem"],$_POST["dataAbastecimento"],$_POST["mediaDesteAbastecimento"]);
            $daoAbastecimento = new DaoAbastecimentos();
            if($daoAbastecimento->editarAbastecimento($abastecimento)){
				return "O abastecimento foi editado com sucesso!";
			} else {
				return "Não foi possivel editar o abastecimento!";
			}
       
        }
        public function pesquisarAbastecimento($idAbast){
            //$idAbastecimentos = new abastecimentos();
            $daoAbastecimentos = new DaoAbastecimentos();
            if($abastecimento = $daoAbastecimentos->pesquisarAbastecimento($idAbast)!= NULL){
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
        private function verAbastecimento($idAbast){
            //$idAbastecimentos = new abastecimentos();
            $daoAbastecimentos = new DaoAbastecimentos();
            if($abastecimento = $daoAbastecimentos->verAbastecimento($idAbast)!= NULL){
                    return $abastecimento;
                } else {
                	return NULL;
		}
        }
    }
?>