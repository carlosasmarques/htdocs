<?php
	/*
		daomanutencoesexternas.php - Acesso às manutenções externas registadas na base de dados
		
		 funções
			|- adicionarManutencaoExt(dados da nova manutenção externa)
			|- editarManutencaoExt(id, dados da manutenção externa)
			|- pesquisarManutExtMarca(marca das viaturas)
			|- pesquisarManutExtMatric(matricula da viatura)
			|- listarManutExternas()
			`- verManutExternas(id da manutenção externa)
	*/

	include "conf.php";
	 
	class DaoManutencoesExternas{
		private $LigacaoBD;
		
		// Ligar á base de dados
		function __construct(){
			try{
				$this->LigacaoBD = new PDO("mysql:host=$servidor;dbname=$bd", $user, $pass);
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
			return true;
		}
		
		/*
		Desligar da base de dados
		(assim que seja apagada a ultima referencia ao objeto)
		*/
		function __destruct(){
			$this->LigacaoBD == null;
		}
	
		/*****************************************************************************
			Nota: Não faz sentido passar a matricula da viatura porque a base de dados utiliza o id
		*****************************************************************************/
		public function adicionarManutencaoExt($id_viatura, $descricaoAvaria, $descReparacao, $dataAvaria, $dataReparacao, $custoReparacao){
		
			try{
				// Preparar a instrução sql de inserção
				$instrucao = $LigacaoBD->prepare("INSERT INTO MANUTENCOESEXTERNAS (V_ID, ME_DESCRICAOAVARIA, ME_DESCRICAOREPARACAO, ME_DATAAVARIA, ME_DATAREPARACAO, ME_CUSTOREPARACAO) VALUES (?, ?, ?, ?, ?, ?)");
				$instrucao->bind_param($id_viatura, $descricaoAvaria, $descReparacao, $dataAvaria, $dataReparacao, $custoReparacao);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Manutenção externa registada com sucesso<br />";
			}else{
				return "Erro ao registar a manutenção externa!<br />";
			}
		}
		
		public function editarManutencaoExt($id, $id_viatura, $descricaoAvaria, $descReparacao, $dataAvaria, $dataReparacao, $custoReparacao){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE MANUTENCOESEXTERNAS SET
				V_ID=?, ME_DESCRICAOAVARIA=?, ME_DESCRICAOREPARACAO=?, ME_DATAAVARIA=?, ME_DATAREPARACAO=?, ME_CUSTOREPARACAO=? WHERE id=?");
				$instrucao->bind_param($id_viatura, $descricaoAvaria, $descReparacao, $dataAvaria, $dataReparacao, $custoReparacao, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Manutenção externa editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da manutenção externa!<br />";
			}
		}
		
		public function pesquisarManutExtMarca($marca){
			$dados = null;

			try{
				// Pesquisar manutenções externas de uma dada marca de viaturas
				
				$instrucao = $LigacaoBD->prepare("SELECT ME_ID, V_MARCA, V_MATRICULA, ME_DATAREPARACAO FROM MANUTENCOESEXTERNAS, VIATURA WHERE MANUTENCOESEXTERNAS.V_ID = VIATURA.V_ID AND V_MARCA=?");
				$instrucao->bind_param($marca);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$dados[] = $registo;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function pesquisarManutExtMatric($matricula){
			$dados = null;

			try{
				// Pesquisar manutenções externas de uma dada viatura por matricula
				
				$instrucao = $LigacaoBD->prepare("SELECT ME_ID, V_MARCA, V_MATRICULA, ME_DATAREPARACAO FROM MANUTENCOESEXTERNAS, VIATURA WHERE MANUTENCOESEXTERNAS.V_ID = VIATURA.V_ID AND V_MATRICULA=?");
				$instrucao->bind_param($matricula);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$dados[] = $registo;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function listarManutExternas(){
			$dados = null;

			try{
				// Obter apenas os dados necessários das manutenções externas
				$instrucao = $LigacaoBD->prepare("SELECT ME_ID, V_MARCA, V_MATRICULA, ME_DATAREPARACAO FROM MANUTENCOESEXTERNAS, VIATURA WHERE MANUTENCOESEXTERNAS.V_ID = VIATURA.V_ID");

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$dados[] = $registo;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function verManutExternas($id){
			$dados = null;

			try{
				// Obter os dados da manutenção futura especificada
				$instrucao = $LigacaoBD->prepare("SELECT V_MATRICULA, ME_DESCRICAOREPARACAO, ME_DATAAVARIA FROM MANUTENCOESFUTURAS, VIATURA WHERE MANUTENCOESFUTURAS.V_ID = VIATURA.V_ID AND ME_ID=?");
				$instrucao->bind_param($id);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Se o id foi encontrado, obter os dados
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					$dados = $instrucao->fetch();
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
?>