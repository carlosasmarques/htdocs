<?php
include "conf.php";

class DaoEquipamento{
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

    function adicionarEquipamento($equipamento){
        try{
            $instrucao = $LigacaoBD->prepare("INSERT INTO EQUIPAMENTO (
				 TA_id , E_descricao, E_codigo, E_quantidadeDisponivel, E_quantidadeMinima, E_activo, E_precoCompra, E_dataCompra) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $instrucao->bind_param($equipamento->id, $equipamento->descricao, $equipamento->codigo,
            $equipamento->quantidadeDisponivel, $equipamento->quantidadeMinima, "True", $equipamento->precoCompra, $equipamento->dataCompra);
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

    function pesquisaEquipNome($descricao){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM EQUIPAMENTOS WHERE E_descricao = ?");
            $instrucao->bind_param($descricao);

            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            WHILE($registo = $instrucao->fetch()){
                $dados = $registo;
            }
            return $dados;
        }else{
            return NULL;
        }
    }

    function pesquisaEquipCodigo($codigo){
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM EQUIPAMENTOS WHERE E_codigo = ?");
            $instrucao->bind_param($codigo);

            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            WHILE($registo = $instrucao->fetch()){
                $dados = $registo;
            }
            return $dados;
        }else{
            return NULL;
        }
    }

    function pesquisaEquipTipo($tipoArtigo){
        $equipamento = new Equipamentos(0, 0, 0, 0, "", 0, "", true);
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM EQUIPAMENTOS WHERE TA_nome like ?");
            $instrucao->bind_param($tipoArtigo);

            $sucesso_funcao = $instrucao->execute();
            $instrucao->setFetchMode(PDO::FETCH_ASSOC);
            if($sucesso_funcao){
                WHILE($registo = $instrucao->fetch()){
                    $equipamento->setIdEquipamentos($registo["e_id"]);
                    $equipamento->setPreco($registo["e_preco"]);
                    $equipamento->setQuantidadeMinima($registo["e_qtMin"]);
                    $equipamento->setQuantidadeExistente($registo["e_qtExi"]);
                    $equipamento->setDescricao($registo["e_des"]);
                    $equipamento->setCodigo($registo["e_cod"]);
                    $equipamento->setData($registo["e_data"]);
                    $equipamento->setActivo($registo["e_act"]);
                    $dados[]=$equipamento;
                } 
            }else{
                return NULL;
            }

            return $dados;
            
  }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function editarEquipamento($equipamento){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE EQUIPAMENTOS SET (E_descricao, E_codigo, E_quantidadeDisponivel, E_quantidadeMinima, E_activo, E_precoCompra, E_dataCompra) WHERE E_id = ?");
            $instrucao->bind_param($equipamento->descricao, $equipamento->codigo, $equipamento->quantidadeDisponivel,
            $equipamento->quantidadeMinima, $equipamento->activo, $equipamento->precoCompra, $equipamento->dataCompra, $equipamento->id);

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

    function verEquipamento($id){
        $equipamento = new Equipamentos(0, 0, 0, 0, "", 0, "", true);
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM EQUIPAMENTOS WHERE E_id = ?");
            $instrucao->bind_param($id);
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
        WHILE($registo = $instrucao->fetch()){
                    $equipamento->setIdEquipamentos($registo["e_id"]);
                    $equipamento->setPreco($registo["e_preco"]);
                    $equipamento->setQuantidadeMinima($registo["e_qtMin"]);
                    $equipamento->setQuantidadeExistente($registo["e_qtExi"]);
                    $equipamento->setDescricao($registo["e_des"]);
                    $equipamento->setCodigo($registo["e_cod"]);
                    $equipamento->setData($registo["e_data"]);
                    $equipamento->setActivo($registo["e_act"]);   
                } 
            return $equipamento;
        }else{
            return NULL;
        }
    }

    function reporStockEquip($id, $quantidadeDisponivel){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE EQUIPAMENTOS SET (E_quantidadeDisponivel) VALUES(?) WHERE E_id = ?");
            $instrucao->bind_param($quantidadeDisponivel,$id);
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

    function activarDesativarEquip($id, $ativo){
        try{
            $instrucao = $LigacaoBD->prepare("UPDATE EQUIPAMENTOS SET (E_activo) VALUES(?) WHERE E_id = ?");
            $instrucao->bind_param($ativo,$id);
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

    function verificaStockEquip($id){
                
        $equipamento = new Equipamentos(0, 0, 0, 0, "", 0, "", true);
        try{
            $instrucao = $LigacaoBD->prepare("SELECT E_quantidadeDisponivel, E_descricao FROM EQUIPAMENTOS WHERE E_id = ?");
            $instrucao->bind_param($id);
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        if($sucesso_funcao){
            WHILE($registo = $instrucao->fetch()){
                    $equipamento->setIdEquipamentos($registo["e_id"]);
                    $equipamento->setQuantidadeExistente($registo["e_qtExi"]);
                    $equipamento->setDescricao($registo["e_des"]);
            }
            return $equipamento;
        }else{
            return NULL;
        }
    }

    function listarEquipamentos(){
        $equipamento = new Equipamentos(0, 0, 0, 0, "", 0, "", true);
        try{
            $instrucao = $LigacaoBD->prepare("SELECT * FROM EQUIPAMENTOS");
            $sucesso_funcao = $instrucao->execute();
            $instrucao->FETCH(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       if($sucesso_funcao){
                WHILE($registo = $instrucao->fetch()){
                    $equipamento->setIdEquipamentos($registo["e_id"]);
                    $equipamento->setPreco($registo["e_preco"]);
                    $equipamento->setQuantidadeMinima($registo["e_qtMin"]);
                    $equipamento->setQuantidadeExistente($registo["e_qtExi"]);
                    $equipamento->setDescricao($registo["e_des"]);
                    $equipamento->setCodigo($registo["e_cod"]);
                    $equipamento->setData($registo["e_data"]);
                    $equipamento->setActivo($registo["e_act"]);
                    $dados[]=$equipamento;
                } 
            }else{
                return NULL;
            }

            return $dados;

    }
}
?>