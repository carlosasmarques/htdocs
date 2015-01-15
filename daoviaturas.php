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

	include "conf.php";
	 
	class DaoViaturas{
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
			$dados = null;
                        $viatura = new Viaturas();
			try{
				// Obter apenas os dados necessários das viaturas
				$instrucao = $LigacaoBD->prepare("SELECT id, V_tipoViatura, V_marca, V_matricula,
				V_combustivel, V_consumoMedio FROM viaturas");

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
                                                $dados = $viatura;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
	}
?>