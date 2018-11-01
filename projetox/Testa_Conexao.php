<?php
	include("conexao.php");
	if(!$conexao){
		echo "Erro na conexao com  o BD! Tente novamente!";
		exit;
	}else{
		echo "Conectado com sucesso! Bem-vindo!";
	}
?>