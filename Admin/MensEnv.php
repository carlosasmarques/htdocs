<?php
/**Classe para objectos MensEnv
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
    class MensEnv{
        private $idMensEnv;
        private $remetente;
        private $destinatario;
        private $assunto;
        private $mensagem;
        private $dataEnvio;
        private $horaEnvio;
        private $lida;
                /**
	 * Construtor da Classe MensEnv
	 * @param idMensEnv
	 * @param remetente
         * @param destinatario
         * @param assunto
         * @param mensagem
         * @param dataEnvio
         * @param horaEnvio
         * @param lida
	 * @return 
	 */
        function __construct($idMensEnv, $remetente, $destinatario, $assunto, $mensagem, $dataEnvio, $horaEnvio, $lida) {
            $this->idMensEnv = $idMensEnv;
            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
            $this->assunto = $assunto;
            $this->mensagem = $mensagem;
            $this->dataEnvio = $dataEnvio;
            $this->horaEnvio = $horaEnvio;
            $this->lida = $lida;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return idMensEnv
	 */
        function getIdMensEnv() {
            return $this->idMensEnv;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return remetente
	 */
        function getRemetente() {
            return $this->remetente;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return destinatario
	 */
        function getDestinatario() {
            return $this->destinatario;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return assunto
	 */
        function getAssunto() {
            return $this->assunto;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return mensagem
	 */
        function getMensagem() {
            return $this->mensagem;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return dataEnvio
	 */
        function getDataEnvio() {
            return $this->dataEnvio;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return horaEnvio
	 */
        function getHoraEnvio() {
            return $this->horaEnvio;
        }
        /**
	 * Getter da classe MensEnv
	 * @param 
	 * @return lida
	 */
        function getLida() {
            return $this->lida;
        }
        /**
	 * Setter da classe MensEnv
	 * @param idMensEnv
	 * @return 
	 */
        function setIdMensEnv($idMensEnv) {
            $this->idMensEnv = $idMensEnv;
        }
        /**
	 * Setter da classe MensEnv
	 * @param remetente
	 * @return 
	 */
        function setRemetente($remetente) {
            $this->remetente = $remetente;
        }
        /**
	 * Setter da classe MensEnv
	 * @param destinatario
	 * @return 
	 */
        function setDestinatario($destinatario) {
            $this->destinatario = $destinatario;
        }
        /**
	 * Setter da classe MensEnv
	 * @param assunto
	 * @return 
	 */
        function setAssunto($assunto) {
            $this->assunto = $assunto;
        }
        /**
	 * Setter da classe MensEnv
	 * @param mensagem
	 * @return 
	 */
        function setMensagem($mensagem) {
            $this->mensagem = $mensagem;
        }
        /**
	 * Setter da classe MensEnv
	 * @param dataEnvio
	 * @return 
	 */
        function setDataEnvio($dataEnvio) {
            $this->dataEnvio = $dataEnvio;
        }
        /**
	 * Setter da classe MensEnv
	 * @param horaEnvio
	 * @return 
	 */
        function setHoraEnvio($horaEnvio) {
            $this->horaEnvio = $horaEnvio;
        }
        /**
	 * Setter da classe MensEnv
	 * @param lida
	 * @return 
	 */
        function setLida($lida) {
            $this->lida = $lida;
        }


    }
?>