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

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/fotos/");
  $deleteObj->setDbFieldName("titulo_img");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("titulo_img");
  $uploadObj->setDbFieldName("titulo_img");
  $uploadObj->setFolder("../../Uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_ConBD, $ConBD);
$query_RsCat_inseridas = "SELECT * FROM categoria_novidade ORDER BY categoria ASC";
$RsCat_inseridas = mysql_query($query_RsCat_inseridas, $ConBD) or die(mysql_error());
$row_RsCat_inseridas = mysql_fetch_assoc($RsCat_inseridas);
$totalRows_RsCat_inseridas = mysql_num_rows($RsCat_inseridas);

// Make an insert transaction instance
$ins_categoria_novidade = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_categoria_novidade);
// Register triggers
$ins_categoria_novidade->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_categoria_novidade->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_categoria_novidade->registerTrigger("END", "Trigger_Default_Redirect", 99, "categoria_novidade_editar.php");
$ins_categoria_novidade->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_categoria_novidade->setTable("categoria_novidade");
$ins_categoria_novidade->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_categoria_novidade->addColumn("titulo_img", "FILE_TYPE", "FILES", "titulo_img");
$ins_categoria_novidade->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_categoria_novidade = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_categoria_novidade);
// Register triggers
$upd_categoria_novidade->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_categoria_novidade->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_categoria_novidade->registerTrigger("END", "Trigger_Default_Redirect", 99, "categoria_novidade_editar.php");
$upd_categoria_novidade->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_categoria_novidade->setTable("categoria_novidade");
$upd_categoria_novidade->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_categoria_novidade->addColumn("titulo_img", "FILE_TYPE", "FILES", "titulo_img");
$upd_categoria_novidade->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_categoria_novidade = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_categoria_novidade);
// Register triggers
$del_categoria_novidade->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_categoria_novidade->registerTrigger("END", "Trigger_Default_Redirect", 99, "categoria_novidade_editar.php");
$del_categoria_novidade->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_categoria_novidade->setTable("categoria_novidade");
$del_categoria_novidade->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscategoria_novidade = $tNGs->getRecordset("categoria_novidade");
$row_rscategoria_novidade = mysql_fetch_assoc($rscategoria_novidade);
$totalRows_rscategoria_novidade = mysql_num_rows($rscategoria_novidade);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
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
  show_as_grid: true,
  merge_down_value: true
}
      </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Inserir Categoria de Novidades </td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" enctype="multipart/form-data" id="form1">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rscategoria_novidade > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="txt_06">
                      <tr>
                        <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                        <td><input type="text" name="categoria_<?php echo $cnt1; ?>" id="categoria_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscategoria_novidade['categoria']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("categoria_novidade", "categoria", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="titulo_img_<?php echo $cnt1; ?>">Imagem Titulo:</label></td>
                        <td><input type="file" name="titulo_img_<?php echo $cnt1; ?>" id="titulo_img_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("categoria_novidade", "titulo_img", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <br />
                    <input type="hidden" name="kt_pk_categoria_novidade_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscategoria_novidade['kt_pk_categoria_novidade']); ?>" />
                    <?php } while ($row_rscategoria_novidade = mysql_fetch_assoc($rscategoria_novidade)); ?>
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
                <table width="300" border="0">
                  <tr>
                    <td><fieldset><legend>Categorias Inseridas</legend>
                        <?php do { ?>
                          <table width="300" border="0" cellpadding="2" cellspacing="2" class="linhaembaixo03">
                            <tr>
                              <td align="left" valign="middle" class="txt_06"><?php echo $row_RsCat_inseridas['categoria']; ?></td>
                            </tr>
                          </table>
                          <?php } while ($row_RsCat_inseridas = mysql_fetch_assoc($RsCat_inseridas)); ?></fieldset>
                    
                     </td>
                  </tr>
                </table>
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
mysql_free_result($RsCat_inseridas);
?>
