<?php
    class GereUtentes{
        
        
        public function adicionarUtente($id,$nome,$numeroSNS,$morada,$telefone,$dataNascimento,$dataRegisto){

            $utente = new DaoUtentes($bd->DBH);
            
            if($utente->adicionarUtente($id,$nome,$numeroSNS,$morada,$telefone,$dataNascimento,$dataRegisto)){
                return true;
            }
                return false;
       
        }
        public function editarDadosUtente($id,$nome,$numeroSNS,$morada,$telefone,$dataNascimento,$dataRegisto){
            
            if($utente->editarDadosUtente($id,$nome,$numeroSNS,$morada,$telefone,$dataNascimento,$dataRegisto)){
                return true;
            }
                return false;
        }
        public function desativarUtente($id){
            
            if($utente->desativarUtente(false,$id)){
                return true;
            }
                return false; 
        }
        public function ativarUtente($id){
            
            if($utente->ativarUtente(true,$id)){
                return true;
            }
                return false;
        }
        public function pesquisarUtenteNome($nome){
            
            if($utente->pesquisarUtenteNome($nome)){
                return $utente;
            }
                return null;
        }
        public function pesquisarUtenteNumero($n_utente){
            
            if($utente->pesquisarUtenteNumero($n_utente)){
                return $utente;
            }
                return null;
        }
        private function verUtente(){
            
            
        }
        private function listarUtentes(){
           return $utente->listarUtentes();
        }
        
        
    }
?>

