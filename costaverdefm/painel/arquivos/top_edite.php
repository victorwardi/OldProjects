<?php require_once('../../Connections/CostaverdeFM.php'); ?>
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

$MM_restrictGoTo = "../erro.php";
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
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Filter
$tfi_listtop2 = new TFI_TableFilter($conn_CostaverdeFM, "tfi_listtop2");
$tfi_listtop2->addColumn("top.top", "NUMERIC_TYPE", "top", "=");
$tfi_listtop2->addColumn("top.musica", "STRING_TYPE", "musica", "%");
$tfi_listtop2->addColumn("top.cantor", "STRING_TYPE", "cantor", "%");
$tfi_listtop2->addColumn("top.mp3", "STRING_TYPE", "mp3", "%");
$tfi_listtop2->Execute();

// Sorter
$tso_listtop2 = new TSO_TableSorter("rstop1", "tso_listtop2");
$tso_listtop2->addColumn("top.top");
$tso_listtop2->addColumn("top.musica");
$tso_listtop2->addColumn("top.cantor");
$tso_listtop2->addColumn("top.mp3");
$tso_listtop2->setDefault("top.top");
$tso_listtop2->Execute();

// Navigation
$nav_listtop2 = new NAV_Regular("nav_listtop2", "rstop1", "../../", $_SERVER['PHP_SELF'], 12);

//NeXTenesio3 Special List Recordset
$maxRows_rstop1 = $_SESSION['max_rows_nav_listtop2'];
$pageNum_rstop1 = 0;
if (isset($_GET['pageNum_rstop1'])) {
  $pageNum_rstop1 = $_GET['pageNum_rstop1'];
}
$startRow_rstop1 = $pageNum_rstop1 * $maxRows_rstop1;

$NXTFilter_rstop1 = "1=1";
if (isset($_SESSION['filter_tfi_listtop2'])) {
  $NXTFilter_rstop1 = $_SESSION['filter_tfi_listtop2'];
}
$NXTSort_rstop1 = "top.top";
if (isset($_SESSION['sorter_tso_listtop2'])) {
  $NXTSort_rstop1 = $_SESSION['sorter_tso_listtop2'];
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);

$query_rstop1 = sprintf("SELECT top.top, top.musica, top.cantor, top.mp3, top.id FROM top WHERE %s ORDER BY %s", $NXTFilter_rstop1, $NXTSort_rstop1);
$query_limit_rstop1 = sprintf("%s LIMIT %d, %d", $query_rstop1, $startRow_rstop1, $maxRows_rstop1);
$rstop1 = mysql_query($query_limit_rstop1, $CostaverdeFM) or die(mysql_error());
$row_rstop1 = mysql_fetch_assoc($rstop1);

if (isset($_GET['totalRows_rstop1'])) {
  $totalRows_rstop1 = $_GET['totalRows_rstop1'];
} else {
  $all_rstop1 = mysql_query($query_rstop1);
  $totalRows_rstop1 = mysql_num_rows($all_rstop1);
}
$totalPages_rstop1 = ceil($totalRows_rstop1/$maxRows_rstop1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtop2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle Costa Verde FM</title>
<!-- InstanceEndEditable -->
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
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
  .KT_col_top {width:140px; overflow:hidden;}
  .KT_col_musica {width:140px; overflow:hidden;}
  .KT_col_cantor {width:140px; overflow:hidden;}
  .KT_col_mp3 {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="home.php">Home</a></th>
          </tr>
        </table></th>
      </tr>
      
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Destaque / Not&iacute;cias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="col"><a href="destaque_add.php">Inserir</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="destaque_edite.php">Modificar / Remover </a></th>
      </tr>
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          
          <tr>
            <th scope="col">Fotos </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="foto_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Galerias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="galeria_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Top 12 </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <th scope="row"><a href="top_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Mp3</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="mp3_edite.php"> Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Recados</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="row"><a href="recados_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fique Ligado </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="ligado_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Promo&ccedil;&otilde;es</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="#">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Equipe</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="#">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Programa</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="programa_edite.php">Modificar / Remover </a></th>
          </tr>
          <tr>
            <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
              <tr>
                <th scope="col">An&uacute;ncios</th>
              </tr>
            </table></th>
          </tr>
          <tr>
            <th scope="col"><a href="anuncio_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="anuncio_edite.php">Modificar / Remover </a></th>
          </tr>
          
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listtop2">
              <table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
                <tr>
                  <th height="27" align="left" scope="col">Top 12  - Modificar / Remover </th>
                </tr>
              </table>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listtop2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtop2'] == 1) {
?>
                          <?php echo $_SESSION['default_max_rows_nav_listtop2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtop2'] == 1) {
?>
                              <a href="<?php echo $tfi_listtop2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listtop2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th width="38" bgcolor="#3A9456"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th width="141" align="center" bgcolor="#3A9456" class="KT_sorter KT_col_top <?php echo $tso_listtop2->getSortIcon('top.top'); ?>" id="top"> <a href="<?php echo $tso_listtop2->getSortLink('top.top'); ?>" class="fonte11px_branca_negrito">Top</a> </th>
                        <th width="141" align="center" bgcolor="#3A9456" class="KT_sorter KT_col_musica <?php echo $tso_listtop2->getSortIcon('top.musica'); ?>" id="musica"> <a href="<?php echo $tso_listtop2->getSortLink('top.musica'); ?>" class="fonte11px_branca_negrito">Musica</a> </th>
                        <th width="141" align="center" bgcolor="#3A9456" class="KT_sorter KT_col_cantor <?php echo $tso_listtop2->getSortIcon('top.cantor'); ?>" id="cantor"> <a href="<?php echo $tso_listtop2->getSortLink('top.cantor'); ?>" class="fonte11px_branca_negrito">Cantor</a> </th>
                        <th width="120" align="center" bgcolor="#3A9456">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtop2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td align="center"><input type="text" name="tfi_listtop2_top" id="tfi_listtop2_top" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtop2_top']); ?>" size="5" maxlength="5" /></td>
                          <td align="center"><input type="text" name="tfi_listtop2_musica" id="tfi_listtop2_musica" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtop2_musica']); ?>" size="20" maxlength="50" /></td>
                          <td align="center"><input type="text" name="tfi_listtop2_cantor" id="tfi_listtop2_cantor" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtop2_cantor']); ?>" size="20" maxlength="50" /></td>
                          <td align="center"><input type="submit" name="tfi_listtop2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rstop1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rstop1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_top" class="id_checkbox" value="<?php echo $row_rstop1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rstop1['id']; ?>" />                            </td>
                            <td align="center"><div class="KT_col_top"><?php echo KT_FormatForList($row_rstop1['top'], 20); ?></div></td>
                            <td align="center"><div class="KT_col_musica"><?php echo KT_FormatForList($row_rstop1['musica'], 20); ?></div></td>
                            <td align="center"><div class="KT_col_cantor"><?php echo KT_FormatForList($row_rstop1['cantor'], 20); ?></div></td>
                            <td align="center"><a class="KT_edit_link" href="top_add.php?id=<?php echo $row_rstop1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rstop1 = mysql_fetch_assoc($rstop1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listtop2->Prepare();
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
                    <a class="KT_additem_op_link" href="top_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#3A9456"><span class="fonte11px_branca_negrito">Painel de Controle Desenvolvido por Victor Caetano e Ded&eacute; Siqueira </span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rstop1);
?>
