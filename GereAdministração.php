<?php
include "conf.php";
session_start();
// Ligação

if(isset($_GET["logout"])){
    if($_GET["logout"]== true)
        unset($_SESSION);
}

	class GereAdministracao{

		public function adicionarUtilizador($nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone){
            $daoAdmin = new DaoAdminstracao();
			if($daoAdmin->adicionarUtilizador($nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone)){
				return "O Utilizador foi adicionado com sucesso!";
			} else {
				return "Não foi possivel adicionar o Utilizador!";
			}
		}
        public function editarUtilizador($id, $nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone){
            $daoAdmin = new DaoAdminstracao();
            if($daoAdmin->editarUtilizador($id, $nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone)){
                return "O Utilizador foi editado com sucesso!";
            } else {
                return "Os dados dos utilizadores não foram editados com sucesso!";
            }
        }
        public function pesquisarNome($nome){
            $daoAdmin = new DaoAdminstracao();
            if(($utilizador = $daoAdmin->pesquisarNome($nome))!= NULL){
                return $utilizador;
            } else {
                return NULL;
            }
        }
        public function pesquisarNumero($numero){
            $daoAdmin = new DaoAdminstracao();
            if(($utilizador = $daoAdmin->pesquisarNumero($numero))!= NULL){
                return $utilizador;
            } else {
                return NULL;
            }
        }
        public function activaConta($id){
            $daoAdmin = new DaoAdministracao();
            if($daoAdmin->ativarDesativarConta($id, "True")){
                return "A conta do Utilizador foi ativado com sucesso!";
            } else {
                return "A conta do Utilizador não foi ativada com sucesso!";
            }
        }
        public function desactivaConta($id){
            $daoAdmin = new DaoAdministracao();
            if($daoAdmin->ativarDesativarConta($id, "False")){
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