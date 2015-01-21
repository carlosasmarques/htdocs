<?php
	/*
		daoviaturas.php - Acesso às viaturas registadas na base de dados
		
		 funções
			|- adicionarViatura(dados da nova viatura)
			|- ativarDesativarViatura(estado, id)
			|- editarViatura(id, dados a atualizar na viatura)
			|- pesquisarPorMarca(marca)
			|- pesquisarPorMatricula(matricula)
			|- verViatura(id)
			`- listarViaturas()
	*/

        include_once "acessobd.php";
        include_once "Viaturas.php";
	 
	class DaoViaturas{
            private $bd;

            public function __construct() {
                $this->bd = new BaseDados();
            }
		
		public function adicionarViatura(Viaturas $viatura){
                    $sql = "INSERT INTO `fmt`.`viatura` (`V_MARCA`, `V_MODELO`, `V_MATRICULA`, `V_DATAMATRICULA`, `V_TIPOVIATURA`, `V_COMBUSTIVEL`, `V_CAPACIDADEDEPOSITO`, `V_QUILOMETRAGEM`, `V_CONSUMOMEDIO`, `V_NUMEROLUGARESSENTADOS`, `V_NUMEROLUGARESDEITADOS`, `V_FOTOGRAFIA`, `V_ACTIVO`) "
                            . "VALUES (:V_MARCA, :V_MODELO, :V_MATRICULA, :V_DATAMATRICULA, :V_TIPOVIATURA, :V_COMBUSTIVEL, :V_CAPACIDADEDEPOSITO, :V_QUILOMETRAGEM, :V_CONSUMOMEDIO, :V_NUMEROLUGARESSENTADOS, :V_NUMEROLUGARESDEITADOS, :V_FOTOGRAFIA, :V_ACTIVO);";
		
                    
                    
                    
                          $dados = array (
                              'V_MARCA'=> $viatura->getMarca(),
                              'V_MODELO'=> $viatura->getModelo(),
                              'V_MATRICULA'=> $viatura->getMatricula(),
                              'V_DATAMATRICULA'=> $viatura->getDataMatricula(),
                              'V_TIPOVIATURA'=> $viatura->getTipo(),
                              'V_COMBUSTIVEL'=> $viatura->getCombustivel(),
                              'V_CAPACIDADEDEPOSITO'=> $viatura->getCapacidadeDeposito(),
                              'V_QUILOMETRAGEM'=> $viatura->getQuilometragem(),
                              'V_CONSUMOMEDIO'=> $viatura->getConsumoMedio(),
                              'V_NUMEROLUGARESSENTADOS'=> $viatura->getLugaresSentados(),                           
                              'V_NUMEROLUGARESDEITADOS'=> $viatura->getLugaresDeitados(),
                              'V_FOTOGRAFIA'=> $viatura->getEnderecoFoto(),    
                              'V_ACTIVO'=> $viatura->getActiva(),    
                              );
                    
                    
                    
                    
                    $this->bd->inserir($sql, $dados);

		}
		
		public function ativarDesativarViatura($estado, $id){
		
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE viatura SET V_activo=? WHERE id=?");
				$instrucao->bind_param($estado, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
			
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "O estado da viatura foi alterado para " . ($estado == true ? "ATIVA" : "DESATIVA") . "<br />";
			}else{
				return "Erro ao alterar o estado da viatura!<br />";
			}
			
		}
		
		public function editarViatura(
		$id, $matricula, $marca, $modelo, $tipo, $dataMatricula, $combustivel, $quilometragem,
		$consumoMedio, $lugaresSentados, $lugaresDeitados, $enderecoFoto, $ativa){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE viatura SET
				V_marca=?, V_modelo=?, V_matricula=?, V_dataMatricula=?, V_tipoViatura=?, V_combustivel=?,
				V_capacidadeDeposito=?, V_quilometragem=?, V_consumoMedio=?, V_numeroLugaresSentados=?,
				V_numeroLugaresDeitados=?, V_fotografia=?, V_activo=? WHERE id=?");
				$instrucao->bind_param($marca, $modelo, $matricula, $dataMatricula, $tipo, $combustivel,
				$capacidadeDeposito, $quilometragem, $consumoMedio, $lugaresSentados, $lugaresDeitados,
				$enderecoFoto, $ativa, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Viatura editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da viatura!<br />";
			}
		}
		
		public function pesquisarPorMarca($marca){
			$dados = null;
                        $viatura = new Viaturas();
			try{
				// Pesquisar por marca
				$instrucao = $LigacaoBD->prepare("SELECT * FROM viaturas WHERE V_marca=?");
				$instrucao->bind_param($marca);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$viatura->setActiva($registo["V_Ati"]);
                                                $viatura->setCapacidadeDeposito($registo["V_CDe"]);
                                                $viatura->setCombustivel($registo["V_Cum"]);
                                                $viatura->setConsumoMedio($registo["V_ConM"]);
                                                $viatura->setDataMatricula($registo["V_DataM"]);
                                                $viatura->setEnderecoFoto($registo["V_EndFo"]);
                                                $viatura->setIdViaturas($registo["V_IdV"]);
                                                $viatura->setLugaresDeitados($registo["V_LDe"]);
                                                $viatura->setLugaresSentados($registo["V_LSe"]);
                                                $viatura->setMarca($registo["V_Marca"]);
                                                $viatura->setMatricula($registo["V_Matri"]);
                                                $viatura->setModelo($registo["V_Mod"]);
                                                $viatura->setQuilometragem($registo["V_Quil"]);
                                                $viatura->setTipo($registo["V_Tipo"]);
                                                $dados[] = $viatura;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function pesquisarPorMatricula($matricula){
			$dados = null;
                        $viatura = new Viaturas();
			try{
				// Pesquisar por matricula
				$instrucao = $LigacaoBD->prepare("SELECT * FROM viaturas WHERE V_matricula=?");
				$instrucao->bind_param($matricula);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$viatura->setActiva($registo["V_Ati"]);
                                                $viatura->setCapacidadeDeposito($registo["V_CDe"]);
                                                $viatura->setCombustivel($registo["V_Cum"]);
                                                $viatura->setConsumoMedio($registo["V_ConM"]);
                                                $viatura->setDataMatricula($registo["V_DataM"]);
                                                $viatura->setEnderecoFoto($registo["V_EndFo"]);
                                                $viatura->setIdViaturas($registo["V_IdV"]);
                                                $viatura->setLugaresDeitados($registo["V_LDe"]);
                                                $viatura->setLugaresSentados($registo["V_LSe"]);
                                                $viatura->setMarca($registo["V_Marca"]);
                                                $viatura->setMatricula($registo["V_Matri"]);
                                                $viatura->setModelo($registo["V_Mod"]);
                                                $viatura->setQuilometragem($registo["V_Quil"]);
                                                $viatura->setTipo($registo["V_Tipo"]);
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $viatura;
		}
		
		public function verViatura($id){
			$dados = null;
                        $viatura = new Viaturas();
			try{
				// Obter os dados da viatura com o id especificado
				$instrucao = $LigacaoBD->prepare("SELECT * FROM viaturas WHERE id=?");
				$instrucao->bind_param($id);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Se o id foi encontrado, obter os dados
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
                                            while($registo = $instrucao->fetch()){
						$viatura->setActiva($registo["V_Ati"]);
                                                $viatura->setCapacidadeDeposito($registo["V_CDe"]);
                                                $viatura->setCombustivel($registo["V_Cum"]);
                                                $viatura->setConsumoMedio($registo["V_ConM"]);
                                                $viatura->setDataMatricula($registo["V_DataM"]);
                                                $viatura->setEnderecoFoto($registo["V_EndFo"]);
                                                $viatura->setIdViaturas($registo["V_IdV"]);
                                                $viatura->setLugaresDeitados($registo["V_LDe"]);
                                                $viatura->setLugaresSentados($registo["V_LSe"]);
                                                $viatura->setMarca($registo["V_Marca"]);
                                                $viatura->setMatricula($registo["V_Matri"]);
                                                $viatura->setModelo($registo["V_Mod"]);
                                                $viatura->setQuilometragem($registo["V_Quil"]);
                                                $viatura->setTipo($registo["V_Tipo"]);
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $viatura;
		}
		
		public function listarViaturas(){
			$dados = array();

				$instrucao = $this->bd->query("SELECT * FROM viatura");

					for($i=0; $i<count($instrucao); $i++){
                                                $dados[] = new Viaturas($instrucao[$i]["V_ID"],$instrucao[$i]["V_MATRICULA"],$instrucao[$i]["V_MARCA"],$instrucao[$i]["V_MODELO"],$instrucao[$i]["V_TIPOVIATURA"],$instrucao[$i]["V_DATAMATRICULA"],$instrucao[$i]["V_COMBUSTIVEL"],$instrucao[$i]["V_CAPACIDADEDEPOSITO"],$instrucao[$i]["V_QUILOMETRAGEM"],$instrucao[$i]["V_CONSUMOMEDIO"],$instrucao[$i]["V_NUMEROLUGARESSENTADOS"],$instrucao[$i]["V_NUMEROLUGARESDEITADOS"],$instrucao[$i]["V_FOTOGRAFIA"],$instrucao[$i]["V_ACTIVO"]);

                                            
                                        }

			return $dados;
		}
	}
?>