<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema_de_reserva";
$conexao =@mysql_connect($host,$user, $pass) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());
?>