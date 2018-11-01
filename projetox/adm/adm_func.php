<!DOCTYPE html>
<html>
<head>
	<title>Painel do Admnistrador</title>
	<meta charset="UTf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<style type="text/css">
        body{
            text-align: center;
        }
        table{							
        	border:1px solid;			
        	padding: 5px;
        }
        td{
            border: 1px solid lightgray;
            font-size: 1em;
            padding: 5px
        }
        button{
            padding: 5px
        }
    </style>
<body>
	<form action="../login_logout.php">
		<input type="submit" name="sair" value="Sair">
	</form>
	<h1>Bem-Vindo Administrador:</h1>
	<h3>Gerenciamento de Alunos:</h3>
	<div>
		<a href="inserir_al.php"><button>Inserir Aluno</button></a>
		<a href="buscar_al.php"><button>Buscar Alunos</button></a>
	</div>
	<div>
		<h3>Gerenciamento de Professores:</h3>
		<a href="inserir_prof.php"><button>Inserir Professor</button></a>
		<a href="buscar_prof.php"><button>Buscar Professores</button></a>
	</div><br>
	<div>
		<h3>Gerenciamento de Turma/Cursos:</h3>
		<a href="inserir_turm.php"><button>Inserir Turmas & Cursos</button></a>
		<a href="buscar_turm.php"><button>Buscar Turma</button></a>
		<a href="buscar_curso.php"><button>Buscar Curso</button></a>

	</div>
	<div>
		<h3>Gerenciamento de Matrículas:</h3>
		<a href="inserir_mat.php"><button>Inserir Matrícula</button></a>
		<a href="buscar_mat.php"><button>Buscar Matrículas</button></a>
	</div>
	<div>
		<h3>Gerenciamento de Pagamentos</h3>
		<a href="pagamentos.php"><button>Pagamentos</button></a>
	</div>
</body>
</html>