<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

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

// Filter
$tfi_listnovidadesvereadores1 = new TFI_TableFilter($conn_ConBD, "tfi_listnovidadesvereadores1");
$tfi_listnovidadesvereadores1->addColumn("novidadesvereadores.novidadeId", "NUMERIC_TYPE", "novidadeId", "=");
$tfi_listnovidadesvereadores1->addColumn("novidadesvereadores.imagem", "STRING_TYPE", "imagem", "%");
$tfi_listnovidadesvereadores1->addColumn("novidadesvereadores.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listnovidadesvereadores1->Execute();

// Sorter
$tso_listnovidadesvereadores1 = new TSO_TableSorter("rsnovidadesvereadores1", "tso_listnovidadesvereadores1");
$tso_listnovidadesvereadores1->addColumn("novidadesvereadores.novidadeId");
$tso_listnovidadesvereadores1->addColumn("novidadesvereadores.imagem");
$tso_listnovidadesvereadores1->addColumn("novidadesvereadores.titulo");
$tso_listnovidadesvereadores1->setDefault("novidadesvereadores.novidadeId DESC");
$tso_listnovidadesvereadores1->Execute();

// Navigation
$nav_listnovidadesvereadores1 = new NAV_Regular("nav_listnovidadesvereadores1", "rsnovidadesvereadores1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsnovidadesvereadores1 = $_SESSION['max_rows_nav_listnovidadesvereadores1'];
$pageNum_rsnovidadesvereadores1 = 0;
if (isset($_GET['pageNum_rsnovidadesvereadores1'])) {
  $pageNum_rsnovidadesvereadores1 = $_GET['pageNum_rsnovidadesvereadores1'];
}
$startRow_rsnovidadesvereadores1 = $pageNum_rsnovidadesvereadores1 * $maxRows_rsnovidadesvereadores1;

// Defining List Recordset variable
$NXTFilter_rsnovidadesvereadores1 = "1=1";
if (isset($_SESSION['filter_tfi_listnovidadesvereadores1'])) {
  $NXTFilter_rsnovidadesvereadores1 = $_SESSION['filter_tfi_listnovidadesvereadores1'];
}
// Defining List Recordset variable
$NXTSort_rsnovidadesvereadores1 = "novidadesvereadores.novidadeId DESC";
if (isset($_SESSION['sorter_tso_listnovidadesvereadores1'])) {
  $NXTSort_rsnovidadesvereadores1 = $_SESSION['sorter_tso_listnovidadesvereadores1'];
}
mysql_select_db($database_ConBD, $ConBD);

$colname_rsnovidadesvereadores1 = "-1";
if (isset($_GET['vereadorID'])) {
  $colname_rsnovidadesvereadores1 = $_GET['vereadorID'];
}
$query_rsnovidadesvereadores1 = "SELECT novidadesvereadores.novidadeId, novidadesvereadores.imagem, novidadesvereadores.titulo FROM novidadesvereadores WHERE {$NXTFilter_rsnovidadesvereadores1} AND novidadesvereadores.vereadorId= {$colname_rsnovidadesvereadores1} ORDER BY {$NXTSort_rsnovidadesvereadores1}";
$query_limit_rsnovidadesvereadores1 = sprintf("%s LIMIT %d, %d", $query_rsnovidadesvereadores1, $startRow_rsnovidadesvereadores1, $maxRows_rsnovidadesvereadores1);
$rsnovidadesvereadores1 = mysql_query($query_limit_rsnovidadesvereadores1, $ConBD) or die(mysql_error());
$row_rsnovidadesvereadores1 = mysql_fetch_assoc($rsnovidadesvereadores1);

if (isset($_GET['totalRows_rsnovidadesvereadores1'])) {
  $totalRows_rsnovidadesvereadores1 = $_GET['totalRows_rsnovidadesvereadores1'];
} else {
  $all_rsnovidadesvereadores1 = mysql_query($query_rsnovidadesvereadores1);
  $totalRows_rsnovidadesvereadores1 = mysql_num_rows($all_rsnovidadesvereadores1);
}
$totalPages_rsnovidadesvereadores1 = ceil($totalRows_rsnovidadesvereadores1/$maxRows_rsnovidadesvereadores1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnovidadesvereadores1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb2->setFolder("../uploads/fotos/");
$objDynamicThumb2->setRenameRule("{rsnovidadesvereadores1.imagem}");
$objDynamicThumb2->setResize(40, 30, false);
$objDynamicThumb2->setWatermark(false);

$varlogin_RsVereador = "-1";
if (isset($_SESSION['MM_Username'])) {
  $varlogin_RsVereador = $_SESSION['MM_Username'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsVereador = sprintf("SELECT * FROM vereadores WHERE vereadorID = (SELECT vereadorID  FROM vereadores v WHERE v.login=%s)", GetSQLValueString($varlogin_RsVereador, "text"));
$RsVereador = mysql_query($query_RsVereador, $ConBD) or die(mysql_error());
$row_RsVereador = mysql_fetch_assoc($RsVereador);
$totalRows_RsVereador = mysql_num_rows($RsVereador);

mysql_select_db($database_ConBD, $ConBD);
$query_RsNoticias = sprintf("SELECT * FROM novidadesvereadores WHERE vereadorID = (SELECT vereadorID  FROM vereadores v WHERE v.login=%s) ORDER BY novidadeId DESC", GetSQLValueString($varlogin_RsVereador, "text"));
$RsNoticias = mysql_query($query_RsNoticias, $ConBD) or die(mysql_error());
$row_RsNoticias = mysql_fetch_assoc($RsNoticias);
$totalRows_RsNoticias = mysql_num_rows($RsNoticias);

mysql_select_db($database_ConBD, $ConBD);
$query_RsFotos = sprintf("SELECT * FROM fotosvereadores WHERE vereadorID = (SELECT vereadorID  FROM vereadores v WHERE v.login=%s) ORDER BY fotoID DESC", GetSQLValueString($varlogin_RsVereador, "text"));
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.imagem}");
$objDynamicThumb1->setResize(50, 50, false);
$objDynamicThumb1->setWatermark(false);
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

$MM_restrictGoTo = "index.php?erro=true";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>C&acirc;mara Municipal de Mangaratiba</title>
<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple"
});
</script>
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
<link href="../css/css_cmm_01.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
#Layer5 {
	position:absolute;
	z-index:1;
	top: 16px;
}
.style1 {font-size: 10px; color: #4F4C69; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif;}
-->
</style>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: false,
  show_as_buttons: false,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_novidadeId {width:140px; overflow:hidden;}
  .KT_col_imagem {width:60px; overflow:hidden;}
  .KT_col_titulo {width:200px; overflow:hidden;}
</style>
</head>

<body onload="MM_preloadImages('../img/link_noticias_0102.gif','../img/top_menu_0102.gif','../img/top_menu_0202.gif','../img/top_menu_0302.gif','../img/top_menu_0402.gif')">
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
                  <td width="57" height="60" bgcolor="#FDDDA4"><div align="center"><a href="../index.php"><img src="../img/logo_01.gif" width="57" height="60" border="0" /></a></div></td>
                  <td width="693" height="60"><div align="left">
                    <table width="693" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" bgcolor="#8C9EB4"><div align="left">
                          <table width="693" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="5" height="30" align="left" valign="middle"><div align="left"></div></td>
                              <td width="488" height="30" align="left" valign="middle"><div align="left"><img src="../img/titulo_top_01.gif" width="302" height="20" /></div></td>
                              <td width="120" align="left" valign="middle" bgcolor="#DFDFDF"><div align="left"><a href="index.php"><img src="../img/bt_areaexclusiva_01.gif" width="98" height="21" border="0" /></a></div></td>
                              <td width="80" height="30" align="left" valign="middle" bgcolor="#DFDFDF"><div align="left"><a href="http://webmail.cmmangaratiba.rj.gov.br/"><img src="../img/bt_webmail_01.gif" width="55" height="21" border="0" /></a></div></td>
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
                                    <td><div align="center"><a href="../telefonesuteis/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 01','','../img/top_menu_0102.gif',1)"><img src="../img/top_menu_0101.gif" name="top menu 01" width="76" height="10" border="0" id="top menu 01" /></a></div></td>
                                    <td width="31"><div align="center"><img src="../img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="../linksuteis/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 02','','../img/top_menu_0202.gif',1)"><img src="../img/top_menu_0201.gif" name="top menu 02" width="52" height="10" border="0" id="top menu 02" /></a></div></td>
                                    <td width="31"><div align="center"><img src="../img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="../ouvidoria/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 03','','../img/top_menu_0302.gif',1)"><img src="../img/top_menu_0301.gif" name="top menu 03" width="46" height="9" border="0" id="top menu 03" /></a></div></td>
                                    <td width="31"><div align="center"><img src="../img/div_01.gif" width="3" height="9" /></div></td>
                                    <td><div align="center"><a href="../faleconosco/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('top menu 04','','../img/top_menu_0402.gif',1)"><img src="../img/top_menu_0401.gif" name="top menu 04" width="63" height="9" border="0" id="top menu 04" /></a></div></td>
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','750','height','160','src','../flash/banner_princ_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/banner_princ_01' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="750" height="160">
                <param name="movie" value="../flash/banner_princ_01.swf" />
                <param name="quality" value="high" />
                <embed src="../flash/banner_princ_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="160"></embed>
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
                  <td width="160" height="30" bgcolor="#657D99"><img src="../img/titulo_menu_01.gif" width="62" height="12" /></td>
                  <td width="4" height="30">&nbsp;</td>
                  <td width="586" height="30" bgcolor="#657D99"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><span class="txt_03"><a name="topo" id="topo"></a><img src="../img/titulo_vereadores_01.gif" width="121" height="16" /></span></td>
                      <td align="right" class="logout" ><a href="<?php echo $logoutAction ?>" >Sair [logout]</a></td>
                    </tr>
                  </table></td>
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
                        <td height="25" class="txt_01"><div align="left"><a href="../conhecaacamara/index.php"><strong>Conhe&ccedil;a a C&acirc;mara</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../processolegislativo/index.php"><strong>Processo Legislativo</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="select_link_01"><div align="left"><a href="../palavradopresidente/index.php"><strong>Palavra do Presidente</strong></a> </div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="select_link_01"><div align="left"><strong>Vereadores</strong></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../mesadiretora/index.php"><strong>Mesa Diretora</strong></a></div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../comissoes/index.php"><strong>Comiss&otilde;es</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../presidenteshistoricos/index.php"><strong>Presidentes Hist&oacute;ricos</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../leiorganica/index.php"><strong>Lei Org&acirc;nica</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../regimentointerno/index.php"><strong>Regimento Interno</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../licitacao/index.php"><strong>Licita&ccedil;&otilde;es</strong></a></div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../fotos/index.php"><strong>Galeria de Fotos</strong></a> </div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="select_link_01"><div align="left"><a href="../planodiretor/index.php"><strong>Plano Diretor</strong></a> </div></td>
                      </tr>
                      
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td class="txt_01"><div align="left"><a href="../telefonesuteis/index.php"><strong>Telefones &Uacute;teis </strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td class="txt_01"><div align="left"><a href="../linksuteis/index.php"><strong>Links &Uacute;teis </strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td class="txt_01"><div align="left"><a href="../ouvidoria/index.php"><strong>Ouvidoria</strong></a></div></td>
                      </tr>
                      <tr>
                        <td height="25"><div align="left"></div></td>
                        <td height="25" class="txt_01"><div align="left"><a href="../faleconosco/index.php"><strong>Fale Conosco</strong></a></div></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="4" valign="top">&nbsp;</td>
                  <td width="586" valign="top"><div align="right">
                    <table width="566" cellspacing="0" cellpadding="0">
                      <tr valign="top">
                        <td width="260" height="10"><div align="left"></div></td>
                        <td width="40" height="10"><div align="left"></div></td>
                        <td width="260" height="10"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td width="260" class="txt_03"><script type="text/javascript"> 
function mudafonte(tipo) { 
     if ( tipo == 0 ) { 
           document.getElementById("meutexto").style.fontSize="10px"; 
         tipo=''; 
} 
     if ( tipo == 1 ) { 
           document.getElementById("meutexto").style.fontSize="12px"; 
         tipo=''; 
} 

if ( tipo == 2 ) { 
document.getElementById("meutexto").style.fontSize="14px"; 
 tipo=''; 
} 
} 
                    </script>
                            <table width="259" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="12" height="20" align="left" class="txt_07"><div align="left"><img src="../img/marcador_01.gif" width="9" height="8" /></div></td>
                                <td width="165" height="20" align="left"><div align="left"><span class="titulo_01">Alterar o tamanho do texto</span></div></td>
                                <td width="14" height="20" align="center" valign="middle" class="titulo_01"><div align="center"><a href="javascript:;" onclick="mudafonte(0)"><strong> A</strong></a></div></td>
                                <td width="14" height="20" align="center" valign="middle" class="txt_06"><div align="center"><strong>|</strong></div></td>
                                <td width="16" height="20" align="center" valign="middle" class="titulo_01"><div align="center"><a href="javascript:;" onclick="mudafonte(1)"><strong> A+</strong></a></div></td>
                                <td width="14" height="20" align="center" valign="middle" class="txt_06"><div align="center"><strong>|</strong></div></td>
                                <td width="22" height="20" align="center" valign="middle" class="titulo_01"><div align="center"><a href="javascript:;" onclick="mudafonte(2)"><strong> A++</strong></a></div></td>
                              </tr>
                          </table></td>
                        <td width="46" height="10" class="txt_03">&nbsp;</td>
                        <td width="260" rowspan="3" valign="top" bgcolor="#DFDFDF" class="txt_03"><table width="291" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="19"><div align="left"></div></td>
                            <td valign="top"><div align="center"></div></td>
                            <td width="222" class="pri"><div align="left"></div></td>
                            <td width="19" class="pri"><div align="right"></div></td>
                          </tr>
                          <tr>
                            <td width="20" height="19"><div align="left"></div></td>
                            <td width="20" valign="top"><div align="center"><img src="../img/icone_01.gif" width="13" height="20" /></div></td>
                            <td width="222" class="txt_01"><div align="left"><a href="../vereadores/drruy_print.php">Vers&atilde;o para Impress&atilde;o</a></div></td>
                            <td width="19" class="pri"><div align="right"></div></td>
                          </tr>
                          <tr>
                            <td height="19"><div align="left"></div></td>
                            <td><div align="center"><img src="../img/icone_02.gif" width="13" height="20" /></div></td>
                            <td width="222" class="txt_01"><div align="left"><a href="#">Enviar por E-mail</a></div></td>
                            <td width="19" class="pri"><div align="right"><a href="#"></a></div></td>
                          </tr>
                          <tr>
                            <td height="19">&nbsp;</td>
                            <td><div align="center"><img src="../img/icone_05.gif" width="13" height="20" /></div></td>
                            <td class="txt_01"><div align="left"><a href="javascript:addFav();">Adicionar  aos Favoritos</a></div></td>
                            <td class="pri">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="19">&nbsp;</td>
                            <td><div align="center"><img src="../img/icone_04.gif" width="13" height="20" /></div></td>
                            <td class="txt_01"><div align="left"><a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.cmmangaratiba.rj.gov.br');" href="#">Exibir como P&aacute;gina Inicial</a><a href="#"></a> </div></td>
                            <td class="pri">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="19"><div align="left"></div></td>
                            <td><div align="center"><img src="../img/icone_03.gif" width="13" height="20" /></div></td>
                            <td width="222" class="txt_01"><div align="left"><a href="../newsletter/index.php">Receber Newsletter</a></div></td>
                            <td width="19" class="pri"><div align="right"><a href="../newsletter/index.php"></a></div></td>
                          </tr>
                          <tr>
                            <td height="19"><div align="left"></div></td>
                            <td colspan="2"><div align="left"></div>
                                <div align="left"></div></td>
                            <td class="pri"><div align="left"></div></td>
                          </tr>
                          <tr>
                            <td height="19"><div align="left"></div></td>
                            <td colspan="2" align="center" valign="top"><div align="center">
                                <table width="215" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td height="240" align="center" valign="top" class="txt_01"><div align="center"><img src="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsVereador.foto}");?>" /></div>
                                        <br /></td>
                                  </tr>
                                  <tr>
                                    <td height="18" class="txt_01"><div align="left">
                                        <table width="258" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td height="18" class="bt_01">Informa&ccedil;&otilde;es pessoais</td>
                                          </tr>
                                          <tr>
                                            <td width="256" class="txt_01"><div class="classe1 style1" id="meutexto2">
                                                <div align="justify">
                                                  <p><strong><br />
                                                    Nome: </strong><?php echo $row_RsVereador['nome']; ?><strong><br />
                                                      <br />
                                                      Como &eacute; conhecido:</strong> <?php echo $row_RsVereador['apelido']; ?><br />
                                                    <br />
                                                    <br />
                                                    <strong>Partido:</strong> <?php echo $row_RsVereador['partido']; ?> <br />
                                                    <br />
                                                    <br />
                                                    <strong>Anivers&aacute;rio:</strong> <?php echo $row_RsVereador['aniversario']; ?><br />
                                                    <br />
                                                    <br />
                                                    <strong>Participa&ccedil;&atilde;o na C&acirc;mara:</strong><br />
                                                    <br />
                                                    <?php echo $row_RsVereador['participacaoNaCamara']; ?><br />
                                                    <br />
                                                    <br />
                                                    <strong>Homenageados em 2007 com o T&iacute;tulo de<br />
                                                      Cidad&atilde;o   Mangaratibense:</strong><br />
                                                    <br />
                                                    <?php echo $row_RsVereador['homenageados']; ?><br />
                                                    <br />
                                                  </p>
                                                </div>
                                            </div></td>
                                          </tr>
                                        </table>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td class="txt_01"><div align="left">
                                        <p><strong>Contatos:<br />
                                              <br />
                                          Telefone do Gabinete: <br />
                                          </strong><?php echo $row_RsVereador['telefoneGabinete']; ?><br />
                                          <br />
                                          <strong>Telefone:<br />
                                          </strong><?php echo $row_RsVereador['telefone']; ?><br />
                                          <br />
                                          <strong>Web Site : <br />
                                          </strong><a href="http://<?php echo $row_RsVereador['site']; ?>"><?php echo $row_RsVereador['site']; ?></a><br />
                                          <br />
                                          <strong>E-Mail:</strong><br />
                                        <a href="mailto:<?php echo $row_RsVereador['email']; ?>"><?php echo $row_RsVereador['email']; ?></a> </p>
                                    </div></td>
                                  </tr>
                                </table>
                            </div></td>
                            <td class="pri">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="center">&nbsp;</td>
                            <td height="20" class="pri">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr valign="top">
                        <td width="260" height="160" class="txt_03"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left"><strong class="titulo_01"><?php echo $row_RsVereador['nome']; ?></strong><span class="style1">, bem vindo! </span></td>
                          </tr>
                          <tr>
                            <td align="left" class="txt_01">Utilize as op&ccedil;&otilde;es abaixo para administrar o seu perfil no site.</td>
                          </tr>

                          <tr>
                            <td align="left" class="select_link_01"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                              <tr>
                                <td align="left" class="select_link_01">&raquo; <a href="home.php">In&iacute;cio</a></td>
                              </tr>
                              <tr>
                                <td align="left" class="select_link_01">&raquo; <a href="editarinfo.php?vereadorID=<?php echo $row_RsVereador['vereadorID']; ?>">Editar informa&ccedil;&otilde;es pessoais</a></td>
                              </tr>
                              <tr>
                                <td align="left" class="select_link_01">&raquo; <a href="adicionarfoto.php?vereadorID=<?php echo $row_RsVereador['vereadorID']; ?>">Adicionar foto na galeria</a></td>
                              </tr>
                              <tr>
                                <td align="left" class="select_link_01">&raquo; <a href="adicionarfoto.php?vereadorID=<?php echo $row_RsVereador['vereadorID']; ?>">Editar/excluir foto</a></td>
                              </tr>
                              <tr>
                                <td align="left" class="select_link_01">&raquo; <a href="adicionarnoticia.php?vereadorID=<?php echo $row_RsVereador['vereadorID']; ?>">Adiconar not&iacute;cia</a></td>
                              </tr>
                              <tr>
                                <td align="left" class="select_link_01">&raquo; Editar/excluir not&iacute;cia</td>
                              </tr>

                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              
                              <tr>
                                <td><div class="KT_tng" id="listnovidadesvereadores1">
                                    <h1 class="titulo_01"> Not&iacute;cias
                                      <?php
  $nav_listnovidadesvereadores1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
                                    </h1>
                                    <div class="KT_tnglist">
                                      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                                       
                                        <table width="290" cellpadding="2" cellspacing="2" class="KT_tngtable">
                                          <thead>
                                            
                                            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnovidadesvereadores1'] == 1) {
?>
                                              <tr class="KT_row_filter">
                                                <td>&nbsp;</td>
                                                <td><input type="text" name="tfi_listnovidadesvereadores1_titulo" id="tfi_listnovidadesvereadores1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnovidadesvereadores1_titulo']); ?>" size="20" maxlength="255" /></td>
                                                <td><input type="submit" name="tfi_listnovidadesvereadores1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                                              </tr>
                                              <?php } 
  // endif Conditional region3
?>
                                          </thead>
                                          <tbody>
                                            <?php if ($totalRows_rsnovidadesvereadores1 == 0) { // Show if recordset empty ?>
                                              <tr>
                                                <td colspan="3"><?php echo NXT_getResource("Não existem notícias cadastradas."); ?></td>
                                              </tr>
                                              <?php } // Show if recordset empty ?>
                                            <?php if ($totalRows_rsnovidadesvereadores1 > 0) { // Show if recordset not empty ?>
                                              <?php do { ?>
                                                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                                  <td bgcolor="#FFFFCC"><input type="checkbox" name="kt_pk_novidadesvereadores" class="id_checkbox" value="<?php echo $row_rsnovidadesvereadores1['novidadeId']; ?>" />
                                                    <input type="hidden" name="novidadeId" class="id_field" value="<?php echo $row_rsnovidadesvereadores1['novidadeId']; ?>" /></td>
                                                  <td bgcolor="#FFFFCC"><div class="style1"><?php echo KT_FormatForList($row_rsnovidadesvereadores1['titulo'], 50); ?></div></td>
                                                  <td bgcolor="#FFFFCC"><a class="KT_edit_link" href="adicionarnoticia.php?novidadeId=<?php echo $row_rsnovidadesvereadores1['novidadeId']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                                                </tr>
                                                <?php } while ($row_rsnovidadesvereadores1 = mysql_fetch_assoc($rsnovidadesvereadores1)); ?>
                                              <?php } // Show if recordset not empty ?>
                                          </tbody>
                                        </table>
                                        <div class="KT_bottomnav">
                                          <div>
                                            <?php
            $nav_listnovidadesvereadores1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                                          </div>
                                        </div>
                                        <div class="KT_bottombuttons">
                                          <div class="KT_operations"></div>
                                          <span>&nbsp;</span></div>
                                      </form>
                                    </div>
                                    <br class="clearfixplain" />
                                  </div>
                                  <p>&nbsp;</p></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left">&nbsp;</td>
                          </tr>
                        </table></td>
                        <td height="160" class="txt_03"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td width="260" valign="top" class="txt_03">&nbsp;</td>
                        <td height="10" class="txt_03">&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td height="50" colspan="3" class="txt_01"><div align="left"></div></td>
                      </tr>
                      <tr>
                        <td colspan="3" class="txt_01"><div align="right">
                          <table width="566" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="366" valign="middle" class="txt_01"><div align="left"><a href="#topo" class="qua"><strong>^ topo</strong></a></div></td>
                              <td width="100" valign="middle" class="txt_01"><div align="left"><a href="home.php"><strong>&lt; Voltar</strong></a></div></td>
                              <td width="100" valign="middle" class="txt_01"><div align="right"><a href="../index.php"><strong>&lt;&lt; P&aacute;gina Inicial </strong></a><a href="/index.php"></a> </div></td>
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
            <td height="30"><div align="left"></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="750" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="160"><div align="center"><a href="http://www.mangaratiba.rj.gov.br/index.php" target="_blank"><img src="../img/propaganda_01.gif" width="160" height="69" border="0" /></a></div></td>
                  <td width="4"><div align="left"></div></td>
                  <td width="586"><div align="right">
                    <table width="566" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="257" height="19"><table width="260" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="1"><div align="left"><img src="../img/img_email_02.jpg" width="25" height="31" /></div></td>
                              <td width="235"><div align="left">
                                  <table width="235" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><div align="left"><img src="../img/img_email_02_2.jpg" width="34" height="10" /></div></td>
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
                                <td width="1"><div align="left"><img src="../img/img_telefone_02.jpg" width="25" height="31" /></div></td>
                                <td width="95"><div align="left">
                                    <table width="90" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><div align="left"><img src="../img/img_telefone_02_2.jpg" width="47" height="10" /></div></td>
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
            <td height="4" background="../img/div_03.gif"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#8C9EB4"><div align="center">
              <table width="730" border="0" cellspacing="0" cellpadding="0">
                <tr class="txt_01">
                  <td><div align="left"><span class="txt_03">&copy; 2008 C&acirc;mara Municipal de Mangaratiba - Todos os direitos reservados.</span></div></td>
                  <td><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../img/logo_lobster_01.gif" width="83" height="23" border="0" /></a></div></td>
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
mysql_free_result($rsnovidadesvereadores1);

mysql_free_result($RsVereador);

mysql_free_result($RsNoticias);

mysql_free_result($RsFotos);
?>
