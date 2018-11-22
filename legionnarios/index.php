<?php require_once('Connections/legion.php'); ?>
<?php
$maxRows_noticias = 3;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_legion, $legion);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $legion) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

mysql_select_db($database_legion, $legion);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'Y' ORDER BY id_foto DESC";
$fotos = mysql_query($query_fotos, $legion) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

$maxRows_agenda = 4;
$pageNum_agenda = 0;
if (isset($_GET['pageNum_agenda'])) {
  $pageNum_agenda = $_GET['pageNum_agenda'];
}
$startRow_agenda = $pageNum_agenda * $maxRows_agenda;

mysql_select_db($database_legion, $legion);
$query_agenda = "SELECT * FROM agenda ORDER BY id DESC";
$query_limit_agenda = sprintf("%s LIMIT %d, %d", $query_agenda, $startRow_agenda, $maxRows_agenda);
$agenda = mysql_query($query_limit_agenda, $legion) or die(mysql_error());
$row_agenda = mysql_fetch_assoc($agenda);

if (isset($_GET['totalRows_agenda'])) {
  $totalRows_agenda = $_GET['totalRows_agenda'];
} else {
  $all_agenda = mysql_query($query_agenda);
  $totalRows_agenda = mysql_num_rows($all_agenda);
}
$totalPages_agenda = ceil($totalRows_agenda/$maxRows_agenda)-1;

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_______________________________ Legionnarios.com ________________________________________________________________</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<!-- >>>>>>>>>>>>>> Relacionando os Scripts <<<<<<<<<<<<<<<<<<< -->
	
</head>


<body>
<table width="736" border="0" align="center" cellpadding="0" cellspacing="0">
  <!-- fwtable fwsrc="Untitled" fwbase="index.jpg" fwstyle="Dreamweaver" fwdocid = "496951828" fwnested="0" -->
  <tr>
    <td><img src="images/spacer.gif" width="27" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="203" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="44" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="48" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="62" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="78" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="45" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="192" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="8" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="29" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/index_r1_c1.jpg" alt="" name="index_r1_c1" width="384" height="153" border="0" usemap="#index_r1_c1Map" id="index_r1_c1" /></td>
    <td colspan="5"><img src="images/index_r1_c6.jpg" alt="" name="index_r1_c6" width="352" height="153" border="0" usemap="#index_r1_c6Map" id="index_r1_c6" /></td>
    <td><img src="images/spacer.gif" width="1" height="153" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="14"><img name="index_r2_c1" src="images/index_r2_c1.jpg" width="27" height="533" border="0" id="index_r2_c1" alt="" /></td>
    <td colspan="8" background="images/index_r2_c2.jpg"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="680" height="135">
      <param name="movie" value="flash/intro.swf" />
      <param name="quality" value="high" />
      <embed src="flash/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="680" height="135"></embed>
    </object></td>
    <td rowspan="14"><img name="index_r2_c10" src="images/index_r2_c10.jpg" width="29" height="533" border="0" id="index_r2_c10" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="135" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="8"><img name="index_r3_c2" src="images/index_r3_c2.jpg" width="680" height="44" border="0" id="index_r3_c2" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="44" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="9" align="center" valign="top" bgcolor="#0E0C0D" class="fonte_titulo_not"><?php do { ?>
        <table width="100%" border="0" cellpadding="2">
          <tr>
            <td width="26%" rowspan="2" align="center" valign="top"><a href="noticia.php?id=<?php echo $row_noticias['id'];?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{noticias.imagem}", 100, 75, false); ?>" border="0" class="borda_branca_1px" /></a></td>
            <td width="74%" align="left" valign="top" class="texto_negrito"><?php echo $row_noticias['titulo']; ?> <br />
            <?php echo $row_noticias['data']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><a href="noticia.php?id=<?php echo $row_noticias['id'];?>"><img src="images/mais.jpg" alt="leia mais" width="81" height="25" border="0" /></a></td>
          </tr>
        </table>
        <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></td>
    <td rowspan="2" colspan="4"><img name="index_r4_c4" src="images/index_r4_c4.jpg" width="233" height="45" border="0" id="index_r4_c4" alt="" /></td>
    <td colspan="2"><img name="index_r4_c8" src="images/index_r4_c8.jpg" width="200" height="38" border="0" id="index_r4_c8" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="38" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" align="center" valign="top" background="images/index_r5_c8.jpg"><?php do { ?>
        <table width="80%" border="0" cellpadding="2">
          <tr>
            <td width="11%" align="left" valign="middle"><img src="images/marca.jpg" width="11" height="8" /></td>
            <td width="89%" align="left" valign="middle" class="agenda"><a href="ver_agenda.php?id=<?php echo $row_agenda['id']; ?>" class="agenda"><?php echo $row_agenda['data']; ?> - <?php echo $row_agenda['local']; ?></a></td>
          </tr>
        </table>
        <?php } while ($row_agenda = mysql_fetch_assoc($agenda)); ?></td>
    <td><img src="images/spacer.gif" width="1" height="7" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="index_r6_c4" src="images/index_r6_c4.jpg" width="233" height="12" border="0" id="index_r6_c4" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="12" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="9"><img name="index_r7_c4" src="images/index_r7_c4.jpg" width="48" height="297" border="0" id="index_r7_c4" alt="" /></td>
    <td colspan="2" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><a href="galeria.php"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{fotos.arquivo}", 140, 105, false); ?>" border="0" /></a></td>
    <td rowspan="9"><img name="index_r7_c7" src="images/index_r7_c7.jpg" width="45" height="297" border="0" id="index_r7_c7" alt="" /></td>
	<?php $row_fotos = mysql_fetch_assoc($fotos); ?>
    <td><img src="images/spacer.gif" width="1" height="76" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" colspan="2"><img src="images/index_r8_c8.jpg" alt="" name="index_r8_c8" width="200" height="32" border="0" usemap="#index_r8_c8Map" id="index_r8_c8" /></td>
    <td><img src="images/spacer.gif" width="1" height="29" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" colspan="2"><img name="index_r9_c5" src="images/index_r9_c5.jpg" width="140" height="28" border="0" id="index_r9_c5" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="3" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2"><img src="images/index_r10_c8.jpg" alt="" name="index_r10_c8" width="192" height="108" border="0" usemap="#index_r10_c8Map" id="index_r10_c8" /></td>
    <td rowspan="6"><img name="index_r10_c9" src="images/index_r10_c9.jpg" width="8" height="189" border="0" id="index_r10_c9" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="25" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><a href="galeria.php"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{fotos.arquivo}", 140, 105, false); ?>" border="0" class="agenda" /></a></td>
    <td><img src="images/spacer.gif" width="1" height="83" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="4"><a href="http://www.orkut.com/Community.aspx?cmm=26993211"><img name="index_r12_c8" src="images/orkut.jpg" width="192" height="81" border="0" id="index_r12_c8" alt="" /></a></td>
    <td><img src="images/spacer.gif" width="1" height="13" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2"><a href="arquivo.php"><img name="index_r13_c2" src="images/index_r13_c2.jpg" width="203" height="39" border="0" id="index_r13_c2" alt="" /></a></td>
    <td rowspan="3"><img name="index_r13_c3" src="images/index_r13_c3.jpg" width="44" height="68" border="0" id="index_r13_c3" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="9" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" colspan="2"><img name="index_r14_c5" src="images/index_r14_c5.jpg" width="140" height="59" border="0" id="index_r14_c5" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="30" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="index_r15_c2" src="images/index_r15_c2.jpg" width="203" height="29" border="0" id="index_r15_c2" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="29" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="10"><img src="images/index_r16_c1.jpg" alt="" name="index_r16_c1" width="736" height="63" border="0" usemap="#index_r16_c1Map" id="index_r16_c1" />
      <map name="index_r16_c1Map" id="index_r16_c1Map">
        <area shape="rect" coords="280,30,441,42" href="mailto:contato@legionnarios.com" />
        <area shape="rect" coords="448,29,609,43" href="mailto:fb.show@legionnarios.com" />
      </map>    </td>
    <td><img src="images/spacer.gif" width="1" height="63" border="0" alt="" /></td>
  </tr>
</table>

<map name="index_r10_c8Map" id="index_r10_c8Map"><area shape="rect" coords="33,19,179,90" href="release.php" alt="" />
</map>
<map name="index_r1_c6Map" id="index_r1_c6Map"><area shape="rect" coords="18,57,71,73" href="index.php" alt="home" />
<area shape="rect" coords="63,86,130,102" href="arquivo.php" alt="noticias" />
<area shape="rect" coords="107,112,167,129" href="projeto.php" alt="projeto" />
<area shape="rect" coords="142,55,211,74" href="agenda.php" alt="agenda" />
<area shape="rect" coords="166,87,300,103" href="galeria.php" alt="galeria de fotos" />
<area shape="rect" coords="215,113,289,133" href="contato.php" alt="contato" />
<area shape="rect" coords="255,56,326,74" href="release.php" alt="release" />
<area shape="rect" coords="12,118,80,143" href="jornais.php" />
</map>
<map name="index_r1_c1Map" id="index_r1_c1Map"><area shape="rect" coords="5,0,144,16" href="mailto:saquabb@hotmail.com" />
</map>
<map name="index_r8_c8Map" id="index_r8_c8Map"><area shape="rect" coords="37,3,176,18" href="agenda.php" />
</map></body>
</html>
<?php
mysql_free_result($noticias);

mysql_free_result($fotos);

mysql_free_result($agenda);
?>
