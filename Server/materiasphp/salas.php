<?php
require('../conexao/conexao.php');
$sql = "SELECT * FROM salas2";
$result = mysqli_query($conexao, $sql);
while($r = mysqli_fetch_array($result))
{
    $nome[] = $r['nome'];
}
$json[0] = $nome;
echo json_encode($json);

?>
