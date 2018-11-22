<?php require_once('Connections/legion.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_legion, $legion);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'Y' ORDER BY id_foto DESC";
$fotos = mysql_query($query_fotos, $legion) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_______________________________ Legionnarios.com ________________________________________________________________</title>
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>

    <style type="text/css">
<!--
.borda_foto {	border: 1px solid #000000;
}
-->
    </style>
</head>

<body>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <!-- fwtable fwsrc="Untitled" fwbase="conteudo.jpg" fwstyle="Dreamweaver" fwdocid = "782951710" fwnested="0" -->
  <tr>
    <td><img src="images/conteudo/spacer.gif" width="37" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="271" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="90" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="319" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="33" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img src="images/conteudo/conteudo_r1_c1.jpg" alt="" name="conteudo_r1_c1" width="398" height="166" border="0" usemap="#conteudo_r1_c1Map" id="conteudo_r1_c1" /></td>
    <td rowspan="2" colspan="2"><img src="images/conteudo/conteudo_r1_c4.jpg" alt="" name="conteudo_r1_c4" width="352" height="167" border="0" usemap="#conteudo_r1_c4Map" id="conteudo_r1_c4" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="166" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img name="conteudo_r2_c1" src="images/conteudo/conteudo_r2_c1.jpg" width="398" height="1" border="0" id="conteudo_r2_c1" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2"><img name="conteudo_r3_c1" src="images/conteudo/conteudo_r3_c1.jpg" width="37" height="141" border="0" id="conteudo_r3_c1" alt="" /></td>
    <td colspan="3" background="images/conteudo/conteudo_r3_c2.jpg" bgcolor="#FFFFFF">&nbsp;</td>
    <td rowspan="2"><img name="conteudo_r3_c5" src="images/conteudo/conteudo_r3_c5.jpg" width="33" height="141" border="0" id="conteudo_r3_c5" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="135" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img name="conteudo_r4_c2" src="images/conteudo/conteudo_r4_c2.jpg" width="680" height="6" border="0" id="conteudo_r4_c2" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="6" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="conteudo_r5_c1" src="images/conteudo/conteudo_r5_c1.jpg" width="37" height="43" border="0" id="conteudo_r5_c1" alt="" /></td>
    <td align="center" valign="middle" bgcolor="#0E0C0D"><img src="images/titulos/galeria.jpg" alt="Galeria de Fotos" width="260" height="40" /></td>
    <td colspan="3"><img name="conteudo_r5_c3" src="images/conteudo/conteudo_r5_c3.jpg" width="442" height="43" border="0" id="conteudo_r5_c3" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="43" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="top" background="images/conteudo/conteudo_r6_c1.jpg"><table width="83%" border="0" cellpadding="0">
        <tr>
          <th height="37" align="left" valign="middle" class="texto_negrito" scope="col">Galeria de Fotos da Banda Legionn&aacute;rios, fotos de Shows, ensaios, viagens.... </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="col"><table border="0" cellpadding="2">
            <tr>
              <?php
  do { // horizontal looper version 3
?>
              <td><a href="<?php echo tNG_showDynamicImage("../", "fotos/", "{fotos.arquivo}");?>" rel="lightbox[fotos]" title="<?php echo $row_fotos['descricao']; ?><br />
Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{fotos.arquivo}", 140, 110, false); ?>" border="0" class="borda_branca_1px" /></a> </td>
              <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
            </tr>
          </table></th>
        </tr>
      </table></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="312" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/conteudo/conteudo_r7_c1.jpg" alt="" name="conteudo_r7_c1" width="750" height="46" border="0" usemap="#conteudo_r7_c1Map" id="conteudo_r7_c1" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="46" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/conteudo/conteudo_r8_c1.jpg" alt="" name="conteudo_r8_c1" width="750" height="60" border="0" usemap="#conteudo_r8_c1Map" id="conteudo_r8_c1" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="60" border="0" alt="" /></td>
  </tr>
</table>

<map name="conteudo_r1_c4Map" id="conteudo_r1_c4Map"><area shape="rect" coords="15,68,69,88" href="index.php" alt="home" />
<area shape="rect" coords="53,102,121,116" href="arquivo.php" alt="noticias" />
<area shape="rect" coords="102,126,163,145" href="projeto.php" alt="projeto" />
<area shape="rect" coords="132,64,207,88" href="agenda.php" alt="agenda" />
<area shape="rect" coords="158,100,298,116" href="galeria.php" alt="galeria de fotos" />
<area shape="rect" coords="209,128,286,148" href="contato.php" alt="contato" /><area shape="rect" coords="250,69,322,91" href="release.php" alt="release" />
<area shape="rect" coords="16,133,82,152" href="jornais.php" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map"><area shape="rect" coords="90,20,142,36" href="index.php" alt="home" />
<area shape="rect" coords="153,21,218,35" href="arquivo.php" alt="noticias" />
<area shape="rect" coords="223,21,361,36" href="galeria.php" alt="galeria de fotos" />
<area shape="rect" coords="370,20,436,38" href="agenda.php" alt="agenda" />
<area shape="rect" coords="451,22,511,35" href="projeto.php" alt="projeto" />
<area shape="rect" coords="524,20,586,33" href="release.php" alt="release" />
<area shape="rect" coords="596,21,669,34" href="contato.php" alt="contato" />
</map>
<map name="conteudo_r8_c1Map" id="conteudo_r8_c1Map"><area shape="rect" coords="291,21,448,32" href="mailto:contato@legionnarios.com" alt="e-mail" />
<area shape="rect" coords="456,21,623,31" href="fb.show@legionnarios.com" alt="e-mail" />
</map>
<map name="conteudo_r1_c1Map" id="conteudo_r1_c1Map"><area shape="rect" coords="5,3,144,15" href="mailto:saquabb@hotmail.com" />
</map></body>
</html>
<?php
mysql_free_result($fotos);
?>
