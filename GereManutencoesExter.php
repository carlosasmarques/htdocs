<?php
include_once "sessaoOk.php";
include_once "conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereManutencoesExter{
        public function adicionarManutencaoExt(){
           $manutencao = new manutencaoExt($_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
           $daoManutencoesExt = new DaoManutencoesExternas();
           if($daoManutencoesExt->adicionarManutencoesExt($manutencao)){
                    return "A manutenção foi adicionada com sucesso!";
            } else {
                    return "Não foi possivel adicionar a manutenção!";
            }

        }
        public function editarManutencaoExt(){   
            $manutencao = new manutencaoExt($_POST["id"],$_POST["id_viatura"],$_POST["dataManutencao"],$_POST["descricaoAvaria"],$_POST["quantidadeMaterialGasto"]);
            $daoManutencoesExt = new DaoManutencoesExternas();
            if($daoManutencoesExt->editarManutencoesExt(manutencao)){
                    return "A manutenção foi editada com sucesso!";
            } else {
                    return "Não foi possivel editar a manutenção!";
            }            
        } 
        public function pesquisarManutExtMarca(){
            $marca = new manutencaoExt($_POST["marca"]);
            $daoManutencoesExt = new DaoManutencoesExternas();
            if($manutencao = $daoManutencoesExt->pesquisarManutExtMarca($marca)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}            
        }
        public function pesquisarManutExtMatric(){
            $matricula = new manutencaoExt($_POST["matricula"]);
            $daoManutencoesExt = new DaoManutencoesExternas();
            if($manutencao = $daoManutencoesExt->pesquisarManutExtMatricula($matricula)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}                 
        }
        private function listarManutExternas(){
            $daoManutencoesExt = new DaoManutencoesExternas();
            if($manutencao = $daoManutencoesExt ->listarManutExternas()!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}
        }
        private function verManutExternas(){
            $id = new manutencaoExt($_POST["id"]);
            $daoManutencoesExt = new DaoManutencoesExternas();
            if($manutencao = $daoManutencoesExt->verManutExternas($id)!= NULL){
                    return $manutencao;
                } else {
                	return NULL;
		}           
        }
    }
?>
