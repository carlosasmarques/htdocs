<?php
include_once "Utentes.php";
include_once "../acessobd.php";

class DaoUtentes{

    private $bd;

    public function __construct() {
        $this->bd = new BaseDados();
    }
    
    public function adicionarUtente(Utentes $utente){
        $sql = "INSERT INTO `fmt`.`utentes` (`UT_nome`, `UT_morada`, `UT_contactoTelefonico`, "
                . "`UT_dataNascimento`, `UT_dataRegisto`, `UT_sns`, "
                . "`UT_ativo`, VALUES (:UT_nome, :UT_morada, "
                . ":UT_contactoTelefonico, :UT_dataNascimento, :UT_dataRegisto, "
                . ":UT_sns, :UT_ativo ";
        
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

    public function activarDesativarUtente($estado, $id){
		$dados = array(
			'UT_ACTIVO' => $estado,
			'UT_ID' => $id
		);
		$this->bd->editar("UPDATE `fmt`.`utentes` SET `UT_ACTIVO`=:UT_ACTIVO WHERE  `UT_ID`=:UT_ID;", $dados);
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
        
                $instrucao = $this->bd->query("SELECT * FROM utentes");
				
				for($i=0; $i<count($instrucao); $i++){
                	$dados[] = new Utentes($instrucao[$i]["UT_ID"],$instrucao[$i]["UT_NOME"],$instrucao[$i]["UT_SNS"],$instrucao[$i]["UT_MORADA"],$instrucao[$i]["UT_CONTACTOTELEFONICO"],$instrucao[$i]["UT_DATANASCIMENTO"],$instrucao[$i]["UT_DATAREGISTO"],$instrucao[$i]["UT_ACTIVO"]);
				}
            return $dados;

    }
}
?>