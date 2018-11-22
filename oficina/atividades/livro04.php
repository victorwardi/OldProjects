<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');
 include("../inc/arquivos.php"); ?>
<?php
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
$query_RsFotos = "SELECT * FROM fotos WHERE id = '16' ORDER BY id_foto DESC";
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);

mysql_select_db($database_ConBD, $ConBD);
$query_RsVideos = "SELECT * FROM videos WHERE id = '16' ORDER BY id_video DESC";
$RsVideos = mysql_query($query_RsVideos, $ConBD) or die(mysql_error());
$row_RsVideos = mysql_fetch_assoc($RsVideos);
$totalRows_RsVideos = mysql_num_rows($RsVideos);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsVideos.capa}");
$objDynamicThumb2->setResize(134, 44, false);
$objDynamicThumb2->setWatermark(false);


// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.arquivo}");
$objDynamicThumb1->setResize(59, 59, false);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Oficina Criativa ||</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
	left: 414px;
	top: 260px;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- lightBOX-->
<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<!-- lightBOX-->
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="../img/bg_01.gif"><div align="left"><a href="../index.php"><img src="../img/logo.gif" width="198" height="138" border="0" /></a></div></td>
            <td width="770" height="180" valign="top" background="../img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="top"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="520" height="150" align="center" valign="middle"><div align="center"><img src="../img/logo_02.gif" width="419" height="101" /></div></td>
                        <td width="250" height="150" align="left" valign="top"><div align="center">
                          <table width="220" height="120" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="middle" bgcolor="#FFFFFF"><div align="center">
                                <table width="190" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="data_01"><div align="left">&Aacute;rea</div></td>
                                  </tr>
                                  <tr>
                                    <td class="titulo_01"><div align="left">Exclusiva</div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left"> <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                                        <label></label>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="1">
                                            <tr>
                                              <td width="22%" align="left" class="txt_06">Login:</td>
                                              <td colspan="2" align="left"><input name="login" type="text" class="form_01" id="login" size="26" /></td>
                                            </tr>
                                            <tr>
                                              <td align="left" class="txt_06">Senha</td>
                                              <td colspan="2" align="left"><input name="senha" type="password" class="form_01" id="senha" size="26" /></td>
                                            </tr>
                                            <tr>
                                              <td align="left">&nbsp;</td>
                                              <td width="43%" align="left"><label>
                                                <a href="#">Esqueceu a<br />
Senha ?</a></label></td>
                                              <td width="35%" align="right"><input type="image" name="imageField" id="imageField" src="../img/bt_entrar_01.gif" /></td>
                                            </tr>
                                          </table>
                                        
                                        </form></div></td>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../img/div_02.gif"><div align="left">
                          <table width="740" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">
                                  <div align="left">Voc&ecirc; est&aacute; em &gt; </div>
                              </div></td>
                              <td width="100" class="titulo_01"><div align="left"><a href="../index.php">p&aacute;gina inicial &gt; </a></div></td>
                              <td width="80" class="titulo_01"><div align="left"><a href="index.php">atividades &gt; </a></div></td>
                              <td width="70" class="titulo_01"><div align="left"> <a href="biblioteca.php">biblioteca</a> </div></td>
                              <td width="390" class="titulo_01"><div align="left">o m undo perdido</div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="540" align="center" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="540" align="left" valign="top" background="../img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="6" height="30"><div align="left"></div></td>
                  <td height="30"><div align="center"></div></td>
                </tr>
                <tr>
                  <td width="6" height="300"><div align="left"></div></td>
                  <td height="300" align="right" valign="top"><div align="right">
                    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','214','height','300','src','../flash/menu2','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/menu2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="214" height="300">
                      <param name="wmode" value="transparent"/> 
		     <param name="movie" value="../flash/menu2.swf" />
                      <param name="quality" value="high" />
                      <embed src="../flash/menu2.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="214" height="300"></embed>
                    </object>
                  </noscript></div></td>
                </tr>
                <tr>
                  <td width="6"><div align="left"></div></td>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="left">
                    <table width="190" border="2" cellpadding="0" cellspacing="0" bordercolor="#0089E1">
                      <tr>
                        <td height="23" bgcolor="#0089E1" class="titulo_02"><div align="center">Agenda</div></td>
                      </tr>
                      <tr>
                        <td height="128" align="center" valign="middle"><div align="center">
                          <table width="170" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="40" valign="top"><div align="left">
                                  <table width="170" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="30" height="40"><table width="30" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['semana'];?></div></td>
                                          </tr>
                                          <tr>
                                            <td class="data_02"><div align="center"><?php echo $row_RsAgenda['dia'];?></div></td>
                                          </tr>
                                          <tr>
                                            <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['mes'];?></div></td>
                                          </tr>
                                      </table></td>
                                      <td width="140" height="40" valign="top" class="titulo_01"><div align="right"><?php echo $row_RsAgenda['titulo'];?></div></td>
                                    </tr>
                                  </table>
                              </div></td>
                            </tr>
                            <tr>
                              <td height="10" valign="top"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td height="50" valign="top" class="txt_01"><div align="left">
                                  <p><?php echo $row_RsAgenda['descricao'];?> </p>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
            <td width="30" height="540" align="left" valign="top"><div align="left"></div></td>
            <td width="740" height="540" align="left" valign="top"><div align="left">
              <table width="740" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="24" valign="middle" bgcolor="#EF4A6C"><div align="center">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr class="select_link_01">
                        <td><div align="center"><a href="artes.php">Artes</a></div></td>
                        <td><div align="center"><a href="biblioteca.php">Biblioteca</a></div></td>
                        <td><div align="center"><a href="brinquedoteca.php">Brinquedoteca</a></div></td>
                        <td><div align="center"><a href="educacaofisica.php">Educa&ccedil;&atilde;o F&iacute;sica </a></div></td>
                        <td><div align="center"><a href="informatica.php">Inform&aacute;tica</a></div></td>
                        <td><div align="center"><a href="ingles.php">Ingl&ecirc;s</a></div></td>
                        <td><div align="center"><a href="musica.php">M&uacute;sica</a></div></td>
                        <td><div align="center"><a href="teatro.php">Teatro</a></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="26"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="570" valign="top"><div align="left">
                          <table width="570" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"><img src="../img/titulo_atividades_01.gif" width="129" height="29" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="titulo_01"><div align="left">Biblioteca - O Mundo Perdido </div></td>
                            </tr>
                            <tr>
                              <td height="20" class="txt_01">&nbsp;</td>
                            </tr>
                            
                            <tr>
                              <td height="205" class="txt_big_01"><table width="570" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="205" valign="top"><div align="left"><img src="../img/foto_biblioteca_livro_0402.jpg" width="200" height="200" /></div></td>
                                  <td width="365" valign="top" class="txt_big_01"><div align="justify">
                                    <p>Malone, um jornalista em in&iacute;cio de carreira, tem como desafio realizar uma mat&eacute;ria sobre o relato de um conhecido zo&oacute;logico da Inglaterra, professor Challenger, envolvendo animais fant&aacute;sticos que o cientista teria localizado na Amaz&ocirc;nia. Eles partem em uma eletrizante expedi&ccedil;&atilde;o para confirmar essas descobertas e um extraordin&aacute;rio mundo pr&eacute;-hist&oacute;rico revela-se aos nossos exploradores, em pleno s&eacute;culo XX. O mundo prerdido &eacute; uma das obras que iniciam a fic&ccedil;&atilde;o cent&iacute;fica, inspirando muitos escritores e cineastas. Seu autor Conan Doyle, </p>
                                    </div></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td class="txt_big_01"><p align="justify">criou tamb&eacute;m o consagrado personagem Sherlock Homes e suas extraordin&aacute;rias hist&oacute;rias de mist&eacute;rio.<br />
<br />
Editado por: <strong>Companhia Editora Nacional </strong></p></td>
                            </tr>
                            <tr>
                              <td height="40" class="txt_big_01"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="txt_big_01"><div align="left"><a href="biblioteca.php">Ver outros livros da biblioteca </a></div></td>
                            </tr>
                          </table>
                        </div></td>
                        <td width="30" valign="top"><div align="left"></div></td>
                        <td width="140" valign="top"><div align="left">
                          <table width="140" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"><img src="../img/titulo_fotosevideos_01.gif" width="128" height="32" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td>












<div align="left">
                                      <table width="140" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="140"><table width="140" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                                <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                                <td width="10" height="65"><div align="center"></div></td>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                                <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                              </tr>
                                              <tr>
                                                <td width="65" height="10"><div align="center"></div></td>
                                                <td width="10" height="10"><div align="center"></div></td>
                                                <td width="65" height="10"><div align="center"></div></td>
                                              </tr>
                                              <tr>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                                <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                                <td width="10" height="65"><div align="center"></div></td>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                                <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                              </tr>
                                              <tr>
                                                <td width="65" height="10"><div align="center"></div></td>
                                                <td width="10" height="10"><div align="center"></div></td>
                                                <td width="65" height="10"><div align="center"></div></td>
                                              </tr>
                                              <tr>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                                <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                                <td width="10" height="65"><div align="center"></div></td>
                                                <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td width="140" height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                                        </tr>
                                        <tr>
                                          <td class="data_01"><div align="left">V&iacute;deo</div></td>
                                        </tr>
                                        <tr>
                                          <td class="titulo_01"><div align="left"><?php echo $row_RsVideos['descricao_video']; ?></div></td>
                                        </tr>
                                        <tr>
                                          <td height="20"><div align="left"></div></td>
                                        </tr>
                                        <tr>
                                          <td height="50" bgcolor="#EF4A6C"><div align="center"><a href="../fotosevideos/videos.php?id_video=<?php echo $row_RsVideos['id_video']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></div></td>
                                        </tr>
                                        <tr>
                                          <td height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                                        </tr>
                                        <tr>
                                          <td width="140"><div align="left"><a href="../fotosevideos/index.php">mais fotos e v&iacute;deos...</a></div></td>
                                        </tr>
                                      </table>
                                  </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="50"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../img/desenho_01.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../img/desenho_02.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../img/desenho_03.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../img/desenho_04.jpg" width="134" height="94" /></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="../img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="../img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="../img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="../comochegar/index.html"><img src="../img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="../img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
