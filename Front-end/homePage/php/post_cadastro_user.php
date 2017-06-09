<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
</head>
<body>

<?php
include('conexao.php');
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$email=$_POST['email'];
$tipo=$_POST['tipo'];
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = mysqli_query($conexao, "INSERT INTO usuario(nome, matricula, email, tipo, rg, senha)
	VALUES('$nome', '$matricula', '$email', '$tipo', '$rg', '$senha')");
	echo "<center><h1>Cadastro efetuado com sucesso !</h1></center>";
}
else echo "<center><h1>Senhas não compativeis.</center></h1>";
?>

<a href="javascript:window.history.go(-1)">Voltar</a>

</body>
</html>
