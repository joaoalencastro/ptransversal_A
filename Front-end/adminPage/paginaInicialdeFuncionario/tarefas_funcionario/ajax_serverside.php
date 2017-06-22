<?php
session_start();
include('conexao.php');
$i = 0;


$result = mysqli_query($conexao, "select * from solicitacao");
while ($r = mysqli_fetch_assoc($result)) {
    $nome[] = $r['nome'];
    $solicitante[] = $r['solicitante'];
    $horario_reserva[] = $r['horario_da_reserva'];
    $horario_solicitacao[] = $r['horario_solicitacao'];
    $id_user[] = $r['id_usuario'];
    $id_aux = $id_user[$i];
    $id[] = $r['ID'];
    $i++;

    $query = mysqli_query($conexao, "select * from usuario where id like $id_aux");
    while ($s = mysqli_fetch_assoc($query)) {
        $user_tipo[] = $s['tipo'];
    }
}

$json[0] = $nome;
$json[1] = $solicitante;
$json[2] = $horario_reserva;
$json[3] = $horario_solicitacao;
$json[4] = $user_tipo;
$json[5] = $id;
echo json_encode($json);
?>