<?php

include "conf.php";


class DaoUtilizador{

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
    function alterarPalavraPasse($palavraPasse, $id){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_palavraPasse = ? WHERE U_id = ?) VALUES (?, ?)");
            $instrucao->bind_param($palavraPasse, $id);
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();

        } catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            return "True";
        }else{
            return "False";
        }
    }

    function verDadosUtilizador($id){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_id = ?");
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
}
?>