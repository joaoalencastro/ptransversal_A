<?php

require('../conexao/conexao.php');

   $sql = 'SELECT * FROM solicitacao';
   
   $retval = mysql_query( $sql, $conexao );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "SOL ID :{$row[0]}  <br> ".
         "SOL NOME SALA : {$row[1]} <br> ".
         "SOL SOLICITANTE : {$row[2]} <br> ".
		 "SOL HORARIO RESERVA : {$row[3]} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";

$conexao->close();
?>