<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_RsNovidades = "-1";
if (isset($_GET['id'])) {
  $colname_RsNovidades = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = sprintf("SELECT * FROM novidades WHERE id = %s", $colname_RsNovidades);
$RsNovidades = mysql_query($query_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);
$totalRows_RsNovidades = mysql_num_rows($RsNovidades);

$colname_RSfotos = "-1";
if (isset($_GET['id'])) {
  $colname_RSfotos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_RSfotos = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_RSfotos);
$RSfotos = mysql_query($query_RSfotos, $ConBD) or die(mysql_error());
$row_RSfotos = mysql_fetch_assoc($RSfotos);
$totalRows_RSfotos = mysql_num_rows($RSfotos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../Uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsNovidades.imagem}");
$objDynamicThumb1->setResize(132, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../Uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RSfotos.arquivo}");
$objDynamicThumb2->setResize(99, 74, false);
$objDynamicThumb2->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Itagua&iacute; Shopping Center ||</title>
<style type="text/css">
<!--
body {
	background-color: #5AC7EE;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css/estilo_isc.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	z-index:1;
}
#Layer2 {
	position:absolute;
	z-index:2;
}
#Layer3 {
	position:absolute;
	z-index:3;
}
#Layer4 {
	position:absolute;
	z-index:4;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- lightbox -->

<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->

</head>

<body>
<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="19" height="98">&nbsp;</td>
    <td colspan="2"><table width="734" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74" rowspan="2" align="left" valign="top"><a href="../index.php"><img src="../img/logo_01.jpg" width="56" height="93" border="0" /></a></td>
        <td width="660" height="23" align="right" valign="top" background="../img/listra_02.gif" class="txt_04"><table width="250" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','240','height','21','src','../flash/top_menuzinho','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/top_menuzinho','wmode','transparent' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="240" height="21">
              
			  <param name="movie" value="../flash/top_menuzinho.swf" />
			  <param name="wmode" value="transparent"/>
              <param name="quality" value="high" />
              <embed src="../flash/top_menuzinho.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="21"></embed>
            </object></noscript></td>
            <td width="10">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="75"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','660','height','75','src','../flash/top_menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/top_menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="660" height="75">
          <param name="movie" value="../flash/top_menu.swf" />
		  <param name="wmode" value="transparent"/>
          <param name="quality" value="high" />
          <embed src="../flash/top_menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="660" height="75"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
    <td width="7" rowspan="2" valign="top" background="../img/listra_03.gif"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"><img src="../img/listra_canto_01.gif" width="19" height="2" /></div></td>
    <td height="2" colspan="2" class="fundo_roxo_01"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"></div></td>
    <td height="2" colspan="2"><div align="left"></div></td>
    <td height="2"><div align="left"></div></td>
  </tr>
  <tr>
    <td rowspan="5" background="../img/listra_01.gif">&nbsp;</td>
    <td width="592" rowspan="2" valign="top" bgcolor="#f5f5f5"><table width="592" height="200" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr valign="top">
        <td width="468" height="60"><div align="left">
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','468','height','60','src','../flash/anuncie_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/anuncie_01' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="468" height="60">
              <param name="movie" value="../flash/anuncie_01.swf" />
			  <param name="wmode" value="transparent"/>
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="468" height="60"></embed>
            </object>
            </noscript>        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
        <td width="120" height="60"><div align="left">
             <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','120','height','60','src','../flash/anuncie_02','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/anuncie_02' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="120" height="60">
              <param name="movie" value="../flash/anuncie_02.swf" />
			  <param name="wmode" value="transparent"/>
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_02.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="60"></embed>
            </object>
            </noscript>        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
      </tr>
      <tr valign="top">
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
      </tr>
      <tr>
        <td height="128" colspan="3"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','590','height','138','src','../flash/banner_entretenimento','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/banner_entretenimento' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="138">
          <param name="movie" value="../flash/banner_entretenimento.swf" />
		   <param name="wmode" value="transparent"/>
          <param name="quality" value="high" />
          <embed src="../flash/banner_entretenimento.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="590" height="138"></embed>
        </object></noscript></td>
        <td width="2" rowspan="2" valign="top"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#f5f5f5"><table width="590" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25">&nbsp;</td>
            <td width="553" height="25">&nbsp;</td>
            <td width="10">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="middle"><img src="<?php echo tNG_showDynamicImage("../", "../Uploads/fotos/", "{RsNovidades.imagem_titulo}");?>" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="25">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="553" cellspacing="0" cellpadding="0">
              <tr>
                <td width="391" rowspan="2" valign="top" class="txt_02"><div align="justify">
                  <p><span class="txt_03"><?php echo $row_RsNovidades['titulo']; ?><br />
                        <br />
                      </span><br />
                    <?php echo $row_RsNovidades['materia']; ?></p>
                  <p class="txt_09">Data: <?php echo $row_RsNovidades['data']; ?></p>
                </div></td>
                <td width="20" height="132">&nbsp;</td>
                <td width="132" rowspan="2" valign="top"><table width="132" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="top" class="contorno_01"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                    </tr>
                    <tr>
                      <td height="20">&nbsp;</td>
                    </tr>
                </table>
                  </td>
                <td width="10">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="40"><?php if ($totalRows_RSfotos > 0) { // Show if recordset not empty ?>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" valign="middle"><span class="txt_03">Galeria de Fotos</span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><table width="281" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="273" align="left" class="txt_02"><img src="../img/logo_lupa_01.gif" width="19" height="12" />Clique nas imagens abaixo para ampli&aacute;-las</td>
                          <td width="10">&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><table border="0">
                            <tr>
                              <?php
  do { // horizontal looper version 3
?>
                                <td><a href="<?php echo tNG_showDynamicImage("../", "../Uploads/fotos/", "{RSfotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RSfotos ['descricao']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></td>
                                <?php
    $row_RSfotos = mysql_fetch_assoc($RSfotos);
    if (!isset($nested_RSfotos)) {
      $nested_RSfotos= 1;
    }
    if (isset($row_RSfotos) && is_array($row_RSfotos) && $nested_RSfotos++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_RSfotos); //end horizontal looper version 3
?>
                            </tr>
                                      </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  </table>
                <?php } // Show if recordset not empty ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="553" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td class="txt_03">&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt_03">Planta do Shopping</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>				  
				  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','543','height','263','src','../flash/planta3','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/planta3' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="543" height="263">
                  <param name="movie" value="../flash/planta3.swf" />
				  <param name="wmode" value="transparent"/>
                  <param name="quality" value="high" />
                  <embed src="../flash/planta3.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="543" height="263"></embed>
                </object></noscript>
				  
				  </td>
				  
                </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="40" valign="bottom"><table width="183" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13"><img src="../img/marcador_mais_01.jpg" width="13" height="13" /></td>
                <td width="5" valign="top"><div align="left"></div></td>
                <td width="165" align="left"><a href="index.php">Exibir todos os eventos </a></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="25">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="142" valign="top" bgcolor="#e6e6e6"><table width="142" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="142" height="200" cellpadding="0" cellspacing="0">
            <tr>
              <td height="153" bgcolor="#121212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','153','src','../flash/banner_vert_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/banner_vert_01' ); //end AC code
        </script>
                  <noscript>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="153">
                    <param name="movie" value="../flash/banner_vert_01.swf" />
                    <param name="wmode" value="transparent"/>
                    <param name="quality" value="high" />
                    <embed src="../flash/banner_vert_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="153"></embed>
                  </object>
                </noscript></td>
            </tr>
            <tr>
              <td height="47"><img src="../img/img_algumas_lojas_01.gif" width="142" height="47" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="200"><span class="fundo_roxo_01"><a href="http://www.itaguaishoppingcenter.com.br/eventos/ver.php?id=128"><img src="../img/barra_vertical_02.1.gif" width="142" height="200" border="0" /></a></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="142" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td width="10" height="4"><div align="left"></div></td>
              <td width="120" height="4"><div align="left"></div></td>
              <td width="10" height="4"><div align="left"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="30" align="left" class="txt_07">Como Chegar </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="80" align="left" valign="top" class="txt_08">Aqui voc&ecirc; encontra um guia f&aacute;cil para chegar ao Itagua&iacute; Shopping Center.</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><table width="116" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="13"><img src="../img/marcador_mais_02.jpg" width="13" height="13" /></td>
                    <td width="5" valign="top"><div align="left"></div></td>
                    <td width="91" align="left"><a href="../comochegar/index.html">Saiba mais</a> </td>
                  </tr>
              </table></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="22" class="linhaembaixo02">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td rowspan="12" align="left" valign="top" class="txt_07"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="13" align="left" class="txt_07">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30" align="left" class="txt_07">Nossos Hor&aacute;rios </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="txt_08">Fique por dentro dos nossos hor&aacute;rios de funcionamento.</td>
                  </tr>
                  <tr>
                    <td class="txt_03">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="txt_03">Lojas:</td>
                  </tr>
                  <tr>
                    <td class="txt_02">Segunda a S&aacute;bado: 09:00 &agrave;s 20:00 h </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="txt_03">Pra&ccedil;a de Alimenta&ccedil;&atilde;o:</td>
                  </tr>
                  <tr>
                    <td class="txt_02">Segunda a S&aacute;bado: 09:00 &agrave;s 20:00 h </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="txt_03">Administra&ccedil;&atilde;o e Atendimento ao Cliente: </td>
                  </tr>
                  <tr>
                    <td class="txt_02">Segunda a S&aacute;bado: 08:00 &agrave;s 20:00 h </td>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
              </table></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr valign="top">
              <td height="15"><div align="left"></div></td>
              <td height="15"><div align="left"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="7" rowspan="5" valign="top" background="../img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
  </tr>
  <tr>
    <td width="142" valign="top" bgcolor="#e6e6e6">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#f5f5f5"><table width="586" cellpadding="0" cellspacing="0">
      <tr valign="top" bgcolor="#f5f5f5">
        <td width="9" height="4"><div align="left"></div></td>
        <td width="108" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="64" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="208" height="4"><div align="left"></div></td>
        <td width="72" height="4"><div align="left"></div></td>
        <td width="79" height="4"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="8"><table width="586" cellpadding="0" cellspacing="0" class="contorno_01">
          <tr>
            <td width="9" height="30">&nbsp;</td>
            <td width="108"><img src="../img/titulo_desenvolvido_01.jpg" width="108" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="64"><img src="../img/titulo_seguranca_01.gif" width="64" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="208">&nbsp;</td>
            <td width="72">&nbsp;</td>
            <td width="79">&nbsp;</td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td><a href="http://www.lobsterdesigner.com.br" target="_blank"><img src="../img/logo_lobster_02.jpg" width="108" height="25" border="0" /></a></td>
            <td>&nbsp;</td>
            <td align="left"><a href="http://www.eliteserv.com.br/" target="_blank"><img src="../img/logo_elite_02.jpg" width="36" height="43" border="0" /></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      
      <tr valign="top" bgcolor="#f5f5f5">
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4" align="left"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
      </tr>
    </table></td>
    <td valign="middle" background="../img/listra_04.gif"><table width="142" height="90" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#e6e6e6"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','82','src','../flash/anuncie_03','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/anuncie_03' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="82">
            <param name="movie" value="../flash/anuncie_03.swf" />
			<param name="wmode" value="transparent"/>
            <param name="quality" value="high" />
            <embed src="../flash/anuncie_03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="82"></embed>
          </object>
          </noscript>         </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" class="fundo_roxo_01"> Copyright &copy; 2007 Itagua&iacute; Shopping - Inc. All rights reserved.</td>
    <td width="142" rowspan="2" valign="top" background="../img/listra_04.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="592" height="80" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" align="center" valign="bottom"><span class="txt_01"><a href="../horarios/index.html">Hor&aacute;rio de Funcionamento</a>&nbsp; |&nbsp; <a href="../comochegar/index.html">Como Chegar</a>&nbsp; |&nbsp; <a href="../siteadaptado/index.html">Site Adaptado</a></span></td>
      </tr>
      <tr>
        <td height="58" align="center" valign="top" class="primeiro"><span class="txt_02">(0xx21) 2688-4293        |</span> <span class="primeiro_a"><a href="mailto:contato@itaguaishoppingcenter.com.br">contato@itaguaishoppingcenter.com.br</a></span><br />
            <span class="txt_02">Rua Dr. Curvelo Cavalcante, 189 - Centro - Itagua&iacute; - RJ</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RSfotos);
?>
