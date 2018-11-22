<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConBD = "localhost";
$database_ConBD = "arenafest";
$username_ConBD = "arena";
$password_ConBD = "arena";
$ConBD = mysql_pconnect($hostname_ConBD, $username_ConBD, $password_ConBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>