<html>
<head>
<title>Autenticação Usuário</title>

<script type="text/javascript">
	//funcões para redirecionar o usuario caso for autenticado
	function login_sucesso() {
		// tempo ate que a pagina redirecione em ms
		setTimeout("window.location='login.php'", 5000);
	}

	function login_falhou() {
		// tempo ate que a pagina redirecione em ms
		setTimeout("window.location='login.php'", 5000);
	}

</script>
</head>

<body>
	<?php
		include('conexao.php');
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$senha=sha1($senha);

	//seleciona no banco de dados a tabela usuarios e confere se a senha digitada é a mesma do banco de dados
		$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

		$result = mysqli_query($conexao,$sql);
		if (!$result) {
		  die('Error: ' . mysqli_error($conexao));
		}

 	//conta quantas linhas tem no banco de dados
		$row = mysqli_num_rows($result);

		if($row > 0) {
			session_start();
			$_SESSION['email']=$_POST['email'];
			$_SESSION['senha']=$_POST['senha'];
			echo "<center>Você foi autenticado com sucesso! Aguarde um instante.</center>";
			echo "<script>login_sucesso()</script>";
		}

		else {
	// caso o numero de linha no db seja zero, ou seja não nexistem registros
			echo "<center>Nome de Usuário ou senha inválido! Aguerde um instante para tentar novamente.</center>";
			echo "<script>login_falhou()</script>";
		}
	?>


</body>
</html>
