<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = "SELECT * FROM novidades WHERE categoria = 'Itaguaí Shopping Center' ORDER BY id DESC";
$RsNovidades = mysql_query($query_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);
$totalRows_RsNovidades = mysql_num_rows($RsNovidades);

mysql_select_db($database_ConBD, $ConBD);
$query_RsNaWeb = "SELECT * FROM novidades WHERE categoria = 'Na Web' ORDER BY id DESC";
$RsNaWeb = mysql_query($query_RsNaWeb, $ConBD) or die(mysql_error());
$row_RsNaWeb = mysql_fetch_assoc($RsNaWeb);
$totalRows_RsNaWeb = mysql_num_rows($RsNaWeb);

mysql_select_db($database_ConBD, $ConBD);
$query_RsServicos = "SELECT * FROM novidades WHERE categoria = 'Serviços' ORDER BY id DESC";
$RsServicos = mysql_query($query_RsServicos, $ConBD) or die(mysql_error());
$row_RsServicos = mysql_fetch_assoc($RsServicos);
$totalRows_RsServicos = mysql_num_rows($RsServicos);

mysql_select_db($database_ConBD, $ConBD);
$query_RsFDS = "SELECT * FROM novidades WHERE categoria = 'Fim de Semana' ORDER BY id DESC";
$RsFDS = mysql_query($query_RsFDS, $ConBD) or die(mysql_error());
$row_RsFDS = mysql_fetch_assoc($RsFDS);
$totalRows_RsFDS = mysql_num_rows($RsFDS);

mysql_select_db($database_ConBD, $ConBD);
$query_RsEventosLazer = "SELECT * FROM novidades WHERE categoria = 'Eventos' ORDER BY id DESC";
$RsEventosLazer = mysql_query($query_RsEventosLazer, $ConBD) or die(mysql_error());
$row_RsEventosLazer = mysql_fetch_assoc($RsEventosLazer);
$totalRows_RsEventosLazer = mysql_num_rows($RsEventosLazer);

mysql_select_db($database_ConBD, $ConBD);
$query_Rsboa = "SELECT * FROM novidades WHERE categoria = 'Qual é a Boa?' ORDER BY id DESC";
$Rsboa = mysql_query($query_Rsboa, $ConBD) or die(mysql_error());
$row_Rsboa = mysql_fetch_assoc($Rsboa);
$totalRows_Rsboa = mysql_num_rows($Rsboa);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("Uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsEventosLazer.imagem}");
$objDynamicThumb1->setResize(131, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("Uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsNovidades.imagem}");
$objDynamicThumb2->setResize(131, 0, true);
$objDynamicThumb2->setWatermark(false);
?>

<?php

require_once("enquete/dbConnect.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Itagua&iacute; Shopping Center ||</title>
<link rel="stylesheet" href="enquete/css/ajax-poller.css" type="text/css">
	<script type="text/javascript" src="enquete/js/ajax.js"></script>
	<script type="text/javascript" src="enquete/js/ajax-poller.js">	</script>
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
<link href="css/estilo_isc.css" rel="stylesheet" type="text/css" />
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
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="19" height="98">&nbsp;</td>
    <td colspan="2"><table width="734" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74" rowspan="2" align="left" valign="top"><img src="img/logo_01.jpg" width="56" height="93" border="0" /></td>
        <td width="660" height="23" align="right" valign="top" background="img/listra_02.gif" class="txt_04"><table width="250" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','240','height','21','src','flash/top_menuzinho','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/top_menuzinho','wmode','transparent' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="240" height="21">
              <param name="movie" value="flash/top_menuzinho.swf" />
			  <param name="wmode" value="transparent">
              <param name="quality" value="high" />
              <embed src="flash/top_menuzinho.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="21"></embed>
            </object></noscript></td>
            <td width="10">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="75"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','660','height','75','src','flash/top_menu_home','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/top_menu_home' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="660" height="75">
          <param name="movie" value="flash/top_menu_home.swf" />
          <param name="quality" value="high" />
          <embed src="flash/top_menu_home.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="660" height="75"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
    <td width="7" rowspan="2" valign="top" background="img/listra_03.gif"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"><img src="img/listra_canto_01.gif" width="19" height="2" /></div></td>
    <td height="2" colspan="2" class="fundo_roxo_01"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"></div></td>
    <td height="2" colspan="2"><div align="left"></div></td>
    <td height="2"><div align="left"></div></td>
  </tr>
  <tr>
    <td rowspan="5" background="img/listra_01.gif">&nbsp;</td>
    <td width="592" valign="top"><table width="592" height="200" cellpadding="0" cellspacing="0">
      <tr valign="top">
        <td width="468" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','468','height','60','src','flash/anuncie_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/anuncie_01' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="468" height="60">
              <param name="movie" value="flash/anuncie_01.swf" />
              <param name="quality" value="high" />
              <embed src="flash/anuncie_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="468" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
        <td width="120" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','120','height','60','src','flash/anuncie_02','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/anuncie_02' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="120" height="60">
              <param name="movie" value="flash/anuncie_02.swf" />
              <param name="quality" value="high" />
              <embed src="flash/anuncie_02.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
      </tr>
      <tr valign="top">
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
      </tr>
      <tr>
        <td height="338" colspan="3"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','590','height','338','src','flash/banner_principal_09','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/banner_principal_09' ); //end AC code
    </script>
            <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="338">
              <param name="movie" value="flash/banner_principal_09.swf" />
              <param name="quality" value="high" />
              <embed src="flash/banner_principal_09.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="590" height="338"></embed>
            </object>
            </noscript></td>
        <td width="2" valign="top"><div align="left"></div></td>
      </tr>
    </table></td>
    <td width="142" valign="top" background="img/listra_04.gif"><table width="142" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="142" height="200" cellpadding="0" cellspacing="0">
          <tr>
            <td height="153" bgcolor="#121212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','153','src','flash/banner_vert_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/banner_vert_01' ); //end AC code
        </script>
                <noscript>
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="153">
                  <param name="movie" value="flash/banner_vert_01.swf" />
                  <param name="quality" value="high" />
                  <embed src="flash/banner_vert_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="153"></embed>
                </object>
              </noscript></td>
          </tr>
          <tr>
            <td height="47"><img src="img/img_algumas_lojas_01.gif" width="142" height="47" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><span class="fundo_roxo_01"><a href="musicaaovivo/index.html"><img src="img/barra_vertical_02.1.gif" width="142" height="200" border="0" /></a></span></td>
      </tr>
    </table></td>
    <td width="7" rowspan="5" valign="top" background="img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#f5f5f5"><table width="590" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" bgcolor="#f5f5f5"><table width="586" cellspacing="0" cellpadding="0">
            <tr valign="top">
              <td height="4"><div align="left"></div></td>
              <td height="4"><div align="left"></div></td>
              <td height="4"><div align="left"></div></td>
            </tr>
            <tr>
              <td width="291"><table width="290" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="131" align="left" valign="top"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></td>
                    <td width="10">&nbsp;</td>
                    <td width="139"><table width="139" height="131" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="30" align="left" class="txt_07"><?php echo $row_RsNovidades['titulo']; ?></td>
                        </tr>
                        <tr>
                          <td height="81" align="left" valign="top" class="txt_08"><?php echo $row_RsNovidades['resumo']; ?></td>
                        </tr>
                        <tr>
                          <td height="20"><table width="139" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="13"><img src="img/marcador_mais_01.jpg" width="13" height="13" /></td>
                                <td width="5" valign="top"><div align="left"></div></td>
                                <td width="114" align="left"><a href="novidades/ver.php?id=<?php echo $row_RsNovidades['id']; ?>">Saiba mais </a></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="10">&nbsp;</td>
                  </tr>
              </table></td>
              <td width="5" valign="top" background="img/linha_separadora_01.gif"><div align="left"></div></td>
              <td width="290"><table width="290" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="131" align="left" valign="top"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                    <td width="10">&nbsp;</td>
                    <td width="139"><table width="139" height="131" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="30" align="left" class="txt_07"><?php echo $row_RsEventosLazer['titulo']; ?></td>
                        </tr>
                        <tr>
                          <td height="81" align="left" valign="top" class="txt_08"><?php echo $row_RsEventosLazer['resumo']; ?></td>
                        </tr>
                        <tr>
                          <td height="20"><table width="139" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="13"><img src="img/marcador_mais_01.jpg" width="13" height="13" /></td>
                                <td width="5" valign="top"><div align="left"></div></td>
                                <td width="114" align="left"><a href="eventos/ver.php?id=<?php echo $row_RsEventosLazer['id']; ?>">Saiba mais </a></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="10">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#f5f5f5">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F5F5F5"><table width="585" height="232" cellpadding="0" cellspacing="0" bgcolor="#e6e6e6">
            <tr>
              <td width="138"><table width="138" height="232" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10" height="50">&nbsp;</td>
                    <td width="116" align="left"><img src="img/titulo_naweb_01.gif" width="52" height="14" /></td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="101">&nbsp;</td>
                    <td align="left" valign="top" class="txt_08"><p><span class="txt_06"><?php echo $row_RsNaWeb['titulo']; ?><br />
                    </span><?php echo $row_RsNaWeb['resumo']; ?></p>
                      </td>
                    <td valign="top" class="txt_08">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="40">&nbsp;</td>
                    <td valign="middle"><table width="116" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="13"><img src="img/marcador_mais_02.jpg" width="13" height="13" /></td>
                          <td width="5" valign="top"><div align="left"></div></td>
                          <td width="91" align="left"><a href="novidades/ver.php?id=<?php echo $row_RsNaWeb['id']; ?>">Saiba mais</a> </td>
                        </tr>
                    </table></td>
                    <td valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="41">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
              <td width="11" background="img/linha_separadora_02.gif">&nbsp;</td>
              <td width="138"><table width="138" height="232" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10" height="50">&nbsp;</td>
                    <td width="116" align="left"><img src="img/titulo_servicos_01.gif" width="56" height="18" /></td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="101">&nbsp;</td>
                    <td align="left" valign="top" class="txt_08"><p><span class="txt_06"><?php echo $row_RsServicos['titulo']; ?></span><br />
                      <?php echo $row_RsServicos['resumo']; ?></p>
                      </td>
                    <td valign="top" class="txt_08">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="40">&nbsp;</td>
                    <td valign="middle"><table width="116" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="13"><img src="img/marcador_mais_02.jpg" width="13" height="13" /></td>
                          <td width="5" valign="top"><div align="left"></div></td>
                          <td width="91" align="left"><a href="novidades/ver.php?id=<?php echo $row_RsServicos['id']; ?>">Saiba mais</a></td>
                        </tr>
                    </table></td>
                    <td valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="41">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
              <td width="11" background="img/linha_separadora_02.gif">&nbsp;</td>
              <td width="138"><table width="138" height="232" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10" height="50">&nbsp;</td>
                    <td width="116" align="left"><img src="img/titulo_fimdesemana_01.gif" width="103" height="15" /></td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="101">&nbsp;</td>
                    <td align="left" valign="top" class="txt_08"><p><span class="txt_06"><?php echo $row_RsFDS['titulo']; ?></span><br />
                      <?php echo $row_RsFDS['resumo']; ?></p>
                      </td>
                    <td valign="top" class="txt_08">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="40">&nbsp;</td>
                    <td valign="middle"><table width="116" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="13"><img src="img/marcador_mais_02.jpg" width="13" height="13" /></td>
                          <td width="5" valign="top"><div align="left"></div></td>
                          <td width="91" align="left"><a href="eventos/ver.php?id=<?php echo $row_RsFDS['id']; ?>">Saiba mais</a> </td>
                        </tr>
                    </table></td>
                    <td valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="41">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
              <td width="11" background="img/linha_separadora_02.gif">&nbsp;</td>
              <td width="138"><table width="138" height="232" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10" height="50">&nbsp;</td>
                    <td width="116" align="left"><img src="img/titulo_qualaboa_01.gif" width="92" height="16" /></td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="101">&nbsp;</td>
                    <td align="left" valign="top" class="txt_08"><p><span class="txt_06"><?php echo $row_Rsboa['titulo']; ?></span><br />
                      <?php echo $row_Rsboa['resumo']; ?></p>
                      </td>
                    <td valign="top" class="txt_08">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="40">&nbsp;</td>
                    <td valign="middle"><table width="116" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="13"><img src="img/marcador_mais_02.jpg" width="13" height="13" /></td>
                          <td width="5" valign="top"><div align="left"></div></td>
                          <td width="91" align="left"><a href="eventos/ver.php?id=<?php echo $row_Rsboa['id']; ?>">Saiba mais</a> </td>
                        </tr>
                    </table></td>
                    <td valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="41">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="142" valign="top" bgcolor="#e6e6e6"><table width="142" cellpadding="0" cellspacing="0" bgcolor="#e6e6e6">
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
              <td width="13"><img src="img/marcador_mais_02.jpg" width="13" height="13" /></td>
              <td width="5" valign="top"><div align="left"></div></td>
              <td width="91" align="left"><a href="comochegar/index.html">Saiba mais</a> </td>
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
        <td>&nbsp;</td>
        <td height="48" align="left" class="txt_07"><img src="img/titulo_enquete_01.gif" width="54" height="17" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" valign="top" class="txt_08">
		<!-- inicio da Enquete -->
		
		<form action="<?php echo $_SERVER['enquete/PHP_SELF']; ?>" onsubmit="return false" method="post">
<div id="mainContainer">
	<div id="header"></div>
	<div id="mainContent">
	
		<?
		$pollerId = 1;	// Id of poller
		?>
		<!-- START OF POLLER -->
		<div class="poller">
		
			<div class="poller_question" id="poller_question<?php echo $pollerId; ?>">
			<?php		
			
			
			// Retreving poll from database
			$res = mysql_query("select * from poller where ID='$pollerId'");	
			if($inf = mysql_fetch_array($res)){
				echo "<p class=\"pollerTitle\">".$inf["pollerTitle"]."</p>";	// Output poller title
				
				$resOptions = mysql_query("select * from poller_option where pollerID='$pollerId' order by pollerOrder") or die(mysql_error());	// Find poll options, i.e. radio buttons
				while($infOptions = mysql_fetch_array($resOptions)){
					if($infOptions["defaultChecked"])$checked=" checked"; else $checked = "";
					echo "<p class=\"pollerOption\"><input$checked type=\"radio\" value=\"".$infOptions["ID"]."\" name=\"vote[".$inf["ID"]."]\" id=\"pollerOption".$infOptions["ID"]."\"><label for=\"pollerOption".$infOptions["ID"]."\" id=\"optionLabel".$infOptions["ID"]."\">".$infOptions["optionText"]."</label></p>";	
			
				}
			}			
			?>
			<br />			
			<a href="#" onclick="castMyVote(<?php echo $pollerId; ?>,document.forms[0])"><img src="enquete/images/vote_button.gif" border="0"></a>			</div>
			<div class="poller_waitMessage" id="poller_waitMessage<? echo $pollerId; ?>">
				Gerando os resultados...
			</div>


			<div class="poller_results" id="poller_results<? echo $pollerId; ?>">
			<!-- This div will be filled from Ajax, so leave it empty --></div>
		</div>
		<!-- END OF POLLER -->
		<script type="text/javascript">
		if(useCookiesToRememberCastedVotes){
			var cookieValue = Poller_Get_Cookie('dhtmlgoodies_poller_<? echo $pollerId; ?>');
			if(cookieValue && cookieValue.length>0)displayResultsWithoutVoting(<? echo $pollerId; ?>); // This is the code you can use to prevent someone from casting a vote. You should check on cookie or ip address
		
		}
		</script>
		
			</div>
	<div class="clear"></div>
</div>
</form>


<!-- Fimd a Enquete -->
		</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="top">
        <td height="15"><div align="left"></div></td>
        <td height="15"><div align="left"></div></td>
        <td height="15"><div align="left"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><form id="form1" name="form1" method="post" action="">
        </form></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
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
            <td width="108"><img src="img/titulo_desenvolvido_01.jpg" width="108" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="64"><img src="img/titulo_seguranca_01.gif" width="64" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="208">&nbsp;</td>
            <td width="72">&nbsp;</td>
            <td width="79">&nbsp;</td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td><a href="http://www.lobsterdesigner.com.br" target="_blank"><img src="img/logo_lobster_02.jpg" width="108" height="25" border="0" /></a></td>
            <td>&nbsp;</td>
            <td align="left"><a href="http://www.eliteserv.com.br/" target="_blank"><img src="img/logo_elite_02.jpg" width="36" height="43" border="0" /></a></td>
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
    <td valign="middle" background="img/listra_04.gif"><table width="142" height="90" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#e6e6e6"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','82','src','flash/anuncie_03','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/anuncie_03' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="82">
            <param name="movie" value="flash/anuncie_03.swf" />
            <param name="quality" value="high" />
            <embed src="flash/anuncie_03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="82"></embed>
          </object>
          </noscript>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" class="fundo_roxo_01"> Copyright &copy; 2007 Itagua&iacute; Shopping - Inc. All rights reserved.</td>
    <td width="142" rowspan="2" valign="top" background="img/listra_04.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="592" height="80" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" align="center" valign="bottom"><span class="txt_01"><a href="horarios/index.html">Hor&aacute;rio de Funcionamento</a>&nbsp; |&nbsp; <a href="comochegar/index.html">Como Chegar</a>&nbsp; |&nbsp; <a href="siteadaptado/index.html">Site Adaptado</a></span></td>
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

mysql_free_result($RsNaWeb);

mysql_free_result($RsServicos);

mysql_free_result($RsFDS);

mysql_free_result($RsEventosLazer);

mysql_free_result($Rsboa);
?>
