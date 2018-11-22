<?php require_once('../../Connections/saquabb.php'); ?>
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

$MM_restrictGoTo = "../index.php";
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

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listvem_ai5 = new TFI_TableFilter($conn_saquabb, "tfi_listvem_ai5");
$tfi_listvem_ai5->addColumn("vem_ai.id", "NUMERIC_TYPE", "id", "=");
$tfi_listvem_ai5->addColumn("vem_ai.flyer", "STRING_TYPE", "flyer", "%");
$tfi_listvem_ai5->addColumn("vem_ai.nome", "STRING_TYPE", "nome", "%");
$tfi_listvem_ai5->Execute();

// Sorter
$tso_listvem_ai5 = new TSO_TableSorter("rsvem_ai1", "tso_listvem_ai5");
$tso_listvem_ai5->addColumn("vem_ai.id");
$tso_listvem_ai5->addColumn("vem_ai.flyer");
$tso_listvem_ai5->addColumn("vem_ai.nome");
$tso_listvem_ai5->setDefault("vem_ai.id DESC");
$tso_listvem_ai5->Execute();

// Navigation
$nav_listvem_ai5 = new NAV_Regular("nav_listvem_ai5", "rsvem_ai1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsvem_ai1 = $_SESSION['max_rows_nav_listvem_ai5'];
$pageNum_rsvem_ai1 = 0;
if (isset($_GET['pageNum_rsvem_ai1'])) {
  $pageNum_rsvem_ai1 = $_GET['pageNum_rsvem_ai1'];
}
$startRow_rsvem_ai1 = $pageNum_rsvem_ai1 * $maxRows_rsvem_ai1;

$NXTFilter_rsvem_ai1 = "1=1";
if (isset($_SESSION['filter_tfi_listvem_ai5'])) {
  $NXTFilter_rsvem_ai1 = $_SESSION['filter_tfi_listvem_ai5'];
}
$NXTSort_rsvem_ai1 = "vem_ai.id DESC";
if (isset($_SESSION['sorter_tso_listvem_ai5'])) {
  $NXTSort_rsvem_ai1 = $_SESSION['sorter_tso_listvem_ai5'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsvem_ai1 = sprintf("SELECT vem_ai.id, vem_ai.flyer, vem_ai.nome FROM vem_ai WHERE %s ORDER BY %s", $NXTFilter_rsvem_ai1, $NXTSort_rsvem_ai1);
$query_limit_rsvem_ai1 = sprintf("%s LIMIT %d, %d", $query_rsvem_ai1, $startRow_rsvem_ai1, $maxRows_rsvem_ai1);
$rsvem_ai1 = mysql_query($query_limit_rsvem_ai1, $saquabb) or die(mysql_error());
$row_rsvem_ai1 = mysql_fetch_assoc($rsvem_ai1);

if (isset($_GET['totalRows_rsvem_ai1'])) {
  $totalRows_rsvem_ai1 = $_GET['totalRows_rsvem_ai1'];
} else {
  $all_rsvem_ai1 = mysql_query($query_rsvem_ai1);
  $totalRows_rsvem_ai1 = mysql_num_rows($all_rsvem_ai1);
}
$totalPages_rsvem_ai1 = ceil($totalRows_rsvem_ai1/$maxRows_rsvem_ai1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listvem_ai5->checkBoundries();
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
  .KT_col_flyer {width:140px; overflow:hidden;}
  .KT_col_nome {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#E6F9FD" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#E6F9FD" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" bgcolor="#017C9E" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#017C9E" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Not&iacute;cia</th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Se&ccedil;&atilde;o de Not&iacute;cias </th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Foto</th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Galeria</th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos</th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos Enviados </th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Perfil</th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Festas</th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Vem ai </th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Coment&aacute;rios</th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Coment&aacute;rios Gabriel</p>          </th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#E6F9FD" scope="row">Logout</th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#E6F9FD"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#017C9E" class="Titulo_Branco" scope="col">Vem a&iacute;... </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">&nbsp;
            <div class="KT_tng" id="listvem_ai5">
              <div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
                <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listvem_ai5'] == 1) {
?>
                              <a href="<?php echo $tfi_listvem_ai5->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listvem_ai5->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#017C9E"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_flyer <?php echo $tso_listvem_ai5->getSortIcon('vem_ai.flyer'); ?>" id="flyer"> <a href="<?php echo $tso_listvem_ai5->getSortLink('vem_ai.flyer'); ?>">Flyer</a> </th>
                        <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_nome <?php echo $tso_listvem_ai5->getSortIcon('vem_ai.nome'); ?>" id="nome"> <a href="<?php echo $tso_listvem_ai5->getSortLink('vem_ai.nome'); ?>">Nome</a> </th>
                        <th align="center" bgcolor="#017C9E">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listvem_ai5'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listvem_ai5_flyer" id="tfi_listvem_ai5_flyer" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvem_ai5_flyer']); ?>" size="20" maxlength="30" /></td>
                          <td><input type="text" name="tfi_listvem_ai5_nome" id="tfi_listvem_ai5_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listvem_ai5_nome']); ?>" size="20" maxlength="30" /></td>
                          <td><input type="submit" name="tfi_listvem_ai5" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsvem_ai1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsvem_ai1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_vem_ai" class="id_checkbox" value="<?php echo $row_rsvem_ai1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsvem_ai1['id']; ?>" />                            </td>
                            <td align="center"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsvem_ai1.flyer}", 100, 75, false); ?>" /></td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsvem_ai1['nome'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="vem_add.php?id=<?php echo $row_rsvem_ai1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsvem_ai1 = mysql_fetch_assoc($rsvem_ai1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listvem_ai5->Prepare();
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
                    <a class="KT_additem_op_link" href="vem_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <th colspan="2" bgcolor="#E6F9FD" scope="row"><img src="../../imagens/rodape.jpg" width="775" height="40" /></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsvem_ai1);
?>
