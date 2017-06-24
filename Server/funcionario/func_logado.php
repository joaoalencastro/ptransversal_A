<?php
  require('../conexao/conexao.php');
  session_start();
  if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
    header("Location: login.html");
    exit;
  } else {
    $nome  =  $_SESSION['nome'];
    $email =  $_SESSION['email'];
    $senha =  $_SESSION['senha'];
    echo "<h2>$nome</h2> "."Você está logado com o E-mail: "."$email "."e senha:  "."$senha";
  }
?>
