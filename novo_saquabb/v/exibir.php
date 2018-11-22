<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_exibir = "-1";
if (isset($_GET['id'])) {
  $colname_exibir = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_victor, $victor);
$query_exibir = sprintf("SELECT * FROM trabalhos WHERE id = %s", $colname_exibir);
$exibir = mysql_query($query_exibir, $victor) or die(mysql_error());
$row_exibir = mysql_fetch_assoc($exibir);
$totalRows_exibir = mysql_num_rows($exibir);
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
        <td colspan="2" rowspan="5" align="left" valign="top"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr>
              <th height="27" align="left" valign="middle" scope="col">&nbsp;<span class="titulo_exibir"><?php echo $row_exibir['titulo']; ?></span></th>
              </tr>
            <tr>
              <th height="14" align="left" valign="top" class="titulo" scope="col"><?php echo $row_exibir['descricao']; ?></th>
              </tr>
            <tr>
              <th align="center" scope="col">&nbsp;<img src="<?php echo tNG_showDynamicImage("../", "imagens/capas/", "{exibir.imagem}");?>" height="300" /></th>
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
  <area shape="poly" coords="89,43,173,29,186,42,96,58" href="../Copy of victor/webdesign.php" alt="Webdesign" />
</map>
<map name="conteudo_r3_c1Map" id="conteudo_r3_c1Map">
  <area shape="poly" coords="62,37,200,14" href="#" />
  <area shape="poly" coords="105,50,66,44,66,37,203,7,220,26" href="../Copy of victor/design.php" alt="Cartazes e Flyers" />
</map>
<map name="conteudo_r4_c1Map" id="conteudo_r4_c1Map">
  <area shape="poly" coords="85,50,222,19,217,40,93,61" href="../Copy of victor/servicos.php" alt="Servi&ccedil;os Digitais" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map">
  <area shape="poly" coords="68,32,148,16,146,42,68,42" href="../Copy of victor/fotografia.php" alt="Fotografia" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map">
  <area shape="poly" coords="69,38,113,35,113,55,72,58" href="../Copy of victor/perfil.php" alt="Perfil" />
</map>
<map name="conteudo_r9_c1Map" id="conteudo_r9_c1Map">
  <area shape="poly" coords="53,17,119,11,125,28,55,30" href="../Copy of victor/contato.php" alt="Contato" />
</map></body>
</html>
<?php
mysql_free_result($exibir);
?>