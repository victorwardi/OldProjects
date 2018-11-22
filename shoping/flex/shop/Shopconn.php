<?php
/**
 * connection settings
 * replace with your own hostname, database, username and password 
 */
$hostname_conn = "localhost";
$database_conn = "isc_itagu1";
$username_conn = "isc_itagu1";
$password_conn = "i1g2o3r4";
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_conn, $conn);
mysql_query("SET NAMES 'utf8'");
?>
