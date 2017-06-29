<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM historico";
$result = mysqli_query($conexao, $sql);
while($r = mysqli_fetch_array($result))
{
    $sala[]= $r['sala'];
    $nome_fun[] = $r['nome_funcionario'];
    $nome_sol[] = $r['nome_solicitante'];
    $tipo[] = $r['tipo_solicitante'];
    $data_soli[] = $r['data_hora_solicitacao'];
    $data_ver[]= $r['data_hora_verificacao'];
    $status[]= $r['status'];
}
$json[0] = $sala;
$json[1] = $nome_fun;
$json[2] = $nome_sol;
$json[3] = $tipo;
$json[4] = $data_soli;
$json[5] = $data_ver;
$json[6] = $status;
echo json_encode($json);


?>