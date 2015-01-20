<?php
/**Classe para objectos Utentes
 * Esta classe contem os atributos necessários para gerir os utentes.
 * Atributo nome:
 * -Nome do utente.
 * Atributo numeroSNS:
 * -Número de serviço nacional de saúde.
 * Atributo morada:
 * -Morada do utente.
 * Atributo telefone:
 * -Contacto telefónico do utente.
 * Atributo dataNascimento:
 * -Data de nascimento do utente.
 * Atributo dataRegisto:
 * -Data de registo do utente no sistema.
*/
    class Utentes{
        private $idUtentes;
        private $nome;
        private $numeroSNS;
        private $morada;
        private $telefone;
        private $dataNascimento;
        private $dataRegisto;
		private $ativo;
        /**
	 * Construtor da Classe Utentes
	 * @param idUtentes
	 * @param nome
         * @param numeroSNS
         * @param morada
         * @param telefone
         * @param destino
         * @param dataNascimento
         * @param dataRegisto
	 * @return 
	 */
        function __construct($idUtentes, $nome, $numeroSNS, $morada, $telefone, $dataNascimento, $dataRegisto, $ativo) {
            $this->idUtentes = $idUtentes;
            $this->nome = $nome;
            $this->numeroSNS = $numeroSNS;
            $this->morada = $morada;
            $this->telefone = $telefone;
            $this->dataNascimento = $dataNascimento;
            $this->dataRegisto = $dataRegisto;
			$this->ativo = $ativo;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return idUtentes
	 */
        function getIdUtentes() {
            return $this->idUtentes;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return nome
	 */
        function getNome() {
            return $this->nome;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return numeroSNS
	 */
        function getNumeroSNS() {
            return $this->numeroSNS;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return morada
	 */
        function getMorada() {
            return $this->morada;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return telefone
	 */
        function getTelefone() {
            return $this->telefone;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return dataNascimento
	 */
        function getDataNascimento() {
            return $this->dataNascimento;
        }
        /**
	 * Getter da classe Utentes
	 * @param 
	 * @return dataRegisto
	 */
        function getDataRegisto() {
            return $this->dataRegisto;
        }
		function getAtivo() {
            return $this->ativo;
        }
        /**
	 * Setter da classe Utentes
	 * @param idUtentes
	 * @return 
	 */
        function setIdUtentes($idUtentes) {
            $this->idUtentes = $idUtentes;
        }
        /**
	 * Setter da classe Utentes
	 * @param nome
	 * @return 
	 */
        function setNome($nome) {
            $this->nome = $nome;
        }
        /**
	 * Setter da classe Utentes
	 * @param numeroSNS
	 * @return 
	 */
        function setNumeroSNS($numeroSNS) {
            $this->numeroSNS = $numeroSNS;
        }
        /**
	 * Setter da classe Utentes
	 * @param morada
	 * @return 
	 */
        function setMorada($morada) {
            $this->morada = $morada;
        }
        /**
	 * Setter da classe Utentes
	 * @param telefone
	 * @return 
	 */
        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        /**
	 * Setter da classe Utentes
	 * @param dataNascimento
	 * @return 
	 */
        function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }
        /**
	 * Setter da classe Utentes
	 * @param dataRegisto
	 * @return 
	 */
        function setDataRegisto($dataRegisto) {
            $this->dataRegisto = $dataRegisto;
        }
		function setAtivo($ativo) {
            $this->ativo = $ativo;
        }


    }
?>