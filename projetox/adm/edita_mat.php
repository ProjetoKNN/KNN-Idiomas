<html>
	<?php 
	include("../conexao.php");
	?>
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

		<?php
			//Faz a seleção da turma para utilizar no <select>.
			$consTurma = mysqli_query($conexao,"SELECT * FROM turma");
				if(!$consTurma){
					echo "Erro ao realizar consulta. Tente outra vez.";
					exit;
				}
		?>
		<body>
			<a href="buscar_mat.php"><button>Voltar</button></a>
				<?php 
					//Recebe os dados a serem editados
					$Aluno = filter_input(INPUT_POST, 'Aluno');
					$Turma = filter_input(INPUT_POST, 'Turma');
					$Curso = filter_input(INPUT_POST, 'Curso');
					$datamatricula = filter_input(INPUT_POST, 'datamatricula');
					$datapagamento = filter_input(INPUT_POST, 'datapagamento');
					$teste = filter_input(INPUT_POST, 'teste');
				?>
				<h2>Alteração de dados</h2>
			<form action="php/salva_mat.php" method="post">
				<!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
				<input type="hidden" name="Alunoo" value="<?php echo $teste; ?>">
				Turma:
					<select name='turma'>
						<?php
							while($turm = mysqli_fetch_assoc($consTurma))
							{
								echo "<option  value=".$turm['cod'].">".$turm['nome']."</option>";
							}
						?>                
					</select><br><br>
				Curso:
				<input type="text" name="curso" value="<?php echo $Curso; ?>"><br>
				Data do Pagamento:
				<input type="text" name="datapagamento" value="<?php echo $datapagamento; ?>"><br>
				<input type="submit" value="Salvar alterações">
			</form>
		</body>
</html>