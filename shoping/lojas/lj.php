<?php require_once('../Connections/ConBD.php'); ?><?php session_start();?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_home = "-1";
if (isset($_GET['id'])) {
  $colname_home = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_home = sprintf("SELECT * FROM lojas WHERE id = %s", $colname_home);
$home = mysql_query($query_home, $ConBD) or die(mysql_error());
$row_home = mysql_fetch_assoc($home);
$totalRows_home = mysql_num_rows($home);

$objDynamicMedia1 = new tNG_DynamicMedia("../");
$objDynamicMedia1->setFolder("../Uploads/flash/");
$objDynamicMedia1->setRenameRule("{home.flash}");
$objDynamicMedia1->setType("swf");

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../Uploads/fotos/");
$objDynamicThumb2->setRenameRule("{home.foto}");
$objDynamicThumb2->setResize(160, 0, true);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../Uploads/fotos/");
$objDynamicThumb1->setRenameRule("{home.logotipo}");
$objDynamicThumb1->setResize(250, 250, true);
$objDynamicThumb1->setWatermark(false);



// Show Dynamic Thumbnail
$objDynamicThumb6 = new tNG_DynamicThumbnail("../", "KT_thumbnail6");
$objDynamicThumb6->setFolder("../Uploads/fotos/");
$objDynamicThumb6->setRenameRule("{home.foto4}");
$objDynamicThumb6->setResize(70, 0, true);
$objDynamicThumb6->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb5 = new tNG_DynamicThumbnail("../", "KT_thumbnail5");
$objDynamicThumb5->setFolder("../Uploads/fotos/");
$objDynamicThumb5->setRenameRule("{home.foto3}");
$objDynamicThumb5->setResize(70, 0, true);
$objDynamicThumb5->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("../", "KT_thumbnail4");
$objDynamicThumb4->setFolder("../Uploads/fotos/");
$objDynamicThumb4->setRenameRule("{home.foto2}");
$objDynamicThumb4->setResize(70, 0, true);
$objDynamicThumb4->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("../", "KT_thumbnail3");
$objDynamicThumb3->setFolder("../Uploads/fotos/");
$objDynamicThumb3->setRenameRule("{home.foto1}");
$objDynamicThumb3->setResize(70, 0, true);
$objDynamicThumb3->setWatermark(false);

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
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<!-- lightbox -->

<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->

</head>

<body>
<a name="topo" id="topo"></a>
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
    <td rowspan="4" background="../img/listra_01.gif">&nbsp;</td>
    <td width="592" valign="top" bgcolor="#f5f5f5"><table width="592" height="200" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
            </noscript>
        </div></td>
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
        <td height="128" colspan="3"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','590','height','138','src','../flash/banner_lojas','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/banner_lojas' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="138">
          <param name="movie" value="../flash/banner_lojas.swf" />
		  <param name="wmode" value="transparent"/>
          <param name="quality" value="high" />
          <embed src="../flash/banner_lojas.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="590" height="138"></embed>
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
            <td align="left"><img src="<?php echo tNG_showDynamicImage("../", "../Uploads/fotos/", "{home.gif_nome}");?>" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td><table width="553" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10" align="left" valign="top"><img src="../img/linha_pont_v_01.gif" width="1" height="62" /></td>
                <td width="355" valign="top" class="txt_02"><table width="355" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="txt_02">Descri&ccedil;&atilde;o da loja: </td>
                  </tr>
                  <tr>
                    <td height="30">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30"><span class="txt_03"><?php echo $row_home['titulo']; ?></span></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="355" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="338" align="left" valign="top" class="txt_02"><div align="justify"><?php echo $row_home['descricao']; ?></div></td>
                        <td width="15">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30"><span class="txt_03">Promo&ccedil;&otilde;es do M&ecirc;s </span></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20" class="txt_09"><?php if ($row_home ['promocao1'] == "") { // Show if recordset empty ?>
                        No monento n&atilde;o temos nenhuma promo&ccedil;&atilde;o!
                        <?php } // Show if recordset empty ?></td>
                  </tr>
                  <tr>
                    <td><table width="354" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="77" align="center" valign="top"><?php if ($row_home['promocao1'] != "") { // Show if recordset not empty ?>
                            <table width="77%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td height="80" align="center" valign="top"><img src="<?php echo $objDynamicThumb3->Execute(); ?>" width="70" height="70" border="0" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><?php echo $row_home['promocao1']; ?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><span class="txt_04"><?php echo $row_home['valor1']; ?></span></td>
                              </tr>
                            </table>
                          <?php } // Show if recordset not empty ?></td>
                        <td width="10" align="center" valign="top">&nbsp;</td>
                        <td width="77" align="center" valign="top"><?php if ($row_home['promocao2'] != "") { // Show if recordset not empty ?>
                            <table width="77%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td height="80" align="center" valign="top"><img src="<?php echo $objDynamicThumb4->Execute(); ?>" width="70" height="70" border="0" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><?php echo $row_home['promocao2']; ?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><span class="txt_04"><?php echo $row_home['valor2']; ?></span></td>
                              </tr>
                            </table>
                          <?php } // Show if recordset not empty ?>
                            <br /></td>
                        <td width="10" align="center" valign="top">&nbsp;</td>
                        <td width="77" align="center" valign="top"><?php if ($row_home['promocao3']!= "") { // Show if recordset not empty ?>
                            <table width="77%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td height="80" align="center" valign="top"><img src="<?php echo $objDynamicThumb5->Execute(); ?>" width="70" height="70" border="0" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><?php echo $row_home['promocao3']; ?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><span class="txt_04"><?php echo $row_home['valor3']; ?></span></td>
                              </tr>
                            </table>
                          <?php } // Show if recordset not empty ?>
                            <br /></td>
                        <td width="10" align="center" valign="top">&nbsp;</td>
                        <td width="77" align="center" valign="top"><?php if ($row_home['promocao4'] != "") { // Show if recordset not empty ?>
                            <table width="77%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td height="80" align="center" valign="top"><img src="<?php echo $objDynamicThumb6->Execute(); ?>" width="70" height="70" border="0" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><?php echo $row_home['promocao4']; ?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><span class="txt_04"><?php echo $row_home['valor4']; ?></span></td>
                              </tr>
                            </table>
                          <?php } // Show if recordset not empty ?>
                            <br /></td>
                        <td width="14">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="10" class="linha_v_01">&nbsp;</td>
                <td width="10" align="left" valign="top"><img src="../img/linha_pont_v_01.gif" width="1" height="62" /></td>
                <td width="167" valign="top" class="txt_02"><table width="167" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>Informa&ccedil;&otilde;es para contato: </td>
                  </tr>
                  <tr>
                    <td height="30">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="44" align="right"><table width="155" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="149" align="left" class="primeiro" ><img src="../img/logo_lupa_01.gif" width="19" height="12" /><a href="<?php echo tNG_showDynamicImage("", "../Uploads/fotos/", "{home.foto}");?>" rel="lightbox">Clique para ampliar</a></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr valign="top">
                    <td height="15"><div align="left"><span class="txt_03">Nome:</span></div></td>
                  </tr>
                  <tr>
                    <td><?php echo $row_home['nome']; ?></td>
                  </tr>
                  <tr valign="top">
                    <td height="21"><div align="left"></div></td>
                  </tr>
                  <tr valign="top">
                    <td height="15"><div align="left"><span class="txt_03">Atividade:</span></div></td>
                  </tr>
                  <tr>
                    <td height="20"><?php echo $row_home['atividade']; ?></td>
                  </tr>
                  <tr valign="top">
                    <td height="21"><div align="left"></div></td>
                  </tr>
                  <tr valign="top">
                    <td height="15"><div align="left"><span class="txt_03">Localiza&ccedil;&atilde;o:</span><br />
                      </div></td>
                  </tr>
                  <tr>
                    <td><?php echo $row_home['andar']; ?> andar - n&ordm; <?php echo $row_home['numero']; ?></td>
                  </tr>
                  <tr valign="top">
                    <td height="21"><div align="left"></div></td>
                  </tr>
                  <tr valign="top">
                    <td height="15"><div align="left"><span class="txt_03">Telefone:</span><br />
                      <?php echo $row_home['telefone']; ?> </div></td>
                  </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="top">
                    <td height="21"><div align="left"></div></td>
                  </tr>
                  <tr>
                    <td height="15" valign="top" class="primeiro"><div align="left"><span class="txt_03">E-mail:</span><br />
                        <?php echo $row_home['email']; ?></div></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="21" valign="top"><div align="left"></div></td>
                  </tr>
                  <tr>
                    <td height="15" valign="top" class="primeiro"><div align="left"><span class="txt_03">Web Site:</span><br />
                      <a href="http://<?php echo $row_home['website']; ?>" target="_blank"><?php echo $row_home['website']; ?></a></div></td>
                  </tr>
                  <tr>
                    <td class="primeiro">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td height="30" colspan="4" valign="middle" class="txt_03">Localiza&ccedil;&atilde;o</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td height="20" colspan="4" valign="top" class="txt_02">
				<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','543','height','263','src','<?php echo $objDynamicMedia1->Execute(); ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','<?php echo $objDynamicMedia1->Execute(); ?>' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="543" height="263">
                  <param name="movie" value="<?php echo $objDynamicMedia1->Execute(); ?>.swf" />
				  <param name="wmode" value="transparent"/>
                  <param name="quality" value="high" />
                  <embed src="<?php echo $objDynamicMedia1->Execute(); ?>.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="543" height="263"></embed>
                </object></noscript></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td colspan="4" valign="top" class="txt_02">
				</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td height="40" colspan="4" valign="bottom" class="txt_02"><table width="163" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="13"><img src="../img/marcador_mais_01.jpg" width="13" height="13" /></td>
                    <td width="5" valign="top"><div align="left"></div></td>
                    <td width="145" align="left"><a href="index.php">Exibir todas as lojas </a></td>
                  </tr>
                </table>
                  <br /></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td height="25" colspan="4" valign="top" class="txt_02">&nbsp;</td>
              </tr>
              
            </table></td>
            <td>&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
    <td width="142" height="423" valign="top" bgcolor="#e6e6e6"><table width="142" cellspacing="0" cellpadding="0">
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
    <td width="7" rowspan="4" valign="top" background="../img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
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
          </noscript>          </td>
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
mysql_free_result($home);
?>
