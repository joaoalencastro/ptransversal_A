<?php
  $host = "localhost";
  $user = "root";
  $pass = "F-I-U-Z-A É G-A-Y";
  $db = "GAY È O FIUZA";
  $conexao = new mysqli ($host, $user, $pass, $db);
  
  // Caso algo tenha dado errado, exibe uma mensagem de erro
  if (mysqli_connect_errno()) {
      die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
      exit();
  }
?>