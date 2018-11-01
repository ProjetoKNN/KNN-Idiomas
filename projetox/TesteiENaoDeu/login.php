<?php
	include("conexao.php");
	session_start();
	if(isset($_SESSION['privilegio']) and isset($_SESSION['usuario'])){

		if($_SESSION['privilegio'] == 'adm'){
			header('location: adm/adm_func.php');
		}else{
			unset($_SESSION['privilegio']);
			unset($_SESSION['usuario']);
			header('location:index.php?status=1');
		}
		/*if($_SESSION['privilegio'] == "prf"){
			header('location:../index.php');
		}else{
			unset($_SESSION['privilegio']);
			unset($_SESSION['usuario']);
			header('location:../index.php?status=1');
		}*/
		/*if($_SESSION['privilegio'] == "usr"){
			header("location: aluno/index_aluno.php");
		}else{
			unset($_SESSION['privilegio']);
			unset($_SESSION['usuario']);
			header('location:index.php?status=1');
		}*/
	}else{
		header("location:index.php?status=2");

	}
?>