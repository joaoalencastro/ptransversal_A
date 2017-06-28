<?php
require('../../conexao/conexao.php');
session_start();

$resposta = $_POST['resposta'];
$info = $_SESSION['json'];
$aux = trim($resposta);
$id_solit = $_SESSION['aux'];
if($aux == "recusar"){
        $nome_sala = $info[0];
        $horario = $info[2];
    $result = mysqli_query($conexao, "select idfluxo from salas where nome like $nome_sala");
    while($r = mysqli_fetch_assoc($result)) {
        $idfluxo[] = $r['idfluxo'];
    }
    $resultado = mysqli_query($conexao, "UPDATE 'fluxo_de_dados_sala' SET 'status_sala' = 'disponivel' WHERE id like $idfluxo");
    $result1 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");

}else if($aux == "aceitar"){
    $nome_sala = $info[0];
    echo $nome_sala;
    $horario = $info[2];
    $result = mysqli_query($conexao, "select idfluxo from salas where nome like $nome_sala");
    while($r = mysqli_fetch_assoc($result)) {
        $idfluxo[] = $r['idfluxo'];
    }
    $resultado = mysqli_query($conexao, "UPDATE fluxo_de_dados_sala SET status_sala = 'indisponivel' WHERE id like $idfluxo");
    $result1 = mysqli_query($conexao, "DELETE FROM solicitacao WHERE ID like $id_solit");
}


?>
