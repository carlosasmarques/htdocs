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
    private $dataManutencao;
    private $descricaoAvaria;
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
    function __construct($idManutencaoInter, $dataManutencao, $descricaoAvaria, $quantidadeMaterialGasto) {
        $this->idManutencaoInter = $idManutencaoInter;
        $this->dataManutencao = $dataManutencao;
        $this->descricaoAvaria = $descricaoAvaria;
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
/*
         * Getter da classe ManutencaoInter
         * @param quantidadeMaterialGasto
         * @return 
         */
    function setQuantidadeMaterialGasto($quantidadeMaterialGasto) {
        $this->quantidadeMaterialGasto = $quantidadeMaterialGasto;
    }


}
