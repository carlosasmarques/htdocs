<?php
	/*
		daoconsumoequip.php - Acesso o consumo de equipamentos registados na base de dados
		
		 funções
			|- adicionarConsumoEquip(dados do novo consumo)
			|- verConsumoEquip(id)
			|- editarConsumoEquip(id, dados a atualizar no consumo de equipamento)
			|- pesquisaConsumoEquip(id)
			|- pesquisaConsumoData(id)
			`- listarConsumoEquip()
	*/

	include "conf.php";
	 
	class DaoConsumoEquip{
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
		
		function adicionarConsumoEquip(ConsumoEquip $consumoequip){
		
			try{
				// Preparar a instrução sql de inserção
				$instrucao = $LigacaoBD->prepare("INSERT INTO CONSUMO_ARTIGOS (E_ID, C_QUANTIDADECONSUMIDA, C_DATA, C_DESCRICAOCONSUMO)
												VALUES (?, ?, ?, ?)");
				$instrucao->bind_param($consumoequip->getIdEquip(), $consumoequip->getQuantidade(), $consumoequip->getData(), $consumoequip->getDescricao() );
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Consumo de equipamento registado com sucesso<br />";
			}else{
				return "Erro ao registar o consumo de equipamento!<br />";
			}
		}
		
		function verConsumoEquip($id){
			$dados = null;

			try{
				// Obter os dados do consumo com o id especificado
				$instrucao = $LigacaoBD->prepare("SELECT * FROM CONSUMO_ARTIGOS WHERE id=?");
				$instrucao->bind_param($id);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Se o id foi encontrado, obter os dados
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					$registo = $instrucao->fetch();
				}
				$dados = new ConsumoEquip($registo["E_id"], $registo["C_quantidadeConsumida"], $registo["C_data"], $registo["C_descricaoConsumo"]);
				return $dados;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		public function editarConsumoEquip($id, $quantidade_consumida, $dataDeConsumo, $descricaoConsumo){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE CONSUMO_ARTIGOS SET
				C_QUANTIDADECONSUMIDA=?, C_DATA=?, C_DESCRICAOCONSUMO=? WHERE id=?");
				$instrucao->bind_param($quantidade_consumida, $dataDeConsumo, $descricaoConsumo);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Consumo de equipamento editado com sucesso<br />";
			}else{
				return "Erro ao editar os dados do consumo de equipamento!<br />";
			}
		}
		
		function pesquisaConsumoEquip($id){
			$dados = null;
			$ConsumoEquip = new ConsumoEquip("","","","");
			try{
				// Pesquisar consumo de equipamentos por artigo
				$instrucao = $LigacaoBD->prepare("SELECT E_DESCRICAO, C_QUANTIDADECONSUMIDA, C_DATA, C_DESCRICAOCONSUMO FROM CONSUMO_ARTIGOS, EQUIPAMENTOS WHERE CONSUMO_ARTIGOS.E_ID = EQUIPAMENTOS.E_ID AND E_ID=?");
				$instrucao->bind_param($id);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
					$ConsumoEquip->setDescricao($registo["E_descricao"]);
						$ConsumoEquip->setQuantidade($registo["C_quantidadeConsumida"]);
						$ConsumoEquip->setData($registo["C_data"]);
						$ConsumoEquip->setDescconsumo($registo["C_descricaoConsumo");
						$dados[] = $ConsumoEquip;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function pesquisaConsumoData($dataDeConsumo){
			$dados = null;
			$ConsumoEquip = new ConsumoEquip("","","","");
			try{
				// Pesquisar consumo de equipamentos por data
				$instrucao = $LigacaoBD->prepare("SELECT E_DESCRICAO, C_QUANTIDADECONSUMIDA, C_DATA, C_DESCRICAOCONSUMO FROM CONSUMO_ARTIGOS, EQUIPAMENTOS WHERE CONSUMO_ARTIGOS.E_ID = EQUIPAMENTOS.E_ID AND C_DATA='?'");
				$instrucao->bind_param($dataDeConsumo);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$ConsumoEquip->setDescricao($registo["E_descricao"]);
						$ConsumoEquip->setQuantidade($registo["C_quantidadeConsumida"]);
						$ConsumoEquip->setData($registo["C_data"]);
						$ConsumoEquip->setDescconsumo($registo["C_descricaoConsumo");
						$dados[] = $ConsumoEquip;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		

		
		public function listarConsumoEquip(){
			$dados = null;
			$ConsumoEquip = new ConsumoEquip("","","","");
			try{
				// Obter apenas os dados necessários dos consumos de equipamentos
				
				/**********************************************************************
					Nota: Os equipamentos não têm nome registado na base de dados!!!
				***********************************************************************/
				$instrucao = $LigacaoBD->prepare("SELECT E_DESCRICAO, C_QUANTIDADECONSUMIDA, C_DATA, C_DESCRICAOCONSUMO FROM CONSUMO_ARTIGOS, EQUIPAMENTOS WHERE CONSUMO_ARTIGOS.E_ID = EQUIPAMENTOS.E_ID");

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						$ConsumoEquip->setDescricao($registo["E_descricao"]);
						$ConsumoEquip->setQuantidade($registo["C_quantidadeConsumida"]);
						$ConsumoEquip->setData($registo["C_data"]);
						$ConsumoEquip->setDescconsumo($registo["C_descricaoConsumo");
						$dados[] = $ConsumoEquip;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
	}
?>