<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_CostaverdeFM = "localhost";
$database_CostaverdeFM = "saquabb_cvfm";
$username_CostaverdeFM = "saquabb_cvfm";
$password_CostaverdeFM = "cvfm";
$CostaverdeFM = mysql_pconnect($hostname_CostaverdeFM, $username_CostaverdeFM, $password_CostaverdeFM) or trigger_error(mysql_error(),E_USER_ERROR); 
?>