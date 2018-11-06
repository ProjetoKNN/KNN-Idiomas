<!DOCTYPE html>
<html>
	<head>
		<title>Busca de Turmas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			text-align: justify;
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
		<?php 
	        //Área de notificações

	        //Se existe a variável remocao, então
			if( isset($_GET['remocao'])){
		            //Se remoção tem true, os dados foram removidos
				if( $_GET['remocao'] == "true" ){
					echo "<p>Os dados foram removidos.</p>";            
				}else{
					echo "<p>Não foi possivel remover os dados.</p>";
				}
			} 
	        //Se existe a variável alteração, então
			if( isset($_GET['alteracao']) ){
		            //Se alteracao tem true, os dados foram alterados
				if( $_GET['alteracao'] == "true" ){
					echo "<p>Os dados foram alterados.</p>";            
				}else{
					echo "<p>Não foi possivel alterar os dados.</p>";
				}
			} 
		?>
			<a href="adm_func.php"><button>Voltar</button></a>
			<h1>Buscando uma Turma:</h1>
		<form name="turma" method="POST">
			Buscar:
			<input type="text" name="busca" placeholder="Informe o termo de busca">
			<input type="submit" name="buscar" value="BUSCAR">
			<input type="reset" name="limpar" value="LIMPAR">
		</form><br><br>
			<caption>Resultado da busca:</caption>
		<?php 
		    //Estabelece a conexao com o mysql
			include("../conexao.php");
			if(!$conexao){
				echo "Ops.. Erro na conexão.";
				exit;
			}
	        //Carrega os dados
			if(isset($_POST['buscar']))
			{
				$pesquisa = $_POST['busca'];

				$sql = "SELECT curso.nome as NomeCurso, curso.cod as codigo, turma.nome as NomeTurma, turma.cod as cod, turma.qtd as qtd, professor.nome as NomeProf FROM turma inner join curso on curso.cod = turma.curso_cod join professor on professor.cod = turma.codProf where turma.nome LIKE '%$pesquisa%'";

				$consulta = mysqli_query($conexao,$sql);

				
				while($dados = mysqli_fetch_assoc($consulta))
				{
					echo "<table>";
					echo "<tr><td>Nome</td><td>Nome do Professor</td><td>Quantidade de alunos</td><td>Cursos</td><td>Editar</td><td>Apagar</td></tr>";
					echo "<tr>";
					echo "<td>".$dados['NomeTurma']."</td>";
					echo "<td>".$dados['NomeProf']. "</td>";
					echo "<td>".$dados['qtd']."</td>";
					echo "<td>".$dados['NomeCurso']."</td>";
		            // Cria um formulário para enviar os dados para a página de edição 
		            // Colocamos os dados dentro input hidden
					echo "<td>";
					echo "<form action='edita_turm.php' method='post'>";
					echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
					echo "<input name='nome' type='hidden' value='" .$dados['NomeTurma']. "'>";
					echo "<input name='codProf' type='hidden' value='" .$dados['NomeProf']. "'>";   
					echo "<input name='qtd' type='hidden' value=".$dados['qtd'].">";
					echo "<input name='curso_cod' type='hidden' value=".$dados['codigo'].">";
					echo "<input name='NomeCurso' type='hidden' value=".$dados['NomeCurso'].">";
					echo "<button>Editar</button>";
					echo "</form>";
					echo "</td>";

		            // Cria um formulário para remover os dados 
		            // Colocamos o id dos dados a serem removidos dentro do input hidden
					echo "<td>";
					echo "<form action='remove_turma.php' method='post'>";
					echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
					echo "<button>Remover</button>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
				}
			}
		?>
	</body>
</html>