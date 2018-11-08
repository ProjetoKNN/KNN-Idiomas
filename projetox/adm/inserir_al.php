	<?php
	include("../conexao.php");
	date_default_timezone_set('America/Sao_Paulo');
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Alunos</title>
		<meta charset="UTf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
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
	<body>
		
		<div class="container" id="a">
			<h1>Inserindo um aluno:</h1><BR>
		<form name="aluno" action="" method="POST">
			Nome:
			<input type="text" name="nome" placeholder="Insira o nome completo" required id="nome">
			Data de nascimento:
			<input type="date" name="data" required>
			CPF:
			<input type="text" id="cpf" name="cpf" placeholder="Insira um CPF válido" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
			RG:
			<input type="text" name="rg" placeholder="Insira um RG válido" id="rg" maxlength="10" OnKeyPress="formatar('##.###.###', this)" required><br><br>
			Telefone:
			<input type="text" name="tel" maxlength="13" placeholder="xx-xxxxx-xxxx" id="tel" OnKeyPress="formatar('##-#####-####', this)" required>
			Nome do responável:
			<input type="text"  name="nomeResp" id="resp" placeholder="Insira o nome do responável">
			Telefone do responsável:
			<input type="text" name="telResp" maxlength="13" id="tel" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)"><br><br>
			Rua:
			<input type="text" name="rua" placeholder="Informe a rua" id="rua" required>
			Numero:	
			<input type="text" placeholder="  xxxx" name="nmr" id="nmr">
			Bairro:	
			<input type="text" name="bairro" placeholder="Insira o bairro" id="bairro" required>
			Cidade:
			<input type="text" name="cidade" placeholder="Informe a cidade" id="city" required>
			UF:
			<input type="text" name="estado" maxlength="2" id="uf" required><BR><br>
			CEP:
			<input type="text" name="cep" maxlength="9" placeholder="Informe o CEP" id="cep" OnKeyPress="formatar('#####-###', this)" required>
			E-mail:
			<input type="text" name="email" placeholder="Informe o e-mail"  >
			Alergia alimentar:
			<input type="text" name="alergiaalimentar" placeholder="Informe as doenças" id="aliment"><br><br>
			Remédio:
			<input type="text" name="remedio" placeholder="Informe os remédios" id="remedio">
			Alergia:
			<input type="text" name="alergia" placeholder="Informe as alergias" id="alergia">
			<hr>
			<h4>Informações do Login:</h4>
			Nome de usuário:
			<input type="text" name="login" placeholder="Insira o nome de usuário"><br>
			Senha:
			<input type="password" name="senha" maxlength="16" placeholder="Insira a senha"><br><br>
			<input type="submit" name="inserir" class="btn btn-info" value="INSERIR">
			<input type="reset" name="limpar" class="btn btn-info" value="LIMPAR">
		</form>
		<div class="container-fluid" id="nha">
			<a href="adm_func.php"><button class="btn btn-info">Voltar</button></a>
		</div>
	</div>
	</body>
</html>
<?php
	//inserindo os dados de alunos.
	if(isset($_POST['inserir'])){
		$nome = $_POST['nome'];
		$datanasc = $_POST['data'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$contato = $_POST['tel'];
		$nomeresp = $_POST['nomeResp'];
		$contatoresp = $_POST['telResp'];
		$rua = $_POST['rua'];
		$nmr = $_POST['nmr'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$priv = "usr";
		$bairro = $_POST['bairro'];
		$uf = $_POST['estado'];
		$cep = $_POST['cep'];
		$email = $_POST['email'];
		$alergiaalimentar = $_POST['alergiaalimentar'];
		$remedio = $_POST['remedio'];
		$alergia = $_POST['alergia'];
		$cidade = $_POST['cidade'];

		$aluno = mysqli_query($conexao,"INSERT INTO aluno(nome, cpf, rg, datanascimento, telefonealuno, nomeresponsavel, telefoneresponsavel, rua, numero, bairro, cidade, estado, cep, email, alergiaalimentar, remedio, alergia) VALUES ('$nome','$cpf', '$rg', '$datanasc', '$contato', '$nomeresp', '$contatoresp', '$rua', '$nmr', '$bairro', '$cidade', '$uf', '$cep', '$email','$alergiaalimentar','$remedio','$alergia')");
		$login = mysqli_query($conexao,"INSERT INTO login(usuario, senha, privilegio, al) VALUES ('$login', '$senha', '$priv', '$cpf')");
		if(!$aluno){
			header("location:inserir_al.php?false");
			echo "Erro ao realizar cadastro. Tente outra vez.";
			exit;
		}else{
			header("location:inserir_al.php?true");
			echo "Cadastro concluído com sucesso!";
		}
	}
?>