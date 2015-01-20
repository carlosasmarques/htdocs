<?php
include "../acessobd.php";

class DaoAdministracao{

    public function adicionarUtilizador($utilizador){
        try{
            $DBH = getDBH();
            $instrucao = $DBH->prepare("INSERT INTO Utilizadores (
				U_numeroFuncionario, U_nome, U_morada, U_contactoTelefonico, U_dataNascimento, U_nomeUtilizador, U_palavraPasse, U_tipoUtilizador, U_dataRegisto, U_fotografia, U_funcao, U_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $instrucao->bind_param($utilizador->numero, $utilizador->nome,
                $utilizador->morada, $utilizador->telefone, $utilizador->dataNascimento,
                $utilizador->username, $utilizador->password, $utilizador->tipoUtilizador,
                $utilizador->dataRegisto, $utilizador->caminhoFoto, $utilizador->funcao, "True");
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
    public function editarUtilizador($id, $nome, $username, $password, $tipoUtilizador, $dataRegisto, $morada, $dataNascimento, $funcao, $caminhoFoto, $numero, $telefone){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (
				U_numeroFuncionario, U_nome, U_morada, U_contactoTelefonico, U_dataNascimento, U_nomeUtilizador, U_palavraPasse, U_tipoUtilizador, U_dataRegisto, U_fotografia, U_funcao, U_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
				WHERE U_id = ?");
            $instrucao->bind_param($numero, $nome, $morada, $telefone, $dataNascimento, $username, $password, $tipoUtilizador, $dataRegisto, $caminhoFoto, $funcao, "True", $id);
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
    public function pesquisarNome($nome){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_nome = ?");
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
    public function pesquisarNumero($numero){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utilizadores WHERE U_numeroFuncionario = ?");
            $instrucao->bind_param($numero);
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
    public function activarDesativarConta($id, $ativo){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_activo) VALUES (?) WHERE U_id = ?");
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

    public function listarUtilizadores(){
        try{
            $bd = new BaseDados();
            $instrucao = $bd->query("SELECT * FROM Utilizadores", NULL);
            //Executar
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($instrucao != NULL){
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