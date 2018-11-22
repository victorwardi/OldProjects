<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listperfil2 = new TFI_TableFilter($conn_saquabb, "tfi_listperfil2");
$tfi_listperfil2->addColumn("nome", "STRING_TYPE", "nome", "%");
$tfi_listperfil2->addColumn("data_nasc", "STRING_TYPE", "data_nasc", "%");
$tfi_listperfil2->addColumn("local_de", "STRING_TYPE", "local_de", "%");
$tfi_listperfil2->addColumn("atividades", "STRING_TYPE", "atividades", "%");
$tfi_listperfil2->addColumn("picos_preferidos", "STRING_TYPE", "picos_preferidos", "%");
$tfi_listperfil2->addColumn("idolo", "STRING_TYPE", "idolo", "%");
$tfi_listperfil2->addColumn("recado", "STRING_TYPE", "recado", "%");
$tfi_listperfil2->addColumn("filme", "STRING_TYPE", "filme", "%");
$tfi_listperfil2->addColumn("prancha", "STRING_TYPE", "prancha", "%");
$tfi_listperfil2->addColumn("pe_pato", "STRING_TYPE", "pe_pato", "%");
$tfi_listperfil2->addColumn("manobra", "STRING_TYPE", "manobra", "%");
$tfi_listperfil2->addColumn("tempo_de_bb", "STRING_TYPE", "tempo_de_bb", "%");
$tfi_listperfil2->addColumn("patrocinio", "STRING_TYPE", "patrocinio", "%");
$tfi_listperfil2->addColumn("foto", "STRING_TYPE", "foto", "%");
$tfi_listperfil2->addColumn("aprovado", "CHECKBOX_YN_TYPE", "aprovado", "%");
$tfi_listperfil2->Execute();

// Sorter
$tso_listperfil2 = new TSO_TableSorter("perfil", "tso_listperfil2");
$tso_listperfil2->addColumn("nome");
$tso_listperfil2->addColumn("data_nasc");
$tso_listperfil2->addColumn("local_de");
$tso_listperfil2->addColumn("atividades");
$tso_listperfil2->addColumn("picos_preferidos");
$tso_listperfil2->addColumn("idolo");
$tso_listperfil2->addColumn("recado");
$tso_listperfil2->addColumn("filme");
$tso_listperfil2->addColumn("prancha");
$tso_listperfil2->addColumn("pe_pato");
$tso_listperfil2->addColumn("manobra");
$tso_listperfil2->addColumn("tempo_de_bb");
$tso_listperfil2->addColumn("patrocinio");
$tso_listperfil2->addColumn("foto");
$tso_listperfil2->addColumn("aprovado");
$tso_listperfil2->setDefault("nome");
$tso_listperfil2->Execute();

// Navigation
$nav_listperfil2 = new NAV_Regular("nav_listperfil2", "perfil", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_perfil = $_SESSION['max_rows_nav_listperfil2'];
$pageNum_perfil = 0;
if (isset($_GET['pageNum_perfil'])) {
  $pageNum_perfil = $_GET['pageNum_perfil'];
}
$startRow_perfil = $pageNum_perfil * $maxRows_perfil;

$NXTFilter_perfil = "1=1";
if (isset($_SESSION['filter_tfi_listperfil2'])) {
  $NXTFilter_perfil = $_SESSION['filter_tfi_listperfil2'];
}
$NXTSort_perfil = "nome";
if (isset($_SESSION['sorter_tso_listperfil2'])) {
  $NXTSort_perfil = $_SESSION['sorter_tso_listperfil2'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_perfil = sprintf("SELECT * FROM perfil WHERE %s ORDER BY %s ASC ", $NXTFilter_perfil,$NXTSort_perfil);
$query_limit_perfil = sprintf("%s LIMIT %d, %d", $query_perfil, $startRow_perfil, $maxRows_perfil);
$perfil = mysql_query($query_limit_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);

if (isset($_GET['totalRows_perfil'])) {
  $totalRows_perfil = $_GET['totalRows_perfil'];
} else {
  $all_perfil = mysql_query($query_perfil);
  $totalRows_perfil = mysql_num_rows($all_perfil);
}
$totalPages_perfil = ceil($totalRows_perfil/$maxRows_perfil)-1;
//End NeXTenesio3 Special List Recordset

$nav_listperfil2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_manobra {width:70px; overflow:hidden;}
  .KT_col_filme {width:70px; overflow:hidden;}
  .KT_col_atividades {width:70px; overflow:hidden;}
  .KT_col_idolo {width:70px; overflow:hidden;}
  .KT_col_recado {width:105px; overflow:hidden;}
  .KT_col_data_nasc {width:42px; overflow:hidden;}
  .KT_col_local_de {width:70px; overflow:hidden;}
  .KT_col_picos_preferidos {width:70px; overflow:hidden;}
  .KT_col_prancha {width:56px; overflow:hidden;}
  .KT_col_pe_pato {width:42px; overflow:hidden;}
  .KT_col_tempo_de_bb {width:56px; overflow:hidden;}
  .KT_col_patrocinio {width:70px; overflow:hidden;}
  .KT_col_foto {width:70px; overflow:hidden;}
  .KT_col_aprovado {width:21px; overflow:hidden;}
.style1 {font-size: 10px}
</style>
</head>

<body>
<div class="KT_tng" id="listperfil2">
  <h1> Perfil
    <?php
  $nav_listperfil2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listperfil2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listperfil2'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listperfil2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listperfil2'] == 1) {
?>
                              <a href="<?php echo $tfi_listperfil2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listperfil2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listperfil2->getSortIcon('nome'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('nome'); ?>">Nome</a> </th>
            <th id="data_nasc" class="KT_sorter KT_col_data_nasc <?php echo $tso_listperfil2->getSortIcon('data_nasc'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('data_nasc'); ?>">Data_nasc</a> </th>
            <th id="local_de" class="KT_sorter KT_col_local_de <?php echo $tso_listperfil2->getSortIcon('local_de'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('local_de'); ?>">Local_de</a> </th>
            <th id="atividades" class="KT_sorter KT_col_atividades <?php echo $tso_listperfil2->getSortIcon('atividades'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('atividades'); ?>">Atividades</a></th>
            <th id="picos_preferidos" class="KT_sorter KT_col_picos_preferidos <?php echo $tso_listperfil2->getSortIcon('picos_preferidos'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('picos_preferidos'); ?>">Picos_preferidos</a> </th>
            <th id="idolo" class="KT_sorter KT_col_idolo <?php echo $tso_listperfil2->getSortIcon('idolo'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('idolo'); ?>">Idolo</a></th>
            <th id="recado" class="KT_sorter KT_col_recado <?php echo $tso_listperfil2->getSortIcon('recado'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('recado'); ?>">Recado</a></th>
            <th id="filme" class="KT_sorter KT_col_filme <?php echo $tso_listperfil2->getSortIcon('filme'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('filme'); ?>">Filme</a></th>
            <th id="prancha" class="KT_sorter KT_col_prancha <?php echo $tso_listperfil2->getSortIcon('prancha'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('prancha'); ?>">Prancha</a> </th>
            <th id="pe_pato" class="KT_sorter KT_col_pe_pato <?php echo $tso_listperfil2->getSortIcon('pe_pato'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('pe_pato'); ?>">Pe_pato</a> </th>
            <th id="manobra" class="KT_sorter KT_col_manobra <?php echo $tso_listperfil2->getSortIcon('manobra'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('manobra'); ?>">Manobra</a></th>
            <th id="tempo_de_bb" class="KT_sorter KT_col_tempo_de_bb <?php echo $tso_listperfil2->getSortIcon('tempo_de_bb'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('tempo_de_bb'); ?>">Tempo_de_bb</a> </th>
            <th id="patrocinio" class="KT_sorter KT_col_patrocinio <?php echo $tso_listperfil2->getSortIcon('patrocinio'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('patrocinio'); ?>">Patrocinio</a> </th>
            <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listperfil2->getSortIcon('foto'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('foto'); ?>" class="style1">Foto</a> </th>
            <th id="aprovado" class="KT_sorter KT_col_aprovado <?php echo $tso_listperfil2->getSortIcon('aprovado'); ?>"> <a href="<?php echo $tso_listperfil2->getSortLink('aprovado'); ?>">mostrar</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listperfil2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listperfil2_nome" id="tfi_listperfil2_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_nome']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_data_nasc" id="tfi_listperfil2_data_nasc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_data_nasc']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_local_de" id="tfi_listperfil2_local_de" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_local_de']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_atividades" id="tfi_listperfil2_atividades" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_atividades']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_picos_preferidos" id="tfi_listperfil2_picos_preferidos" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_picos_preferidos']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_idolo" id="tfi_listperfil2_idolo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_idolo']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_recado" id="tfi_listperfil2_recado" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_recado']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_filme" id="tfi_listperfil2_filme" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_filme']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_prancha" id="tfi_listperfil2_prancha" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_prancha']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_pe_pato" id="tfi_listperfil2_pe_pato" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_pe_pato']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_manobra" id="tfi_listperfil2_manobra" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_manobra']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listperfil2_tempo_de_bb" id="tfi_listperfil2_tempo_de_bb" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_tempo_de_bb']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_patrocinio" id="tfi_listperfil2_patrocinio" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_patrocinio']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listperfil2_foto" id="tfi_listperfil2_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listperfil2_foto']); ?>" size="20" maxlength="50" /></td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listperfil2_aprovado']),"Y"))) {echo "checked";} ?> type="checkbox" name="tfi_listperfil2_aprovado" id="tfi_listperfil2_aprovado" value="Y" /></td>
              <td><input type="submit" name="tfi_listperfil2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_perfil == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="17"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_perfil > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_perfil" class="id_checkbox" value="<?php echo $row_perfil['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_perfil['id']; ?>" />                </td>
                <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_perfil['nome'], 20); ?></div></td>
                <td><div class="KT_col_data_nasc"><?php echo KT_FormatForList($row_perfil['data_nasc'], 6); ?></div></td>
                <td><div class="KT_col_local_de"><?php echo KT_FormatForList($row_perfil['local_de'], 10); ?></div></td>
                <td><div class="KT_col_atividades"><?php echo KT_FormatForList($row_perfil['atividades'], 10); ?></div></td>
                <td><div class="KT_col_picos_preferidos"><?php echo KT_FormatForList($row_perfil['picos_preferidos'], 10); ?></div></td>
                <td><div class="KT_col_idolo"><?php echo KT_FormatForList($row_perfil['idolo'], 10); ?></div></td>
                <td><div class="KT_col_recado"><?php echo KT_FormatForList($row_perfil['recado'], 15); ?></div></td>
                <td><div class="KT_col_filme"><?php echo KT_FormatForList($row_perfil['filme'], 10); ?></div></td>
                <td><div class="KT_col_prancha"><?php echo KT_FormatForList($row_perfil['prancha'], 8); ?></div></td>
                <td><div class="KT_col_pe_pato"><?php echo KT_FormatForList($row_perfil['pe_pato'], 6); ?></div></td>
                <td><div class="KT_col_manobra"><?php echo KT_FormatForList($row_perfil['manobra'], 10); ?></div></td>
                <td><div class="KT_col_tempo_de_bb"><?php echo KT_FormatForList($row_perfil['tempo_de_bb'], 8); ?></div></td>
                <td><div class="KT_col_patrocinio"><?php echo KT_FormatForList($row_perfil['patrocinio'], 10); ?></div></td>
                <td><div class="KT_col_foto"><?php echo KT_FormatForList($row_perfil['foto'], 10); ?></div></td>
                <td><div class="KT_col_aprovado"><?php echo KT_FormatForList($row_perfil['aprovado'], 3); ?></div></td>
                <td><a class="KT_edit_link" href="atletas.php?id=<?php echo $row_perfil['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_perfil = mysql_fetch_assoc($perfil)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listperfil2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
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
        <a class="KT_additem_op_link" href="atletas.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($perfil);
?>
