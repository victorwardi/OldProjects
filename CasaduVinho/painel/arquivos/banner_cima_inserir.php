<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

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

$colname_RsMostraImagem = "-1";
if (isset($_GET['id'])) {
  $colname_RsMostraImagem = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsMostraImagem = sprintf("SELECT * FROM banner_cima WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_RsMostraImagem, "int"));
$RsMostraImagem = mysql_query($query_RsMostraImagem, $ConBD) or die(mysql_error());
$row_RsMostraImagem = mysql_fetch_assoc($RsMostraImagem);
$totalRows_RsMostraImagem = mysql_num_rows($RsMostraImagem);

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/");
  $deleteObj->setDbFieldName("imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../../Uploads/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_banner_cima = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_banner_cima);
// Register triggers
$ins_banner_cima->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_banner_cima->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_banner_cima->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_banner_cima->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_banner_cima->setTable("banner_cima");
$ins_banner_cima->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_banner_cima->addColumn("link", "STRING_TYPE", "POST", "link");
$ins_banner_cima->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_banner_cima = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_banner_cima);
// Register triggers
$upd_banner_cima->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_banner_cima->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_banner_cima->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_banner_cima->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_banner_cima->setTable("banner_cima");
$upd_banner_cima->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_banner_cima->addColumn("link", "STRING_TYPE", "POST", "link");
$upd_banner_cima->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_banner_cima = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_banner_cima);
// Register triggers
$del_banner_cima->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_banner_cima->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_banner_cima->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_banner_cima->setTable("banner_cima");
$del_banner_cima->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsbanner_cima = $tNGs->getRecordset("banner_cima");
$row_rsbanner_cima = mysql_fetch_assoc($rsbanner_cima);
$totalRows_rsbanner_cima = mysql_num_rows($rsbanner_cima);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../Uploads/");
$objDynamicThumb1->setRenameRule("{rsbanner_cima.imagem}");
$objDynamicThumb1->setResize(300, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(../../img/fundo.jpg);
	background-color: #28370E;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<link href="../../css/painel.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="750" border="1" align="center" cellpadding="1" cellspacing="4" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" background="../img/base.jpg"><img src="../img/topo.jpg" alt="Painel Administrativo" width="600" height="80" /></td>
  </tr>
  <tr>
    <td width="180" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="left" valign="middle" class="titulomenu">Menu</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Produtos</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Pa&iacute;s</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_editar.php">Editar/Excluir</a></td>
      </tr>
      
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Topo</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Lateral</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_editar.php">Editar/Excluir</a></td>
      </tr>
      

      
      <tr>
        <td align="left" valign="middle" class="titulomenu">Logout</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><a href="<?php echo $logoutAction ?>" class="link style6">Sair</a></td>
      </tr>
      
    </table></td>
    <td width="619" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="left" valign="top" class="titulo">Inserir Banner no Topo</td>
        </tr>
        <tr>
          <td height="19" align="center" valign="top">&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsbanner_cima > 1) {
?>
                      <h2 class="fonte"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table width="513" cellpadding="5" cellspacing="0" class="fonte">
                      <tr>
                        <td colspan="2" align="center" class="KT_th"><?php if ($totalRows_RsMostraImagem > 0) { // Show if recordset not empty ?>
                              <div>
                                <p><strong>Imagem Atual:</strong><br />
                                  &nbsp;<img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_cinza" /></p>
                              </div>
                              <?php } // Show if recordset not empty ?>
</td>
                      </tr>
                      <tr>
                        <td width="113" align="right" class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem [480 X 110]:</label></td>
                        <td width="378" align="left"><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("banner_cima", "imagem", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="right" class="KT_th"><label for="link_<?php echo $cnt1; ?>">Link:</label></td>
                        <td align="left"><input type="text" name="link_<?php echo $cnt1; ?>" id="link_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbanner_cima['link']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("link");?> <?php echo $tNGs->displayFieldError("banner_cima", "link", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_banner_cima_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsbanner_cima['kt_pk_banner_cima']); ?>" />
                    <?php } while ($row_rsbanner_cima = mysql_fetch_assoc($rsbanner_cima)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
                        </div>
                        <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                        <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                        <?php }
      // endif Conditional region1
      ?>
                      <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
                    </div>
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
    <td height="40" colspan="2" align="center" valign="middle" background="../img/base.jpg" bgcolor="#2B90BA"><span class="txt_branco">Painel Administrativo desenvolvido por: <span class="fonte"><span class="txt_branco"><strong>Victor Caetano</strong></span></span></span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsMostraImagem);
?>
