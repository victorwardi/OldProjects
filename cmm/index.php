<?php require_once('Connections/ConBD.php'); ?>
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

$maxRows_RsNovidades = 5;
$pageNum_RsNovidades = 0;
if (isset($_GET['pageNum_RsNovidades'])) {
  $pageNum_RsNovidades = $_GET['pageNum_RsNovidades'];
}
$startRow_RsNovidades = $pageNum_RsNovidades * $maxRows_RsNovidades;

mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = "SELECT * FROM novidades ORDER BY noticiaID DESC";
$query_limit_RsNovidades = sprintf("%s LIMIT %d, %d", $query_RsNovidades, $startRow_RsNovidades, $maxRows_RsNovidades);
$RsNovidades = mysql_query($query_limit_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);

if (isset($_GET['totalRows_RsNovidades'])) {
  $totalRows_RsNovidades = $_GET['totalRows_RsNovidades'];
} else {
  $all_RsNovidades = mysql_query($query_RsNovidades);
  $totalRows_RsNovidades = mysql_num_rows($all_RsNovidades);
}
$totalPages_RsNovidades = ceil($totalRows_RsNovidades/$maxRows_RsNovidades)-1;

mysql_select_db($database_ConBD, $ConBD);
$query_RsMaisNovidades = "SELECT * FROM novidades ORDER BY noticiaID DESC LIMIT 5,4";
$RsMaisNovidades = mysql_query($query_RsMaisNovidades, $ConBD) or die(mysql_error());
$row_RsMaisNovidades = mysql_fetch_assoc($RsMaisNovidades);
$totalRows_RsMaisNovidades = mysql_num_rows($RsMaisNovidades);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsNovidades.foto1}");
$objDynamicThumb1->setResize(60, 60, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>C&acirc;mara Municipal de Mangaratiba</title>
<style type="text/css">
<!--
body {
	background-color: #CAE0EE;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/css_cmm_01.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
#Layer5 {
	position:absolute;
	z-index:1;
	top: 16px;
}
-->
</style>
</head>

<body onload="MM_preloadImages('img/top_menu_0102.gif','img/top_menu_0202.gif','img/top_menu_0302.gif','img/top_menu_0402.gif','img/link_noticias_0102.gif')">
<div align="center">
  <table width="770" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="10" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
      <td width="750" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
      <td width="10" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
    </tr>
    <tr>
      <td width="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
      <td width="750" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
        <table width="750" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="left">
              <table width="750" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="57" height="60" bgcolor="#FDDDA4"><div align="center"><img src="img/logo_01.gif" width="57" height="60" /></div></td>
                  <td width="693" height="60"><div align="left">
                    <table width="693" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" bgcolor="#8C9EB4"><div align="left">
                          <table width="693" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="5" height="30" align="left" valign="middle"><div align="left"></div></td>
                              <td width="488" height="30" align="left" valign="middle"><div align="left"><img src="img/titulo_top_01.gif" width="302" height="20" /></div></td>
                              <td width="120" align="left" valign="middle" bgcolor="#DFDFDF"><div align="left"><a href="areaexclusiva/index.php"><img src="img/bt_areaexclusiva_01.gif" width="98" height="21" border="0" /></a></div></td>
                              <td width="80" height="30" align="left" valign="middle" bgcolor="#DFDFDF"><div align="left"><a href="http://webmail.cmmangaratiba.rj.gov.br/"><img src="img/bt_webmail_01.gif" width="55" height="21" border="0" /></a></div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="30" bgcolor="#657D99"><div align="right"><span class="txt_01">
                          </span><span class="txt_01">
</span>
                          <table width="693" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="10"><div align="left"></div></td>
                              <td width="383"><div align="left">
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><div align="center"><a href="telefonesuteis/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 01','','img/top_menu_0102.gif',1)"><img src="img/top_menu_0101.gif" name="top menu 01" width="76" height="10" border="0" id="top menu 01" /></a></div></td>
                                    <td width="31"><div align="center"><img src="img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="linksuteis/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 02','','img/top_menu_0202.gif',1)"><img src="img/top_menu_0201.gif" name="top menu 02" width="52" height="10" border="0" id="top menu 02" /></a></div></td>
                                    <td width="31"><div align="center"><img src="img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="ouvidoria/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 03','','img/top_menu_0302.gif',1)"><img src="img/top_menu_0301.gif" name="top menu 03" width="46" height="9" border="0" id="top menu 03" /></a></div></td>
                                    <td width="31"><div align="center"><img src="img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="faleconosco/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 04','','img/top_menu_0402.gif',1)"><img src="img/top_menu_0401.gif" name="top menu 04" width="63" height="9" border="0" id="top menu 04" /></a></div></td>
                                  </tr>
                                </table>
                              </div></td>
                              <td width="290"><div align="right"><span class="data_01">
                                <script language="JavaScript" type="text/javascript">
<!-- 
var d = new Date()
var h = d.getHours()
if (h < 12)
document.write("Bom dia, ")
else
if (h < 18)
document.write("Boa tarde, ")
else
document.write("Boa noite, ")
// -->
                                </script>
                                <script type="text/javascript">
var monthNames = new Array( "janeiro","fevereiro","mar&ccedil;o","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
var now = new Date();
thisYear = now.getYear();
if(thisYear < 1900) {thisYear += 1900};
document.write(now.getDate() + " de ");
document.write(monthNames[now.getMonth()] + " de " + thisYear);
                                </script>
                              </span></div></td>
                              <td width="10"><div align="left"></div></td>
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
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="160"><div align="center">
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','750','height','160','src','flash/banner_princ_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/banner_princ_01' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="750" height="160">
                <param name="movie" value="flash/banner_princ_01.swf" />
                <param name="quality" value="high" />
                <embed src="flash/banner_princ_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="160"></embed>
              </object>
            </noscript></div></td>
          </tr>
          <tr>
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="750" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="160" height="30" bgcolor="#657D99"><img src="img/titulo_menu_01.gif" width="62" height="12" /></td>
                  <td width="4" height="30">&nbsp;</td>
                  <td width="586" height="30" bgcolor="#657D99"><img src="img/titulo_index_01.gif" width="322" height="20" /></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="750" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="160" height="470" valign="top" bgcolor="#FEDDA5"><div align="left">
                    <table width="160" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10" height="4"><div align="left"></div></td>
                        <td width="150" height="4" class="txt_01"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="conhecaacamara/index.php"><strong>Conhe&ccedil;a a C&acirc;mara</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="processolegislativo/index.php"><strong>Processo Legislativo</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="palavradopresidente/index.php"><strong>Palavra do Presidente</strong></a> </div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="vereadores/index.php"><strong>Vereadores</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="mesadiretora/index.php"><strong>Mesa Diretora</strong></a></div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="comissoes/index.php"><strong>Comiss&otilde;es</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="presidenteshistoricos/index.php"><strong>Presidentes Hist&oacute;ricos</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="leiorganica/index.php"><strong>Lei Org&acirc;nica</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="regimentointerno/index.php"><strong>Regimento Interno</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="licitacao/index.php"><strong>Licita&ccedil;&otilde;es</strong></a></div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="fotos/index.php"><strong>Galeria de Fotos</strong></a> </div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="planodiretor/index.php"><strong>Plano Diretor</strong></a><strong> </strong></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="telefonesuteis/index.php"><strong>Telefones &Uacute;teis </strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="linksuteis/index.php"><strong>Links &Uacute;teis </strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="ouvidoria/index.php"><strong>Ouvidoria</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="faleconosco/index.php"><strong>Fale Conosco </strong></a></div></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="4" valign="top">&nbsp;</td>
                  <td width="586" valign="top"><div align="right">
                    <table width="566" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="396" height="10"><div align="left"></div></td>
                        <td width="20" height="10"><div align="left"></div></td>
                        <td width="150" height="10" bgcolor="#DFDFDF"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="396" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left">
                                  <table width="396" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="201" valign="top"><div align="left"><img src="img/camara_01.jpg" width="200" height="166" /></div></td>
                                      <td width="10" valign="top"><div align="left"></div></td>
                                      <td width="185" valign="top" class="txt_01"><div align="left"><strong>C&acirc;mara Municipal<br />
                                        de Mangaratiba</strong>.<br />
                                        <br />
                                        <br />
                                        Seja bem  vindo ao Portal de Internet da C&acirc;mara Municipal.<br />
                                        Veja  todos os dados, informa&ccedil;&otilde;es para contatos... <br />
                                        <br />
                                        <br />
                                        <br />
                                        <a href="conhecaacamara/index.php">Veja as informa&ccedil;&otilde;es<br />
                                          sobre a C&acirc;mara...</a></div></td>
                                    </tr>
                                  </table>
                              </div></td>
                            </tr>
                            <tr>
                              <td height="30"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="txt_01">                                  <p align="left"><strong>Not&iacute;cias</strong></p></td>
                            </tr>
                            <tr>
                              <td height="20" class="txt_01"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="txt_01"><?php do { ?>
                                  <div align="left">
                                        <table width="396" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="60" height="66" bgcolor="#FEDDA5" class="txt_01"><div align="center">
                                              <table width="60" border="0" cellpadding="2" cellspacing="0" bordercolor="#FEDDA5" bgcolor="#FEDDA5">
                                                <tr>
                                                  <td><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsNovidades['noticiaID']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="60" height="60" border="0" /></a></td>
                                                </tr>
                                              </table>
                                            </div></td>
                                            <td width="10"><div align="left"></div></td>
                                            <td width="286" valign="top"><div align="left">
                                              <table width="318" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td height="16" align="left" valign="top" class="titulo_01"><div align="left"><?php echo $row_RsNovidades['titulo']; ?></div></td>
                                                </tr>
                                                <tr>
                                                  <td height="50" valign="bottom" class="txt_01"><div align="left"><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsNovidades['noticiaID']; ?>"><?php echo $row_RsNovidades['resumo']; ?> </a></div></td>
                                                </tr>
                                                </table>
                                            </div></td>
                                        </tr>
                                          <tr>
                                            <td height="20" colspan="3" bgcolor="#FFFFFF" class="txt_01">&nbsp;</td>
                                          </tr>
                                            </table>
                                  </div>
                                  <?php } while ($row_RsNovidades = mysql_fetch_assoc($RsNovidades)); ?></td>
                            </tr>
                            
                        </table></td>
                        <td>&nbsp;</td>
                        <td height="470" valign="top"><div align="right">
                          <table width="150" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td bgcolor="#DFDFDF"><div align="center">
                                  <table width="150" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><div align="center">
                                        <table width="130" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="61" valign="top"><div align="left"><img src="img/vereador_clopes_02.jpg" width="60" height="66" /></div></td>
                                            <td width="7" valign="top"><div align="left"></div></td>
                                            <td width="62" valign="top" class="txt_01"><div align="left"><strong>Palavra do<br />
                                              Presidente</strong><br />
                                              Vereador<br />
                                              C&eacute;lio<br />
                                              Lopes </div></td>
                                          </tr>
                                        </table>
                                      </div></td>
                                    </tr>
                                    <tr>
                                      <td height="10"><div align="left"></div></td>
                                    </tr>
                                    <tr>
                                      <td class="txt_01"><div align="center">
                                        <table width="130" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><div align="left">O Vereador &eacute; o mais pr&oacute;ximo que a comunidade tem com o poder. Atrav&eacute;s do   Vereador &eacute; que o mun&iacute;cipio tem a possibilidade de melhorar o seu dia-a-dia, seja   com novas leis para o munic&iacute;pio, seja na fiscaliza&ccedil;&atilde;o da execu&ccedil;&atilde;o das tarefas do   executivo. Por isso a C&acirc;mara Municipal de Vereadores &eacute; a casa do povo, &eacute; o lugar   onde as diversas camadas da sociedade est&atilde;o representadas e ao mesmo tempo   apresentam suas reivindica&ccedil;&otilde;es onde mais uma fun&ccedil;&atilde;o do vereador aparece, a de   transformar em lei a vontade popular... <br />
                                                    <br />
                                                    <br />
                                                <a href="palavradopresidente/index.php">Veja na &iacute;ntegra  a Palavra do Presidente...</a></div></td>
                                          </tr>
                                        </table>
                                      </div>
                                        <p align="center">&nbsp;</p></td></tr>
                                  </table>
                              </div></td>
                            </tr>
                            <tr>
                              <td height="10" bgcolor="#DFDFDF"><div align="center"></div></td>
                            </tr>
                            <tr>
                              <td height="10"><div align="center"></div></td>
                            </tr>
                            <tr>
                              <td><div align="center">
                                  <iframe src='http://selos.climatempo.com.br/selos/MostraSelo.php?CODCIDADE=307&amp;SKIN=padrao' scrolling='No' frameborder='0' width="150" height='170' marginheight='0' marginwidth='0'></iframe>
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
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#8C9EB4"><div align="left"><img src="img/titulo_noticias_02.gif" width="104" height="13" /></div></td>
          </tr>
          <tr>
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFDFDF"><div align="center">
              <table width="730" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="163" height="20"><div align="left"></div></td>
                  <td width="27" height="20"><div align="left"></div></td>
                  <td width="162" height="20"><div align="left"></div></td>
                  <td width="27" height="20"><div align="left"></div></td>
                  <td width="162" height="20"><div align="left"></div></td>
                  <td width="27" height="20"><div align="left"></div></td>
                  <td width="162" height="20"><div align="left"></div></td>
                </tr>
                <tr>
                  <td valign="top"><div align="left">
                    <table width="162" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="24" align="left" valign="top" class="titulo_01"><div align="left"><?php echo $row_RsMaisNovidades['titulo']; ?></div></td>
                        </tr>
                        <tr>
                          <td height="8"><div align="left"></div></td>
                        </tr>
                        <tr>
                          <td height="74" valign="top" class="txt_01"><div align="left">
                            <p><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsMaisNovidades['noticiaID']; ?>"><?php echo $row_RsMaisNovidades['resumo']; ?></a></p>
                          </div></td>
                        </tr>
                          </table>
                  </div></td>
                  <td valign="top" background="img/div_02.gif"><div align="center"></div></td>
                  <td valign="top"><div align="left">
                       <?php ($row_RsMaisNovidades = mysql_fetch_assoc($RsMaisNovidades)); ?>
                    <table width="162" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="24" align="left" valign="top" class="titulo_01"><div align="left"><?php echo $row_RsMaisNovidades['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="8"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td height="74" valign="top" class="txt_01"><div align="left">
                          <p><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsMaisNovidades['noticiaID']; ?>"><?php echo $row_RsMaisNovidades['resumo']; ?></a></p>
                        </div></td>
                      </tr>
                    </table>
                          <?php ($row_RsMaisNovidades = mysql_fetch_assoc($RsMaisNovidades)); ?>
                  </div></td>
                  <td valign="top" background="img/div_02.gif"><div align="center"></div></td>
                  <td valign="top"><div align="left">
                    <table width="162" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="24" align="left" valign="top" class="titulo_01"><div align="left"><?php echo $row_RsMaisNovidades['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="8"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td height="74" valign="top" class="txt_01"><div align="left"><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsMaisNovidades['noticiaID']; ?>"><?php echo $row_RsMaisNovidades['resumo']; ?></a></div></td>
                      </tr>
                    </table>
                       <?php ($row_RsMaisNovidades = mysql_fetch_assoc($RsMaisNovidades)); ?>
                  </div></td>
                  <td valign="top" background="img/div_02.gif"><div align="center"></div></td>
                  <td valign="top"><div align="left">
                    <table width="162" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="24" align="left" valign="top" class="titulo_01"><div align="left"><?php echo $row_RsMaisNovidades['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="8"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td height="74" valign="top" class="txt_01"><div align="left">
                          <p><a href="noticias/noticia.php?noticiaID=<?php echo $row_RsMaisNovidades['noticiaID']; ?>"><?php echo $row_RsMaisNovidades['resumo']; ?></a></p>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="20"><div align="left"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('mais noticias 01','','img/link_noticias_0102.gif',1)"><img src="img/link_noticias_0101.gif" name="mais noticias 01" width="102" height="9" border="0" id="mais noticias 01" /></a></div></td>
                  <td height="20"><div align="left"></div></td>
                  <td height="20"><div align="left"></div></td>
                  <td height="20"><div align="left"></div></td>
                  <td height="20"><div align="left"></div></td>
                  <td height="20"><div align="left"></div></td>
                  <td height="20"><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td height="30"><div align="left"></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="750" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="160"><div align="center"><a href="http://www.mangaratiba.rj.gov.br/index.php" target="_blank"><img src="img/propaganda_01.gif" width="160" height="69" border="0" /></a></div></td>
                  <td width="4"><div align="left"></div></td>
                  <td width="586"><div align="right">
                    <table width="566" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="257" height="19"><table width="260" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="1"><div align="left"><img src="img/img_email_02.jpg" width="25" height="31" /></div></td>
                              <td width="235"><div align="left">
                                <table width="235" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><div align="left"><img src="img/img_email_02_2.jpg" width="34" height="10" /></div></td>
                                  </tr>
                                  <tr>
                                    <td valign="bottom"><div align="left"><a href="mailto:contato@cmmangaratiba.rj.gov.br">contato@cmmangaratiba.rj.gov.br</a></div></td>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table></td>
                        <td width="9">&nbsp;</td>
                        <td width="283" align="right"><div align="right">
                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="1"><div align="left"><img src="img/img_telefone_02.jpg" width="25" height="31" /></div></td>
                              <td width="95"><div align="left">
                                  <table width="90" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><div align="left"><img src="img/img_telefone_02_2.jpg" width="47" height="10" /></div></td>
                                    </tr>
                                    <tr>
                                      <td class="txt_01"><div align="left">[21] 2789 1440 </div></td>
                                    </tr>
                                  </table>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="19" colspan="3" background="../img/img_linha_01.jpg">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="19" colspan="3" align="center" valign="top" class="txt_01"><div align="center">Travessa Vereador Vivaldo Eloy da Silva Passos, s/n&ordm; - Centro - Mangaratiba - RJ - &nbsp;CEP: 23860-000 </div></td>
                      </tr>
                    </table>
                  </div>
                    <div align="left"></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td height="50"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="4" background="img/div_03.gif"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#8C9EB4"><div align="center">
              <table width="730" border="0" cellspacing="0" cellpadding="0">
                <tr class="txt_01">
                  <td><div align="left"><span class="txt_03">&copy; 2008 C&acirc;mara Municipal de Mangaratiba - Todos os direitos reservados.</span></div></td>
                  <td><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="img/logo_lobster_01.gif" width="83" height="23" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
      <td width="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
    </tr>
    <tr>
      <td width="10" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
      <td width="750" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
      <td width="10" height="10" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center"></div></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RsMaisNovidades);
?>
