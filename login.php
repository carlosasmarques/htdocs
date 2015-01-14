<?php
include ("./acessoBd.php");

if (empty($_POST["username"]) && empty($_POST["password"])) {
    echo "<h2 id='red'>Tem de introduzir no formulário
            de Login o seu Username e a sua password.</h2>";
    echo ("<h2 id='red'>Tente novamente.");
} else {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //abrir ligação à base de dados
    $db = new BaseDados();

    //objecto de acesso aos dados
    $a = new GereAdministracao($db);
   
    function obtemUtilizadorUsername($user){
        
        $daoutilizador = new DaoUtilizador();
        if($utilizador = $daoutilizador->verDadosUtilizador($user)!= NULL){
            return $utilizador;
        } else {
            return NULL;
        }
    }
      
    //carrega o utilizador com o username dado
    $z = $a->obtemUtilizadorUsername($username);
     
    //verifica se foi carregado alguma coisa na variável
    if ($z < 0){
        include_once 'index.php';
        echo ("<h2 id='red'>Não há nenhum utilizador com esse username.</h2>");
        echo ("<h2 id='red'>Tente novamente.</h2>");
    }else{
        foreach ($a->getUtilizador() as $utilizador) {
            $u = $utilizador->getUsername();
            $p = $utilizador->getPassword();
            $t = $utilizador->getTipoUtilizador();
        }
        //verifica se o username que veio da base de dados é igual ao inserido
        if ($u != $username){
            echo ("<h2 class='text-center'>Não há nenhum utilizador com esse username.</h2>");
            echo ("<h2 class='text-center'>Tente novamente.</h2>");
            include_once ("./index.php");      
        }elseif($p == $password){
            if (!strcmp($t, "Administrador")){
                $_SESSION["user"] = $u;
                include ("./admin/inicial.php");
            }
            if (!strcmp($t, "Funcionario")){  
                $_SESSION["user"] = $u; 
                include ("./inicial.php");
            }  
        }else{
            include_once 'index.php';
            echo ("<h2 id='red'>A password que introduziu está incorrecta.</h2>");
            echo ("<h2 id='red'>Tente novamente.");
        }
    }
}

?>