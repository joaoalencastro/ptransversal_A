<html>

<head>
  <title>Recuperar senha</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <script type='text/javascript'>

      function index()
      {
          setTimeout("window.location='../index.html'",0001);
      }

  </script>
</head>

<body>

<?php
include('../conexao/conexao.php');

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
      echo"<script>alert('Senha alterada com sucesso! Faça o Login novamente.');</script>";
      echo"<script>index()</script>";
    }
  }
?>
</body>
</html>
