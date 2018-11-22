<?php require_once('../../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
<?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

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
$tfi_listgaleria_ex1 = new TFI_TableFilter($conn_ConBD, "tfi_listgaleria_ex1");
$tfi_listgaleria_ex1->addColumn("galeria_ex.id", "NUMERIC_TYPE", "id", "=");
$tfi_listgaleria_ex1->addColumn("galeria_ex.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listgaleria_ex1->addColumn("galeria_ex.data", "STRING_TYPE", "data", "%");
$tfi_listgaleria_ex1->addColumn("galeria_ex.imagem", "STRING_TYPE", "imagem", "%");
$tfi_listgaleria_ex1->addColumn("galeria_ex.turma", "STRING_TYPE", "turma", "%");
$tfi_listgaleria_ex1->Execute();

// Sorter
$tso_listgaleria_ex1 = new TSO_TableSorter("rsgaleria_ex1", "tso_listgaleria_ex1");
$tso_listgaleria_ex1->addColumn("galeria_ex.id");
$tso_listgaleria_ex1->addColumn("galeria_ex.titulo");
$tso_listgaleria_ex1->addColumn("galeria_ex.data");
$tso_listgaleria_ex1->addColumn("galeria_ex.imagem");
$tso_listgaleria_ex1->addColumn("galeria_ex.turma");
$tso_listgaleria_ex1->setDefault("galeria_ex.id DESC");
$tso_listgaleria_ex1->Execute();

// Navigation
$nav_listgaleria_ex1 = new NAV_Regular("nav_listgaleria_ex1", "rsgaleria_ex1", "../../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsgaleria_ex1 = $_SESSION['max_rows_nav_listgaleria_ex1'];
$pageNum_rsgaleria_ex1 = 0;
if (isset($_GET['pageNum_rsgaleria_ex1'])) {
  $pageNum_rsgaleria_ex1 = $_GET['pageNum_rsgaleria_ex1'];
}
$startRow_rsgaleria_ex1 = $pageNum_rsgaleria_ex1 * $maxRows_rsgaleria_ex1;

// Defining List Recordset variable
$NXTFilter_rsgaleria_ex1 = "1=1";
if (isset($_SESSION['filter_tfi_listgaleria_ex1'])) {
  $NXTFilter_rsgaleria_ex1 = $_SESSION['filter_tfi_listgaleria_ex1'];
}
// Defining List Recordset variable
$NXTSort_rsgaleria_ex1 = "galeria_ex.id DESC";
if (isset($_SESSION['sorter_tso_listgaleria_ex1'])) {
  $NXTSort_rsgaleria_ex1 = $_SESSION['sorter_tso_listgaleria_ex1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsgaleria_ex1 = "SELECT galeria_ex.id, galeria_ex.titulo, galeria_ex.data, galeria_ex.imagem, galeria_ex.turma FROM galeria_ex WHERE {$NXTFilter_rsgaleria_ex1} ORDER BY {$NXTSort_rsgaleria_ex1}";
$query_limit_rsgaleria_ex1 = sprintf("%s LIMIT %d, %d", $query_rsgaleria_ex1, $startRow_rsgaleria_ex1, $maxRows_rsgaleria_ex1);
$rsgaleria_ex1 = mysql_query($query_limit_rsgaleria_ex1, $ConBD) or die(mysql_error());
$row_rsgaleria_ex1 = mysql_fetch_assoc($rsgaleria_ex1);

if (isset($_GET['totalRows_rsgaleria_ex1'])) {
  $totalRows_rsgaleria_ex1 = $_GET['totalRows_rsgaleria_ex1'];
} else {
  $all_rsgaleria_ex1 = mysql_query($query_rsgaleria_ex1);
  $totalRows_rsgaleria_ex1 = mysql_num_rows($all_rsgaleria_ex1);
}
$totalPages_rsgaleria_ex1 = ceil($totalRows_rsgaleria_ex1/$maxRows_rsgaleria_ex1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listgaleria_ex1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{rsgaleria_ex1.imagem}");
$objDynamicThumb1->setResize(80, 0, true);
$objDynamicThumb1->setWatermark(false);
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
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_data {width:70px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_turma {width:60px; overflow:hidden;}
</style>
<link href="../../../painel/arquivos/css.css" rel="stylesheet" type="text/css" />
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
                        <td align="center" valign="top">&nbsp; <span class="data_02">&Aacute;lbuns
                            <?php
  $nav_listgaleria_ex1->Prepare();
  require("../../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                            </span>
                          <div class="KT_tng" id="listgaleria_ex1">
                              <div class="KT_tnglist">
                              <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                                <div class="KT_options"> 
                                  <div align="center"><a href="<?php echo $nav_listgaleria_ex1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                                        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listgaleria_ex1'] == 1) {
?>
                                      <?php echo $_SESSION['default_max_rows_nav_listgaleria_ex1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listgaleria_ex1'] == 1) {
?>
                                                      <a href="<?php echo $tfi_listgaleria_ex1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                                          <?php 
  // else Conditional region2
  } else { ?>
                                                      <a href="<?php echo $tfi_listgaleria_ex1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                                          <?php } 
  // endif Conditional region2
?>
                                    </div>
                                </div>
                                <table align="center" cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                                  <thead>
                                    <tr class="KT_row_order">
                                      <th bgcolor="#0089E1"> <div align="center">
                                        <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                                      
                                      </div></th>
                                      <th bgcolor="#0089E1" class="KT_sorter KT_col_titulo <?php echo $tso_listgaleria_ex1->getSortIcon('galeria_ex.titulo'); ?>" id="titulo"> <div align="center"><a href="<?php echo $tso_listgaleria_ex1->getSortLink('galeria_ex.titulo'); ?>">Titulo</a> </div></th>
                                      <th bgcolor="#0089E1" class="KT_sorter KT_col_data <?php echo $tso_listgaleria_ex1->getSortIcon('galeria_ex.data'); ?>" id="data"> <div align="center"><a href="<?php echo $tso_listgaleria_ex1->getSortLink('galeria_ex.data'); ?>">Data</a> </div></th>
                                      <th bgcolor="#0089E1" class="KT_sorter KT_col_imagem <?php echo $tso_listgaleria_ex1->getSortIcon('galeria_ex.imagem'); ?>" id="imagem"> <div align="center"><a href="<?php echo $tso_listgaleria_ex1->getSortLink('galeria_ex.imagem'); ?>">Imagem</a> </div></th>
                                      <th bgcolor="#0089E1" class="KT_sorter KT_col_turma <?php echo $tso_listgaleria_ex1->getSortIcon('galeria_ex.turma'); ?>" id="turma"> <div align="center"><a href="<?php echo $tso_listgaleria_ex1->getSortLink('galeria_ex.turma'); ?>">Turma</a> </div></th>
                                      <th bgcolor="#0089E1"><div align="center"></div></th>
                                    </tr>
                                    <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listgaleria_ex1'] == 1) {
?>
                                      <tr class="KT_row_filter">
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tfi_listgaleria_ex1_titulo" id="tfi_listgaleria_ex1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_ex1_titulo']); ?>" size="20" maxlength="50" /></td>
                                        <td><input type="text" name="tfi_listgaleria_ex1_data" id="tfi_listgaleria_ex1_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_ex1_data']); ?>" size="10" maxlength="10" /></td>
                                        <td><input type="text" name="tfi_listgaleria_ex1_imagem" id="tfi_listgaleria_ex1_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_ex1_imagem']); ?>" size="20" maxlength="100" /></td>
                                        <td><input type="text" name="tfi_listgaleria_ex1_turma" id="tfi_listgaleria_ex1_turma" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_ex1_turma']); ?>" size="20" maxlength="50" /></td>
                                        <td><input type="submit" name="tfi_listgaleria_ex1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                                      </tr>
                                      <?php } 
  // endif Conditional region3
?>
                                  </thead>
                                  <tbody>
                                    <?php if ($totalRows_rsgaleria_ex1 == 0) { // Show if recordset empty ?>
                                      <tr>
                                        <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                                      </tr>
                                      <?php } // Show if recordset empty ?>
                                    <?php if ($totalRows_rsgaleria_ex1 > 0) { // Show if recordset not empty ?>
                                      <?php do { ?>
                                        <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                          <td><input type="checkbox" name="kt_pk_galeria_ex" class="id_checkbox" value="<?php echo $row_rsgaleria_ex1['id']; ?>" />
                                              <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsgaleria_ex1['id']; ?>" />                                          </td>
                                          <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsgaleria_ex1['titulo'], 20); ?></div></td>
                                          <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsgaleria_ex1['data'], 10); ?></div></td>
                                          <td><div align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                                          <td><div class="KT_col_turma"><?php echo KT_FormatForList($row_rsgaleria_ex1['turma'], 20); ?></div></td>
                                          <td><a class="KT_edit_link" href="inserir_album.php?id=<?php echo $row_rsgaleria_ex1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                                        </tr>
                                        <?php } while ($row_rsgaleria_ex1 = mysql_fetch_assoc($rsgaleria_ex1)); ?>
                                      <?php } // Show if recordset not empty ?>
                                  </tbody>
                                </table>
                                <div align="left"></div>
                                <div class="KT_bottomnav">
                                  <div>
                                    <div align="center"><br />
                                      <?php
            $nav_listgaleria_ex1->Prepare();
            require("../../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                                      </div>
                                  </div>
                                </div>
                                <div class="KT_bottombuttons">
                                  <div class="KT_operations"> 
                                    <div align="center"><a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
                                  </div>
                                  <div align="center"><span>&nbsp;</span>
                                      <select name="no_new" id="no_new">
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        </select>
                                      <a class="KT_additem_op_link" href="inserir_album.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                                </div>
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
mysql_free_result($rsgaleria_ex1);
?>
