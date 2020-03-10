<?php
	session_start();
	$_SESSION['cadastrado'] = true;	
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Consultores</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
  	<link rel="stylesheet" type="text/css" href="estilo.css">

  	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

</head>
		
	<header>
       <nav class="nav nav-pills nav-fill" >
       	  <a class="nav-item nav-link" href="index.html">Início</a>
		  <a class="nav-item nav-link" href="empresa.php">Empresas</a>
		  <a class="nav-item nav-link" href="consultor.php">Consultores</a>
		  <a class="nav-item nav-link" href="projeto.php">Projetos</a>
		 
		</nav>	
	</header>	


<body>
	
	<div class="container caixa justify-content-center">
		<h3>Cadastro de Consultores</h3>
		<form form class="" action="res_cons.php" method="POST">

			<?php 
				

				if (isset($_SESSION["cadastrado"])) {

					if ($_SESSION["cadastrado"]) {
						echo '<div class="alert alert-success alert-dismissible fade show">
    						<button type="button" class="close" data-dismiss="alert">&times;</button>
    						<strong>Cadastro realizado com sucesso!!</strong>
  							</div>';
  						session_destroy();	
					}else{
						echo '<div class="alert alert-success" role="alert">
  							Ocorreu um erro durante o registo, por favor tente novamente</div>';
  						session_destroy();
  					}
				} 
			?>


			<div class="py-3" data-validate = "Nome do Consultor">
				<input class="form-control col-md-2" type="text" name="nome_con" placeholder="Nome do consultor">

			</div>


			<div class="py-3 " data-validate = "Nº de Identidade">
				<input class="form-control col-md-2" type="text" name="num_ident" placeholder="Nº de Identidade">
			</div>

			<div class="py-3 " data-validate = "Especialização">
				<input class="form-control col-md-2" type="text" name="especializacao" placeholder="Especialização">
			</div>

			<div class="py-3 " data-validate = "Horas Trabalhadas">
				<input class="form-control col-md-2" type="text" name="hrs_trab" placeholder="Horas Trabalhadas">
			</div>

			<div class="py-3 " data-validate = "Função">
				<input class="form-control col-md-2" type="text" name="funcao" placeholder="Função">
			</div>


			<input type="submit" value="Salvar" class="py-2 btn btn-light" >


		</form>
		<form class="form-inline">
			<div class="py-3 form-group input-group">
				<input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" id="pes_con">
				
			</div>


		</form>

		<table class="table table-hover" id="table_con">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">Nº Identidade</th>
					<th scope="col">Especialização</th>
					<th scope="col">Horas Trabalhadas</th>
					<th scope="col">Função</th>

				</tr>
			</thead>
			<tbody>

				<?php
					require("conexao.php");
					$sql = "SELECT * FROM consultor ORDER BY nome_con ASC";
					$busca = mysqli_query($link, $sql);
					while($resultado = mysqli_fetch_array($busca)){

					echo '     
					<tr>
					<th scope="row">'.$resultado['id_consultor'].'</th>
					<td>'.$resultado['nome_con'].'</td>
					<td>'.$resultado['num_ident'].'</td>
					<td>'.$resultado['especializacao'].'</td>
					<td>'.$resultado['hrs_trab'].'</td>
					<td>'.$resultado['funcao'].'</td>
					
					</tr> ';}

				?>


			</tbody>
		</table>
		<script>
    	$('input#pes_con').quicksearch('table#table_con tbody tr');
		</script>
	</div>
				

			
</body>
</html>