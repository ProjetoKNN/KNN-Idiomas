<!DOCTYPE html>
<html>
    <head>
        <title>Busca de Alunos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilobuscal.css">
    </head>
            <body>
                <?php 
                    //Área de notificações

                    //Se existe a variável remocao, então
                    if( isset($_POST['remocao'])){
                        //Se remoção tem true, os dados foram removidos
                        if( $_POST['remocao'] == "true" ){
                            echo "<p>Os dados foram removidos.</p>";            
                        }else{
                            echo "<p>Não foi possivel remover os dados.</p>";
                        }
                    } 
                        //Se existe a variável alteração, então
                    if( isset($_POST['alteracao']) ){
                        //Se alteracao tem true, os dados foram alterados
                        if( $_POST['alteracao'] == "true" ){
                            echo "<p>Os dados foram alterados.</p>";            
                        }else{
                            echo "<p>Não foi possivel alterar os dados.</p>";
                        }
                    } 
                ?>
                    
				<div class="container-fluid" id="a">
				<a href="adm_func.php" id="c"><button class="btn btn-info">Voltar</button></a>
					<h1>Buscando um Aluno:</h1>
                        <form name="aluno" method="POST">
                            Buscar:
                            <input type="text" name="busca" id="b" placeholder="Insira o nome completo">        
                            <input type="submit" name="buscar" class="btn btn-info" value="BUSCAR">
                            <input type="reset" name="limpar" class="btn btn-info" value="LIMPAR">
                        </form><br>
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
                                    $teste = $_POST['busca'];
                                    $sql = "SELECT * FROM aluno WHERE nome LIKE '%$teste%'";
                                    $consulta = mysqli_query($conexao, $sql);
                                        if(!$consulta){
                                            echo "Erro ao realizar consulta. Tente outra vez.";
                                            exit;
                                        }
                                    //se tudo deu certo, exibe os dados
                                    while($dados = mysqli_fetch_assoc($consulta)){
										echo "<br><br>";
                                        echo "<table>";
                                        echo "<tr><td>Nome</td><td>CPF</td><td>RG</td><td>Data Nasc</td><td>Contato Aluno</td><td>Endereço</td><td>Bairro</td><td>Cidade</td><td>Estado</td><td>CEP</td><td>E-mail</td><td>Alergia alimentar</td><td>Alergia</td><td>Remédio</td><td>Nome do responsável</td><td>Telefone do responsável</td><td>Editar</td><td>Apagar</td></tr>";
                                        echo "<tr>";
                                        //echo "<td>" .$dados['cod']. "</td>";
                                        echo "<td>" .$dados['nome']. "</td>";
                                        echo "<td>" .$dados['cpf']. "</td>";
                                        echo "<td>" .$dados['rg']. "</td>";
                                        echo "<td>" .$dados['datanascimento']. "</td>";
                                        echo "<td>" .$dados['telefonealuno']. "</td>";
                                        echo "<td>" .$dados['rua'].", ".$dados['numero']. "</td>";
                                        echo "<td>" .$dados['bairro']. "</td>";
                                        echo "<td>" .$dados['cidade']. "</td>";
                                        echo "<td>" .$dados['estado']. "</td>";
                                        echo "<td>" .$dados['cep']. "</td>";
                                        echo "<td>" .$dados['email']. "</td>";
                                        echo "<td>" .$dados['alergiaalimentar']. "</td>";
                                        echo "<td>" .$dados['alergia']. "</td>";
                                        echo "<td>" .$dados['remedio']. "</td>";
                                        echo "<td>" .$dados['nomeresponsavel']. "</td>";
                                        echo "<td>" .$dados['telefoneresponsavel']. "</td>";

                                        // Cria um formulário para enviar os dados para a página de edição 
                                        // Colocamos os dados dentro input hidden
                                        echo "<td>";
                                        echo "<form action='edita_al.php' method='post'>";
                                        echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
                                        echo "<input name='nome' type='hidden' value='" .$dados['nome']. "'>";
                                        echo "<input name='cpf' type='hidden' value='" .$dados['cpf']. "'>";   
                                        echo "<input name='rg' type='hidden' value='" .$dados['rg']. "'>";
                                        echo "<input name='datanasc' type='hidden' value='" .$dados['datanascimento']. "'>";
                                        echo "<input name='contatoaluno' type='hidden' value='" .$dados['telefonealuno']. "'>"; 
                                        echo "<input name='rua' type='hidden' value='" .$dados['rua']. "'>"; 
                                        echo "<input name='nmr' type='hidden' value='" .$dados['numero']. "'>"; 
                                        echo "<input name='bairro' type='hidden' value='" .$dados['bairro']. "'>";
                                        echo "<input name='cidade' type='hidden' value='" .$dados['cidade']. "'>";
                                        echo "<input name='estado' type='hidden' value='" .$dados['estado']. "'>";
                                        echo "<input name='cep' type='hidden' value='" .$dados['cep']. "'>";
                                        echo "<input name='email' type='hidden' value='" .$dados['email']. "'>";
                                        echo "<input name='alergiaalimentar' type='hidden' value='" .$dados['alergiaalimentar']. "'>";
                                        echo "<input name='alergia' type='hidden' value='" .$dados['alergia']. "'>";
                                        echo "<input name='remedio' type='hidden' value='" .$dados['remedio']. "'>";
                                        echo "<input name='nomeresponsavel' type='hidden' value='" .$dados['nomeresponsavel']. "'>";  
                                        echo "<input name='telefoneresponsavel' type='hidden' value='" .$dados['telefoneresponsavel']. "'>"; 
                                        echo "<button class='btn btn-info'>Editar</button>";
                                        echo "</form>";
                                        echo "</td>";

                                        // Cria um formulário para remover os dados 
                                        // Colocamos o id dos dados a serem removidos dentro do input hidden
                                        echo "<td>";
                                        echo "<form action='php/remove_al.php' method='post'>";
                                        echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
                                        echo "<button class='btn btn-info'>Remover</button>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "</table>";
                                    }
                                }
                            ?>
							</div>
                </body>
</html>
