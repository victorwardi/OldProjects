<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConBD = "localhost";
$database_ConBD = "sisintsocordas";
$username_ConBD = "root";
$password_ConBD = "";
$ConBD = mysql_pconnect($hostname_ConBD, $username_ConBD, $password_ConBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>