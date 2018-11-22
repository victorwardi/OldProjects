<?php require_once('Connections/ConDB.php'); ?>
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

$colname_RsColuna = "-1";
if (isset($_GET['idcoluna'])) {
  $colname_RsColuna = $_GET['idcoluna'];
}
mysql_select_db($database_ConDB, $ConDB);
$query_RsColuna = sprintf("SELECT * FROM coluna WHERE idcoluna = %s", GetSQLValueString($colname_RsColuna, "int"));
$RsColuna = mysql_query($query_RsColuna, $ConDB) or die(mysql_error());
$row_RsColuna = mysql_fetch_assoc($RsColuna);
$totalRows_RsColuna = mysql_num_rows($RsColuna);

$colname_RsColunista = "-1";
if (isset($_GET['idcoluna'])) {
  $colname_RsColunista = $_GET['idcoluna'];
}
mysql_select_db($database_ConDB, $ConDB);
$query_RsColunista = sprintf("SELECT * FROM colunistas WHERE idcoluna = %s", GetSQLValueString($colname_RsColunista, "int"));
$RsColunista = mysql_query($query_RsColunista, $ConDB) or die(mysql_error());
$row_RsColunista = mysql_fetch_assoc($RsColunista);
$totalRows_RsColunista = mysql_num_rows($RsColunista);

$colname_RsNoticias = "-1";
if (isset($_GET['idcoluna'])) {
  $colname_RsNoticias = $_GET['idcoluna'];
}
mysql_select_db($database_ConDB, $ConDB);
$query_RsNoticias = sprintf("SELECT * FROM noticias WHERE idcoluna = %s ORDER BY idnot DESC", GetSQLValueString($colname_RsNoticias, "int"));
$RsNoticias = mysql_query($query_RsNoticias, $ConDB) or die(mysql_error());
$row_RsNoticias = mysql_fetch_assoc($RsNoticias);
$totalRows_RsNoticias = mysql_num_rows($RsNoticias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<link href="css/divs.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="corpo">
	<div id="barra"> <img src="img/saquabb.jpg" alt="Saquabb.com.br" width="200" height="40" />
    	<div id="login"> <form action="" method="post" name="login">
    	  <label>
    	  <input type="text" name="textfield" id="textfield" />
    	  </label>
    	</form></div>
    </div>

</div>
<table width="882" height="165" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?php echo $row_RsColuna['nome']; ?></td>
  </tr>
  <tr>
    <td width="174">&nbsp;</td>
    <td width="406"><ul>
      
        <?php do { ?>
          <li><?php echo $row_RsNoticias['titulo']; ?>
          <?php } while ($row_RsNoticias = mysql_fetch_assoc($RsNoticias)); ?>
      </li>
    </ul></td>
    <td width="302"><p>Colunista: <?php echo $row_RsColunista['nome']; ?><br />
    Desde: <?php echo $row_RsColunista['desde']; ?><br />
    <?php echo $row_RsColunista['descricao']; ?></p>
      <p>Total de Noticias Publicadas: <?php echo $totalRows_RsNoticias ?> <br />
      </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsColuna);

mysql_free_result($RsColunista);

mysql_free_result($RsNoticias);
?>
