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
        $consProf = mysqli_query($conexao,"SELECT * FROM professor");
            if( !$consProf ){
                echo "Erro ao realizar consulta. Tente outra vez.";
                exit;
            }
    ?>
    <body>
            <a href="buscar_turm.php"><button>Voltar</button></a>
        <?php 
            //Recebe os dados a serem editados
            $cod = filter_input(INPUT_POST, 'cod');
            $nome = filter_input(INPUT_POST, 'nome');
            $prof = filter_input(INPUT_POST, 'codProf');
            $qtd = filter_input(INPUT_POST, 'qtd');
            $curso = filter_input(INPUT_POST, 'curso_cod');
            $NomeCurso = filter_input(INPUT_POST, 'NomeCurso');
        ?>
            <h2>Alteração de dados</h2>
        <form action="php/salva_turm.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            <input type="hidden" name="cod" value="<?php echo $cod; ?>">
            Nome da Turma:<input type="text" name="nome" value="<?php echo $nome; ?>">
                Professor:
                
                <?php 

                $s = "SELECT professor.nome FROM professor WHERE professor.nome = '$prof'";
                $r =mysqli_query($conexao,$s); 
                $res = mysqli_fetch_assoc($r); 
                ?>
                <select name='prof'>
                    <?php
  
                        echo "<option  value=".$prof.">".$res['nome']."</option>";
                        
                        while($prof = mysqli_fetch_assoc($consProf))
                        {
                            if($prof['nome']!=$res['nome'])
                            {
                                echo "<option  value=".$prof['cod'].">".$prof['nome']."</option>";
                            }
                        }
                    ?>                
                </select><br><br>

                Quantidade de Alunos:<input type="text" name="qtd" value="<?php echo $qtd; ?>">
                Curso:<input type="text" name="curso" value="<?php echo $NomeCurso; ?>">
                <input type="submit" value="Salvar alterações">
        </form>
    </body>
</html>