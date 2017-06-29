	<html  = lang"pt-br">
	<head>
	<style type="text/css">
		.loader {
	    border: 16px solid #f3f3f3; /* Light grey */
	    border-top: 16px solid #3498db; /* Blue */
	    border-radius: 50%;
	    width: 120px;
	    height: 120px;
	    animation: spin 2s linear infinite;
		}

		@keyframes spin {
	    0% { transform: rotate(0deg); }
	    100% { transform: rotate(360deg); }
	}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type='text/javascript'>

			function chama_cadastrar(){
				setTimeout("window.location='cadastrar_definitivo.php'",3000);
			}

			function index(){
				setTimeout("window.location='../index.html'",3000);
			}
			function mudarTitle()
			{
				

			}
		</script>

	</head>
		<title id="title">Autenticando</title>
		<div class="col-md-12">
			<div align="center" id="loader" class="loader"></div>
		</div>
	<body>

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
		echo"<script>
			document.getElementById("loader").style.display = "none";
			document.getElementById('title').innerHTML = "Senhas incompatíveis!";
		</script>";
		echo"<script>index()</script>";
	}
	?>

	</body>
	</html>
