<?php
include('conexao.php');

  if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){

    session_start();
    $codigo = $_SESSION['codigo'];
    $email = base64_decode($codigo);

    $nova_senha = $_POST['novasenha'];

    $nova_senha_criptografada = sha1($nova_senha);

    $sql_code = "UPDATE usuario SET senha = '$nova_senha_criptografada' WHERE email = '$email'";

    $sql_query = mysqli_query($conexao, $sql_code);

    if ($sql_query) {
      $delete_sql = "DELETE FROM codigos WHERE codigo = '$codigo'";
      $mudar = mysqli_query($conexao,$delete_sql);
      echo '<h2>Senha Alterada com sucesso!</h2> ';
    }
  }
?>
