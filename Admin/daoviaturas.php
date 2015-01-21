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

        include_once "../acessobd.php";
        include_once "Viaturas.php";
	 
	class DaoViaturas{
            private $bd;

            public function __construct() {
                $this->bd = new BaseDados();
            }
		
		public function adicionarViatura(
		$matricula, $marca, $modelo, $tipo, $dataMatricula, $combustivel, $capacidadeDeposito, $quilometragem,
		$consumoMedio, $lugaresSentados, $lugaresDeitados, $enderecoFoto){
		
			try{
				// Preparar a instrução sql de inserção
				$instrucao = $LigacaoBD->prepare("INSERT INTO viatura (
				V_marca, V_modelo, V_matricula, V_dataMatricula, V_tipoViatura, V_combustivel, V_capacidadeDeposito,
				V_quilometragem, V_consumoMedio, V_numeroLugaresSentados, V_numeroLugaresDeitados, V_fotografia,
				V_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$instrucao->bind_param($marca, $modelo, $matricula, $dataMatricula, $tipo, $combustivel,
				$capacidadeDeposito, $quilometragem, $consumoMedio, $lugaresSentados, $lugaresDeitados,
				$enderecoFoto, true);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Viatura registada com sucesso:<br />" .
				$tipo . "<br />"  .
				$marca . " " . $modelo . "<br />" .
				$matricula . "<br />";
			}else{
				return "Erro ao registar a viatura!<br />";
			}
		}
		
		public function ativarDesativarViatura($estado, $id){
			$dados = array(
				'V_ACTIVO' => $estado,
				'V_ID' => $id
			);
			$this->bd->editar("UPDATE `fmt`.`viatura` SET `V_ACTIVO`=:V_ACTIVO WHERE  `V_ID`=:V_ID;", $dados);
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
		
		public function pesquisarPorMatricula($id){
			$dados = null;
                        $dados = array('V_ID' => $id);
				// Pesquisar por matricula
				$instrucao = $this->bd->query("SELECT * FROM viaturas WHERE V_ID=",$dados);
				
                                for($i=0; $i<count($instrucao); $i++){
                                        $dados[] = new Viaturas($instrucao[$i]["V_ID"],$instrucao[$i]["V_MATRICULA"],$instrucao[$i]["V_MARCA"],$instrucao[$i]["V_MODELO"],$instrucao[$i]["V_TIPOVIATURA"],$instrucao[$i]["V_DATAMATRICULA"],$instrucao[$i]["V_COMBUSTIVEL"],$instrucao[$i]["V_CAPACIDADEDEPOSITO"],$instrucao[$i]["V_QUILOMETRAGEM"],$instrucao[$i]["V_CONSUMOMEDIO"],$instrucao[$i]["V_NUMEROLUGARESSENTADOS"],$instrucao[$i]["V_NUMEROLUGARESDEITADOS"],$instrucao[$i]["V_FOTOGRAFIA"],$instrucao[$i]["V_ACTIVO"]);


                                }

			return $dados;


		}
		
		public function verViatura($id){
			$dados = null;
            $viatura = new Viaturas(0, "", "", "", "", 0, 0, 0, 0, 0, 0, 0, "", 0);
		
			// Obter os dados da viatura com o id especificado
			$dados = array(
				"V_ID" => $id
			);
			$viatura_array = $this->bd->query("SELECT * FROM `fmt`.`viatura` WHERE `V_ID`=:V_ID", $dados);
			
			$viatura->setActiva($viatura_array[0]["V_ACTIVO"]);
			$viatura->setCapacidadeDeposito($viatura_array[0]["V_CAPACIDADEDEPOSITO"]);
			$viatura->setCombustivel($viatura_array[0]["V_COMBUSTIVEL"]);
			$viatura->setConsumoMedio($viatura_array[0]["V_CONSUMOMEDIO"]);
			$viatura->setDataMatricula($viatura_array[0]["V_DATAMATRICULA"]);
			$viatura->setEnderecoFoto($viatura_array[0]["V_FOTOGRAFIA"]);
			$viatura->setIdViaturas($viatura_array[0]["V_ID"]);
			$viatura->setLugaresDeitados($viatura_array[0]["V_NUMEROLUGARESDEITADOS"]);
			$viatura->setLugaresSentados($viatura_array[0]["V_NUMEROLUGARESSENTADOS"]);
			$viatura->setMarca($viatura_array[0]["V_MARCA"]);
			$viatura->setMatricula($viatura_array[0]["V_MATRICULA"]);
			$viatura->setModelo($viatura_array[0]["V_MODELO"]);
			$viatura->setQuilometragem($viatura_array[0]["V_QUILOMETRAGEM"]);
			$viatura->setTipo($viatura_array[0]["V_TIPOVIATURA"]);

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