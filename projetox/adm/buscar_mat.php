<!DOCTYPE html>
<html>
    <head>
    	<title>Busca de Matrículas</title>
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
                <a href="adm_func.php"><button>Voltar</button></a>
                <h1>Buscando uma Matrícula:</h1>
                    <form name="matricula" method="POST">
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
                        if(isset($_POST['busca']))
                        {
                            $teste = $_POST['busca'];

                           
                            $consulta = mysqli_query($conexao,"SELECT aluno.nome as NomeAluno, aluno.cod as CodAluno, turma.nome as NomeTurma, turma.cod as CodTurma, curso.nome as NomeCurso, matricula.datamatricula as datamatricula, matricula.datapagamento as datapagamento FROM matricula INNER JOIN aluno ON aluno.cod = matricula.aluno_cod JOIN turma ON turma.cod = matricula.turma_cod JOIN curso ON curso.nome = matricula.curso where aluno.nome LIKE '%$teste%'");

                            while($dados = mysqli_fetch_assoc($consulta))
                            {
                                echo "<table>";
                                echo "<tr><td>Aluno</td><td>Turma</td><td>Curso</td><td>Data da Matrícula</td><td>Data do Pagamento</td><td>Editar</td><td>Apagar</td></tr>";
                                echo "<tr>";
                                //echo "<td>".$dados['cod']. "</td>";
                                echo "<td><a href='edita_al.php'>".$dados['NomeAluno']."</a></td>";
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
                                echo "<button>Editar</button>";
                                echo "</form>";
                                echo "</td>";
                                            
                                // Cria um formulário para remover os dados 
                                // Colocamos o id dos dados a serem removidos dentro do input hidden
                                echo "<td>";
                                echo "<form action='php/remove_mat.php' method='post'>";
                                echo "<input name='Aluno' type='hidden' value='" .$dados['CodAluno']. "'>";
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