<?php require_once('Connections/saquabb.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset1 = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $saquabb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
  <table width="100%" border="0" cellspacing="8" cellpadding="4">
    <tr>
      <th align="left" scope="col"><ul>
        <li><a href="ver.php?id=<?php echo $row_Recordset1['id']; ?>&amp;<?php echo $row_Recordset1['data']; ?>" class="mais_festa"><?php echo $row_Recordset1['titulo']; ?>- <?php echo $row_Recordset1['data']; ?></a></li>
      </ul></th>
    </tr>
      </table>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></body>
</html>
<?php
mysql_free_result($Recordset1);
?>
