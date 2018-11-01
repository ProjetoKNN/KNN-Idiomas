<!DOCTYPE html>
<html>
    <head>
    	<title>Busca de Cursos</title>
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
                <h1>Buscando um Curso:</h1>
                    <form name="curso" method="POST">
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

                            $sql = "SELECT * FROM curso WHERE nome LIKE '%$teste%'";
                                if(!$sql)
                                {
                                    echo "Erro ao realizar consulta. Tente outra vez.";
                                    exit;
                                }
                            $consulta = mysqli_query($conexao, $sql);

                            while($dados = mysqli_fetch_assoc($consulta))
                            {
                                echo "<table>";
                                echo "<tr><td>Nome do curso</td><td>Remoção</td></tr>";
                                echo "<tr>";
                                echo "<td>".$dados['nome']. "</td>";
                                            
                                // Cria um formulário para remover os dados 
                                // Colocamos o id dos dados a serem removidos dentro do input hidden
                                echo "<td>";
                                echo "<form action='php/remover_curso.php' method='post'>";
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