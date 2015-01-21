<?php
include_once "conf.php";

class DaoAcoesUtilizadores{
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
    function guardarAcaoUtilizador(AcoesUtilizadores $acao){
        
          $sql = "INSERT INTO `fmt`.`logs` (`U_ID`,`L_DATAHORA`, `L_DESCRICAO`) "
                  . "VALUES (:U_ID ,:L_DATAHORA, :L_DESCRICAO);";
          
          $dados = array (
                            'U_ID'=> $acao->getUtilizador(),
                            'L_DATAHORA'=> $acao->getData(),
                            'L_DESCRICAO'=> $acao->getDescricao()
                              );
                          
                    $this->bd->inserir($sql, $dados);
        
    }

    function listarAcoesUtilizadores(){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Logs");
            $sucesso_funcao = $instrucao->execute();
        } catch(PDOException $e){
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

    function pesquisarAcoesData($dataHora){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Logs WHERE L_dataHora = ?");
            $instrucao->bind_param($dataHora);
            $sucesso_funcao = $instrucao->execute();
        } catch(PDOException $e){
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

    function pesquisarAcoesUtilizador ($nome){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT U_id FROM Utilizadores WHERE U_nome = ?");
            $instrucao->bind_param($nome);
            $sucesso_funcao = $instrucao->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            $registo = $instrucao->fetch();
            try{
                $instrucao = $LigacaoBD->prepare("SELECT * FROM Logs WHERE U_id = ?");
                $instrucao->bind_param($registo);
                $sucesso_funcao = $instrucao->execute();
            } catch(PDOException $e){
                echo $e->getMessage();
            }
            if($sucesso_funcao){
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                while($registo = $instrucao->fetch()){
                    $dados[] = $registo;
                }
                return $dados;
            }
        } else {
            return NULL;
        }
    }
}
?>