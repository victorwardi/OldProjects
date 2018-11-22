<?php require_once('../../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the required classes
require_once('../../../includes/tfi/TFI.php');
require_once('../../../includes/tso/TSO.php');
require_once('../../../includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

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
$tfi_listturma1 = new TFI_TableFilter($conn_ConBD, "tfi_listturma1");
$tfi_listturma1->addColumn("turma.id_turma", "NUMERIC_TYPE", "id_turma", "=");
$tfi_listturma1->addColumn("turma.turma", "STRING_TYPE", "turma", "%");
$tfi_listturma1->addColumn("turma.sala", "STRING_TYPE", "sala", "%");
$tfi_listturma1->addColumn("turma.professor", "STRING_TYPE", "professor", "%");
$tfi_listturma1->Execute();

// Sorter
$tso_listturma1 = new TSO_TableSorter("rsturma1", "tso_listturma1");
$tso_listturma1->addColumn("turma.id_turma");
$tso_listturma1->addColumn("turma.turma");
$tso_listturma1->addColumn("turma.sala");
$tso_listturma1->addColumn("turma.professor");
$tso_listturma1->setDefault("turma.turma");
$tso_listturma1->Execute();

// Navigation
$nav_listturma1 = new NAV_Regular("nav_listturma1", "rsturma1", "../../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsturma1 = $_SESSION['max_rows_nav_listturma1'];
$pageNum_rsturma1 = 0;
if (isset($_GET['pageNum_rsturma1'])) {
  $pageNum_rsturma1 = $_GET['pageNum_rsturma1'];
}
$startRow_rsturma1 = $pageNum_rsturma1 * $maxRows_rsturma1;

// Defining List Recordset variable
$NXTFilter_rsturma1 = "1=1";
if (isset($_SESSION['filter_tfi_listturma1'])) {
  $NXTFilter_rsturma1 = $_SESSION['filter_tfi_listturma1'];
}
// Defining List Recordset variable
$NXTSort_rsturma1 = "turma.turma";
if (isset($_SESSION['sorter_tso_listturma1'])) {
  $NXTSort_rsturma1 = $_SESSION['sorter_tso_listturma1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsturma1 = "SELECT turma.id_turma, turma.turma, turma.sala, turma.professor FROM turma WHERE {$NXTFilter_rsturma1} ORDER BY {$NXTSort_rsturma1}";
$query_limit_rsturma1 = sprintf("%s LIMIT %d, %d", $query_rsturma1, $startRow_rsturma1, $maxRows_rsturma1);
$rsturma1 = mysql_query($query_limit_rsturma1, $ConBD) or die(mysql_error());
$row_rsturma1 = mysql_fetch_assoc($rsturma1);

if (isset($_GET['totalRows_rsturma1'])) {
  $totalRows_rsturma1 = $_GET['totalRows_rsturma1'];
} else {
  $all_rsturma1 = mysql_query($query_rsturma1);
  $totalRows_rsturma1 = mysql_num_rows($all_rsturma1);
}
$totalPages_rsturma1 = ceil($totalRows_rsturma1/$maxRows_rsturma1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listturma1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/novo_painel.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>|| Oficina Criativa ||</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../../../css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
	left: 414px;
	top: 260px;
}
-->
</style>
<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_id_turma {width:140px; overflow:hidden;}
  .KT_col_turma {width:80px; overflow:hidden;}
  .KT_col_sala {width:80px; overflow:hidden;}
  .KT_col_professor {width:200px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<link href="../../../painel/arquivos/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="../../../img/bg_01.gif"><div align="left"><a href="../../../index.php"><img src="../../../img/logo.gif" width="198" height="138" border="0" /></a></div></td>
            <td width="770" height="180" valign="top" background="../../../img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="middle"><div align="center"><img src="../../../img/logo_02.gif" width="419" height="101" /></div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../../../img/div_02.gif"><div align="left">
                          <table width="740" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">Voc&ecirc; est&aacute; em &gt; </div></td>
                              <td width="100" class="titulo_01"><a href="../../../index.php">p&aacute;gina inicial &gt; </a></td>
                              <td width="69" class="titulo_01"><div align="left"><a href="../../../aescola/index.php">a escola &gt;</a></div></td>
                              <td width="471" class="titulo_01"><div align="left">&Aacute;rea Exclusiva &gt; Painel Administrativo</div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="540" align="center" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="540" align="left" valign="top" background="../../../img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td height="300" colspan="2"><div align="left">
                    <table width="98%" border="0" align="left" cellpadding="4" cellspacing="2">
                      
                      <tr>
                        <td align="left" bgcolor="#CFDFEF" class="txt_big_01">MENU</td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Alunos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_aluno.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="aluno_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Turmas</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_turma.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="turma_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Fotos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_foto.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="fotos_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">&Aacute;lbuns</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_album.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="album_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">V&iacute;deos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_video.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="video_editar.php">Editar/Excluir</a></td>
                      </tr>
                    </table>
                  </div>                    <div align="right"></div></td>
                  </tr>
                <tr>
                  <td width="6"><div align="left"></div></td>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
            <td width="30" height="540" align="left" valign="top"><div align="left"></div></td>
            <td width="740" height="540" align="left" valign="top"><div align="left">
              <table width="740" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="24" valign="middle" bgcolor="#008BE1"><div align="right">
                    <table width="200" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="180" class="txt_01"><div align="right"><a href="<?php echo $logoutAction ?>">Sair</a></div></td>
                        <td width="20"><div align="left"></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                
                <tr>
                  <td height="26"><!-- InstanceBeginEditable name="conteudo" -->
                    <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td align="center" valign="top"><span class="data_02">&nbsp;
                          Turma
                              <?php
  $nav_listturma1->Prepare();
  require("../../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                            </span>
                          <div class="KT_tng" id="listturma1">
                              <div class="KT_tnglist">
                              <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                                <div class="KT_options"> <a href="<?php echo $nav_listturma1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                                  <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listturma1'] == 1) {
?>
                                    <?php echo $_SESSION['default_max_rows_nav_listturma1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listturma1'] == 1) {
?>
                  <a href="<?php echo $tfi_listturma1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listturma1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                                </div>
                                <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                                  <thead>
                                    <tr class="KT_row_order">
                                      <th bgcolor="#008BE1"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                                      </th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_turma <?php echo $tso_listturma1->getSortIcon('turma.turma'); ?>" id="turma"> <a href="<?php echo $tso_listturma1->getSortLink('turma.turma'); ?>">Turma</a> </th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_sala <?php echo $tso_listturma1->getSortIcon('turma.sala'); ?>" id="sala"> <a href="<?php echo $tso_listturma1->getSortLink('turma.sala'); ?>">Sala</a> </th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_professor <?php echo $tso_listturma1->getSortIcon('turma.professor'); ?>" id="professor"> <a href="<?php echo $tso_listturma1->getSortLink('turma.professor'); ?>">Professor</a> </th>
                                      <th bgcolor="#008BE1">&nbsp;</th>
                                    </tr>
                                    <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listturma1'] == 1) {
?>
                                      <tr class="KT_row_filter">
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tfi_listturma1_turma" id="tfi_listturma1_turma" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listturma1_turma']); ?>" size="20" maxlength="100" /></td>
                                        <td><input type="text" name="tfi_listturma1_sala" id="tfi_listturma1_sala" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listturma1_sala']); ?>" size="20" maxlength="40" /></td>
                                        <td><input type="text" name="tfi_listturma1_professor" id="tfi_listturma1_professor" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listturma1_professor']); ?>" size="20" maxlength="200" /></td>
                                        <td><input type="submit" name="tfi_listturma1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                                      </tr>
                                      <?php } 
  // endif Conditional region3
?>
                                  </thead>
                                  <tbody>
                                    <?php if ($totalRows_rsturma1 == 0) { // Show if recordset empty ?>
                                      <tr>
                                        <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                                      </tr>
                                      <?php } // Show if recordset empty ?>
                                    <?php if ($totalRows_rsturma1 > 0) { // Show if recordset not empty ?>
                                      <?php do { ?>
                                        <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                          <td><input type="checkbox" name="kt_pk_turma" class="id_checkbox" value="<?php echo $row_rsturma1['id_turma']; ?>" />
                                              <input type="hidden" name="id_turma" class="id_field" value="<?php echo $row_rsturma1['id_turma']; ?>" />                                          </td>
                                          <td><div class="KT_col_turma"><?php echo KT_FormatForList($row_rsturma1['turma'], 20); ?></div></td>
                                          <td><div class="KT_col_sala"><?php echo KT_FormatForList($row_rsturma1['sala'], 20); ?></div></td>
                                          <td><div class="KT_col_professor"><?php echo KT_FormatForList($row_rsturma1['professor'], 20); ?></div></td>
                                          <td><a class="KT_edit_link" href="inserir_turma.php?id_turma=<?php echo $row_rsturma1['id_turma']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                                        </tr>
                                        <?php } while ($row_rsturma1 = mysql_fetch_assoc($rsturma1)); ?>
                                      <?php } // Show if recordset not empty ?>
                                  </tbody>
                                </table>
                                <div class="KT_bottomnav">
                                  <div>                                      <br />
                                    <?php
            $nav_listturma1->Prepare();
            require("../../../includes/nav/NAV_Text_Navigation.inc.php");
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
                                  <a class="KT_additem_op_link" href="inserir_turma.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
                  <td height="26">&nbsp;</td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="../../../img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="../../../img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="../../../img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="../../../comochegar/index.html"><img src="../../../img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="../../../img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../../../img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsturma1);
?>
