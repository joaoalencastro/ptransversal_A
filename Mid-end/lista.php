<html  = lang"pt-br">
<head>
<title>Requisitando...</title>
</head>
<body>

<?php
include('conexao.php');
$sql_get_dados = mysql_query("SELECT * FROM cadastro");
while ($ln = mysql_fetch_array($sql_get_dados)){
echo "<br>";
$nome      = $ln['nome'];
$email     = $ln['email'];
$matricula = $ln['matricula'];
$rg        = $ln['rg'];
$senha     = $ln['senha'];
echo "Nome: " . $nome . " - Email: " . $email . " - Matrícula: " . $matricula . " - RG: " . $rg . " - Senha: " . $senha . "<br>";
}
?>

</body>
</html>