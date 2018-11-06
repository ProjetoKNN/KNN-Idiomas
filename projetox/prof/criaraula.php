<?php  
	include("../conexao.php");
	mysqli_set_charset($conexao, "utf-8");
	date_default_timezone_set('America/Sao_Paulo');
	session_start();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lançar Aula</title>
</head>
<body>
	<a href="index_prof.php"><button>Voltar</button></a>
	<form action="" method="POST">
		Conteudo:
		<input type="text" name="conteudo" placeholder="Insira o conteúdo da aula" required="true">
		<input type="date" name="dataaula">
		<input type="submit" name="inserir" value="INSERIR">
		<input type="reset" name="limpar" value="LIMPAR">

	</form>
	<?php
		//Pega o código da turma através do GET.
		$turma = $_GET['cod']; 
		if(isset($_POST['inserir'])){
			$conteudo = $_POST['conteudo'];
			$dataaula = $_POST['dataaula'];

			//Faz a seleção do último cod inserido na tabela aulas.
			$query1 = "SELECT MAX(cod) FROM aulas";

			$cod = mysqli_query($conexao, $query1);
			$codigo = mysqli_fetch_assoc($cod);

			//Cria um AI manual.
			$num = $codigo['MAX(cod)']+1;

			//Faz a inserção da aula na tabela aulas contida no BD.
			$query = "INSERT INTO aulas(cod, conteudo, dataaula, turma_cod) VALUES ('$num','$conteudo','$dataaula', '$turma')";
			$aula = mysqli_query($conexao, $query);

				if(!$aula){
					header("location:index_prof.php?false");
					echo "Erro ao realizar cadastro da aula. Tente outra vez.";
					exit;
				}
		}
		//Manda o código da aula que foi inserida e o código da turma através de GET.
		echo "<a href='lancarfrequencia.php?cod=".$num."&codt=".$turma."'>"." <button>Lançar Frequência</button>"."</a><br>"
	?>
</body>
</html>