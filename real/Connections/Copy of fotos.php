<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_fotos = "mysql.realfotos.com.br";
$database_fotos = "realfotos";
$username_fotos = "realfd";
$password_fotos = "real2000";
$fotos = mysql_pconnect($hostname_fotos, $username_fotos, $password_fotos) or trigger_error(mysql_error(),E_USER_ERROR); 
?>