<?php
	include_once("../conexao.php");
	session_start();

	$turma = $_SESSION['turmita'];
	$aula = $_SESSION['aulita'];

	echo "TURMA".$turma;
	echo "<br>AULA".$aula;

	$queryAluno = "SELECT aluno.cod FROM aluno";

	$result = mysqli_query($conexao, $queryAluno);

	while($r = mysqli_fetch_assoc($result))
	{
		$codAl = $r['cod'];
		$faluno = $_POST[$codAl];
		
		echo "<br>Cod Aluno".$codAl;
		echo "<br>Cod falta".$faluno;
		if(isset($faluno))
		{
			$query = mysqli_query($conexao, "INSERT INTO frequencia (aluno_cod, aulas_cod, falta) VALUES('$codAl','$aula', '$faluno')");
			header("location:index_prof.php");
		}
	}



?>