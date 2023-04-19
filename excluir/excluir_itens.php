<?php
	session_start();
	include_once("../conexao/conexao.php");

	$id_item = filter_input(INPUT_GET, 'id_item', FILTER_SANITIZE_NUMBER_INT);
	echo $id_item;

	$result_itens = "DELETE FROM tb_itens WHERE id_item='$id_item'";
	$resultado_itens = mysqli_query($conn, $result_itens);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: ../consultar.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro Produto não foi apagado com sucesso</p>";
		header("Location: ../login.php?id=$id_ata");
	}




?>