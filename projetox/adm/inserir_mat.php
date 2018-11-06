<?php
	include("../conexao.php");
	date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Matrícula</title>
	</head>
	<?php
		//Busca feita para ser utilizada no <select>
		$consAl = mysqli_query($conexao,"SELECT * FROM aluno");
		$consTurm = mysqli_query($conexao,"SELECT * FROM turma");
		$consCurs = mysqli_query($conexao,"SELECT * FROM curso");
		if(!$consCurs){
	    	echo "Erro ao realizar consulta. Tente outra vez.";
	    	exit;
	    }

		if(!$consAl){
	        echo "Erro ao realizar consulta. Tente outra vez.";
	        exit;
	    }
	    if(!$consTurm){
	        echo "Erro ao realizar consulta. Tente outra vez.";
	        exit;
	    }
	?>
	<body>
			<a href="adm_func.php"><button>Voltar</button></a>
			<h1>Matriculando um aluno:</h1>
		<form method="POST">
			Data Matrícula:
			<input type='text' value='<?php echo date("d/m/Y"); ?>' readonly="true"><br>
				Aluno:
				<select name="alunin">
					<?php
						while($alun = mysqli_fetch_assoc($consAl)){
						echo "<option value=".$alun['cod'].">".$alun['nome']."</option>";
					}
					?>
				</select>
				Turma:
				<select name="turmin">
					<?php
						while($turm = mysqli_fetch_assoc($consTurm)){
						echo "<option value=".$turm['cod'].">".$turm['nome']."</option>";
					}
					?>
				</select>
				Curso:
				<select name="cursin">
					<?php
						while($curs = mysqli_fetch_assoc($consCurs)){
							echo "<option value=".$curs['nome'].">".$curs['nome']."</option>";
						}
					?>
				</select><br>
			Data de Pagamento:
			<input type="date" name="data" required="true">
			<input type="submit" name="inserir_mat" value="INSERIR">
		</form>
	</body>
</html>
<?php
	//Pega os dados inseridos no formulário acima e os coloca em uma variável.
	if(isset($_POST['inserir_mat'])){
		$dataMat = date("Y/m/d");
    	str_replace('/','-',$dataMat);
    	$aluno = $_POST['alunin'];
    	$turma = $_POST['turmin'];
    	$curso = $_POST['cursin'];
    	$datapag = $_POST['data'];

    	//Pega os dados digitados e insere na tabela "matricula" contida no BD.
    	$mat = mysqli_query($conexao,"INSERT INTO matricula(datamatricula, aluno_cod, turma_cod, curso, datapagamento) VALUES ('$dataMat','$aluno','$turma','$curso','$datapag')");
    	if(!$mat){
        	echo "Erro ao realizar cadastro. Tente outra vez.";
        	exit;
        }else{
        	echo "Cadastro concluído com sucesso!";
        }

	}
?>