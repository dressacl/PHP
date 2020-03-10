<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "consultoria";

$link = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$link) {
	echo "Falha";
}

?>