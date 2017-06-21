<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type='text/javascript'>

		function index()
		{
				setTimeout("window.location='cadastro_func.html'",0001);
		}

		</script>

</head>
<body>

<?php

require('../conexao/conexao.php');
$nome=$_POST['nome'];
$email=$_POST['email'];
$matricula=$_POST['matricula'];
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = "INSERT INTO funcionarios(nome, email, matricula, rg, senha)
	VALUES('$nome', '$email', '$matricula', '$rg', '$senha')";
	$result = mysqli_query($conexao,$sql);

	if (!$result) {
		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
	}
	echo "<center><h1>Cadastro efetuado com sucesso !</h1></center>";
} else {
	echo"<script>alert('Senhas incompatíveis! Tente novamente.');</script>";
	echo"<script>index()</script>";
}

?>

<a href="javascript:window.history.go(-1)">Voltar</a>

</body>
</html>
