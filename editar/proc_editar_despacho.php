<?php

	session_start();
	include_once("../conexao/conexao.php");

	$id_despacho = $_POST['id_despacho'];
	$ata = $_POST['ata'];
	$uasg = $_POST['uasg'];
	$contador = $_POST['contador'];
	//echo $contador;

    $de = 1;

	$data = $_POST;
	//echo "<pre>";
	//var_dump($data);

	$count = count($_POST['item']);

	for ($i=0; $i < $count; $i++) { 
		$result_item = "UPDATE tb_itens SET descricao='{$_POST['descricao'][$i]}', qtd='{$_POST['qtde'][$i]}', preco_unitario ='{$_POST['pu'][$i]}', preco_total='{$_POST['pt'][$i]}', uf='{$_POST['uf'][$i]}'  WHERE id_item ='{$_POST['id_item'][$i]}' ";
		$resultado_item = mysqli_query($conn, $result_item);
	}

	   if($de == 1){
        $_SESSION['msg'] = "<p style='color:green;'>Editado com sucesso</p>";
        header("Location: ../consultar_despacho.php");
    }
	//echo $id_despacho;
	//echo $ata;
	//echo $uasg;

/*
	//$item = $_POST['item'];
	$descricao =$_POST['descricao'];
	$uf = $_POST['uf'];
	$qtde = $_POST['qtde'];
	$pu = $_POST['pu'];
	$pt = $_POST['pt'];

	echo "<pre>";
	var_dump($item);
	echo "</pre>";

	echo"<br>";
	echo "<pre>";
	var_dump($descricao);
	echo "</pre>";
 

	//$name = $_POST['name'];
	//$email = $_POST['account'];

	foreach( $item as $key => $n ) {
	
		echo "<pre>";
		 echo  $item[$key];
		 echo"<br>";
 		 echo  $descricao[$key];
 		 echo"<br>";
 		 echo  $uf[$key];
 		 echo"<br>";
 		 echo  $qtde[$key];
 		 echo"<br>";
 		 echo  $pu[$key];
 		 echo"<br>";
 		 echo  $pt[$key];
 		 echo "</pre>";
 		 if ($item[$key] = $item[$key]) {
 		 	$result_item = "UPDATE tb_itens SET descricao='$descricao[$key]', qtd=$qtde[$key], preco_unitario ='$pu[$key]', preco_total='$pt[$key]', uf='$uf[$key]'  WHERE id_despacho='$id_despacho' ";
		 	$resultado_item = mysqli_query($conn, $result_item);
 		 }
 		  
		
	
 		
	}
	
/*		
	for($i = 0; $i < $contador; $i ++){
	//	echo "<pre>";
	//	echo $item[$i];
	//	echo "</pre>";
		//echo "<pre>";
		//echo $descricao[$i];
		//echo "</pre>";

		$result_item = "UPDATE tb_itens SET descricao='$descricao[$i]',  uf='$uf[$i]',  qtd='$qtde[$i]', preco_unitario ='$pu[$i]', preco_total='$pt[$i]'  WHERE id_despacho='$id_despacho' ";
		$resultado_item = mysqli_query($conn, $result_item);
	}
*/
	//if(mysqli_affected_rows($conn)){
	//	$_SESSION['msg'] = "<p style='color:green;'>Editado com sucesso</p>";
	//	header("Location: ../consultar.php");
	//}else{
	//	$_SESSION['msg'] = "<p style='color:red;'>Não foi editado </p>";
	//	header("Location: ../login.php");
//}
	
?>