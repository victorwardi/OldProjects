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

// Filter
$tfi_listcomentarios1 = new TFI_TableFilter($conn_CostaverdeFM, "tfi_listcomentarios1");
$tfi_listcomentarios1->addColumn("comentarios.id_coment", "NUMERIC_TYPE", "id_coment", "=");
$tfi_listcomentarios1->addColumn("comentarios.de", "STRING_TYPE", "de", "%");
$tfi_listcomentarios1->addColumn("comentarios.para", "STRING_TYPE", "para", "%");
$tfi_listcomentarios1->addColumn("comentarios.comentario", "STRING_TYPE", "comentario", "%");
$tfi_listcomentarios1->addColumn("comentarios.aprovado", "STRING_TYPE", "aprovado", "%");
$tfi_listcomentarios1->Execute();

// Sorter
$tso_listcomentarios1 = new TSO_TableSorter("rscomentarios1", "tso_listcomentarios1");
$tso_listcomentarios1->addColumn("comentarios.id_coment");
$tso_listcomentarios1->addColumn("comentarios.de");
$tso_listcomentarios1->addColumn("comentarios.para");
$tso_listcomentarios1->addColumn("comentarios.comentario");
$tso_listcomentarios1->addColumn("comentarios.aprovado");
$tso_listcomentarios1->setDefault("comentarios.id_coment DESC");
$tso_listcomentarios1->Execute();

// Navigation
$nav_listcomentarios1 = new NAV_Regular("nav_listcomentarios1", "rscomentarios1", "../../", $_SERVER['PHP_SELF'], 12);

//NeXTenesio3 Special List Recordset
$maxRows_rscomentarios1 = $_SESSION['max_rows_nav_listcomentarios1'];
$pageNum_rscomentarios1 = 0;
if (isset($_GET['pageNum_rscomentarios1'])) {
  $pageNum_rscomentarios1 = $_GET['pageNum_rscomentarios1'];
}
$startRow_rscomentarios1 = $pageNum_rscomentarios1 * $maxRows_rscomentarios1;

$NXTFilter_rscomentarios1 = "1=1";
if (isset($_SESSION['filter_tfi_listcomentarios1'])) {
  $NXTFilter_rscomentarios1 = $_SESSION['filter_tfi_listcomentarios1'];
}
$NXTSort_rscomentarios1 = "comentarios.id_coment DESC";
if (isset($_SESSION['sorter_tso_listcomentarios1'])) {
  $NXTSort_rscomentarios1 = $_SESSION['sorter_tso_listcomentarios1'];
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);

$query_rscomentarios1 = sprintf("SELECT comentarios.id_coment, comentarios.de, comentarios.para, comentarios.comentario, comentarios.aprovado FROM comentarios WHERE %s ORDER BY %s", $NXTFilter_rscomentarios1, $NXTSort_rscomentarios1);
$query_limit_rscomentarios1 = sprintf("%s LIMIT %d, %d", $query_rscomentarios1, $startRow_rscomentarios1, $maxRows_rscomentarios1);
$rscomentarios1 = mysql_query($query_limit_rscomentarios1, $CostaverdeFM) or die(mysql_error());
$row_rscomentarios1 = mysql_fetch_assoc($rscomentarios1);

if (isset($_GET['totalRows_rscomentarios1'])) {
  $totalRows_rscomentarios1 = $_GET['totalRows_rscomentarios1'];
} else {
  $all_rscomentarios1 = mysql_query($query_rscomentarios1);
  $totalRows_rscomentarios1 = mysql_num_rows($all_rscomentarios1);
}
$totalPages_rscomentarios1 = ceil($totalRows_rscomentarios1/$maxRows_rscomentarios1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcomentarios1->checkBoundries();
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
  .KT_col_id_coment {width:140px; overflow:hidden;}
  .KT_col_de {width:140px; overflow:hidden;}
  .KT_col_para {width:140px; overflow:hidden;}
  .KT_col_comentario {width:140px; overflow:hidden;}
  .KT_col_aprovado {width:140px; overflow:hidden;}
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
            <th scope="row"><a href="promo_edite.php">Modificar / Remover </a></th>
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
            <th scope="row"><a href="equipe_edite.php">Modificar / Remover </a></th>
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
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listcomentarios1">
              <table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
                <tr>
                  <th height="27" align="left" scope="col">Recados  - Modificar / Remover </th>
                </tr>
              </table>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listcomentarios1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcomentarios1'] == 1) {
?>
                          <?php echo $_SESSION['default_max_rows_nav_listcomentarios1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcomentarios1'] == 1) {
?>
                              <a href="<?php echo $tfi_listcomentarios1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listcomentarios1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#66CC66"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#66CC66" class="KT_sorter KT_col_de <?php echo $tso_listcomentarios1->getSortIcon('comentarios.de'); ?>" id="de"> <a href="<?php echo $tso_listcomentarios1->getSortLink('comentarios.de'); ?>" class="fonte11px_branca_negrito">De</a> </th>
                        <th align="center" bgcolor="#66CC66" class="KT_sorter KT_col_comentario <?php echo $tso_listcomentarios1->getSortIcon('comentarios.comentario'); ?>" id="comentario"> <a href="<?php echo $tso_listcomentarios1->getSortLink('comentarios.comentario'); ?>" class="fonte11px_branca_negrito">Comentario</a> </th>
                        <th align="center" bgcolor="#66CC66" class="KT_sorter KT_col_aprovado <?php echo $tso_listcomentarios1->getSortIcon('comentarios.aprovado'); ?>" id="aprovado"> <a href="<?php echo $tso_listcomentarios1->getSortLink('comentarios.aprovado'); ?>" class="fonte11px_branca_negrito">Aprovado</a> </th>
                        <th bgcolor="#66CC66">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcomentarios1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listcomentarios1_de" id="tfi_listcomentarios1_de" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios1_de']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listcomentarios1_comentario" id="tfi_listcomentarios1_comentario" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios1_comentario']); ?>" size="20" maxlength="100" /></td>
                          <td><input type="text" name="tfi_listcomentarios1_aprovado" id="tfi_listcomentarios1_aprovado" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios1_aprovado']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="submit" name="tfi_listcomentarios1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rscomentarios1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rscomentarios1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_comentarios" class="id_checkbox" value="<?php echo $row_rscomentarios1['id_coment']; ?>" />
                                <input type="hidden" name="id_coment" class="id_field" value="<?php echo $row_rscomentarios1['id_coment']; ?>" />                            </td>
                            <td><div class="KT_col_de"><?php echo KT_FormatForList($row_rscomentarios1['de'], 20); ?></div></td>
                            <td><div class="KT_col_comentario"><?php echo KT_FormatForList($row_rscomentarios1['comentario'], 20); ?></div></td>
                            <td><div class="KT_col_aprovado"><?php echo KT_FormatForList($row_rscomentarios1['aprovado'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="recados_add.php?id_coment=<?php echo $row_rscomentarios1['id_coment']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rscomentarios1 = mysql_fetch_assoc($rscomentarios1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listcomentarios1->Prepare();
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
                    <a class="KT_additem_op_link" href="recados_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rscomentarios1);
?>
