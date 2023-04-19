<?php

	   include_once("../conexao/conexao.php");

	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$descricao = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "descricao: $descricao <br>";
				
				$qtd = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "qtd: $qtd <br>";
				
				$preco_unitario = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "preco_unitario: $preco_unitario <br>";

				$preco_total = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "preco_total: $preco_total <br>";

				$uf = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "uf: $uf <br>";

				$item = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "item: $item <br>";
				
				echo "<hr>";
				
				//Inserir o usuário no BD
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO usuarios (nome, email, niveis_acesso_id) VALUES ('$nome', '$email', '$niveis_acesso_id')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			}
			$primeira_linha = false;
		}
	}
?>