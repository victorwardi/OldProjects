<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Filter
$tfi_listnoticia2 = new TFI_TableFilter($conn_victor, "tfi_listnoticia2");
$tfi_listnoticia2->addColumn("noticia.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listnoticia2->addColumn("noticia.data", "DATE_TYPE", "data", "=");
$tfi_listnoticia2->addColumn("noticia.imagem", "STRING_TYPE", "imagem", "%");
$tfi_listnoticia2->addColumn("noticia.id", "NUMERIC_TYPE", "id", "=");
$tfi_listnoticia2->Execute();

// Sorter
$tso_listnoticia2 = new TSO_TableSorter("rsnoticia1", "tso_listnoticia2");
$tso_listnoticia2->addColumn("noticia.titulo");
$tso_listnoticia2->addColumn("noticia.data");
$tso_listnoticia2->addColumn("noticia.imagem");
$tso_listnoticia2->addColumn("noticia.id");
$tso_listnoticia2->setDefault("noticia.id DESC");
$tso_listnoticia2->Execute();

// Navigation
$nav_listnoticia2 = new NAV_Regular("nav_listnoticia2", "rsnoticia1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsnoticia1 = $_SESSION['max_rows_nav_listnoticia2'];
$pageNum_rsnoticia1 = 0;
if (isset($_GET['pageNum_rsnoticia1'])) {
  $pageNum_rsnoticia1 = $_GET['pageNum_rsnoticia1'];
}
$startRow_rsnoticia1 = $pageNum_rsnoticia1 * $maxRows_rsnoticia1;

$NXTFilter_rsnoticia1 = "1=1";
if (isset($_SESSION['filter_tfi_listnoticia2'])) {
  $NXTFilter_rsnoticia1 = $_SESSION['filter_tfi_listnoticia2'];
}
$NXTSort_rsnoticia1 = "noticia.id DESC";
if (isset($_SESSION['sorter_tso_listnoticia2'])) {
  $NXTSort_rsnoticia1 = $_SESSION['sorter_tso_listnoticia2'];
}
mysql_select_db($database_victor, $victor);

$query_rsnoticia1 = sprintf("SELECT noticia.titulo, noticia.data, noticia.imagem, noticia.id FROM noticia WHERE %s ORDER BY %s", $NXTFilter_rsnoticia1, $NXTSort_rsnoticia1);
$query_limit_rsnoticia1 = sprintf("%s LIMIT %d, %d", $query_rsnoticia1, $startRow_rsnoticia1, $maxRows_rsnoticia1);
$rsnoticia1 = mysql_query($query_limit_rsnoticia1, $victor) or die(mysql_error());
$row_rsnoticia1 = mysql_fetch_assoc($rsnoticia1);

if (isset($_GET['totalRows_rsnoticia1'])) {
  $totalRows_rsnoticia1 = $_GET['totalRows_rsnoticia1'];
} else {
  $all_rsnoticia1 = mysql_query($query_rsnoticia1);
  $totalRows_rsnoticia1 = mysql_num_rows($all_rsnoticia1);
}
$totalPages_rsnoticia1 = ceil($totalRows_rsnoticia1/$maxRows_rsnoticia1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnoticia2->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../fotos/");
$objDynamicThumb1->setRenameRule("{rsnoticia1.imagem}");
$objDynamicThumb1->setResize(80, 60, false);
$objDynamicThumb1->setWatermark(false);
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
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_id {width:140px; overflow:hidden;}
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
          <td align="center"><span class="titulo">Noticia
              <?php
  $nav_listnoticia2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
          </span>
<div class="KT_tng" id="listnoticia2">
                <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listnoticia2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnoticia2'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listnoticia2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnoticia2'] == 1) {
?>
                              <a href="<?php echo $tfi_listnoticia2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listnoticia2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th id="titulo" class="KT_sorter KT_col_titulo <?php echo $tso_listnoticia2->getSortIcon('noticia.titulo'); ?>"> <a href="<?php echo $tso_listnoticia2->getSortLink('noticia.titulo'); ?>">Titulo</a> </th>
                        <th id="data" class="KT_sorter KT_col_data <?php echo $tso_listnoticia2->getSortIcon('noticia.data'); ?>"> <a href="<?php echo $tso_listnoticia2->getSortLink('noticia.data'); ?>">Data</a> </th>
                        <th id="imagem" class="KT_sorter KT_col_imagem <?php echo $tso_listnoticia2->getSortIcon('noticia.imagem'); ?>"> <a href="<?php echo $tso_listnoticia2->getSortLink('noticia.imagem'); ?>">Imagem</a> </th>
                        <th>&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnoticia2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listnoticia2_titulo" id="tfi_listnoticia2_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticia2_titulo']); ?>" size="40" maxlength="100" /></td>
                          <td><input type="text" name="tfi_listnoticia2_data" id="tfi_listnoticia2_data" value="<?php echo @$_SESSION['tfi_listnoticia2_data']; ?>" size="10" maxlength="22" /></td>
                          <td><input type="text" name="tfi_listnoticia2_imagem" id="tfi_listnoticia2_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticia2_imagem']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="submit" name="tfi_listnoticia2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsnoticia1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsnoticia1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_noticia" class="id_checkbox" value="<?php echo $row_rsnoticia1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsnoticia1['id']; ?>" />
                            </td>
                            <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsnoticia1['titulo'], 40); ?></div></td>
                            <td><div class="KT_col_data"><?php echo KT_formatDate($row_rsnoticia1['data']); ?></div></td>
                            <td align="center"><div class="KT_col_imagem"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><a class="KT_edit_link" href="not_add.php?id=<?php echo $row_rsnoticia1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsnoticia1 = mysql_fetch_assoc($rsnoticia1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <br />
                      <?php
            $nav_listnoticia2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
<br />
<br />
<br />
                    </div>
                  </div>
                  <div class="KT_bottombuttons"><span>&nbsp;</span>
                    <select name="no_new" id="no_new">
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="6">6</option>
                    </select>
                    <a class="KT_additem_op_link" href="not_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsnoticia1);
?>
