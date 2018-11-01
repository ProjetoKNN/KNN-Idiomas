<?php 
	include("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Professor</title>
	<meta charset="UTf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<form action="../login_logout.php">
		<input type="submit" name="sair" value="Sair">
	</form>
	<hr>
	<div>
		<?php 
		session_start();
			$user = $_SESSION['usuario'];
			$query = "SELECT login.pr as cpf FROM login where usuario = '".$user."'";
			
			$resQuery = mysqli_query($conexao, $query);

			$res = mysqli_fetch_assoc($resQuery);
			$cpf = $res['cpf'];
			

			$sql = "SELECT professor.nome as NomeProf, professor.cod as CodProf, professor.cpf as profcpf, professor.rua as profrua, professor.rg as profrg, professor.bairro as profbairro, professor.email as profemail FROM professor where professor.cpf = '".$cpf."'";	
			
			

			$consulta = mysqli_query($conexao, $sql);
				if(!$consulta){
	                echo "Erro ao realizar consulta. Tente outra vez.";
	            	exit;
	            }
	            if($dados = mysqli_fetch_assoc($consulta)){
	            	echo "Bem vindo ".$dados['NomeProf']."!<br>";
	            	echo "CPF: ".$dados['profcpf']."<br>";
	            	echo "Rua: ".$dados['profrua']."<br>";
	            	echo "RG: ".$dados['profrg']."<br>";
	            	echo "Bairro: ".$dados['profbairro']."<br>";
	            	echo "E-mail: ".$dados['profemail']."<br>";
	            	echo "<hr>";
	            }

	        $codProf = $dados['CodProf'];
	        $sql2 = "SELECT turma.cod as codturma, turma.nome FROM turma where turma.codProf = $codProf";
	        echo "Turmas:<br>";

	        $resQuery2 = mysqli_query($conexao, $sql2);
	        while($res2 = mysqli_fetch_assoc($resQuery2)){
	        	
	        	echo "<a href='buscar_turmas.php?cod=".$res2['codturma']."'>".$res2['nome']."</a>";
	        	echo "<a href='criaraula.php?cod=".$res2['codturma']."'>"." <button>Lançar aula</button>"."</a><br>";
	    	}
	    	
		?>
	</div>
</body>
</html>
