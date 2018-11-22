<?php require_once('../../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listvideos2 = new TFI_TableFilter($conn_saquabb, "tfi_listvideos2");
$tfi_listvideos2->addColumn("videos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listvideos2->addColumn("videos.capa", "FILE_TYPE", "capa", "%");
$tfi_listvideos2->addColumn("videos.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listvideos2->Execute();

// Sorter
$tso_listvideos2 = new TSO_TableSorter("rsvideos1", "tso_listvideos2");
$tso_listvideos2->addColumn("videos.id");
$tso_listvideos2->addColumn("videos.capa");
$tso_listvideos2->addColumn("videos.titulo");
$tso_listvideos2->setDefault("videos.id DESC");
$tso_listvideos2->Execute();

// Navigation
$nav_listvideos2 = new NAV_Regular("nav_listvideos2", "rsvideos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsvideos1 = $_SESSION['max_rows_nav_listvideos2'];
$pageNum_rsvideos1 = 0;
if (isset($_GET['pageNum_rsvideos1'])) {
  $pageNum_rsvideos1 = $_GET['pageNum_rsvideos1'];
}
$startRow_rsvideos1 = $pageNum_rsvideos1 * $maxRows_rsvideos1;

$NXTFilter_rsvideos1 = "1=1";
if (isset($_SESSION['filter_tfi_listvideos2'])) {
  $NXTFilter_rsvideos1 = $_SESSION['filter_tfi_listvideos2'];
}
$NXTSort_rsvideos1 = "videos.id DESC";
if (isset($_SESSION['sorter_tso_listvideos2'])) {
  $NXTSort_rsvideos1 = $_SESSION['sorter_tso_listvideos2'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsvideos1 = sprintf("SELECT videos.id, videos.capa, videos.titulo FROM videos WHERE %s ORDER BY %s", $NXTFilter_rsvideos1, $NXTSort_rsvideos1);
$query_limit_rsvideos1 = sprintf("%s LIMIT %d, %d", $query_rsvideos1, $startRow_rsvideos1, $maxRows_rsvideos1);
$rsvideos1 = mysql_query($query_limit_rsvideos1, $saquabb) or die(mysql_error());
$row_rsvideos1 = mysql_fetch_assoc($rsvideos1);

if (isset($_GET['totalRows_rsvideos1'])) {
  $totalRows_rsvideos1 = $_GET['totalRows_rsvideos1'];
} else {
  $all_rsvideos1 = mysql_query($query_rsvideos1);
  $totalRows_rsvideos1 = mysql_num_rows($all_rsvideos1);
}
$totalPages_rsvideos1 = ceil($totalRows_rsvideos1/$maxRows_rsvideos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listvideos2->checkBoundries();
?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/controle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: Painel de controle Saquabb ::</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<link href="painel.css" rel="stylesheet" type="text/css" />
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
  .KT_col_capa {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="800" border="1" align="center" cellpadding="4" cellspacing="8" bordercolor="#EA8C06" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#FFFFFF" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#FFFFFF" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EA8C06" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#EA8C06" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto Destaque </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Not&iacute;cia</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Categoria </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Galeria</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">V&iacute;deos</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Perfil</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Coment&aacute;rios</span></th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><p class="style1">Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#7FA14D" scope="row"><span class="style1">Logout</span></th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th bgcolor="#7FA14D" scope="row">&nbsp;</th>
      </tr>
      
      
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#EA8C06" class="Titulo_Branco" scope="col">Video</th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row"><div class="KT_tng" id="listvideos2"><div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listvideos2'] == 1) {
?>
                              <a href="<?php echo $tfi_listvideos2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listvideos2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table border="1" cellpadding="2" cellspacing="0" bordercolor="#EA8C06" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#EA8C06"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_capa <?php echo $tso_listvideos2->getSortIcon('videos.capa'); ?>" id="capa"> <a href="<?php echo $tso_listvideos2->getSortLink('videos.capa'); ?>">Capa</a> </th>
                        <th align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_titulo <?php echo $tso_listvideos2->getSortIcon('videos.titulo'); ?>" id="titulo"> <a href="<?php echo $tso_listvideos2->getSortLink('videos.titulo'); ?>">Titulo</a> </th>
                        <th align="center" bgcolor="#EA8C06">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listvideos2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listvideos2_capa" id="tfi_listvideos2_capa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvideos2_capa']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listvideos2_titulo" id="tfi_listvideos2_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvideos2_titulo']); ?>" size="20" maxlength="100" /></td>
                          <td><input type="submit" name="tfi_listvideos2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsvideos1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsvideos1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td align="center"><input type="checkbox" name="kt_pk_videos" class="id_checkbox" value="<?php echo $row_rsvideos1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsvideos1['id']; ?>" />                            </td>
                            <td align="center"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsvideos1.capa}", 80, 0, true); ?>" /></td>
                            <td align="center"><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsvideos1['titulo'], 20); ?></div></td>
                            <td align="center"><a class="KT_edit_link" href="video_add.php?id=<?php echo $row_rsvideos1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsvideos1 = mysql_fetch_assoc($rsvideos1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listvideos2->Prepare();
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
                    <a class="KT_additem_op_link" href="video_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <th height="40" colspan="2" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Painel Administrativo desenvolvido por: Victor Caetano </th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsvideos1);
?>
