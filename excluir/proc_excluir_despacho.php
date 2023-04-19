<?php

	session_start();
	include_once("../conexao/conexao.php");

	 $id_despacho = filter_input(INPUT_POST, 'id_despacho');
	 echo $id_despacho;

	 $result_ata = "DELETE FROM tb_despacho WHERE id_despacho='$id_despacho'";
	 $resultado_ata = mysqli_query($conn, $result_ata);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: ../consultar.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro Produto não foi apagado com sucesso</p>";
		header("Location: ../login.php?id=$id_ata");
	}
	
?>