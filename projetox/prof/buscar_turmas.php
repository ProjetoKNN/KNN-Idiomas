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
		//Pega o código da turma através do GET.
		$turma = $_GET['cod'];

		//Faz a seleção do nome dos alunos de acordo com a turma em que foram matriculados.
		$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

		$res = mysqli_query($conexao, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			echo "<table>";
			echo "<tr>";
			echo "<td>".$r['NomeAluno']."</td><hr>";
			echo "<td>";
			echo "<form action='inserir_boletim.php' method='POST'>";
			echo "<input name='codAluno' type='hidden' value='".$r['CodAluno']."'>";
			echo "<button>Inserir Notas</button>";
			echo "</form>";
			echo "</td>";

			echo "<td>";
			echo "<form action='edita_boletim.php' method='POST'>";
			echo "<input name='cod' type='hidden' value='".$r['CodAluno']."'>";
			echo "<button>Editar Boletim</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
	?>
</body>
</html>