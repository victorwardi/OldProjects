<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_socordas = "localhost";
$database_socordas = "socordas";
$username_socordas = "root";
$password_socordas = "582041";
$socordas = mysql_pconnect($hostname_socordas, $username_socordas, $password_socordas) or trigger_error(mysql_error(),E_USER_ERROR); 
?>