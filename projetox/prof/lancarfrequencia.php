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
			echo "<td>";
			echo "<form action='' method='POST'";
			echo "<td>"."Presente <input type='radio' name='opcao' value='Presente'>"."<br>Faltou <input type='radio' name='opcao' value='Faltou'> "."</td>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}

	?>

</body>
</html>