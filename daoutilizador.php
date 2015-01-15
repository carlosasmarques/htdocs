<?php
	// daoutilizador.php - acesso aos dados dos utilizadores registados na base de dados

	include_once "acessobd.php";
	include_once "utilizador.php";

	class DaoUtilizador{
		private $LigacaoBD;

		public function __construct(){
			$LigacaoBD = new BaseDados();
		}
		
		 
		
		function adicionarUtilizador(Utilizador $utilizador){
			
		
			try{
				$instrucao = $LigacaoBD->prepare("insert into utilizadores (U_ID, U_NUMEROFUNCIONARIO, U_NOME, U_MORADA, 
												  U_CONTACTOTELEFONICO, U_DATANASCIMENTO, U_NOMEUTILIZADOR, U_PALAVRAPASSE,
												  U_TIPOUTILIZADOR, U_DATAREGISTO, U_FOTOGRAFIA, U_ATIVO, U_FUNCAO) values 
												  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$instrucao->bind_param($utilizador->getIdUtilizadores(), $utilizador->getNumero(), $utilizador->getNome(),
									   $utilizador->getMorada(), $utilizador->getTelefone(), $utilizador->getDataNascimento(),
									   $utilizador->getUsername(), $utilizador->getPassword(), $utilizador->getTipoUtilizador(),
									   $utilizador->getDataRegisto(), $utilizador->getFoto(), $utilizador->getActivo(), 
									   $utilizador->getFuncao());
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();

			} catch(PDOException $e){
				echo $e->getMessage();
			}
			if($sucesso_funcao){
				return "True";
			}else{
				return "False";
			}
		}
		
		function alterarPalavraPasse($palavraPasse, $id){
			try{
				$instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_palavraPasse = ? WHERE U_id = ?) VALUES (?, ?)");
				$instrucao->bind_param($palavraPasse, $id);
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();

			} catch(PDOException $e){
				echo $e->getMessage();
			}
			if($sucesso_funcao){
				return "True";
			}else{
				return "False";
			}
		}

		function verDadosUtilizador($id){
			try{
				$instrucao = $LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_id = ?");
				$instrucao->bind_param($id);
				$sucesso_funcao = $instrucao->execute();
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						return $registo;
					}
				} else {
					return NULL;
				}
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		/*
		 * 
		 * FAZER DESTA FORMA AS RESTANTES FUNÇÕES DOS DAO, DEVE DEVOLVER OBJETO 
		 */
		
		function verDadosUtilizadorUser($username){
			  
			try{
				$instrucao = $this->$LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_NOMEUTILIZADOR = ?");
				$instrucao->bind_param($username);
				$sucesso_funcao = $instrucao->execute();
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					$registo = $instrucao->fetch();
				}
				$utilizador = new Utilizador($registo["u_nome"], $registo["u_numerofuncionario"], $registo["u_id"], 
											 $registo["u_morada"], $registo["u_contatotelefonico"], $registo["u_ativo"],
											 $registo["u_tipoutilizador"], $registo["u_nomeutilizador"], $registo["u_palavrapasse"],
											 $registo["u_dataregisto"], $registo["u_datanascimento"], $registo["u_funcao"], 
											 $registo["u_fotografia"]);
				return $utilizador;
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
	}
?>