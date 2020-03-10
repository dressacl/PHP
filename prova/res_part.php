<?php

$id_projeto = $_POST['id_projeto'];
$id_consultor = $_POST['id_consultor'];


include("conexao.php");

$sqlinsert = "INSERT INTO participantes (id_projeto,id_consultor) 
					VALUES ('$id_projeto','$id_consultor')";

mysqli_query($link, $sqlinsert);

$resultado = "Salvo com sucesso!!!";


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<div class="container-contact100">

		<div class="wrap-contact100">

				<span class="contact100-form-title">
					<?php echo $resultado; ?>
				</span>

		</div>
		</div>
</body>
</html>