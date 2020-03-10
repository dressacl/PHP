<?php
session_start();

$data_in = $_POST['data_in'];
$data_ter = $_POST['data_ter'];
$valor = $_POST['valor'];
$id_empresa = $_POST['id_empresa'];



include("conexao.php");

$sqlinsert = "INSERT INTO projeto (id_projeto, data_in,data_ter,valor,id_empresa) 
					VALUES ('', '$data_in','$data_ter','$valor','$id_empresa')";

mysqli_query($link, $sqlinsert);

if(mysqli_query($link, $sqlinsert)){
	$_SESSION['cadastrado'] = true;
  	header("location: projeto.php");   
   	exit();
}else{
	$_SESSION['cadastrado'] = false;
   	header("location: projeto.php");
}

?>