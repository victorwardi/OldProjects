<?php require_once('../../Connections/legion.php'); ?><?php
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
	
  $logoutGoTo = "../index.php";
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
$conn_legion = new KT_connection($legion, $database_legion);

// Filter
$tfi_listfotos2 = new TFI_TableFilter($conn_legion, "tfi_listfotos2");
$tfi_listfotos2->addColumn("fotos.galeria", "CHECKBOX_YN_TYPE", "galeria", "%");
$tfi_listfotos2->addColumn("fotos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listfotos2->addColumn("fotos.id_foto", "NUMERIC_TYPE", "id_foto", "=");
$tfi_listfotos2->addColumn("fotos.arquivo", "FILE_TYPE", "arquivo", "%");
$tfi_listfotos2->addColumn("fotos.descricao", "STRING_TYPE", "descricao", "%");
$tfi_listfotos2->addColumn("fotos.fotografo", "STRING_TYPE", "fotografo", "%");
$tfi_listfotos2->Execute();

// Sorter
$tso_listfotos2 = new TSO_TableSorter("rsfotos1", "tso_listfotos2");
$tso_listfotos2->addColumn("fotos.galeria");
$tso_listfotos2->addColumn("fotos.id");
$tso_listfotos2->addColumn("fotos.id_foto");
$tso_listfotos2->addColumn("fotos.arquivo");
$tso_listfotos2->addColumn("fotos.descricao");
$tso_listfotos2->addColumn("fotos.fotografo");
$tso_listfotos2->setDefault("fotos.id_foto DESC");
$tso_listfotos2->Execute();

// Navigation
$nav_listfotos2 = new NAV_Regular("nav_listfotos2", "rsfotos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotos1 = $_SESSION['max_rows_nav_listfotos2'];
$pageNum_rsfotos1 = 0;
if (isset($_GET['pageNum_rsfotos1'])) {
  $pageNum_rsfotos1 = $_GET['pageNum_rsfotos1'];
}
$startRow_rsfotos1 = $pageNum_rsfotos1 * $maxRows_rsfotos1;

$NXTFilter_rsfotos1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotos2'])) {
  $NXTFilter_rsfotos1 = $_SESSION['filter_tfi_listfotos2'];
}
$NXTSort_rsfotos1 = "fotos.id_foto DESC";
if (isset($_SESSION['sorter_tso_listfotos2'])) {
  $NXTSort_rsfotos1 = $_SESSION['sorter_tso_listfotos2'];
}
mysql_select_db($database_legion, $legion);

$query_rsfotos1 = sprintf("SELECT fotos.galeria, fotos.id, fotos.id_foto, fotos.arquivo, fotos.descricao, fotos.fotografo FROM fotos WHERE %s ORDER BY %s", $NXTFilter_rsfotos1, $NXTSort_rsfotos1);
$query_limit_rsfotos1 = sprintf("%s LIMIT %d, %d", $query_rsfotos1, $startRow_rsfotos1, $maxRows_rsfotos1);
$rsfotos1 = mysql_query($query_limit_rsfotos1, $legion) or die(mysql_error());
$row_rsfotos1 = mysql_fetch_assoc($rsfotos1);

if (isset($_GET['totalRows_rsfotos1'])) {
  $totalRows_rsfotos1 = $_GET['totalRows_rsfotos1'];
} else {
  $all_rsfotos1 = mysql_query($query_rsfotos1);
  $totalRows_rsfotos1 = mysql_num_rows($all_rsfotos1);
}
$totalPages_rsfotos1 = ceil($totalRows_rsfotos1/$maxRows_rsfotos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotos2->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - Legionn&aacute;rios</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
#navigation td {
	background-color: #4D494A;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #F7D957;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	padding-top: 8px;
	padding-right: 6px;
	padding-bottom: 8px;
	padding-left: 8px;
	}
	
#navigation a:hover {
	color:#FFCC00;
	background-color: #FFFFFF;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	font-weight: bolder;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
	font-weight: bolder;
	}
#conteudo td {
	left: 10px;
}
#tabela td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: normal;
	font-weight: bolder;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px solid #666666;
}
#tabela li {
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #666666;
	border-right-color: #666666;
	border-bottom-color: #666666;
	border-left-color: #666666;
}
.borda {
	border: 1px solid #000000;
}
.style1 {color: #F8D95A}
-->
</style>
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_galeria {width:140px; overflow:hidden;}
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_id_foto {width:140px; overflow:hidden;}
  .KT_col_arquivo {width:140px; overflow:hidden;}
  .KT_col_descricao {width:140px; overflow:hidden;}
  .KT_col_fotografo {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#4D494A"><img src="topo.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#4D494A"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#4D494A" class="titulo2">Not&iacute;cia</td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_add.php" class="style1">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td height="26" colspan="2"><span class="titulo2">Foto</span></td>
      </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Agenda</td>
      </tr>
      <tr>
        <td colspan="2"><a href="agenda_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="agenda_edite.php">Editar/Excluir</a></td>
        </tr>
      
      

    </table>
    <p><a href="../../index.php"><img src="sair.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td><a href="<?php echo $logoutAction ?>">
            <div class="KT_tng" id="listfotos2">
              <h1> Fotos
                <?php
  $nav_listfotos2->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listfotos2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotos2'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listfotos2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotos2'] == 1) {
?>
                              <a href="<?php echo $tfi_listfotos2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfotos2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th id="galeria" class="KT_sorter KT_col_galeria <?php echo $tso_listfotos2->getSortIcon('fotos.galeria'); ?>"> <a href="<?php echo $tso_listfotos2->getSortLink('fotos.galeria'); ?>">Galeria</a> </th>
                        <th id="arquivo" class="KT_sorter KT_col_arquivo <?php echo $tso_listfotos2->getSortIcon('fotos.arquivo'); ?>"> <a href="<?php echo $tso_listfotos2->getSortLink('fotos.arquivo'); ?>">Arquivo</a> </th>
                        <th id="descricao" class="KT_sorter KT_col_descricao <?php echo $tso_listfotos2->getSortIcon('fotos.descricao'); ?>"> <a href="<?php echo $tso_listfotos2->getSortLink('fotos.descricao'); ?>">Descricao</a> </th>
                        <th>&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotos2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listfotos2_galeria']),"Y"))) {echo "checked";} ?> type="checkbox" name="tfi_listfotos2_galeria" id="tfi_listfotos2_galeria" value="Y" /></td>
                          <td><input type="text" name="tfi_listfotos2_arquivo" id="tfi_listfotos2_arquivo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos2_arquivo']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listfotos2_descricao" id="tfi_listfotos2_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos2_descricao']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="submit" name="tfi_listfotos2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsfotos1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsfotos1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_fotos" class="id_checkbox" value="<?php echo $row_rsfotos1['id_foto']; ?>" />
                                <input type="hidden" name="id_foto" class="id_field" value="<?php echo $row_rsfotos1['id_foto']; ?>" />
                            </td>
                            <td><div class="KT_col_galeria"><?php echo KT_FormatForList($row_rsfotos1['galeria'], 20); ?></div></td>
                            <td align="center" valign="middle"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../fotos/", "{rsfotos1.arquivo}", 60, 42, false); ?>" /></td>
                            <td><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rsfotos1['descricao'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="fotos_add.php?id_foto=<?php echo $row_rsfotos1['id_foto']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsfotos1 = mysql_fetch_assoc($rsfotos1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listfotos2->Prepare();
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
                    <a class="KT_additem_op_link" href="fotos_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
            <p>&nbsp;</p>
          </td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#4D494A"><p><span class="style1"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  Legionnarios.com&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsfotos1);
?>
