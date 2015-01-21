<?php
/**
 * Esta classe contem os atributos necessários para gerir e guardar todas as ações por utilizador, efetuadas no sistema, exatamente como um log automático.
 *
 * Atributo utilizador:
 * - Indica que utilizador realizou determinada ação.
 * Atributo data:
 * - Indica a data de uma determinada ação.
 * Atributo hora:
 * - Indica a hora de uma determinada ação.
 * Atributo descricao:
 * - Indica que ação foi realizada.
 */
class AcoesUtilizadores {
    private $idAcoesUtilizadores;
    private $utilizador;
    private $data;
    private $descricao;
    
     /*
         * Construtor da classe AcoesUtilizadores
         * 
         * @param idAcoesUtilizadores
         * @param utilizador
         * @param data
         * @param hora
         * @param descricao
         * @return 
         *          */
    function __construct($idAcoesUtilizadores, $utilizador, $data, $hora, $descricao) {
        $this->idAcoesUtilizadores = $idAcoesUtilizadores;
        $this->utilizador = $utilizador;
        $this->data = $data;
        $this->descricao = $descricao;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return idAcoesUtilizadores 
         */
    function getIdAcoesUtilizadores() {
        return $this->idAcoesUtilizadores;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return utilizador 
         */
    function getUtilizador() {
        return $this->utilizador;
    }
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return data 
         */
    function getData() {
        return $this->data;
    }
    
  
    /*
         * Getter da classe AcoesUtilizadores
         * @param 
         * @return Descricao 
         */
    function getDescricao() {
        return $this->descricao;
    }
     /*
         * Setter da classe AcoesUtilizadores
         * @param idAcoesUtilizadores
         * @return  
         */
    function setIdAcoesUtilizadores($idAcoesUtilizadores) {
        $this->idAcoesUtilizadores = $idAcoesUtilizadores;
    }
    /*
         * Setter da classe AcoesUtilizadores
         * @param utilizador
         * @return  
         */
    function setUtilizador($utilizador) {
        $this->utilizador = $utilizador;
    }
/*
         * Setter da classe data
         * @param utilizador
         * @return  
         */
    function setData($data) {
        $this->data = $data;
    }

/*
         * Setter da classe descricao
         * @param utilizador
         * @return  
         */
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }



}
