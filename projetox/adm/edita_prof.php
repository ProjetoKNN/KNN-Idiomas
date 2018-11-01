<html>
	<head>
		<title>Editar</title>
		<style type="text/css">
		input
		{
			display: block;
			margin-bottom: 1em;
			padding: 5px
		}
		</style>
		<script>
			function formatar(mascara, documento){
				var i = documento.value.length;
				var saida = mascara.substring(0,1);
				var texto = mascara.substring(i)

				if (texto.substring(0,1) != saida){
					documento.value += texto.substring(0,1);
				}

			}
		</script>
	</head>
	<body>
			<a href="buscar_prof.php"><button>Voltar</button></a>
		<?php 
		    //Recebe os dados a serem editados
			$cod = filter_input(INPUT_POST, 'cod');
			$nome = filter_input(INPUT_POST, 'nome');
			$cpf = filter_input(INPUT_POST, 'cpf');
			$rg = filter_input(INPUT_POST, 'rg');
			$email = filter_input(INPUT_POST, 'email');
			$telefone = filter_input(INPUT_POST, 'telefone');
			$rua = filter_input(INPUT_POST, 'rua');
			$nmr = filter_input(INPUT_POST, 'nmr');
			$bairro = filter_input(INPUT_POST, 'bairro');
			$cidade = filter_input(INPUT_POST, 'cidade');
			$estado = filter_input(INPUT_POST, 'estado');
		?>
			<h2>Alteração de dados</h2>
		<form action="php/salva_prof.php" method="post">
			<!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
			<input type="hidden" name="cod" value="<?php echo $cod; ?>">
			Nome:<input type="text" name="nome" value="<?php echo $nome; ?>">
			CPF:<input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value="<?php echo $cpf; ?>">
			RG:<input type="text" name="rg" maxlength="10" OnKeyPress="formatar('##.###.###', this)" value="<?php echo $rg; ?>">
			E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
			Telefone:<input type="text" name="telefone" maxlength="13" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)" value="<?php echo $telefone; ?>">
			Rua:<input type="text" name="rua" value="<?php echo $rua; ?>">
			Número:<input type="text" name="nmr" value="<?php echo $nmr; ?>">
			Bairro:<input type="text" name="bairro" value="<?php echo $bairro; ?>">
			Cidade:<input type="text" name="cidade" value="<?php echo $cidade; ?>">
			Estado:<input type="text" name="estado" maxlength="2" value="<?php echo $estado; ?>">
			<input type="submit" value="Salvar alterações">
		</form>
	</body>
</html>