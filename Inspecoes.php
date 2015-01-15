<?php
/**
 * Esta classe contem os atributos necessários para gerir as inspeções.  
 *
 *  Atributo dataLimite:
 * - Data limite da inspeção do veículo.
 * Atributo estado:
 * - Indica se a inspeção já foi efetuada (1) ou se está por efetuar(2).
 * 
 */
class Inspecoes {
    private $idInspecoes;
    private $dataLimite;
    private $estado;
     /*
         * Construtor da classe Inspecoes
         * 
         * @param idInspecoes
         * @param dataLimite
         * @param estado
         * @return 
         *          */
    function __construct($idInspecoes, $dataLimite, $estado) {
        $this->idInspecoes = $idInspecoes;
        $this->dataLimite = $dataLimite;
        $this->estado = $estado;
    }
    /*
         * Getter da classe Inspecoes
         * @param 
         * @return getIdInspecoes  
         */
    function getIdInspecoes() {
        return $this->idInspecoes;
    }
/*
         * Setter da classe Inspecoes
         * @param idInspecoes
         * @return   
         */
    function setIdInspecoes($idInspecoes) {
        $this->idInspecoes = $idInspecoes;
    }
/*
         * Getter da classe Inspecoes
         * @param 
         * @return dataLimite  
         */
    function getDataLimite() {
        return $this->dataLimite;
    }
/*
         * Getter da classe Inspecoes
         * @param 
         * @return Estado  
         */
    function getEstado() {
        return $this->estado;
    }
/*
         * Setter da classe Inspecoes
         * @param DataLimite
         * @return   
         */
    function setDataLimite($dataLimite) {
        $this->dataLimite = $dataLimite;
    }
/*
         * Setter da classe Inspecoes
         * @param estado
         * @return   
         */
    function setEstado($estado) {
        $this->estado = $estado;
    }


    
}
