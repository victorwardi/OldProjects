<?php require_once('../../Connections/ConVBS.php'); ?>
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
$conn_ConVBS = new KT_connection($ConVBS, $database_ConVBS);

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

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMarcas = "SELECT * FROM marcas ORDER BY nome ASC";
$RsMarcas = mysql_query($query_RsMarcas, $ConVBS) or die(mysql_error());
$row_RsMarcas = mysql_fetch_assoc($RsMarcas);
$totalRows_RsMarcas = mysql_num_rows($RsMarcas);

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsTipo = "SELECT * FROM tipo ORDER BY nome ASC";
$RsTipo = mysql_query($query_RsTipo, $ConVBS) or die(mysql_error());
$row_RsTipo = mysql_fetch_assoc($RsTipo);
$totalRows_RsTipo = mysql_num_rows($RsTipo);

//start Trigger_FileDelete2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete2(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto3");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto3");
  $uploadObj->setDbFieldName("foto3");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload2 trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto2");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto2");
  $uploadObj->setDbFieldName("foto2");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto1");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto1");
  $uploadObj->setDbFieldName("foto1");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_produtos = new tNG_multipleInsert($conn_ConVBS);
$tNGs->addTransaction($ins_produtos);
// Register triggers
$ins_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "produtos_edite.php");
$ins_produtos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_produtos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$ins_produtos->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
// Add columns
$ins_produtos->setTable("produtos");
$ins_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_produtos->addColumn("marca", "STRING_TYPE", "POST", "marca");
$ins_produtos->addColumn("tipo", "STRING_TYPE", "POST", "tipo");
$ins_produtos->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_produtos->addColumn("preco", "STRING_TYPE", "POST", "preco");
$ins_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_produtos->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$ins_produtos->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$ins_produtos->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$ins_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$ins_produtos->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_produtos = new tNG_multipleUpdate($conn_ConVBS);
$tNGs->addTransaction($upd_produtos);
// Register triggers
$upd_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "produtos_edite.php");
$upd_produtos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_produtos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$upd_produtos->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
// Add columns
$upd_produtos->setTable("produtos");
$upd_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_produtos->addColumn("marca", "STRING_TYPE", "POST", "marca");
$upd_produtos->addColumn("tipo", "STRING_TYPE", "POST", "tipo");
$upd_produtos->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_produtos->addColumn("preco", "STRING_TYPE", "POST", "preco");
$upd_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_produtos->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$upd_produtos->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$upd_produtos->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$upd_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$upd_produtos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_produtos = new tNG_multipleDelete($conn_ConVBS);
$tNGs->addTransaction($del_produtos);
// Register triggers
$del_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "produtos_edite.php");
$del_produtos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_produtos->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_produtos->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
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
<title>Painel Administrativo VBS</title>
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
	color: #333333;
}
-->
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#CCCCCC"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Produtos</td>
      </tr>
      <tr>
        <td><a href="produtos_add.php">Inserir  </a></td>
      </tr>
      <tr>
        <td><a href="produtos_edite.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Marcas</td>
      </tr>
      <tr>
        <td><a href="marca_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="marca_editar.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Tipos</td>
      </tr>
      <tr>
        <td><a href="tipo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="tipo_editar.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_add.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Publicidade</td>
      </tr>
      <tr>
        <td><a href="publicidade_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td><a href="publicidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Sair </td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair do Painel</a></td>
      </tr>
      <tr>
        <td><a href="foto_edite.php"></a></td>
      </tr>
      
    </table></td>
    <td width="600" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <?php echo $tNGs->displayValidationRules();?>
      <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
      <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
      </script>
      <!-- TinyMCE-->
<script language="javascript" type="text/javascript" src="../../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple",
flash_external_list_url : "example_data/example_flash_list.js"
});
</script>    
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Inserir Produtos </td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
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
                      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['nome']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("produtos", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="marca_<?php echo $cnt1; ?>">Marca:</label></td>
                        <td><label></label>
                          <select name="marca" id="marca">
                            <option value="nenhuma" <?php if (!(strcmp("nenhuma", $row_rsprodutos['marca']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Marca -</option>
                            <?php
do {  
?><option value="<?php echo $row_RsMarcas['nome']?>"<?php if (!(strcmp($row_RsMarcas['nome'], $row_rsprodutos['marca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsMarcas['nome']?></option>
                            <?php
} while ($row_RsMarcas = mysql_fetch_assoc($RsMarcas));
  $rows = mysql_num_rows($RsMarcas);
  if($rows > 0) {
      mysql_data_seek($RsMarcas, 0);
	  $row_RsMarcas = mysql_fetch_assoc($RsMarcas);
  }
?>
                          </select>
                        <?php echo $tNGs->displayFieldHint("marca");?> <?php echo $tNGs->displayFieldError("produtos", "marca", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="tipo_<?php echo $cnt1; ?>">Tipo:</label></td>
                        <td><label>
                          <select name="tipo" id="tipo">
                            <option value="nenhum" <?php if (!(strcmp("nenhum", $row_rsprodutos['tipo']))) {echo "selected=\"selected\"";} ?>>- Selecione um Tipo -</option>
                            <?php
do {  
?><option value="<?php echo $row_RsTipo['id_tipo']?>"<?php if (!(strcmp($row_RsTipo['id_tipo'], $row_rsprodutos['tipo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsTipo['nome']?></option>
                            <?php
} while ($row_RsTipo = mysql_fetch_assoc($RsTipo));
  $rows = mysql_num_rows($RsTipo);
  if($rows > 0) {
      mysql_data_seek($RsTipo, 0);
	  $row_RsTipo = mysql_fetch_assoc($RsTipo);
  }
?>
                          </select>
                        </label><?php echo $tNGs->displayFieldHint("tipo");?> <?php echo $tNGs->displayFieldError("produtos", "tipo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                        <td><label>
                          <select name="categoria" id="categoria">
                            <option value="" <?php if (!(strcmp("", $row_rsprodutos['categoria']))) {echo "selected=\"selected\"";} ?>>- Selecione -</option>
                            <option value="Masculino" <?php if (!(strcmp("Masculino", $row_rsprodutos['categoria']))) {echo "selected=\"selected\"";} ?>>Masculino</option>
                            <option value="Feminino" <?php if (!(strcmp("Feminino", $row_rsprodutos['categoria']))) {echo "selected=\"selected\"";} ?>>Feminino</option>
                            <option value="Outros" <?php if (!(strcmp("Outros", $row_rsprodutos['categoria']))) {echo "selected=\"selected\"";} ?>>Outros</option>
                          </select>
                          </label>
                            <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("produtos", "categoria", $cnt1); ?> </td>
                      </tr>

                      <tr>
                        <td class="KT_th"><label for="preco_<?php echo $cnt1; ?>">Preco:</label></td>
                        <td><input type="text" name="preco_<?php echo $cnt1; ?>" id="preco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['preco']); ?>" size="20" maxlength="20" />
                            <?php echo $tNGs->displayFieldHint("preco");?> <?php echo $tNGs->displayFieldError("produtos", "preco", $cnt1); ?> </td>
                      </tr>

                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                        <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsprodutos['descricao']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("produtos", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto1_<?php echo $cnt1; ?>">Foto1:</label></td>
                        <td><input type="file" name="foto1_<?php echo $cnt1; ?>" id="foto1_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("produtos", "foto1", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto2_<?php echo $cnt1; ?>">Foto2:</label></td>
                        <td><input type="file" name="foto2_<?php echo $cnt1; ?>" id="foto2_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("produtos", "foto2", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto3_<?php echo $cnt1; ?>">Foto3:</label></td>
                        <td><input type="file" name="foto3_<?php echo $cnt1; ?>" id="foto3_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("produtos", "foto3", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="promocao_<?php echo $cnt1; ?>">Promocao:</label></td>
                        <td><label>
                          <input name="promocao" type="checkbox" id="promocao" value="Y" <?php if (!(strcmp($row_rsprodutos['promocao'],"Y"))) {echo "checked=\"checked\"";} ?> />
                        </label>
                          <?php echo $tNGs->displayFieldHint("promocao");?> <?php echo $tNGs->displayFieldError("produtos", "promocao", $cnt1); ?> </td>
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
    <td colspan="2"><img src="../../img/rodape.jpg" width="850" height="30" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsMarcas);

mysql_free_result($RsTipo);
?>
