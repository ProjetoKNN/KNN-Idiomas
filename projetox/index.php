<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estiloindex.css">
    <link rel="shortcut icon" href="../img/knnlogo.ico">
</head>

<body>
	<!-- required: Obriga o usuário a preencher algum campo.-->
	<div class="container-fluid" id="a">

		<h1>LOGIN</h1>

		<form name="login_sys" action="verificar.php" method="post">

			<label for="txtnome">Nome: </label><br>
			<input type="text" name="login_nome" required="true" id="txtnome"><br><br>
			<label for="txtsenha">Senha: </label><br>
			<input type="password" name="login_senha" required="true" id="txtsenha"><br><br>
			<input type="submit" value="LOGAR" class="btn btn-info" id="botao">
			<input type="reset" value="LIMPAR" class="btn btn-info" id="botao">

		</form>

	</div>
	<?php
			if(isset($_GET['status']))
			{
				if(intval($_GET['status']) == 0){
				 echo "<script>alert('Usuário ou senha inválidos')</script>";	
				}

				if(intval($_GET['status']) == 1){
					echo "<script>alert('Você não tem permissão para acessar essa página.')</script>";
				}
				if(intval($_GET['status']) == 2){
					echo "<script>alert('Você precisa fazer para continuar.')</script>";
				}
			}	
		?>
	<script src="jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="js/bootstrap.js"></script>	
</body>
</html>