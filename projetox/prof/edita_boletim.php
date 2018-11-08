<html>
	<?php 
		include("../conexao.php");
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
		</head>
		<body>
			<a href="buscar_turmas.php"><button>Voltar</button></a><br>
				<?php 
					$CodAluno = filter_input(INPUT_POST, 'cod');

					$sql = "SELECT * FROM boletim where aluno_cod = '$CodAluno'";

					$res = mysqli_query($conexao, $sql);

					while ($dados = mysqli_fetch_assoc($res)){
						for($i = 1; $i <= 6; $i++)
						{
	        				//Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
	        				if($dados['nota'.$i] != "")
	        				{
	        					echo "Nota".$i.": ".$dados['nota'.$i]."<br>";
	        				}
	        			}
						
					}
				?>
			</form>
		</body>
</html>