<?php require_once('../../Connections/ConBD.php'); ?><?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

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
$tfi_listvideos1 = new TFI_TableFilter($conn_ConBD, "tfi_listvideos1");
$tfi_listvideos1->addColumn("videos.id_video", "NUMERIC_TYPE", "id_video", "=");
$tfi_listvideos1->addColumn("videos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listvideos1->addColumn("videos.descricao_video", "STRING_TYPE", "descricao_video", "%");
$tfi_listvideos1->addColumn("videos.video", "FILE_TYPE", "video", "%");
$tfi_listvideos1->addColumn("videos.capa", "FILE_TYPE", "capa", "%");
$tfi_listvideos1->Execute();

// Sorter
$tso_listvideos1 = new TSO_TableSorter("rsvideos1", "tso_listvideos1");
$tso_listvideos1->addColumn("videos.id_video");
$tso_listvideos1->addColumn("videos.id");
$tso_listvideos1->addColumn("videos.descricao_video");
$tso_listvideos1->addColumn("videos.video");
$tso_listvideos1->addColumn("videos.capa");
$tso_listvideos1->setDefault("videos.id_video DESC");
$tso_listvideos1->Execute();

// Navigation
$nav_listvideos1 = new NAV_Regular("nav_listvideos1", "rsvideos1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsvideos1 = $_SESSION['max_rows_nav_listvideos1'];
$pageNum_rsvideos1 = 0;
if (isset($_GET['pageNum_rsvideos1'])) {
  $pageNum_rsvideos1 = $_GET['pageNum_rsvideos1'];
}
$startRow_rsvideos1 = $pageNum_rsvideos1 * $maxRows_rsvideos1;

// Defining List Recordset variable
$NXTFilter_rsvideos1 = "1=1";
if (isset($_SESSION['filter_tfi_listvideos1'])) {
  $NXTFilter_rsvideos1 = $_SESSION['filter_tfi_listvideos1'];
}
// Defining List Recordset variable
$NXTSort_rsvideos1 = "videos.id_video DESC";
if (isset($_SESSION['sorter_tso_listvideos1'])) {
  $NXTSort_rsvideos1 = $_SESSION['sorter_tso_listvideos1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsvideos1 = "SELECT videos.id_video, videos.id, videos.descricao_video, videos.video, videos.capa FROM videos WHERE {$NXTFilter_rsvideos1} ORDER BY {$NXTSort_rsvideos1}";
$query_limit_rsvideos1 = sprintf("%s LIMIT %d, %d", $query_rsvideos1, $startRow_rsvideos1, $maxRows_rsvideos1);
$rsvideos1 = mysql_query($query_limit_rsvideos1, $ConBD) or die(mysql_error());
$row_rsvideos1 = mysql_fetch_assoc($rsvideos1);

if (isset($_GET['totalRows_rsvideos1'])) {
  $totalRows_rsvideos1 = $_GET['totalRows_rsvideos1'];
} else {
  $all_rsvideos1 = mysql_query($query_rsvideos1);
  $totalRows_rsvideos1 = mysql_num_rows($all_rsvideos1);
}
$totalPages_rsvideos1 = ceil($totalRows_rsvideos1/$maxRows_rsvideos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listvideos1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{rsvideos1.capa}");
$objDynamicThumb1->setResize(75, 0, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg_01.gif);
	background-color: #009CE7;
}
.style2 {
	color: #008BE1;
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="topo.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="2">
      <tr>
        <td bgcolor="#DEE7F8" class="style2">Menu</td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">V&iacute;deos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Agenda</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
      <script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
      </script>
      <style type="text/css">
  /* Dynamic List row settings */
  .KT_col_id_video {width:140px; overflow:hidden;}
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_descricao_video {width:140px; overflow:hidden;}
  .KT_col_video {width:140px; overflow:hidden;}
  .KT_col_capa {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">V&iacute;deos</td>
        </tr>
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listvideos1">
              <h1 class="style2"> V&iacute;deos
                <?php
  $nav_listvideos1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listvideos1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listvideos1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listvideos1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listvideos1'] == 1) {
?>
                  <a href="<?php echo $tfi_listvideos1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listvideos1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#008BE1"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th bgcolor="#008BE1" class="KT_sorter KT_col_descricao_video <?php echo $tso_listvideos1->getSortIcon('videos.descricao_video'); ?>" id="descricao_video"> <a href="<?php echo $tso_listvideos1->getSortLink('videos.descricao_video'); ?>">Descricao</a></th>
                        <th bgcolor="#008BE1" class="KT_sorter KT_col_video <?php echo $tso_listvideos1->getSortIcon('videos.video'); ?>" id="video"> <a href="<?php echo $tso_listvideos1->getSortLink('videos.video'); ?>">Video</a> </th>
                        <th bgcolor="#008BE1" class="KT_sorter KT_col_capa <?php echo $tso_listvideos1->getSortIcon('videos.capa'); ?>" id="capa"> <a href="<?php echo $tso_listvideos1->getSortLink('videos.capa'); ?>">Capa</a> </th>
                        <th bgcolor="#008BE1">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listvideos1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listvideos1_descricao_video" id="tfi_listvideos1_descricao_video" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvideos1_descricao_video']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listvideos1_video" id="tfi_listvideos1_video" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvideos1_video']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="text" name="tfi_listvideos1_capa" id="tfi_listvideos1_capa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvideos1_capa']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="submit" name="tfi_listvideos1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsvideos1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsvideos1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_videos" class="id_checkbox" value="<?php echo $row_rsvideos1['id_video']; ?>" />
                                <input type="hidden" name="id_video" class="id_field" value="<?php echo $row_rsvideos1['id_video']; ?>" />                            </td>
                            <td><div class="KT_col_descricao_video"><?php echo KT_FormatForList($row_rsvideos1['descricao_video'], 20); ?></div></td>
                            <td><div class="KT_col_video"><?php echo KT_FormatForList($row_rsvideos1['video'], 20); ?></div></td>
                            <td><div class="KT_col_capa">
                              <div align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div>
                            </div></td>
                            <td><a class="KT_edit_link" href="video_inserir.php?id_video=<?php echo $row_rsvideos1['id_video']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsvideos1 = mysql_fetch_assoc($rsvideos1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listvideos1->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                    </div>
                  </div>
                  <div class="KT_bottombuttons">
                    <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
                    <span>&nbsp;</span>
                    <select name="no_new" id="no_new">
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="6">6</option>
                    </select>
                    <a class="KT_additem_op_link" href="video_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsvideos1);
?>
