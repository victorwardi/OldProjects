<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_victor = "localhost";
$database_victor = "wardesig_locadora";
$username_victor = "wardesig_victor";
$password_victor = "582041";
$victor = mysql_pconnect($hostname_victor, $username_victor, $password_victor) or trigger_error(mysql_error(),E_USER_ERROR); 
?>