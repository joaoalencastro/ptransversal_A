<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM materias";
$result = mysqli_query($conexao, $sql);

while($r = mysqli_fetch_array($result)){
    $nome[] = $r['nome']; 
}
$test =json_encode($nome);
echo $test;
?>    
