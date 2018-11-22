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

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/");
  $deleteObj->setDbFieldName("imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../../Uploads/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

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

mysql_select_db($database_ConBD, $ConBD);
$query_RsListaPais = "SELECT * FROM pais ORDER BY nome ASC";
$RsListaPais = mysql_query($query_RsListaPais, $ConBD) or die(mysql_error());
$row_RsListaPais = mysql_fetch_assoc($RsListaPais);
$totalRows_RsListaPais = mysql_num_rows($RsListaPais);

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/");
  $deleteObj->setDbFieldName("foto");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto");
  $uploadObj->setDbFieldName("foto");
  $uploadObj->setFolder("../../Uploads/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_produtos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_produtos);
// Register triggers
$ins_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_produtos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_produtos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_produtos->setTable("produtos");
$ins_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_produtos->addColumn("pais", "STRING_TYPE", "POST", "pais");
$ins_produtos->addColumn("produtor", "STRING_TYPE", "POST", "produtor");
$ins_produtos->addColumn("valor", "STRING_TYPE", "POST", "valor");
$ins_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_produtos->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_produtos->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$ins_produtos->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_produtos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_produtos);
// Register triggers
$upd_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_produtos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_produtos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_produtos->setTable("produtos");
$upd_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_produtos->addColumn("pais", "STRING_TYPE", "POST", "pais");
$upd_produtos->addColumn("produtor", "STRING_TYPE", "POST", "produtor");
$upd_produtos->addColumn("valor", "STRING_TYPE", "POST", "valor");
$upd_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_produtos->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_produtos->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$upd_produtos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_produtos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_produtos);
// Register triggers
$del_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_produtos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_produtos->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_produtos->setTable("produtos");
$del_produtos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsprodutos = $tNGs->getRecordset("produtos");
$row_rsprodutos = mysql_fetch_assoc($rsprodutos);
$totalRows_rsprodutos = mysql_num_rows($rsprodutos);
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

  <script language="javascript" type="text/javascript" src="../../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple",
flash_external_list_url : "example_data/example_flash_list.js"
});
</script> 
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
          <td align="left" valign="top" class="titulo">Inserir Produtos</td>
        </tr>
        <tr>
          <td height="19" align="left" valign="top">&nbsp;
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
if (@$totalRows_rsprodutos > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="2" class="fonte">
                      <tr>
                        <td width="114" class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td width="407"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['nome']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("produtos", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="pais_<?php echo $cnt1; ?>">Pa&iacute;s:</label></td>
                        <td><label>
                          <select name="pais" id="pais">
                            <option value="- Nenhum País foi Selecionado -" <?php if (!(strcmp("- Nenhum País foi Selecionado -", $row_rsprodutos['pais']))) {echo "selected=\"selected\"";} ?>>- Selecione um País -</option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_RsListaPais['nome']?>"<?php if (!(strcmp($row_RsListaPais['nome'], $row_rsprodutos['pais']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsListaPais['nome']?></option>
                            <?php
} while ($row_RsListaPais = mysql_fetch_assoc($RsListaPais));
  $rows = mysql_num_rows($RsListaPais);
  if($rows > 0) {
      mysql_data_seek($RsListaPais, 0);
	  $row_RsListaPais = mysql_fetch_assoc($RsListaPais);
  }
?>
                          </select>
                          </label>
                            <?php echo $tNGs->displayFieldHint("pais");?> <?php echo $tNGs->displayFieldError("produtos", "pais", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="produtor_<?php echo $cnt1; ?>">Produtor:</label></td>
                        <td><input type="text" name="produtor_<?php echo $cnt1; ?>" id="produtor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['produtor']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("produtor");?> <?php echo $tNGs->displayFieldError("produtos", "produtor", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="valor_<?php echo $cnt1; ?>">Valor [sem o R$]:</label></td>
                        <td><input type="text" name="valor_<?php echo $cnt1; ?>" id="valor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['valor']); ?>" size="20" maxlength="20" />
                            <?php echo $tNGs->displayFieldHint("valor");?> <?php echo $tNGs->displayFieldError("produtos", "valor", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o:</label></td>
                        <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsprodutos['descricao']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("produtos", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                        <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("produtos", "foto", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Foto Grande:</label></td>
                        <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("produtos", "imagem", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="promocao_<?php echo $cnt1; ?>">Promo&ccedil;&atilde;o:</label></td>
                        <td><select name="promocao_<?php echo $cnt1; ?>" id="promocao_<?php echo $cnt1; ?>">
                            <option value="sim" <?php if (!(strcmp("sim", $row_rsprodutos['promocao']))) {echo "selected=\"selected\"";} ?>>Sim</option>
                            <option value="nao" <?php if (!(strcmp("nao", $row_rsprodutos['promocao']))) {echo "selected=\"selected\"";} ?>>Não</option>
                          </select>
                            <?php echo $tNGs->displayFieldError("produtos", "promocao", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_produtos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsprodutos['kt_pk_produtos']); ?>" />
                    <?php } while ($row_rsprodutos = mysql_fetch_assoc($rsprodutos)); ?>
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
mysql_free_result($RsListaPais);
?>
