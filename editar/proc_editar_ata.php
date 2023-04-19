<?php
	session_start();
	include_once("../conexao/conexao.php");

    $id_ata = filter_input(INPUT_POST,'id_ata');
    $ata = filter_input(INPUT_POST,'ata');
    $vigencia = filter_input(INPUT_POST,'vigencia');
    $data = date('Y-m-d', strtotime($vigencia));
    $uasg = filter_input(INPUT_POST,'uasg');
    $empresa = filter_input(INPUT_POST,'empresa');
    $cnpj = filter_input(INPUT_POST,'cnpj');
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


     $result_item = "UPDATE tb_atas SET ata='$ata',  vigencia='$data', uasg='$uasg',  nome_empresa='$empresa', cnpj ='$cnpj'WHERE id_ata='$id_ata' ";
    $resultado_item = mysqli_query($conn, $result_item);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Editado com sucesso</p>";
        header("Location: ../consultar_ata.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Não foi editado </p>";
        header("Location: ../login.php");
}

?>