<?php
/*
	acessobd.php - classe para manipular a base de dados
	
	funções:
		|- ligar($host, $db, $user, $pass)
		|- desligar()
		|- inserir($sql, $dados[] = null)
		|- editar($sql, $dados[] = null)
		|- apagar($sql, $id = 0)
		|- query($sql, $param[] = null)
		`- contar($tabela)

*/

class BaseDados{
	private $DBH;
	
	function __construct(){}

	// Ligação á base de dados
	public function ligar($host, $db, $user, $pass){
		try{
			$this->DBH = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		}catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
		return true;
	}
	
	// terminar a ligação
	public function desligar(){
		$this->DBH == null;
	}
	
	// inserir dados numa tabela
	public function inserir($sql, $dados = null){
		try{
			$STH = $this->DBH->prepare($sql);
			
			if(!$STH->execute($dados)){
				echo "Ocorreu um erro ao inserir os dados!<br>";
			}
		
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	// acutalizar dados de uma tabela
	public function editar($sql, $dados = null){
		try{
			$STH = $this->DBH->prepare($sql);
			
			if(!$STH->execute($dados)){
				echo "Ocorreu um erro ao actualizar os dados!<br>";
			}
		
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	// apagar dados de uma tabela
	public function apagar($sql, $id = 0){
		try{
			$STH = $this->DBH->prepare($sql);
			$STH->bindParam(1, $id);

			if(!$STH->execute()){
				echo "Ocorreu um erro ao apagar os dados!<br>";
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	// obter registos de uma tabela
	public function query($sql, $param = null){
		$dados =null;
	
		try{
			$STH = $this->DBH->prepare($sql);

			if(!$STH->execute($param)){
				echo "Ocorreu um erro ao processar a query! ";
			}else{
				$STH->setFetchMode(PDO::FETCH_ASSOC);
				while($row = $STH->fetch()){
					$dados[] = $row;
				}
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return $dados;
	}
	
	// contar registos de uma tabela
	public function contar($tabela){
		try{
			$STH = $this->DBH->prepare("SELECT count(*) FROM " . $tabela);
			if($STH->execute()){
				return $STH->fetchColumn();
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return 0;
	}
	
	// debug
	public function contar_query($sql, $param = null){
		$dados = 0;
	
		try{
			$STH = $this->DBH->prepare($sql);

			if(!$STH->execute($param)){
				echo "Ocorreu um erro ao processar a query! ";
			}else{
				$STH->setFetchMode(PDO::FETCH_ASSOC);
				while($row = $STH->fetch()){
					$dados++;
				}
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return $dados;
	}
}