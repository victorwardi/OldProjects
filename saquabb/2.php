<?php
  
   $link = mysql_connect('localhost', 'root', 'saqua');
   if (!$link) {
       die('N�o foi poss�vel conectar: ' . mysql_error());
   }
   echo 'Conex�o bem sucedida';
   mysql_close($link);

?>