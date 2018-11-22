<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConBD = "localhost";
$database_ConBD = "itagu1";
$username_ConBD = "itagu1";
$password_ConBD = "qevof+xr";
$ConBD = mysql_pconnect($hostname_ConBD, $username_ConBD, $password_ConBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>