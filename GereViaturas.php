<?php
include "conf.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereViaturas{
        public function adicionarViatura(){
             $viatura = new Viatura($_POST["marca"], $_POST["modelo"], $_POST["matricula"], $_POST["dataMatricula"], $_POST["tipoViatura"], $_POST["combustivel"], 
                     $_POST["capacidadeDeposito"],$_POST["consumoMedio"],$_POST["lugaresSentados"],$_POST["lugaresDeitados"],$_POST["endereçoFoto"]);
             $daoViatura = new DaoViaturas();
             if($daoViaturas->adicionarViatura($viatura)){
				return "A viatura foi adicionada com sucesso!";
			} else {
				return "Não foi possivel adicionar a viatura!";
			}
        }
        public function desactivarViatura(){
            $idViatura = new Viatura($_POST["id"]);
            $daoViatura = new DaoViaturas();
            if($daoViaturas->ativarDesativarViatura("TRUE" ,$idViatura)){// duvida no param estado
				return "O estado da viatura foi alterado para desactiva";
			}else{
                        return "Erro ao alterar o estado da viatura!";
                        
                        }
        }
        public function ativarDesativarViatura(){
            $idViatura = new Viatura($_POST["id"]);
            $daoViatura = new DaoViaturas();
            if($daoViaturas->adicionarViatura("FALSE" ,$idViatura)){// duvida no param estado
				return "O estado da viatura foi alterado para activa";
			}else{
                        return "Erro ao alterar o estado da viatura!";
                        
                        }
        }
        public function editarViatura(){
            $viatura = new Viatura($_POST["id"], $_POST["marca"], $_POST["modelo"], $_POST["matricula"], $_POST["dataMatricula"], $_POST["tipoViatura"], $_POST["combustivel"], 
                     $_POST["capacidadeDeposito"],$_POST["consumoMedio"],$_POST["lugaresSentados"],$_POST["lugaresDeitados"],$_POST["endereçoFoto"],$_POST["estado"]);
            $daoViatura = new DaoViaturas();
            if($daoViaturas->editarViatura($viatura)){
				return "A viatura foi editada com sucesso!";
			} else {
				return "Não foi possivel editar a viatura!";
			}
        }
        public function pesquisaPorMarca(){
            $marcaViatura = new Viatura($_POST["marca"]);
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->pesquisarPorMarca($marcaViatura)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        public function pesquisaPorMatricula(){
            $matriculaViatura = new Viatura($_POST["matricula"]);
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->pesquisarPorMatricula($matriculaViatura)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        private function verViatura(){
            $idViatura = new Viatura($_POST["id"]);
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->verViatura($idViatura)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        private function listarViaturas(){
            $daoViatura = new DaoViaturas();
            if($viaturas = $daoViaturas->listarViaturas($idViatura)!= NULL){
                    return $viaturas;
                } else {
                	return NULL;
		}
        }
             
        
    }
?>

