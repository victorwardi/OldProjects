<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_fotogr = "-1";
if (isset($_GET['id_foto'])) {
  $colname_fotogr = (get_magic_quotes_gpc()) ? $_GET['id_foto'] : addslashes($_GET['id_foto']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_fotogr = sprintf("SELECT * FROM fotos WHERE id_foto = %s ORDER BY id_foto DESC", $colname_fotogr);
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
<div align="center" id="meio2"><img src="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{fotogr.arquivo}");?>" class="borda_foto" /><br />
  Descri&ccedil;&atilde;o: <?php echo $row_fotogr['descricao']; ?><br />
  Fot&oacute;grafo: <?php echo $row_fotogr['fotografo']; ?> </div>
</body>
</html>
<?php
mysql_free_result($fotogr);
?>
