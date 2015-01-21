<?php
include_once "sessaoOk.php";
include_once "conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereManutencoesInter{
        public function adicionarManutencaoInter(){
            $manutencao = new manutencaoInter($_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
            $daoManutencoesInternas = new DaoManutencoesInternas();
            if($daoManutencoesInternas->adicionarManutencaoInterna(manutencao)){
				return "A manutenção foi adicionada com sucesso!";
			} else {
				return "Não foi possivel adicionar a manutenção!";
			}
            
            
        }
        public function editarManutencaoInter(){   
            $manutencao = new manutencaoInter($_POST["id"],$_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
            $daoManutencoesInternas = new DaoManutencoesInternas();
            if($daoManutencoesInternas->editarManutencaoInterna(manutencao)){
				return "A manutenção foi editada com sucesso!";
			} else {
				return "Não foi possivel editar a manutenção!";
			}
            
        } 
       
        public function pesquisarManutInterMatric(){
            $matricula = new manutencaoInter($_POST["matricula"]);
            $DaoManutencoesInternas = new DaoManutencoesInternas();
            if($manutencao = $DaoManutencoesInternas->pesquisarManutInterMatricula($matricula)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}
        }
        private function listarManutInternas(){
            $DaoManutencoesInternas = new DaoManutencoesInternas();
            if($manutencao = $DaoManutencoesInternas ->listarManutInternas()!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}
        }
        private function verManutInterna(){
            $id = new manutencaoInter($_POST["id"]);
            $DaoManutencoesInternas= new DaoManutencoesInternas();
            if($manutencao = $DaoManutencoesInternas->verManutInterna($id)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}
        }
        
    }
?>