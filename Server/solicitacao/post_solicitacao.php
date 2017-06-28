<?php

require('../conexao/conexao.php');
session_start();
//date_default_timezone_get("America/Sao_Paulo");
$horario_da_reserva= $_GET['horario_da_reserva'];
$motivo=$_GET['motivo'];
$nomesala=$_GET['nomesala'];
$dias=$_GET['dia'];
$solicitante = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id_usuario = $_SESSION['id'];
$horario_solicitacao_eua = date('Y-m-d H:i:s');
$horario_solicitacao = date('d/m/Y H:i:s', strtotime($horario_solicitacao_eua));
$status ="pendente";

$sql_status = "INSERT INTO fluxo_sala(status_sala, nome, data, dias)
VALUES('$status', '$nomesala', '$horario_da_reserva', '$dias')";

$upload_status_fluxo = mysqli_query($conexao,$sql_status);

if (!$upload_status_fluxo) {
  die('Algo deu errado na conexão para alterar o status. Erro: ' . mysqli_error($conexao));
} else {
  $sql_inserir_sol =  "INSERT INTO solicitacao(solicitante, horario_da_reserva, horario_solicitacao, id_usuario, motivo, nomesala)
  VALUES('$solicitante', '$horario_da_reserva', '$horario_solicitacao', '$id_usuario', '$motivo', '$nomesala')";

  $upload_solicitacao = mysqli_query($conexao,$sql_inserir_sol);
  if (!$upload_solicitacao) {
    die('Algo deu errado na conexão para upar a solicitação. Erro: ' . mysqli_error($conexao));
  } else echo "<script type=\"text/javascript\">alert('Solicitacao enviada à secretaria com sucesso!');location.href=\"../user_logado/index.php\";</script>";

}

?>
