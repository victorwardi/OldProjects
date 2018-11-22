<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_fotos = "localhost";
$database_fotos = "fotos";
$username_fotos = "root";
$password_fotos = "582041";
$fotos = mysql_pconnect($hostname_fotos, $username_fotos, $password_fotos) or trigger_error(mysql_error(),E_USER_ERROR); 
?>