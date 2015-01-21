<?php

/**
 * Esta classe contem os atributos necessários para gerir as manutenções futuras dos veículos.
 * 
 * Atributo descricaoManutencao:
 * - Indica a descrição que terá de ser realizada.
 * Atributo data:
 * - Indica a data que a manutenção terá efeito.
 * Atributo quilometragem:
 * - Indica a quilometragem do veículo.
 * Atributo estado:
 * - Indica se a manutenção já foi realizada ou não.
 */
class ManutencaoFutur {
   private $idManutencaoFutur;
   private $idViatura;
   private $descricaoManutencao;
   private $data;
   private $quilometragem;
   private $estado;
   /*
         * Construtor da classe ManutencaoFutur
         * 
         * @param idManutencaoFutur
         * @param descricaoManutencao
         * @param data
         * @param quilometragem
         * @param estado
         * @return 
         *          */
        function __construct($idManutencaoFutur, $idViatura, $descricaoManutencao, $data, $quilometragem, $estado) {
            $this->idManutencaoFutur = $idManutencaoFutur;
            $this->idViatura = $idViatura;
            $this->descricaoManutencao = $descricaoManutencao;
            $this->data = $data;
            $this->quilometragem = $quilometragem;
            $this->estado = $estado;
        }

        /*
         * Getter da classe ManutencaoFutur
         * @param 
         * @return idManutencaoFutur
         */
        function getIdViatura() {
            return $this->idViatura;
        }

        function setIdViatura($idViatura) {
            $this->idViatura = $idViatura;
        }

           function getIdManutencaoFutur() {
       return $this->idManutencaoFutur;
   }
/*
         * Getter da classe ManutencaoFutur
         * @param 
         * @return descricaoManutencao
         */
   function getDescricaoManutencao() {
       return $this->descricaoManutencao;
   }
/*
         * Getter da classe ManutencaoFutur
         * @param 
         * @return data
         */
   function getData() {
       return $this->data;
   }
/*
         * Getter da classe ManutencaoFutur
         * @param 
         * @return quilometragem
         */
   function getQuilometragem() {
       return $this->quilometragem;
   }
/*
         * Getter da classe ManutencaoFutur
         * @param 
         * @return estado
         */
   function getEstado() {
       return $this->estado;
   }
/*
         * Setter da classe ManutencaoFutur
         * @param idManutencaoFutur
         * @return 
         */
   function setIdManutencaoFutur($idManutencaoFutur) {
       $this->idManutencaoFutur = $idManutencaoFutur;
   }
/*
         * Setter da classe ManutencaoFutur
         * @param descricaoManutencao
         * @return 
         */
   function setDescricaoManutencao($descricaoManutencao) {
       $this->descricaoManutencao = $descricaoManutencao;
   }
/*
         * Setter da classe ManutencaoFutur
         * @param data
         * @return 
         */
   function setData($data) {
       $this->data = $data;
   }
/*
         * Setter da classe ManutencaoFutur
         * @param quilometragem
         * @return 
         */
   function setQuilometragem($quilometragem) {
       $this->quilometragem = $quilometragem;
   }
/*
         * Setter da classe ManutencaoFutur
         * @param estado
         * @return 
         */
   function setEstado($estado) {
       $this->estado = $estado;
   }

   
}
