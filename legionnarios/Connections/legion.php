<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_legion = "localhost";
$database_legion = "legionnarios";
$username_legion = "root";
$password_legion = "582041";
$legion = mysql_pconnect($hostname_legion, $username_legion, $password_legion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>