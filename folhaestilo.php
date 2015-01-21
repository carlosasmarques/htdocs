***** Folha de estilo para código em PHP *****

<?php
	/*
		nome-do-ficheiro.php - Descrição do ficheiro
		
		 funções
			|- função1(parametro1 , parametro2, parametro3)
			|- função2(parametro1 , parametro2)
			`- função1(parametro1 , parametro2, parametro3)
	*/
	
	include_once "ficheiro1-a-incluir.php";
	include_once "ficheiro2-a-incluir.php";
	
	class NomeDaClasse{
		private $atributoDaClasse;
		
		// Construtor
		function __construct(){
			
		}
		
		// Destrutor
		function __destruct(){
			
		}
		
		public function outrosMetodosDoObjeto($parametro1, $parametro2, $parametro3){
			
			// Comentário de uma linha
			instrução-de-exemplo;
			
			/*
				Comentário
				multi-linha
			*/
			
			/****************************
				Nota: Exemplo de nota
			*****************************/
			
			/***************************************************
				A FAZER: Exemplo de alguma tarefa a realizar
			****************************************************/
			
			return $valor;
		}
	}
?>