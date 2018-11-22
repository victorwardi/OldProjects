<?php require_once('Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_foto = "-1";
if (isset($_GET['id_foto'])) {
  $colname_foto = (get_magic_quotes_gpc()) ? $_GET['id_foto'] : addslashes($_GET['id_foto']);
}
mysql_select_db($database_victor, $victor);
$query_foto = sprintf("SELECT * FROM fotos WHERE id_foto = %s ORDER BY id DESC", $colname_foto);
$foto = mysql_query($query_foto, $victor) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function close_window() {
    window.close();
}
//-->
</script>
</head>

<body>
<table width="500" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="401" height="26"><img src="imagens/ver_foto/topo.jpg" width="500" height="85" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="302" align="center" valign="top" background="imagens/ver_foto/fundo.jpg"><img src="<?php echo tNG_showDynamicImage("", "fotos/", "{foto.arquivo}");?>" width="400" class="borda_preta" /></td>
  </tr>
  <tr>
    <td height="41" align="center" valign="top"><img src="imagens/ver_foto/base.jpg" width="500" height="27" /><br /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="418,3,496,25" href="#" onclick="close_window()" />
</map></body>
</html>
<?php
mysql_free_result($foto);
?>
