<script type='text/javascript'>

		function erro_login(){
			setTimeout("window.location='../log_error/index.php?ERROR=3'",10);
		}
		
</script>
<?php
	require('../conexao/conexao.php');
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	$senha=sha1($senha);

//seleciona no banco de dados a tabela usuarios e confere se a senha digitada é a mesma do banco de dados
	$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

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

			if($tipo == "COMUM"){
				session_start();
				$_SESSION['nome']= $nome;
				$_SESSION['email']= $email;
				$_SESSION['senha']= $senha;
				$_SESSION['id']= $id_usuario;

				header('Location: ../user_logado/index.php?user');

			} else {
				session_start();
				$_SESSION['nome']= $nome;
				$_SESSION['email']= $email;
				$_SESSION['senha']= $senha;
				$_SESSION['id']= $id_usuario;

				header('Location: ../prof_logado/index.php?prof');
			}
		}
	} else {
	// caso o numero de linha no db seja zero, ou seja não nexistem registros
<<<<<<< HEAD
		echo"<script>alert('Nome de Usuário ou senha inválido!');</script>";
		header('Location: ../index.html');
=======
		echo "<script>erro_login()</script>";
>>>>>>> 296048a5fd0f0ec932e1857e1a87515f0a04b9b4
	}
?>

