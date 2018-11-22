<?php require_once('../../Connections/CostaverdeFM.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

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
$tfi_listgaleria1 = new TFI_TableFilter($conn_CostaverdeFM, "tfi_listgaleria1");
$tfi_listgaleria1->addColumn("galeria.id", "NUMERIC_TYPE", "id", "=");
$tfi_listgaleria1->addColumn("galeria.nome", "STRING_TYPE", "nome", "%");
$tfi_listgaleria1->addColumn("galeria.imagem", "FILE_TYPE", "imagem", "%");
$tfi_listgaleria1->addColumn("galeria.data", "STRING_TYPE", "data", "%");
$tfi_listgaleria1->Execute();

// Sorter
$tso_listgaleria1 = new TSO_TableSorter("rsgaleria1", "tso_listgaleria1");
$tso_listgaleria1->addColumn("galeria.id");
$tso_listgaleria1->addColumn("galeria.nome");
$tso_listgaleria1->addColumn("galeria.imagem");
$tso_listgaleria1->addColumn("galeria.data");
$tso_listgaleria1->setDefault("galeria.id DESC");
$tso_listgaleria1->Execute();

// Navigation
$nav_listgaleria1 = new NAV_Regular("nav_listgaleria1", "rsgaleria1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsgaleria1 = $_SESSION['max_rows_nav_listgaleria1'];
$pageNum_rsgaleria1 = 0;
if (isset($_GET['pageNum_rsgaleria1'])) {
  $pageNum_rsgaleria1 = $_GET['pageNum_rsgaleria1'];
}
$startRow_rsgaleria1 = $pageNum_rsgaleria1 * $maxRows_rsgaleria1;

// Defining List Recordset variable
$NXTFilter_rsgaleria1 = "1=1";
if (isset($_SESSION['filter_tfi_listgaleria1'])) {
  $NXTFilter_rsgaleria1 = $_SESSION['filter_tfi_listgaleria1'];
}
// Defining List Recordset variable
$NXTSort_rsgaleria1 = "galeria.id DESC";
if (isset($_SESSION['sorter_tso_listgaleria1'])) {
  $NXTSort_rsgaleria1 = $_SESSION['sorter_tso_listgaleria1'];
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);

$query_rsgaleria1 = "SELECT galeria.id, galeria.nome, galeria.imagem, galeria.data FROM galeria WHERE {$NXTFilter_rsgaleria1} ORDER BY {$NXTSort_rsgaleria1}";
$query_limit_rsgaleria1 = sprintf("%s LIMIT %d, %d", $query_rsgaleria1, $startRow_rsgaleria1, $maxRows_rsgaleria1);
$rsgaleria1 = mysql_query($query_limit_rsgaleria1, $CostaverdeFM) or die(mysql_error());
$row_rsgaleria1 = mysql_fetch_assoc($rsgaleria1);

if (isset($_GET['totalRows_rsgaleria1'])) {
  $totalRows_rsgaleria1 = $_GET['totalRows_rsgaleria1'];
} else {
  $all_rsgaleria1 = mysql_query($query_rsgaleria1);
  $totalRows_rsgaleria1 = mysql_num_rows($all_rsgaleria1);
}
$totalPages_rsgaleria1 = ceil($totalRows_rsgaleria1/$maxRows_rsgaleria1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listgaleria1->checkBoundries();
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
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
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../../painel/topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/home.php">Home</a></th>
          </tr>
        </table></th>
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
            <th scope="col"><a href="../../painel/arquivos/foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/foto_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/galeria_edite.php">Modificar / Remover </a></th>
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
            <th scope="row"><a href="../../painel/arquivos/top_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/mp3_edite.php"> Modificar / Remover </a></th>
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
            <th scope="row"><a href="../../painel/arquivos/recados_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/ligado_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/promo_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/equipe_edite.php">Modificar / Remover </a></th>
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
            <th scope="col"><a href="../../painel/arquivos/programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/programa_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listgaleria1">
              <h1> Galeria
                <?php
  $nav_listgaleria1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listgaleria1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listgaleria1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listgaleria1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listgaleria1'] == 1) {
?>
                  <a href="<?php echo $tfi_listgaleria1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listgaleria1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#66CC66"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th bgcolor="#66CC66" class="KT_sorter KT_col_nome <?php echo $tso_listgaleria1->getSortIcon('galeria.nome'); ?>" id="nome"> <a href="<?php echo $tso_listgaleria1->getSortLink('galeria.nome'); ?>" class="fonte11px_branca_negrito">Nome</a> </th>
                        <th bgcolor="#66CC66" class="KT_sorter KT_col_imagem <?php echo $tso_listgaleria1->getSortIcon('galeria.imagem'); ?>" id="imagem"> <a href="<?php echo $tso_listgaleria1->getSortLink('galeria.imagem'); ?>" class="fonte11px_branca_negrito">Imagem</a> </th>
                        <th bgcolor="#66CC66" class="KT_sorter KT_col_data <?php echo $tso_listgaleria1->getSortIcon('galeria.data'); ?>" id="data"> <a href="<?php echo $tso_listgaleria1->getSortLink('galeria.data'); ?>" class="fonte11px_branca_negrito">Data</a> </th>
                        <th bgcolor="#66CC66">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listgaleria1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listgaleria1_nome" id="tfi_listgaleria1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria1_nome']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listgaleria1_imagem" id="tfi_listgaleria1_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria1_imagem']); ?>" size="20" maxlength="30" /></td>
                          <td><input type="text" name="tfi_listgaleria1_data" id="tfi_listgaleria1_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria1_data']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="submit" name="tfi_listgaleria1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsgaleria1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsgaleria1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_galeria" class="id_checkbox" value="<?php echo $row_rsgaleria1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsgaleria1['id']; ?>" />                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsgaleria1['nome'], 20); ?></div></td>
                            <td><div class="KT_col_imagem"><?php echo KT_FormatForList($row_rsgaleria1['imagem'], 20); ?></div></td>
                            <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsgaleria1['data'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="galeria_add.php?id=<?php echo $row_rsgaleria1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsgaleria1 = mysql_fetch_assoc($rsgaleria1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listgaleria1->Prepare();
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
                    <a class="KT_additem_op_link" href="galeria_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsgaleria1);
?>
