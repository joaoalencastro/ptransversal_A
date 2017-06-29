<?php
do {
    $id = $_SESSION['aux'];
    echo $id;
}while(isset($_SESSION['aux']))
?>