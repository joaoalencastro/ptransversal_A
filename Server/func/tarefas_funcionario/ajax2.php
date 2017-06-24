<?php
session_start();
require('conexao.php');


      $id = $_SESSION['aux'];
$result = mysqli_query($conexao, "select * from solicitacao where ID like $id");
    while ($r = mysqli_fetch_assoc($result)) {
        $nome = $r['nomesala'];
        $solicitante = $r['solicitante'];
        $horario_reserva = $r['horario_da_reserva'];
        $horario_solicitacao = $r['horario_solicitacao'];
        $id_user = $r['id_usuario'];
        $obs = $r['motivo'];

        $query = mysqli_query($conexao, "select * from usuario where id like $id_user");
        while ($s = mysqli_fetch_assoc($query)) {
            $user_tipo[] = $s['tipo'];
        }
    }


    $json[0] = $nome;
    $json[1] = $solicitante;
    $json[2] = $horario_reserva;
    $json[3] = $horario_solicitacao;
    $json[4] = $user_tipo;
    $json[5] = $obs;

    $_SESSION['json'] = $json;

    echo json_encode($json);


?>