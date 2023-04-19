<?php

	session_start();
	include_once("../conexao/conexao.php");

	//$ata_escolha = $_POST['ata_escolha'];
    //echo $ata_escolha;

    $quant_itens = "<script>document.write(count)</script>";;

    
/*
    $ata = filter_input(INPUT_POST, 'ata');
    $uasg = filter_input(INPUT_POST, 'uasg');
    $item = filter_input(INPUT_POST, 'item');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $uf = filter_input(INPUT_POST, 'uf');
    $qtde = filter_input(INPUT_POST, 'qtde');
    $pu = filter_input(INPUT_POST, 'pu');
    $pt = filter_input(INPUT_POST, 'pt');
   	$id_ata = filter_input(INPUT_POST, 'id_ata');
*/
   	//echo $id_ata;
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
    $dados = $_POST;
    $count = count($_POST['item']);
    //echo "<pre>";
    //var_dump($dados);
    //echo "</pre>";

    for ($i=0; $i < $count; $i++) { 
        $result_itens = " INSERT INTO tb_itens(id_ata, descricao, qtd, preco_unitario, preco_total, uf, item) VALUES ('{$_POST['id_ata'][$i]}', '{$_POST['descricao'][$i]}', '{$_POST['qtde'][$i]}', '{$_POST['pu'][$i]}', '{$_POST['pt'][$i]}', '{$_POST['uf'][$i]}', '{$_POST['item'][$i]}') ";
        $resultado_itens = mysqli_query($conn, $result_itens);
    }

    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
        header("Location: ../index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Produto não foi cadastrado com sucesso</p>";
        header("Location: projeto_atualizado/validar/login.php");
    }
/*
    $result_itens = "INSERT INTO tb_itens (id_ata, descricao, qtd, preco_unitario, preco_total, uf, item) VALUES ('$id_ata', '$descricao', '$qtde', '$pu', '$pt', '$uf', '$item')";
	$resultado_itens = mysqli_query($conn, $result_itens);

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
		header("Location: ../index.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Produto não foi cadastrado com sucesso</p>";
		header("Location: projeto_atualizado/validar/login.php");
	}
*/

?>