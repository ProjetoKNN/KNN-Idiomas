<!DOCTYPE html>
<html>
<head>
	<title>Boletim</title>
</head>
<body>
	<form action="index_aluno.php">
		<input type="submit" name="voltar" value="Voltar">
	</form>
	<?php
		include("../conexao.php");
		session_start();
		$teste = $_SESSION['CodAluno'];

		$sql = "SELECT * FROM boletim where aluno_cod = $teste";

		$consulta = mysqli_query($conexao, $sql);
			if(!$consulta)
			{
	            echo "Erro ao realizar consulta. Tente outra vez.";
	           	exit;
	        }
	        while($dados = mysqli_fetch_assoc($consulta))
	        {
	        	for($i = 1; $i <= 6; $i++){
	        		if($dados['nota'.$i] != ""){
	        			echo "Nota".$i.": ".$dados['nota'.$i]."<br>";
	        		}
	        	}
	        	echo "Faltas: ".$dados['falta']."<br>";
	        	echo "Reposições: ".$dados['reposicao']."<br>";
	        }

	?>
</body>
</html>