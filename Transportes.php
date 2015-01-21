<?php
/**Classe para objectos Transportes
 * Esta classe contem os atributos necess�rios para gerir os transportes de doentes.
 * Atributo dataTransporte:
 * -Data de transporte de doente.
 * Atributo horaDePartida:
 * -Hora de partida de um transporte de doente.
 * Atributo horaDeChegada:
 * -Hora de chegada de um transporte de doente.
 * Atributo origem:
 * -Local de origem de um transporte de doente.
 * Atributo destino:
 * -Local de destino de um transporte de doente.
 * Atributo observacoes:
 * -Observa��es importantes a ter em conta num transporte de doente.
 * Atributo condicaoUtente:
 * -Informa��o sobre a condi��o de um utente aquando do seu transporte, um doente pode estar:
 *  � Acamado
 *  � Deitado
 *  � Cadeira de rodas
 *  � Sentado
 * Atributo quilometros:
 * -Distancia de quil�metros efetuada para transportar o doente.
*/
    class Transportes{
        private $idTransportes;
        private $idUtilizador;
        private $idViatura;
        private $dataTransporte;
        private $horaDePartida;
        private $horaDeChegada;
        private $origem;
        private $destino;
        private $observacoes;
        private $condicaoUtente;
        private $totalQuilometros;
        /**
	 * Construtor da Classe Transportes
	 * @param idTransportes
	 * @param dataTransporte
         * @param horaDePartida
         * @param horaDeChegada
         * @param origem
         * @param destino
         * @param observacoes
         * @param condicaoUtente
         * @param quilometros
	 * @return 
	 */
    function __construct($idTransportes, $idUtilizador, $idViatura, $dataTransporte, $horaDePartida, $horaDeChegada, $origem, $destino, $observacoes, $condicaoUtente, $totalQuilometros) {
            $this->idTransportes = $idTransportes;
            $this->idUtilizador = $idUtilizador;
            $this->idViatura = $idViatura;
            $this->dataTransporte = $dataTransporte;
            $this->horaDePartida = $horaDePartida;
            $this->horaDeChegada = $horaDeChegada;
            $this->origem = $origem;
            $this->destino = $destino;
            $this->observacoes = $observacoes;
            $this->condicaoUtente = $condicaoUtente;
            $this->totalQuilometros = $totalQuilometros;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return idTransportes
	 */
        function getIdTransportes() {
            return $this->idTransportes;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return dataTransporte
	 */
        function getIdUtilizador(){
        	return  $this->idUtilizador;
        }
        
        function getIdViatura(){
        	return  $this->idViatura;
        }
        
        function getDataTransporte() {
            return $this->dataTransporte;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return horaDePartida
	 */
        function getHoraDePartida() {
            return $this->horaDePartida;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return horaDeChegada
	 */
        function getHoraDeChegada() {
            return $this->horaDeChegada;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return origem
	 */
        function getOrigem() {
            return $this->origem;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return destino
	 */
        function getDestino() {
            return $this->destino;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return observacoes
	 */
        function getObservacoes() {
            return $this->observacoes;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return condicaoUtente
	 */
        function getCondicaoUtente() {
            return $this->condicaoUtente;
        }
        /**
	 * Getter da classe Transportes
	 * @param 
	 * @return quilometros
	 */
    	function getTotalQuilometros() {
            return $this->totalQuilometros;
        }
        
        /**
	 * Setter da classe Transportes
	 * @param idTransportes
	 * @return 
	 */
        function setIdTransportes($idTransportes) {
            $this->idTransportes = $idTransportes;
        }
        /**
	 * Setter da classe Transportes
	 * @param dataTransporte
	 * @return 
	 */
        
        function setIdUtilizador($idUtilizador){
        	$this->idUtilizador = $idUtilizador;
        }
        
        function setIdViatura($idViatura){
        	$this->idViatura = $idViatura;
        }
        
        
        function setDataTransporte($dataTransporte) {
            $this->dataTransporte = $dataTransporte;
        }
        /**
	 * Setter da classe Transportes
	 * @param horaDePartida
	 * @return 
	 */
        function setHoraDePartida($horaDePartida) {
            $this->horaDePartida = $horaDePartida;
        }
        /**
	 * Setter da classe Transportes
	 * @param horaDeChegada
	 * @return 
	 */
        function setHoraDeChegada($horaDeChegada) {
            $this->horaDeChegada = $horaDeChegada;
        }
        /**
	 * Setter da classe Transportes
	 * @param origem
	 * @return 
	 */
        function setOrigem($origem) {
            $this->origem = $origem;
        }
        /**
	 * Setter da classe Transportes
	 * @param destino
	 * @return 
	 */
        function setDestino($destino) {
            $this->destino = $destino;
        }
        /**
	 * Setter da classe Transportes
	 * @param observacoes
	 * @return 
	 */
        function setObservacoes($observacoes) {
            $this->observacoes = $observacoes;
        }
        /**
	 * Setter da classe Transportes
	 * @param condicaoUtente
	 * @return 
	 */
        function setCondicaoUtente($condicaoUtente) {
            $this->condicaoUtente = $condicaoUtente;
        }
        /**
	 * Setter da classe Transportes
	 * @param quilometros
	 * @return 
	 */
    	function setTotalQuilometros($totalQuilometros) {
            $this->totalQuilometros = $totalQuilometros;
        }

    }
?>
