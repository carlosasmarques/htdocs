<?php
	/*
		daoinspecoes.php - Acesso às inspeções registadas na base de dados
		
		 funções
			|- adicionarInspecaoPer(dados da nova inspeção)
			|- editarInspecao(id, dados a atualizar na inspeção)
			|- registarComoFeita(id da inspeção)
			|- pesquisarInspecaoMatric(matricula da viatura)
			|- pesquisarInspecaoMarca(marca das viaturas)
			|- verificarInspecaoPer()
			|- listarInspecoesPer()
			`- verInspecaoPer(id da inspeção)
	*/

	include "../conf.php";
        include "Inspecoes.php";
	 
	class DaoInspecoes{
                private $bd;

            public function __construct() {
                $this->bd = new BaseDados();
            }
		
		/*
		Desligar da base de dados
		(assim que seja apagada a ultima referencia ao objeto)
		*/

		
		/*****************************************************************************
			Nota: Não faz sentido passar a matricula da viatura a inspecionar
			      até porque a base de dados utiliza o id da viatura
		*****************************************************************************/
		public function adicionarInspecaoPer($id_viatura, $datalimite, $estado){
		
			try{
				// Preparar a instrução sql de inserção
				/*********************************************************************
					Nota: falta o parametro "quilometragem atual"
				*********************************************************************/
				$instrucao = $LigacaoBD->prepare("INSERT INTO INSPECOES (V_ID, I_DATAINSPECAO, I_ESTADO) VALUES (?, ?, ?)");
				$instrucao->bind_param($id_viatura, $datalimite, $estado);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Inspeção registada com sucesso<br />";
			}else{
				return "Erro ao registar a inspeção!<br />";
			}
		}
		
		/*****************************************************************************
			Nota: Não faz sentido passar a matricula da viatura a inspecionar
			      até porque a base de dados utiliza o id da viatura
		*****************************************************************************/
		public function editarInspecao($id, $id_viatura, $datalimite, $estado){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE INSPECOES SET
				V_ID=?, I_DATAINSPECAO=?, I_ESTADO=? WHERE id=?");
				$instrucao->bind_param($id_viatura, $datalimite, $estado);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Inspeção editada com sucesso<br />";
			}else{
				return "Erro ao editar os dados da inspeção!<br />";
			}
		}
		
		public function registarComoFeita($id){
		
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE INSPECOES SET I_ESTADO=true WHERE id=?");
				$instrucao->bind_param($id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
			
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return 1;
			}else{
				return 2;
			}
			
		}
		
		public function pesquisarInspecaoMatric($matricula){
			$dados = null;
                        
                        $inspecoes = new inspecoes();
			try{
				// Pesquisar inspeções de uma dada viatura por matricula
				$instrucao = $LigacaoBD->prepare("SELECT I_ID, V_ID, I_DATAINSPECAO, I_ESTADO FROM INSPECOES, VIATURA WHERE INSPECOES.V_ID = VIATURA.V_ID AND V_MATRICULA=?");
				$instrucao->bind_param($matricula);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            
                                            $inspecoes->setI_ID($registo["t_I_ID"]);
                                            $inspecoes->setV_ID($registo["t_V_ID"]);
                                            $inspecoes->setI_DATAINSPECAO($registo["t_I_DATAINSPECAO"]);
                                            $inspecoes->setI_ESTADO($registo["t_I_ESTADO"]);
                                            
						$dados[] = $inspecoes;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function pesquisarInspecaoMarca($marca){
			$dados = null;
                        
                        $pesquisar = new pesquisar();
			try{
				// Pesquisar inspeções de uma dada viatura por marca
				$instrucao = $LigacaoBD->prepare("SELECT I_ID, V_ID, I_DATAINSPECAO, I_ESTADO FROM INSPECOES, VIATURA WHERE INSPECOES.V_ID = VIATURA.V_ID AND V_MARCA=?");
				$instrucao->bind_param($marca);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            
                                            $pesquisar->setI_ID($registo["t_I_ID"]);
                                            $pesquisar->setV_ID($registo["t_V_ID"]);
                                            $pesquisar->setI_DATAINSPECAO($registo["t_I_DATAINSPECAO"]);
                                            $pesquisar->setI_ESTADO($registo["t_I_ESTADO"]);
                                            
                                            
						$dados[] = $pesquisar;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function verificarInspecaoPer(){
			$dados = null;
                        
                        $verificar = new verificar();
			try{
				// Obter as inspeções que ainda não foram efetuadas (estado = false)
				$instrucao = $LigacaoBD->prepare("SELECT * FROM INSPECOES WHERE I_ESTADO=false");

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
                                            
                                            $verificar->setidInspecoes($registo["t_idInspecoes"]);
                                            $verificar->setidViatura($registo["t_idViatura"]);
                                            $verificar->setdataLimite($registo["t_dataLimite"]);
                                            $verificar->setestado($registo["t_estado"]);
                                           
                                            
						$dados[] = $verificar;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function listarInspecoesPer(){
			$dados = array();
		
				// Obter apenas os dados necessários das inspeções
				$instrucao = $this->bd->query("SELECT * FROM INSPECOES");
                                
                                for($i=0; $i<count($instrucao); $i++){
                                        $dados[] = new Inspecoes($instrucao[$i]["I_ID"], $instrucao[$i]["V_ID"], $instrucao[$i]["I_DATAINSPECAO"], $instrucao[$i]["I_ESTADO"]);


                                }



			return $dados;
		}
		
		public function verInspecaoPer($id){
			$dados = null;

			try{
				// Obter os dados da inspeção especificada
				$instrucao = $LigacaoBD->prepare("SELECT V_MATRICULA, I_DATAINSPECAO, I_ESTADO FROM INSPECOES, VIATURA WHERE INSPECOES.V_ID = VIATURA.V_ID AND I_ID=?");
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