<?php
    /* Classe para objectos do tipo Viaturas
     * Esta classe contem os atributos necessários para gerir os veículos.  
     * 
     * Atributo matricula:
     * - Matricula do veículo.
     * Atributo marca:
     * - Marca do veículo.
     * Atributo modelo:
     * - Modelo do veículo.
     * Atributo tipo:
     * - Tipo de veículo que pode ser pesado(1) ou ligeiro (2).
     * Atributo dataMatricula:
     * -Data de matricula do veículo.
     * Atributo combustivel:
     * - Tipo de combustível do veículo que pode ser a gasóleo(1) ou a gasolina (2).
     * Atributo capacidadeDeposito:
     * - Valor da capacidade de deposito de combustível do veículo.
     * Atributo quilometragem:
     * - Valor dos quilómetros do veículo.
     * Atributo consumoMedio:
     * - Valor do consumo médio do veículo.
     * Atributo lugaresSentados:
     * - Números de lugares sentados que o veículo têm disponível para transportar doentes.
     * Atributo lugaresDeitados:
     * - Números de lugares deitados que o veículo têm disponível para transportar doentes.
     * Atributo enderecoFoto:
     * - Indica o endereço de foto do veículo.
     * Atributo activa:
     * - Indica se a viatura esta ativa ou desativa no sistema. 
     */

    class Viaturas{
        private $idViaturas; 
        private $matricula;
        private $marca;
        private $modelo;
        private $tipo;
        private $dataMatricula;
        private $combustivel;
        private $capacidadeDeposito;
        private $quilometragem;
        private $consumoMedio;
        private $lugaresSentados;
        private $lugaresDeitados;
        private $enderecoFoto;
        private $activa;
        
        /*
         * Construtor da classe Viaturas
         * 
         * @param idViaturas
         * @param matricula
         * @param marca
         * @param modelo
         * @param tipo
         * @param dataMatricula
         * @param combustivel
         * @param capacidadeDeposito
         * @param quilometragem
         * @param consumoMedio
         * @param lugaresSentados
         * @param lugaresDeitados
         * @param enderecoFoto
         * @param activa
         * @return 
         *          */
        function __construct($idViaturas, $matricula, $marca, $modelo, $tipo, $dataMatricula, $combustivel, $capacidadeDeposito, $quilometragem, $consumoMedio, $lugaresSentados, $lugaresDeitados, $enderecoFoto, $activa) {
            $this->idViaturas = $idViaturas;
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->tipo = $tipo;
            $this->dataMatricula = $dataMatricula;
            $this->combustivel = $combustivel;
            $this->capacidadeDeposito = $capacidadeDeposito;
            $this->quilometragem = $quilometragem;
            $this->consumoMedio = $consumoMedio;
            $this->lugaresSentados = $lugaresSentados;
            $this->lugaresDeitados = $lugaresDeitados;
            $this->enderecoFoto = $enderecoFoto;
            $this->activa = $activa;
        }
        /*
         * Getter da classe Viaturas
         * @param
         * @return idViaturas
         */
        function getIdViaturas() {
            return $this->idViaturas;
        }
         /*
         * Setter da classe Viaturas
         * @param idViaturas
         * @return 
         */
        function setIdViaturas($idViaturas) {
            $this->idViaturas = $idViaturas;
        }

         /*
         * Getter da classe Viaturas
         * @param
         * @return matricula
         */
        function getMatricula() {
            return $this->matricula;
        }
        /*
         * Getter da classe Viaturas
         * @param
         * @return marca
         */
        function getMarca() {
            return $this->marca;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return modelo
         */
        function getModelo() {
            return $this->modelo;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return tipo
         */
        function getTipo() {
            return $this->tipo;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return dataMtricula
         */
        function getDataMatricula() {
            return $this->dataMatricula;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return combustivel
         */
        function getCombustivel() {
            return $this->combustivel;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return capacidadeDeposito
         */
        function getCapacidadeDeposito() {
            return $this->capacidadeDeposito;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return quilometragem
         */
        function getQuilometragem() {
            return $this->quilometragem;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return consumoMedio
         */
        function getConsumoMedio() {
            return $this->consumoMedio;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return LugaresSentados
         */
        function getLugaresSentados() {
            return $this->lugaresSentados;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return lugaresDeitados
         */
        function getLugaresDeitados() {
            return $this->lugaresDeitados;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return enderecoFoto
         */
        function getEnderecoFoto() {
            return $this->enderecoFoto;
        }
         /*
         * Getter da classe Viaturas
         * @param
         * @return activa
         */
        function getActiva() {
            return $this->activa;
        }
         /*
         * Setter da classe Viaturas
         * @param matricula
         * @return 
         */
        function setMatricula($matricula) {
            $this->matricula = $matricula;
        }
         /*
         * Setter da classe Viaturas
         * @param marca
         * @return 
         */
        function setMarca($marca) {
            $this->marca = $marca;
        }
         /*
         * Setter da classe Viaturas
         * @param modelo
         * @return 
         */
        function setModelo($modelo) {
            $this->modelo = $modelo;
        }
        /*
         * Setter da classe Viaturas
         * @param tipo
         * @return 
         */
        function setTipo($tipo) {
            $this->tipo = $tipo;
        }
         /*
         * Setter da classe Viaturas
         * @param dataMatricula
         * @return 
         */
        function setDataMatricula($dataMatricula) {
            $this->dataMatricula = $dataMatricula;
        }
         /*
         * Setter da classe Viaturas
         * @param combustivel
         * @return 
         */
        function setCombustivel($combustivel) {
            $this->combustivel = $combustivel;
        }
         /*
         * Setter da classe Viaturas
         * @param capacidadeDeposito
         * @return 
         */
        function setCapacidadeDeposito($capacidadeDeposito) {
            $this->capacidadeDeposito = $capacidadeDeposito;
        }
         /*
         * Setter da classe Viaturas
         * @param quilometragem
         * @return 
         */
        function setQuilometragem($quilometragem) {
            $this->quilometragem = $quilometragem;
        }
         /*
         * Setter da classe Viaturas
         * @param consumoMedio
         * @return 
         */
        function setConsumoMedio($consumoMedio) {
            $this->consumoMedio = $consumoMedio;
        }
         /*
         * Setter da classe Viaturas
         * @param lugaresSentados
         * @return 
         */
        function setLugaresSentados($lugaresSentados) {
            $this->lugaresSentados = $lugaresSentados;
        }
         /*
         * Setter da classe Viaturas
         * @param lugaresDeitados
         * @return 
         */
        function setLugaresDeitados($lugaresDeitados) {
            $this->lugaresDeitados = $lugaresDeitados;
        }
         /*
         * Setter da classe Viaturas
         * @param enderecoFoto
         * @return 
         */
        function setEnderecoFoto($enderecoFoto) {
            $this->enderecoFoto = $enderecoFoto;
        }
         /*
         * Setter da classe Viaturas
         * @param activa
         * @return 
         */
        function setActiva($activa) {
            $this->activa = $activa;
        }




    }

