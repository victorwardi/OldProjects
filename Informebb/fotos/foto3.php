<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_fotos = 1;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

$variavel_fotos = "-1";
if (isset($_GET['id'])) {
  $variavel_fotos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$colname_fotos = "-1";
if (isset($_GET['id_foto'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['id_foto'] : addslashes($_GET['id_foto']);
}
mysql_select_db($database_fotos, $fotos);
$query_fotos = sprintf("SELECT * FROM fotos_digitais WHERE id_foto = %s AND id=%s ORDER BY id_foto DESC", $colname_fotos,$variavel_fotos);
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $fotos) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;

$queryString_fotos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_fotos") == false && 
        stristr($param, "totalRows_fotos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_fotos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_fotos = sprintf("&totalRows_fotos=%d%s", $totalRows_fotos, $queryString_fotos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<SCRIPT language=JavaScript>
	<!--
	curPage=1;
	document.oncontextmenu = function(){return false}
	if(document.layers) {
		window.captureEvents(Event.MOUSEDOWN);
		window.onmousedown = function(e){
			if(e.target==document)return false;
		}
	}
	else {
		document.onmousedown = function(){return false}
	}
	//-->
	</SCRIPT>

<link href="stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
-->
</style></head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <!-- fwtable fwsrc="Untitled" fwbase="foto.hmt.jpg" fwstyle="Dreamweaver" fwdocid = "1276698900" fwnested="0" -->
  <tr>
    <td><img src="imagens/verfoto/spacer.gif" width="52" height="1" border="0" alt="" /></td>
    <td><img src="imagens/verfoto/spacer.gif" width="500" height="1" border="0" alt="" /></td>
    <td><img src="imagens/verfoto/spacer.gif" width="48" height="1" border="0" alt="" /></td>
    <td><img src="imagens/verfoto/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img name="fotohmt_r1_c1" src="imagens/verfoto/foto.hmt_r1_c1.jpg" width="600" height="40" border="0" id="fotohmt_r1_c1" alt="" /></td>
    <td><img src="imagens/verfoto/spacer.gif" width="1" height="40" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="fotohmt_r2_c1" src="imagens/verfoto/foto.hmt_r2_c1.jpg" width="52" height="375" border="0" id="fotohmt_r2_c1" alt="" /></td>
    <td align="center" valign="middle" background="imagens/carregando.jpg" bgcolor="#FFFFFF"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/fotos_digitais/", "{fotos.arquivo}");?>" /></td>
    <td><img name="fotohmt_r2_c3" src="imagens/verfoto/foto.hmt_r2_c3.jpg" width="48" height="375" border="0" id="fotohmt_r2_c3" alt="" /></td>
    <td><img src="imagens/verfoto/spacer.gif" width="1" height="375" border="0" alt="" /></td>
  </tr>
  <tr>
    <td height="48" colspan="3" align="right" valign="bottom" background="imagens/verfoto/foto.hmt_r3_c1.jpg"><table border="0" width="47%" align="right">
      <tr>
        <td width="36%" height="44" align="right" valign="middle" class="nagegation"><?php if ($pageNum_fotos > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>">Anterior</a>
            <?php } // Show if not first page ?>        </td>
        <td width="29%" align="center" valign="middle" class="negrito"><span class="nagegation">Foto <?php echo ($startRow_fotos + 1) ?> de <?php echo $totalRows_fotos ?></span> </td>
        <td width="35%" align="left" valign="middle" class="nagegation"><?php if ($pageNum_fotos < $totalPages_fotos) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, min($totalPages_fotos, $pageNum_fotos + 1), $queryString_fotos); ?>">Pr&oacute;xima</a>
            <?php } // Show if not last page ?>        </td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="119" colspan="3" align="right" valign="top"><table width="90%" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <th width="52%" align="left" class="nome" scope="col"><?php echo $row_fotos['descricao']; ?></th>
        <th rowspan="4" align="center" valign="middle" class="negrito" scope="col"><img src="imagens/comprar.jpg" alt="Comprar!" width="150" height="70" /></th>
      </tr>
      <tr>
        <th height="21" align="left" class="fonte" scope="row"><span class="negrito">Local :</span> <?php echo $row_fotos['local']; ?></th>
        </tr>
      <tr>
        <th height="19" align="left" class="fonte" scope="col"><span class="negrito">Fot&oacute;grafo :</span><span class="fonte"> <?php echo $row_fotos['fotografo']; ?></span></th>
        </tr>
      <tr>
        <td height="19" align="left"><span class="negrito">C&oacute;digo : <span class="fonte"><?php echo $row_fotos['id_foto']; ?></span></span></td>
        </tr>
      <tr>
        <th height="20" colspan="2" align="left" class="nome" scope="col">&nbsp;</th>
        </tr>
      
    </table></td>
    <td><img src="imagens/verfoto/spacer.gif" width="1" height="57" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3" align="right" valign="top"><img src="imagens/rodape.jpg" width="600" height="28" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($fotos);
?>
