<?php
  $host = "localhost";
  $user = "root";
  $pass = "grupoass123";
  $db = "sistemareservadodb";
  $conexao = new mysqli ($host, $user, $pass, $db);

  // Caso algo tenha dado errado, exibe uma mensagem de erro
  if (mysqli_connect_errno()) {
      die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
      exit();
  }
?>
