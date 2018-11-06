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
		//Pega o cod do aluno da INDEX através de um SESSION.
		$CodAluno = $_SESSION['CodAluno'];

		$sql = "SELECT * FROM boletim where aluno_cod = $CodAluno";

		$consulta = mysqli_query($conexao, $sql);
			if(!$consulta)
			{
	            echo "Erro ao realizar consulta. Tente outra vez.";
	           	exit;
	        }
	        while($dados = mysqli_fetch_assoc($consulta))
	        {
	        	//Utiliza de um for para rodar as notas contidas no banco de dados do aluno.
	        	for($i = 1; $i <= 6; $i++){
	        		//Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
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