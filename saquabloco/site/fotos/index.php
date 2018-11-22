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

mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = "SELECT * FROM galerias ORDER BY id DESC";
$RsGalerias = mysql_query($query_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);
$totalRows_RsGalerias = mysql_num_rows($RsGalerias);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsGalerias.imagem}");
$objDynamicThumb1->setResize(60, 40, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Victor Caetano Preuss Sthel Wardi - victor@saquabb.com.br - http://www.saquabb.com.br" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SaquaBloco, o Melhor Bloco de Saquarema</title>
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
      <p class="novidade_texto">Confira as melhores fotos tiradas durante os ensaios e os carnavais!</p>
        <?php do { ?>
        <div class="novidades_titulo">
          <table width="95%" border="0" cellpadding="0" cellspacing="6" class="linha_trecajada">
            <tr>
              <td width="15%" align="left" valign="middle"><a href="album.php?id=<?php echo $row_RsGalerias['id'];?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="60" height="40" border="0" class="borda_foto" /></a></td>
              <td width="85%" align="left" valign="middle" class="novidades_titulo"><a href="album.php?id=<?php echo $row_RsGalerias['id'];?>"><?php echo $row_RsGalerias['titulo']; ?> - <?php echo $row_RsGalerias['data']; ?></a></td>
            </tr>
          </table>
          </div>
        <?php } while ($row_RsGalerias = mysql_fetch_assoc($RsGalerias)); ?>
      </div>
      <br />

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
mysql_free_result($RsGalerias);
?>
