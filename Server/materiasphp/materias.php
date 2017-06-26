<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM materias";
$result = mysqli_query($conexao, $sql);

$r = mysqli_fetch_array($result);
    $nome = $r['nome']; 
    $vagas = $r['vagas'];
    $professor = $r['professor'];


$json[0] = $nome;
$json[1] = $vagas;
$json[2] = $professor;
$test =json_encode($json);
echo $test;
?>    
