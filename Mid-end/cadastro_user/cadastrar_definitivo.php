<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type='text/javascript'>

		function index(){
				setTimeout("window.location='cadastro_user.html'",0003);
		}

		</script>

</head>
<body>
<?php

session_start();

require('../conexao/conexao.php');

$matricula=$_SESSION['email'];

$sql = "SELECT * FROM usuariodef WHERE matricula=$matricula";

$result = mysqli_query($conexao,$sql);
if (!$result) {
  die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

while ($ln = mysqli_fetch_array($result)){

$nome      = $ln['nome'];
$email     = $ln['email'];
$matricula = $ln['matricula'];
$datanascimento = $ln['datanascimento'];
$tipo = 1;
$rg        = $ln['rg'];
$senha     = $ln['senha'];
$autenticado = $ln['autenticado'];
  if (!$autenticado) {
      echo"<script>alert('Dados Inválidos. Tente novamente.');</script>";
  } else {
    	$sql = "INSERT INTO usuario(nome, email, matricula, datanascimento, tipo, rg, senha)
    	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";
    	$result = mysqli_query($conexao,$sql);

      if (!$result) {
    		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
    	}

    	echo "<center><h1>Usuaŕio cadastrado com sucesso!</h1></center>";
      session_destroy();
    	echo "<script>index()</script>";
    }
}

?>

<a href="javascript:window.history.go(-1)">Voltar</a>

</body>
</html>