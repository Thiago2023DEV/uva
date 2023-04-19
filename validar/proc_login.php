<?php
	session_start();
	include_once("../conexao/conexao.php");

	$nip = $_POST['nip'];
	$senha = $_POST['senha'];

	//echo $nip;
	//echo "<br>";
	//echo $senha;


	if((isset($_POST['nip']))  && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['nip']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
		$nip = $nip;

		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM tb_usuarios WHERE nip = '$nip' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		if(empty($resultado)){
			$_SESSION['loginErro'] = "Usuário ou senha invalído";
			header("Location:login.php");
		}elseif(isset($resultado)){
			$_SESSION['id_usuario'] = $resultado['id_usuario'];
			$_SESSION['niveis_acesso_id'] = $resultado['niveis_acesso_id'];
			$_SESSION['nip'] = $resultado['nip'];
			$_SESSION['senha'] = $resultado['senha'];
			header("Location:../index.php");
		}else{
			$_SESSION['loginErro'] = "Usuário ou senha invalído";
			header("Location:login.php");
		}

	}else{
		$_SESSION['loginErro'] = "Usuário ou senha invalído";
		header("Location:login.php");
	}

?>