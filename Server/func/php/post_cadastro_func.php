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
	echo"Senhas incompatíveis!";
}
?>
