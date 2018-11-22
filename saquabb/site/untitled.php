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

$maxRows_RsNoticias = 10;
$pageNum_RsNoticias = 0;
if (isset($_GET['pageNum_RsNoticias'])) {
  $pageNum_RsNoticias = $_GET['pageNum_RsNoticias'];
}
$startRow_RsNoticias = $pageNum_RsNoticias * $maxRows_RsNoticias;

mysql_select_db($database_ConDB, $ConDB);
$query_RsNoticias = "SELECT * FROM noticias ORDER BY idnot DESC";
$query_limit_RsNoticias = sprintf("%s LIMIT %d, %d", $query_RsNoticias, $startRow_RsNoticias, $maxRows_RsNoticias);
$RsNoticias = mysql_query($query_limit_RsNoticias, $ConDB) or die(mysql_error());
$row_RsNoticias = mysql_fetch_assoc($RsNoticias);

if (isset($_GET['totalRows_RsNoticias'])) {
  $totalRows_RsNoticias = $_GET['totalRows_RsNoticias'];
} else {
  $all_RsNoticias = mysql_query($query_RsNoticias);
  $totalRows_RsNoticias = mysql_num_rows($all_RsNoticias);
}
$totalPages_RsNoticias = ceil($totalRows_RsNoticias/$maxRows_RsNoticias)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>
  <p><a href="temp.php?idcoluna=<?php echo $row_RsNoticias['idcoluna'];?>"><?php echo $row_RsNoticias['titulo']; ?></a></p>
  <?php } while ($row_RsNoticias = mysql_fetch_assoc($RsNoticias)); ?><p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($RsNoticias);
?>
