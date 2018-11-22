<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_noticias = 4;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

mysql_select_db($database_saquabb, $saquabb);
$query_principal = "SELECT * FROM noticias WHERE coluna = 'saquabb' ORDER BY id DESC";
$principal = mysql_query($query_principal, $saquabb) or die(mysql_error());
$row_principal = mysql_fetch_assoc($principal);
$totalRows_principal = mysql_num_rows($principal);

$maxRows_atletas = 5;
$pageNum_atletas = 0;
if (isset($_GET['pageNum_atletas'])) {
  $pageNum_atletas = $_GET['pageNum_atletas'];
}
$startRow_atletas = $pageNum_atletas * $maxRows_atletas;

mysql_select_db($database_saquabb, $saquabb);
$query_atletas = "SELECT * FROM perfil WHERE aprovado = 'y' ORDER BY id DESC";
$query_limit_atletas = sprintf("%s LIMIT %d, %d", $query_atletas, $startRow_atletas, $maxRows_atletas);
$atletas = mysql_query($query_limit_atletas, $saquabb) or die(mysql_error());
$row_atletas = mysql_fetch_assoc($atletas);

if (isset($_GET['totalRows_atletas'])) {
  $totalRows_atletas = $_GET['totalRows_atletas'];
} else {
  $all_atletas = mysql_query($query_atletas);
  $totalRows_atletas = mysql_num_rows($all_atletas);
}
$totalPages_atletas = ceil($totalRows_atletas/$maxRows_atletas)-1;

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM galeria ORDER BY id DESC";
$galeria = mysql_query($query_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

$maxRows_recodset_foto = 4;
$pageNum_recodset_foto = 0;
if (isset($_GET['pageNum_recodset_foto'])) {
  $pageNum_recodset_foto = $_GET['pageNum_recodset_foto'];
}
$startRow_recodset_foto = $pageNum_recodset_foto * $maxRows_recodset_foto;

mysql_select_db($database_saquabb, $saquabb);
$query_recodset_foto = "SELECT * FROM fotos WHERE galeria = 'saquabb' ORDER BY id_foto DESC";
$query_limit_recodset_foto = sprintf("%s LIMIT %d, %d", $query_recodset_foto, $startRow_recodset_foto, $maxRows_recodset_foto);
$recodset_foto = mysql_query($query_limit_recodset_foto, $saquabb) or die(mysql_error());
$row_recodset_foto = mysql_fetch_assoc($recodset_foto);

if (isset($_GET['totalRows_recodset_foto'])) {
  $totalRows_recodset_foto = $_GET['totalRows_recodset_foto'];
} else {
  $all_recodset_foto = mysql_query($query_recodset_foto);
  $totalRows_recodset_foto = mysql_num_rows($all_recodset_foto);
}
$totalPages_recodset_foto = ceil($totalRows_recodset_foto/$maxRows_recodset_foto)-1;

$maxRows_galeria_gatinhas = 2;
$pageNum_galeria_gatinhas = 0;
if (isset($_GET['pageNum_galeria_gatinhas'])) {
  $pageNum_galeria_gatinhas = $_GET['pageNum_galeria_gatinhas'];
}
$startRow_galeria_gatinhas = $pageNum_galeria_gatinhas * $maxRows_galeria_gatinhas;

mysql_select_db($database_saquabb, $saquabb);
$query_galeria_gatinhas = "SELECT * FROM fotos WHERE galeria = 'gatas' ORDER BY id_foto DESC";
$query_limit_galeria_gatinhas = sprintf("%s LIMIT %d, %d", $query_galeria_gatinhas, $startRow_galeria_gatinhas, $maxRows_galeria_gatinhas);
$galeria_gatinhas = mysql_query($query_limit_galeria_gatinhas, $saquabb) or die(mysql_error());
$row_galeria_gatinhas = mysql_fetch_assoc($galeria_gatinhas);

if (isset($_GET['totalRows_galeria_gatinhas'])) {
  $totalRows_galeria_gatinhas = $_GET['totalRows_galeria_gatinhas'];
} else {
  $all_galeria_gatinhas = mysql_query($query_galeria_gatinhas);
  $totalRows_galeria_gatinhas = mysql_num_rows($all_galeria_gatinhas);
}
$totalPages_galeria_gatinhas = ceil($totalRows_galeria_gatinhas/$maxRows_galeria_gatinhas)-1;

$maxRows_vem_ai = 2;
$pageNum_vem_ai = 0;
if (isset($_GET['pageNum_vem_ai'])) {
  $pageNum_vem_ai = $_GET['pageNum_vem_ai'];
}
$startRow_vem_ai = $pageNum_vem_ai * $maxRows_vem_ai;

mysql_select_db($database_saquabb, $saquabb);
$query_vem_ai = "SELECT * FROM vem_ai ORDER BY id DESC";
$query_limit_vem_ai = sprintf("%s LIMIT %d, %d", $query_vem_ai, $startRow_vem_ai, $maxRows_vem_ai);
$vem_ai = mysql_query($query_limit_vem_ai, $saquabb) or die(mysql_error());
$row_vem_ai = mysql_fetch_assoc($vem_ai);

if (isset($_GET['totalRows_vem_ai'])) {
  $totalRows_vem_ai = $_GET['totalRows_vem_ai'];
} else {
  $all_vem_ai = mysql_query($query_vem_ai);
  $totalRows_vem_ai = mysql_num_rows($all_vem_ai);
}
$totalPages_vem_ai = ceil($totalRows_vem_ai/$maxRows_vem_ai)-1;

mysql_select_db($database_saquabb, $saquabb);
$query_festa = "SELECT * FROM festas ORDER BY id DESC";
$festa = mysql_query($query_festa, $saquabb) or die(mysql_error());
$row_festa = mysql_fetch_assoc($festa);
$totalRows_festa = mysql_num_rows($festa);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<SCRIPT language=JavaScript type=text/javascript>
<!--

<!--
function AbrirGaleria(id)
{
 window.open("festas/galerias/popup.php?id="+id,"","resizable=no,toolbar=no,status=0,menubar=no,scrollbars=no,width=700,height=480");
}
// -->
//-->
</SCRIPT>
<script language="JavaScript">
<!--

function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
	{
	   var arVersion = navigator.appVersion.split("MSIE")
	   var version = parseFloat(arVersion[1])
	   if ((version >= 5.5) && (document.body.filters)) 
	   {
		  for(var i=0; i<document.images.length; i++)
		  {
			 var img = document.images[i]
			 var imgName = img.src.toUpperCase()
			 if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
			 {
				var imgID = (img.id) ? "id='" + img.id + "' " : ""
				var imgClass = (img.className) ? "class='" + img.className + "' " : ""
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
				var imgStyle = "display:inline-block;" + img.style.cssText 
				if (img.align == "left") imgStyle = "float:left;" + imgStyle
				if (img.align == "right") imgStyle = "float:right;" + imgStyle
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
				var strNewHTML = "<span " + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
				img.outerHTML = strNewHTML
				i = i-1
			 }
		  }
	   }    
	}
	window.attachEvent("onload", correctPNG);
//-->
</script>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 232px;
	top: 137px;
}
.hand {
	cursor: hand;
}
#propaganda {
	position:absolute;
	z-index:1;
	left: 145px;
	top: 13px;
	width: 206px;
	height: 154px;
}
#Layer2 {
	position:absolute;
	width:325px;
	height:115px;
	z-index:2;
	left: 243px;
	top: 643px;
}
#Layer3 {
	position:absolute;
	width:200px;
	height:352px;
	z-index:1;
	left: 186px;
	top: 9px;
}
-->
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:260px;
	height:70px;
	z-index:1;
	left: 17px;
	top: 21px;
	background-color: #FFFF33;
	overflow: hidden;
}
-->
</style>
</head>
<script language="JavaScript" src="java.js"></script>
<body>
<table width="739" height="720" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="53" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a><img src="imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="198" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td align="center" valign="top"><table width="190" height="389" border="0" cellpadding="0" cellspacing="1">
              <tr>
                <td height="336" align="center" valign="top"><table  width="190" height="336" cellpadding="0" cellspacing="2" class="borda_fundo_noticas">
                    <tr>
                      <td height="330" align="center" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle">Principal</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="index.php">Home</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="arquivo.php">Arquivo de Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="galerias.php">Galerias de Fotos</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="perfil.php">Perfil dos Atletas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="contato.php">Fale Conosco </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_variedades" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">BBLagos</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="bblagos/index.php">Not&iacute;cias</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/circuito.php">O Circuito </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/etapas.php">Etapas 2006 </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/ranking.php">Ranking</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_girls" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">Saquabb Girls </td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="girls/index.php">Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_bblagos" width="100%" border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td align="left" valign="middle" class="tiutlo_not">Variedades</td>
                              </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festas/index.php">Fotos das Festas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="vemai.php">Vem a&iacute;... </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festa_anuncio.php">Anuncie sua Festa </a></td>
                          </tr>
                          
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="190" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                    <tr>
                      <td align="left" valign="middle" bgcolor="#333333"><img src="imagens/titulos/publicidade.jpg" width="118" height="20" /></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="imagens/publicidade/logorb.jpg" alt="RB Provider" width="170" height="54" border="0" /></a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><a href="http://ww.saquab.com.br"><img src="imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="170" height="64" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td height="58" align="center" valign="middle"><a href="http://www.redsdesign.com.br"><img src="imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="170" height="50" border="0" longdesc="http://www.redsdesign.com.br" /></a></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><br />
                        <a href="http://www.gnunes.net"><img src="imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="170" height="50" border="0" class="borda_tabela" /></a><br />
                      <br /></td>
                    </tr>
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
        <td width="539" height="193" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <td align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" class="borda_fundo_destaque">
                      <tr>
                        <td width="308" height="20" align="left" valign="middle" class="tiutlo_not"><img src="imagens/titulos/destaque.jpg" width="118" height="20" /></td>
                      </tr>
                      <tr>
                        <td height="87" align="center" valign="top" id="espaco_celulas"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{noticias.imagem}");?>" border="0" class="borda_foto_noticia" /></a><br />
                            <div id="Layer3">
                              <table width="333" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr>
                                  <th scope="col"><img src="flyer_saquabloco_site.jpg" alt="SaquaBloco" width="500" height="360" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="201,3,297,22" href="#" onclick="MM_showHideLayers('Layer3','','hide')" />
</map></th>
                                </tr>
                              </table>
                            </div>
                            <br />
                            <span class="tiutlo_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="tiutlo_not"><?php echo $row_noticias['titulo']; ?></a></span><span class="fonte_not"><br />
                        </span></td>
                      </tr>
                    </table>
                    <?php $row_noticias = mysql_fetch_assoc($noticias);?>
                    <table width="314" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center"><table width="312" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td align="center" valign="top"><a href="javascript:AbrirGaleria('bblagos');"></a><a href="javascript:AbrirGaleria('bblagos');">
                                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="312" height="80">
                                    <param name="movie" value="carnaporto/flash.swf" />
                                    <param name="quality" value="high" />
                                    <embed src="carnaporto/flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="312" height="80"></embed>
                                  </object>
                                </a></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table>
                      <table width="314" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center"><table width="312" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td align="center" valign="top"><a href="javascript:AbrirGaleria('ps');"><img src="galfotos2.jpg" alt="Galeria de fotos BBlagos!" width="312" height="80" border="0" /></a></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="borda_tabela">
                      <tr>
                        <td height="17" colspan="2" align="center" valign="middle"><div align="left"><span class="tiutlo_not"><img src="imagens/titulos/atl.jpg" width="118" height="20" /></span></div></td>
                      </tr>
                      <tr>
                        <td width="131" height="77" align="center" valign="top"><table width="144" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                                  <tr>
                                    <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" border="0" class="perfil_borda_foto" /></a></td>
                                  </tr>
                                </table></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle"><span class="tiutlo_not"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></span></td>
                            </tr>
                          </table>
                            <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
                        <td width="153" align="center" valign="top" class="tiutlo_not"><table width="125" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="125" align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                                <tr>
                                  <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" border="0" class="perfil_borda_foto" /></a></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></td>
                            </tr>
                          </table>
                            <br />
                            <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" valign="middle"><?php do { ?>
                            <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                              <tr>
                                <td width="7%" height="17" align="center" valign="middle"><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                                <td width="93%" align="left" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></td>
                              </tr>
                            </table>
                          <?php } while ($row_atletas = mysql_fetch_assoc($atletas)); ?></td>
                      </tr>
                      <tr>
                        <td height="22" colspan="2" align="right" valign="middle" bgcolor="#FF6666" class="tiutlo_not"><a href="perfil.php"><img src="imagens/titulos/mais_atletas.jpg" width="94" height="16" border="0" /></a></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
                <table width="314" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_fotos">
                  <tr>
                    <td height="23" align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="68" align="center" valign="middle"><table border="0">
                      <tr>
                        <?php
  do { // horizontal looper version 3
?>
                          <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                              <tr>
                                <td width="36"><a href="javascript:abrir_janela('album/index.php?galeria=saquabb','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{recodset_foto.arquivo}", 63, 48, false); ?>" border="0" /></a></td>
                              </tr>
                          </table></td>
                          <?php
    $row_recodset_foto = mysql_fetch_assoc($recodset_foto);
    if (!isset($nested_recodset_foto)) {
      $nested_recodset_foto= 1;
    }
    if (isset($row_recodset_foto) && is_array($row_recodset_foto) && $nested_recodset_foto++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_recodset_foto); //end horizontal looper version 3
?>
                      </tr>
</table></td>
                  </tr>
                </table>
              </td>
              <td align="center" valign="top"><table width="254" border="0" cellpadding="1" cellspacing="0">
                <tr>
                  <td align="center" valign="top"><table width="253" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td><table width="252" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                        <tr>
                          <td height="22"" colspan="2" align="left" valign="bottom" class="tiutlo_not" id=" height="20><img src="imagens/titulos/noticias.jpg" width="118" height="20" /></td>
                        </tr>
                        <tr>
                          <td height="66" colspan="2" align="left" valign="top"><table width="100%" border="0" cellpadding="2">
                              <tr>
                                <?php
  do { // horizontal looper version 3
?>
                                <td align="left" valign="top"><table width="100%" height="54" border="0" align="left" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                                    <tr>
                                      <td width="24%" rowspan="2" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticias.imagem}", 80, 60, false); ?>" hspace="5" border="0" align="center" class="borda_foto_noticia" /></a></td>
                                      <td width="76%" height="13" align="left" valign="top"><span class="tiutlo_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="tiutlo_not"><?php echo $row_noticias['coluna']; ?></a></span></td>
                                    </tr>
                                    <tr>
                                      <td height="38" align="left" valign="top" class="fonte_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><?php echo substr($row_noticias['titulo'] ,0,40)."..."; ?></a></td>
                                    </tr>
                                </table></td>
                                <?php
    $row_noticias = mysql_fetch_assoc($noticias);
    if (!isset($nested_noticias)) {
      $nested_noticias= 1;
    }
    if (isset($row_noticias) && is_array($row_noticias) && $nested_noticias++ % 1==0) {
      echo "</tr><tr>";
    }
  } while ($row_noticias); //end horizontal looper version 3
?>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="17" colspan="2" align="right" valign="top" bgcolor="#3399FD" class="tiutlo_not" ><p><a href="arquivo.php"><img src="imagens/titulos/mais_not.jpg" width="94" height="16" border="0" /></a></p></td>
                        </tr>
                      </table>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table width="100" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td><img src="imagens/ondas.jpg" alt="ondas" width="249" height="70" border="0" usemap="#MapMap" class="borda_tabela" />
                          <map name="MapMap" id="MapMap2">
                            <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                            <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                            <area shape="rect" coords="174,53,235,63" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_niteroi_itam" />
                        </map></td>
                    </tr>
                  </table>
                    <table width="100" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td><map name="MapMap" id="MapMap">
                              <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                              <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                              <area shape="rect" coords="174,53,235,63" href="#" />
                          </map>
                          <a href="http://www.orkut.com/Community.aspx?cmm=184137" target="_blank"><img src="imagens/orkut.jpg" alt="orkut" width="251" height="50" border="0" class="borda_tabela" /></a></td>
                      </tr>
                    </table>
                    <table width="253" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td><table width="253" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_gatinhas">
                          <tr>
                            <td width="240" height="23" align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="64" align="center" valign="middle"><table border="0">
                                <tr>
                                  <?php
  do { // horizontal looper version 3
?>
                                  <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                      <tr>
                                        <td width="36"><a href="javascript:abrir_janela('gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{galeria_gatinhas.arquivo}", 100, 75, false); ?>" border="0" /></a></td>
                                      </tr>
                                  </table></td>
                                  <?php
    $row_galeria_gatinhas = mysql_fetch_assoc($galeria_gatinhas);
    if (!isset($nested_galeria_gatinhas)) {
      $nested_galeria_gatinhas= 1;
    }
    if (isset($row_galeria_gatinhas) && is_array($row_galeria_gatinhas) && $nested_galeria_gatinhas++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_galeria_gatinhas); //end horizontal looper version 3
?>
                                </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table width="253" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td><table width="253" border="0" cellpadding="0" cellspacing="0" class="borda_fundo_noticas">
                          <tr>
                            <td height="20" align="left" valign="middle" bgcolor="#009966"><img src="imagens/titulos/festa.jpg" width="118" height="20" /></td>
                          </tr>
                          <tr>
                            <td height="60"><table width="100%" height="141" border="0" cellpadding="0" cellspacing="0" bgcolor="#D8F5CD">
                                <tr>
                                  <td height="119" align="center" valign="middle"><table width="236" border="1" cellpadding="0" cellspacing="2" bordercolor="#666666" bgcolor="#FFFFFF">
                                      <tr>
                                        <td><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{festa.imagem}");?>" border="0" /></a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="18" align="center" valign="top"><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><?php echo $row_festa['nome']; ?></a></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="14" align="left" valign="middle" bgcolor="#009966"><span class="tiutlo_not"><img src="imagens/titulos/vemai.jpg" width="118" height="20" /></span></td>
                          </tr>
                          <tr>
                            <td width="48%" height="60" align="center" valign="top" bgcolor="#D8F5CD"><table border="0">
                                <tr>
                                  <?php
  do { // horizontal looper version 3
?>
                                  <td width="108"><table width="22%" height="97" border="0" cellpadding="2" cellspacing="0">
                                      <tr>
                                        <td height="60" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="vem.php?id=<?php echo $row_vem_ai['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{vem_ai.flyer}", 100, 75, false); ?>" border="0" class="borda_tabela" /></a></td>
                                      </tr>
                                      <tr>
                                        <td height="37" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="javascript:abrir_janela('album/index.php?id=<?php echo $row_galeria['id']; ?>','Saquabb','','700','500','true')" class="tiutlo_not"><?php echo $row_vem_ai['nome']; ?></a></td>
                                      </tr>
                                  </table></td>
                                  <?php
    $row_vem_ai = mysql_fetch_assoc($vem_ai);
    if (!isset($nested_vem_ai)) {
      $nested_vem_ai= 1;
    }
    if (isset($row_vem_ai) && is_array($row_vem_ai) && $nested_vem_ai++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_vem_ai); //end horizontal looper version 3
?>
                                </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              </td>
            </tr>
        </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($noticias);

mysql_free_result($principal);

mysql_free_result($atletas);

mysql_free_result($galeria);

mysql_free_result($recodset_foto);

mysql_free_result($galeria_gatinhas);

mysql_free_result($vem_ai);

mysql_free_result($festa);

?>
