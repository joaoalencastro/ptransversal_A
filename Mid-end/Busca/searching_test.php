<?php
$pesquisa = $_POST["pesquisa"];

$db = new mysqli('localhost', 'root', '', 'blabla');

//Vendo o Status da sala de acordo com o nome digitado

$sql= mysqli_query($db, "select status from diatabela where nome like '$pesquisa'");
$ln = mysqli_fetch_array($sql);
$status = $ln['status'];

echo "Status:". $status;


?>
