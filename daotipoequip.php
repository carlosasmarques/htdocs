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

        public function adicionaTipoEquip($nome){
            try{
                $instrucao = $LigacaoBD->prepare("INSERT INTO Tipo_Artigo (
				TA_nome ) VALUES (?)");
                $instrucao->bind_param($nome);
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

        public function listarTiposEquip(){
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
                    $dados[] = $registo;
                }
                return $dados;
            } else {
                return NULL;
            }
        }
    }
?>