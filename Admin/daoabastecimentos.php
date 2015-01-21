<?php
	/*
		daoabastecimentos.php - Acesso aos abastecimentos registados na base de dados
		
		 funções
			|- adicionarAbastecimento(dados do novo abastecimento)
			|- editarAbastecimento(id, dados a atualizar no abastecimento)
			|- pesquisarAbastecimento(id da viatura)
			|- listarAbastecimentos()
			`- verAbastecimento(id)
	*/

	include "../conf.php";
	 
	class DaoAbastecimentos {
		private $bd;
		
		// Ligar á base de dados
		function __construct(){
			try{
				$this->bd = new PDO("mysql:host=$servidor;dbname=$bd", $user, $pass);
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
			$this->bd == null;
		}
		
		/*****************************************************************************
			Nota: Não existe o atributo "matricula" na base de dados
		*****************************************************************************/
		public function adicionarAbastecimento($matricula, $quantidadeCombustivel, $dataAbastecimento, $mediaDesteAbastecimento){
		
			 $sql = "INSERT INTO `fmt`.`abastecimentos` (`V_ID`,`A_QUANTIDADECOMBUSTIVEL`, `A_QUILOMETRAGEMATUAL`, `A_DATAABASTECIMENTO`, `A_CONSUMOMEDIO`) "
                            . "VALUES (:V_ID,:A_QUANTIDADECOMBUSTIVEL, :A_QUILOMETRAGEMATUAL, :A_DATAABASTECIMENTO, :A_CONSUMOMEDIO);";
		
                          $dados = array (
                              'V_ID'=> $abastecimento->getIdViatura(),
                              'A_QUANTIDADECOMBUSTIVEL'=> $abastecimento->getQuantidadeCombustivel(),
                              'A_QUILOMETRAGEMATUAL'=> $abastecimento->getQuilometragemActual(),
                              'A_DATAABASTECIMENTO'=> $abastecimento->getDataAbastecimento(), 
                              'A_CONSUMOMEDIO'=> $abastecimento->getMediaDesteAbastecimento()
                              );
                          
                    $this->bd->inserir($sql, $dados);
                }
		public function editarAbastecimento($id, $matricula, $quantidadeCombustivel, $dataAbastecimento, $mediaDesteAbastecimento){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE ABASTECIMENTOS SET
				A_QUANTIDADECOMBUSTIVEL=?, A_DATAABASTECIMENTO=?, A_CONSUMOMEDIO=? WHERE id=?");
				$instrucao->bind_param($quantidadeCombustivel, $dataAbastecimento, $mediaDesteAbastecimento);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Abastecimento editado com sucesso<br />";
			}else{
				return "Erro ao editar os dados do abastecimento!<br />";
			}
		}
		
		public function pesquisarAbastecimento($id_viatura){
			$dados = null;
                        
                        $abastecer = new abastecer();
			try{
				// Pesquisar abastecimentos de uma dada viatura
				$instrucao = $LigacaoBD->prepare("SELECT * FROM ABASTECIMENTOS WHERE V_ID=?");
				$instrucao->bind_param($id_viatura);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            
                                            $abastecer->setIdAbastecimentos($registo["t_idabastecimentos"]);
                                            $abastecer->setQuantidadeCombustivel($registo["t_quantidadecombustivel"]);
                                            $abastecer->setQuilometragemActual($registo["t_quilometragemactual"]);
                                            $abastecer->setDataAbastecimento($registo["t_dataabastecimento"]);
                                            $abastecer->setMediaDesteAbastecimento($registo["t_mediadesteabastecimento"]);
                                            
                                            
						$dados[] = $abastecer;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function listarAbastecimentos(){
			$dados = null;
                        
                        $abastecimento = new abastecimento();
			try{
				// Obter apenas os dados necessários dos abastecimentos
				
				/**********************************************************************
					Nota: Os abastecimentos não têm matricula registada na base de dados!!!
				***********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT A_ID, A_QUANTIDADECOMBUSTIVEL, A_QUILOMETRAGEMATUAL, A_CONSUMOMEDIO FROM ABASTECIMENTOS");

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            
                                            $abastecimento->setA_ID($registo["t_A_ID"]);
                                            $abastecimento->setA_QUANTIDADECOMBUSTIVEL($registo["t_A_QUANTIDADECOMBUSTIVEL"]);
                                            $abastecimento->setA_QUILOMETRAGEMATUAL($registo["t_A_QUILOMETRAGEMATUAL"]);
                                            $abastecimento->setA_CONSUMOMEDIO($registo["t_A_CONSUMOMEDIO"]);
                                            
                                            
						 $dados[] = $abastecimento;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function verAbastecimento($id){
			$dados = null;

			try{
				// Obter os dados do abastecimento especificado   
				
				/**********************************************************************
					Nota: Os abastecimentos não têm local registado na base de dados!!!
				***********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT V_MATRICULA, A_QUANTIDADECOMBUSTIVEL, A_DATAABASTECIMENTO, A_QUILOMETRAGEMATUAL, A_CONSUMOMEDIO FROM ABASTECIMENTOS, VIATURA WHERE ABASTECIMENTOS.V_ID = VIATURA.V_ID");
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