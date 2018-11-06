<?php 
    //Recebe o id dos dados que serão apagados.
    $curso = filter_input(INPUT_POST, 'curso');

    //Estabelece a conexão.
    include("../../conexao.php");
    if(!$conexao){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query.
    $sql = "DELETE FROM curso WHERE nome=".$curso;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra buscar_al.php com remove igual a false. 
    if(!$remove){
        header("Location:../buscar_curso.php?remocao=false");
        exit;
    }
    //Se tudo deu certo, redireciona pra buscar_al.php com remove igual a true.
    header("Location:../buscar_curso.php?remocao=true");
?>
