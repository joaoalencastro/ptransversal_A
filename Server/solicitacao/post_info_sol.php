<?php
require('../conexao/conexao.php');

$sql_histor = "SELECT * FROM historico WHERE status='Aprovado'";

$query = mysqli_query($conexao, $sql_histor);
while ($busca = mysqli_fetch_array($query)) {
  $nomesala           = $busca['sala'];
  $horario_da_reserva = $busca['data_hora_solicitacao'];
  $status             = "indisponivel";

  $solicitacao_aprovada[$i] = "$nomesala, " . "$horario_da_reserva, " . "$status";

  echo"$solicitacao_aprovada[$i]<br>";

  ++$i;
}

$sql_pedente = "SELECT * FROM solicitacao";

$query2 = mysqli_query($conexao, $sql_pedente);

while ($busca = mysqli_fetch_array($query2)) {
  $nomesala           = $busca['nomesala'];
  $horario_da_reserva = $busca['horario_da_reserva'];
  $status             = "pendente";

  $solicitacao_pendente[$i] = "$nomesala, " . "$horario_da_reserva, " . "$status";

  echo"$solicitacao_pendente[$i]<br>";

  ++$i;
}

?>
