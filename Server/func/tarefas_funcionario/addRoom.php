<?php
require('../../conexao/conexao.php');

$nome = $_POST['nome'];
$cadeiras = $_POST['cadeiras'];
$projetor = $_POST['ar'];
$ar = $_POST['projetor'];
$laboratorio = $_POST['laboratorio'];

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"], "../../img" . $newfilename);


$sql = "INSERT INTO salas (ID,nome,responsavel,num_cadeiras,projetor,ar_condicionado,lab,idfluxo)
VALUES (NULL, '$nome', NULL, '$cadeiras', '$projetor', '$ar', '$laboratorio', NULL)";
if ($conexao->query($sql) === TRUE) {
    echo "Sala criada com sucesso";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
?>
