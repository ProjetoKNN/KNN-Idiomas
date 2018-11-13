<?php
	include_once("../conexao.php");
	session_start();

	//Coloca o código da turma e da aula que foram passados pela SESSION dentro de variáveis.
	$turma = $_SESSION['turmita'];
	$aula = $_SESSION['aulita'];

	$queryAluno = "SELECT aluno.cod FROM aluno";

	$result = mysqli_query($conexao, $queryAluno);

	while($r = mysqli_fetch_assoc($result))
	{
		//Pega o código do aluno e o número 1 ou 0, que significa se ele faltou ou não, sendo 1 = FALTOU e 0 = PRESENTE.
		$codAl = $r['cod'];
		$faluno = $_POST[$codAl];
		
		if(isset($faluno))
		{
			//Faz a inserção na tabela frequência, passando o aluno, a aula de hoje, e a situação da presença dele.
			$query = mysqli_query($conexao, "INSERT INTO frequencia (aluno_cod, aulas_cod, falta) VALUES('$codAl','$aula', '$faluno')");
			header("location:criaraula.php");
		}
	}



?>