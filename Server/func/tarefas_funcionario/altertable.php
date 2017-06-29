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
$nome_solicitante = $info[1];
$data_hora_reserva = $info[2];
$data_hora_solicitacao = $info[3];
$tipo_solicitante = $info[4];

$resposta = $_POST['resposta'];

$aux = trim($resposta);

if($aux == "recusar"){

    $sql_alter = "UPDATE 'fluxo_sala' SET status_sala='disponivel' WHERE nome='$nomesala' AND data='$data_hora_reserva'";
    $result = mysqli_query($conexao,$sql_alter);
    if (!$result) {
      die('Algo deu errado na conexão para encontrar sala na tabela. Erro: ' . mysqli_error($conexao));
    } else {

          $sql_upar_historico = "INSERT INTO historico(sala, nome_funcionario, nome_solicitante, tipo_solicitante, data_hora_solicitacao, data_hora_verificacao,status)
          VALUES( '$nomesala', '$nome_funcionario', '$nome_solicitante', '$tipo_solicitante', '$data_hora_', '$data_hora_verificacao')";

          $result2 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");
    }
  } else if($aux == "aceitar") {
    $sql_alter = "UPDATE 'fluxo_sala' SET status_sala='indisponivel' WHERE nome='$nomesala' AND data='$data_hora_reserva'";
    $result = mysqli_query($conexao,$sql_alter);
    if (!$result) {
      die('Algo deu errado na conexão para encontrar sala na tabela. Erro: ' . mysqli_error($conexao));
    } else {

          $sql_upar_historico = "INSERT INTO historico(sala, nome_funcionario, nome_solicitante, tipo_solicitante, data_hora_solicitacao, data_hora_verificacao,status)
          VALUES( '$nomesala', '$nome_funcionario', '$nome_solicitante', '$tipo_solicitante', '$data_hora_', '$data_hora_verificacao')";

          $result2 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");
    }
}
?>
