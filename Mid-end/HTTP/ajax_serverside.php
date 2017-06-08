<?php
$con = new mysqli('localhost', 'root', '', 'blabla');



$result=mysqli_query($con, "select * from diatabela");
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r['status'];
    $sala[] = $r['sala'];
}

$json[0] = $rows;
$json[1] = $sala;
echo json_encode($json);

?>