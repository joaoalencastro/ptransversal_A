<?php
	require('../conexao/conexao.php');
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	$senha=sha1($senha);

//seleciona no banco de dados a tabela usuarios e confere se a senha digitada é a mesma do banco de dados
	$sql = "SELECT * FROM funcionarios WHERE email = '$email' and senha = '$senha'";

	$result = mysqli_query($conexao,$sql);
	if (!$result) {
	  die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
	}

	//conta quantas linhas tem no banco de dados com as informações passadas
	$row = mysqli_num_rows($result);

	if($row == 1) {
		while ($busca = mysqli_fetch_array($result)) {

			$nome = $busca['nome'];
			$email= $busca['email'];
			$senha= $busca['senha'];
			$tipo = $busca['tipo'];
			$id_usuario = $busca['id'];

			session_start();
			$_SESSION['nome']= $nome;
			$_SESSION['email']= $email;
			$_SESSION['senha']= $senha;
			$_SESSION['id']= $id_usuario;
			header('Location: func_logado.php');

	 	}
	} else {
// caso o numero de linha no db seja zero, ou seja não nexistem registros
    echo"Dados inválidos!";
	}
?>
