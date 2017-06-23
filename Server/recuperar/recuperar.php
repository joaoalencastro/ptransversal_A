<?php
  include('../conexao/conexao.php');

  if(isset($_GET['codigo'])){
    session_start();
    $codigo = $_GET['codigo'];
    $_SESSION['codigo']=$_GET['codigo'];
    $email_codigo = base64_decode($codigo);
    $sql = "SELECT * FROM codigos WHERE codigo = '$codigo' AND data > NOW()";
    $selecionar = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($selecionar);

    if ($row >= 1) {
     header("Location: alterar_senha.html");
    } else {
      echo "<h1><center>Desculpe mas este link já expirou ! </center></h1>";
    }
  }
?>
