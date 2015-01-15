<?php

	/*
		utilizador.php - Representa um objeto do tipo utilizador
		
		 funções
			|- construtor(dados do utilizador)
			|- getters()
			`- setters(atributo)
	*/

	class Utilizador{
		private $nome;
		private $numero;
		private $id;
		private $morada;
		private $telefone;
		private $activo;
		private $tipoUtilizador;
		private $username;
		private $password;
		private $dataRegisto;
		private $dataNascimento;
		private $funcao;
		private $fotografia;

		function __construct($nome, $numero, $id, $morada, $telefone, $activo, $tipoUtilizador, $username, $password, $dataRegisto, $dataNascimento, $funcao, $fotografia){
			$this->nome = $nome;
			$this->numero = $numero;
			$this->id = $id;
			$this->morada = $morada;
			$this->telefone = $telefone;
			$this->activo = $activo;
			$this->tipoUtilizador = $tipoUtilizador;
			$this->username = $username;
			$this->password = $password;
			$this->dataRegisto = $dataRegisto;
			$this->dataNascimento = $dataNascimento;
			$this->funcao = $funcao;
			$this->fotografia = $fotografia;
		}

		public function setActivo($activo){
			$this->activo = $activo;
		}

		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
		}

		public function getDataNascimento(){
			return $this->dataNascimento;
		}

		public function setDataRegisto($dataRegisto){
			$this->dataRegisto = $dataRegisto;
		}

		public function getDataRegisto(){
			return $this->dataRegisto;
		}

		public function setFuncao($funcao){
			$this->funcao = $funcao;
		}

		public function getFuncao(){
			return $this->funcao;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getId(){
			return $this->id;
		}

		public function setMorada($morada){
			$this->morada = $morada;
		}

		public function getMorada(){
			return $this->morada;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNumero($numero){
			$this->numero = $numero;
		}

		public function getNumero(){
			return $this->numero;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function setTipoUtilizador($tipoUtilizador){
			$this->tipoUtilizador = $tipoUtilizador;
		}

		public function getTipoUtilizador(){
			return $this->tipoUtilizador;
		}

		public function setUsername($username){
			$this->username = $username;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getActivo(){
			return $this->activo;
		}
		
		public function setFoto($fotografia){
			$this->fotografia = $fotografia;
		}
		
		public function getFoto(){
			$this->fotografia;
		}
	}
?>