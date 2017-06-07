<?php
$host = "localhost";
$user = "projeto";
$pass = "grupoass123";
$db = "sistemareservadodb";
$conexao = new mysqli ($host, $user, $pass, $db);

// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>
