<?php
	include("conexao.php");
	
	$usuario = $_POST['login_nome'];
	$senha = $_POST['login_senha'];

	if($conexao){
		//monta a consulta no banco através de string.
		$select = "SELECT * FROM login WHERE usuario LIKE '$usuario' AND senha LIKE '$senha'";
		//exercuta a consulta no banco de dados.
		$consulta = mysqli_query($conexao, $select);
		//verifica o número de registros encontrados no BD.
		$qtd_reg = mysqli_num_rows($consulta);
		
		if($qtd_reg){
			$res_consulta = mysqli_fetch_assoc($consulta);
			session_start();
			$_SESSION['privilegio'] = $res_consulta['privilegio'];
			$_SESSION['usuario'] = $res_consulta['usuario'];
			header("location:login.php");
		}
		else{
			//caso nenhum registro seja encontrado, irá informa-lo que nenhum usuário foi encontrado no Banco de dados.
			header("location:index.php?status=0");
		}
	}else{
		die($conexao);
		echo "Não foi possível se conectar.";
	}
?>