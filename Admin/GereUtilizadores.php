<?php
include_once "../sessaoOk.php";
include_once "daoutilizador.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereUtilizadores{
        public function alterarPalavraPasse(){
             $idUti = $_POST["id"];
             $daoutilizador = new DaoUtilizador();
                if(($uti = $daoutilizador->alterarPalavraPasse($idUti))){
                   return "Alterado com sucesso";
                } else {
                   return "Não alterado com sucesso";
        }
        }
        private function verDadosUtilizador(){
             $idUti = $_POST["id"];
             $daoutilizador = new DaoUtilizador();
                if(($uti = $daoutilizador->verDadosUtilizador($idUti))){
                   return $uti;
                } else {
                   return NULL;
        }
        
    }
    
        public function alterarDadosUtilizador(){
        

             
             $utilizador = new Utilizador($_POST["$numero"],$_POST["$username"],$_POST["$funcao"],$_POST["$nome"],$_POST["$morada"],$_POST["$telefone"],$_POST["$dataNascimento"]);
              if($utilizador->adicionarUtilizador($utilizador)){
                return "O Utilizador foi alterado com sucesso!";
            }
                return "O Utilizador não foi alterado com sucesso!";
       
        
    }
            public function listarUtilizador(){

           $daoutilizador = new DaoUtilizador();
           if(($utilizador = $daoutilizador ->listarUtilizador()) != NULL){
               return $utilizador;
           }else{
               return NULL;
           }
        }
    }
?>
