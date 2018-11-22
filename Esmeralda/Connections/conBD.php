<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conBD = "localhost";
$database_conBD = "pe";
$username_conBD = "root";
$password_conBD = "";
#$database_conBD = "pou167";
#$username_conBD = "pou167";
#$password_conBD = "rarzl+gn";
$conBD = mysql_pconnect($hostname_conBD, $username_conBD, $password_conBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>