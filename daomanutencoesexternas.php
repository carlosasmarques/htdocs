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

	include_once "conf.php";
	 
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
		public function adicionarManutencaoExt(manutencaoExter $manutencao){
		
                    $sql = "INSERT INTO `fmt`.`manutencoesexternas` (`V_ID`,`ME_NOMEOFICINA`, `ME_DESCRICAOAVARIA`, `ME_DESCRICAOREPARACAO`, `ME_DATAAVARIA`, `ME_DATAREPARACAO`, `ME_CUSTOREPARACAO`) "
                            . "VALUES (:V_ID,:ME_NOMEOFICINA, :ME_DESCRICAOAVARIA, :ME_DESCRICAOREPARACAO, :ME_DATAAVARIA, :ME_DATAREPARACAO, :ME_CUSTOREPARACAO);"; 
                    
                  
                        
                     $dados = array (
                              'V_ID'=> $manutencao->getIdViatura(), 
                              'ME_NOMEOFICINA'=> $manutencao->getOficina(), 
                              'ME_DESCRICAOAVARIA'=> $manutencao->getDescricaoAvaria(), 
                              'ME_DESCRICAOREPARACAO'=> $manutencao->getDescReparacao(), 
                              'ME_DATAAVARIA'=> $manutencao->getDataAvaria(), 
                              'ME_DATAREPARACAO'=> $manutencao->getDataReparacao(), 
                              'ME_CUSTOREPARACAO'=> $manutencao->getCustoReparacao() 
                              );
                    $this->bd->inserir($sql, $dados);
                    
                    
                    
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
		
            /*	public function pesquisarManutExtMarca($marca){
			$dados = null;
                        $manutencaoExt = new manutencaoExter(0,"","","","","","");
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
                                            $manutencaoExt->setIdManutencaoExter($registo["me_id"]);
                                            $manutencaoExt->setOficina($registo["me_ofi"]);
                                            $manutencaoExt->setDescricaoAvaria($registo["me_desA"]);
                                            $manutencaoExt->setDescReparacao($registo["me_desR"]);
                                            $manutencaoExt->setDataAvaria($registo["me_dataA"]);
                                            $manutencaoExt->setDataReparacao($registo["me_dataR"]);
                                            $manutencaoExt->setCustoReparacao($registo["me_custo"]);
                                            $dados[] = $registo;
					}
                                }
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}*/
		
		public function pesquisarManutExtMatric($matricula){
			$dados = null;
                        $manutencaoExt = new manutencaoExter(0,"","","","","","");
			try{
				// Pesquisar manutenções externas de uma dada viatura por matricula
				
				$instrucao = $LigacaoBD->prepare("SELECT V_ID FROM VIATURA WHERE V_MATRICULA like ?");
				$instrucao->bind_param($matricula);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            $idViatura = $registo;
                                        }
                                }
                                
                                // Pesquisar manutenções externas de uma dada viatura por id
                                
                                $instrucao = $LigacaoBD->prepare("SELECT * FROM MANUTENCOESEXTERNAS WHERE V_ID like ?");
                                $instrucao->bind_param($idViatura);
                                
                                
                                // Executar
				$sucesso_funcao = $instrucao->execute();
                                
                                // Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo1 = $instrucao->fetch()){
                                            $manutencaoExt->setIdManutencaoExter($registo1["me_id"]);
                                            $manutencaoExt->setOficina($registo1["me_ofi"]);
                                            $manutencaoExt->setDescricaoAvaria($registo1["me_desA"]);
                                            $manutencaoExt->setDescReparacao($registo1["me_desR"]);
                                            $manutencaoExt->setDataAvaria($registo1["me_dataA"]);
                                            $manutencaoExt->setDataReparacao($registo1["me_dataR"]);
                                            $manutencaoExt->setCustoReparacao($registo1["me_custo"]);
                                            $dados[] = $manutencaoExt;
					}
                                }
                                
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function listarManutExternas(){
			$dados = null;
                        $manutencaoExt = new manutencaoExter(0,"","","","","","");   
			try{
				// Obter apenas os dados necessários das manutenções externas
				$instrucao = $LigacaoBD->prepare("SELECT * FROM MANUTENCOESEXTERNAS");

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            $manutencaoExt->setIdManutencaoExter($registo["me_id"]);
                                            $manutencaoExt->setOficina($registo["me_ofi"]);
                                            $manutencaoExt->setDescricaoAvaria($registo["me_desA"]);
                                            $manutencaoExt->setDescReparacao($registo["me_desR"]);
                                            $manutencaoExt->setDataAvaria($registo["me_dataA"]);
                                            $manutencaoExt->setDataReparacao($registo["me_dataR"]);
                                            $manutencaoExt->setCustoReparacao($registo["me_custo"]);
                                            $dados[] = $manutencaoExt;
					}
                                }
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function verManutExternas($id){
			$dados = null;
                        $manutencaoExt = new manutencaoExter(0,"","","","","","");
			try{
				// Obter os dados da manutenção futura especificada
				$instrucao = $LigacaoBD->prepare("SELECT * FROM MANUTENCOESEXTERNAS WHERE ME_ID like ?");
				$instrucao->bind_param($id);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Se o id foi encontrado, obter os dados
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            $manutencaoExt->setIdManutencaoExter($registo["me_id"]);
                                            $manutencaoExt->setOficina($registo["me_ofi"]);
                                            $manutencaoExt->setDescricaoAvaria($registo["me_desA"]);
                                            $manutencaoExt->setDescReparacao($registo["me_desR"]);
                                            $manutencaoExt->setDataAvaria($registo["me_dataA"]);
                                            $manutencaoExt->setDataReparacao($registo["me_dataR"]);
                                            $manutencaoExt->setCustoReparacao($registo["me_custo"]);
                                            $dados[] = $manutencaoExt;
					}
                                
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
        }
?>