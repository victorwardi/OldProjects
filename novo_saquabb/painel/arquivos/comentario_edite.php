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

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listcomentarios_not8 = new TFI_TableFilter($conn_saquabb, "tfi_listcomentarios_not8");
$tfi_listcomentarios_not8->addColumn("comentarios_not.id_coment", "NUMERIC_TYPE", "id_coment", "=");
$tfi_listcomentarios_not8->addColumn("comentarios_not.nome", "STRING_TYPE", "nome", "%");
$tfi_listcomentarios_not8->addColumn("comentarios_not.id", "NUMERIC_TYPE", "id", "=");
$tfi_listcomentarios_not8->addColumn("comentarios_not.aprovado", "STRING_TYPE", "aprovado", "%");
$tfi_listcomentarios_not8->Execute();

// Sorter
$tso_listcomentarios_not8 = new TSO_TableSorter("rscomentarios_not1", "tso_listcomentarios_not8");
$tso_listcomentarios_not8->addColumn("comentarios_not.id_coment");
$tso_listcomentarios_not8->addColumn("comentarios_not.nome");
$tso_listcomentarios_not8->addColumn("comentarios_not.id");
$tso_listcomentarios_not8->addColumn("comentarios_not.aprovado");
$tso_listcomentarios_not8->setDefault("comentarios_not.id_coment DESC");
$tso_listcomentarios_not8->Execute();

// Navigation
$nav_listcomentarios_not8 = new NAV_Regular("nav_listcomentarios_not8", "rscomentarios_not1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rscomentarios_not1 = $_SESSION['max_rows_nav_listcomentarios_not8'];
$pageNum_rscomentarios_not1 = 0;
if (isset($_GET['pageNum_rscomentarios_not1'])) {
  $pageNum_rscomentarios_not1 = $_GET['pageNum_rscomentarios_not1'];
}
$startRow_rscomentarios_not1 = $pageNum_rscomentarios_not1 * $maxRows_rscomentarios_not1;

$NXTFilter_rscomentarios_not1 = "1=1";
if (isset($_SESSION['filter_tfi_listcomentarios_not8'])) {
  $NXTFilter_rscomentarios_not1 = $_SESSION['filter_tfi_listcomentarios_not8'];
}
$NXTSort_rscomentarios_not1 = "comentarios_not.id_coment DESC";
if (isset($_SESSION['sorter_tso_listcomentarios_not8'])) {
  $NXTSort_rscomentarios_not1 = $_SESSION['sorter_tso_listcomentarios_not8'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rscomentarios_not1 = sprintf("SELECT comentarios_not.id_coment, comentarios_not.nome, comentarios_not.id, comentarios_not.aprovado FROM comentarios_not WHERE %s ORDER BY %s", $NXTFilter_rscomentarios_not1, $NXTSort_rscomentarios_not1);
$query_limit_rscomentarios_not1 = sprintf("%s LIMIT %d, %d", $query_rscomentarios_not1, $startRow_rscomentarios_not1, $maxRows_rscomentarios_not1);
$rscomentarios_not1 = mysql_query($query_limit_rscomentarios_not1, $saquabb) or die(mysql_error());
$row_rscomentarios_not1 = mysql_fetch_assoc($rscomentarios_not1);

if (isset($_GET['totalRows_rscomentarios_not1'])) {
  $totalRows_rscomentarios_not1 = $_GET['totalRows_rscomentarios_not1'];
} else {
  $all_rscomentarios_not1 = mysql_query($query_rscomentarios_not1);
  $totalRows_rscomentarios_not1 = mysql_num_rows($all_rscomentarios_not1);
}
$totalPages_rscomentarios_not1 = ceil($totalRows_rscomentarios_not1/$maxRows_rscomentarios_not1)-1;
//End NeXTenesio3 Special List Recordset

mysql_select_db($database_saquabb, $saquabb);
$query_not = "SELECT * FROM noticias";
$not = mysql_query($query_not, $saquabb) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);
$totalRows_not = mysql_num_rows($not);

$nav_listcomentarios_not8->checkBoundries();
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
  .KT_col_id_coment {width:140px; overflow:hidden;}
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_aprovado {width:140px; overflow:hidden;}
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
          <th align="left" valign="middle" bgcolor="#017C9E" class="Titulo_Branco" scope="col">Coment&aacute;rio not&iacute;cia </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row"><div class="KT_tng" id="listcomentarios_not8"><div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listcomentarios_not8'] == 1) {
?>
              <a href="<?php echo $tfi_listcomentarios_not8->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listcomentarios_not8->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#017C9E"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_nome <?php echo $tso_listcomentarios_not8->getSortIcon('comentarios_not.nome'); ?>" id="nome"> <a href="<?php echo $tso_listcomentarios_not8->getSortLink('comentarios_not.nome'); ?>">Nome</a> </th>
                        <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_id <?php echo $tso_listcomentarios_not8->getSortIcon('comentarios_not.id'); ?>" id="id"> <a href="<?php echo $tso_listcomentarios_not8->getSortLink('comentarios_not.id'); ?>">Id</a> </th>
                        <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_aprovado <?php echo $tso_listcomentarios_not8->getSortIcon('comentarios_not.aprovado'); ?>" id="aprovado"> <a href="<?php echo $tso_listcomentarios_not8->getSortLink('comentarios_not.aprovado'); ?>">Aprovado</a> </th>
                        <th align="center" bgcolor="#017C9E">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcomentarios_not8'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listcomentarios_not8_nome" id="tfi_listcomentarios_not8_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios_not8_nome']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listcomentarios_not8_id" id="tfi_listcomentarios_not8_id" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios_not8_id']); ?>" size="20" maxlength="100" /></td>
                          <td><input type="text" name="tfi_listcomentarios_not8_aprovado" id="tfi_listcomentarios_not8_aprovado" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentarios_not8_aprovado']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="submit" name="tfi_listcomentarios_not8" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rscomentarios_not1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rscomentarios_not1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_comentarios_not" class="id_checkbox" value="<?php echo $row_rscomentarios_not1['id_coment']; ?>" />
                                <input type="hidden" name="id_coment" class="id_field" value="<?php echo $row_rscomentarios_not1['id_coment']; ?>" />
                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rscomentarios_not1['nome'], 20); ?></div></td>
                            <td><div class="KT_col_id"><?php echo KT_FormatForList($row_rscomentarios_not1['id'], 20); ?></div></td>
                            <td><div class="KT_col_aprovado"><?php echo KT_FormatForList($row_rscomentarios_not1['aprovado'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="comentario_add.php?id_coment=<?php echo $row_rscomentarios_not1['id_coment']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rscomentarios_not1 = mysql_fetch_assoc($rscomentarios_not1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listcomentarios_not8->Prepare();
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
                    <a class="KT_additem_op_link" href="comentario_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rscomentarios_not1);

mysql_free_result($not);
?>
