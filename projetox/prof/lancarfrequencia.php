<!DOCTYPE html>
<html>
<head>
	<title>Lançar Aula</title>
</head>
<style type="text/css">
        *{
            margin: 0;
            padding: 0;

        }
        table{
            border:1px solid;
            padding: 5px;
        }
        td{
            border: 1px solid lightgray;
            font-size: 1em;
            padding: 5px
        }
        button{
            padding: 5px
        }
        </style>
<body>
	<a href="criaraula.php"><button>Voltar</button></a>
	<form action="" method="POST">
		<input type="submit" name="inserir" value="INSERIR">
		<input type="reset" name="limpar" value="LIMPAR">

	</form>
	<?php
		include("../conexao.php");
		$turma = $_GET['cod'];

		$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

		$res = mysqli_query($conexao, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			echo "<table>";
			echo "<tr><td>Aluno</td><td>Lista de chamada</td></tr>";
			echo "<tr>";
			echo "<td>".$r['NomeAluno']."</td>";
			$teste = $r['CodAluno'];
			echo "<td>";
			echo "<form action='' method='POST'";
			echo "<td>"."Presente <input type='radio' name='opcao' value='true'>"."<br>Faltou <input type='radio' name='opcao' value='false'> "."</td>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			
			if(isset($_POST['inserir'])){
				$falta = filter_input(INPUT_POST, 'opcao');
				//$contfalta = 0;

				if($falta['opcao'] == 'true'){
					$contfalta = $contfalta + 1;
				}else{

				}

				echo $falta;

				$frequencia = mysqli_query($conexao, "INSERT INTO frequencia(aluno_cod, aulas_cod, falta) VALUES('$teste','$', '$')");

				if(!$frequencia){
					header("location:criaraula.php?false");
					echo "Erro ao realizar cadastro da aula. Tente outra vez.";
					exit;
				}else{
					header("location:criaraula.php?true");
				}
			}

		}
	?>

</body>
</html>