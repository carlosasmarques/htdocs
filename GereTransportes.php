<?php
include_once "sessaoOk.php";
include_once "conf.php";
include_once "daotransportes.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}


    class GereTransportes{
    	public function adicionarTransporte(Transportes $transporte){
            $daotransportes = new DaoTransportes();
            
            $daotransportes->adicionarTransporte($transporte);
        	
        }
        
        public function editarTransporte(){
            $transporte = new Transportes($_POST["nome"],$_POST["$numeroSNS"],$_POST["$morada"],$_POST["$telefone"],$_POST["$dataNascimento"],$_POST["$dataRegisto"]);            $daoutentes = new DaoUtentes();
            $daotranporte = new DaoTransportes();
            if($transporte = $daotranporte ->editarTransporte($transporte)){
                return "O Transporte foi editado com sucesso!";
            }
                return "O Transporte não foi editado com sucesso!";
            }
        
        
        public function pesquisarTransUtente(){
            $utenteNome = $_POST["utenteNome"];
            $daotransutente = new DaoTransportes();
            if(($transporte = $daotransutente ->pesquisarTransUtente($utenteNome)) != NULL ){
                return $utenteNome;
            }
                return NULL;
        }
        
        public function pesquisarTransViatura(){
            $viaturas = $_POST["viatura"];
            $daotransutente = new DaoTransportes();
            if(($transporte = $daotransutente ->pesquisarTransViatura($viaturas)) != NULL ){
                return $viaturas;
            }
                return NULL;
        }
        public function pesquisarTransFunc(){
            $funcao = $_POST["funcao"];
            $daotransutente = new DaoTransportes();
            if(($transporte = $daotransutente ->pesquisarTransFunc($funcao)) != NULL ){
                return $funcao;
            }
                return NULL;
        }
        public function listarTransporte(){
			
           $daotransportes = new DaoTransportes();
           if(($transporte = $daotransportes ->listarTransportes()) != NULL){
               
			   return $transporte;
           }else{
               return NULL;
           }
        }
        public function pesquisarTransData(){
            $data = $_POST["data"];
            $daotransutente = new DaoTransportes();
            if(($transporte = $daotransutente ->pesquisarTransData($data)) != NULL ){
                return $data;
            }
                return NULL;
        }
        private function verTransportes(){
             $idTransporte = $_POST["id"];
             $daotransutente = new DaoTransportes();
             if(($transporte = $daotransutente->verTransporte($idTransporte))){
                   return $transporte;
                } else {
                   return NULL;
                }
        }
        
        /*private function listarTransporte(){
           $daotransportes = new DaoTransportes();
           if(($transporte = $daotransportes ->listarTransportes()) != NULL){
               return $transporte;
           }else{
               return NULL;
        }
        
        }*/
    }
?>
