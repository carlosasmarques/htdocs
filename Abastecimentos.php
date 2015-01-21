<?php
/**
 * Esta classe contem os atributos necessários para gerir os abastecimentos de combustível das viaturas  * Atributo dataLimite:
 * 
 * Atributo quantidadeCombustivel:
 * - Quantidade de combustível de um abastecimento de combustível.
 * Atributo quilometragemActual
 * - Quilometragem do veículo aquando do abastecimento de combustível.
 * Atributo dataAbastecimento:
 * - Data em que o abastecimento de combustível foi feito.
 * Atributo mediaDesteAbastecimento:
 * - Indica a quilometragem estimada do veículo com um determinado abastecimento de combustível.
 */
class Abastecimentos {
    private $idAbastecimentos;
    private $idViatura;
    private $localAbast;
    private $quantidadeCombustivel;
    private $quilometragemActual;
    private $dataAbastecimento;
    private $mediaDesteAbastecimento;
    /*
         * Construtor da classe Abastecimentos
         * 
         * @param idAbastecimentos
         * @param quantidadeCombustivel
         * @param quilometragemActual
         * @param dataAbastecimento
         * @param mediaDesteAbastecimento
         * @return 
         *          */
    function __construct($idAbastecimentos, $idViatura ,$localAbast ,$quantidadeCombustivel, $quilometragemActual, $dataAbastecimento, $mediaDesteAbastecimento) {
        $this->idAbastecimentos = $idAbastecimentos;
        $this->idViatura = $idViatura;
        $this->localAbast = $localAbast;
        $this->quantidadeCombustivel = $quantidadeCombustivel;
        $this->quilometragemActual = $quilometragemActual;
        $this->dataAbastecimento = $dataAbastecimento;
        $this->mediaDesteAbastecimento = $mediaDesteAbastecimento;
    }

    /*
         * Getter da classe Abastecimentos
         * @param 
         * @return idAbastecimentos 
         */
    function getIdAbastecimentos() {
        return $this->idAbastecimentos;
    }
    function getIdViatura() {
        return $this->idViatura;
    }
    function getLocalAbast() {
        return $this->localAbast;
    }
      /*
         * Setter da classe Abastecimentos
         * @param idAbastecimentos
         * @return 
         */
    function setIdAbastecimentos($idAbastecimentos) {
        $this->idAbastecimentos = $idAbastecimentos;
    }
    /*
         * Getter da classe Abastecimentos
         * @param 
         * @return quantidadeCombustivel 
         */
    function getQuantidadeCombustivel() {
        return $this->quantidadeCombustivel;
    }
    /*
         * Getter da classe Abastecimentos
         * @param 
         * @return quilometragemActual 
         */
    function getQuilometragemActual() {
        return $this->quilometragemActual;
    }
    /*
         * Getter da classe Abastecimentos
         * @param 
         * @return dataAbastecimento 
         */
    function getDataAbastecimento() {
        return $this->dataAbastecimento;
    }
    /*
         * Getter da classe Abastecimentos
         * @param 
         * @return mediaDesteAbastecimento 
         */
    function getMediaDesteAbastecimento() {
        return $this->mediaDesteAbastecimento;
    }
    /*
         * Setter da classe Abastecimentos
         * @param quantidadeCombustivel
         * @return 
         */
    function setQuantidadeCombustivel($quantidadeCombustivel) {
        $this->quantidadeCombustivel = $quantidadeCombustivel;
    }
    function setIdMatricula($idViatura) {
        $this->idViatura = $idViatura;
    }
    function setLocalAbast($localAbast) {
        $this->localAbast = $localAbast;
    }
    /*$idViatura$localAbast
         * Setter da classe Abastecimentos
         * @param quilometragemActual
         * @return 
         */
    function setQuilometragemActual($quilometragemActual) {
        $this->quilometragemActual = $quilometragemActual;
    }
    /*
         * Setter da classe Abastecimentos
         * @param DataAbastecimento
         * @return 
         */
    function setDataAbastecimento($dataAbastecimento) {
        $this->dataAbastecimento = $dataAbastecimento;
    }
    /*
         * Setter da classe Abastecimentos
         * @param mediaDesteAbasteimento
         * @return 
         */
    function setMediaDesteAbastecimento($mediaDesteAbastecimento) {
        $this->mediaDesteAbastecimento = $mediaDesteAbastecimento;
    }



}
