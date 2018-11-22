<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConVBS = "localhost";
$database_ConVBS = "vila_db";
$username_ConVBS = "vila_vbs";
$password_ConVBS = "vbs2007";
$ConVBS = mysql_pconnect($hostname_ConVBS, $username_ConVBS, $password_ConVBS) or trigger_error(mysql_error(),E_USER_ERROR); 
?>


