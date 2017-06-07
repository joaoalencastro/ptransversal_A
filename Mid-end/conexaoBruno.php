<?php
$mysqli = new mysqli('localhost', 'root', 'grupass123', 'sistemareservadodb');

/* checando conexão */
if (mysqli_connect_errno()) {
    printf("Falha na onexão: %s\n", mysqli_connect_error());
    exit();
}

$query = $mysqli->prepare("INSERT INTO usuario(nome, email, matricula, rg, senha) VALUES ('$nome', '$email', '$matricula', '$rg', '$senha')");
$query->bind_param('sssd', $nome, $email, $matricula, $rg, $senha);

$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$rg = $_POST['rg'];
$senha = $_POST['senha'];

/* Executa os comando de enviar */
$query->execute();

printf("%d Colunas inseridas.\n", $query->affected_rows);

/* Fecha a query */
$query->close();


/* Fecha conexão */
$mysqli->close();
?>