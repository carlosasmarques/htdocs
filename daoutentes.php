<?php
include_once "conf.php";
include_once "Utentes.php";

class DaoUtentes{

    private $LigacaoBD=null;

    public function __construct() {
	global $conf_servidor;
        global $conf_bd;
        global $conf_user;
        global $conf_pass;
        
		try{
            $this->LigacaoBD = new PDO("mysql:host=$conf_servidor;dbname=$conf_bd", $conf_user, $conf_pass);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        return true;
    }
    function __destruct(){
        $this->LigacaoBD == null;
    }
	
    public function adicionarUtente(utentes $utente){
        $sql = "INSERT INTO `fmt`.`utentes` (`UT_nome`, `UT_morada`, `UT_contactoTelefonico`, "
                . "`UT_dataNascimento`, `UT_dataRegisto`, `UT_sns`, "
                . "`UT_ativo`,`UT_CONTACTOTELEFONICO`, VALUES (:UT_nome, :UT_morada, "
                . ":UT_contactoTelefonico, :UT_dataNascimento, :UT_dataRegisto, "
                . ":UT_sns, :UT_ativo,:UT_CONTACTOTELEFONICO ";
        
        $dados_utentes = array(
				'UT_nome' => $utente->getNome(),
				'UT_morada' => $utente->getMorada(),
				'UT_contactoTelefonico' => $utente->getTelefone(),
				'UT_dataNascimento' => $utente->getDataNascimento(),
				'UT_dataRegisto' => $utente->getDataRegisto(),
				'UT_sns' => $utente->getNumeroSNS(),
				'UT_ativo' => $utente->getAtivo()
                );
        $this->bd->inserir($sql, $dados_utentes);
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
		$dados = array();
        
        try{
            $instrucao = $this->LigacaoBD->prepare("SELECT * FROM utentes");
            //Executar
			$instrucao->setFetchMode(PDO::FETCH_ASSOC);
           
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($instrucao->execute()){
            
            while($registo = $instrucao->fetch()){
                	$dados[] = new Utentes($registo["UT_ID"],$registo["UT_NOME"],$registo["UT_SNS"],$registo["UT_MORADA"],$registo["UT_CONTACTOTELEFONICO"],$registo["UT_DATANASCIMENTO"],$registo["UT_DATAREGISTO"],$registo["UT_ACTIVO"]);

                    /*$listar->setidUtentes($registo["t_idUtentes"]);
                    $listar->setnome($registo["t_nome"]);
                    $listar->setnumeroSNS($registo["t_numeroSNS"]);
                    $listar->setmorada($registo["t_morada"]);
                    $listar->settelefone($registo["t_telefone"]);
                    $listar->setdataNascimento($registo["t_dataNascimento"]);
                    $listar->setdataRegisto($registo["t_dataRegisto"]);
                
                $dados[] = $listar;*/
            }
            return $dados;
        } else {
            return NULL;
        }
    }
}
?>