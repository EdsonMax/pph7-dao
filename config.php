<?php 
spl_autoload_register(function($nameClass){

//$dirClass = "Sql";
	$filename =$nameClass .".php"; //$dirClass . DIRECTORY_SEPARATOR . $nameClass .".php";

 	if(file_exists(($filename))){

 	require_once ($filename);
 }
});



?>