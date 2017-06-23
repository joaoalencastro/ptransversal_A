<html>

<head>
  <title>Recuperar senha</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type='text/javascript'>

      function index()
      {
          setTimeout("window.location='login.html'",0001);
      }

      </script>
</head>

<body>

<?php

  include('../conexao/conexao.php');

  date_default_timezone_get("America/Sao_Paulo");
  ini_set('smtp_port', '587');

  if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'){
    //filtra caracteres especiais
    $email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $verificar = mysqli_query($conexao,$sql);

    if(mysqli_num_rows($verificar) == 1){
      $codigo = base64_encode($email);
      $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
      $mensagem ="<html>
                    <head></head>
                      <body>
                        <h1>Reservas de Salas - ENE</h1><br>
                        <h2>Recebemos uma tentativa de recuperação de senha para este e-mail.</h2>
                        <p>Caso não tenha solicitado, por favor, desconsidere este e-mail. Caso contrário clique no link abaixo para alterar a senha.<br><br>
                        <a href= http://homol.redes.unb.br/ptr012017-B-grupoA/recuperar/recuperar.php?codigo=".$codigo.">Recuperar Senha</a></p><br><br>
                        <p>Departamento de Engenharia Elétrica</p>
                      </body>
                  </html>";


      $email_remetente = 'reservado.ene@gmail.com';

      $assunto = 'Recuperação de senha';

      $headers = "Content-type: text/html; charset=utf-8\r\n";

      $inserir =  mysqli_query($conexao,"INSERT INTO codigos SET codigo = '$codigo', data = '$data_expirar'");

      if($inserir) {
        if(mail("$email","$assunto","$mensagem", $headers, "-f$email_remetente")){
          echo"<script>alert('Enviamos um link para a recuperação de senha, para o endereço de e-mail indicado !');</script>";
          echo"<script>index()</script>";

        }
      }
    } else {
      echo"<script>alert('O E-mail digitado não está cadastrado. Por favor, tente novamente com um E-mail cadastrado.');</script>";
      echo"<script>index()</script>";
    }
  }
?>

</body>
</html>
