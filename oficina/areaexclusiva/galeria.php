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
$query_RsFotos = sprintf("SELECT * FROM fotos_ex F, galeria_ex G WHERE G. id = %s AND F. id = %s  ", GetSQLValueString($colname_RsFotos, "int"),GetSQLValueString($colname_RsFotos, "int"));
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);

$colname_RsVideos = "-1";
if (isset($_GET['id'])) {
  $colname_RsVideos = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsVideos = sprintf("SELECT * FROM videos_ex WHERE id = %s ORDER BY id_video DESC", GetSQLValueString($colname_RsVideos, "int"));
$RsVideos = mysql_query($query_RsVideos, $ConBD) or die(mysql_error());
$row_RsVideos = mysql_fetch_assoc($RsVideos);
$totalRows_RsVideos = mysql_num_rows($RsVideos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.arquivo}");
$objDynamicThumb1->setResize(84, 84, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsVideos.capa}");
$objDynamicThumb2->setResize(134, 44, false);
$objDynamicThumb2->setWatermark(false);

?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "erro.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?><?php include("../inc/arquivos.php"); ?>
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
                  <td height="150" valign="middle"><div align="center"><img src="../img/logo_02.gif" width="419" height="101" /></div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../img/div_02.gif"><div align="left">
                          <table width="640" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">Voc&ecirc; est&aacute; em &gt; </div></td>
                              <td width="100" class="titulo_01"><a href="../index.php">p&aacute;gina inicial &gt; </a></td>
                              <td width="440" class="titulo_01"><div align="left">&Aacute;rea Exclusiva</div></td>
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','214','height','300','src','../flash/menu_fotosevideos1','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/menu_fotosevideos1' ); //end AC code
</script>
                    <noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="214" height="300">
                      <param name="wmode" value="transparent"/> 
		     <param name="movie" value="../flash/menu_fotosevideos1.swf" />
                      <param name="quality" value="high" />
                      <embed src="../flash/menu_fotosevideos1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="214" height="300"></embed>
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
                  <td height="24" valign="middle" bgcolor="#008BE1"><div align="center"></div></td>
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
                              <td><div align="left"><img src="../img/titulo_galeriadefotoevideo_01.gif" width="129" height="29" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td><div align="left">
                                <table width="570" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="570" class="data_01">Galeria</td>
                                  </tr>
                                  <tr>
                                    <td class="titulo_01"><div align="left">
                                      <table width="570" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td class="titulo_01"><div align="left"><?php echo $row_RsFotos['titulo']; ?></div></td>
                                          <td class="txt_01"><div align="right"><a href="index.php">&lt; Voltar</a></div></td>
                                        </tr>
                                      </table>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="16" class="data_01"><p class="txt_01"><br />
                                      * Para realizar o download, clique com o bot&atilde;o direito do mouse no link &quot;Download&quot; e depois em &quot;Salvar Destino Como...&quot;.</p>
                                      <p>&nbsp;</p></td>
                                  </tr>
                                  <tr>
                                    <td height="48" valign="middle"><table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <?php
  do { // horizontal looper version 3
?>
                                          <td><?php if ($totalRows_RsFotos > 0) { // Show if recordset not empty ?>
                                              <table width="100" border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                  <td align="center" valign="middle"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_azul" /></td>
                                                </tr>
                                                <tr>
                                                  <td align="center" valign="middle"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>">Download</a></td>
                                                </tr>
                                              </table>
                                              <?php } // Show if recordset not empty ?></td>
                                          <?php
    $row_RsFotos = mysql_fetch_assoc($RsFotos);
    if (!isset($nested_RsFotos)) {
      $nested_RsFotos= 1;
    }
    if (isset($row_RsFotos) && is_array($row_RsFotos) && $nested_RsFotos++ % 6==0) {
      echo "</tr><tr>";
    }
  } while ($row_RsFotos); //end horizontal looper version 3
?>
                                      </tr>
                                    </table>
                                      
                                      <?php if ($totalRows_RsFotos == 0) { // Show if recordset empty ?>
                                        <span class="titulo_01">N&atilde;o h&aacute; fotos cadastradas neste &aacute;lbum!</span>
                                        <?php } // Show if recordset empty ?>
</td>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                        <td width="30" valign="top"><div align="left"></div></td>
                        <td width="140" valign="top"><div align="left">
                          <table width="140" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"><img src="../img/titulo_galeriadefotoevideo_02.gif" width="129" height="29" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td><div align="left">
                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="data_01">V&iacute;deo</td>
                                  </tr>
                                  <tr>
                                    <td class="titulo_01">&nbsp;</td>
                                  </tr>
                                  
                                  <tr>
                                    <td height="16"><?php do { ?>
                                          <?php if ($totalRows_RsVideos > 0) { // Show if recordset not empty ?>
                                            <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                              <tr>
                                                <td align="left"><span class="titulo_01"><?php echo $row_RsVideos['descricao_video']; ?> </span></td>
                                              </tr>
                                              <tr>
                                                <td><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" class="borda_azul" /></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><a href="../uploads/videos/<?php echo $row_RsVideos['video']; ?>">Download</a></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                            </table>
                                            <?php } // Show if recordset not empty ?>
                                          <?php } while ($row_RsVideos = mysql_fetch_assoc($RsVideos)); ?><div align="left"></div></td>
                                  </tr>
                                  <tr>
                                    <td height="20" valign="middle" class="titulo_01"><div align="center">
                                      <?php if ($totalRows_RsVideos == 0) { // Show if recordset empty ?>
                                        N&atilde;o h&aacute; v&iacute;deos<br />
                                        cadastrados neste &aacute;lbum!
  <?php } // Show if recordset empty ?>
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
                  <td height="50"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="140" height="100" bgcolor="#008BE1"><div align="center"><img src="../img/desenho_01.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#008BE1"><div align="center"><img src="../img/desenho_02.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#008BE1"><div align="center"><img src="../img/desenho_03.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#008BE1"><div align="center"><img src="../img/desenho_04.jpg" width="134" height="94" /></div></td>
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
<?php
mysql_free_result($RsFotos);

mysql_free_result($RsVideos);
?>
