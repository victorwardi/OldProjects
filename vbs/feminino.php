<?php require_once('Connections/ConVBS.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMarcas = "SELECT * FROM marcas ORDER BY nome ASC";
$RsMarcas = mysql_query($query_RsMarcas, $ConVBS) or die(mysql_error());
$row_RsMarcas = mysql_fetch_assoc($RsMarcas);
$totalRows_RsMarcas = mysql_num_rows($RsMarcas);

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsTipos = "SELECT * FROM tipo ORDER BY nome ASC";
$RsTipos = mysql_query($query_RsTipos, $ConVBS) or die(mysql_error());
$row_RsTipos = mysql_fetch_assoc($RsTipos);
$totalRows_RsTipos = mysql_num_rows($RsTipos);

$maxRows_RsPublicidade = 10;
$pageNum_RsPublicidade = 0;
if (isset($_GET['pageNum_RsPublicidade'])) {
  $pageNum_RsPublicidade = $_GET['pageNum_RsPublicidade'];
}
$startRow_RsPublicidade = $pageNum_RsPublicidade * $maxRows_RsPublicidade;

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsPublicidade = "SELECT * FROM propaganda ORDER BY id_propaganda DESC";
$query_limit_RsPublicidade = sprintf("%s LIMIT %d, %d", $query_RsPublicidade, $startRow_RsPublicidade, $maxRows_RsPublicidade);
$RsPublicidade = mysql_query($query_limit_RsPublicidade, $ConVBS) or die(mysql_error());
$row_RsPublicidade = mysql_fetch_assoc($RsPublicidade);

if (isset($_GET['totalRows_RsPublicidade'])) {
  $totalRows_RsPublicidade = $_GET['totalRows_RsPublicidade'];
} else {
  $all_RsPublicidade = mysql_query($query_RsPublicidade);
  $totalRows_RsPublicidade = mysql_num_rows($all_RsPublicidade);
}
$totalPages_RsPublicidade = ceil($totalRows_RsPublicidade/$maxRows_RsPublicidade)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("fotos/");
$objDynamicThumb1->setRenameRule("{RsPublicidade.imagem}");
$objDynamicThumb1->setResize(200, 0, true);
$objDynamicThumb1->setWatermark(false);

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_RsProdutos = 12;
$pageNum_RsProdutos = 0;
if (isset($_GET['pageNum_RsProdutos'])) {
  $pageNum_RsProdutos = $_GET['pageNum_RsProdutos'];
}
$startRow_RsProdutos = $pageNum_RsProdutos * $maxRows_RsProdutos;

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsProdutos = "SELECT * FROM produtos WHERE categoria = 'feminino' ORDER BY id DESC";
$query_limit_RsProdutos = sprintf("%s LIMIT %d, %d", $query_RsProdutos, $startRow_RsProdutos, $maxRows_RsProdutos);
$RsProdutos = mysql_query($query_limit_RsProdutos, $ConVBS) or die(mysql_error());
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);

if (isset($_GET['totalRows_RsProdutos'])) {
  $totalRows_RsProdutos = $_GET['totalRows_RsProdutos'];
} else {
  $all_RsProdutos = mysql_query($query_RsProdutos);
  $totalRows_RsProdutos = mysql_num_rows($all_RsProdutos);
}
$totalPages_RsProdutos = ceil($totalRows_RsProdutos/$maxRows_RsProdutos)-1;

$colname_RsMostraMarca = "-1";
if (isset($_GET['id_marca'])) {
  $colname_RsMostraMarca = $_GET['id_marca'];
}
mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMostraMarca = sprintf("SELECT * FROM marcas WHERE id_marca = %s", GetSQLValueString($colname_RsMostraMarca, "int"));
$RsMostraMarca = mysql_query($query_RsMostraMarca, $ConVBS) or die(mysql_error());
$row_RsMostraMarca = mysql_fetch_assoc($RsMostraMarca);
$totalRows_RsMostraMarca = mysql_num_rows($RsMostraMarca);

$queryString_RsProdutos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsProdutos") == false && 
        stristr($param, "totalRows_RsProdutos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsProdutos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsProdutos = sprintf("&totalRows_RsProdutos=%d%s", $totalRows_RsProdutos, $queryString_RsProdutos);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("fotos/");
$objDynamicThumb2->setRenameRule("{RsProdutos.foto1}");
$objDynamicThumb2->setResize(100, 120, false);
$objDynamicThumb2->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Vila Beach Surfing - A Loja Mais Surf de Saquarema</title>
<!-- InstanceEndEditable -->
<!-- lightbox -->

<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->

<link href="stilo.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="enviar.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body onload="MM_preloadImages('img/menu/menu_r2_c10_f2.jpg','img/menu/menu_r3_c2_f2.jpg','img/menu/menu_r3_c4_f2.jpg','img/menu/menu_r3_c6_f2.jpg','img/menu/menu_r3_c8_f2.jpg','img/menu/menu_r3_c12_f2.jpg','img/menu/menu_r3_c14_f2.jpg','img/menu/menu_r3_c16_f2.jpg')">
<table width="861" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td width="853" align="center" valign="middle">
	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','850','height','186','title','Vila Beach Surfing','src','flash/topo','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','flash/topo' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="850" height="186" title="Vila Beach Surfing">
	 <param name="wmode" value="transparent"/>
      <param name="movie" value="flash/topo.swf" />
      <param name="quality" value="high" />
      <embed src="flash/topo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="850" height="186"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td height="21" align="center" valign="middle"><table border="0" cellpadding="0" cellspacing="0" width="850">
      <!-- fwtable fwsrc="menu.png" fwbase="menu.jpg" fwstyle="Dreamweaver" fwdocid = "1361843291" fwnested="0" -->
      <tr>
        <td><img src="img/menu/spacer.gif" width="7" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="39" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="80" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="15" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="65" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="146" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="88" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="22" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="127" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="15" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="100" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="16" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="68" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="11" height="1" border="0" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="17"><img name="menu_r1_c1" src="img/menu/menu_r1_c1.jpg" width="850" height="6" border="0" id="menu_r1_c1" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="6" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="9"><img name="menu_r2_c1" src="img/menu/menu_r2_c1.jpg" width="403" height="3" border="0" id="menu_r2_c1" alt="" /></td>
        <td rowspan="4"><a href="promo.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r2_c10','','img/menu/menu_r2_c10_f2.jpg',1)"><img name="menu_r2_c10" src="img/menu/menu_r2_c10.jpg" width="88" height="17" border="0" id="menu_r2_c10" alt="Promo&ccedil;oes" /></a></td>
        <td colspan="7"><img name="menu_r2_c11" src="img/menu/menu_r2_c11.jpg" width="359" height="3" border="0" id="menu_r2_c11" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="3" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="4"><img name="menu_r3_c1" src="img/menu/menu_r3_c1.jpg" width="7" height="21" border="0" id="menu_r3_c1" alt="" /></td>
        <td><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c2','','img/menu/menu_r3_c2_f2.jpg',1)"><img name="menu_r3_c2" src="img/menu/menu_r3_c2.jpg" width="39" height="12" border="0" id="menu_r3_c2" alt="Home" /></a></td>
        <td rowspan="4"><img name="menu_r3_c3" src="img/menu/menu_r3_c3.jpg" width="17" height="21" border="0" id="menu_r3_c3" alt="" /></td>
        <td><a href="masculino.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c4','','img/menu/menu_r3_c4_f2.jpg',1)"><img name="menu_r3_c4" src="img/menu/menu_r3_c4.jpg" width="80" height="12" border="0" id="menu_r3_c4" alt="Masculino" /></a></td>
        <td rowspan="4"><img name="menu_r3_c5" src="img/menu/menu_r3_c5.jpg" width="15" height="21" border="0" id="menu_r3_c5" alt="" /></td>
        <td><a href="feminino.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c6','','img/menu/menu_r3_c6_f2.jpg',1)"><img name="menu_r3_c6" src="img/menu/menu_r3_c6.jpg" width="65" height="12" border="0" id="menu_r3_c6" alt="Feminino" /></a></td>
        <td rowspan="4"><img name="menu_r3_c7" src="img/menu/menu_r3_c7.jpg" width="17" height="21" border="0" id="menu_r3_c7" alt="" /></td>
        <td rowspan="2"><a href="outros.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c8','','img/menu/menu_r3_c8_f2.jpg',1)"><img name="menu_r3_c8" src="img/menu/menu_r3_c8.jpg" width="146" height="13" border="0" id="menu_r3_c8" alt="Outros Produtos" /></a></td>
        <td rowspan="4"><img name="menu_r3_c9" src="img/menu/menu_r3_c9.jpg" width="17" height="21" border="0" id="menu_r3_c9" alt="" /></td>
        <td rowspan="4"><img name="menu_r3_c11" src="img/menu/menu_r3_c11.jpg" width="22" height="21" border="0" id="menu_r3_c11" alt="" /></td>
        <td rowspan="2"><a href="fotos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c12','','img/menu/menu_r3_c12_f2.jpg',1)"><img name="menu_r3_c12" src="img/menu/menu_r3_c12.jpg" width="127" height="13" border="0" id="menu_r3_c12" alt="Fotos da Galera" /></a></td>
        <td rowspan="4"><img name="menu_r3_c13" src="img/menu/menu_r3_c13.jpg" width="15" height="21" border="0" id="menu_r3_c13" alt="" /></td>
        <td rowspan="2"><a href="comochegar.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c14','','img/menu/menu_r3_c14_f2.jpg',1)"><img name="menu_r3_c14" src="img/menu/menu_r3_c14.jpg" width="100" height="13" border="0" id="menu_r3_c14" alt="Como Chegar" /></a></td>
        <td rowspan="4"><img name="menu_r3_c15" src="img/menu/menu_r3_c15.jpg" width="16" height="21" border="0" id="menu_r3_c15" alt="" /></td>
        <td><a href="contato.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c16','','img/menu/menu_r3_c16_f2.jpg',1)"><img name="menu_r3_c16" src="img/menu/menu_r3_c16.jpg" width="68" height="12" border="0" id="menu_r3_c16" alt="" /></a></td>
        <td rowspan="4"><img name="menu_r3_c17" src="img/menu/menu_r3_c17.jpg" width="11" height="21" border="0" id="menu_r3_c17" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="12" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="menu_r4_c2" src="img/menu/menu_r4_c2.jpg" width="39" height="9" border="0" id="menu_r4_c2" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c4" src="img/menu/menu_r4_c4.jpg" width="80" height="9" border="0" id="menu_r4_c4" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c6" src="img/menu/menu_r4_c6.jpg" width="65" height="9" border="0" id="menu_r4_c6" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c16" src="img/menu/menu_r4_c16.jpg" width="68" height="9" border="0" id="menu_r4_c16" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="menu_r5_c8" src="img/menu/menu_r5_c8.jpg" width="146" height="8" border="0" id="menu_r5_c8" alt="" /></td>
        <td rowspan="2"><img name="menu_r5_c12" src="img/menu/menu_r5_c12.jpg" width="127" height="8" border="0" id="menu_r5_c12" alt="" /></td>
        <td rowspan="2"><img name="menu_r5_c14" src="img/menu/menu_r5_c14.jpg" width="100" height="8" border="0" id="menu_r5_c14" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="menu_r6_c10" src="img/menu/menu_r6_c10.jpg" width="88" height="7" border="0" id="menu_r6_c10" alt="" /></td>
        <td><img src="img/menu/spacer.gif" width="1" height="7" border="0" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="38" align="center" valign="top">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
          <td height="25" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="4">
              
              <tr>
              <td width="22%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                    
                <tr>
                  <td height="25" align="left"><table width="98%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                    <tr>
                      <td height="20"><strong>&raquo; Procurar </strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25" align="left"><table width="215" border="0" cellpadding="0" cellspacing="0" class="tabela_margin_cima">
                    <tr>
                      <form id="busca" name="busca" method="GET" action="procurar.php">
                        <td width="168" height="34" align="center" valign="middle"><input name="busca" type="text" class="textbox2" id="busca" size="20" maxlength="50" /></td>
                        <td width="47" align="center" valign="middle"><input name="enviar" type="submit" class="bg_titulo" id="enviar" value="ok" />                        </td>
                      </form>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                      <td height="25" align="left"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                          <tr>
                            <td height="20"><strong>&raquo;  Marcas</strong></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><?php do { ?>
                        <div id="lista_marcas">&raquo; <a href="produto_marca.php?marca=<?= $row_RsMarcas['nome'];?>"><?php echo $row_RsMarcas['nome']; ?></a> </div>
                        <?php } while ($row_RsMarcas = mysql_fetch_assoc($RsMarcas)); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25" bgcolor="#B4D6C6"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                        <tr>
                          <td height="20"><strong>&raquo; Tipos</strong></td>
                        </tr>
                      </table></td>
                    </tr>
                <tr>
                  <td><?php do { ?>
                    <div id="lista_marcas">&raquo; <a href="produto_tipo.php?tipo=<?= $row_RsTipos['id_tipo'];?>"><?php echo $row_RsTipos['nome']; ?></a></div>
                      <?php } while ($row_RsTipos = mysql_fetch_assoc($RsTipos)); ?></td>
                    </tr>
                              </table>                
                <p><strong><br />
                </strong></p></td>
              <td width="59%" rowspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top"><!-- InstanceBeginEditable name="banner" --><img src="img/feminino_pg.jpg" alt="Feminino" width="468" height="44" class="borda_preta" /><!-- InstanceEndEditable --></td>
                </tr>
                <tr>
                  <td rowspan="2" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
                    <div><br />
                      <?php if ($totalRows_RsProdutos == 0) { // Show if recordset empty ?>
                        <div class="ProdutoMarca">Nenhum Produto Cadastrado.</div>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_RsProdutos > 0) { // Show if recordset not empty ?>
  <table border="0" align="left">
    <tr>
      <?php
do { // horizontal looper version 3
?>
        <td width="151"><table width="153" border="0" cellpadding="2" cellspacing="0" class="borda_cinza">
          <tr>
            <td width="146" align="center"><a href="produto.php?id=<?php echo $row_RsProdutos['id']; ?>&amp;marca=<?php echo $row_RsProdutos['marca']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></td>
          </tr>
          <tr>
            <td align="center"><strong><?php echo substr ($row_RsProdutos['nome'] ,0,15).""; ?><br />
                  <span class="fonte_marca"><?php echo $row_RsProdutos['marca']; ?></span></strong></td>
          </tr>
          <tr>
            <td align="center">R$<?php echo $row_RsProdutos['preco']; ?></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#B8DFCA"><a href="produto.php?id=<?php echo $row_RsProdutos['id']; ?>&amp;marca=<?php echo $row_RsProdutos['marca']; ?>">ver detalhes </a></td>
          </tr>
        </table></td>
        <?php
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);
    if (!isset($nested_RsProdutos)) {
      $nested_RsProdutos= 1;
    }
    if (isset($row_RsProdutos) && is_array($row_RsProdutos) && $nested_RsProdutos++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_RsProdutos); //end horizontal looper version 3
?>
    </tr>
  </table>
  <?php } // Show if recordset not empty ?>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table border="0" align="center">
      <tr>
        <td><?php if ($pageNum_RsProdutos > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_RsProdutos=%d%s", $currentPage, 0, $queryString_RsProdutos); ?>"><img src="First.gif" border="0" /></a>
              <?php } // Show if not first page ?>
        </td>
        <td><?php if ($pageNum_RsProdutos > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_RsProdutos=%d%s", $currentPage, max(0, $pageNum_RsProdutos - 1), $queryString_RsProdutos); ?>"><img src="Previous.gif" border="0" /></a>
              <?php } // Show if not first page ?>
        </td>
        <td><?php if ($pageNum_RsProdutos < $totalPages_RsProdutos) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_RsProdutos=%d%s", $currentPage, min($totalPages_RsProdutos, $pageNum_RsProdutos + 1), $queryString_RsProdutos); ?>"><img src="Next.gif" border="0" /></a>
              <?php } // Show if not last page ?>
        </td>
        <td><?php if ($pageNum_RsProdutos < $totalPages_RsProdutos) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_RsProdutos=%d%s", $currentPage, $totalPages_RsProdutos, $queryString_RsProdutos); ?>"><img src="Last.gif" border="0" /></a>
              <?php } // Show if not last page ?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>

                  <!-- InstanceEndEditable --></td>
                </tr>
                <tr> </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
                <p class="fundo_tabela2"></p></td>
              <td width="19%" rowspan="2" align="right" valign="top" bgcolor="#F0F0F0"><?php do { ?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="top"><a href="<?php echo $row_RsPublicidade['link']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_RsPublicidade['titulo']; ?>" width="150" border="0" class="borda_preta" /></a></td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                  </table>
                  <?php } while ($row_RsPublicidade = mysql_fetch_assoc($RsPublicidade)); ?></td>
              </tr>
            
            <tr>
              <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            
            
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="13" class="borda_escura_baixo">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="75" align="center" valign="middle" bgcolor="#FFFFFF">
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','820','height','70','title','Marcas','src','flash/marcas','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','flash/marcas' ); //end AC code
</script>
<noscript>	
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="820" height="70" title="Marcas">
	 <param name="wmode" value="transparent"/>
      <param name="movie" value="flash/marcas.swf" />
      <param name="quality" value="high" />
      <embed src="flash/marcas.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="820" height="70"></embed>
    </object>
	</noscript></td>
  </tr>
  <tr>
    <td height="51" align="center" valign="middle" bgcolor="#FFFFFF"><img src="img/cartoes.jpg" alt="Cart&otilde;es de Cr&eacute;dito" width="400" height="54" /></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle" class="fonte_12_brc"><img src="img/rodape.jpg" alt="Vila Beach Surfing" width="850" height="30" border="0" usemap="#Map" /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="666,12,817,27" href="http://www.saquabb.com.br/victor" alt="Desenvolvido por: Victor Caetano" />
</map>
</body>
<!-- InstanceEnd --></html>
<?php

mysql_free_result($RsMarcas);

mysql_free_result($RsTipos);

mysql_free_result($RsPublicidade);
mysql_free_result($RsProdutos);

mysql_free_result($RsMostraMarca);
?>
