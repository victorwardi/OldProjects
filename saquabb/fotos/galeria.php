<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_capa = "SELECT * FROM galeria ORDER BY id DESC";
$capa = mysql_query($query_capa, $fotos) or die(mysql_error());
$row_capa = mysql_fetch_assoc($capa);
$totalRows_capa = mysql_num_rows($capa);

$colname_galerias = "-1";
if (isset($_GET['id'])) {
  $colname_galerias = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_galerias = sprintf("SELECT * FROM fotos_digitais WHERE id = '%s' ORDER BY id_foto DESC", $colname_galerias);
$galerias = mysql_query($query_galerias, $fotos) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);

$colname_comentarios = "-1";
if (isset($_GET['id'])) {
  $colname_comentarios = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_comentarios = sprintf("SELECT * FROM comentarios_not WHERE id = %s AND aprovado = 'y' ORDER BY id_coment DESC", $colname_comentarios);
$comentarios = mysql_query($query_comentarios, $fotos) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../java.js"></script>
<script type="text/JavaScript">
<!--
function abrir(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<style type="text/css">
<!--
.style2 {	color: #333333;
	font-size: 12px;
}
.style3 {font-size: 12px}
-->
</style>
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
    <td rowspan="2" align="center" valign="middle"><a href="galeria.php?id=<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/capa/", "{capa.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
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
        <th width="399" height="25" align="left" valign="middle" scope="col">&nbsp;<span class="titulo"><?php echo $row_capa['nome']; ?></span></th>
      </tr>
    </table></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="top" background="imagens/conteudo/conteudo_r8_c1.jpg"><table width="68%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th align="left" valign="top" scope="col"><table border="0">
            <tr>
              <?php
  do { // horizontal looper version 3
?>
                <td><a href="javascript:abrir('foto.php?id_foto=<?php echo $row_galerias['id_foto']; ?>&id=<?php echo $row_galerias['id']; ?>','','width=600,height=610')"><img src="<?php echo tNG_showDynamicThumbnail("../", "fotos_digitais/", "{galerias.arquivo}", 130, 0, true); ?>" border="0" class="borda_galeria" /></a></td>
                <?php
    $row_galerias = mysql_fetch_assoc($galerias);
    if (!isset($nested_galerias)) {
      $nested_galerias= 1;
    }
    if (isset($row_galerias) && is_array($row_galerias) && $nested_galerias++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_galerias); //end horizontal looper version 3
?>
            </tr>
          </table>
          </p></th>
      </tr>
    </table>
      <span class="titulo"><?php echo $row_galerias['id']; ?></span><br />
    <br />
    <table width="70%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" height="21" border="0" cellpadding="0" cellspacing="2" bordercolor="#25292C" bgcolor="#25292C" class="borda_tabela">
              <tr>
                <td height="20" bgcolor="#25292C" class="titulo">Coment&aacute;rios:</td>
              </tr>
          </table></td>
      </tr>
      <tr>
        <td height="79" align="left" valign="top"><p><span class="texto_galeria">O Saquabb.com.br n&atilde;o publicar&aacute; coment&aacute;rios ofensivos, desrespeitosos  e que venham h&aacute; prejudicar ou insultar quem quer que seja! 
  Todos os coment&aacute;rios s&atilde;o analisados para depois serem  publicados!<br />
  N&atilde;o estamos proibindo que sejam feitas cr&iacute;ticas, apenas que  nosso site n&atilde;o se torne um antro de fofocas!<br />
  Desde j&aacute;, agradecemos &agrave; compreens&atilde;o!</span><strong><br />
            <br />
          </strong></p></td>
      </tr>
      <tr>
        <td><?php do { ?>
            <?php 
// Show If Field Has Changed (region2)
if (tNG_fieldHasChanged("region2", $row_comentarios['id_coment'])) {
?>
            <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#25292C" class="borda_tabela">
              <tr>
			  
                <td align="left" bgcolor="#25292C" class="titulo"><strong class="titulo_coment"><?php echo substr($row_comentarios['nome'] ,0,100)." - "; ?> <?php echo substr ($row_comentarios['mail'],0,100)." - "; ?>  <?php echo $row_comentarios['cidade']; ?></strong></td>
              </tr>
              <tr>
                <td height="20" align="left" valign="top" bgcolor="#313639" class="texto_galeria"><?php echo $row_comentarios['comentario']; ?></td>
              </tr>
            </table>
          <?php } 
// EndIf Field Has Changed (region2)
?>
          <br />
            <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle"><table width="126" height="22" border="0" cellpadding="0" cellspacing="2" class="borda_tabela">
            <tr>
              <td width="122" align="center" valign="middle" bgcolor="#575C60"><a href="javascript:abrir_janela('comentar.php?id=<?php echo $row_capa['id']; ?>','Saquabb','','420','400','true')" class="titulo">Comentar</a></td>
            </tr>
        </table>
          </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
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
mysql_free_result($capa);

mysql_free_result($galerias);

mysql_free_result($comentarios);
?>
