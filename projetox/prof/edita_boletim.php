<html>
	<?php 
		include("../conexao.php");
	?>
		<head>
			<title>Editar</title>
			<meta charset="utf-8">
		</head>
		<body>
			</form>
			<a href="buscar_turmas.php"><button>Voltar</button></a><br>
				<?php 
					$nota1 = filter_input(INPUT_POST, 'nota1');
					$nota2 = filter_input(INPUT_POST, 'nota2');
					$nota3 = filter_input(INPUT_POST, 'nota3');
					$nota4 = filter_input(INPUT_POST, 'nota4');
					$nota5 = filter_input(INPUT_POST, 'nota5');
					$nota6 = filter_input(INPUT_POST, 'nota6');
					$media = filter_input(INPUT_POST, 'media');
					$falta = filter_input(INPUT_POST, 'falta');
					$rep = filter_input(INPUT_POST, 'rep');
				?>
			</form>
			<form action="salva_boletim.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            Nota1:
            <input type="number" name="nota1" value="<?php echo $nota1; ?>"><br>
            Nota2:
            <input type="number" name="nota2" value="<?php echo $nota2; ?>"><br>
            Nota3:
            <input type="number" name="nota3" value="<?php echo $nota3; ?>"><br>
            Nota4:
            <input type="number" name="nota4" value="<?php echo $nota4; ?>"><br>
            Nota5:
            <input type="number" name="nota5" value="<?php echo $nota5; ?>"><br>
            Nota6:
            <input type="number" name="nota6" value="<?php echo $nota6; ?>"><br>
            Média:
            <input type="number" name="media" readonly="readonly" value="<?php echo $media; ?>"><br>
            Faltas:
            <input type="number" name="falta" readonly="readonly" value="<?php echo $falta; ?>"><br>
            Reposições:
            <input type="number" name="rep" readonly="readonly" value="<?php echo $rep; ?>"><br>
            <input type="submit" value="Salvar alterações">
		</body>
</html>