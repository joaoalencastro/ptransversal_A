<html  = lang"pt-br">
<head>
<title>Cadastrando...</title>
</head>
<body>

<?php
include('conexao.php');
$nome=$_POST['nome'];
$email=$_POST['email'];
$matricula=$_POST['matricula'];
$rg=$_POST['rg'];
$senha=$_POST['senha'];
$sql = mysqli_query($conexao, "INSERT INTO cadastro(nome, email, matricula, rg, senha)
VALUES('$nome', '$email', '$matricula', '$rg', '$senha')");
echo "<center><h1>Cadastro Efetuado com Sucesso</h1></center>";
?>

</body>
</html>