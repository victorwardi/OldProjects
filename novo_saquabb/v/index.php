<?php require_once('../Connections/victor.php'); ?>
<?php
$maxRows_trabalhos = 6;
$pageNum_trabalhos = 0;
if (isset($_GET['pageNum_trabalhos'])) {
  $pageNum_trabalhos = $_GET['pageNum_trabalhos'];
}
$startRow_trabalhos = $pageNum_trabalhos * $maxRows_trabalhos;

mysql_select_db($database_victor, $victor);
$query_trabalhos = "SELECT * FROM trabalhos ORDER BY id DESC";
$query_limit_trabalhos = sprintf("%s LIMIT %d, %d", $query_trabalhos, $startRow_trabalhos, $maxRows_trabalhos);
$trabalhos = mysql_query($query_limit_trabalhos, $victor) or die(mysql_error());
$row_trabalhos = mysql_fetch_assoc($trabalhos);

if (isset($_GET['totalRows_trabalhos'])) {
  $totalRows_trabalhos = $_GET['totalRows_trabalhos'];
} else {
  $all_trabalhos = mysql_query($query_trabalhos);
  $totalRows_trabalhos = mysql_num_rows($all_trabalhos);
}
$totalPages_trabalhos = ceil($totalRows_trabalhos/$maxRows_trabalhos)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="author" CONTENT="Victor Caetano">
<META NAME="description" CONTENT="Victor Caetano - Designer Gráfico">
<META NAME="keywords" CONTENT="sites, web, desenvolvimento, grafica, site, webdesign, cartaz, cartazes, bodyboard, saqua, saquarema, flyer, flyers, fotos, perfil, galeria, contato, fale, conosco">
<title> ::: Victor Caeano -  Designer Gr&aacute;fico ::: </title>
<style type="text/css">
<!--
body {
	background-color: #FCD800;
	background-image: url(../Copy of victor/imagens/fundo.jpg);
}
-->
</style>
<link href="../Copy of victor/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <th align="center" valign="top" scope="col"><table border="0" cellpadding="0" cellspacing="0" width="733">
      <!-- fwtable fwsrc="Untitled" fwbase="site.jpg" fwstyle="Dreamweaver" fwdocid = "979672795" fwnested="0" -->
      <tr>
        <td><img src="../Copy of victor/images/spacer.gif" width="214" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="154" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="362" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="3" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/site_r1_c1.jpg" alt="" name="site_r1_c1" width="214" height="47" border="0" id="site_r1_c1" /></td>
        <td colspan="3"><img name="site_r1_c2" src="../Copy of victor/images/site_r1_c2.jpg" width="519" height="47" border="0" id="site_r1_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="47" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="4"><img name="site_r2_c1" src="../Copy of victor/images/site_r2_c1.jpg" width="733" height="20" border="0" id="site_r2_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="20" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/site_r3_c1.jpg" alt="" name="site_r3_c1" width="214" height="47" border="0" usemap="#site_r3_c1Map" id="site_r3_c1" /></td>
        <td colspan="3"><img name="site_r3_c2" src="../Copy of victor/images/site_r3_c2.jpg" width="519" height="47" border="0" id="site_r3_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="47" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="../Copy of victor/images/site_r4_c1.jpg" alt="" name="site_r4_c1" width="214" height="50" border="0" usemap="#site_r4_c1Map" id="site_r4_c1" /></td>
        <td colspan="3"><img name="site_r4_c2" src="../Copy of victor/images/site_r4_c2.jpg" width="519" height="36" border="0" id="site_r4_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="36" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2" colspan="3"><img name="site_r5_c2" src="../Copy of victor/images/site_r5_c2.jpg" width="519" height="24" border="0" id="site_r5_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="14" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="site_r6_c1" src="../Copy of victor/images/site_r6_c1.jpg" width="214" height="10" border="0" id="site_r6_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="10" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="../Copy of victor/images/site_r7_c1.jpg" alt="" name="site_r7_c1" width="214" height="45" border="0" usemap="#site_r7_c1Map" id="site_r7_c1" /></td>
        <td colspan="3"><img name="site_r7_c2" src="../Copy of victor/images/site_r7_c2.jpg" width="519" height="15" border="0" id="site_r7_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="15" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2" colspan="3"><img name="site_r8_c2" src="../Copy of victor/images/site_r8_c2.jpg" width="519" height="50" border="0" id="site_r8_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="30" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="site_r9_c1" src="../Copy of victor/images/site_r9_c1.jpg" width="214" height="20" border="0" id="site_r9_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="20" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="../Copy of victor/images/site_r10_c1.jpg" alt="" name="site_r10_c1" width="214" height="39" border="0" usemap="#site_r10_c1Map" id="site_r10_c1" /></td>
        <td colspan="3"><img name="site_r10_c2" src="../Copy of victor/images/site_r10_c2.jpg" width="519" height="24" border="0" id="site_r10_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="6"><img name="site_r11_c2" src="../Copy of victor/images/site_r11_c2.jpg" width="154" height="242" border="0" id="site_r11_c2" alt="" /></td>
        <td rowspan="5" align="left" valign="top"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="62" align="left" valign="middle" scope="col"><?php do { ?>
                <table width="347" border="0" cellpadding="0" cellspacing="2" class="borda">
                  <tr>
                    <th width="15" height="25" align="left" valign="middle" scope="col"><img src="../Copy of victor/imagens/marcador.jpg" width="15" height="15" /></th>
                    <th width="326" align="left" valign="middle" scope="col"><div align="left"><span class="categoria"><?php echo $row_trabalhos['categoria']; ?></span> <span class="titulo">-</span> <span class="titulo"><?php echo $row_trabalhos['titulo']; ?></span></div></th>
                  </tr>
                    </table>
                <?php } while ($row_trabalhos = mysql_fetch_assoc($trabalhos)); ?></th>
          </tr>
        </table>
          <br /></td>
        <td rowspan="7"><img name="site_r11_c4" src="../Copy of victor/images/site_r11_c4.jpg" width="3" height="281" border="0" id="site_r11_c4" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="15" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="site_r12_c1" src="../Copy of victor/images/site_r12_c1.jpg" width="214" height="10" border="0" id="site_r12_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="10" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/site_r13_c1.jpg" alt="" name="site_r13_c1" width="214" height="54" border="0" usemap="#site_r13_c1Map" id="site_r13_c1" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="54" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/site_r14_c1.jpg" alt="" name="site_r14_c1" width="214" height="34" border="0" usemap="#site_r14_c1Map" id="site_r14_c1" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="34" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="site_r15_c1" src="../Copy of victor/images/site_r15_c1.jpg" width="214" height="168" border="0" id="site_r15_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="107" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="site_r16_c3" src="../Copy of victor/images/site_r16_c3.jpg" width="362" height="61" border="0" id="site_r16_c3" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="site_r17_c2" src="../Copy of victor/images/site_r17_c2.jpg" width="154" height="39" border="0" id="site_r17_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/spacer.gif" width="1" height="39" border="0" alt="" /></td>
      </tr>
    </table></th>
  </tr>
</table>

<map name="site_r3_c1Map" id="site_r3_c1Map">
<area shape="poly" coords="87,23,87,24,179,7,181,26,95,42" href="../Copy of victor/webdesign.php" />
</map>
<map name="site_r4_c1Map" id="site_r4_c1Map">
<area shape="poly" coords="68,31,200,9,201,27,71,48" href="../Copy of victor/design.php" />
</map>
<map name="site_r7_c1Map" id="site_r7_c1Map">
<area shape="poly" coords="88,30,210,10,211,30,91,42" href="../Copy of victor/servicos.php" />
</map>
<map name="site_r10_c1Map" id="site_r10_c1Map">
<area shape="poly" coords="66,16,145,5,149,18,70,31" href="../Copy of victor/fotografia.php" />
</map>
<map name="site_r13_c1Map" id="site_r13_c1Map">
<area shape="poly" coords="67,16,114,14,116,31,72,32" href="../Copy of victor/perfil.php" />
</map>
<map name="site_r14_c1Map" id="site_r14_c1Map">
<area shape="poly" coords="54,11,120,6,122,19,62,29" href="../Copy of victor/contato.php" />
</map></body>
</html>
<?php
mysql_free_result($trabalhos);

mysql_free_result($trabalhos);
?>
