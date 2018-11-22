<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_victor = "localhost";
$database_victor = "jrgamesv_jrg";
$username_victor = "jrgamesv_jrg";
$password_victor = "jrg";
$victor = mysql_pconnect($hostname_victor, $username_victor, $password_victor) or trigger_error(mysql_error(),E_USER_ERROR); 
?>