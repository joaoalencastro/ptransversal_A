<?php
require('../../conexao/conexao.php');
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$email=$_POST['email'];
$tipo=2;
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];
$datanascimento = $_POST['datanascimento'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = "INSERT INTO usuario(nome, matricula, email, tipo, rg, senha, datanascimento)
	VALUES('$nome', '$matricula', '$email', '$tipo', '$rg', '$senha', '$datanascimento')";
	$result = mysqli_query($conexao,$sql);

	if (!$result) {
		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
	}
	echo"Cadastro efetuado com sucesso!";
} else {
	echo"Senhas incompatíveis!";
}
?>
