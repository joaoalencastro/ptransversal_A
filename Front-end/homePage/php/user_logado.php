<?php
  include('conexao.php');
  session_start();
  if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
    header("Location: ../usuarioVisitante/index.html");
    exit;
  } else {
    header("Location: ../usuarioCadastrado/index.html");
  }
?>
