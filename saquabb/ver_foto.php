<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_foto = "-1";
if (isset($_GET['id_foto'])) {
  $colname_foto = (get_magic_quotes_gpc()) ? $_GET['id_foto'] : addslashes($_GET['id_foto']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_foto = sprintf("SELECT * FROM fotos WHERE id_foto = %s ORDER BY id_foto ASC", $colname_foto);
$foto = mysql_query($query_foto, $saquabb) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fotos</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(imagens/destaque.jpg);
	background-repeat: no-repeat;
	background-position: right bottom;
}
.fonte {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: normal;
	font-weight: bolder;
	color: #333333;
}
-->
</style>
<script type="text/JavaScript">
<!--
function close_window() {
    window.close();
}
//-->
</script>
</head>

<body>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="450" height="60" align="center" valign="top"><img src="imagens/topo_fotos.jpg" alt="topo" width="450" height="60" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="94" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td align="center" valign="top"><table width="10" border="1" cellpadding="0" cellspacing="4" bordercolor="#000000" bgcolor="#FFFFFF" class="borda_tabela">
            <tr>
              <td><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{foto.arquivo}", 400, 0, true); ?>" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="36" align="center" valign="top"><span class="fonte"><?php echo $row_foto['descricao']; ?> <br />
Fot&oacute;grafo: <?php echo $row_foto['fotografo']; ?> </span></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="354,37,448,59" href="#" alt="Fechar Janela" onclick="close_window()" />
</map></body>
</html>
<?php
mysql_free_result($foto);
?>
