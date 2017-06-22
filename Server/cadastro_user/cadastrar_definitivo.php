<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type='text/javascript'>

		function index(){
				setTimeout("window.location='../index.html'",3000);
		}

		</script>

</head>
<body>
<?php

session_start();

require('../conexao/conexao.php');

$matricula=$_SESSION['matricula'];

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
  if ($autenticado==0) {
      echo"<script>alert('Dados Inválidos. Tente novamente.');</script>";
  } else {
    	$sql = "INSERT INTO usuario(nome, email, matricula, data_nascimento, tipo, rg, senha)
    	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";
    	$result = mysqli_query($conexao,$sql);

      if (!$result) {
    		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
    	}

    	echo"<script>alert('Usuário Cadastrado com sucesso!');</script>";
      session_destroy();
    	echo "<script>index()</script>";
    }
}

?>
</body>
</html>
