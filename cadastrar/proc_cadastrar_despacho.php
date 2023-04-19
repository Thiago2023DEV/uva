<?php

	session_start();
	include_once("../conexao/conexao.php");

	$irp = $_POST['irp'];
	$pregao = $_POST['pregao'];
    $orgao = $_POST['orgao'];

	//echo $irp;
	$result_id_despacho = "INSERT INTO tb_despacho (irp, pregao_eletronico, orgao) VALUES ('$irp', '$pregao',  '$orgao')";
	$resultado_id_despacho = mysqli_query($conn, $result_id_despacho);

	$id_item = $_POST['id_item'];

		foreach ($id_item  as $e ) {
			//echo $e;
			//echo "<br>";
			$consult_id_despacho = "SELECT id_despacho FROM tb_despacho WHERE irp = $irp ";
			$consulta_id_despacho = mysqli_query($conn, $consult_id_despacho);

			$id_dep = mysqli_fetch_assoc($consulta_id_despacho);

			$id_despacho = $id_dep['id_despacho'];
			//echo $id_despacho;

			
			$result_itens = "UPDATE tb_itens SET id_despacho = $id_despacho WHERE id_item=$e ";
			$resultado_itens = mysqli_query($conn, $result_itens);


			$consult_id_ata = "SELECT id_ata FROM tb_itens WHERE id_item=$e ";
			$consulta_id_ata = mysqli_query($conn, $consult_id_ata);

			$id_ata_proc = mysqli_fetch_assoc($consulta_id_ata);
			$id_ata = $id_ata_proc['id_ata'];
			//echo $id_ata;

			$result_atas = "UPDATE tb_atas SET id_despacho = $id_despacho WHERE id_ata=$id_ata ";
			$resultado_atas = mysqli_query($conn, $result_atas);

		}

	
	if($id_item){		
		header("Location: ../consultar_despacho.php");
	}else{
		header("Location: /projeto_atualizado/cadastrar/cadastrar_despacho_irp.php");	
	}

?>