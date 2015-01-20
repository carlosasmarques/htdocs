<?php
/**Classe para objectos ConsumoArtigos
* Esta classe contem os atributos para gerir o consumo dos equipamentos. * O tipo de artigo pode tomar os valores por defeito:
* Atributo quantidadeConsumida:
* - Valor da quantidade de um determinado artigo que foi gasto num determinado uso.
* Atributo dataDeConsumo:
* - Data do gasto de um determinado artigo.
* Atributo descricaoConsumo:
* - Descriчуo que explique sucintamente para que foi gasto um determinado artigo.
*/
    class ConsumoArtigos{
        private $idConsumoArtigos;
        private $quantidadeConsumida;
        private $dataDeConsumo;
        private $descricaoConsumo;
        /**
	 * Construtor da Classe ConsumoArtigos
	 * @param idConsumoArtigos
	 * @param quantidadeConsumida
         * @param dataDeConsumo
         * @param descricaoConsumo
	 * @return 
	 */
        function __construct($idConsumoArtigos, $quantidadeConsumida, $dataDeConsumo, $descricaoConsumo) {
            $this->idConsumoArtigos = $idConsumoArtigos;
            $this->quantidadeConsumida = $quantidadeConsumida;
            $this->dataDeConsumo = $dataDeConsumo;
            $this->descricaoConsumo = $descricaoConsumo;
        }
        /**
	 * Getter da classe ConsumoArtigos
	 * @param 
	 * @return idConsumoArtigos
	 */
        function getIdConsumoArtigos() {
            return $this->idConsumoArtigos;
        }
        /**
	 * Getter da classe ConsumoArtigos
	 * @param 
	 * @return quantidadeConsumida
	 */
        function getQuantidadeConsumida() {
            return $this->quantidadeConsumida;
        }
        /**
	 * Getter da classe ConsumoArtigos
	 * @param 
	 * @return dataDeConsumo
	 */
        function getDataDeConsumo() {
            return $this->dataDeConsumo;
        }
        /**
	 * Getter da classe ConsumoArtigos
	 * @param 
	 * @return descricaoConsumo
	 */
        function getDescricaoConsumo() {
            return $this->descricaoConsumo;
        }
        /**
	 * Setter da classe ConsumoArtigos
	 * @param 
	 * @return idConsumoArtigos
	 */
        function setIdConsumoArtigos($idConsumoArtigos) {
            $this->idConsumoArtigos = $idConsumoArtigos;
        }
        /**
	 * Setter da classe ConsumoArtigos
	 * @param quantidadeConsumida
	 * @return 
	 */
        function setQuantidadeConsumida($quantidadeConsumida) {
            $this->quantidadeConsumida = $quantidadeConsumida;
        }
        /**
	 * Setter da classe ConsumoArtigos
	 * @param dataDeConsumo
	 * @return 
	 */
        function setDataDeConsumo($dataDeConsumo) {
            $this->dataDeConsumo = $dataDeConsumo;
        }
        /**
	 * Setter da classe ConsumoArtigos
	 * @param descricaoConsumo
	 * @return 
	 */
        function setDescricaoConsumo($descricaoConsumo) {
            $this->descricaoConsumo = $descricaoConsumo;
        }


    }

?>