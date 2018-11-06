<html>
	<?php 
		include("../conexao.php");
		session_start();
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
		</head>
		<body>
			<a href="buscar_turmas.php"><button>Voltar</button></a>
			<form action="" method="POST">
				<input type="submit" name="inserir" value="INSERIR">
				<input type="reset" name="limpar" value="LIMPAR"><br>
				Nota 1:
					<input type="number" name="nota1" placeholder="Insira a nota">
				Nota 2:
					<input type="number" name="nota2" placeholder="Insira a nota">
				Nota 3:
					<input type="number" name="nota3" placeholder="Insira a nota"><br><br>	
				Nota 4:
					<input type="number" name="nota4" placeholder="Insira a nota">
				Nota 5:
					<input type="number" name="nota5" placeholder="Insira a nota">
				Nota 6:
					<input type="number" name="nota6" placeholder="Insira a nota">
				Reposição:
					<input type="number" name="reposicao" placeholder="Reposição">
			</form>
				<?php 
					if(isset($_POST['inserir'])){
						$cod = filter_input(INPUT_POST, 'codAluno');
						$media = 0;
						$nota1 = filter_input(INPUT_POST, 'nota1');
						$nota2 = filter_input(INPUT_POST, 'nota2');
						$nota3 = filter_input(INPUT_POST, 'nota3');
						$nota4 = filter_input(INPUT_POST, 'nota4');
						$nota5 = filter_input(INPUT_POST, 'nota5');
						$nota6 = filter_input(INPUT_POST, 'nota6');
						$rep = filter_input(INPUT_POST, 'reposicao');
						$contfalta = 0;
						echo "AQUI PORRA ".$cod;

						$sql = "SELECT falta FROM frequencia where aluno_cod = $cod";

						$consulta = mysqli_query($conexao, $sql);

							while($dados = mysqli_fetch_assoc($consulta))
							{
								if($dados['falta'] == 1){
									$contfalta = $contfalta + 1;
								}
							}
							echo "AQUI ".$contfalta;

						$notas = mysqli_query($conexao, "INSERT INTO boletim (falta, nota1, nota2, nota3, nota4, nota5, nota6, media, reposicao, aluno_cod) VALUES('$contfalta', '$nota1', '$nota2', '$nota3', '$nota4', '$nota5', '$nota6', '$media', '$rep', $cod)");
					}
				?>
			</form>
		</body>
</html>