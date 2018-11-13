<!DOCTYPE html>
<html>
<head>
	<title>Painel do Admnistrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
	
<body class="admFunc">
	<nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
		<div class="container">
			<a class="navbar-brand" id="bv">Bem-vindo, Administrador</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSite">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
							Controles
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="buscar_al.php">Controle de Alunos</a>
							<a class="dropdown-item" href="#">Controle de Professores</a>
							<a class="dropdown-item" href="#">Controle de Turmas</a>
							<a class="dropdown-item" href="#">Controle de Cursos</a>
							<a class="dropdown-item" href="#">Controle de Matrículas</a>
						</div>
					</li>
				</ul>	
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="../login_logout.php" class="nav-link" name="sair">Sair</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="divprincipal" >	
		<div>
			<div>
				<a href="buscar_al.php"><button class="b" type="button">Controle de Alunos</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_prof.php"><button class="b" type="button">Controle de Professores</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_turm.php"><button class="b" type="button"">Controle de Turmas</button></a>
				
				<hr>
			</div>
			<div>
				<a href="buscar_curso.php"><button class="b" type="button"">Controle de Cursos</button></a>
				<hr>
			</div>
			<div>
				<a href="buscar_mat.php"><button class="b" type="button">Controle de Matrículas</button></a>
			</div>
		</div>
	</div>
	<script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>