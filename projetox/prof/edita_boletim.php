<html>
	<?php 
		include("../conexao.php");
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
		</head>
		<body>
			<a href="buscar_turmas.php"><button>Voltar</button></a>
				<?php 
					$CodAluno = filter_input(INPUT_POST, 'cod');

					$sql = "SELECT * FROM boletim where aluno_cod = '$CodAluno'";

					$res = mysqli_query($conexao, $sql);

					while ($dados = mysqli_fetch_assoc($res)){
						echo "Nota 1 ".$dados['nota1'];
					}
				?>
			</form>
		</body>
</html>