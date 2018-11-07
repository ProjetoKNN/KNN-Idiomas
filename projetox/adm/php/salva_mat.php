<?php 
    include("../../conexao.php");
    //Recebe os dados com as alterações feitas
    $NovaTurma = filter_input(INPUT_POST, 'turma');
    $NovoCurso = filter_input(INPUT_POST, 'curso');
    $NovaDataPag = filter_input(INPUT_POST, 'datapagamento');
    //$codTurma = mysqli_query($conexao, "SELECT cod FROM Turma where nome ='".$NovaTurma."'");
    $teste = filter_input(INPUT_POST, 'Alunoo');
    //$codAluno = mysqli_query($conexao, "SELECT cod FROM Aluno where nome ='".$teste."'");

    /*echo $NovaTurma;
    echo $NovoCurso;
    echo $NovaDataPag;
    echo $teste;*/

    if(!$conexao){
        header("Location:../buscar_mat.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE matricula SET turma_cod='".$NovaTurma."', curso='".$NovoCurso. "', datapagamento='".$NovaDataPag."' WHERE aluno_cod='".$teste."'";
    $update = mysqli_query($conexao, $sql);
    //Se não deu certo, redireciona pra buscar_turm com alteracao igual a false
    if(!$update){
        header("Location:../buscar_mat.php?alteracao=false");
        exit;
    }else{
    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
        header("Location:../buscar_mat.php?alteracao=true");
    }
?>