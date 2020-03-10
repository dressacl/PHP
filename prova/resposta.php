<?php
session_start();

$end_emp = $_POST['end_emp'];
$nome_emp = $_POST['nome_emp'];

include("conexao.php");

$sqlinsert = "INSERT INTO empresa (id_empresa, end_emp, nome_emp) 
					VALUES ('', '$end_emp','$nome_emp')";

if(mysqli_query($link, $sqlinsert)){
	$_SESSION['cadastrado'] = true;
  	header("location: empresa.php");   
   	exit();
}else{
	$_SESSION['cadastrado'] = false;
   	header("location: empresa.php");
}

?>
