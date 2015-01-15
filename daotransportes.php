<?php
	/*
		daotransportes.php - Acesso aos transportes registados na base de dados
		
		 funções
			|- adicionarManutencaoInterna(dados da nova manutenção interna)
			|- editarManutencaoInter(id, dados da manutenção interna)
			|- pesquisarManutInterMarca(marca das viaturas)
			|- pesquisarManutInterMatricula(matricula da viatura)
			|- listarManutInternas()
			`- verManutInterna(id da manutenção interna)
	*/

	include "conf.php";
	 
	class DaoTransportes{
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
			Nota: Não faz sentido usar o numero de SNS porque é um dado a guardar
			      na tabela de utentes
		*****************************************************************************/
		public function adicionarTransporte($id_viatura, $numero, $dataTransporte, $horaDePartida, $horaDeChegada, $origem, $destino, $observacoes, $condicaoUtente, $quilometros){
		
			try{
				// Preparar a instrução sql de inserção
				$instrucao = $LigacaoBD->prepare("INSERT INTO TRANSPORTES (V_ID, U_ID, T_DATATRANSPORTE, T_HORAPARTIDA, T_HORACHEGADA, T_ORIGEM, T_DESTINO, T_OBSERVACOES, T_CONDICAO, T_TOTALQUILOMETROS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$instrucao->bind_param($id_viatura, $numero, $dataTransporte, $horaDePartida, $horaDeChegada, $origem, $destino, $observacoes, $condicaoUtente, $quilometros);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Transporte registado com sucesso<br />";
			}else{
				return "Erro ao registar o transporte!<br />";
			}
		}
		
		/*****************************************************************************
			Nota: Não faz sentido passar objetos porque nos outros métodos de
			      edição são passados os dados por parâmetros individuais
			Nota: Não faz sentido usar o numero de SNS porque é um dado a guardar
			      na tabela de utentes
		*****************************************************************************/
		public function editarManutencaoInter($id, $id_viatura, $numero, $dataTransporte, $horaDePartida, $horaDeChegada, $origem, $destino, $observacoes, $condicaoUtente, $quilometros){
			
			try{
				// Preparar a instrução sql de atualização
				$instrucao = $LigacaoBD->prepare("UPDATE TRANSPORTES SET
				V_ID=?, U_ID=?, T_DATATRANSPORTE=?, T_HORAPARTIDA=?, T_HORACHEGADA=?, T_ORIGEM=?, T_DESTINO=?, T_OBSERVACOES=?, T_CONDICAO=?, T_TOTALQUILOMETROS=? WHERE id=?");
				$instrucao->bind_param($id_viatura, $numero, $dataTransporte, $horaDePartida, $horaDeChegada, $origem, $destino, $observacoes, $condicaoUtente, $quilometros, $id);
				
				// Executar
				$sucesso_funcao = $instrucao->execute();
				$instrucao->close();
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			if($sucesso_funcao){
				return "Transporte editado com sucesso<br />";
			}else{
				return "Erro ao editar os dados do transporte!<br />";
			}
		}
		
		public function pesquisarTransUtente($nome){
			$dados = null;
                        
                        $pesquisar = new pesquisar();
			try{
				// Pesquisar transportes de uma dado utente pesquisando por nome
				
				$instrucao = $LigacaoBD->prepare("SELECT T_ID, UT_NOME, T_DATATRANSPORTE, T_ORIGEM, T_DESTINO, V_MARCA, V_MODELO FROM TRANSPORTES, UTENTES, VIATURA WHERE TRANSPORTES.V_ID = VIATURA.V_ID AND TRANSPORTES.U_ID = UTENTES.UT_ID AND UT_NOME like ?");
				$instrucao->bind_param($nome);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
						
                                            $pesquisar->setT_ID($registo["t_T_ID"]);
                                            $pesquisar->setUT_NOME($registo["t_UT_NOME"]);
                                            $pesquisar->setT_DATATRANSPORTE($registo["t_T_DATATRANSPORTE"]);
                                            $pesquisar->setT_ORIGEM($registo["t_T_ORIGEM"]);
                                            $pesquisar->setT_DESTINO($registo["t_T_DESTINO"]);
                                            $pesquisar->setV_MARCA($registo["t_V_MARCA"]);
                                            $pesquisar->setV_MODELO($registo["t_V_MODELO"]);
                                            
                                            
                                            $dados[] = $registo;
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $dados;
		}
		
		public function pesquisarTransViatura($matricula){
			$dados = null;
                        
                        $transporte = new transporte();

			try{
				// Pesquisar transportes de uma dada viatura por nome de utente
				
				/*
					A FAZER: verificar a relacão da tabela TRANSPORTE_UTENTES na query
				*/
				$instrucao = $LigacaoBD->prepare("SELECT T_ID, UT_NOME, T_DATATRANSPORTE, T_ORIGEM, T_DESTINO, V_MARCA, V_MODELO FROM MANUTENCOESINTERNAS, VIATURA WHERE TRANSPORTES.V_ID = VIATURA.V_ID AND TRANSPORTES.U_ID = UTENTES.UT_ID AND V_MATRICULA=?");
				$instrucao->bind_param($matricula);

				// Executar
				$sucesso_funcao = $instrucao->execute();
				
				// Percorrer os dados da query e guardar num array
				if($sucesso_funcao){
					$instrucao->setFetchMode(PDO::FETCH_ASSOC);
					while($registo = $instrucao->fetch()){
					
                                        $transporte->setT_ID($registo["t_T_ID"]);
                                        $transporte->setUT_NOME($registo["t_UT_NOME"]);
                                        $transporte->setT_DATATRANSPORTE($registo["t_T_DATATRANSPORTE"]);
                                        $transporte->setT_ORIGEM($registo["t_T_ORIGEM"]);
                                        $transporte->setT_DESTINO($registo["t_T_DESTINO"]);
                                        $transporte->setV_MARCA($registo["t_V_MARCA"]);
                                        $transporte->setV_MODELO($registo["t_V_MODELO"]);
                                        
                                        $dados[] = $transporte;
                                        }
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			/************************************************************************
			Nota: Os dados a retornar devem estar num array e não num objeto
			      pois a maioria dos métodos devolvem arrays
			*************************************************************************/
			return $dados;
		}
		
		public function pesquisarTransFunc($nome){
			$dados = null;

			try{
				// Pesquisar transportes de uma dada viatura por nome de utente
				$instrucao = $LigacaoBD->prepare("SELECT T_ID, UT_NOME, T_DATATRANSPORTE, T_ORIGEM, T_DESTINO, V_MARCA, V_MODELO FROM UTILIZADORES, VIATURA, TRANSPORTES WHERE TRANSPORTES.V_ID = VIATURA.V_ID AND TRANSPORTES.U_ID = UTENTES.UT_ID AND U_NOME=?");
				$instrucao->bind_param($nome);

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
			
			/************************************************************************
			Nota: Os dados a retornar devem estar num array e não num objeto
			      pois a maioria dos métodos devolvem arrays
			*************************************************************************/
			return $dados;
		}
		
		/*
			A FAZER: listarTransportes()
			         pesquisarTransData()
					 verTransporte()
					 listarTransportes()
		*/
        }
?>