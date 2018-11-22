<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConBD = "mysql.netterra.com.br";
$database_ConBD = "jhowfolia";
$username_ConBD = "jhowfolia";
$password_ConBD = "rafabada";
$ConBD = mysql_pconnect($hostname_ConBD, $username_ConBD, $password_ConBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>