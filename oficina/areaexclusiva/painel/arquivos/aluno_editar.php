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
$tfi_listusuarios1 = new TFI_TableFilter($conn_ConBD, "tfi_listusuarios1");
$tfi_listusuarios1->addColumn("usuarios.nome", "STRING_TYPE", "nome", "%");
$tfi_listusuarios1->addColumn("usuarios.email", "STRING_TYPE", "email", "%");
$tfi_listusuarios1->addColumn("usuarios.senha", "STRING_TYPE", "senha", "%");
$tfi_listusuarios1->addColumn("usuarios.turma", "STRING_TYPE", "turma", "%");
$tfi_listusuarios1->Execute();

// Sorter
$tso_listusuarios1 = new TSO_TableSorter("rsusuarios1", "tso_listusuarios1");
$tso_listusuarios1->addColumn("usuarios.nome");
$tso_listusuarios1->addColumn("usuarios.email");
$tso_listusuarios1->addColumn("usuarios.senha");
$tso_listusuarios1->addColumn("usuarios.turma");
$tso_listusuarios1->setDefault("usuarios.nome");
$tso_listusuarios1->Execute();

// Navigation
$nav_listusuarios1 = new NAV_Regular("nav_listusuarios1", "rsusuarios1", "../../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsusuarios1 = $_SESSION['max_rows_nav_listusuarios1'];
$pageNum_rsusuarios1 = 0;
if (isset($_GET['pageNum_rsusuarios1'])) {
  $pageNum_rsusuarios1 = $_GET['pageNum_rsusuarios1'];
}
$startRow_rsusuarios1 = $pageNum_rsusuarios1 * $maxRows_rsusuarios1;

// Defining List Recordset variable
$NXTFilter_rsusuarios1 = "1=1";
if (isset($_SESSION['filter_tfi_listusuarios1'])) {
  $NXTFilter_rsusuarios1 = $_SESSION['filter_tfi_listusuarios1'];
}
// Defining List Recordset variable
$NXTSort_rsusuarios1 = "usuarios.nome";
if (isset($_SESSION['sorter_tso_listusuarios1'])) {
  $NXTSort_rsusuarios1 = $_SESSION['sorter_tso_listusuarios1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsusuarios1 = "SELECT usuarios.nome, usuarios.email, usuarios.senha, usuarios.turma, usuarios.id_usuario FROM usuarios WHERE {$NXTFilter_rsusuarios1} ORDER BY {$NXTSort_rsusuarios1}";
$query_limit_rsusuarios1 = sprintf("%s LIMIT %d, %d", $query_rsusuarios1, $startRow_rsusuarios1, $maxRows_rsusuarios1);
$rsusuarios1 = mysql_query($query_limit_rsusuarios1, $ConBD) or die(mysql_error());
$row_rsusuarios1 = mysql_fetch_assoc($rsusuarios1);

if (isset($_GET['totalRows_rsusuarios1'])) {
  $totalRows_rsusuarios1 = $_GET['totalRows_rsusuarios1'];
} else {
  $all_rsusuarios1 = mysql_query($query_rsusuarios1);
  $totalRows_rsusuarios1 = mysql_num_rows($all_rsusuarios1);
}
$totalPages_rsusuarios1 = ceil($totalRows_rsusuarios1/$maxRows_rsusuarios1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listusuarios1->checkBoundries();
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
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_email {width:160px; overflow:hidden;}
  .KT_col_senha {width:100px; overflow:hidden;}
  .KT_col_turma {width:40px; overflow:hidden;}
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
                        <td align="left" valign="top"><div align="center"><span class="data_02">Alunos
                          <?php
  $nav_listusuarios1->Prepare();
  require("../../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                          </span>
                        </div>
                          <div class="KT_tng" id="listusuarios1">
                              <div class="KT_tnglist">
                              <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                                <div class="KT_options"> <a href="<?php echo $nav_listusuarios1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                                  <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listusuarios1'] == 1) {
?>
                                    <?php echo $_SESSION['default_max_rows_nav_listusuarios1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listusuarios1'] == 1) {
?>
                  <a href="<?php echo $tfi_listusuarios1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listusuarios1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                                </div>
                                <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                                  <thead>
                                    <tr class="KT_row_order">
                                      <th bgcolor="#008BE1"> <div align="center">
                                        <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                                      
                                      </div></th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_nome <?php echo $tso_listusuarios1->getSortIcon('usuarios.nome'); ?>" id="nome"> <div align="center"><a href="<?php echo $tso_listusuarios1->getSortLink('usuarios.nome'); ?>">Nome</a> </div></th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_email <?php echo $tso_listusuarios1->getSortIcon('usuarios.email'); ?>" id="email"> <div align="center"><a href="<?php echo $tso_listusuarios1->getSortLink('usuarios.email'); ?>">Email</a> </div></th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_senha <?php echo $tso_listusuarios1->getSortIcon('usuarios.senha'); ?>" id="senha"> <div align="center"><a href="<?php echo $tso_listusuarios1->getSortLink('usuarios.senha'); ?>">Senha</a> </div></th>
                                      <th bgcolor="#008BE1" class="KT_sorter KT_col_turma <?php echo $tso_listusuarios1->getSortIcon('usuarios.turma'); ?>" id="turma"> <div align="center"><a href="<?php echo $tso_listusuarios1->getSortLink('usuarios.turma'); ?>">Turma</a> </div></th>
                                      <th bgcolor="#008BE1"><div align="center"></div></th>
                                    </tr>
                                    <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listusuarios1'] == 1) {
?>
                                      <tr class="KT_row_filter">
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tfi_listusuarios1_nome" id="tfi_listusuarios1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusuarios1_nome']); ?>" size="20" maxlength="200" /></td>
                                        <td><input type="text" name="tfi_listusuarios1_email" id="tfi_listusuarios1_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusuarios1_email']); ?>" size="20" maxlength="200" /></td>
                                        <td><input type="text" name="tfi_listusuarios1_senha" id="tfi_listusuarios1_senha" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusuarios1_senha']); ?>" size="20" maxlength="100" /></td>
                                        <td><input type="text" name="tfi_listusuarios1_turma" id="tfi_listusuarios1_turma" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusuarios1_turma']); ?>" size="20" maxlength="50" /></td>
                                        <td><input type="submit" name="tfi_listusuarios1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                                      </tr>
                                      <?php } 
  // endif Conditional region3
?>
                                  </thead>
                                  <tbody>
                                    <?php if ($totalRows_rsusuarios1 == 0) { // Show if recordset empty ?>
                                      <tr>
                                        <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                                      </tr>
                                      <?php } // Show if recordset empty ?>
                                    <?php if ($totalRows_rsusuarios1 > 0) { // Show if recordset not empty ?>
                                      <?php do { ?>
                                        <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                          <td><input type="checkbox" name="kt_pk_usuarios" class="id_checkbox" value="<?php echo $row_rsusuarios1['id_usuario']; ?>" />
                                              <input type="hidden" name="id_usuario" class="id_field" value="<?php echo $row_rsusuarios1['id_usuario']; ?>" />                                          </td>
                                          <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsusuarios1['nome'], 20); ?></div></td>
                                          <td><div class="KT_col_email"><?php echo KT_FormatForList($row_rsusuarios1['email'], 20); ?></div></td>
                                          <td><div class="KT_col_senha"><?php echo KT_FormatForList($row_rsusuarios1['senha'], 20); ?></div></td>
                                          <td><div class="KT_col_turma"><?php echo KT_FormatForList($row_rsusuarios1['turma'], 20); ?></div></td>
                                          <td><a class="KT_edit_link" href="inserir_aluno.php?id_usuario=<?php echo $row_rsusuarios1['id_usuario']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                                        </tr>
                                        <?php } while ($row_rsusuarios1 = mysql_fetch_assoc($rsusuarios1)); ?>
                                      <?php } // Show if recordset not empty ?>
                                  </tbody>
                                </table>
                                <div class="KT_bottomnav">
                                  <div>
                                    <?php
            $nav_listusuarios1->Prepare();
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
                                  <a class="KT_additem_op_link" href="inserir_aluno.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsusuarios1);
?>
