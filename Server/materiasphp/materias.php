<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM materias";
$result = mysqli_query($conexao, $sql);
while($r = mysqli_fetch_array($result))
{
    $nome[] = $r['nome']; 
    $vagas[] = $r['vagas'];
    $professor[] = $r['professor'];
    $codigo[] = $r['codigo'];
    $dias[] = $r['dias'];
    $local[] = $r['locais'];
    $horario[] = $r['horario'];

}
$json[0] = $nome;
$json[1] = $vagas;
$json[2] = $professor;
$json[3] = $codigo;
$json[4] = $dias;
$json[5] = $local;
$json[6] = $horario;
echo json_encode($json);
?>    
