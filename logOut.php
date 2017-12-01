<?php
	require_once "funcoes.php";
	  session_start();
	unset ($_SESSION['usuario']); //unset() destrói a variável especificada.
	header('Location:index.php');
?>