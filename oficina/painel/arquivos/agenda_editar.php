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
$tfi_listagenda1 = new TFI_TableFilter($conn_ConBD, "tfi_listagenda1");
$tfi_listagenda1->addColumn("agenda.id", "NUMERIC_TYPE", "id", "=");
$tfi_listagenda1->addColumn("agenda.dia", "STRING_TYPE", "dia", "%");
$tfi_listagenda1->addColumn("agenda.semana", "STRING_TYPE", "semana", "%");
$tfi_listagenda1->addColumn("agenda.mes", "STRING_TYPE", "mes", "%");
$tfi_listagenda1->addColumn("agenda.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listagenda1->Execute();

// Sorter
$tso_listagenda1 = new TSO_TableSorter("rsagenda1", "tso_listagenda1");
$tso_listagenda1->addColumn("agenda.id");
$tso_listagenda1->addColumn("agenda.dia");
$tso_listagenda1->addColumn("agenda.semana");
$tso_listagenda1->addColumn("agenda.mes");
$tso_listagenda1->addColumn("agenda.titulo");
$tso_listagenda1->setDefault("agenda.id DESC");
$tso_listagenda1->Execute();

// Navigation
$nav_listagenda1 = new NAV_Regular("nav_listagenda1", "rsagenda1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsagenda1 = $_SESSION['max_rows_nav_listagenda1'];
$pageNum_rsagenda1 = 0;
if (isset($_GET['pageNum_rsagenda1'])) {
  $pageNum_rsagenda1 = $_GET['pageNum_rsagenda1'];
}
$startRow_rsagenda1 = $pageNum_rsagenda1 * $maxRows_rsagenda1;

// Defining List Recordset variable
$NXTFilter_rsagenda1 = "1=1";
if (isset($_SESSION['filter_tfi_listagenda1'])) {
  $NXTFilter_rsagenda1 = $_SESSION['filter_tfi_listagenda1'];
}
// Defining List Recordset variable
$NXTSort_rsagenda1 = "agenda.id DESC";
if (isset($_SESSION['sorter_tso_listagenda1'])) {
  $NXTSort_rsagenda1 = $_SESSION['sorter_tso_listagenda1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsagenda1 = "SELECT agenda.id, agenda.dia, agenda.semana, agenda.mes, agenda.titulo FROM agenda WHERE {$NXTFilter_rsagenda1} ORDER BY {$NXTSort_rsagenda1}";
$query_limit_rsagenda1 = sprintf("%s LIMIT %d, %d", $query_rsagenda1, $startRow_rsagenda1, $maxRows_rsagenda1);
$rsagenda1 = mysql_query($query_limit_rsagenda1, $ConBD) or die(mysql_error());
$row_rsagenda1 = mysql_fetch_assoc($rsagenda1);

if (isset($_GET['totalRows_rsagenda1'])) {
  $totalRows_rsagenda1 = $_GET['totalRows_rsagenda1'];
} else {
  $all_rsagenda1 = mysql_query($query_rsagenda1);
  $totalRows_rsagenda1 = mysql_num_rows($all_rsagenda1);
}
$totalPages_rsagenda1 = ceil($totalRows_rsagenda1/$maxRows_rsagenda1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listagenda1->checkBoundries();
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
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_dia {width:50px; overflow:hidden;}
  .KT_col_semana {width:50px; overflow:hidden;}
  .KT_col_mes {width:50px; overflow:hidden;}
  .KT_col_titulo {width:200px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Agenda</td>
        </tr>
        <tr>
          <td><span class="style2">&nbsp;
            </span>
            <div class="KT_tng" id="listagenda1">
              <h1><span class="style2"> Agenda
                <?php
  $nav_listagenda1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                </span></h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listagenda1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listagenda1'] == 1) {
?>
                          <?php echo $_SESSION['default_max_rows_nav_listagenda1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listagenda1'] == 1) {
?>
                  <a href="<?php echo $tfi_listagenda1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listagenda1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#008BE1"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#008BE1" class="KT_sorter KT_col_dia <?php echo $tso_listagenda1->getSortIcon('agenda.dia'); ?>" id="dia"> <a href="<?php echo $tso_listagenda1->getSortLink('agenda.dia'); ?>">Dia</a> </th>
                        <th align="center" bgcolor="#008BE1" class="KT_sorter KT_col_semana <?php echo $tso_listagenda1->getSortIcon('agenda.semana'); ?>" id="semana"> <a href="<?php echo $tso_listagenda1->getSortLink('agenda.semana'); ?>">Semana</a> </th>
                        <th align="center" bgcolor="#008BE1" class="KT_sorter KT_col_mes <?php echo $tso_listagenda1->getSortIcon('agenda.mes'); ?>" id="mes"> <a href="<?php echo $tso_listagenda1->getSortLink('agenda.mes'); ?>">Mes</a> </th>
                        <th align="center" bgcolor="#008BE1" class="KT_sorter KT_col_titulo <?php echo $tso_listagenda1->getSortIcon('agenda.titulo'); ?>" id="titulo"> <a href="<?php echo $tso_listagenda1->getSortLink('agenda.titulo'); ?>">Titulo</a> </th>
                        <th align="center" bgcolor="#008BE1">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listagenda1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><select name="tfi_listagenda1_dia" id="tfi_listagenda1_dia">
                              <option value="02" <?php if (!(strcmp(02, KT_escapeAttribute(@$_SESSION['tfi_listagenda1_dia'])))) {echo "SELECTED";} ?>>02</option>
                              <option value="" >item1</option>
                            </select>                          </td>
                          <td><select name="tfi_listagenda1_semana" id="tfi_listagenda1_semana">
                              <option value="02" <?php if (!(strcmp(02, KT_escapeAttribute(@$_SESSION['tfi_listagenda1_semana'])))) {echo "SELECTED";} ?>>item1</option>
                              <option value="" >item2</option>
                            </select>                          </td>
                          <td><select name="tfi_listagenda1_mes" id="tfi_listagenda1_mes">
                              <option value="jan" <?php if (!(strcmp("jan", KT_escapeAttribute(@$_SESSION['tfi_listagenda1_mes'])))) {echo "SELECTED";} ?>>Jan</option>
                            </select>                          </td>
                          <td><input type="text" name="tfi_listagenda1_titulo" id="tfi_listagenda1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listagenda1_titulo']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="submit" name="tfi_listagenda1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsagenda1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsagenda1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_agenda" class="id_checkbox" value="<?php echo $row_rsagenda1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsagenda1['id']; ?>" />                            </td>
                            <td><div class="KT_col_dia"><?php echo KT_FormatForList($row_rsagenda1['dia'], 10); ?></div></td>
                            <td><div class="KT_col_semana"><?php echo KT_FormatForList($row_rsagenda1['semana'], 10); ?></div></td>
                            <td><div class="KT_col_mes"><?php echo KT_FormatForList($row_rsagenda1['mes'], 10); ?></div></td>
                            <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsagenda1['titulo'], 50); ?></div></td>
                            <td><a class="KT_edit_link" href="agenda_inserir.php?id=<?php echo $row_rsagenda1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsagenda1 = mysql_fetch_assoc($rsagenda1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listagenda1->Prepare();
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
                    <a class="KT_additem_op_link" href="agenda_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsagenda1);
?>
