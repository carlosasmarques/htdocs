<?php
include "conf.php";
session_start();
// Ligação

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
    }
?>
