<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_web = 4;
$pageNum_web = 0;
if (isset($_GET['pageNum_web'])) {
  $pageNum_web = $_GET['pageNum_web'];
}
$startRow_web = $pageNum_web * $maxRows_web;

mysql_select_db($database_victor, $victor);
$query_web = "SELECT * FROM trabalhos WHERE categoria = 'webdesign' ORDER BY id DESC";
$query_limit_web = sprintf("%s LIMIT %d, %d", $query_web, $startRow_web, $maxRows_web);
$web = mysql_query($query_limit_web, $victor) or die(mysql_error());
$row_web = mysql_fetch_assoc($web);

if (isset($_GET['totalRows_web'])) {
  $totalRows_web = $_GET['totalRows_web'];
} else {
  $all_web = mysql_query($query_web);
  $totalRows_web = mysql_num_rows($all_web);
}
$totalPages_web = ceil($totalRows_web/$maxRows_web)-1;

$queryString_web = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_web") == false && 
        stristr($param, "totalRows_web") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_web = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_web = sprintf("&totalRows_web=%d%s", $totalRows_web, $queryString_web);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../Copy of victor/css.css" rel="stylesheet" type="text/css" />

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
        <td><img name="conteudo_r7_c2" src="../Copy of victor/imagens/titulos/webdesign.jpg" width="207" height="44" border="0" id="conteudo_r7_c2" alt="" /></td>
        <td colspan="2"><img name="conteudo_r7_c3" src="../Copy of victor/images/conteudo/conteudo_r7_c3.jpg" width="245" height="44" border="0" id="conteudo_r7_c3" alt="" /></td>
        <td><img src="../Copy of victor/images/conteudo/spacer.gif" width="1" height="44" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="5" align="right" valign="top"><?php do { ?>
            <table width="97%" border="0" cellpadding="0" cellspacing="4" class="borda">
              <tr>
                <th width="20%" rowspan="2" align="center" valign="top" scope="col">&nbsp;<a href="../Copy of victor/exibir_web.php?id=<?php echo $row_web['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../victor/imagens/capas/", "{web.imagem}", 70, 50, false); ?>" border="0" class="borda_img" /></a></th>
                <th width="80%" align="left" valign="bottom" scope="col"><span class="categoria"><?php echo $row_web['titulo']; ?></span></th>
                </tr>
              <tr>
                <th height="12" align="left" valign="top" scope="col"><span class="titulo"><a href="../Copy of victor/exibir_web.php?id=<?php echo $row_web['id']; ?>" class="desc"><?php echo $row_web['descricao']; ?></a></span></th>
              </tr>
              </table>
            <?php } while ($row_web = mysql_fetch_assoc($web)); ?>
          <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <th width="235" height="32" align="right" valign="middle" scope="col"><table border="0" width="36%" align="right">
                <tr>
                  <td width="23%" align="center"><?php if ($pageNum_web > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_web=%d%s", $currentPage, 0, $queryString_web); ?>"><img src="../Copy of victor/images/First.gif" alt="Primeiro" width="18" height="13" border="0" /></a>
                      <?php } // Show if not first page ?>
                  </td>
                  <td width="31%" align="center"><?php if ($pageNum_web > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_web=%d%s", $currentPage, max(0, $pageNum_web - 1), $queryString_web); ?>"><img src="../Copy of victor/images/Previous.gif" alt="Anterior" width="14" height="13" border="0" /></a>
                      <?php } // Show if not first page ?>
                  </td>
                  <td width="23%" align="center"><?php if ($pageNum_web < $totalPages_web) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_web=%d%s", $currentPage, min($totalPages_web, $pageNum_web + 1), $queryString_web); ?>"><img src="../Copy of victor/images/Next.gif" alt="Pr&oacute;ximo" width="14" height="13" border="0" /></a>
                      <?php } // Show if not last page ?>
                  </td>
                  <td width="23%" align="center"><?php if ($pageNum_web < $totalPages_web) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_web=%d%s", $currentPage, $totalPages_web, $queryString_web); ?>"><img src="../Copy of victor/images/Last.gif" alt="&Uacute;ltimo" width="18" height="13" border="0" /></a>
                      <?php } // Show if not last page ?>
                  </td>
                </tr>
              </table></th>
            </tr>
          </table>
          </td>
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
<area shape="poly" coords="87,42,175,30,186,46,91,59" href="../Copy of victor/webdesign.php" />
</map>
<map name="conteudo_r3_c1Map" id="conteudo_r3_c1Map">
<area shape="poly" coords="64,38,196,13" href="#" />
<area shape="poly" coords="68,39,202,6,205,33,73,46" href="../Copy of victor/design.php" />
</map>
<map name="conteudo_r4_c1Map" id="conteudo_r4_c1Map">
<area shape="poly" coords="84,47,216,22,218,46,88,64" href="../Copy of victor/servicos.php" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map">
<area shape="poly" coords="68,29,150,19,148,38,68,43" href="../Copy of victor/fotografia.php" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map">
<area shape="poly" coords="61,39,112,36,116,56,68,57" href="../Copy of victor/perfil.php" />
</map>
<map name="conteudo_r9_c1Map" id="conteudo_r9_c1Map">
<area shape="poly" coords="54,15,122,11,123,26,60,30" href="../Copy of victor/contato.php" />
</map></body>
</html>
<?php
mysql_free_result($web);
?>
