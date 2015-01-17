<?php
include "conf.php";
include "daoviaturas.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereViaturas{
        public function adicionarViatura(){
             $viatura = new Viaturas($_POST["marca"], $_POST["modelo"], $_POST["matricula"], $_POST["dataMatricula"], $_POST["tipoViatura"], $_POST["combustivel"], 
                     $_POST["capacidadeDeposito"],$_POST["consumoMedio"],$_POST["lugaresSentados"],$_POST["lugaresDeitados"],$_POST["endereçoFoto"]);
             $daoViatura = new DaoViaturas();
             if($daoViaturas->adicionarViatura($viatura)){
				return "A viatura foi adicionada com sucesso!";
			} else {
				return "Não foi possivel adicionar a viatura!";
			}
        }
        public function desactivarViatura($idViat){
            $daoViatura = new DaoViaturas();
            if($daoViaturas->ativarDesativarViatura("TRUE" ,$idViat)){// duvida no param estado
				return "O estado da viatura foi alterado para desactiva";
			}else{
                        return "Erro ao alterar o estado da viatura!";
                        
                        }
        }
        public function ativarViatura($idViat){
            $daoViatura = new DaoViaturas();
            if($daoViaturas->adicionarViatura("TRUE" ,$idViat)){
			return "O estado da viatura foi alterado para activa";
		}else{
                        return "Erro ao alterar o estado da viatura!";
                        
                        }
        }
        public function desativarViatura($idViat){
            $daoViatura = new DaoViaturas();
            if($daoViaturas->adicionarViatura("FALSE" ,$idViat)){
			return "O estado da viatura foi alterado para activa";
		}else{
                        return "Erro ao alterar o estado da viatura!";
                        
                        }
        }
        
        public function editarViatura($idViat){
            $viatura = new Viaturas($idViat, $_POST["marca"], $_POST["modelo"], $_POST["matricula"], $_POST["dataMatricula"], $_POST["tipoViatura"], $_POST["combustivel"], 
                     $_POST["capacidadeDeposito"],$_POST["consumoMedio"],$_POST["lugaresSentados"],$_POST["lugaresDeitados"],$_POST["endereçoFoto"],$_POST["estado"]);
            $daoViatura = new DaoViaturas();
            if($daoViaturas->editarViatura($viatura)){
				return "A viatura foi editada com sucesso!";
			} else {
				return "Não foi possivel editar a viatura!";
			}
        }
        public function pesquisaPorMarca(){
            $marcaViatura = new Viaturas($_POST["marca"]);
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->pesquisarPorMarca($marcaViatura)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        public function pesquisaPorMatricula(){
            $matriculaViatura = new Viaturas($_POST["matricula"]);
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->pesquisarPorMatricula($matriculaViatura)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        public function verViatura($idViat){
            $daoViatura = new DaoViaturas();
            if($viatura = $daoViaturas->verViatura($idViat)!= NULL){
                    return $viatura;
                } else {
                	return NULL;
		}
        }
        public function listarViaturas(){
            $daoViatura = new DaoViaturas();
            if($viaturas = $daoViaturas->listarViaturas()!= NULL){
                    return $viaturas;
                } else {
                	return NULL;
		}
        }
             
        
    }
?>

