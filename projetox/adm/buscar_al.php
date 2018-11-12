<!DOCTYPE html>
<html>
    <head>
        <title>Busca de Alunos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    </head>
            <body class="BuscarAL">
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
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
                    <div class="container">
                        <a class="navbar-brand" id="bv">Bem-Vindo Administrador</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSite">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                        Controles
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="buscar_al.php">Controle de Alunos</a>
                                        <a class="dropdown-item" href="buscar_prof.php">Controle de Professores</a>
                                        <a class="dropdown-item" href="buscar_turm.php">Controle de Turmas</a>
                                        <a class="dropdown-item" href="buscar_curso.php">Controle de Cursos</a>
                                        <a class="dropdown-item" href="buscar_mat.php">Controle de Matrículas</a>
                                    </div>
                                </li>
                            </ul>   
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="adm_func.php" class="nav-link" name="voltar">Voltar</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
				<div class="container" id="divBusca">
			
					<h3 id="h1Busca">Buscar Aluno:</h3>
                        <form name="aluno" method="POST">
                            <caption id="nha">Buscar:</caption>
                            <input type="text" name="busca" id="b" placeholder="Insira o nome completo">        
                            <input type="submit" name="buscar" class="btn btn-dark" value="Buscar">
                            <a href="inserir_al.php" id="addAL"><button class="btn btn-dark" type="button">Inserir um novo Aluno</button></a>
                        </form><br>
                        <caption>Resultado da busca:</caption>
                        <div class='table-responsive table-bordered table-striped'>
                            <table class='table table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>RG</th>
                                        <th>Data Nasc</th>
                                        <th>Contato Aluno</th>
                                        <th>Endereço</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>CEP</th>
                                        <th>E-mail</th>
                                        <th>Alergia alimentar</th>
                                        <th>Alergia</th>
                                        <th>Remédio</th>
                                        <th>Nome do responsável</th>
                                        <th>Telefone do responsável</th>
                                        <th>Editar</th>
                                        <th>Apagar</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        //echo "<td>" .$dados['cod']. "</td>";
                                        echo "<tr>";
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
                                        echo "<button class='btn btn-warning' style='color: white;'>Editar</button>";
                                        echo "</form>";
                                        echo "</td>";

                                        // Cria um formulário para remover os dados 
                                        // Colocamos o id dos dados a serem removidos dentro do input hidden
                                        echo "<td>";
                                        echo "<form action='php/remove_al.php' method='post'>";
                                        echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
                                        echo "<button class='btn btn-danger'>Remover</button>";
                                        echo "</form>";
                                        echo "</td>";
                                    }
                                }
                            ?>
                                </tbody>
                            </table>
                        </div>
					</div>
            <script src="../jquery/dist/jquery.js"></script>
            <script src="popper.js/dist/popper.js"></script>
            <script src="../js/bootstrap.js"></script>        
            </body>
</html>
