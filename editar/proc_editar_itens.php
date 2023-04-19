<?php
	session_start();
	include_once("../conexao/conexao.php");

    $ata = filter_input(INPUT_POST, 'ata');
    $uasg = filter_input(INPUT_POST, 'uasg');


    $item = filter_input(INPUT_POST, 'item');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $uf = filter_input(INPUT_POST, 'uf');
    $qtde = filter_input(INPUT_POST, 'qtde');
    $pu = filter_input(INPUT_POST, 'pu');
    $pt = filter_input(INPUT_POST, 'pt');
   	$id_item = filter_input(INPUT_POST, 'id_item');

   	//echo $id_item;

/*
   	echo $ata;
    echo "<br/>";
    echo $uasg;
    echo "<br/>";
    echo $item;
    echo "<br/>";
    echo $descricao;
    echo "<br/>";
    echo $uf;
    echo "<br/>";
    echo $qtde;
    echo "<br/>";
    echo $pu;
    echo "<br/>";
    echo $pt;
*/


    $result_item = "UPDATE tb_itens SET item='$item',  descricao='$descricao',  uf='$uf',  qtd='$qtde', preco_unitario ='$pu', preco_total='$pt'  WHERE id_item='$id_item' ";
	$resultado_item = mysqli_query($conn, $result_item);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Editado com sucesso</p>";
		header("Location: ../consultar.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Não foi editado </p>";
		header("Location: ../login.php");
}

?>