<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
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

// Filter
$tfi_listnovidades2 = new TFI_TableFilter($conn_ConBD, "tfi_listnovidades2");
$tfi_listnovidades2->addColumn("novidades.id", "NUMERIC_TYPE", "id", "=");
$tfi_listnovidades2->addColumn("novidades.imagem", "FILE_TYPE", "imagem", "%");
$tfi_listnovidades2->addColumn("novidades.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listnovidades2->addColumn("novidades.data", "STRING_TYPE", "data", "%");
$tfi_listnovidades2->Execute();

// Sorter
$tso_listnovidades2 = new TSO_TableSorter("rsnovidades1", "tso_listnovidades2");
$tso_listnovidades2->addColumn("novidades.id");
$tso_listnovidades2->addColumn("novidades.imagem");
$tso_listnovidades2->addColumn("novidades.titulo");
$tso_listnovidades2->addColumn("novidades.data");
$tso_listnovidades2->setDefault("novidades.id DESC");
$tso_listnovidades2->Execute();

// Navigation
$nav_listnovidades2 = new NAV_Regular("nav_listnovidades2", "rsnovidades1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsnovidades1 = $_SESSION['max_rows_nav_listnovidades2'];
$pageNum_rsnovidades1 = 0;
if (isset($_GET['pageNum_rsnovidades1'])) {
  $pageNum_rsnovidades1 = $_GET['pageNum_rsnovidades1'];
}
$startRow_rsnovidades1 = $pageNum_rsnovidades1 * $maxRows_rsnovidades1;

$NXTFilter_rsnovidades1 = "1=1";
if (isset($_SESSION['filter_tfi_listnovidades2'])) {
  $NXTFilter_rsnovidades1 = $_SESSION['filter_tfi_listnovidades2'];
}
$NXTSort_rsnovidades1 = "novidades.id DESC";
if (isset($_SESSION['sorter_tso_listnovidades2'])) {
  $NXTSort_rsnovidades1 = $_SESSION['sorter_tso_listnovidades2'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsnovidades1 = sprintf("SELECT novidades.id, novidades.imagem, novidades.titulo, novidades.data FROM novidades WHERE %s ORDER BY %s", $NXTFilter_rsnovidades1, $NXTSort_rsnovidades1);
$query_limit_rsnovidades1 = sprintf("%s LIMIT %d, %d", $query_rsnovidades1, $startRow_rsnovidades1, $maxRows_rsnovidades1);
$rsnovidades1 = mysql_query($query_limit_rsnovidades1, $ConBD) or die(mysql_error());
$row_rsnovidades1 = mysql_fetch_assoc($rsnovidades1);

if (isset($_GET['totalRows_rsnovidades1'])) {
  $totalRows_rsnovidades1 = $_GET['totalRows_rsnovidades1'];
} else {
  $all_rsnovidades1 = mysql_query($query_rsnovidades1);
  $totalRows_rsnovidades1 = mysql_num_rows($all_rsnovidades1);
}
$totalPages_rsnovidades1 = ceil($totalRows_rsnovidades1/$maxRows_rsnovidades1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnovidades2->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{rsnovidades1.imagem}");
$objDynamicThumb1->setResize(80, 0, true);
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

<link href="../../css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
	color: #75CCF0;
}
-->
</style>
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFF66">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Eventos</td>
      </tr>
      <tr>
        <td><a href="evento_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="evento_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Promo&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="promo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="promo_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Enquete</td>
      </tr>
      <tr>
        <td><a href="enquete_titulo_add.php?ID=1">Editar titulo da Enquete </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_inserir.php">Inserir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_editar.php">Editar/Excluir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
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
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
      </script>
      <style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Editar/Excluir Novidade </td>
        </tr>
        <tr>
          <td><div class="KT_tng" id="listnovidades2">
            <h1 class="txt_padrao">Novidades
                <?php
  $nav_listnovidades2->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listnovidades2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnovidades2'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listnovidades2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnovidades2'] == 1) {
?>
                              <a href="<?php echo $tfi_listnovidades2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listnovidades2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" valign="middle" bgcolor="#3333FF"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" valign="middle" bgcolor="#3333FF" class="KT_sorter KT_col_imagem <?php echo $tso_listnovidades2->getSortIcon('novidades.imagem'); ?>" id="imagem"> <a href="<?php echo $tso_listnovidades2->getSortLink('novidades.imagem'); ?>">Imagem</a> </th>
                        <th align="center" valign="middle" bgcolor="#3333FF" class="KT_sorter KT_col_titulo <?php echo $tso_listnovidades2->getSortIcon('novidades.titulo'); ?>" id="titulo"> <a href="<?php echo $tso_listnovidades2->getSortLink('novidades.titulo'); ?>">Titulo</a> </th>
                        <th align="center" valign="middle" bgcolor="#3333FF" class="KT_sorter KT_col_data <?php echo $tso_listnovidades2->getSortIcon('novidades.data'); ?>" id="data"> <a href="<?php echo $tso_listnovidades2->getSortLink('novidades.data'); ?>">Data</a> </th>
                        <th align="center" valign="middle" bgcolor="#3333FF">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnovidades2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listnovidades2_imagem" id="tfi_listnovidades2_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnovidades2_imagem']); ?>" size="20" maxlength="30" /></td>
                          <td><input type="text" name="tfi_listnovidades2_titulo" id="tfi_listnovidades2_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnovidades2_titulo']); ?>" size="20" maxlength="200" /></td>
                          <td><input type="text" name="tfi_listnovidades2_data" id="tfi_listnovidades2_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnovidades2_data']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="submit" name="tfi_listnovidades2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsnovidades1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsnovidades1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_novidades" class="id_checkbox" value="<?php echo $row_rsnovidades1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsnovidades1['id']; ?>" />
                            </td>
                            <td><div class="KT_col_imagem"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsnovidades1['titulo'], 20); ?></div></td>
                            <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsnovidades1['data'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="novidade_inserir.php?id=<?php echo $row_rsnovidades1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsnovidades1 = mysql_fetch_assoc($rsnovidades1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listnovidades2->Prepare();
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
                    <a class="KT_additem_op_link" href="novidade_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por: Lobster Designer" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsnovidades1);
?>
