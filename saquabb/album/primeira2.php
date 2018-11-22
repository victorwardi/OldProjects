<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_saquabb, $saquabb);
$query_fotogr = "SELECT * FROM fotos ORDER BY id_foto DESC";
$fotogr = mysql_query($query_fotogr, $saquabb) or die(mysql_error());
$row_fotogr = mysql_fetch_assoc($fotogr);
$totalRows_fotogr = mysql_num_rows($fotogr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/album.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="113" border="0" cellpadding="0" cellspacing="0" id="meio2">
  <tr>
    <td align="center" valign="top"><img src="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{fotogr.arquivo}");?>" class="borda_foto" /><br />
Descri&ccedil;&atilde;o: <?php echo $row_fotogr['descricao']; ?><br />
Fot&oacute;grafo: <?php echo $row_fotogr['fotografo']; ?> </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($fotogr);
?>
