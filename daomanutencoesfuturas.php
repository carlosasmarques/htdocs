<?php
	/*
		daomanutencoesfuturas.php - Acesso às manutenções futuras registadas na base de dados
		
		 funções
			|- adicionarManutencaoFutur(dados da nova manutenção futura)
			|- editarManutencaoFutur(id, dados da manutenção futura)
			|- pesquisarMantFuturMarca(marca das viaturas)
			|- pesquisarManutFuturMatric(matricula da viatura)
			|- verificaManutFutura()
			|- registarComoFeita(id)
			|- listarManutFuturas()
			`- verManutencaoFuturas(id da manutenção futura)
	*/

	include "conf.php";
	 
	class DaoManutencoesFuturas{
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
		public function adicionarManutencaoFutur($id_viatura, $descricaoManutencao, $data, $quilometragem, $estado){
		
			try{
				// Preparar a instrução sql de inserção
				/*********************************************************************
					Nota: falta o parametro "quilometragem atual"
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("INSERT INTO MANUTENCOESFUTURAS (V_ID, MF_DESCRICAOMANUTENCAO, MF_DATAMANUTENCAO, MF_QUILOMETRAGEMFUTURA, MF_ESTADO) VALUES (?, ?, ?, ?, ?)");
				$instrucao->bind_param($id_viatura, $descricaoManutencao, $data, $quilometragem, $estado);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Manutenção futura registada com sucesso<br />";
			}else{
				return "Erro ao registar a manutenção futura!<br />";
			}
		}
		
		public function editarManutencaoFutur($id, $id_viatura, $descricaoManutencao, $data, $quilometragem, $estado){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE MANUTENCOESFUTURAS SET
				V_ID=?, MF_DESCRICAOMANUTENCAO=?, MF_DATAMANUTENCAO=?, MF_QUILOMETRAGEMFUTURA=?, MF_ESTADO=? WHERE id=?");
				$instrucao->bind_param($id_viatura, $descricaoManutencao, $data, $quilometragem, $estado, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Manutenção futura editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da manutenção futura!<br />";
			}
		}
		
		public function pesquisarMantFuturMarca($marca){
			$dados = null;

			try{
				// Pesquisar manutenções futuras de uma dada marca de viaturas
				
				/*********************************************************************
					Nota: falta o "tipo" e "custo" de manutenção na base de dados
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT MF_ID, V_MARCA, V_MATRICULA, MF_DATAMANUTENCAO FROM MANUTENCOESFUTURAS, VIATURA WHERE MANUTENCOESFUTURAS.V_ID = VIATURA.V_ID AND V_MARCA=?");
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
		
		public function pesquisarManutFuturMatric($matricula){
			$dados = null;

			try{
				// Pesquisar manutenções futuras de uma dada viatura por matricula
				
				/*********************************************************************
					Nota: falta o "tipo" e "custo" de manutenção na base de dados
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT MF_ID, V_MARCA, V_MATRICULA, MF_DATAMANUTENCAO FROM MANUTENCOESFUTURAS, VIATURA WHERE MANUTENCOESFUTURAS.V_ID = VIATURA.V_ID AND V_MATRICULA=?");
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
		
		public function verificaManutFutura(){
			$dados = null;

			try{
				// Obter as manutenções futuras que ainda não foram efetuadas (estado = false)
				$instrucao = $LigacaoBD->prepare("SELECT * FROM MANUTENCOESFUTURAS WHERE MF_ESTADO=false");

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
		
		public function registarComoFeita($id){
		
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE MANUTENCOESFUTURAS SET MF_ESTADO=true WHERE id=?");
				$instrucao->bind_param($id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
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
		
		public function listarManutFuturas(){
			$dados = null;

			try{
				// Obter apenas os dados necessários das manutenções futuras
				
				/*********************************************************************
					Nota: falta o "tipo" e "custo" de manutenção na base de dados
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT MF_ID, V_MARCA, V_MATRICULA, MF_DATAMANUTENCAO FROM MANUTENCOESFUTURAS, VIATURA WHERE MANUTENCOESFUTURAS.V_ID = VIATURA.V_ID");

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
		
		public function verManutencaoFuturas($id){
			$dados = null;

			try{
				// Obter os dados da manutenção futura especificada
				
				/*********************************************************************
					A FAZER: obter a descrição do material utilizado
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT V_MATRICULA, MF_DESCRICAOMANUTENCAO, MF_DATAMANUTENCAO FROM MANUTENCOESFUTURAS, VIATURA WHERE MANUTENCOESFUTURAS.V_ID = VIATURA.V_ID AND I_ID=?");
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