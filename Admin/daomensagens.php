<?php
include_once "../conf.php";

class DaoMensagens{

    private $LigacaoBD;

    // Ligar á base de dados
    function __construct(){
        try{
            $this->LigacaoBD = new PDO("mysql:host=$servidor;dbname=$bd", $user, $pass);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    /*
    Desligar da base de dados
    (assim que seja apagada a ultima referencia ao objeto)
    */
    function __destruct(){
        $this->LigacaoBD == null;
    }

    function enviarMensagem($mensagem){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT nome FROM Utilizadores WHERE U_id = ?");
            $instrucao->bind_param($mensagem->remetente);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);
            $nome = $instrucao->fetch();
            $instrucao->close();

            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("INSERT INTO MENSAEGNSENVIADAS (
				U_id, MENV_destinatario, MENV_dataHora, MENV_mensagem) VALUES (?, ?, ?, ?, ?)");
            $instrucao->bind_param($mensagem->remetente, $mensagem->destinatario, $mensagem->dataHora, $mensagem->mensagem);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("INSERT INTO MENSAEGNSRECEBIDAS (
				MR_remetente, MR_destinatario, MR_dataHora, MR_mensagem) VALUES (?, ?, ?, ?, ?)");
            $instrucao->bind_param($nome, $mensagem->destinatario, $mensagem->dataHora, $mensagem->mensagem);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }

    function VerMensagemEnv($id){
        $mensagem = new MensEnv();
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSENVIADAS WHERE MENV_id = ?");
            $instrucao->bind_param($id);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            while($registo = $instrucao->fetch()){
                $mensagem ->setAssunto($registo["m_ass"]);
                $mensagem ->setDataEnvio($registo["m_dataenv"]);
                $mensagem ->setDestinatario($registo["m_des"]);
                $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                $mensagem ->setLida($registo["m_lida"]);
                $mensagem ->setMensagem($registo["m_mens"]);
                $mensagem ->setRemetente($registo["m_rem"]);
            }
            return $mensagem;
        }else{
            return NULL;
        }
    }

    function pesquisarMensagensDest($destinatario){
            $mensagem = new MensRec();
            try{
                // Preparar a instrução sql de inserção
                $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSENVIADAS WHERE MENV_destinatario = ?");
                $instrucao->bind_param($destinatario);

                // Executar
                $sucesso_funcao = $instrucao->execute();
                $instrucao->FETCH(PDO::FETCH_ASSOC);

            }catch(PDOException $e){
                echo $e->getMessage();
            }

            if($sucesso_funcao){
                while($registo = $instrucao->fetch()){
                    $mensagem ->setAssunto($registo["m_ass"]);
                    $mensagem ->setDataEnvio($registo["m_dataenv"]);
                    $mensagem ->setDestinatario($registo["m_des"]);
                    $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                    $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                    $mensagem ->setLida($registo["m_lida"]);
                    $mensagem ->setMensagem($registo["m_mens"]);
                    $mensagem ->setRemetente($registo["m_rem"]);
                    $dados[] = $mensagem;
                }
                return $dados;
            }else{
                return NULL;
            }
    }

    function listarMensagensEnviadas(){
        $mensagem = new MensEnv();
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSENVIADAS");

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            while($registo = $instrucao->fetch()){
                    $mensagem ->setAssunto($registo["m_ass"]);
                    $mensagem ->setDataEnvio($registo["m_dataenv"]);
                    $mensagem ->setDestinatario($registo["m_des"]);
                    $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                    $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                    $mensagem ->setLida($registo["m_lida"]);
                    $mensagem ->setMensagem($registo["m_mens"]);
                    $mensagem ->setRemetente($registo["m_rem"]);
                    $dados[] = $mensagem;
            }
            return $dados;
        }else{
            return NULL;
        }
    }

    function removeMensagemEnviada($id){
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("DELETE FROM MENSAGENSENVIADAS WHERE MENV_id = ?");
            $instrucao->bind_param($id);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }

    function VerMensagemRec($id){
        $mensagem = new MensRec();
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSRECEBIDAS WHERE MR_id = ?");
            $instrucao->bind_param($id);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            while($registo = $instrucao->fetch()){
                    $mensagem ->setAssunto($registo["m_ass"]);
                    $mensagem ->setDataEnvio($registo["m_dataenv"]);
                    $mensagem ->setDestinatario($registo["m_des"]);
                    $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                    $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                    $mensagem ->setLida($registo["m_lida"]);
                    $mensagem ->setMensagem($registo["m_mens"]);
                    $mensagem ->setRemetente($registo["m_rem"]);
                    
            }
            return $mensagem;
        }else{
            return NULL;
        }
    }

    function pesquisarMensagensRem($remetente){
        $mensagem = new MensRec();
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSRECEBIDAS WHERE MENV_remetente = ?");
            $instrucao->bind_param($remetente);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            while($registo = $instrucao->fetch()){
                    $mensagem ->setAssunto($registo["m_ass"]);
                    $mensagem ->setDataEnvio($registo["m_dataenv"]);
                    $mensagem ->setDestinatario($registo["m_des"]);
                    $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                    $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                    $mensagem ->setLida($registo["m_lida"]);
                    $mensagem ->setMensagem($registo["m_mens"]);
                    $mensagem ->setRemetente($registo["m_rem"]);
                    $dados[] = $mensagem;
            }
            return $dados;
        }else{
            return NULL;
        }
    }

    function listarMensagensRec(){
        $mensagem = new MensRec();
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("SELECT * FROM MENSAGENSRECEBIDAS");

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            while($registo = $instrucao->fetch()){
                    $mensagem ->setAssunto($registo["m_ass"]);
                    $mensagem ->setDataEnvio($registo["m_dataenv"]);
                    $mensagem ->setDestinatario($registo["m_des"]);
                    $mensagem ->setHoraEnvio($registo["m_horaenv"]);
                    $mensagem ->setIdMensEnv($registo["m_idmensenv"]);
                    $mensagem ->setLida($registo["m_lida"]);
                    $mensagem ->setMensagem($registo["m_mens"]);
                    $mensagem ->setRemetente($registo["m_rem"]);
                    $dados[] = $mensagem;
            }
            return $dados;
        }else{
            return NULL;
        }
    }

    function removeMensagemRec($id){
        try{
            // Preparar a instrução sql de inserção
            $instrucao = $LigacaoBD->prepare("DELETE FROM MENSAGENSRECEBIDAS WHERE MR_id = ?");
            $instrucao->bind_param($id);

            // Executar
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }

    function verificarNovasMensagens(){

    }
}
?>