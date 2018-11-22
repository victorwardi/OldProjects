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

$colname_RsMostraMarca = "-1";
if (isset($_GET['id_marca'])) {
  $colname_RsMostraMarca = $_GET['id_marca'];
}
mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMostraMarca = sprintf("SELECT * FROM marcas WHERE id_marca = %s", GetSQLValueString($colname_RsMostraMarca, "int"));
$RsMostraMarca = mysql_query($query_RsMostraMarca, $ConVBS) or die(mysql_error());
$row_RsMostraMarca = mysql_fetch_assoc($RsMostraMarca);
$totalRows_RsMostraMarca = mysql_num_rows($RsMostraMarca);

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
<link href="contato.css" rel="stylesheet" type="text/css" />
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
                  <td align="left" valign="top"><!-- InstanceBeginEditable name="banner" --><img src="img/comochegar.jpg" alt="Como Chegar" width="468" height="44" class="borda_preta" /><!-- InstanceEndEditable --></td>
                </tr>
                <tr>
                  <td rowspan="2" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
                    <div>
                      <table width="94%" border="0" align="center" cellpadding="2" cellspacing="0">
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="55%" align="left" valign="top"><p>Venha para Saquarema e conhe&ccedil;a a loja mais Surf da Regi&atilde;o!
                            Voc&ecirc; ter&aacute; um atendimento super especial e encontrar&aacute; os melhores pre&ccedil;os e produtos.</p>
                              <p><strong>A Vila Beach Surfing se encontra no seguinte endere&ccedil;o:</strong></p>
                            <p>Rua: Tenente Gen&eacute;sio n&ordm;5 loja c - Centro - Saquarema - RJ <br />
                              CEP: 28990-000</p>
                            <p>Tel: (22) 2651-0463</p>
                            <p><a href="img/mapa.jpg" rel="lightbox"><img src="img/mapa_mini.jpg" alt="Mapa" width="400" height="330" border="0" class="borda_preta" /></a><a href="img/mapa.jpg" rel="lightbox"><br />
                              </a> Clique no mapa para ampliar </p>
                            <p><strong>Informa&ccedil;&otilde;es de Como Chegar na Loja: </strong></p>
                            <p><span class="ProdutoPreco"><strong>Dist&acirc;ncias:</strong></span><strong><br />
                                    <br />
                              Rio de Janeiro - 116 km<br />
                              S&atilde;o Paulo - 538 km<br />
                              Vit&oacute;ria (ES) - 502 km<br />
                              Belo Horizonte   (MG) - 547 km</strong></p>
                            <p><span class="ProdutoPreco"><strong>De &Ocirc;nibus:</strong></span><br />
                                  <br />
                                  <strong>Saindo de S&atilde;o Paulo:</strong> pegar o   &ocirc;nibus S&atilde;o Paulo - Cabo Frio (Auto Via&ccedil;&atilde;o 1001) no Terminal Rodovi&aacute;rio do   Tiet&ecirc;.<br />
                                  <br />
                                  <strong>Saindo do Rio de Janeiro: </strong>pegar o &ocirc;nibus - Rio -   Saquarema (Auto Via&ccedil;&atilde;o 1001) na Rodovi&aacute;ria Novo Rio.<br />
                                  <br />
                                  <strong>Saindo de   Niter&oacute;i: </strong>pegar o &ocirc;nibus - Niter&oacute;i - Saquarema (Auto Via&ccedil;&atilde;o 1001) no   Terminal Rodovi&aacute;rio.</p>
                            <p><span class="ProdutoPreco"><strong>De Carro:</strong></span><br />
                                  <strong><br />
                                    Principais rodovias de acesso:</strong> RJ  102, RJ 106, RJ 118, RJ 128 e RJ 132, todas sob jurisdi&ccedil;&atilde;o estadual,  cujos eixos principais s&atilde;o constitu&iacute;dos pelas rodovias 106 e 128.</p>
                            <p> <span class="fonte_marca">Saindo do Rio de   janeiro: </span><br />
                                  <br />
                                  <strong>Atravesse a ponte Rio-Niter&oacute;i</strong><br />
                                  <br />
                                  <strong>Op&ccedil;&atilde;o 1 - BR-116 sem   ped&aacute;gio</strong><br />
                                  <br />
                              Ao passar pelo ped&aacute;gio da ponte mantenha-se na pista central para   acessar a Alameda S&atilde;o Boaventura.<br />
                              Siga sempre em frente at&eacute; Tribob&oacute;. <br />
                              Ao   atingir Tribob&oacute; siga &agrave; direita para Cabo Frio pela Rodovia Amaral Peixoto   (RJ-106).<br />
                              Voc&ecirc; vai passar por Ino&atilde;, Maric&aacute;, pela Serra do Mato Grosso, Sampaio  Corr&ecirc;a at&eacute; atingir Bacax&aacute;, distrito de Saquarema. Entre em Bacax&aacute;, siga  em frente at&eacute; o Mirante do Morro da Cruz. Des&ccedil;a o morro e bem &agrave; frente  voc&ecirc; ir&aacute; subir a ponte, entre na 3&ordf; rua a esquerda e logo ap&oacute;s vire a esquerda novamente, siga reto e entre na 4&ordf; rua a direita, como se fossse subir para a praia, pronto: A <strong>Vila Beach Surfing </strong>estar&aacute; do seu lado esquerdo a 2&ordf; Loja. <br />
                              <strong><br />
                                Op&ccedil;&atilde;o 2 -   Rodovia Rio-Lagos (com ped&aacute;gio)</strong><br />
                              <br />
                              Mantenha-se &agrave; esquerda para pegar a   estrada Niter&oacute;i-Manilha.<br />
                              Siga at&eacute; Rio-Bonito e mantenha-se atento &agrave; placa que   indica Cabo Frio pela Via Lagos (RJ-124).<br />
                              Ao avistar o ped&aacute;gio - bairro de   Latino Melo - mantenha-se &agrave; direita.<br />
                              Ao passar pegue o trevo &agrave; direita e siga   em frente at&eacute; atingir o trevo em frente ao posto Texaco.<br />
                              Fa&ccedil;a a r&oacute;tula &agrave; esquerda e entre em Bacax&aacute;, distrito de Saquarema.  Entre em Bacax&aacute;, siga em frente at&eacute; o Mirante do Morro da Cruz. Des&ccedil;a o morro e bem &agrave; frente  voc&ecirc; ir&aacute; subir a ponte, entre na 3&ordf; rua a esquerda e logo ap&oacute;s vire a esquerda novamente, siga reto e entre na 4&ordf; rua a direita, como se fossse subir para a praia, pronto: A <strong>Vila Beach Surfing </strong>estar&aacute; do seu lado esquerdo a 2&ordf; Loja. <br />
                              <br />
                              <span class="fonte_marca">Para quem vem de S&atilde;o Paulo:</span> BR-116 e RJ-106 ou RJ-124<br />
                              <br />
                              <span class="fonte_marca">Para quem vem de Belo Horizonte:</span> BR-040 e RJ-106 ou   RJ-124</p></td>
                        </tr>
                        <tr>
                          <td align="left"><p>&nbsp;</p>
                              <p><strong>Fonte:</strong> <a href="http://www.saquarema.rj.gov.br">Site da Prefeitura de Saquarema </a></p></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      <br />
</div>
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

mysql_free_result($RsMostraMarca);
?>
