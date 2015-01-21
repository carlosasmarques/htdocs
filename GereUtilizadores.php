<?php
include_once "sessaoOk.php";
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
    
    function inserirUtilizador() {

        // definir o fuso horario para deixar de dar Warnings
        date_default_timezone_set('Europe/Lisbon');

        $nome = $_GET["nome"];
        $numero = $_GET["numero"];
        $username = $_GET["username"];
        $password = $_GET["password"];
        $tipoUtilizador = $_GET["name"];
        $dataDeRegisto = date('Y-m-d', time());
        $morada = $_GET["morada"];
        $telefone = $_GET["contacto"];
        $dataNascimento = date('Y-m-d', time());
        $funcao = $_GET["funcao"];
        $ativo = $_GET["1"];
        $caminhoFoto = "./fotografias/administrador.png";

        $user = new Utilizadores(NULL, $nome, $numero, $username, $password, $tipoUtilizador, $dataDeRegisto, $morada, $telefone, $dataNascimento, $funcao, $ativo, $caminhoFoto);

        $daoUtilizador = new DaoUtilizador();

        $daoUtilizador->adicionarUtilizador($user);
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
