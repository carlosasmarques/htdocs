<?php
	// daoutilizador.php - acesso aos dados dos utilizadores registados na base de dados

	include_once "acessobd.php";


	class DaoUtilizador{
		private $bd;
		
		public function __construct(){
			$bd = new BaseDados();
		}
		
		 
		
    function adicionarUtilizador(Utilizadores $utilizador){
        
            $sql = ("insert into utilizadores (U_NUMEROFUNCIONARIO, U_NOME, U_MORADA, 
					       U_CONTACTOTELEFONICO, U_DATANASCIMENTO, U_NOMEUTILIZADOR, U_PALAVRAPASSE,
					       U_TIPOUTILIZADOR, U_DATAREGISTO, U_FOTOGRAFIA, U_ATIVO, U_FUNCAO) values 
                                               (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


			/* (:ID, :NUMEROFUNCIONARIO, :NOME, :MORADA, :CONTATOTELEFONICO, :DATANASCIMENTO, 
                                               //:NOMEUTILIZADOR, :PALAVRAPASSE, :TIPOUTILIZADOR, :DATAREGISTO, :FOTOGRAFIA, 
                                               //:ATIVO, :FUNCAO)");
           $dados = array("ID" =>$utilizador->getIdUtilizadores(), "NUMEROFUNCIONARIO" =>$utilizador->getNumero(), 
                           "NOME" =>$utilizador->getNome(), "MORADA" =>$utilizador->getMorada(), 
                           "CONTATOTELEFONICO" =>$utilizador->getTelefone(), "DATANASCIMENTO" =>$utilizador->getDataNascimento(), 
                           "NOMEUTILIZADOR" =>$utilizador->getUsername(), "PALAVRAPASSE" =>$utilizador->getPassword(), 
                           "TIPOUTILIZADOR" =>$utilizador->getTipoUtilizador(), "DATAREGISTO" =>$utilizador->getDataDeRegisto(), 
                           "FOTOGRAFIA" =>$utilizador->getCaminhoFoto(), "ATIVO" =>$utilizador->getAtivo(), "FUNCAO" =>$utilizador->getFuncao());
            */
			
			$dados_utilizador = array(
				'U_NUMEROFUNCIONARIO' => $utilizador->getNumero(),
				'U_NOME' => $utilizador->getNome(),
				'U_MORADA' => $utilizador->getMorada(),
				'U_CONTACTOTELEFONICO' => $utilizador->getTelefone(),
				'U_DATANASCIMENTO' => $utilizador->getDataNascimento(),
				'U_NOMEUTILIZADOR' => $utilizador->getUsername(),
				'U_PALAVRAPASSE' => $utilizador->getPassword(),
				'U_TIPOUTILIZADOR' => $utilizador->getTipoUtilizador(),
				'U_DATAREGISTO' => $utilizador->getDataDeRegisto(),
				'U_FOTOGRAFIA' => $utilizador->getCaminhoFoto(),
				'U_ATIVO' => $utilizador->getAtivo(),
				'U_FUNCAO' => $utilizador->getFuncao()
			);
			
			
            
            $bd->inserir($sql, $dados_utilizador);

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
		
		function verDadosUtilizadorUser($username) {

        try {
            $instrucao = $this->$LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_NOMEUTILIZADOR = ?");
            $instrucao->bind_param($username);
            $sucesso_funcao = $instrucao->execute();
            if ($sucesso_funcao) {
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                $registo = $instrucao->fetch();
            }
            $utilizador = new Utilizador($registo["u_nome"], $registo["u_numerofuncionario"], 
                                         $registo["u_id"], $registo["u_morada"], $registo["u_contatotelefonico"], 
                                         $registo["u_ativo"], $registo["u_tipoutilizador"], $registo["u_nomeutilizador"], 
                                         $registo["u_palavrapasse"], $registo["u_dataregisto"], 
                                         $registo["u_datanascimento"], $registo["u_funcao"], $registo["u_fotografia"]);
            return $utilizador;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
?>