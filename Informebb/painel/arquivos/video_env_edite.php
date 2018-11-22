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
$tfi_listpromo_video1 = new TFI_TableFilter($conn_saquabb, "tfi_listpromo_video1");
$tfi_listpromo_video1->addColumn("promo_video.id", "NUMERIC_TYPE", "id", "=");
$tfi_listpromo_video1->addColumn("promo_video.nome", "STRING_TYPE", "nome", "%");
$tfi_listpromo_video1->addColumn("promo_video.email", "STRING_TYPE", "email", "%");
$tfi_listpromo_video1->addColumn("promo_video.link", "STRING_TYPE", "link", "%");
$tfi_listpromo_video1->Execute();

// Sorter
$tso_listpromo_video1 = new TSO_TableSorter("rspromo_video1", "tso_listpromo_video1");
$tso_listpromo_video1->addColumn("promo_video.id");
$tso_listpromo_video1->addColumn("promo_video.nome");
$tso_listpromo_video1->addColumn("promo_video.email");
$tso_listpromo_video1->addColumn("promo_video.link");
$tso_listpromo_video1->setDefault("promo_video.id DESC");
$tso_listpromo_video1->Execute();

// Navigation
$nav_listpromo_video1 = new NAV_Regular("nav_listpromo_video1", "rspromo_video1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rspromo_video1 = $_SESSION['max_rows_nav_listpromo_video1'];
$pageNum_rspromo_video1 = 0;
if (isset($_GET['pageNum_rspromo_video1'])) {
  $pageNum_rspromo_video1 = $_GET['pageNum_rspromo_video1'];
}
$startRow_rspromo_video1 = $pageNum_rspromo_video1 * $maxRows_rspromo_video1;

$NXTFilter_rspromo_video1 = "1=1";
if (isset($_SESSION['filter_tfi_listpromo_video1'])) {
  $NXTFilter_rspromo_video1 = $_SESSION['filter_tfi_listpromo_video1'];
}
$NXTSort_rspromo_video1 = "promo_video.id DESC";
if (isset($_SESSION['sorter_tso_listpromo_video1'])) {
  $NXTSort_rspromo_video1 = $_SESSION['sorter_tso_listpromo_video1'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rspromo_video1 = sprintf("SELECT promo_video.id, promo_video.nome, promo_video.email, promo_video.link FROM promo_video WHERE %s ORDER BY %s", $NXTFilter_rspromo_video1, $NXTSort_rspromo_video1);
$query_limit_rspromo_video1 = sprintf("%s LIMIT %d, %d", $query_rspromo_video1, $startRow_rspromo_video1, $maxRows_rspromo_video1);
$rspromo_video1 = mysql_query($query_limit_rspromo_video1, $saquabb) or die(mysql_error());
$row_rspromo_video1 = mysql_fetch_assoc($rspromo_video1);

if (isset($_GET['totalRows_rspromo_video1'])) {
  $totalRows_rspromo_video1 = $_GET['totalRows_rspromo_video1'];
} else {
  $all_rspromo_video1 = mysql_query($query_rspromo_video1);
  $totalRows_rspromo_video1 = mysql_num_rows($all_rspromo_video1);
}
$totalPages_rspromo_video1 = ceil($totalRows_rspromo_video1/$maxRows_rspromo_video1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listpromo_video1->checkBoundries();
?><?php
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
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_email {width:140px; overflow:hidden;}
  .KT_col_link {width:140px; overflow:hidden;}
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
          <th align="left" valign="middle" bgcolor="#EA8C06" class="Titulo_Branco" scope="col">V&iacute;deos Enviados </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row"><div class="KT_tng" id="listpromo_video1"><div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listpromo_video1'] == 1) {
?>
              <a href="<?php echo $tfi_listpromo_video1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listpromo_video1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table border="1" cellpadding="2" cellspacing="0" bordercolor="#EA8C06" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#EA8C06"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_nome <?php echo $tso_listpromo_video1->getSortIcon('promo_video.nome'); ?>" id="nome"> <a href="<?php echo $tso_listpromo_video1->getSortLink('promo_video.nome'); ?>">Nome</a> </th>
                        <th align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_email <?php echo $tso_listpromo_video1->getSortIcon('promo_video.email'); ?>" id="email"> <a href="<?php echo $tso_listpromo_video1->getSortLink('promo_video.email'); ?>">Email</a> </th>
                        <th align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_link <?php echo $tso_listpromo_video1->getSortIcon('promo_video.link'); ?>" id="link"> <a href="<?php echo $tso_listpromo_video1->getSortLink('promo_video.link'); ?>">Link</a> </th>
                        <th align="center" bgcolor="#EA8C06">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listpromo_video1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listpromo_video1_nome" id="tfi_listpromo_video1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpromo_video1_nome']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listpromo_video1_email" id="tfi_listpromo_video1_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpromo_video1_email']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listpromo_video1_link" id="tfi_listpromo_video1_link" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpromo_video1_link']); ?>" size="20" maxlength="100" /></td>
                          <td><input type="submit" name="tfi_listpromo_video1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rspromo_video1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rspromo_video1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td align="center"><input type="checkbox" name="kt_pk_promo_video" class="id_checkbox" value="<?php echo $row_rspromo_video1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rspromo_video1['id']; ?>" />
                            </td>
                            <td align="center"><div class="KT_col_nome"><?php echo KT_FormatForList($row_rspromo_video1['nome'], 20); ?></div></td>
                            <td align="center"><div class="KT_col_email"><?php echo KT_FormatForList($row_rspromo_video1['email'], 20); ?></div></td>
                            <td align="center"><div class="KT_col_link"><?php echo KT_FormatForList($row_rspromo_video1['link'], 20); ?></div></td>
                            <td align="center"><a class="KT_edit_link" href="video_env_add.php?id=<?php echo $row_rspromo_video1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rspromo_video1 = mysql_fetch_assoc($rspromo_video1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listpromo_video1->Prepare();
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
                    <a class="KT_additem_op_link" href="video_env_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rspromo_video1);
?>
