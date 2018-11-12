<!DOCTYPE html>
	<?php
	include("../conexao.php");
	?>
<html>
	<head>
		<title>Inserção de Cursos & Turmas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<?php 
			$consCurs = mysqli_query($conexao,"SELECT * FROM curso");
			$consProf = mysqli_query($conexao,"SELECT * FROM professor");
			if( !$consProf ){
				echo "Erro ao realizar consulta. Tente outra vez.";
				exit;
			}
			if(!$consCurs){
				echo "Erro ao realizar consulta. Tente outra vez.";
				exit;
			}
		?>
		<a href="buscar_turm.php"><button>Voltar</button></a>
		<h2>Inserção de Cursos:</h2>
		<form method="POST">
			Nome do curso:
			<input type="text" name="nomecurso">
			<input type="submit" name="curso" value="INSERIR">
		</form>
		<h2>Inserção de Turmas:</h2>
		<form method="POST"id="cursoTurm">
			Nome da turma:
			<input type="text" name="nome" required="true">
			Quantidade de alunos:
			<input type="text" name="qtd" maxlength="2" required="true"><br>
				Professor:
				<select name="codProf" form="cursoTurm">
					<?php
					while($prof = mysqli_fetch_assoc($consProf)){
						echo "<option value=".$prof['cod'].">".$prof['nome']."</option>";
					}
					?>
				</select>
			Curso:
			<select name="codCurso" form="cursoTurm">
				<?php
					while($curs = mysqli_fetch_assoc($consCurs)){
						echo "<option value=".$curs['cod'].">".$curs['nome']."</option>";
					}
				?>
			</select><br>
			<input type="submit" name="turma" value="INSERIR">
		</form>
	</body>
</html>
<?php
	if(isset($_POST['curso'])){
		$nomecurso = $_POST['nomecurso'];

		$curso = mysqli_query($conexao,"INSERT INTO curso(nome) VALUES ('$nomecurso') ");

		if(!$curso){
			header("location:inserir_turm.php?insercaoC=false");
			echo "Erro ao realizar cadastro. Tente outra vez.";
			exit;
		}else{
			header("location:inserir_turm.php?insercaoC=true");
			echo "Cadastro concluído com sucesso!";
		}
	}

	if(isset($_POST['turma'])){
		$nome = $_POST['nome'];
		$codProf = $_POST['codProf'];
		$qtd = $_POST['qtd'];
		$curso_cod = $_POST['codCurso'];
		$turma = mysqli_query($conexao,"INSERT INTO turma (nome, codProf, qtd, curso_cod) VALUES ('$nome', '$codProf', '$qtd', '$curso_cod')");
		if( !$turma ){
			header("location:inserir_turm.php?insercao=false");
			echo "Erro ao realizar cadastro. Tente outra vez.";
			exit;
		}else{
			header("location:inserir_turm.php?insercao=true");
			echo "Cadastro concluído com sucesso!";
		}
	}
?>