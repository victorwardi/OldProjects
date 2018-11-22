<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_xpress = "localhost";
$database_xpress = "xpressbb";
$username_xpress = "root";
$password_xpress = "582041";
$xpress = mysql_pconnect($hostname_xpress, $username_xpress, $password_xpress) or trigger_error(mysql_error(),E_USER_ERROR); 
?>