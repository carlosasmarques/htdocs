<?php
/**
 * Esta classe contem os atributos necessários para gerir as manutenções feitas aos veículos em oficinas de terceiros.
 *
 * Atributo oficina:
 * - Descrição da avaria do veículo.
 * Atributo descricaoAvaria:
 * - Descrição da avaria do veículo.
 * Atributo descReparacao:
 * - Descrição da reparação do veículo.
 * Atributo dataAvaria:
 * -  Data da avaria do veículo.
 * Atributo dataReparacao:
 * - Data da reparação do veículo.
 * Atributo custoReparacao:
 * - Custo da reparação do veículo.
 */
class manutencaoExter {
   private $idManutencaoExter; 
   private $oficina;
   private $descricaoAvaria;
   private $descReparacao;
   private $dataAvaria;
   private $dataReparacao;
   private $custoReparacao;
   /*
         * Construtor da classe ManutencaoExter
         * 
         * @param idManutencaoExter
         * @param oficina
         * @param descricaoAvaria
         * @param descReparacao
         * @param dataAvaria
         * @param dataReparacao
         * @param custoReparacao
         * @return 
         *          */
   function __construct($idManutencaoExter, $oficina, $descricaoAvaria, $descReparacao, $dataAvaria, $dataReparacao, $custoReparacao) {
       $this->idManutencaoExter = $idManutencaoExter;
       $this->oficina = $oficina;
       $this->descricaoAvaria = $descricaoAvaria;
       $this->descReparacao = $descReparacao;
       $this->dataAvaria = $dataAvaria;
       $this->dataReparacao = $dataReparacao;
       $this->custoReparacao = $custoReparacao;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return idManutencaoExter
         */
   function getIdManutencaoExter() {
       return $this->idManutencaoExter;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return oficina
         */
   function getOficina() {
       return $this->oficina;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return descricaoAvaria
         */
   function getDescricaoAvaria() {
       return $this->descricaoAvaria;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return descReparacao
         */
   function getDescReparacao() {
       return $this->descReparacao;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return dataAvaria
         */
   function getDataAvaria() {
       return $this->dataAvaria;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return dataReparacao
         */
   function getDataReparacao() {
       return $this->dataReparacao;
   }
/*
         * Getter da classe ManutencaoExter
         * @param 
         * @return custoReparacao
         */
   function getCustoReparacao() {
       return $this->custoReparacao;
   }
/*
         * Setter da classe ManutencaoExter
         * @param idManutencaoExter
         * @return 
         */
   function setIdManutencaoExter($idManutencaoExter) {
       $this->idManutencaoExter = $idManutencaoExter;
   }
/*
         * Setter da classe ManutencaoExter
         * @param oficina
         * @return 
         */
   function setOficina($oficina) {
       $this->oficina = $oficina;
   }
/*
         * Setter da classe ManutencaoExter
         * @param descricaoAvaria
         * @return 
         */
   function setDescricaoAvaria($descricaoAvaria) {
       $this->descricaoAvaria = $descricaoAvaria;
   }
/*
         * Setter da classe ManutencaoExter
         * @param desReparacao
         * @return 
         */
   function setDescReparacao($descReparacao) {
       $this->descReparacao = $descReparacao;
   }
/*
         * Setter da classe ManutencaoExter
         * @param dataAvaria
         * @return 
         */
   function setDataAvaria($dataAvaria) {
       $this->dataAvaria = $dataAvaria;
   }
/*
         * Setter da classe ManutencaoExter
         * @param dataReparacao
         * @return 
         */
   function setDataReparacao($dataReparacao) {
       $this->dataReparacao = $dataReparacao;
   }
/*
         * Setter da classe ManutencaoExter
         * @param custoReparacao
         * @return 
         */
   function setCustoReparacao($custoReparacao) {
       $this->custoReparacao = $custoReparacao;
   }


   
   
   
}
