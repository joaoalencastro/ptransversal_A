<?php
require('../../conexao/conexao.php');
session_start();

date_default_timezone_set('America/Sao_Paulo');
$data_hora_verificacao_eua = date('Y-m-d H:i:s');
$data_hora_verificacao = date('d/m/Y H:i:s', strtotime($horario_solicitacao_eua));

$id_solit = $_SESSION['aux'];
$nome_funcionario = $_SESSION['nome'];

$info = $_SESSION['json'];
$nomesala = $info[0];
$data_hora_reserva = $info[2];

$resposta = $_POST['resposta'];

$aux = trim($resposta);

$result0 = mysqli_query($conexao, "SELECT * FROM usuario WHERE id='$id_solit'");
if (!$result0) {
  die('Algo deu errado na conexão para encontrar o tipo de usuario. Erro: ' . mysqli_error($conexao));
} else {
  while($r = mysqli_fetch_assoc($result0)) {
      $tipo_solicitante = $r['tipo'];
  }
}


if($aux == "recusar"){

    $sql_alter = "UPDATE 'fluxo_sala' SET status_sala='disponivel' WHERE nome='$nomesala' AND data=$data_hora_reserva";
    $result = mysqli_query($conexao,$sql_alter);
    if (!$result) {
      die('Algo deu errado na conexão para encontrar sala na tabela. Erro: ' . mysqli_error($conexao));
    } else {

        $sql_sol = "SELECT * FROM solicitacao WHERE nomesala = '$nomesala' and horario_da_reserva = '$data_hora_reserva'";

        $result1 = mysqli_query($conexao,$sql_sol);
        if (!$result1) {
          die('Algo deu errado na conexão para selecionar na tabela. Erro: ' . mysqli_error($conexao));
        } else {

          $row = mysqli_num_rows($result1);

          if($row == 1) {
            while ($busca = mysqli_fetch_array($result1)) {

              $nome_solicitante = $busca['solicitante'];
              $data_hora_solicitacao = $busca['horario_solicitacao'];
            }

          $sql_upar_historico = "INSERT INTO historico(sala, nome_funcionario, nome_solicitante, tipo_solicitante, data_hora_solicitacao, data_hora_verificacao,status)
          VALUES( '$nomesala', '$nome_funcionario', '$nome_solicitante', '$tipo_solicitante', '$data_hora_solicitacao', '$data_hora_verificacao')";


          $result2 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");
          }
        }
    }

  } else if($aux == "aceitar") {
  $sql_alter = "UPDATE 'fluxo_sala' SET status_sala='indisponivel' WHERE nome='$nomesala' AND data=$data_hora_reserva";
  $result = mysqli_query($conexao,$sql_alter);
  if (!$result) {
    die('Algo deu errado na conexão para encontrar sala na tabela. Erro: ' . mysqli_error($conexao));
  } else {

      $sql_sol = "SELECT * FROM solicitacao WHERE nomesala = '$nomesala' and horario_da_reserva = '$data_hora_reserva'";

      $result1 = mysqli_query($conexao,$sql_sol);
      if (!$result1) {
        die('Algo deu errado na conexão para selecionar na tabela. Erro: ' . mysqli_error($conexao));
      } else {

        $row = mysqli_num_rows($result1);

        if($row == 1) {
          while ($busca = mysqli_fetch_array($result1)) {

            $nome_solicitante = $busca['solicitante'];
            $data_hora_solicitacao = $busca['horario_solicitacao'];
          }

        $sql_upar_historico = "INSERT INTO historico(sala, nome_funcionario, nome_solicitante, tipo_solicitante, data_hora_solicitacao, data_hora_verificacao,status)
        VALUES( '$nomesala', '$nome_funcionario', '$nome_solicitante', '$tipo_solicitante', '$data_hora_solicitacao', '$data_hora_verificacao')";


        $result2 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");
        }
      }
    }
}

?>
