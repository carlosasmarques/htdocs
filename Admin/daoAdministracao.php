<?php
include_once "../acessobd.php";

class DaoAdministracao{
    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    public function adicionarUtilizador(Utilizadores $utilizador){
        try{
            $sql = "INSERT INTO `fmt`.`utilizadores` (`U_ID`,`U_NUMEROFUNCIONARIO`, `U_NOME`, `U_MORADA`, `U_CONTACTO`,
            'U_DATANASCIMENTO', 'U_NOMEUTILIZADOR', 'U_PALAVRAPASSE', 'U_TIPOUTILIZADOR', 'U_DATAREGISTO', 'U_FOTOGRAFIA') "
                . "VALUES (:U_ID , :U_NUMEROFUNCIONARIO, :U_NOME, :U_MORADA, :U_CONTACTO,
            :U_DATANASCIMENTO, :U_NOMEUTILIZADOR, :U_PALAVRAPASSE, :U_TIPOUTILIZADOR, :U_DATAREGISTO, :U_FOTOGRAFIA);";

            $dados = array (
                'U_ID'=> $utilizador->getIdUtilizadores(),
                'U_NUMEROFUNCIONARIO'=> $utilizador->getNumero(),
                'U_NOME'=> $utilizador->getNome(),
                'U_MORADA'=> $utilizador->getMorada(),
                'U_CONTACTO'=> $utilizador->getTelefone(),
                'U_DATANASCIMENTO'=> $utilizador->getDataNascimento(),
                'U_NOMEUTILIZADOR'=> $utilizador->getUsername(),
                'U_PALAVRAPASSE'=> $utilizador->getPassword(),
                'U_TIPOUTILIZADOR'=> $utilizador->getTipoUtilizador(),
                'U_DATAREGISTO'=> $utilizador->getDataDeRegisto(),
                'U_FOTOGRAFIA'=> $utilizador->getCaminhoFoto()
            );

            $sucesso_funcao = $this->bd->inserir($sql, $dados);
        } catch(PDOException $e){
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