<?php
  include('conexao.php');

  if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $email_codigo = base64_decode($codigo);

    $sql = "SELECT * FROM codigos WHERE codigo = '$codigo' AND data > NOW()";
    $selecionar = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($selecionar) >= 1){

      if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){

        $nova_senha = $_POST['novasenha'];

        $nova_senha_criptografada = sha1($nova_senha);

        $sql_code = "UPDATE usuario SET senha = '$nova_senha_criptografada' WHERE email = '$email'";
        $sql_query = mysqli_query($conexao, $sql_code);

        if ($sql_query) {
          $mudar = mysqli_query($conexao,"DELETE `recupera_senha` WHERE codigo = '$codigo'");
          echo 'Senha Alterada com sucesso';
        }
      }
?>
<h1>Digite a senha nova</h1>
<form action="" method="post" enctype="multpart/form/data">
  <input type="passaword" name="novasenha" value="" />

  <input type="hidden" name="acao" value="mudar" />
  <input type="submit" value="Mudar Senha" />
</form>
<?php
    } else {
      echo "<h1><center>Desculpe mas este link já expirou ! </center></h1>"
    }
  }
?>
