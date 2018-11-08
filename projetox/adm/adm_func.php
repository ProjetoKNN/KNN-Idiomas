<!DOCTYPE html>
<html>
<head>
	<title>Painel do Admnistrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
	<nav>
		<a id="bv"><h1>Bem-Vindo Administrador</h1></a>		

		<form action="../login_logout.php" id="sair">
			<input type="submit" name="sair" value="Sair" class="btn btn-info">
		</form>
	</nav>
<body>
	<div class="container-fluid" id="divprincipal" >	
		<div>
			<div>
				<a href="buscar_al.php"><button type="button"><b>Controle de Alunos</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_prof.php"><button type="button"><b>Controle de Professores</button></a>
				<hr>
			</div>
			<h3>Gerenciamento de Turma/Cursos:</h3>
			<div>
				<a href="inserir_turm.php"><button type="button"><b>Inserir Turmas & Cursos</button></a>
				<a href="buscar_turm.php"><button type="button""><b>Buscar Turma</button></a>
				<a href="buscar_curso.php"><button type="button""><b>Buscar Curso</button></a>
				<hr>
			</div>
			<h3>Gerenciamento de Matrículas:</h3>
			<div>
				<a href="inserir_mat.php"><button  type="button"><b>Inserir Matrícula</button></a>
				<a href="buscar_mat.php"><button type="button"><b>Buscar Matrículas</button></a>
			</div>
		</div>
	</div>
	<script src="jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>