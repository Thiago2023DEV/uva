<?php

	session_start();
	include_once("../conexao/conexao.php");

	 $ata_escolha = filter_input(INPUT_POST, 'ata_escolha');
	 echo $ata_escolha;

	 $result_ata = "DELETE FROM tb_atas WHERE ata='$ata_escolha'";
	 $resultado_ata = mysqli_query($conn, $result_ata);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: ../consultar.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro Produto não foi apagado com sucesso</p>";
		header("Location: ../login.php?id=$id_ata");
	}
?>