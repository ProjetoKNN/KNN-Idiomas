<?php 
    //Recebe o cod dos dados que serão apagados.
    $Aluno = filter_input(INPUT_POST, 'Aluno');

    //Estabelece a conexão.
    include("../../conexao.php");
    if(!$conexao){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query.
    $sql = "DELETE FROM matricula WHERE aluno_cod=".$Aluno;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra buscar_mat.php com remove igual a false. 
    if(!$remove){
        header("Location:../buscar_mat.php?remocao=false");
        exit;
    }
    //Se tudo deu certo, redireciona pra buscar_mat.php com remove igual a true.
    header("Location:../buscar_mat.php?remocao=true");
?>
