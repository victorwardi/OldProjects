<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_fotos = "localhost";
$database_fotos = "saquabb_fotos";
$username_fotos = "saquabb_bodyboar";
$password_fotos = "inversoaereo";
$fotos = mysql_pconnect($hostname_fotos, $username_fotos, $password_fotos) or trigger_error(mysql_error(),E_USER_ERROR); 
?>