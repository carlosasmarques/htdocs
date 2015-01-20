<?php
/**Classe para objectos TipoArtigos
 * Esta classe contem um atributo que define os tipos de artigo existentes.
 * O tipo de artigo pode tomar os valores por defeito:
 * Ц Equipamentos de bombeiros
 * Ц Equipamentos de primeiros socorros
 * Ц Material de manutenзгo automуvel
 * Ц Equipamentos diversos
*/
    Class TipoArtigos{
        private $idTipoArtigos;
        private $nome;
        /**
	 * Construtor da Classe TipoArtigos
	 * @param idTipoArtigos
	 * @param nome
	 * @return 
	 */
        function __construct($idTipoArtigos, $nome) {
            $this->idTipoArtigos = $idTipoArtigos;
            $this->nome = $nome;
        }
        /**
	 * Getter da classe TipoArtigos
	 * @param 
	 * @return idTipoArtigos
	 */
        function getIdTipoArtigos() {
            return $this->idTipoArtigos;
        }
	/**
	 * Getter da classe TipoArtigos
	 * @param 
	 * @return nome
	 */
        function getNome() {
            return $this->nome;
        }
	/**
	 * Setter da classe TipoArtigos
	 * @param idTipoArtigos
	 * @return 
	 */
        function setIdTipoArtigos($idTipoArtigos) {
            $this->idTipoArtigos = $idTipoArtigos;
        }
	/**
	 * Setter da classe TipoArtigos
	 * @param nome
	 * @return
	 */
        function setNome($nome) {
            $this->nome = $nome;
        }


          
    }

?>