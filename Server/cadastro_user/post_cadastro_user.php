<?php

require('../conexao/conexao.php');
$nome_acent=$_POST['nome'];

function retira_acentos($texto)
{
$array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
$array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
return str_replace( $array1, $array2, $texto);
}

$nome=retira_acentos($nome_acent);

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
		$_SESSION['matricula']=$matricula;
		sleep(1);
		header('Location: cadastrar_definitivo.php'); //cadastra usuário
	}

} else {
	header('Location: ../log_error/index.php?ERROR=1'); //Senhas incompátiveis, retorna index
}
?>
