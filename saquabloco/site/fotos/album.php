<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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

$colname_RsFotos = "-1";
if (isset($_GET['id'])) {
  $colname_RsFotos = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsFotos = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", GetSQLValueString($colname_RsFotos, "int"));
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);

$colname_RsAlbum = "-1";
if (isset($_GET['id'])) {
  $colname_RsAlbum = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsAlbum = sprintf("SELECT * FROM galerias WHERE id = %s", GetSQLValueString($colname_RsAlbum, "int"));
$RsAlbum = mysql_query($query_RsAlbum, $ConBD) or die(mysql_error());
$row_RsAlbum = mysql_fetch_assoc($RsAlbum);
$totalRows_RsAlbum = mysql_num_rows($RsAlbum);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.arquivo}");
$objDynamicThumb1->setResize(80, 60, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Victor Caetano Preuss Sthel Wardi - victor@saquabb.com.br - http://www.saquabb.com.br" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SaquaBloco, o Melhor Bloco de Saquarema</title>
<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<table width="617" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="523" align="center" valign="middle" scope="col"><img src="../img/jpg/bandeira.jpg" width="523" height="346" /></th>
    <th width="94" align="center" valign="middle" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','277','height','346','src','../flash/menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="277" height="346">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="../flash/menu.swf" />
      <param name="quality" value="high" />
      <embed src="../flash/menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="277" height="346"></embed>
    </object></noscript></th>
  </tr>
  <tr>
    <td height="48" colspan="2" align="center" valign="middle"><!-- InstanceBeginEditable name="Titulo" --><img src="../img/titulos/albumdefotos.jpg" width="800" height="57" /><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="163" colspan="2" align="center" valign="top" background="../img/png/fundo_tabela.png"><!-- InstanceBeginEditable name="conteudo" -->
      <div id="texto">
      <p class="titulos_novidades"><?php echo $row_RsAlbum['titulo']; ?> - <?php echo $row_RsAlbum['data']; ?></p>
      <p class="novidade_texto_espaco"><?php echo $row_RsAlbum['descricao']; ?></p>
      </div>
      <div>
      <div id=fotos>
        <table border="0" cellpadding="4" cellspacing="0">
          <tr>
            <?php
do { // horizontal looper version 3
?>
              <td><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="80" height="60" border="0" class="borda_foto" /></a></td>
              <?php
$row_RsFotos = mysql_fetch_assoc($RsFotos);
    if (!isset($nested_RsFotos)) {
      $nested_RsFotos= 1;
    }
    if (isset($row_RsFotos) && is_array($row_RsFotos) && $nested_RsFotos++ % 7==0) {
      echo "</tr><tr>";
    }
  } while ($row_RsFotos); //end horizontal looper version 3
?>
          </tr>
        </table>
        </div>
      </div>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle"><img src="../img/png/menu_baixo.png" width="800" height="42" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="../img/png/rodape.png" width="800" height="74" border="0" usemap="#Map2" /></td>
  </tr>
</table>
&nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp; 
<map name="Map" id="Map">
  <area shape="rect" coords="93,8,184,30" href="../index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="201,8,279,25" href="../novidades" alt="Novidades" />
<area shape="rect" coords="293,8,405,28" href="../fotos" alt="&Aacute;lbum de Fotos" />
<area shape="rect" coords="419,7,483,30" href="../bloco" alt="O Bloco" />
<area shape="rect" coords="500,8,576,31" href="../integrantes" alt="Integrantes" />
<area shape="rect" coords="595,9,692,31" href="../faleconosco" alt="Fale Conosco" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="650,53,754,70" href="http://www.saquabb.com.br/victor" target="_blank" alt="Acesse meu Portif&oacute;lio - Victor Caetano" />
<area shape="rect" coords="140,54,241,72" href="#" alt="Andr&eacute; Pesco&ccedil;o - Montagem Manuten&ccedil;ao" onclick="MM_openBrWindow('../andre.php','','width=400,height=500')" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsFotos);

mysql_free_result($RsAlbum);
?>
