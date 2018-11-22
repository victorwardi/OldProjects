<?php require_once('../Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_xpress, $xpress);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $xpress) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <th colspan="2" scope="col"><img src="img/topo.jpg" alt="topo" width="700" height="200" /></th>
  </tr>
  <tr>
    <th width="149" height="968" align="left" valign="top" scope="row"><table width="115%" border="0" cellpadding="0" cellspacing="5">
      <tr>
        <th width="15" align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th width="89" height="25" align="left" valign="middle" class="fonte_menu" scope="col">Home</th>
      </tr>
      <tr>
        <th height="17" align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">Novidades</th>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">Pranchas</th>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">galeria de fotos </th>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">Equipe</th>
      </tr>
      <tr>
        <th height="15" align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">Onde Encontrar! </th>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="col"><img src="img/marcador.jpg" width="25" height="11" /></th>
        <th height="25" align="left" valign="middle" class="fonte_menu" scope="col">Contato</th>
      </tr>
    </table></th>
    <td width="535" align="center" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <th align="left" scope="col"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.foto}", 310, 0, true); ?>" /></th>
        <th scope="col">&nbsp;</th>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <th colspan="2" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($noticias);
?>
