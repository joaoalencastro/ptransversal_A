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
}
if (!$autenticado) {
   	header('Location: ../log_error/index.php?ERROR=4'); // Dados inválidos, retorna para o index e aprenseta a mensagem
	
} else if ($autenticado == 2){
   	header('Location: ../log_error/index.php?ERROR=5');	//Usuário já cadastrado, retorna para o index e apresenta a mensagem
	
} else {
  	$sql = "INSERT INTO usuario(nome, email, matricula, data_nascimento, tipo, rg, senha)
  	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";
  	$result = mysqli_query($conexao,$sql);

    if (!$result) {
  		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
  	}
	session_destroy();
	header('Location: ../log_error/index.php?SUCESS=1'); //Usuário cadastrado com sucesso, retorna para o index e apresenta a mensagem
  }

?>
