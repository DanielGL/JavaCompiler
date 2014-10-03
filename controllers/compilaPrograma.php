<?php
require_once ('../models/Programa.php');
//Verificación de datos
if(isset($_POST["source_code"])){
	//Leer los datos y asignarlos a la clase programa
	$codigo = $_POST["source_code"];
	(isset($_POST["params"]))? $param = $_POST["params"] : $param = "";

	$program = new Programa($codigo, $param);

	if ($codigo == null){
		echo "<script language='javascript'>
			  alert('No se han insertado datos');
			  </script>";
	}
	else {
		$program->crear_java();
		$program->compilar();
	}
}

include_once("../views/compilaPrograma.php");

?>