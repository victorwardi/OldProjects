<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_victor = "201.23.220.2";
$database_victor = "jrgamesvideolocadora";
$username_victor = "jrg";
$password_victor = "jrg";
$victor = mysql_pconnect($hostname_victor, $username_victor, $password_victor) or trigger_error(mysql_error(),E_USER_ERROR); 
?>