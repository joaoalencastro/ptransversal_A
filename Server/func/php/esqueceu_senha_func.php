<?php
require('../../conexao/conexao.php');

  if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){

    session_start();

    $email=$_POST['email'];

    $senha=$_POST['novasenha'];
    $senha2=$_POST['novasenha2'];

    $senha=sha1($senha);
    $senha2=sha1($senha2);

    $sql = "SELECT * FROM funcionarios WHERE email = '$email'";

    $result = mysqli_query($conexao,$sql);
    if (!$result) {
      die('Algo deu errado na conexão para achar o email. Erro: ' . mysqli_error($conexao));
    }

    //conta quantas linhas tem no banco de dados com as informações passadas
    $row = mysqli_num_rows($result);

    if($row == 1) {
        if($senha===$senha2){

          $sql_code = "UPDATE funcionarios SET senha = '$senha' WHERE email = '$email'";

          $sql_query = mysqli_query($conexao, $sql_code);
          if (!$sql_query) {
            die('Algo deu errado na conexão para alterar a senha. Erro: ' . mysqli_error($conexao));
          } else {
            echo"<center><h1>Senha alterada com sucesso!</h1><center>";
          }
        } else {
          echo"<center><h1>Senhas incompatíveis. Tente novamente.</h1></center>";
        }
      } else {
        echo"<center><h1>E-mail não cadastrado. Faça seu cadastro para acessar o sistema.</h1></center>";
      }
  }
?>
