<?php
include "conf.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}
    class GereMensEnv{
        public function enviarMensagem(){
            $destinatario = new MensEnv($_POST["destinatario"]);
            $daomensagem = new DaoMensagens();
            if(($mensagem = $daomensagem ->enviarMensagem($destinatario)) != NULL ){
                return "mensagem enviada com sucesso";
            }else{
                return "Mensagem nao enviada";
            }
        }
        
        public function verMensagemEnv(){
            $id = new MensEnv($_POST["id"]);
            $daomensagem = new DaoMensagens();
            if(($mensagem = $daomensagem ->verMensagemEnv($id)) != NULL ){
                return $mensagem;
            }else{
                return NULL;
            }
        }
        public function pesquisarMensagemDest(){
            $origem = new MensRec($_POST["origem"]);
            $daoMensagens = new DaoMensagens();
            if($mensagem = $daoMensagens->pesquisarMensagensDest($origem)!= NULL){
                    return $mensagem;
                } else {
                	return NULL;
		}
        }
        private function listarMensagensEnviadas(){
            $daoMensagens = new DaoMensagens();
            if($mensagem = $daoMensagens->listarMensagensEnviadas()!= NULL){
                    return $mensagem;
                } else {
                	return NULL;
		}
        }
        public function removeMensagemEnv(){
            $idrec = new MensRec($_POST["id"]);
            $daoMensagens = new DaoMensagens();
            if($mensagem = $daoMensagens->removeMensagemEnv($idrec)!= NULL){
                  return "A mensagem foi removida com sucesso!";
		} else {
		  return "Não foi possivel remover a mensagem!";
            }
        }
    }
?>

