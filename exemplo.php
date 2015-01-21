<?php
/**
* Vai editar os dados do educador pelo id
*/
public function EditaEducador($educador, $id) {

$nome = $educador->getNome();
$email = $educador->getEmail();
$contacto = $educador->getContacto();

$sql = "update educadores
set E_NOME = '$nome', E_EMAIL = '$email', E_CONTACTO = '$contacto',
E_DATAREGISTO = sysdate()
WHERE E_ID = '$id'";

$resultado = $this->basedados->query($sql);

if (!$resultado){
return -1;
}
}
?>