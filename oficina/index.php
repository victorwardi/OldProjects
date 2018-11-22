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
$query_RsAgenda = "Select * From agenda order by id desc";
$RsAgenda = mysql_query($query_RsAgenda, $ConBD) or die(mysql_error());
$row_RsAgenda = mysql_fetch_assoc($RsAgenda);
$totalRows_RsAgenda = mysql_num_rows($RsAgenda);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "areaexclusiva/index.php";
  $MM_redirectLoginFailed = "areaexclusiva/erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ConBD, $ConBD);
  
  $LoginRS__query=sprintf("SELECT email, senha FROM usuarios WHERE email=%s AND senha=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $ConBD) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<?php
// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{Recordset1.arquivo}");
$objDynamicThumb1->setResize(59, 59, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsVideos.capa}");
$objDynamicThumb2->setResize(134, 44, false);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsVideos.capa}");
$objDynamicThumb2->setResize(134, 44, false);
$objDynamicThumb2->setWatermark(false);

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
$query_Rsnoticias = "SELECT * FROM noticias ORDER BY id DESC";
$Rsnoticias = mysql_query($query_Rsnoticias, $ConBD) or die(mysql_error());
$row_Rsnoticias = mysql_fetch_assoc($Rsnoticias);
$totalRows_Rsnoticias = mysql_num_rows($Rsnoticias);

mysql_select_db($database_ConBD, $ConBD);
$query_Recordset1 = "SELECT * FROM fotos ORDER BY id_foto DESC";
$Recordset1 = mysql_query($query_Recordset1, $ConBD) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_ConBD, $ConBD);
$query_RsVideos = "SELECT * FROM videos ORDER BY id_video DESC";
$RsVideos = mysql_query($query_RsVideos, $ConBD) or die(mysql_error());
$row_RsVideos = mysql_fetch_assoc($RsVideos);
$totalRows_RsVideos = mysql_num_rows($RsVideos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- lightBOX-->
<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<!-- lightBOX-->
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="img/bg_01.gif"><div align="left"><img src="img/logo.gif" width="198" height="138" /></div></td>
            <td width="770" height="180" valign="top" background="img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="top"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="520" height="150" align="center" valign="middle"><div align="center"><img src="img/logo_02.gif" width="419" height="101" /></div></td>
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
                                      <td><div align="left">
                                          <form id="form1" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
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
                                                <td width="43%" align="left"><label> <a href="#">Esqueceu a<br />
                                                  Senha ?</a></label></td>
                                                <td width="35%" align="right"><input type="image" name="imageField" id="imageField" src="img/bt_entrar_01.gif" /></td>
                                              </tr>
                                            </table>
                                          </form>
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
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="400" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="370" height="30" valign="middle" background="img/div_02.gif"><div align="left">
                          <table width="370" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">Voc&ecirc; est&aacute; em &gt; </div></td>
                              <td width="270" class="titulo_01"><div align="left">p&aacute;gina inicial </div></td>
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
            <td width="220" height="540" align="left" valign="top" background="img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="6" height="30"><div align="left"></div></td>
                  <td height="30"><div align="center"></div></td>
                </tr>
                <tr>
                  <td width="6" height="300"><div align="left"></div></td>
                  <td height="300" align="right" valign="top"><div align="right">
                    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','214','height','300','src','flash/menu1','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','flash/menu1' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="214" height="300">
                      <param name="wmode" value="transparent"/> 
		     <param name="movie" value="flash/menu1.swf" />
                      <param name="quality" value="high" />
                      <embed src="flash/menu1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="214" height="300"></embed>
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
                                              <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['semana']; ?></div></td>
                                            </tr>
                                            <tr>
                                              <td class="data_02"><div align="center"><?php echo $row_RsAgenda['dia']; ?></div></td>
                                            </tr>
                                            <tr>
                                              <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['mes']; ?></div></td>
                                            </tr>
                                        </table></td>
                                        <td width="140" height="40" valign="top" class="titulo_01"><div align="right"><?php echo $row_RsAgenda['titulo']; ?></div></td>
                                      </tr>
                                    </table>
                                </div></td>
                              </tr>
                              <tr>
                                <td height="10" valign="top"><div align="left"></div></td>
                              </tr>
                              <tr>
                                <td height="50" valign="top" class="txt_01"><div align="left">
                                    <p><?php echo $row_RsAgenda['descricao']; ?></p>
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
            <td width="400" height="540" align="left" valign="top"><div align="left">
              <table width="400" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="30" height="108" valign="bottom"><div align="left"></div></td>
                  <td width="190" height="108" valign="bottom"><div align="left"><img src="img/titulo_noticias_01.gif" width="134" height="32" /></div></td>
                  <td width="40" height="108" valign="bottom"><div align="left"></div></td>
                  <td width="140" height="108" valign="bottom"><div align="left"><img src="img/titulo_fotosevideos_01.gif" width="128" height="32" /></div></td>
                </tr>
                <tr>
                  <td width="30" height="13" valign="top"><div align="left"></div></td>
                  <td width="190" height="13" valign="top"><div align="left"></div></td>
                  <td width="40" height="13" valign="top"><div align="left"></div></td>
                  <td width="140" height="13" valign="top"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="13" valign="top"><div align="left"></div></td>
                  <td height="13" valign="top"><div align="left">
                    <table width="190" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="data_01"><div align="left"><?php echo $row_Rsnoticias['data']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="titulo_01"><div align="left"><?php echo $row_Rsnoticias['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="txt_01"><div align="left"><?php echo $row_Rsnoticias['resumo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="27" valign="bottom"><div align="left"><a href="noticias/mostra.php?id=<?php echo  $row_Rsnoticias['id'];?>"><img src="img/bt_ok_01.gif" width="72" height="20" border="0" /></a></div></td>
                      </tr>
                        <?php $row_Rsnoticias = mysql_fetch_assoc($Rsnoticias); ?>
                      <tr>
                        <td height="25"><div align="left"><img src="img/div_01.gif" width="182" height="3" /></div></td>
                      </tr>
                      <tr>
                        <td class="data_01"><div align="left"><?php echo $row_Rsnoticias['data']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="titulo_01"><div align="left"><?php echo $row_Rsnoticias['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="txt_01"><div align="left"><?php echo $row_Rsnoticias['resumo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="27" valign="bottom"><div align="left"><a href="noticias/mostra.php?id=<?php echo  $row_Rsnoticias['id'];?>"><img src="img/bt_ok_01.gif" width="72" height="20" border="0" /></a></div></td>
                      </tr>
                        <?php $row_Rsnoticias = mysql_fetch_assoc($Rsnoticias); ?>
                      <tr>
                        <td height="25"><div align="left"><img src="img/div_01.gif" width="182" height="3" /></div></td>
                      </tr>
                      <tr>
                        <td class="data_01"><div align="left"><?php echo $row_Rsnoticias['data']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="titulo_01"><div align="left"><?php echo $row_Rsnoticias['titulo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="28" class="txt_01"><div align="left"><?php echo $row_Rsnoticias['resumo']; ?></div></td>
                      </tr>
                      <tr>
                        <td height="27" valign="bottom"><div align="left"><a href="noticias/mostra.php?id=<?php echo  $row_Rsnoticias['id'];?>"><img src="img/bt_ok_01.gif" width="72" height="20" border="0" /></a></div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"><img src="img/div_01.gif" width="182" height="3" /></div></td>
                      </tr>
                      <tr>
                        <td><a href="noticias/index.php">mais not&iacute;cias... </a></td>
                      </tr>
                    </table>
                  </div></td>
                  <td height="13" valign="top"><div align="left"></div></td>
                  <td height="13" valign="top"><div align="left">
                    <table width="140" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="140"><div align="left">
                            <table width="140" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div></td><?php $row_Recordset1 = mysql_fetch_assoc($Recordset1); ?>
                                <td width="10" height="65"><div align="center"></div></td>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div></td><?php $row_Recordset1 = mysql_fetch_assoc($Recordset1); ?>
                              </tr>
                              <tr>
                                <td width="65" height="10"><div align="center"></div></td>
                                <td width="10" height="10"><div align="center"></div></td>
                                <td width="65" height="10"><div align="center"></div></td>
                              </tr>
                              <tr>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div></td><?php $row_Recordset1 = mysql_fetch_assoc($Recordset1); ?>
                                <td width="10" height="65"><div align="center"></div></td>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div></td><?php $row_Recordset1 = mysql_fetch_assoc($Recordset1); ?>
                              </tr>
                              <tr>
                                <td width="65" height="10"><div align="center"></div></td>
                                <td width="10" height="10"><div align="center"></div></td>
                                <td width="65" height="10"><div align="center"></div></td>
                              </tr>
                              <tr>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div>
                                  </td>
                                <?php $row_Recordset1 = mysql_fetch_assoc($Recordset1); ?>
                                <td width="10" height="65"><div align="center"></div></td>
                                <td width="65" height="65" bgcolor="#0089E1"><div align="center"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{Recordset1.arquivo}");?>" rel="lightbox"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div></td>
                              </tr>
                            </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td width="140" height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                      </tr>
                      <tr>
                        <td width="140" class="data_01"><div align="left">V&iacute;deo</div></td>
                      </tr>
                      <tr>
                        <td width="140" class="titulo_01"><div align="left"><?php echo $row_RsVideos['descricao_video']; ?></div></td>
                      </tr>
                      <tr>
                        <td width="140" height="20"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td width="140" height="50" bgcolor="#0089E1"><div align="center"><a href="fotosevideos/videos.php?id_video=<?php echo $row_RsVideos['id_video']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></div></td>
                      </tr>
                      <tr>
                        <td width="140" height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                      </tr>
                      <tr>
                        <td width="140"><div align="left"><a href="../fotosevideos/index.php">mais fotos e v&iacute;deos...</a></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
            <td width="370" height="540" align="left" valign="top"><div align="left">
              <div id="Layer1">
                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','370','height','561','src','flash/bonecos1','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','flash/bonecos1' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="370" height="561">
                  <param name="wmode" value="transparent"/> 
		     <param name="movie" value="flash/bonecos1.swf" />
                  <param name="quality" value="high" />
                  <embed src="flash/bonecos1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="370" height="561"></embed>
                </object>
              </noscript></div>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="comochegar/index.html"><img src="img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Rsnoticias);

mysql_free_result($Recordset1);

mysql_free_result($RsVideos);
mysql_free_result($RsAgenda);
?>
