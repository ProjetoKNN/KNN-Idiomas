<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1, shrink-to-fit=no">
</head>
<style type="text/css">
        body{
            text-align: center;
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
	<!-- required: Obriga o usuário a preencher algum campo.-->
	<h1>Login:</h1>

	<form name="login_sys" action="verificar.php" method="post">
		<label for="txtnome">Nome: </label>
		<input type="text" name="login_nome" required="true" id="txtnome">
		<br>
		<br>
		<label for="txtsenha">Senha: </label>
		<input type="password" name="login_senha" required="true" id="txtsenha">
		<br>
		<br>
		<input type="submit" value="Logar">
		<input type="reset" value="Limpar">
	</form>
	<?php
		//Mostra o aviso na tela do usuário de acordo com o status que for recebido da páginas relacionadas ao sistema de Login.
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
</body>
</html>