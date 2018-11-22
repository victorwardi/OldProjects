<?php require_once('../../Connections/CostaverdeFM.php'); ?>
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
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_anuncios = new tNG_multipleInsert($conn_CostaverdeFM);
$tNGs->addTransaction($ins_anuncios);
// Register triggers
$ins_anuncios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_anuncios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_anuncios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_anuncios->setTable("anuncios");
$ins_anuncios->addColumn("empresa", "STRING_TYPE", "POST", "empresa");
$ins_anuncios->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_anuncios->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$ins_anuncios->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_anuncios->addColumn("banner", "FILE_TYPE", "FILES", "banner");
$ins_anuncios->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_anuncios = new tNG_multipleUpdate($conn_CostaverdeFM);
$tNGs->addTransaction($upd_anuncios);
// Register triggers
$upd_anuncios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_anuncios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_anuncios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_anuncios->setTable("anuncios");
$upd_anuncios->addColumn("empresa", "STRING_TYPE", "POST", "empresa");
$upd_anuncios->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_anuncios->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$upd_anuncios->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_anuncios->addColumn("banner", "FILE_TYPE", "FILES", "banner");
$upd_anuncios->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_anuncios = new tNG_multipleDelete($conn_CostaverdeFM);
$tNGs->addTransaction($del_anuncios);
// Register triggers
$del_anuncios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_anuncios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_anuncios->setTable("anuncios");
$del_anuncios->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsanuncios = $tNGs->getRecordset("anuncios");
$row_rsanuncios = mysql_fetch_assoc($rsanuncios);
$totalRows_rsanuncios = mysql_num_rows($rsanuncios);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle Costa Verde FM</title>
<!-- InstanceEndEditable -->
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../../painel/topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/home.php">Home</a></th>
          </tr>
        </table></th>
      </tr>
      
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fotos </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/foto_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Galerias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/galeria_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Top 12 </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <th scope="row"><a href="../../painel/arquivos/top_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Mp3</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/mp3_edite.php"> Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Recados</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="row"><a href="../../painel/arquivos/recados_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fique Ligado </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/ligado_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Promo&ccedil;&otilde;es</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/promo_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Equipe</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/equipe_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Programa</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="../../painel/arquivos/programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="../../painel/arquivos/programa_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
        </script>
		
		
		   <!-- TinyMCE-->
        <script language="javascript" type="text/javascript" src="../../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	plugins : "emotions",
	
	theme_advanced_buttons3_add : "emotions,",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>

<!--FIM -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1>
                <?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
                Anuncios </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsanuncios > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="empresa_<?php echo $cnt1; ?>">Empresa:</label></td>
                        <td><input type="text" name="empresa_<?php echo $cnt1; ?>" id="empresa_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsanuncios['empresa']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("empresa");?> <?php echo $tNGs->displayFieldError("anuncios", "empresa", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="telefone_<?php echo $cnt1; ?>">Telefone:</label></td>
                        <td><input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsanuncios['telefone']); ?>" size="30" maxlength="30" />
                            <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("anuncios", "telefone", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="endereco_<?php echo $cnt1; ?>">Endereco:</label></td>
                        <td><input type="text" name="endereco_<?php echo $cnt1; ?>" id="endereco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsanuncios['endereco']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("anuncios", "endereco", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                        <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsanuncios['descricao']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("anuncios", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="banner_<?php echo $cnt1; ?>">Banner:</label></td>
                        <td><input type="file" name="banner_<?php echo $cnt1; ?>" id="banner_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("anuncios", "banner", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_anuncios_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsanuncios['kt_pk_anuncios']); ?>" />
                    <?php } while ($row_rsanuncios = mysql_fetch_assoc($rsanuncios)); ?>
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
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#3A9456"><span class="fonte11px_branca_negrito">Painel de Controle Desenvolvido por Victor Caetano e Ded&eacute; Siqueira </span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
