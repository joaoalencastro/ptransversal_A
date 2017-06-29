<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM fluxo_sala";
$result = mysqli_query($conexao, $sql);
while($r = mysqli_fetch_array($result))
{
    $stat[]= $r['status_sala'];
    $nome[] = $r['nome'];
    $data[] = $r['data'];
    $dias[] = $r['dias'];
}
$json[0] = $nome;
$json[1] = $dias;
$json[2] = $data;
$json[3] = $stat;
echo json_encode($json);

?>
