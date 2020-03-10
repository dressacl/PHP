<?php
session_start();

$nome_con = $_POST['nome_con'];
$num_ident = $_POST['num_ident'];
$especializacao = $_POST['especializacao'];
$hrs_trab = $_POST['hrs_trab'];
$funcao = $_POST['funcao'];


include("conexao.php");

$sqlinsert = "INSERT INTO consultor (id_consultor, nome_con,num_ident,especializacao,hrs_trab,funcao) 
					VALUES ('', '$nome_con','$num_ident','$especializacao','$hrs_trab','$funcao')";

mysqli_query($link, $sqlinsert);

if(mysqli_query($link, $sqlinsert)){
	$_SESSION['cadastrado'] = true;
  	header("location: consultor.php");   
   	exit();
}else{
	$_SESSION['cadastrado'] = false;
   	header("location: consultor.php");
}


?>
