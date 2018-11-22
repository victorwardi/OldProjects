<?php require_once('Connections/legion.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_noticias = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_legion, $legion);
$query_noticias = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id DESC", $colname_noticias);
$noticias = mysql_query($query_noticias, $legion) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

$colname_foto_not = "-1";
if (isset($_GET['id'])) {
  $colname_foto_not = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_legion, $legion);
$query_foto_not = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_foto_not);
$foto_not = mysql_query($query_foto_not, $legion) or die(mysql_error());
$row_foto_not = mysql_fetch_assoc($foto_not);
$totalRows_foto_not = mysql_num_rows($foto_not);
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
    <td align="center" valign="middle" bgcolor="#0E0C0D"><img src="images/titulos/noticias.jpg" alt="Release" width="260" height="40" /></td>
    <td colspan="3"><img name="conteudo_r5_c3" src="images/conteudo/conteudo_r5_c3.jpg" width="442" height="43" border="0" id="conteudo_r5_c3" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="43" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="top" background="images/conteudo/conteudo_r6_c1.jpg"><table width="90%" border="0" cellpadding="0">
      <tr>
        <th height="39" align="left" class="tituolo_noticia" scope="col"><?php echo $row_noticias['titulo']; ?></th>
      </tr>
      <tr>
        <th align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <td height="20" align="left" class="agenda">Autor: <span class="not_small"><?php echo $row_noticias['fonte']; ?></span></td>
            <td align="left" class="texto_negrito"><span class="agenda">Data: </span><span class="not_small"><?php echo $row_noticias['data']; ?></span> </td>
          </tr>
          <tr>
            <td colspan="2" align="left"><?php 
// Show If File Exists (region1)
if (tNG_fileExists("fotos/", "{foto_not.arquivo}")) {
?>
                <table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="54"><?php do { ?>
                        <table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                          <tr>
                            <td width="41" align="center" valign="top" bgcolor="#FFFFFF"><a href="<?php echo tNG_showDynamicImage("", "fotos/", "{foto_not.arquivo}");?>" rel="lightbox" title="<?php echo $row_foto_not['descricao']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_foto_not['fotografo']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{foto_not.arquivo}", 200, 0, true); ?>" border="0" class="borda_tabela" /></a></td>
                          </tr>
                        </table>
                      <br />
                        <?php } while ($row_foto_not = mysql_fetch_assoc($foto_not)); ?></td>
                  </tr>
                </table>
              <?php } 
// EndIf File Exists (region1)
?>
              <div align="justify" class="texto"><?php echo $row_noticias['materia']; ?></div></td>
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
<area shape="rect" coords="11,133,82,154" href="jornais.php" />
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
<map name="conteudo_r1_c1Map" id="conteudo_r1_c1Map"><area shape="rect" coords="-7,4,142,16" href="mailto:saquabb@hotmail.com" />
</map></body>
</html>
<?php
mysql_free_result($noticias);

mysql_free_result($foto_not);
?>
