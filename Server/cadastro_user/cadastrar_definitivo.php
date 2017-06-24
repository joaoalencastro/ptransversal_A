<script type='text/javascript'>

		function dado_invalido(){
			setTimeout("window.location='../log_error/index.php?ERROR=4'",10);
		}
		function ja_existe(){
			setTimeout("window.location='../log_error/index.php?ERROR=5'",10);
		}
		function cadastrado(){
			setTimeout("window.location='../log_error/index.php?SUCESS=1'",10);
		}
		
</script>
<?php

session_start();

require('../conexao/conexao.php');

$matricula=$_SESSION['matricula'];

$sql = "SELECT * FROM usuariodef WHERE matricula=$matricula";

$result = mysqli_query($conexao,$sql);
if (!$result) {
  die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

while ($ln = mysqli_fetch_array($result)){

$nome      = $ln['nome'];
$email     = $ln['email'];
$matricula = $ln['matricula'];
$datanascimento = $ln['datanascimento'];
$tipo = 1;
$rg        = $ln['rg'];
$senha     = $ln['senha'];
$autenticado = $ln['autenticado'];
}
if (!$autenticado) {
    echo "<script>dado_invalido();</script>";
	
} else if ($autenticado == 2){
    echo"<script>ja_existe()</script>";

} else {
  	$sql = "INSERT INTO usuario(nome, email, matricula, data_nascimento, tipo, rg, senha)
  	VALUES('$nome', '$email', '$matricula', '$datanascimento', '$tipo', '$rg', '$senha')";
  	$result = mysqli_query($conexao,$sql);

    if (!$result) {
  		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
  	}
	session_destroy();
  	echo "<script>cadastrado()</script>";
   
  }

?>
