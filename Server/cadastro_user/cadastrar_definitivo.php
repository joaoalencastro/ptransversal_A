<?php
session_start();
require('../conexao/conexao.php');

$matricula=$_SESSION['matricula'];

$sql = "SELECT * FROM usuariodef WHERE matricula='$matricula'";

$result = mysqli_query($conexao,$sql);

if (!$result) {
  die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}
$row = mysqli_num_rows($result);

while ($ln = mysqli_fetch_array($result)){
$nome      = $ln['nome'];
$email     = $ln['email'];
$matricula = $ln['matricula'];
$datanascimento = $ln['datanascimento'];
$tipo = 1;
$rg        = $ln['rg'];
$senha     = $ln['senha'];
$autenticado = $ln['autenticado'];
}

if ($autenticado == 1) {

	$sql = "INSERT INTO usuario(nome, email, matricula, data_nascimento, tipo, rg, senha)
	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";

	$result1 = mysqli_query($conexao,$sql);

	  if (!$result1) {
		die('Algo deu errado. Erro: ' . mysqli_error($conexao));

		} else {
		session_destroy();
		$sql_delete = "TRUNCATE usuariodef";
		$result_delete = mysqli_query($conexao,$sql_delete);
		 header('Location: ../log_error/index.php?SUCESS=1'); //Cadastrado
		}

} else if ($autenticado == 2) {
	session_destroy();
	$sql_delete = "TRUNCATE usuariodef";
	$result_delete = mysqli_query($conexao,$sql_delete);
	header('Location: ../log_error/index.php?ERROR=5'); // Já cadastrado

} else if ($autenticado == 0) {
  	session_destroy();
	$sql_delete = "TRUNCATE usuariodef";
	$result_delete = mysqli_query($conexao,$sql_delete);
	header('Location: ../log_error/index.php?ERROR=4'); // Dados inválidos
}

?>
