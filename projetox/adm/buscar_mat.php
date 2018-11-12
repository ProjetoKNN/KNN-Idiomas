<!DOCTYPE html>
<html>
    <head>
    	<title>Busca de Matrículas</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
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
                        if( isset($_GET['alteracao']) ){
                            //Se alteracao tem true, os dados foram alterados
                            if( $_GET['alteracao'] == "true" ){
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
                <h3 id="h1Busca">Buscando uma Matrícula:</h3>
                    <form name="matricula" method="POST">
                        <caption id="nha">Buscar:</caption>
                        <input type="text" name="busca" placeholder="Informe o termo de busca">
                        <input type="submit" name="buscar" class="btn btn-dark" value="BUSCAR">
                        <a href="inserir_mat.php" id="addAL"><button class="btn btn-dark" type="button">Inserir uma nova Matrícula</button></a>
                    </form><br><br>
                    <caption id="nha">Resultado da busca:</caption>
                    <div class="table-responsive table-bordered table-striped">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Aluno</th>
                                <th>Turma</th>
                                <th>Curso</th>
                                <th>Data da Matrícula</th>
                                <th>Data do Pagamento</th>
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
                        if(isset($_POST['busca']))
                        {
                            $teste = $_POST['busca'];

                           
                            $consulta = mysqli_query($conexao,"SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno, turma.nome as NomeTurma, turma.cod as CodTurma, curso.nome as NomeCurso, matricula.datamatricula as datamatricula, matricula.datapagamento as datapagamento FROM matricula INNER JOIN aluno ON aluno.cod = matricula.aluno_cod JOIN turma ON turma.cod = matricula.turma_cod JOIN curso ON curso.nome = matricula.curso where aluno.nome LIKE '%$teste%'");

                            while($dados = mysqli_fetch_assoc($consulta))
                            {   echo "<tr>";
                                //echo "<td>".$dados['cod']. "</td>";
                                echo "<td>".$dados['NomeAluno']."</td>";
                                echo "<td>".$dados['NomeTurma']. "</td>";
                                echo "<td>".$dados['NomeCurso']."</td>";
                                echo "<td>".$dados['datamatricula']."</td>";
                                echo "<td>".$dados['datapagamento']."</td>";
                                //echo "<td>".$dados['CodAluno']."</td>";

                                // Cria um formulário para enviar os dados para a página de edição 
                                // Colocamos os dados dentro input hidden
                                echo "<td>";
                                echo "<form action='edita_mat.php' method='post'>";
                                //echo "<input name='cod' type='hidden' value='" .$dados['cod']. "'>";
                                echo "<input name='Aluno' type='hidden' value='" .$dados['NomeAluno']. "'>";
                                echo "<input name='Turma' type='hidden' value='" .$dados['NomeTurma']. "'>";   
                                echo "<input name='Curso' type='hidden' value=".$dados['NomeCurso'].">";
                                echo "<input name='datamatricula' type='hidden' value=".$dados['datamatricula'].">";
                                echo "<input name='datapagamento' type='hidden' value=".$dados['datapagamento'].">";
                                echo "<input name='teste' type='hidden' value=".$dados['CodAluno'].">";
                                echo "<button class='btn btn-warning' style='color: white;'>Editar</button>";
                                echo "</form>";
                                echo "</td>";
                                
                                // Cria um formulário para remover os dados 
                                // Colocamos o id dos dados a serem removidos dentro do input hidden
                                echo "<td>";
                                echo "<form action='php/remove_mat.php' method='post'>";
                                echo "<input name='Aluno' type='hidden' value='" .$dados['CodAluno']. "'>";
                                echo "<button class='btn btn-danger'>Remover</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </body>
            <script src="../jquery/dist/jquery.js"></script>
            <script src="popper.js/dist/popper.js"></script>
            <script src="../js/bootstrap.js"></script> 
</html>