<PHP
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
	<form action="frequencia.php" method="POST">
		<input type="submit" name="inserir" value="INSERIR">
		<input type="reset" name="limpar" value="LIMPAR">

		<?php
			include("../conexao.php");
			session_start();

			//$turma = $_GET['codt'];
			//$aula = $_GET['cod'];

			$_SESSION['aulita'] = $_GET['cod'];
			$_SESSION['turmita'] = $_GET['codt'];
			$turma = $_SESSION['turmita'];

			$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno from aluno inner join matricula on matricula.turma_cod = $turma AND matricula.aluno_cod = aluno.cod ";

			$res = mysqli_query($conexao, $sql);

			//echo "<br><tr><td><label name ='turma'>".$turma."</label></td></tr><br>";
			//echo "<tr><td><label name ='aula'>".$aula."</label></td></tr><br>";
			echo "<tr>";
			//echo "<tr><td>Aluno</td><td>Lista de chamada</td></tr>";
			echo "<table>";
			while ($r = mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>".$r['NomeAluno']."</td>";
				echo "<td>"."Presente <input type='radio' name='".$r['CodAluno']."' value=1>"."<br>Faltou <input type='radio' 	name='".$r['CodAluno']."' value=0> "."</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</form>

</body>
</html>