<?php 
	session_start();
	include("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Aluno</title>
	<meta charset="UTf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<form action="../login_logout.php">
		<input type="submit" name="sair" value="Sair">
	</form>
	<hr>
	<a href="boletim.php"><button>Boletim</button></a>
	<hr>
	<div>
		<?php 	
			$user = $_SESSION['usuario'];
						
			$query = "SELECT login.al as cpf FROM login where usuario = '".$user."'";
			
			$resQuery = mysqli_query($conexao, $query);
			
			$res = mysqli_fetch_assoc($resQuery);
			$cpf = $res['cpf'];
			
			$sql = "SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno, aluno.cpf as alunocpf, aluno.rua as alunorua, aluno.rg as alunorg, aluno.bairro as alunobairro, aluno.email as alunoemail FROM aluno where aluno.cpf = '".$cpf."'";
			
			$consulta = mysqli_query($conexao, $sql);
				if(!$consulta){
	                echo "Erro ao realizar consulta. Tente outra vez.";
	            	exit;
	            }
	            while($dados = mysqli_fetch_assoc($consulta)){
	            	echo "Bem vindo ".$dados['NomeAluno']."!<br>";
	            	echo "CPF: ".$dados['alunocpf']."<br>";
	            	echo "Rua: ".$dados['alunorua']."<br>";
	            	echo "RG: ".$dados['alunorg']."<br>";
	            	echo "Bairro: ".$dados['alunobairro']."<br>";
	            	echo "E-mail: ".$dados['alunoemail']."<br>";
	            	echo "<hr>";
	            	$_SESSION['CodAluno'] = $dados['CodAluno'];
	            }     	
		?>
	</div>
</body>
</html>
