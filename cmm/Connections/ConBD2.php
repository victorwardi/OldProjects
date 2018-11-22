<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConBD = "mysql01.cmmangaratiba.rj.gov.br";
$database_ConBD = "cmmangaratibar";
$username_ConBD = "cmmangaratibar";
$password_ConBD = "i1g2o3r4";
$ConBD = mysql_pconnect($hostname_ConBD, $username_ConBD, $password_ConBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>

 