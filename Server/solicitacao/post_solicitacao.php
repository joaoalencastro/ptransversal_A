<?php

require('../conexao/conexao.php');
session_start();

date_default_timezone_get("America/Sao_Paulo");

/*$dados_solicitacao= "<script>document.write(array)</script>";*/
$horario_da_reserva= $_GET['horario_da_reserva'];
$motivo=$_GET['motivo'];
$nomesala=$_GET['$nomesala'];
     
$horario_solicitacao_eua = date('Y-m-d H:i:s');
$horario_solicitacao = date('d/m/Y H:i:s',  strtotime($horario_solicitacao_eua));
$solicitante = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id_usuario = $_SESSION['id'];

$sql_achar_sala = "SELECT * FROM salas WHERE nome=$nomesala";

$result = mysqli_query($conexao,$sql_achar_sala);
if (!$result) {
  die('Algo deu errado na conexão para encontrar sala. Erro: ' . mysqli_error($conexao));
}

while ($ln = mysqli_fetch_array($result)){
  $id_sala = $ln['id'];
}

$sql_inserir_sol =  "INSERT INTO solicitacao(solicitante, horario_da_reserva, horario_solicitacao, id_usuario, motivo, nomesala)
VALUES('$solicitante', '$horario_da_reserva', '$horario_solicitacao', '$id_usuario', '$motivo', '$nomesala')";

$upload_solicitacao = mysqli_query($conexao,$sql_inserir_sol);

if (!$upload_solicitacao) {
  die('Algo deu errado na conexão para upar a solicitação. Erro: ' . mysqli_error($conexao));
}

$sql_status = "UPDATE fluxo_de_dados_sala set status='pendente' where id=$id_sala";

$upload_solicitacao = mysqli_query($conexao,$sql_status);
if (!$upload_solicitacao) {
  die('Algo deu errado na conexão para mudar o status. Erro: ' . mysqli_error($conexao));
} else {
  echo"Solicitação Enviada à secertária com sucesso!";
}
?>
