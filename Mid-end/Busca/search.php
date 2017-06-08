<?php


$pesquisa = $_POST["pesquisa"];
$db = new mysqli('localhost', 'root', '', 'blabla');
//Vendo o Status da sala de acordo com o nome digitado
$sql= mysqli_query($db, "select status,sala,cadeiras,null as nome from diatabela where sala like '$pesquisa' UNION SELECT nome,turma,diasemana,horario FROM materias WHERE nome like '$pesquisa'");
if($sql === FALSE) {
    echo mysqli_error($db);
}
while($ln = mysqli_fetch_array($sql)) {
    if ($ln['status'] === '1' || $ln['status'] === '0'|| $ln['status'] === '2' ) {
        $status = $ln['status'];
        $sala = $ln['sala'];
        $cadeiras = $ln['cadeiras'];
        echo nl2br ("Status: $status \n");
        echo nl2br("Numero de Cadeiras da sala $sala: $cadeiras \n");
        echo "Sala: $sala";
    } else {

        $turma = $ln['sala'];
        $professor = $ln['status'];
        $diasemana = $ln['id'];
        $horario = $ln['cadeiras'];
        echo nl2br("Horarios: $horario \n");
        echo nl2br("Dias da semana: $diasemana \n");
        echo nl2br("Professor: $professor \n");
        echo "Turma: $turma";
    }
}
?>



