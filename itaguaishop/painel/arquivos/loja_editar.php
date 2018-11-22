<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Filter
$tfi_listlojas1 = new TFI_TableFilter($conn_ConBD, "tfi_listlojas1");
$tfi_listlojas1->addColumn("lojas.nome", "STRING_TYPE", "nome", "%");
$tfi_listlojas1->addColumn("lojas.login", "STRING_TYPE", "login", "%");
$tfi_listlojas1->addColumn("lojas.senha", "STRING_TYPE", "senha", "%");
$tfi_listlojas1->Execute();

// Sorter
$tso_listlojas1 = new TSO_TableSorter("rslojas1", "tso_listlojas1");
$tso_listlojas1->addColumn("lojas.nome");
$tso_listlojas1->addColumn("lojas.login");
$tso_listlojas1->addColumn("lojas.senha");
$tso_listlojas1->setDefault("lojas.nome");
$tso_listlojas1->Execute();

// Navigation
$nav_listlojas1 = new NAV_Regular("nav_listlojas1", "rslojas1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rslojas1 = $_SESSION['max_rows_nav_listlojas1'];
$pageNum_rslojas1 = 0;
if (isset($_GET['pageNum_rslojas1'])) {
  $pageNum_rslojas1 = $_GET['pageNum_rslojas1'];
}
$startRow_rslojas1 = $pageNum_rslojas1 * $maxRows_rslojas1;

$NXTFilter_rslojas1 = "1=1";
if (isset($_SESSION['filter_tfi_listlojas1'])) {
  $NXTFilter_rslojas1 = $_SESSION['filter_tfi_listlojas1'];
}
$NXTSort_rslojas1 = "lojas.nome";
if (isset($_SESSION['sorter_tso_listlojas1'])) {
  $NXTSort_rslojas1 = $_SESSION['sorter_tso_listlojas1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rslojas1 = sprintf("SELECT lojas.nome, lojas.login, lojas.senha, lojas.id FROM lojas WHERE %s ORDER BY %s", $NXTFilter_rslojas1, $NXTSort_rslojas1);
$query_limit_rslojas1 = sprintf("%s LIMIT %d, %d", $query_rslojas1, $startRow_rslojas1, $maxRows_rslojas1);
$rslojas1 = mysql_query($query_limit_rslojas1, $ConBD) or die(mysql_error());
$row_rslojas1 = mysql_fetch_assoc($rslojas1);

if (isset($_GET['totalRows_rslojas1'])) {
  $totalRows_rslojas1 = $_GET['totalRows_rslojas1'];
} else {
  $all_rslojas1 = mysql_query($query_rslojas1);
  $totalRows_rslojas1 = mysql_num_rows($all_rslojas1);
}
$totalPages_rslojas1 = ceil($totalRows_rslojas1/$maxRows_rslojas1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listlojas1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
	color: #75CCF0;
}
-->
</style>
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#EDE4EF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Lojas</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Categoria de Lojas </td>
      </tr>
      <tr>
        <td><a href="categoria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td><a href="novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="novidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td class="titulo">Categoria de Novidades</td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Enquete</td>
      </tr>
      <tr>
        <td><a href="enquete_titulo_add.php?ID=1">Editar titulo da Enquete </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_inserir.php">Inserir Op&ccedil;&otilde;es </a></td>
      </tr>
      
      <tr>
        <td><a href="enquete_opcoes_editar.php">Editar/Excluir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
      <script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
      </script>
      <style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_login {width:140px; overflow:hidden;}
  .KT_col_senha {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Titulo</td>
        </tr>
        <tr>
          <td>Lojas
            <?php
  $nav_listlojas1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
            <div class="KT_tng" id="listlojas1">
                <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listlojas1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listlojas1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listlojas1']; ?>
                      <?php 
  // else Conditional region1
  } else { ?>
                      <?php echo NXT_getResource("all"); ?>
                      <?php } 
  // endif Conditional region1
?>
                        <?php echo NXT_getResource("records"); ?></a> &nbsp;
                  &nbsp; </div>
                  <table align="center" cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#EDE4EF"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                        </th>
                        <th align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_nome <?php echo $tso_listlojas1->getSortIcon('lojas.nome'); ?>" id="nome"> <a href="<?php echo $tso_listlojas1->getSortLink('lojas.nome'); ?>">Nome</a> </th>
                        <th align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_login <?php echo $tso_listlojas1->getSortIcon('lojas.login'); ?>" id="login"> <a href="<?php echo $tso_listlojas1->getSortLink('lojas.login'); ?>">Login</a> </th>
                        <th align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_senha <?php echo $tso_listlojas1->getSortIcon('lojas.senha'); ?>" id="senha"> <a href="<?php echo $tso_listlojas1->getSortLink('lojas.senha'); ?>">Senha</a> </th>
                        <th align="center" bgcolor="#EDE4EF">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rslojas1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rslojas1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_lojas" class="id_checkbox" value="<?php echo $row_rslojas1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rslojas1['id']; ?>" />
                            </td>
                            <td class="txt_06"><div class="KT_col_nome"><?php echo KT_FormatForList($row_rslojas1['nome'], 20); ?></div></td>
                            <td class="txt_06"><div class="KT_col_login"><?php echo KT_FormatForList($row_rslojas1['login'], 20); ?></div></td>
                            <td class="txt_06"><div class="KT_col_senha"><?php echo KT_FormatForList($row_rslojas1['senha'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="loja_inserir.php?id=<?php echo $row_rslojas1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rslojas1 = mysql_fetch_assoc($rslojas1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listlojas1->Prepare();
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
                    <a class="KT_additem_op_link" href="loja_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por: Lobster Designer" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rslojas1);
?>
