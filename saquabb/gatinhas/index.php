<?php require_once('../Connections/saquabb.php'); ?>
<?php
$colname_galerias = "-1";
if (isset($_GET['galeria'])) {
  $colname_galerias = (get_magic_quotes_gpc()) ? $_GET['galeria'] : addslashes($_GET['galeria']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_galerias = sprintf("SELECT * FROM fotos WHERE galeria = '%s' ORDER BY id ASC", $colname_galerias);
$galerias = mysql_query($query_galerias, $saquabb) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_______________ Galeria de Fotos Saquabb.com.br____________________</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="700" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="96" colspan="2"><img src="imagens/topo.jpg" alt="topo" width="700" height="100" /></td>
  </tr>
  <tr>
    <td width="490" bgcolor="#FFFFFF"><iframe  name="meio" width="500" height="400" scrolling="no" frameborder="no" src="primeira.php?galeria=<?php echo $row_galerias['galeria']; ?>"></iframe></td>
    <td width="200" bgcolor="#FFFFFF"> <iframe  width="200" height="400" scrolling="no" frameborder="no" src="mini.php?galeria=<?php echo $row_galerias['galeria']; ?>"></iframe></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($galerias);
?>
