<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_fotografia = 20;
$pageNum_fotografia = 0;
if (isset($_GET['pageNum_fotografia'])) {
  $pageNum_fotografia = $_GET['pageNum_fotografia'];
}
$startRow_fotografia = $pageNum_fotografia * $maxRows_fotografia;

mysql_select_db($database_victor, $victor);
$query_fotografia = "SELECT * FROM fotografia ORDER BY id DESC";
$query_limit_fotografia = sprintf("%s LIMIT %d, %d", $query_fotografia, $startRow_fotografia, $maxRows_fotografia);
$fotografia = mysql_query($query_limit_fotografia, $victor) or die(mysql_error());
$row_fotografia = mysql_fetch_assoc($fotografia);

if (isset($_GET['totalRows_fotografia'])) {
  $totalRows_fotografia = $_GET['totalRows_fotografia'];
} else {
  $all_fotografia = mysql_query($query_fotografia);
  $totalRows_fotografia = mysql_num_rows($all_fotografia);
}
$totalPages_fotografia = ceil($totalRows_fotografia/$maxRows_fotografia)-1;

$queryString_fotografia = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_fotografia") == false && 
        stristr($param, "totalRows_fotografia") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_fotografia = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_fotografia = sprintf("&totalRows_fotografia=%d%s", $totalRows_fotografia, $queryString_fotografia);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: Victor Caeano -  Designer Gr&aacute;fico :::</title>
<link href="../Copy of victor/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../litbox/css/lightbox.css">

	<script src="../litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../litbox/js/lightbox.js" type="text/javascript"></script>
	
<style type="text/css">
<!--
body {
	background-image: url(../Copy of victor/imagens/fundo.jpg);
}
a {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <th align="center" valign="top" scope="col"><table border="0" cellpadding="0" cellspacing="0" width="733">
      <!-- fwtable fwsrc="Untitled" fwbase="conteudo.jpg" fwstyle="Dreamweaver" fwdocid = "2038926342" fwnested="0" -->
      <tr>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="281" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="207" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="234" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="11" height="1" border="0" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r1_c1.jpg" alt="" name="conteudo_r1_c1" width="733" height="47" border="0" usemap="#conteudo_r1_c1Map" id="conteudo_r1_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="47" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r2_c1.jpg" alt="" name="conteudo_r2_c1" width="733" height="62" border="0" usemap="#conteudo_r2_c1Map" id="conteudo_r2_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="62" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r3_c1.jpg" alt="" name="conteudo_r3_c1" width="733" height="48" border="0" usemap="#conteudo_r3_c1Map" id="conteudo_r3_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="48" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2" colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r4_c1.jpg" alt="" name="conteudo_r4_c1" width="733" height="66" border="0" usemap="#conteudo_r4_c1Map" id="conteudo_r4_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="10" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="56" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r6_c1.jpg" alt="" name="conteudo_r6_c1" width="733" height="44" border="0" usemap="#conteudo_r6_c1Map" id="conteudo_r6_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="44" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="../Copy of victor/images/conteudo/conteudo_r7_c1.jpg" alt="" name="conteudo_r7_c1" width="281" height="73" border="0" usemap="#conteudo_r7_c1Map" id="conteudo_r7_c1" /></td>
        <td><img name="conteudo_r7_c2" src="../Copy of victor/imagens/titulos/fotografia.jpg" width="207" height="44" border="0" id="conteudo_r7_c2" alt="" /></td>
        <td colspan="2"><img name="conteudo_r7_c3" src="../Copy of victor/images/conteudo/conteudo_r7_c3.jpg" width="245" height="44" border="0" id="conteudo_r7_c3" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="44" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="5" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="8">
            <tr>
              <th width="100%" align="left" valign="top" class="titulo" scope="col"><span class="categoria">Prefer&ecirc;ncias:</span> Fotos de A&ccedil;&atilde;o (Surf e Bodyboard).</th>
            </tr>
            <tr>
              <th align="left" valign="top" class="titulo" scope="col"><p><span class="categoria">Equipamento:</span> Canon S3 IS - 6 mp - 12x zoom.
                <br />
              </p>                </th>
              </tr>
            <tr>
              <th align="left" valign="top" class="titulo" scope="col">Abaixo voc&ecirc; encontra algumas fotos tiradas por mim. </th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="col"><table border="0">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                      <td><a href="<?php echo tNG_showDynamicImage("../", "fotos/", "{fotografia.foto}");?>" rel="lightbox[fotografia]"><img src="<?php echo tNG_showDynamicThumbnail("../", "fotos/", "{fotografia.foto}", 60, 45, false); ?>" border="0" class="borda_img" /></a></td>
                      <?php
    $row_fotografia = mysql_fetch_assoc($fotografia);
    if (!isset($nested_fotografia)) {
      $nested_fotografia= 1;
    }
    if (isset($row_fotografia) && is_array($row_fotografia) && $nested_fotografia++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotografia); //end horizontal looper version 3
?>
                  </tr>
                </table>
                <table border="0" width="50%" align="center">
                  <tr>
                    <td width="23%" align="center"><?php if ($pageNum_fotografia > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_fotografia=%d%s", $currentPage, 0, $queryString_fotografia); ?>"><img src="../Copy of victor/images/First.gif" alt="Primeira P&aacute;gina" width="18" height="13" border=0></a>
                        <?php } // Show if not first page ?>                    </td>
                    <td width="31%" align="center"><?php if ($pageNum_fotografia > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_fotografia=%d%s", $currentPage, max(0, $pageNum_fotografia - 1), $queryString_fotografia); ?>"><img src="../Copy of victor/images/Previous.gif" alt="P&aacute;gina Anterior" width="14" height="13" border=0></a>
                        <?php } // Show if not first page ?>                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_fotografia < $totalPages_fotografia) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_fotografia=%d%s", $currentPage, min($totalPages_fotografia, $pageNum_fotografia + 1), $queryString_fotografia); ?>"><img src="../Copy of victor/images/Next.gif" alt="Pr&oacute;xima P&aacute;gina" width="14" height="13" border=0></a>
                        <?php } // Show if not last page ?>                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_fotografia < $totalPages_fotografia) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_fotografia=%d%s", $currentPage, $totalPages_fotografia, $queryString_fotografia); ?>"><img src="../Copy of victor/images/Last.gif" alt="&Uacute;ltima P&aacute;gina" width="18" height="13" border=0></a>
                        <?php } // Show if not last page ?>                    </td>
                  </tr>
                </table></th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="col"><span class="categoria">P</span><span class="titulo"><strong>ara ver mais fotos tiradas por min acesse:</strong></span><br />
                <span class="titulo"><a href="http://www.saquabb.com.br" target="_blank" class="titulo">http://www.saquabb.com.br</a><br />
                <a href="http://www.realfotos.com.br" class="titulo">http://www.realfotos.com.br</a></span></th>
              </tr>
          </table>
          <p><br />
</p></td>
        <td rowspan="7"><img name="conteudo_r8_c4" src="../Copy of victor/images/conteudo/conteudo_r8_c4.jpg" width="11" height="471" border="0" id="conteudo_r8_c4" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="29" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../Copy of victor/images/conteudo/conteudo_r9_c1.jpg" alt="" name="conteudo_r9_c1" width="281" height="33" border="0" usemap="#conteudo_r9_c1Map" id="conteudo_r9_c1" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="33" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="conteudo_r10_c1" src="../Copy of victor/images/conteudo/conteudo_r10_c1.jpg" width="281" height="156" border="0" id="conteudo_r10_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="156" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="conteudo_r11_c1" src="../Copy of victor/images/conteudo/conteudo_r11_c1.jpg" width="281" height="103" border="0" id="conteudo_r11_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="103" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="conteudo_r12_c1" src="../Copy of victor/images/conteudo/conteudo_r12_c1.jpg" width="281" height="150" border="0" id="conteudo_r12_c1" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="84" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="2"><img name="conteudo_r13_c2" src="../Copy of victor/images/conteudo/conteudo_r13_c2.jpg" width="441" height="36" border="0" id="conteudo_r13_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="2"><img name="conteudo_r14_c2" src="../Copy of victor/images/conteudo/conteudo_r14_c2.jpg" width="441" height="30" border="0" id="conteudo_r14_c2" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="30" border="0" alt="" /></td>
      </tr>
    </table></th>
  </tr>
</table>

<map name="conteudo_r2_c1Map" id="conteudo_r2_c1Map">
  <area shape="poly" coords="89,43,173,29,186,42,96,58" href="../Copy of victor/webdesign.php" alt="Webdesign" />
</map>
<map name="conteudo_r3_c1Map" id="conteudo_r3_c1Map">
  <area shape="poly" coords="62,37,200,14" href="#" />
  <area shape="poly" coords="100,51,66,44,66,37,214,6,206,32" href="../Copy of victor/design.php" alt="Cartazes e Flyers" />
</map>
<map name="conteudo_r4_c1Map" id="conteudo_r4_c1Map">
  <area shape="poly" coords="85,50,217,20,217,40,93,61" href="../Copy of victor/servicos.php" alt="Servi&ccedil;os Digitais" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map">
  <area shape="poly" coords="68,32,148,22,150,34,71,49" href="../Copy of victor/fotografia.php" alt="Fotografia" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map">
  <area shape="poly" coords="69,38,113,35,113,55,72,58" href="../Copy of victor/perfil.php" alt="Perfil" />
</map>
<map name="conteudo_r9_c1Map" id="conteudo_r9_c1Map">
  <area shape="poly" coords="53,17,119,11,125,28,55,30" href="../Copy of victor/contato.php" alt="Contato" />
</map>
<map name="conteudo_r1_c1Map" id="conteudo_r1_c1Map">
<area shape="poly" coords="93,25,157,24,151,42,96,44" href="../Copy of victor/index.php" />
</map></body>
</html>
<?php
mysql_free_result($fotografia);
?>
