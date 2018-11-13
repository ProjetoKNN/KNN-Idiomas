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
		session_start();
		//Pega o código da turma através do GET.
		//$turma = $_GET['cod'];

		$_SESSION['turmona'] = $_GET['cod'];

		$turma = $_SESSION['turmona'];


		//Faz a seleção do nome dos alunos de acordo com a turma em que foram matriculados.
		$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

		$res = mysqli_query($conexao, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			echo "<table>";
			echo "<tr>";
			echo "<td>".$r['NomeAluno']."</td><hr>";
			echo "<td>";
			echo "<form action='inserir_boletim.php' method='POST'>";
			echo "<input name='cod' type='hidden' value='".$r['CodAluno']."'>";
			echo "<button>Inserir Notas</button>";
			echo "</form>";
			echo "</td>";
			$CodAluno = $r['CodAluno'];
		}

			$sql = "SELECT * FROM boletim where aluno_cod = '$CodAluno'";

			$res = mysqli_query($conexao, $sql);

				while ($dados = mysqli_fetch_assoc($res))
				{
					for($i = 1; $i <= 6; $i++)
					{
	        			//Utiliza de um if para checar se essa nota existe no BD, caso não exista, não irá mostrar nada, apenas as existentes.
	        			if($dados['nota'.$i] != "")
	        			{
							echo "<form action='edita_boletim.php' method='POST'>";
							echo "<input name='nota".$i."' type='hidden' value='".$dados['nota'.$i]."'>";
							
	        			}
	        		}
	        		echo "<input name='media' type='hidden' value='".$dados['media']."'>";
	        		echo "<input name='falta' type='hidden' value='".$dados['falta']."'>";
	        		echo "<input name='rep' type='hidden' value='".$dados['reposicao']."'>";
	        		echo "<button>Visualizar Boletim</button>";
					echo "</form>";	
				}

		
	?>
</body>
</html>