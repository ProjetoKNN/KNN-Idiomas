<?php
	session_start();
	session_destroy();
	/*unset($_SESSION['privilegio']);
	unset($_SESSION['usuario']);*/
	header("location:index.php");
?>