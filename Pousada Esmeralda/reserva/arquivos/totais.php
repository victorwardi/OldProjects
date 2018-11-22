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

mysql_select_db($database_conBD, $conBD);
$query_RsTotalCaixaEntrada = "SELECT * FROM contato";
$RsTotalCaixaEntrada = mysql_query($query_RsTotalCaixaEntrada, $conBD) or die(mysql_error());
$row_RsTotalCaixaEntrada = mysql_fetch_assoc($RsTotalCaixaEntrada);
$totalRows_RsTotalCaixaEntrada = mysql_num_rows($RsTotalCaixaEntrada);

mysql_select_db($database_conBD, $conBD);
$query_RsTotalNaoLidas = "SELECT * FROM contato WHERE status = 'n'";
$RsTotalNaoLidas = mysql_query($query_RsTotalNaoLidas, $conBD) or die(mysql_error());
$row_RsTotalNaoLidas = mysql_fetch_assoc($RsTotalNaoLidas);
$totalRows_RsTotalNaoLidas = mysql_num_rows($RsTotalNaoLidas);

mysql_select_db($database_conBD, $conBD);
$query_RsLidas = "SELECT * FROM contato WHERE status <> 'n'";
$RsLidas = mysql_query($query_RsLidas, $conBD) or die(mysql_error());
$row_RsLidas = mysql_fetch_assoc($RsLidas);
$totalRows_RsLidas = mysql_num_rows($RsLidas);
?>