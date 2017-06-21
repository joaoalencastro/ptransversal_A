<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type='text/javascript'>

		function chama_cadastrar(){
			setTimeout("window.location='cadastrar_definitivo.php'",3000);
		}

		function index(){
				setTimeout("window.location='../index.html'",3000);
		}

		</script>

</head>
<body>

<?php

require('../conexao/conexao.php');
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$email=$_POST['email'];
$datanascimento=$_POST['datanascimento'];
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = "INSERT INTO usuario_transitorio(nome, email, senha, datanascimento, matricula, rg)
	VALUES( '$nome', '$email', '$senha', '$datanascimento', '$matricula', '$rg')";
	$result = mysqli_query($conexao,$sql);

	if (!$result) {
		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
	} else {
		session_start();
		$_SESSION['matricula']=$_POST['matricula'];
		echo "<center><h1>Autenticando...</h1></center>";
		echo "<script>chama_cadastrar()</script>";
	}

} else {
	echo"<script>alert('Senhas incompatíveis!');</script>";
	echo"<script>index()</script>";
}
?>

<a href="javascript:window.history.go(-1)">Voltar</a>

</body>
</html>
