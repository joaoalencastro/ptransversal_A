<?php

$con = new mysqli('localhost', 'root', '', 'blabla');
$result=mysqli_query($con, "select * from diatabela");
//--------------------------------------------------------------------------
// 2) Query database for data
//-------------------------------------------------------------------------- //query
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r['status'];                         //fetch result
}
$status =  json_encode($rows);
echo "myFunc(".$status.");";
?>