<?php
/**
 * Esta classe contem os atributos necessários para gerir as manutenções feitas aos veículos na própria oficina. *
 * Atributo dataManutencao:
 * - Data em que se realizou a manutenção ao veículo.
 * Atributo descricaoAvaria:
 * - Descrição da avaria do veículo.
 * Atributo quantidadeMaterialGasto:
 * - Indica a quantidade de material gasto para efetuar a reparação.
 */
class manutencaoInter {
    private $idManutencaoInter;
    private $idViatura;
    private $dataManutencao;
    private $descricaoAvaria;
    private $materialGasto;
    private $quantidadeMaterialGasto;
    /*
         * Construtor da classe ManutencaoInter
         * 
         * @param idManutencaoInter
         * @param dataManutencao
         * @param descricaoAvaria
         * @param quantidadeMaterialGasto
         * @return 
         *          */ 
    function __construct($idManutencaoInter, $idViatura, $dataManutencao, $descricaoAvaria, $materialGasto, $quantidadeMaterialGasto) {
        $this->idManutencaoInter = $idManutencaoInter;
        $this->idViatura = $idViatura;
        $this->dataManutencao = $dataManutencao;
        $this->descricaoAvaria = $descricaoAvaria;
        $this->materialGasto = $materialGasto;
        $this->quantidadeMaterialGasto = $quantidadeMaterialGasto;
    }
    /*
         * Getter da classe ManutencaoInter
         * @param 
         * @return idManutencaoInter
         */
    function getIdManutencaoInter() {
        return $this->idManutencaoInter;
    }
    
    function getIdViatura() {
        return $this->idViatura;
    }
    
    /*
         * Getter da classe ManutencaoInter
         * @param 
         * @return dataManutencao
         */
    function getDataManutencao() {
        return $this->dataManutencao;
    }
/*
         * Getter da classe ManutencaoInter
         * @param 
         * @return descricaoAvaria
         */
    function getDescricaoAvaria() {
        return $this->descricaoAvaria;
    }
    
    function getMaterialGasto() {
        return $this->materialGasto;
    }
    
/*
         * Getter da classe ManutencaoInter
         * @param 
         * @return quantidadeMaterialGasto
         */
    function getQuantidadeMaterialGasto() {
        return $this->quantidadeMaterialGasto;
    }
/*
         * Getter da classe ManutencaoInter
         * @param idManutencaoInter
         * @return 
         */
    function setIdManutencaoInter($idManutencaoInter) {
        $this->idManutencaoInter = $idManutencaoInter;
    }
    
    function setIdViatura($idViatura) {
        $this->idViatura = $idViatura;
    }
    
/*
         * Getter da classe ManutencaoInter
         * @param dataManutencao
         * @return 
         */
    function setDataManutencao($dataManutencao) {
        $this->dataManutencao = $dataManutencao;
    }
/*
         * Getter da classe ManutencaoInter
         * @param descricaoAvaria
         * @return 
         */
    function setDescricaoAvaria($descricaoAvaria) {
        $this->descricaoAvaria = $descricaoAvaria;
    }
    
    function setMaterialGasto($materialGasto) {
        $this->materialGasto = $materialGasto;
    }
    
/*
         * Getter da classe ManutencaoInter
         * @param quantidadeMaterialGasto
         * @return 
         */
    function setQuantidadeMaterialGasto($quantidadeMaterialGasto) {
        $this->quantidadeMaterialGasto = $quantidadeMaterialGasto;
    }


}
