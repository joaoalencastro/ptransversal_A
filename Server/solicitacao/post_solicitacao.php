<?php

require('../conexao/conexao.php');
session_start();

date_default_timezone_get("America/Sao_Paulo");

$horario_da_reserva= $_GET['horario_da_reserva'];
$motivo=$_GET['motivo'];
$nomesala=$_GET['nomesala'];
   
$horario_solicitacao_eua = date('Y-m-d H:i:s');
$horario_solicitacao = date('d/m/Y H:i:s',  strtotime($horario_solicitacao_eua));
$solicitante = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id_usuario = $_SESSION['id'];

$sql_achar_sala = "SELECT * FROM salas2 WHERE nome='$nomesala'";

$result = mysqli_query($conexao,$sql_achar_sala);

if (!$result) {
  die('Algo deu errado na conexão para encontrar sala. Erro: ' . mysqli_error($conexao));
}

while ($busca = mysqli_fetch_array($result)){
    $id_sala = $busca['id'];
}

$sql_achar_sala_fluxo = "SELECT * FROM fluxo_sala WHERE id='$id_sala'";

$result_achar_sala = mysqli_query($conexao,$sql_achar_sala_fluxo);

$row_sala = mysqli_num_rows($result_achar_sala);

if ($row_sala == 1) {

    $sql_status = "UPDATE fluxo_sala SET status_sala='pendente' WHERE id='$id_sala'";
    $upload_status_fluxo = mysqli_query($conexao,$sql_status);
    if (!$upload_status_fluxo) {
      die('Algo deu errado na conexão para alterar o status. Erro: ' . mysqli_error($conexao));
    }

    $sql_inserir_sol =  "INSERT INTO solicitacao(solicitante, horario_da_reserva, horario_solicitacao, id_usuario, motivo, nomesala)
    VALUES('$solicitante', '$horario_da_reserva', '$horario_solicitacao', '$id_usuario', '$motivo', '$nomesala')";

    $upload_solicitacao = mysqli_query($conexao,$sql_inserir_sol);
    if (!$upload_solicitacao) {
      die('Algo deu errado na conexão para upar a solicitação. Erro: ' . mysqli_error($conexao));

    }
    echo"Solicitação Enviada à secretária com sucesso! Aguarde para ser redirecionado!";
    	sleep(4);
	 header('Location: ../user_logado/index.php');

} else {
  echo"ID não encontrado na tabela fluxo_de_dados_sala";
}

?>
