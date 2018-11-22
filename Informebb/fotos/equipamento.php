<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_galerias = "SELECT * FROM galeria ORDER BY id DESC";
$galerias = mysql_query($query_galerias, $fotos) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="105" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="552" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="102" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="conteudo_r1_c1" src="imagens/conteudo/conteudo_r1_c1.jpg" width="1" height="17" border="0" id="conteudo_r1_c1" alt="" /></td>
    <td rowspan="4"><img name="conteudo_r1_c2" src="imagens/conteudo/conteudo_r1_c2.jpg" width="105" height="422" border="0" id="conteudo_r1_c2" alt="" /></td>
    <td rowspan="2"><img src="imagens/conteudo/conteudo_r1_c3.jpg" alt="" name="conteudo_r1_c3" width="552" height="90" border="0" usemap="#conteudo_r1_c3Map" id="conteudo_r1_c3" /></td>
    <td rowspan="4"><img name="conteudo_r1_c4" src="imagens/conteudo/conteudo_r1_c4.jpg" width="102" height="422" border="0" id="conteudo_r1_c4" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="3"><img name="conteudo_r2_c1" src="imagens/conteudo/conteudo_r2_c1.jpg" width="1" height="405" border="0" id="conteudo_r2_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="73" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" valign="middle"><a href="galeria.php?id=<?php echo $row_galerias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/capa/", "{galerias.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="331" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r5_c1" src="imagens/conteudo/conteudo_r5_c1.jpg" width="760" height="36" border="0" id="conteudo_r5_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img src="imagens/conteudo/conteudo_r6_c1.jpg" alt="" name="conteudo_r6_c1" width="760" height="37" border="0" usemap="#conteudo_r6_c1Map" id="conteudo_r6_c1" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="37" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="bottom" background="imagens/fundo_titulo.jpg"><table width="513" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <th width="399" height="25" align="left" valign="middle" scope="col">&nbsp;<span class="titulo">Equipamento </span></th>
      </tr>
    </table></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="top" background="imagens/conteudo/conteudo_r8_c1.jpg"><table width="68%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th align="left" valign="top" scope="col"><p>&nbsp;</p>
          <p>&nbsp;</p></th></tr>
    </table></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="97" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r9_c1" src="imagens/conteudo/conteudo_r9_c1.jpg" width="760" height="48" border="0" id="conteudo_r9_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="48" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r10_c1" src="imagens/conteudo/conteudo_r10_c1.jpg" width="760" height="14" border="0" id="conteudo_r10_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="14" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r11_c1" src="imagens/conteudo/conteudo_r11_c1.jpg" width="760" height="32" border="0" id="conteudo_r11_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="32" border="0" alt="" /></td>
  </tr>
</table>

<map name="conteudo_r1_c3Map" id="conteudo_r1_c3Map">
<area shape="rect" coords="472,60,495,84" href="index.php" />
<area shape="rect" coords="500,61,526,84" href="contato.php" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map"><area shape="rect" coords="112,8,208,27" href="index.php" />
<area shape="rect" coords="245,9,309,25" href="galerias.php" />
<area shape="rect" coords="342,9,424,25" href="quemsomos.php" />
<area shape="rect" coords="450,9,535,25" href="equipamento.php" />
<area shape="rect" coords="570,9,635,24" href="contato.php" />
</map></body>
</html>
<?php
mysql_free_result($galerias);
?>
