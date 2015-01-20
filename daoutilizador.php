<?php

// daoutilizador.php - acesso aos dados dos utilizadores registados na base de dados

include_once "acessobd.php";

class DaoUtilizador {

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }

    function adicionarUtilizador(Utilizadores $utilizador) {

        $sql = "INSERT INTO `fmt`.`utilizadores` (`U_NUMEROFUNCIONARIO`, `U_NOME`, `U_MORADA`, `U_CONTACTOTELEFONICO`, `U_DATANASCIMENTO`, `U_NOMEUTILIZADOR`, `U_PALAVRAPASSE`, `U_TIPOUTILIZADOR`, `U_DATAREGISTO`, `U_FOTOGRAFIA`, `U_ACTIVO`, `U_FUNCAO`) VALUES (:U_NUMEROFUNCIONARIO, :U_NOME, :U_MORADA, :U_CONTACTOTELEFONICO, :U_DATANASCIMENTO, :U_NOMEUTILIZADOR, :U_PALAVRAPASSE, :U_TIPOUTILIZADOR, :U_DATAREGISTO, :U_FOTOGRAFIA, :U_ACTIVO, :U_FUNCAO);";

        $dados_utilizador = array(
            'U_NUMEROFUNCIONARIO' => $utilizador->getNumero(),
            'U_NOME' => $utilizador->getNome(),
            'U_MORADA' => $utilizador->getMorada(),
            'U_CONTACTOTELEFONICO' => $utilizador->getTelefone(),
            'U_DATANASCIMENTO' => $utilizador->getDataNascimento(),
            'U_NOMEUTILIZADOR' => $utilizador->getUsername(),
            'U_PALAVRAPASSE' => $utilizador->getPassword(),
            'U_TIPOUTILIZADOR' => $utilizador->getTipoUtilizador(),
            'U_DATAREGISTO' => $utilizador->getDataDeRegisto(),
            'U_FOTOGRAFIA' => $utilizador->getCaminhoFoto(),
            'U_ACTIVO' => $utilizador->getAtivo(),
            'U_FUNCAO' => $utilizador->getFuncao()
        );

        $this->bd->inserir($sql, $dados_utilizador);
    }

    function alterarPalavraPasse($palavraPasse, $id) {
        try {
            $instrucao = $LigacaoBD->prepare("UPDATE Utilizadores SET (U_palavraPasse = ? WHERE U_id = ?) VALUES (?, ?)");
            $instrucao->bind_param($palavraPasse, $id);
            $sucesso_funcao = $instrucao->execute();
            $instrucao->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($sucesso_funcao) {
            return "True";
        } else {
            return "False";
        }
    }

    function verDadosUtilizador($id) {
        try {
            $registo = $this->bd->query("SELECT * FROM Utilizadores WHERE U_ID = :U_ID", $id);
 
            if (isset($dados)) {
                $utilizador = new Utilizadores($registo["u_id"], $registo["u_nome"], $registo["u_numerofuncionario"], 
                                           $registo["u_nomeutilizador"], $registo["u_palavrapasse"], 
                                           $registo["u_tipoutilizador"], $registo["u_dataregisto"], 
                                           $registo["u_morada"], $registo["u_contatotelefonico"], 
                                           $registo["u_datanascimento"], $registo["u_funcao"],
                                           $registo["u_ativo"], $registo["u_fotografia"]);
                return $utilizador;
            }else{
                return NULL;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function obtemUtilizadorUsername($nomeUtilizador) {
        
        try {
            $user = array('U_USERNAME' => $nomeUtilizador);
            
            $registo = $this->bd->query("SELECT * FROM Utilizadores WHERE U_NOMEUTILIZADOR = :U_USERNAME", $user);
 
            if (!$registo == null) {
                $utilizador = new Utilizadores($registo["u_id"], $registo["u_nome"], $registo["u_numerofuncionario"], 
                                           $registo["u_nomeutilizador"], $registo["u_palavrapasse"], 
                                           $registo["u_tipoutilizador"], $registo["u_dataregisto"], 
                                           $registo["u_morada"], $registo["u_contatotelefonico"], 
                                           $registo["u_datanascimento"], $registo["u_funcao"],
                                           $registo["u_ativo"], $registo["u_fotografia"]);
                echo "aqui";
                return $utilizador;
            }else{
                return NULL;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

}

?>