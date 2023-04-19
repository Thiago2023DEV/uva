<?php
	
	session_start();
	include_once("../conexao/conexao.php");

	$nip = $_POST['nip'];
	$senha = $_POST['senha'];

	$senha_cripto = md5($senha);

	//echo $nip;
	//echo "<br>";
	//echo $senha;

	$user_query = "INSERT INTO tb_usuarios (niveis_acesso_id, nip, senha) VALUES(1, '$nip', '$senha_cripto' )";
	$result_query = $conn->prepare($user_query);
	$result_query->execute();

	if(isset($result_query)){
		$_SESSION['msg'] = "Sim ";
		echo $_SESSION['msg'];
		header("Location: ../index.php");
	}else{
		$_SESSION['msg'] = "Não ";
		echo $_SESSION['msg'];
		header("Location: ../register.php");
	}




?>