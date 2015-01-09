<?php
include "conf.php";

class DaoUtentes{

    private $LigacaoBD;
    function __construct(){
        try{
            $this->LigacaoBD = new PDO("mysql:host=$servidor;dbname=$bd", $user, $pass);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    function __destruct(){
        $this->LigacaoBD == null;
    }

    public function adicionarUtilizador($utente){
        try{
            $instrucao = $LigacaoBD->prepare("INSERT INTO Utentes (
            UT_nome, UT_morada, UT_contactoTelefonico, UT_dataNascimento, UT_dataRegisto, UT_sns, UT_ativo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $instrucao->bind_param($utente->nome,
                $utente->morada, $utente->telefone, $utente->dataNascimento,
                $utente->dataRegisto, $utente->sns, "True");
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

    public function editarDadosUtente($utente){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (
				UT_nome, UT_morada, UT_contactoTelefonico, UT_dataNascimento, UT_dataRegisto, UT_sns, UT_ativo) VALUES (?, ?, ?, ?, ?, ?, ?)
				WHERE UT_id = ?");
            $instrucao->bind_param($utente->nome,
            $utente->morada, $utente->telefone, $utente->dataNascimento,
            $utente->dataRegisto, $utente->sns, "True");

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

    public function activarDesativarUtente($id, $ativo){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utentes SET (UT_ativo) VALUES (?) WHERE UT_id = ?");
            $instrucao->bind_param($ativo, $id);
            //Executar

            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            return "True";
        } else {
            return "False";
        }
    }

    public function pesquisarUtenteNome($nome){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utentes WHERE UT_nome = ?");
            $instrucao->bind_param($nome);
            //Executar

            $sucesso_funcao = $instrucao->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            $registo = $instrucao->Fetch();
            return $registo;
        } else {
            return NULL;
        }
    }

    public function pesquisarUtenteNumero($sns){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utentes WHERE UT_sns = ?");
            $instrucao->bind_param($sns);
            //Executar

            $sucesso_funcao = $instrucao->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            $registo = $instrucao->Fetch();
            return $registo;
        } else {
            return NULL;
        }
    }

    function verUtente($id){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utentes WHERE UT_id = ?");
            $instrucao->bind_param($id);
            $sucesso_funcao = $instrucao->execute();
            if($sucesso_funcao){
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                while($registo = $instrucao->fetch()){
                    return $registo;
                }
            } else {
                return NULL;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarUtentes(){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utentes");
            //Executar

            $sucesso_funcao = $instrucao->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            while($registo = $instrucao->fetch()){
                $dados[] = $registo;
            }
            return $dados;
        } else {
            return NULL;
        }
    }
}
?>