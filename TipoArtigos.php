<?php
/**Classe para objectos TipoEquip
 * Esta classe contem um atributo que define os tipos de artigo existentes.
 * O tipo de artigo pode tomar os valores por defeito:
 * Ц Equipamentos de bombeiros
 * Ц Equipamentos de primeiros socorros
 * Ц Material de manutenзгo automуvel
 * Ц Equipamentos diversos
*/
    Class TipoEquip{
        private $idTipoArtigos;
        private $nome;
        /**
	 * Construtor da Classe TipoEquip
	 * @param idTipoArtigos
	 * @param nome
	 * @return 
	 */
        function __construct($idTipoArtigos, $nome) {
            $this->idTipoArtigos = $idTipoArtigos;
            $this->nome = $nome;
        }
        /**
	 * Getter da classe TipoEquip
	 * @param 
	 * @return idTipoArtigos
	 */
        function getIdTipoArtigos() {
            return $this->idTipoArtigos;
        }
	/**
	 * Getter da classe TipoEquip
	 * @param 
	 * @return nome
	 */
        function getNome() {
            return $this->nome;
        }
	/**
	 * Setter da classe TipoEquip
	 * @param idTipoArtigos
	 * @return 
	 */
        function setIdTipoArtigos($idTipoArtigos) {
            $this->idTipoArtigos = $idTipoArtigos;
        }
	/**
	 * Setter da classe TipoEquip
	 * @param nome
	 * @return
	 */
        function setNome($nome) {
            $this->nome = $nome;
        }


          
    }

?>