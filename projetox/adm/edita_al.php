<html>
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
    <body>
        <?php 
            //Recebe os dados a serem editados
            $cod = filter_input(INPUT_POST, 'cod');
            $nome = filter_input(INPUT_POST, 'nome');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $rg = filter_input(INPUT_POST, 'rg');
            $datanasc = filter_input(INPUT_POST, 'datanasc');
            $rua = filter_input(INPUT_POST, 'rua');
            $nmr = filter_input(INPUT_POST, 'nmr');
            $contato = filter_input(INPUT_POST, 'contatoaluno');
            $bairro = filter_input(INPUT_POST, 'bairro');
            $nomeresponsavel = filter_input(INPUT_POST, 'nomeresponsavel');
            $telefoneresponsavel = filter_input(INPUT_POST, 'telefoneresponsavel');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $estado = filter_input(INPUT_POST, 'estado');
            $email = filter_input(INPUT_POST, 'email');
            $alergiaalimentar = filter_input(INPUT_POST, 'alergiaalimentar'); 
            $remedio = filter_input(INPUT_POST, 'remedio');
            $alergia = filter_input(INPUT_POST, 'alergia');
            $cep = filter_input(INPUT_POST, 'cep');
        ?>
        <a href="buscar_al.php"><button>Voltar</button></a>
        <h2>Alteração de dados</h2>
        <form action="php/salva_al.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            <input type="hidden" name="cod" value="<?php echo $cod; ?>">
            Nome:<input type="text" name="nome" value="<?php echo $nome; ?>">
            CPF:<input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value="<?php echo $cpf; ?>">
            RG:<input type="text" name="rg" maxlength="10" OnKeyPress="formatar('##.###.###', this)" value="<?php echo $rg; ?>">
            Data de Nascimento:<input type="date" name="datanasc" value="<?php echo $datanasc; ?>">
            Telefone:<input type="text" name="contato"  maxlength="13" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)" value="<?php echo $contato; ?>">
            E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
            Rua:<input type="text" name="rua" value="<?php echo $rua; ?>">
            Número:<input type="text" name="nmr" value="<?php echo $nmr; ?>">
            Bairro:<input type="text" name="bairro" value="<?php echo $bairro; ?>">
            Cidade:<input type="text" name="cidade" value="<?php echo $cidade; ?>">
            Estado:<input type="text" name="estado" maxlength="2" value="<?php echo $estado; ?>">
            CEP:<input type="text" name="cep" value="<?php echo $cep; ?>">
            Alergia Alimentar:<input type="text" name="alergiaalimentar" value="<?php echo $alergiaalimentar; ?>">
            Remédio:<input type="text" name="remedio" value="<?php echo $remedio; ?>">
            Alergia:<input type="text" name="alergia" value="<?php echo $alergia; ?>">
            Nome do responsável:<input type="text" name="nomeresponsavel" value="<?php echo $nomeresponsavel; ?>">
            Telefone do responsável:<input type="text" name="telefoneresponsavel" maxlength="13" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)"  value="<?php echo $telefoneresponsavel; ?>">
            <input type="submit" value="Salvar alterações">
        </form>
    </body>
</html>