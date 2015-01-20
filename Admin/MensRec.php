<?php
/**Classe para objectos MensRec
 * Esta classe contem os atributos necessários para gerir as mensagens entre os utilizadores do sistema.
 * Atributo remetente:
 * -Indica o remetente da mensagem recebida.
 * Atributo destinatario:
 * -Indica o destinatário da mensagem enviada.
 * Atributo assunto:
 * -Indica o assunto de uma mensagem.
 * Atributo mensagem:
 * -Corpo da mensagem.
 * Atributo dataEnvio:
 * -Data de envio de uma mensagem.
 * Atributo horaEnvio:
 * -Hora de envio de uma mensagem.
 * Atributo lida:
 * -Indica se a mensagem foi lida ou não.
*/
    class MensRec{
        private $idMensRec;
        private $remetente;
        private $destinatario;
        private $assunto;
        private $mensagem;
        private $dataEnvio;
        private $horaEnvio;
        private $lida;
        /**
	 * Construtor da Classe MensRec
	 * @param idMensRec
	 * @param remetente
         * @param destinatario
         * @param assunto
         * @param mensagem
         * @param dataEnvio
         * @param horaEnvio
         * @param lida
	 * @return 
	 */
        function __construct($idMensRec, $remetente, $destinatario, $assunto, $mensagem, $dataEnvio, $horaEnvio, $lida) {
            $this->idMensRec = $idMensRec;
            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
            $this->assunto = $assunto;
            $this->mensagem = $mensagem;
            $this->dataEnvio = $dataEnvio;
            $this->horaEnvio = $horaEnvio;
            $this->lida = $lida;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return idMensRec
	 */
        function getIdMensRec() {
            return $this->idMensRec;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return remetente
	 */
        function getRemetente() {
            return $this->remetente;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return destinatario
	 */
        function getDestinatario() {
            return $this->destinatario;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return assunto
	 */
        function getAssunto() {
            return $this->assunto;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return mensagem
	 */
        function getMensagem() {
            return $this->mensagem;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return dataEnvio
	 */
        function getDataEnvio() {
            return $this->dataEnvio;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return horaEnvio
	 */
        function getHoraEnvio() {
            return $this->horaEnvio;
        }
        /**
	 * Getter da classe MensRec
	 * @param 
	 * @return lida
	 */
        function getLida() {
            return $this->lida;
        }
        /**
	 * Setter da classe MensRec
	 * @param idMensRec
	 * @return 
	 */
        function setIdMensRec($MensRecid) {
            $this->idMensRec = $idMensRec;
        }
        /**
	 * Setter da classe MensRec
	 * @param remetente
	 * @return 
	 */
        function setRemetente($remetente) {
            $this->remetente = $remetente;
        }
        /**
	 * Setter da classe MensRec
	 * @param destinatario
	 * @return 
	 */
        function setDestinatario($destinatario) {
            $this->destinatario = $destinatario;
        }
        /**
	 * Setter da classe MensRec
	 * @param assunto
	 * @return 
	 */
        function setAssunto($assunto) {
            $this->assunto = $assunto;
        }
        /**
	 * Setter da classe MensRec
	 * @param mensagem
	 * @return 
	 */
        function setMensagem($mensagem) {
            $this->mensagem = $mensagem;
        }
        /**
	 * Setter da classe MensRec
	 * @param dataEnvio
	 * @return 
	 */
        function setDataEnvio($dataEnvio) {
            $this->dataEnvio = $dataEnvio;
        }
        /**
	 * Setter da classe MensRec
	 * @param horaEnvio
	 * @return 
	 */
        function setHoraEnvio($horaEnvio) {
            $this->horaEnvio = $horaEnvio;
        }
        /**
	 * Setter da classe MensRec
	 * @param lida
	 * @return 
	 */
        function setLida($lida) {
            $this->lida = $lida;
        }


    }
?>

