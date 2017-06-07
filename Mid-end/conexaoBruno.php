<?php
$mysqli = new mysqli('localhost', 'root', 'grupass123', 'sistemareservadodb');

/* checando conexão */
if (mysqli_connect_errno()) {
    printf("Falha na onexão: %s\n", mysqli_connect_error());
    exit();
}

$query = $mysqli->prepare("INSERT INTO usuario(nome, email, matricula, rg, senha) VALUES ('$nome', '$email', '$matricula', '$rg', '$senha')");

/* Função que liga os parametros - 1* parâmentro --> O tipo de todos os paramentros, em sequencia.
- 2*, 3*, 4*, 5* --> Parâmetros para a query. */
$query->bind_param('sssss', $nome, $email, $matricula, $rg, $senha);

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