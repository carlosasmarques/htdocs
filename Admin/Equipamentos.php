<?php
/**Classe para objectos Equipamentos
 * Esta classe contem os atributos necess�rios para gerir os equipamentos.
 * Atributo preco:
 * -Valor do pre�o do artigo.
 * Atributo quantidadeMinima:
 * -Valor da quantidade m�nima aceit�vel em stock.
 * Atributo quantidadeExistente:
 * -Valor da quantidade existente em stock.
 * Atributo descricao:
 * -Descri��o do artigo.
 * Atributo codigo:
 * -C�digo do artigo.
 * Atributo data:
 * -Data de quando do artigo foi inserido no sistema.
 * Atributo activo:
 * -Indica se o equipamento est� ou n�o ativo no sistema.
*/
    Class Equipamentos{
        private $idEquipamentos;
        private $preco;
        private $tipoEquipamentos;
        private $quantidadeMinima;
        private $quantidadeExistente;
        private $descricao;
        private $codigo;
        private $data;
        private $activo;
        /**
	 * Construtor da Classe Equipamentos
	 * @param idEquipamentos
	 * @param preco
         * @param tipoEquipamentos
         * @param quantidadeMinima
         * @param quantidadeExistente
         * @param descricao
         * @param codigo
         * @param data
         * @param activo
	 * @return 
	 */
        function __construct($idEquipamentos, $preco, $tipoEquipamentos,$quantidadeMinima, $quantidadeExistente, $descricao, $codigo, $data, $activo) {
            $this->idEquipamentos = $idEquipamentos;
            $this->preco = $preco;
            $this->tipoEquipamentos = $tipoEquipamentos;
            $this->quantidadeMinima = $quantidadeMinima;
            $this->quantidadeExistente = $quantidadeExistente;
            $this->descricao = $descricao;
            $this->codigo = $codigo;
            $this->data = $data;
            $this->activo = $activo;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return idEquipamentos
	 */
        function getIdEquipamentos() {
            return $this->idEquipamentos;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return preco
	 */
        function getPreco() {
            return $this->preco;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return tipoEquipamentos
	 */
        function getTipoEquipamentos() {
            return $this->tipoEquipamentos;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return quantidadeMinima
	 */
        function getQuantidadeMinima() {
            return $this->quantidadeMinima;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return quantidadeExistente
	 */
        function getQuantidadeExistente() {
            return $this->quantidadeExistente;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return descricao
	 */
        function getDescricao() {
            return $this->descricao;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return codigo
	 */
        function getCodigo() {
            return $this->codigo;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return data
	 */
        function getData() {
            return $this->data;
        }
        /**
	 * Getter da classe Equipamentos
	 * @param 
	 * @return activo
	 */
        function getActivo() {
            return $this->activo;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param idEquipamentos
	 * @return 
	 */
        function setIdEquipamentos($idEquipamentos) {
            $this->idEquipamentos = $idEquipamentos;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param preco
	 * @return 
	 */
        function setPreco($preco) {
            $this->preco = $preco;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param tipoEquipamentos
	 * @return 
	 */
        function setTipoEquipamentos($tipoEquipamentos) {
            $this->tipoEquipamentos = $tipoEquipamentos;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param quantidadeMinima
	 * @return 
	 */
        function setQuantidadeMinima($quantidadeMinima) {
            $this->quantidadeMinima = $quantidadeMinima;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param quantidadeExistente
	 * @return 
	 */
        function setQuantidadeExistente($quantidadeExistente) {
            $this->quantidadeExistente = $quantidadeExistente;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param descricao
	 * @return 
	 */
        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param codigo
	 * @return 
	 */
        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param data
	 * @return 
	 */
        function setData($data) {
            $this->data = $data;
        }
        /**
	 * Setter da classe Equipamentos
	 * @param activo
	 * @return 
	 */
        function setActivo($activo) {
            $this->activo = $activo;
        }


    }

?>
