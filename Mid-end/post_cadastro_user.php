<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
</head>
<body>

<?php
include('conexao.php');
$nome=$_POST['nome'];
$email=$_POST['email'];
$matricula=$_POST['matricula'];
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = mysqli_query($conexao, "INSERT INTO usuario(nome, email, matricula, rg, senha)
	VALUES('$nome', '$email', '$matricula', '$rg', '$senha')");
	echo "<center><h1>Cadastro Efetuado com Sucesso</h1></center>";
}
else echo "Senhas nao compativeis";
?>

<a href="javascript:window.history.go(-1)">Voltar</a>

</body>
</html>
