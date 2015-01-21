<?php
include_once "sessaoOk.php";
include_once "../conf.php";
include_once "daoAdministracao.php";

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}

	class GereAdministracao{
		public function adicionarUtilizador(){
            $utilizador = new Utilizadores(NULL, $_POST["nome"], $_POST["numero"],$_POST["morada"], $_POST["contacto"], 1, $_POST["tipoUtilizador"], $_POST["username"], $_POST["password"], $_POST["dataRegisto"], $_POST["dataNascimento"], $_POST["funcao"]);
            $daoAdmin = new DaoAdministracao();
			if($daoAdmin->adicionarUtilizador($utilizador)){
				return "O Utilizador foi adicionado com sucesso!";
			} else {
				return "Não foi possivel adicionar o Utilizador!";
			}
		}
        public function editarUtilizador(){
            $utilizador = new Utilizador($idUtilizador,$_POST["nome"], $_POST["numero"],$_POST["morada"], $_POST["telefone"], $_POST["activo"], $_POST["tipoUtilizador"], $_POST["username"], $_POST["password"], $_POST["dataRegisto"], $_POST["dataNascimento"], $_POST["funcao"]);
            $daoAdmin = new DaoAdminstracao();
            if($daoAdmin->editarUtilizador($utilizador)){
                return "O Utilizador foi editado com sucesso!";
            } else {
                return "Os dados dos utilizadores não foram editados com sucesso!";
            }
        }
        public function pesquisarNome(){
            $nome = $_POST["nome"];
            $daoAdmin = new DaoAdminstracao();
            if(($utilizador = $daoAdmin->pesquisarNome($nome))!= NULL){
                return $utilizador;
            } else {
                return NULL;
            }
        }
        public function pesquisarNumero(){
            $numero = $_POST["numero"];
            $daoAdmin = new DaoAdminstracao();
            if(($utilizador = $daoAdmin->pesquisarNumero($numero))!= NULL){
                return $utilizador;
            } else {
                return NULL;
            }
        }
        public function activaConta($idUtilizador){
            $daoAdmin = new DaoAdministracao();
            if($daoAdmin->ativarDesativarConta($idUtilizador, "True")){
                return "A conta do Utilizador foi ativado com sucesso!";
            } else {
                return "A conta do Utilizador não foi ativada com sucesso!";
            }
        }
        public function desactivaConta($idUtilizador){
            $daoAdmin = new DaoAdministracao();
            if($daoAdmin->ativarDesativarConta($idUtilizador, "False")){
                return "A conta do Utilizador foi desativado com sucesso!";
            } else {
                return "A conta do Utilizador não foi desativada com sucesso!";
            }
        }
        public function listarUtilizadores(){
            $daoAdmin = new DaoAdministracao();
            if(($utilizador = $daoAdmin->listarUtilizadores())!= NULL){
                return $utilizador;
            } else {
                return NULL;
            }
        }
	}
?>