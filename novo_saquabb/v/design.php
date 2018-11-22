<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_trabalhos = 5;
$pageNum_trabalhos = 0;
if (isset($_GET['pageNum_trabalhos'])) {
  $pageNum_trabalhos = $_GET['pageNum_trabalhos'];
}
$startRow_trabalhos = $pageNum_trabalhos * $maxRows_trabalhos;

mysql_select_db($database_victor, $victor);
$query_trabalhos = "SELECT * FROM trabalhos WHERE categoria = 'cartaz' ORDER BY id DESC";
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

$queryString_trabalhos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_trabalhos") == false && 
        stristr($param, "totalRows_trabalhos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_trabalhos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_trabalhos = sprintf("&totalRows_trabalhos=%d%s", $totalRows_trabalhos, $queryString_trabalhos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: Victor Caeano -  Designer Gr&aacute;fico :::</title>
<link href="../Copy of victor/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../Copy of victor/imagens/fundo.jpg);
}
-->
</style></head>

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
        <td colspan="4"><img src="../Copy of victor/images/conteudo/conteudo_r1_c1.jpg" alt="" name="conteudo_r1_c1" width="733" height="47" border="0" usemap="#conteudo_r1_c1Map" id="conteudo_r1_c1" />
          <map name="conteudo_r1_c1Map" id="conteudo_r1_c1Map">
            <area shape="poly" coords="93,25,157,24,151,42,96,44" href="../Copy of victor/index.php" />
          </map></td>
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
        <td><img name="conteudo_r7_c2" src="../Copy of victor/imagens/titulos/design_gra.jpg" width="207" height="44" border="0" id="conteudo_r7_c2" alt="" /></td>
        <td colspan="2"><img name="conteudo_r7_c3" src="../Copy of victor/images/conteudo/conteudo_r7_c3.jpg" width="245" height="44" border="0" id="conteudo_r7_c3" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="44" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="5" align="left" valign="top"><?php do { ?>
            <table width="97%" border="0" align="center" cellpadding="0" cellspacing="4" class="borda">
              <tr>
                <th width="15" height="36" align="center" valign="top" scope="col"><a href="../Copy of victor/exibir_cart.php?id=<?php echo $row_trabalhos['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../victor/imagens/capas/", "{trabalhos.imagem}", 70, 50, false); ?>" border="0" class="borda_img" /></a></th>
                <th width="413" align="left" valign="middle" scope="col"><span class="categoria"><?php echo $row_trabalhos['titulo']; ?></span><br />
                  <span class="titulo"><a href="../Copy of victor/exibir_cart.php?id=<?php echo $row_trabalhos['id']; ?>" class="desc"><?php echo $row_trabalhos['descricao']; ?></a></span></th>
              </tr>
              </table>
            <?php } while ($row_trabalhos = mysql_fetch_assoc($trabalhos)); ?>
          <table width="97%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" scope="col"><table border="0" width="50%" align="center">
                  <tr>
                    <td width="23%" align="center"><?php if ($pageNum_trabalhos > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_trabalhos=%d%s", $currentPage, 0, $queryString_trabalhos); ?>"><img src="../Copy of victor/images/First.gif" border=0></a>
                          <?php } // Show if not first page ?>
                    </td>
                    <td width="31%" align="center"><?php if ($pageNum_trabalhos > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_trabalhos=%d%s", $currentPage, max(0, $pageNum_trabalhos - 1), $queryString_trabalhos); ?>"><img src="../Copy of victor/images/Previous.gif" border=0></a>
                          <?php } // Show if not first page ?>
                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_trabalhos < $totalPages_trabalhos) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_trabalhos=%d%s", $currentPage, min($totalPages_trabalhos, $pageNum_trabalhos + 1), $queryString_trabalhos); ?>"><img src="../Copy of victor/images/Next.gif" border=0></a>
                          <?php } // Show if not last page ?>
                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_trabalhos < $totalPages_trabalhos) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_trabalhos=%d%s", $currentPage, $totalPages_trabalhos, $queryString_trabalhos); ?>"><img src="../Copy of victor/images/Last.gif" border=0></a>
                          <?php } // Show if not last page ?>
                    </td>
                  </tr>
                </table></th>
            </tr>
          </table>
          <p>&nbsp;</p></td>
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
  <area shape="poly" coords="89,43,173,29,184,49,96,58" href="../Copy of victor/webdesign.php" alt="Webdesign" />
</map>
<map name="conteudo_r3_c1Map" id="conteudo_r3_c1Map">
  <area shape="poly" coords="62,37,200,14" href="#" />
  <area shape="poly" coords="106,44,66,44,66,37,201,6,212,29" href="../Copy of victor/design.php" />
</map>
<map name="conteudo_r4_c1Map" id="conteudo_r4_c1Map">
  <area shape="poly" coords="85,50,215,19,223,40,93,61" href="../Copy of victor/servicos.php" alt="Servi&ccedil;os Digitais" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map">
  <area shape="poly" coords="68,32,148,22,147,42,73,43" href="../Copy of victor/fotografia.php" alt="Fotografia" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map">
  <area shape="poly" coords="69,38,113,35,113,55,72,58" href="../Copy of victor/perfil.php" alt="Perfil" />
</map>
<map name="conteudo_r9_c1Map" id="conteudo_r9_c1Map">
  <area shape="poly" coords="53,16,119,10,125,27,55,29" href="../Copy of victor/contato.php" alt="Contato" />
</map></body>
</html>
<?php
mysql_free_result($trabalhos);
?>
