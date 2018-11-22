<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConDB = "localhost";
$database_ConDB = "saquabb2008";
$username_ConDB = "root";
$password_ConDB = "";
$ConDB = mysql_pconnect($hostname_ConDB, $username_ConDB, $password_ConDB) or trigger_error(mysql_error(),E_USER_ERROR); 
?>