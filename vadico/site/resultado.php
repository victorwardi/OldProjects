<?php require_once('Connections/conBD.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$VarMarca_RsResultado = "";
if (isset($_POST['marca'])) {
  $VarMarca_RsResultado = $_POST['marca'];
}
$VarPreco_RsResultado = "";
if (isset($_POST['preco'])) {
  $VarPreco_RsResultado = $_POST['preco'];
}
$VarAno_RsResultado = "";
if (isset($_POST['ano'])) {
  $VarAno_RsResultado = $_POST['ano'];
}
mysql_select_db($database_conBD, $conBD);
$query_RsResultado = sprintf("SELECT * FROM carro %s %s %s", GetSQLValueString($VarMarca_RsResultado, "text"),GetSQLValueString($VarPreco_RsResultado, "text"),GetSQLValueString($VarAno_RsResultado, "text"));
$RsResultado = mysql_query($query_RsResultado, $conBD) or die(mysql_error());
$row_RsResultado = mysql_fetch_assoc($RsResultado);
$totalRows_RsResultado = mysql_num_rows($RsResultado);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($RsResultado);
?>
