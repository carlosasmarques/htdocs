<?php
include_once "sessaoOk.php";
include_once "../conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereManutencoesFutur{
        public function adicionarManutencaoFutur(){
           $manutencao = new manutencaoFutur($_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
           $daoManutencoesFutur = new DaoManutencoesFuturas();
           if($daoManutencoesFutur->adicionarManutencoesFutur($manutencao)){
                    return "A manutenção foi adicionada com sucesso!";
            } else {
                    return "Não foi possivel adicionar a manutenção!";
            }
            
        }
        public function editarManutencaoFutur(){   
            $manutencao = new manutencaoFutur($_POST["id"],$_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
            $daoManutencoesFuturas = new DaoManutencoesFuturas();
            if($daoManutencoesFuturas->editarManutencoesFutur($manutencao)){
                    return "A manutenção foi editada com sucesso!";
            } else {
                    return "Não foi possivel editar a manutenção!";
            }                  
        } 
        public function pesquisarManutFuturMarca(){
            $marca = new manutencaoFutur ($_POST["marca"]);
            $daoManutencoesFuturas = new DaoManutencoesFuturas();
            if($manutencao = $daoManutencoesFuturas->pesquisarManutFuturMarca($marca)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}
        }
        public function pesquisarManutFuturMatric(){
            $matricula = new manutencaoFutur ($_POST["matricula"]);
            $daoManutencoesFuturas = new DaoManutencoesFuturas();
            if($manutencao = $daoManutencoesFuturas->pesquisarManutFuturMatricula($matricula)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}            
        }
        private function listarManutFuturas(){
            $daoManutencoesFuturas = new DaoManutencoesFuturas();
            if($manutencao = $daoManutencoesFuturas ->listarManutFuturas()!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}            
        }
        private function verManutFutura(){
            $id = new manutencaoFutur($_POST["id"]);
            $daoManutencoesFuturas= new DaoManutencoesFuturas();
            if($manutencao = $daoManutencoesFuturas->verManutFutura($id)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}            
        }
        public function verificaManutFutura(){
            $matricula = new manutencaoFutur($_POST["matricula"]);
            $daoManutencoesFuturas= new DaoManutencoesFuturas();
            if($daoManutencoesFuturas->verificarManutFutura($matricula)!= NULL){
                    return "Existem manutenções";
                } else {
                	return "Não existem manutenções";
		}  
        }
        public function registarComoFeita(){
            $id = new manutencaoFutur($_POST["id"]);
            $daoManutencoesFuturas= new DaoManutencoesFuturas();
            if($daoManutencoesFuturas->registarComoFeita($id)!= NULL){
                    return "Manutenção registada";
                } else {
                	return "Manutenção não registada";
		}  
        }
    }
?>

