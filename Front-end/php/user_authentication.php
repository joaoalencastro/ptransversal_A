<html>
<head>
<title>Autenticação Usuário</title>

<script type="text/javascript">
	//funcões para redirecionar o usuario caso for autenticado

	function login_sucesso_user_tipo1() {
		// tempo ate que a pagina redirecione em ms
		setTimeout("window.location='user_logado.php'", 3000);
	}

	function login_sucesso_user_tipo2() {
		// tempo ate que a pagina redirecione em ms
		setTimeout("window.location='user_logado.php'", 3000);
	}

	function login_falhou() {
		// tempo ate que a pagina redirecione em ms
		setTimeout("window.location='../usuarioVisitante/index.html'", 3000);
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
		  die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
		}

 	//conta quantas linhas tem no banco de dados com as informações passadas
		$row = mysqli_num_rows($result);

		if($row == 1) {
			while ($busca = mysqli_fetch_array($result)) {

				$tipo = $busca['tipo'];

				if($tipo == "comum"){
					session_start();
					$_SESSION['email']=$_POST['email'];
					$_SESSION['senha']=$_POST['senha'];
					echo "<center>Usuário tipo 1 você foi autenticado com sucesso! Aguarde um instante.</center>";
					echo "<script>login_sucesso_user_tipo1()</script>";

				} else {
					session_start();
					$_SESSION['email']=$_POST['email'];
					$_SESSION['senha']=$_POST['senha'];
					echo "<center>Usuário tipo 2 você foi autenticado com sucesso! Aguarde um instante.</center>";
					echo "<script>login_sucesso_user_tipo2()</script>";
				}
		 	}
		} else {
	// caso o numero de linha no db seja zero, ou seja não nexistem registros
			echo "<center><h1>Nome de Usuário ou senha inválido! Aguarde um instante para tentar novamente.</h1></center>";
			echo "<script>login_falhou()</script>";
		}
	?>
</body>
</html>
