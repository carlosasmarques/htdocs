<?php
/**Classe para objectos Utilizadores
 * Esta classe contem os atributos necess�rios para gerir os utilizadores.
 * Atributo nome:
 * -Nome do utilizador.
 * Atributo numero:
 * -N�mero de funcion�rio de utilizador.
 * Atributo username:
 * -Username do utilizador.
 * Atributo password:
 * -Password do utilizador.
 * Atributo tipoUtilizador:
 * -Indica o tipo de utilizador se � �Administrador� ou �Funcion�rio�. O tipoUtilizador vai influenciar as permiss�es que o utilizador tem sobre a aplica��o.
 * Atributo dataDeRegisto:
 * -Data em que o utilizador foi registado na aplica��o.
 * Atributo morada:
 * -Morada do utilizador.
 * Atributo telefone:
 * -Contacto telef�nico do utilizador.
 * Atributo dataNascimento:
 * -Data de nascimento do utilizador.
 * Atributo funcao:
 * -Indica a fun��o do utilizador.
 * Atributo ativo:
 * -Indica se o utilizador est� ativo ou desativo no sistema.
 * Atributo caminhoFoto:
 * -Guarda a localiza��o do ficheiro de imagem usada no perfil do utilizador.
*/
    class Utilizadores{
        private $idUtilizadores;
        private $nome;
        private $numero;
        private $username;
        private $password;
        private $tipoUtilizador;
        private $dataDeRegisto;
        private $morada;
        private $telefone;
        private $dataNascimento;
        private $funcao;
        private $ativo;
        private $caminhoFoto;
        /**
	 * Construtor da Classe Utilizadores
	 * @param idUtilizadores
	 * @param nome
         * @param numero
         * @param username
         * @param password
         * @param tipoUtilizador
         * @param dataDeRegisto
         * @param morada
         * @param telefone
         * @param dataNascimento
         * @param funcao
         * @param ativo
         * @param caminhoFoto
	 * @return 
	 */
        
        function __construct($idUtilizadores, $nome, $numero, $username, $password, $tipoUtilizador, $dataDeRegisto, $morada, $telefone, $dataNascimento, $funcao, $ativo, $caminhoFoto) {
            $this->idUtilizadores = $idUtilizadores;
            $this->nome = $nome;
            $this->numero = $numero;
            $this->username = $username;
            $this->password = $password;
            $this->tipoUtilizador = $tipoUtilizador;
            $this->dataDeRegisto = $dataDeRegisto;
            $this->morada = $morada;
            $this->telefone = $telefone;
            $this->dataNascimento = $dataNascimento;
            $this->funcao = $funcao;
            $this->ativo = $ativo;
            $this->caminhoFoto = $caminhoFoto;
        }


        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return idUtilizadores
	 */
        function getIdUtilizadores() {
            return $this->idUtilizadores;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return nome
	 */
        function getNome() {
            return $this->nome;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return numero
	 */
        function getNumero() {
            return $this->numero;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return username
	 */
        function getUsername() {
            return $this->username;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return password
	 */
        function getPassword() {
            return $this->password;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return tipoUtilizador
	 */
        function getTipoUtilizador() {
            return $this->tipoUtilizador;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return dataDeRegisto
	 */
        function getDataDeRegisto() {
            return $this->dataDeRegisto;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return morada
	 */
        function getMorada() {
            return $this->morada;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return telefone
	 */
        function getTelefone() {
            return $this->telefone;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return dataNascimento
	 */
        function getDataNascimento() {
            return $this->dataNascimento;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return funcao
	 */
        function getFuncao() {
            return $this->funcao;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return ativo
	 */
        function getAtivo() {
            return $this->ativo;
        }
        /**
	 * Getter da classe Utilizadores
	 * @param 
	 * @return caminhoFoto
	 */
        function getCaminhoFoto() {
            return $this->caminhoFoto;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param idUtilizadores
	 * @return 
	 */
        function setIdUtilizadores($idUtilizadores) {
            $this->idUtilizadores = $idUtilizadores;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param nome
	 * @return 
	 */
        function setNome($nome) {
            $this->nome = $nome;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param numero
	 * @return 
	 */
        function setNumero($numero) {
            $this->numero = $numero;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param username
	 * @return 
	 */
        function setUsername($username) {
            $this->username = $username;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param password
	 * @return 
	 */
        function setPassword($password) {
            $this->password = $password;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param tipoUtilizador
	 * @return 
	 */
        function setTipoUtilizador($tipoUtilizador) {
            $this->tipoUtilizador = $tipoUtilizador;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param dataDeRegisto
	 * @return 
	 */
        function setDataDeRegisto($dataDeRegisto) {
            $this->dataDeRegisto = $dataDeRegisto;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param morada
	 * @return 
	 */
        function setMorada($morada) {
            $this->morada = $morada;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param telefone
	 * @return 
	 */
        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param dataNascimento
	 * @return 
	 */
        function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param funcao
	 * @return 
	 */
        function setFuncao($funcao) {
            $this->funcao = $funcao;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param ativo
	 * @return 
	 */
        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }
        /**
	 * Setter da classe Utilizadores
	 * @param caminhoFoto
	 * @return 
	 */
        function setCaminhoFoto($caminhoFoto) {
            $this->caminhoFoto = $caminhoFoto;
        }


    }
?>
