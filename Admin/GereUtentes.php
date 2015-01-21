<?php
include_once "sessaoOk.php";
include_once "../conf.php";
include_once "daoutentes.php";


if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}

    class GereUtentes{
        
        public function adicionarUtente(Utentes $utentes){


            $daoutentes = new DaoUtentes();
            
            $daoutentes->adicionarUtente($utentes);
       
        }

        
        
        function editarDadosUtente(){
            $utente = new Utentes($_POST["idI"], $_POST["nome"], $_POST["$numeroSNS"], $_POST["$morada"], $_POST["$telefone"], $_POST["$dataNascimento"], $_POST["$dataRegisto"]);
            $daoutentes = new DaoUtentes();
            if($daoutentes->editarEquipamento($utente)){
                return "O Utente foi bem editado!";
            } else {
                return "O Utente não foi bem editado!";
            }

        }
        
 
        public function desativarUtente($id){
            

            $idUtentes = $_POST["id"];
            $daoUtentes = DaoUtentes();
            if($utente = $daoUtentes -> desativarUtente($idUtentes,"False")){
                return "O Utente foi desativado com sucesso!";
            }

                return "O Utente não foi desativado com sucesso!"; 
        }
        
        public function ativarUtente($id){
            

            $idUtentes = $_POST["id"];
            $daoUtentes = DaoUtentes();
            if($utente = $daoUtentes -> ativarUtente($idUtentes,"True")){
                return "O Utente foi ativado com sucesso!";
            }

                return "O Utente não foi ativado com sucesso!"; 
        }

        
        public function pesquisarUtenteNome(){
            

            $utenteNome = $POST["utenteNome"];
            $daoutentes = new DaoUtentes();
            if($utente = $daoutentes->pesquisarUtenteNome($utenteNome) != NULL){
                return $utente;
            }
                return null;
        }

        public function pesquisarUtenteNumero(){
            

            $utenteNum = $POST["$utenteNum"];
            $daoutentes = new DaoUtentes();
            if($utente = $daoutentes->pesquisarUtenteNumero($utenteNum) != NULL){
                return $utente;
            }
                return null;
        }

        public function verUtente(){
            
            
             $idUtente = $_POST["id"];
             $daoUtente = new DaoUtentes();
                if(($utente = $daoUtente->verEquipamento($idUtente))){
                   return $utente;
                } else {
                   return NULL;
                }

        }
        public function listarUtentes(){

           $daoUtentes = new DaoUtentes();
           if(($utentes = $daoUtentes -> listarUtentes()) != NULL){
               return $utentes;
           }else{
               return NULL;
           }
        }
    }
?>

