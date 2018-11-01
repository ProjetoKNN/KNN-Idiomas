<!DOCTYPE html>
<?php
	include("../conexao.php");
?>
<html>
<head>
	<title>Turma</title>
</head>
<body>
	<a href="index_prof.php"><button>Voltar</button></a>
	<?php
		include("../conexao.php");
		$turma = $_GET['cod'];

		$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

		$res = mysqli_query($conexao, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			echo "<table>";
			echo "<tr>";
			echo "<td>".$r['NomeAluno']."</td><hr>";
			echo "<td>";
			echo "<form action='edita_boletim.php' method='POST'>";
			echo "<input name='cod' type='hidden' value='".$r['CodAluno']."'>";
			echo "<button>Boletim</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
	?>

</body>
</html>