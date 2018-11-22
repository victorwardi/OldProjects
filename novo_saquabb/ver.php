<?php require_once('Connections/saquabb.php'); ?>
<?php
$dt_Recordset1 = "-1";
if (isset($_GET['data'])) {
  $dt_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['data'] : addslashes($_GET['data']);
}
$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_Recordset1 = sprintf("SELECT * FROM noticias WHERE id = %s data = %s ORDER BY id ASC", $colname_Recordset1,$dt_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $saquabb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
