<?php
	session_start();
	include_once("../conexao/conexao.php");

	$ata = filter_input(INPUT_POST,'ata');
	$vigencia = filter_input(INPUT_POST,'vigencia');
	$data = date('Y-m-d', strtotime($vigencia));
	$uasg = filter_input(INPUT_POST,'uasg');
	$empresa = filter_input(INPUT_POST,'empresa');
	$cnpj = filter_input(INPUT_POST,'cnpj');

	if(isset($_FILES['arquivo'])){
		$extencao = strtolower(substr($_FILES['arquivo']['name'], - 4));
		$novo_nome = time(). $extencao;
		$diretorio = "upload/";

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio. $novo_nome);
	}


	/*
	echo "<pre>";
	echo $ata;
	echo "<br/>";
	echo $uasg;
	echo "</pre>";

	*/

	//Verificação ATA
	$result_ata = "SELECT ata,uasg FROM tb_atas WHERE ata = '$ata' AND uasg = '$uasg'";
	$resultado_verificacao_ata = mysqli_query($conn,$result_ata);

	$row_verificacao_ata = mysqli_fetch_assoc($resultado_verificacao_ata);
	echo $row_verificacao_ata['ata'];
	echo $row_verificacao_ata['uasg'];

	if($row_verificacao_ata['ata'] or $row_verificacao_ata['uasg']){		
			//$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
			header("Location: cadastrar_ata.php");

	}else{
		$result_ata = "INSERT INTO tb_atas (ata, vigencia, uasg, pdf, nome_empresa, cnpj) VALUES ('$ata', '$data','$uasg',  '$novo_nome', '$empresa', '$cnpj')";
		$resultado_ata = mysqli_query($conn, $result_ata);

		if(mysqli_insert_id($conn)){
			$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
			header("Location: cadastrar_itens_escolha_ata.php");
		}
		
	}
	

	

	
	

	
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
		header("Location: cadastrar_itens_escolha_ata.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Produto não foi cadastrado com sucesso</p>";
		header("Location: cadastrar_ata.php");
	}

	
?>