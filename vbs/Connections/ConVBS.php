<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConVBS = "http://www.vilabeachsurfing.com.br:3306";
$database_ConVBS = "vbs_vbs";
$username_ConVBS = "vbs_vbsbd";
$password_ConVBS = "vbsbd";
$ConVBS = mysql_pconnect($hostname_ConVBS, $username_ConVBS, $password_ConVBS) or trigger_error(mysql_error(),E_USER_ERROR); 
?>