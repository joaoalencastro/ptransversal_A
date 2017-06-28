<?php
require('../../conexao/conexao.php');
session_start();
$ajax_var1 = $_POST['aux'];
$_SESSION['aux'] = $ajax_var1;
?>
