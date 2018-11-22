<?php require_once('../../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listgabriel2 = new TFI_TableFilter($conn_saquabb, "tfi_listgabriel2");
$tfi_listgabriel2->addColumn("gabriel.id", "NUMERIC_TYPE", "id", "=");
$tfi_listgabriel2->addColumn("gabriel.foto1", "STRING_TYPE", "foto1", "%");
$tfi_listgabriel2->addColumn("gabriel.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listgabriel2->addColumn("gabriel.data", "STRING_TYPE", "data", "%");
$tfi_listgabriel2->Execute();

// Sorter
$tso_listgabriel2 = new TSO_TableSorter("rsgabriel1", "tso_listgabriel2");
$tso_listgabriel2->addColumn("gabriel.id");
$tso_listgabriel2->addColumn("gabriel.foto1");
$tso_listgabriel2->addColumn("gabriel.titulo");
$tso_listgabriel2->addColumn("gabriel.data");
$tso_listgabriel2->setDefault("gabriel.id DESC");
$tso_listgabriel2->Execute();

// Navigation
$nav_listgabriel2 = new NAV_Regular("nav_listgabriel2", "rsgabriel1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsgabriel1 = $_SESSION['max_rows_nav_listgabriel2'];
$pageNum_rsgabriel1 = 0;
if (isset($_GET['pageNum_rsgabriel1'])) {
  $pageNum_rsgabriel1 = $_GET['pageNum_rsgabriel1'];
}
$startRow_rsgabriel1 = $pageNum_rsgabriel1 * $maxRows_rsgabriel1;

$NXTFilter_rsgabriel1 = "1=1";
if (isset($_SESSION['filter_tfi_listgabriel2'])) {
  $NXTFilter_rsgabriel1 = $_SESSION['filter_tfi_listgabriel2'];
}
$NXTSort_rsgabriel1 = "gabriel.id DESC";
if (isset($_SESSION['sorter_tso_listgabriel2'])) {
  $NXTSort_rsgabriel1 = $_SESSION['sorter_tso_listgabriel2'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsgabriel1 = sprintf("SELECT gabriel.id, gabriel.foto1, gabriel.titulo, gabriel.data FROM gabriel WHERE %s ORDER BY %s", $NXTFilter_rsgabriel1, $NXTSort_rsgabriel1);
$query_limit_rsgabriel1 = sprintf("%s LIMIT %d, %d", $query_rsgabriel1, $startRow_rsgabriel1, $maxRows_rsgabriel1);
$rsgabriel1 = mysql_query($query_limit_rsgabriel1, $saquabb) or die(mysql_error());
$row_rsgabriel1 = mysql_fetch_assoc($rsgabriel1);

if (isset($_GET['totalRows_rsgabriel1'])) {
  $totalRows_rsgabriel1 = $_GET['totalRows_rsgabriel1'];
} else {
  $all_rsgabriel1 = mysql_query($query_rsgabriel1);
  $totalRows_rsgabriel1 = mysql_num_rows($all_rsgabriel1);
}
$totalPages_rsgabriel1 = ceil($totalRows_rsgabriel1/$maxRows_rsgabriel1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listgabriel2->checkBoundries();
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

$MM_restrictGoTo = "index.php";
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: true,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto1 {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
        <div class="KT_tng" id="listgabriel2">
          <h1 class="tiutlo_not"> Gabriel
            <?php
  $nav_listgabriel2->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
          </h1>
          <div class="KT_tnglist">
            <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
              <div class="KT_options"> <a href="<?php echo $nav_listgabriel2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listgabriel2'] == 1) {
?>
                  <?php echo $_SESSION['default_max_rows_nav_listgabriel2']; ?>
                  <?php 
  // else Conditional region1
  } else { ?>
                  <?php echo NXT_getResource("all"); ?>
                  <?php } 
  // endif Conditional region1
?>
                    <?php echo NXT_getResource("records"); ?></a> &nbsp;
                &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listgabriel2'] == 1) {
?>
                              <a href="<?php echo $tfi_listgabriel2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listgabriel2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
              </div>
              <table border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" class="KT_tngtable">
                <thead>
                  <tr class="KT_row_order">
                    <th bgcolor="#017C9E" class="comentario"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                    </th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="foto1"> <a href="<?php echo $tso_listgabriel2->getSortLink('gabriel.foto1'); ?>" class="Titulo_Branco">Foto</a></th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="titulo"> <a href="<?php echo $tso_listgabriel2->getSortLink('gabriel.titulo'); ?>" class="Titulo_Branco">Titulo</a> </th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="data"> <a href="<?php echo $tso_listgabriel2->getSortLink('gabriel.data'); ?>" class="Titulo_Branco">Data</a> </th>
                    <th bgcolor="#017C9E" class="comentario">&nbsp;</th>
                  </tr>
                  <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listgabriel2'] == 1) {
?>
                    <tr class="KT_row_filter">
                      <td>&nbsp;</td>
                      <td><input type="text" name="tfi_listgabriel2_foto1" id="tfi_listgabriel2_foto1" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgabriel2_foto1']); ?>" size="10" maxlength="50" /></td>
                      <td><input type="text" name="tfi_listgabriel2_titulo" id="tfi_listgabriel2_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgabriel2_titulo']); ?>" size="40" maxlength="60" /></td>
                      <td><input type="text" name="tfi_listgabriel2_data" id="tfi_listgabriel2_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgabriel2_data']); ?>" size="20" maxlength="20" /></td>
                      <td><input type="submit" name="tfi_listgabriel2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                    </tr>
                    <?php } 
  // endif Conditional region3
?>
                </thead>
                <tbody>
                  <?php if ($totalRows_rsgabriel1 == 0) { // Show if recordset empty ?>
                    <tr>
                      <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                    </tr>
                    <?php } // Show if recordset empty ?>
                  <?php if ($totalRows_rsgabriel1 > 0) { // Show if recordset not empty ?>
                    <?php do { ?>
                      <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                        <td><input type="checkbox" name="kt_pk_gabriel" class="id_checkbox" value="<?php echo $row_rsgabriel1['id']; ?>" />
                            <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsgabriel1['id']; ?>" />
                        </td>
                        <td align="center"><div class="KT_col_foto1"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsgabriel1.foto1}", 80, 60, false); ?>" /></div></td>
                        <td align="center"><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsgabriel1['titulo'], 40); ?></div></td>
                        <td align="center"><div class="KT_col_data"><?php echo KT_FormatForList($row_rsgabriel1['data'], 20); ?></div></td>
                        <td><a class="KT_edit_link" href="add.php?id=<?php echo $row_rsgabriel1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                      </tr>
                      <?php } while ($row_rsgabriel1 = mysql_fetch_assoc($rsgabriel1)); ?>
                    <?php } // Show if recordset not empty ?>
                </tbody>
              </table>
              <div class="KT_bottomnav">
                <div class="comentario">
                  
                  <div align="justify">
                    <?php
            $nav_listgabriel2->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                  </div>
                </div>
              </div>
              <div class="KT_bottombuttons">
                <div class="KT_operations"> 
                  <div align="center">
                    <p align="left"><a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></p>
                  </div>
                </div>
                <div align="left"><span>&nbsp;</span>
                  <select name="no_new" id="no_new">
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                  </select>
                  <a class="KT_additem_op_link" href="add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
              </div>
            </form>
          </div>
          <br class="clearfixplain" />
        </div>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="../../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
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
mysql_free_result($rsgabriel1);
?>