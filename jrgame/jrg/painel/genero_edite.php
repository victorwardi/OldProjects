<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Filter
$tfi_listgenero4 = new TFI_TableFilter($conn_victor, "tfi_listgenero4");
$tfi_listgenero4->addColumn("genero.tipo", "STRING_TYPE", "tipo", "%");
$tfi_listgenero4->Execute();

// Sorter
$tso_listgenero4 = new TSO_TableSorter("rsgenero1", "tso_listgenero4");
$tso_listgenero4->addColumn("genero.tipo");
$tso_listgenero4->setDefault("genero.tipo");
$tso_listgenero4->Execute();

// Navigation
$nav_listgenero4 = new NAV_Regular("nav_listgenero4", "rsgenero1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsgenero1 = $_SESSION['max_rows_nav_listgenero4'];
$pageNum_rsgenero1 = 0;
if (isset($_GET['pageNum_rsgenero1'])) {
  $pageNum_rsgenero1 = $_GET['pageNum_rsgenero1'];
}
$startRow_rsgenero1 = $pageNum_rsgenero1 * $maxRows_rsgenero1;

$NXTFilter_rsgenero1 = "1=1";
if (isset($_SESSION['filter_tfi_listgenero4'])) {
  $NXTFilter_rsgenero1 = $_SESSION['filter_tfi_listgenero4'];
}
$NXTSort_rsgenero1 = "genero.tipo";
if (isset($_SESSION['sorter_tso_listgenero4'])) {
  $NXTSort_rsgenero1 = $_SESSION['sorter_tso_listgenero4'];
}
mysql_select_db($database_victor, $victor);

$query_rsgenero1 = sprintf("SELECT genero.tipo FROM genero WHERE %s ORDER BY %s", $NXTFilter_rsgenero1, $NXTSort_rsgenero1);
$query_limit_rsgenero1 = sprintf("%s LIMIT %d, %d", $query_rsgenero1, $startRow_rsgenero1, $maxRows_rsgenero1);
$rsgenero1 = mysql_query($query_limit_rsgenero1, $victor) or die(mysql_error());
$row_rsgenero1 = mysql_fetch_assoc($rsgenero1);

if (isset($_GET['totalRows_rsgenero1'])) {
  $totalRows_rsgenero1 = $_GET['totalRows_rsgenero1'];
} else {
  $all_rsgenero1 = mysql_query($query_rsgenero1);
  $totalRows_rsgenero1 = mysql_num_rows($all_rsgenero1);
}
$totalPages_rsgenero1 = ceil($totalRows_rsgenero1/$maxRows_rsgenero1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listgenero4->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - JrGames</title>
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
	background-color: #FFC904;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #000000;
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
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_tipo {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#FFC904"><img src="imagens/topoindex.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#FFC904"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#000000" class="titulo2">Filme</td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Not&iacute;cia</td>
      </tr>
      <tr>
        <td colspan="2"><a href="not_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_add.php">Adicionar Foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      
      <tr>
        <td height="30" colspan="2" class="titulo2">G&ecirc;nero</td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_edite.php">Editar/Excluir</a></td>
        </tr>
      
    </table>
    <p><a href="<?php echo $logoutAction ?>"><img src="imagens/logout.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td><span class="titulo">Genero
            <?php
  $nav_listgenero4->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
            </span>
<div class="KT_tng" id="listgenero4">
                <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listgenero4->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listgenero4'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listgenero4']; ?>
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
  if (@$_SESSION['has_filter_tfi_listgenero4'] == 1) {
?>
                              <a href="<?php echo $tfi_listgenero4->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listgenero4->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th id="tipo" class="KT_sorter KT_col_tipo <?php echo $tso_listgenero4->getSortIcon('genero.tipo'); ?>"> <a href="<?php echo $tso_listgenero4->getSortLink('genero.tipo'); ?>">Tipo</a> </th>
                        <th>&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listgenero4'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listgenero4_tipo" id="tfi_listgenero4_tipo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgenero4_tipo']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="submit" name="tfi_listgenero4" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsgenero1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="3"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsgenero1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_genero" class="id_checkbox" value="<?php echo $row_rsgenero1['tipo']; ?>" />
                                <input type="hidden" name="tipo" class="id_field" value="<?php echo $row_rsgenero1['tipo']; ?>" />                            </td>
                            <td><div class="KT_col_tipo"><?php echo KT_FormatForList($row_rsgenero1['tipo'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="genero_add.php?tipo=<?php echo $row_rsgenero1['tipo']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsgenero1 = mysql_fetch_assoc($rsgenero1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <br />
                  <br />
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listgenero4->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
<br />
<br />
<br />
                    </div>
                  </div>
                  <div class="KT_bottombuttons">
                    <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> <br />
                    <br />
                    <br />
                    </div>
                    <span>&nbsp;</span>
                    <select name="no_new" id="no_new">
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="6">6</option>
                    </select>
                    <a class="KT_additem_op_link" href="genero_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#FFC904"><p><span class="resultado_estatistica"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  JrGames VideoLocadora&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsgenero1);
?>
