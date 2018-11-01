<html>
	<?php 
		include("../conexao.php");
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
		</head>
		<body>
			<a href="index_prof.php"><button>Voltar</button></a>
				<?php 
					$CodAluno = filter_input(INPUT_POST, 'cod');
					echo "AQUI: ". $CodAluno;

					$sql = "SELECT * FROM boletim where aluno_cod = '$CodAluno'";

					$res = mysqli_query($conexao, $sql);

					while ($dados = mysqli_fetch_assoc($res)){
						
					}
				?>
			</form>
		</body>
</html>