<?php 

require_once("config.php");

$sql = new sql();
$usuario = $sql->select("SELECT * FROM tbatendentes ORDER BY idAtendente");


echo json_encode($usuario); 


?>