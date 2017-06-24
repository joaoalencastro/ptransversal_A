<script type='text/javascript'>

		function chama_cadastrar(){
			setTimeout("window.location='cadastrar_definitivo.php'",10);
		}
		function senha_incompativel()
		{
			setTimeout("window.location='../log_error/index.php?ERROR=1'",10);
		}
		
</script>




<?php

require('../conexao/conexao.php');
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$email=$_POST['email'];
$datanascimento=$_POST['datanascimento'];
$rg=$_POST['rg'];
$senha=$_POST['senhatxt'];
$senha2=$_POST['senha2txt'];

$senha=sha1($senha);
$senha2=sha1($senha2);

if($senha===$senha2){
	$sql = "INSERT INTO usuario_transitorio(nome, email, senha, datanascimento, matricula, rg)
	VALUES( '$nome', '$email', '$senha', '$datanascimento', '$matricula', '$rg')";
	$result = mysqli_query($conexao,$sql);

	if (!$result) {
		die('Algo deu errado. Erro: ' . mysqli_error($conexao));
	} else {
		session_start();
		$_SESSION['matricula']=$_POST['matricula'];
		echo "<script>chama_cadastrar()</script>";
	}

} else {
	echo"<script>senha_incompativel()</script>";
}
?>
