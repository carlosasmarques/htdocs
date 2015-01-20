<?php
	/*
		daomanutencoesinternas.php - Acesso às manutenções internas registadas na base de dados
		
		 funções
			|- adicionarManutencaoInterna(dados da nova manutenção interna)
			|- editarManutencaoInter(id, dados da manutenção interna)
			|- pesquisarManutInterMarca(marca das viaturas)
			|- pesquisarManutInterMatricula(matricula da viatura)
			|- listarManutInternas()
			`- verManutInterna(id da manutenção interna)
	*/

	include "conf.php";
	 
	class DaoManutencoesInternas{
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
		public function adicionarManutencaoInterna(manutencaoInter $manutencaoInter){
		
			$sql = "INSERT INTO `fmt`.`manutencoesinternas` (`V_ID`, `MI_DATAMANUETENCAO`, `MI_DESCRICAOMANUTENCAO`, `MI_MATERIALGASTO`, `MI_QUANTIDADEMATERIALGASTO`) "
                                . "VALUES (:V_ID, :MI_DATAMANUETENCAO, :MI_DESCRICAOMANUTENCAO, :MI_MATERIALGASTO, :MI_QUANTIDADEMATERIALGASTO);";
		
                          $dados_manutencaoInter = array (
                              'V_ID'=> $manutencaoInter->get(), /*DVUIDA: NÃO EXISTE O ATRIBUTO*/
                              'MI_DATAMANUETENCAO'=> $manutencaoInter->getDataManutencao(), 
                              'MI_DESCRICAOMANUTENCAO'=> $manutencaoInter->getDescricaoAvaria(), 
                              'MI_MATERIALGASTO'=> $manutencaoInter->get(),/*DVUIDA: NÃO EXISTE O ATRIBUTO*/
                              'MI_QUANTIDADEMATERIALGASTO'=> $manutencaoInter->getQuantidadeMaterialGasto()
                              );
                        
                }
		
		public function editarManutencaoInter($id, $id_viatura, $dataManutencao, $descricaoAvaria, $quantidadeMaterialGasto){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE MANUTENCOESINTERNAS SET
				V_ID=?, MI_DATAMANUETENCAO=?, MI_DESCRICAOMANUTENCAO=?, MI_QUANTIDADEMATERIALGASTO=? WHERE id=?");
				$instrucao->bind_param($id_viatura, $dataManutencao, $descricaoAvaria, $quantidadeMaterialGasto, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Manutenção interna editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da manutenção interna!<br />";
			}
		}
		
		public function pesquisarManutInterMarca($marca){
			$dados = null;

			try{
				// Pesquisar manutenções internas de uma dada marca de viaturas
				
				$instrucao = $LigacaoBD->prepare("SELECT MI_ID, V_MARCA, V_MATRICULA, MI_DATAMANUETENCAO FROM MANUTENCOESINTERNAS, VIATURA WHERE MANUTENCOESINTERNAS.V_ID = VIATURA.V_ID AND V_MARCA=?");
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
		
		public function pesquisarManutInterMatricula($matricula){
			$dados = null;

			try{
				// Pesquisar manutenções internas de uma dada viatura por matricula
				
				$instrucao = $LigacaoBD->prepare("SELECT MI_ID, V_MARCA, V_MATRICULA, MI_DATAMANUETENCAO FROM MANUTENCOESINTERNAS, VIATURA WHERE MANUTENCOESINTERNAS.V_ID = VIATURA.V_ID AND V_MATRICULA=?");
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
		
		public function listarManutInternas(){
			$dados = null;

			try{
				// Obter apenas os dados necessários das manutenções internas
				$instrucao = $LigacaoBD->prepare("SELECT MI_ID, V_MARCA, V_MATRICULA, MI_DATAMANUETENCAO FROM MANUTENCOESINTERNAS, VIATURA WHERE MANUTENCOESINTERNAS.V_ID = VIATURA.V_ID");

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
		
		public function verManutInterna($id){
			$dados = null;

			try{
				// Obter os dados da manutenção interna especificada
				$instrucao = $LigacaoBD->prepare("SELECT V_MATRICULA, MI_DESCRICAOMANUTENCAO, MI_DATAMANUETENCAO, MI_MATERIALGASTO FROM MANUTENCOESINTERNAS, VIATURA WHERE MANUTENCOESINTERNAS.V_ID = VIATURA.V_ID AND ME_ID=?");
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
        }
?>