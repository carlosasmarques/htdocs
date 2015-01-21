<?php
include_once "../sessaoOk.php";
include_once "../conf.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereMensRec{
        public function verMensagemRec(){
            $id = new MensRec($_POST["id"]);
            $DaoMensagens = new DaoMensagens();
            if($mensagem = $DaoMensagens->VerMensagemRec($id)!= NULL){
                    return $mensagem;
                } else {
                	return NULL;
		}
        }
        public function pesquisarMensagensRem(){
            $remetente = new MensRec($_POST["remetente"]);
            $DaoMensagens = new DaoMensagens();
            if($mensagem = $DaoMensagens->pesquisarMensagensRem($remetente)!= NULL){
                    return $mensagem;
                } else {
                	return NULL;
		}
        }
        private function listarMensagensRec(){
            $DaoMensagens = new DaoMensagens();
            if($mensagem = $DaoMensagens->listarMensagensRec()!= NULL){
                    return $mensagem;
                } else {
                	return NULL;
		}
        }
        public function removeMensagemRec(){
            $id = new MensRec($_POST["id"]);
            $DaoMensagens = new DaoMensagens();
            if($mensagem = $DaoMensagens->removeMensagemRec($id)!= NULL){
                  return "A mensagem foi removida com sucesso!";
		} else {
		  return "Não foi possivel remover a mensagem!";
            }
        }
        public function verificarNovasMensagens(){
            
        }
    }
?>
