<?php  
	include("../conexao.php");
	mysqli_set_charset($conexao, "utf-8");
	date_default_timezone_set('America/Sao_Paulo');
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
		$turma = $_GET['cod']; 
		if(isset($_POST['inserir'])){
		$conteudo = $_POST['conteudo'];
		$dataaula = $_POST['dataaula'];

		$aula = mysqli_query($conexao,"INSERT INTO aulas(conteudo, dataaula, turma_cod) VALUES ('$conteudo','$dataaula', '$turma')");
		if(!$aula){
			header("location:index_prof.php?false");
			echo "Erro ao realizar cadastro da aula. Tente outra vez.";
			exit;
		}else{
			header("location:index_prof.php?true");
			echo "Cadastro concluído com sucesso!";
		}
	}

		

		//$sql = "SELECT * aulas where turma_cod = $turma";

		/*$res = mysqli_query($conexao, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			
		}*/
		echo "<a href='lancarfrequencia.php?cod=".$turma."'>"." <button>Lançar Frequência</button>"."</a><br>"
	?>

</body>
</html>