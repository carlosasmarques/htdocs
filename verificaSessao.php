<?php

$bd = new BaseDados();

if ($bd->contar("utilizadores") == 0){
    
    inserirAdministrador($administrador);
}

function inserirAdministrador(){
    
}

?>