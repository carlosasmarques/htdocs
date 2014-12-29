<?php
	// daoviaturas.php - Acesso às viaturas registadas na base de dados

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
		
			if($sucesso_funcao){
				return "O estado da viatura foi alterado para " . ($estado == true ? "ATIVA" : "DESATIVA") . "<br />";
			}else{
				return "Erro ao alterar o estado da viatura!<br />";
			}
		}
		
		public function editarViatura(
		$id, $matricula, $marca, $modelo, $tipo, $dataMatricula, $combustivel, $quilometragem,
		$consumoMedio, $lugaresSentados, $lugaresDeitados, $enderecoFoto){
			
			if($sucesso_funcao){
				return "Viatura editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da viatura!<br />";
			}
			
		}
		
		public function pesquisarPorMarca($marca){
			
		}
		
		public function pesquisarPorMatricula($matricula){
			
		}
		
		public function verViatura($id){
			
		}
		
		public function listarViaturas(){
			
		}
	}
?>