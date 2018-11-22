<?php require_once('../Connections/ConBD.php'); ?>
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

$colname_RsProduto = "-1";
if (isset($_GET['produtoID'])) {
  $colname_RsProduto = $_GET['produtoID'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsProduto = sprintf("SELECT P.*, F.nome AS Nomefabrica FROM produto P INNER JOIN fabrica F ON (P.fabricaID = F.fabricaID) WHERE produtoID = %s", GetSQLValueString($colname_RsProduto, "int"));
$RsProduto = mysql_query($query_RsProduto, $ConBD) or die(mysql_error());
$row_RsProduto = mysql_fetch_assoc($RsProduto);
$totalRows_RsProduto = mysql_num_rows($RsProduto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sisint - Só Cordas Representações LTDA</title>
<link href="../css/stilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body onload="window.print();">
<table width="500" border="1" align="center" cellpadding="4" cellspacing="0" id="tabelaImpressao">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#EFEFEF" class="titulo_tabela"><strong class="titulo_tabelaImpresao"><?php echo $row_RsProduto['nome']; ?></strong></td>
  </tr>
  <tr>
    <td width="112" bgcolor="#FFFFFF"><span class="style1">
      <label for="responsavel_1">Fábrica</label>
    </span></td>
    <td width="366" align="center" valign="top"><?php echo $row_RsProduto['Nomefabrica']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">Unidade</span></td>
    <td align="center" valign="top"><?php echo $row_RsProduto['unidade']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">Preço</span></td>
    <td align="center" valign="top"><?php echo $row_RsProduto['preco']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsProduto);
?>
