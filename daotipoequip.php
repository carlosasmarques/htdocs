<?php
    include "conf.php";
    class DaoTipoEquip{
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

        public function adicionaTipoEquip(TipoArtigos $tipoEquip){
           $sql = "INSERT INTO `fmt`.`tipo_artigo` (`TA_NOME`) VALUES (:TA_NOME);";
           
           $dados_tipoEquip = array('TA_NOME' => $tipoEquip->getNome());
           
           $this->bd->inserir($sql, $dados_tipoEquip);

        }

        public function listarTiposEquip(){
            
            $listar = new listar();
            try{
                $instrucao = $LigacaoBD->prepare("SELECT * FROM Tipo_Artigo");
                //Executar

                $sucesso_funcao = $instrucao->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            if($sucesso_funcao){
                $instrucao->setFetchMode(PDO::FETCH_ASSOC);
                while($registo = $instrucao->fetch()){
                    
                    $listar->setidTipoArtigos($registo["t_idTipoArtigos"]);
                    $listar->setnome($registo["t_nome"]);
                    
                    
                    $dados[] = $listar;
                }
                return $dados;
            } else {
                return NULL;
            }
        }

        function ativarDesativarTipoEquip($id, $ativo){
            try{
                $instrucao = $LigacaoBD->prepare("UPDATE TIPO_ARTIGO SET (TA_ativo) VALUES(?) WHERE TA_id = ?");
                $instrucao->bind_param($ativo, $id);
                //Executar

                $sucesso_funcao = $instrucao->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            if($sucesso_funcao){
                return "True";
            } else {
                return "False";
            }
        }
    }
?>