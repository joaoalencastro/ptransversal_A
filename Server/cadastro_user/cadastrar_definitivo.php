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
    echo"<script>alert('Dados Inválidos. Tente novamente.');</script>";
    echo "<script>index()</script>";
	
} else if ($autenticado == 2){
    echo"<script>alert('Usuário já cadastrado!');</script>";
    header('Location: ../index.html');
} else {
  	$sql = "INSERT INTO usuario(nome, email, matricula, data_nascimento, tipo, rg, senha)
  	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";
  	$result = mysqli_query($conexao,$sql);

    if (!$result) {
  		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
  	}

  	echo "<center><h1>Usuaŕio cadastrado com sucesso!</h1></center>";
   	session_destroy();
  	header('Location: ../index.html');
  }

?>
