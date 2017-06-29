<?php
session_start();
require('../conexao/conexao.php');
$sala = $_POST['salas'];
$_SESSION['aux'] = $sala;
echo $sala;
?>