<?php
include_once "conf.php";
include_once "acessobd.php";
include_once "Utentes.php";

class DaoUtentes{

    private $LigacaoBD;

    public function __construct() {
        $LigacaoBD = new BaseDados();
    }

    public function adicionarUtente($utente){
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
        
        $pesquisar = new pesquisar();
        
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
                $pesquisar->setidUtentes($registo["t_idUtentes"]);
                $pesquisar->setnome($registo["t_nome"]);
                $pesquisar->setnumeroSNS($registo["t_numeroSNS"]);
                $pesquisar->setmorada($registo["t_morada"]);
                $pesquisar->settelefone($registo["t_telefone"]);
                $pesquisar->setdataNascimento($registo["t_dataNascimento"]);
                $pesquisar->setdataRegisto($registo["t_dataRegisto"]);
            
            return $pesquisar;
        } else {
            return NULL;
        }
    }

    public function pesquisarUtenteNumero($sns){
        
        $pesquisarutente = new pesquisarutente();
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
            
                $pesquisarutente->setidUtentes($registo["t_idUtentes"]);
                $pesquisarutente->setnome($registo["t_nome"]);
                $pesquisarutente->setnumeroSNS($registo["t_numeroSNS"]);
                $pesquisarutente->setmorada($registo["t_morada"]);
                $pesquisarutente->settelefone($registo["t_telefone"]);
                $pesquisarutente->setdataNascimento($registo["t_dataNascimento"]);
                $pesquisarutente->setdataRegisto($registo["t_dataRegisto"]);
            
            
            return $pesquisarutente;
        } else {
            return NULL;
        }
    }

    function verUtente($id){
       
        $ver = new ver();
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM Utentes WHERE UT_id = ?");
            $instrucao->bind_param($id);
            $sucesso_funcao = $instrucao->execute();
            if($sucesso_funcao){
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                while($registo = $instrucao->fetch()){
                    
                    $ver->setidUtentes($registo["t_idUtentes"]);
                    $ver->setnome($registo["t_nome"]);
                    $ver->setnumeroSNS($registo["t_numeroSNS"]);
                    $ver->setmorada($registo["t_morada"]);
                    $ver->settelefone($registo["t_telefone"]);
                    $ver->setdataNascimento($registo["t_dataNascimento"]);
                    $ver->setdataRegisto($registo["t_dataRegisto"]);
                    
                    return $ver;
                }
            } else {
                return NULL;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarUtentes(){
        
        $listar = new listar();
        
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
                
                    $listar->setidUtentes($registo["t_idUtentes"]);
                    $listar->setnome($registo["t_nome"]);
                    $listar->setnumeroSNS($registo["t_numeroSNS"]);
                    $listar->setmorada($registo["t_morada"]);
                    $listar->settelefone($registo["t_telefone"]);
                    $listar->setdataNascimento($registo["t_dataNascimento"]);
                    $listar->setdataRegisto($registo["t_dataRegisto"]);
                
                $dados[] = $listar;
            }
            return $dados;
        } else {
            return NULL;
        }
    }
}
?>