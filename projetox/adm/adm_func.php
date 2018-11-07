<!DOCTYPE html>
<html>
<head>
	<title>Painel do Admnistrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estiloadm.css">	
</head>
<body>
	<div class="container-fluid" id="nha">
			<form action="../login_logout.php">
				<input type="submit" name="sair" value="Sair" class="btn btn-info">
			</form>
	</div>
	<div class="container" id="a">
		
		<h1 id="b">Bem-Vindo Administrador:</h1><hr>
		<div>
			<h3>Gerenciamento de Alunos:</h3>
			<div>
				<a href="inserir_al.php"><button type="button" class="btn btn-info"><b>Inserir Aluno</button></a>
				<a href="buscar_al.php"><button type="button" class="btn btn-info"><b>Buscar Alunos</button></a>
				<hr>
			</div>
			<h3>Gerenciamento de Professores:</h3>
			<div>
				<a href="inserir_prof.php"><button type="button" class="btn btn-info"><b>Inserir Professor</button></a>
				<a href="buscar_prof.php"><button type="button" class="btn btn-info"><b>Buscar Professores</button></a>
				<hr>
			</div>
			<h3>Gerenciamento de Turma/Cursos:</h3>
			<div>
				<a href="inserir_turm.php"><button type="button" class="btn btn-info"><b>Inserir Turmas & Cursos</button></a>
				<a href="buscar_turm.php"><button type="button" class="btn btn-info"><b>Buscar Turma</button></a>
				<a href="buscar_curso.php"><button type="button" class="btn btn-info"><b>Buscar Curso</button></a>
				<hr>
			</div>
			<h3>Gerenciamento de Matrículas:</h3>
			<div>
				<a href="inserir_mat.php"><button  type="button" class="btn btn-info"><b>Inserir Matrícula</button></a>
				<a href="buscar_mat.php"><button type="button" class="btn btn-info"><b>Buscar Matrículas</button></a>
			</div>

		</div>

	</div>

	<script src="jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>