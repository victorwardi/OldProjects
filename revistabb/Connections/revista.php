<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_revista = "localhost";
$database_revista = "magazine";
$username_revista = "root";
$password_revista = "582041";
$revista = mysql_pconnect($hostname_revista, $username_revista, $password_revista) or trigger_error(mysql_error(),E_USER_ERROR); 
?>