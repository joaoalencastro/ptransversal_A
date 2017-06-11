<?php
echo "aqui0";
  include('conexao.php');


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


      $mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail. Caso não tenha solicitado,
      porfavor, desconsidere este e-mail. Caso contrário clique no link abaixo para alterar a senha.<br /> <a href="http://localhost/ptransversal_A/Mid-end/recuperar/recuperar.php?codigo=
      '.$codigo.'">Recuperar Senha</a></p>';

      $email_remetente = '//email servidor';

      $headers = "MINE-Version: 1.1\n";
      $headers = "Content-type: text/html; charset=iso-8859-1\n";
      $headers = "From: $email_remetente\n";
      $headers = "Return-Path: $email_remetente\n";
      $headers = "Reply-To: $email\n";
      $inserir =  mysqli_query($conexao,"INSERT INTO codigos SET codigo = '$codigo', data = '$data_expirar'");
      if($inserir) {
        if(mail("$email","$assunto","$mensagem", $headers, "-f$email_remetente")){
          echo 'Enviamos um e-mail para a recuperação de senha, para o endereço indicado';
        }
      }
    } else {
      echo "<h1>O email digitado não está cadastrado !</h1>";
    }
  }
?>
