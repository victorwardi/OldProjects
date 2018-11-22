<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../fotos/");
  $deleteObj->setDbFieldName("capa");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("capa");
  $uploadObj->setDbFieldName("capa");
  $uploadObj->setFolder("../fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_victor, $victor);
$query_genero = "SELECT * FROM genero ORDER BY tipo ASC";
$genero = mysql_query($query_genero, $victor) or die(mysql_error());
$row_genero = mysql_fetch_assoc($genero);
$totalRows_genero = mysql_num_rows($genero);

// Make an insert transaction instance
$ins_filme = new tNG_multipleInsert($conn_victor);
$tNGs->addTransaction($ins_filme);
// Register triggers
$ins_filme->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_filme->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_filme->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_filme->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_filme->setTable("filme");
$ins_filme->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_filme->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$ins_filme->addColumn("elenco", "STRING_TYPE", "POST", "elenco");
$ins_filme->addColumn("produtora", "STRING_TYPE", "POST", "produtora");
$ins_filme->addColumn("duracao", "STRING_TYPE", "POST", "duracao");
$ins_filme->addColumn("genero", "STRING_TYPE", "POST", "select");
$ins_filme->addColumn("capa", "FILE_TYPE", "FILES", "capa");
$ins_filme->addColumn("lancamento", "CHECKBOX_YN_TYPE", "POST", "lancamento", "Y");
$ins_filme->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_filme = new tNG_multipleUpdate($conn_victor);
$tNGs->addTransaction($upd_filme);
// Register triggers
$upd_filme->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_filme->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_filme->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_filme->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_filme->setTable("filme");
$upd_filme->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_filme->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$upd_filme->addColumn("elenco", "STRING_TYPE", "POST", "elenco");
$upd_filme->addColumn("produtora", "STRING_TYPE", "POST", "produtora");
$upd_filme->addColumn("duracao", "STRING_TYPE", "POST", "duracao");
$upd_filme->addColumn("genero", "STRING_TYPE", "POST", "select");
$upd_filme->addColumn("capa", "FILE_TYPE", "FILES", "capa");
$upd_filme->addColumn("lancamento", "CHECKBOX_YN_TYPE", "POST", "lancamento");
$upd_filme->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_filme = new tNG_multipleDelete($conn_victor);
$tNGs->addTransaction($del_filme);
// Register triggers
$del_filme->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_filme->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_filme->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_filme->setTable("filme");
$del_filme->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfilme = $tNGs->getRecordset("filme");
$row_rsfilme = mysql_fetch_assoc($rsfilme);
$totalRows_rsfilme = mysql_num_rows($rsfilme);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - JrGames</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
#navigation td {
	background-color: #FFC904;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #000000;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	padding-top: 8px;
	padding-right: 6px;
	padding-bottom: 8px;
	padding-left: 8px;
	}
	
#navigation a:hover {
	color:#FFCC00;
	background-color: #FFFFFF;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	font-weight: bolder;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
	font-weight: bolder;
	}
#conteudo td {
	left: 10px;
}
#tabela td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: normal;
	font-weight: bolder;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px solid #666666;
}
#tabela li {
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #666666;
	border-right-color: #666666;
	border-bottom-color: #666666;
	border-left-color: #666666;
}
.borda {
	border: 1px solid #000000;
}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#FFC904"><img src="imagens/topoindex.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#FFC904"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#000000" class="titulo2">Filme</td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Not&iacute;cia</td>
      </tr>
      <tr>
        <td colspan="2"><a href="not_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_add.php">Adicionar Foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      
      <tr>
        <td height="30" colspan="2" class="titulo2">G&ecirc;nero</td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_edite.php">Editar/Excluir</a></td>
        </tr>
      
    </table>
    <p><a href="<?php echo $logoutAction ?>"><img src="imagens/logout.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
	<script language="javascript" type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu",
	
	theme_advanced_buttons2_add : "forecolor,backcolor",
	theme_advanced_buttons1_add : "fontsizeselect",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
      <link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../includes/skins/style.js" type="text/javascript"></script>
      <link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../includes/skins/style.js" type="text/javascript"></script>
      <link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../includes/skins/style.js" type="text/javascript"></script>
      <?php echo $tNGs->displayValidationRules();?>
      <script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
      <script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
      <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}
      </script>
      <table width="100%" border="0" cellpadding="10" cellspacing="0" id="conteudo">
        <tr>
          <td align="left" valign="top"><div class="KT_tng"><h1 class="titulo"><?php 
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
              Filme </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsfilme > 1) {
?>
                      <h2 class="titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="6" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">T&iacute;tulo:</label></td>
                        <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfilme['titulo']); ?>" size="32" maxlength="250" />
                            <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("filme", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="resumo_<?php echo $cnt1; ?>">Sinopse:</label></td>
                        <td><textarea name="resumo_<?php echo $cnt1; ?>" id="resumo_<?php echo $cnt1; ?>" cols="60" rows="5"><?php echo KT_escapeAttribute($row_rsfilme['resumo']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("resumo");?> <?php echo $tNGs->displayFieldError("filme", "resumo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="elenco_<?php echo $cnt1; ?>">Elenco:</label></td>
                        <td><input type="text" name="elenco_<?php echo $cnt1; ?>" id="elenco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfilme['elenco']); ?>" size="32" />
                            <?php echo $tNGs->displayFieldHint("elenco");?> <?php echo $tNGs->displayFieldError("filme", "elenco", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="produtora_<?php echo $cnt1; ?>">Produtora:</label></td>
                        <td><input type="text" name="produtora_<?php echo $cnt1; ?>" id="produtora_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfilme['produtora']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("produtora");?> <?php echo $tNGs->displayFieldError("filme", "produtora", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="duracao_<?php echo $cnt1; ?>">Dura&ccedil;&atilde;o:</label></td>
                        <td><input type="text" name="duracao_<?php echo $cnt1; ?>" id="duracao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfilme['duracao']); ?>" size="30" maxlength="30" />
                            <?php echo $tNGs->displayFieldHint("duracao");?> <?php echo $tNGs->displayFieldError("filme", "duracao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="genero_<?php echo $cnt1; ?>">G&ecirc;nero:</label></td>
                        <td><select name="select">
                          <option value="" <?php if (!(strcmp("", $row_rsfilme['genero']))) {echo "selected=\"selected\"";} ?>>- Selecione o Gênero do Filme -</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_genero['tipo']?>"<?php if (!(strcmp($row_genero['tipo'], $row_rsfilme['genero']))) {echo "selected=\"selected\"";} ?>><?php echo $row_genero['tipo']?></option>
                          <?php
} while ($row_genero = mysql_fetch_assoc($genero));
  $rows = mysql_num_rows($genero);
  if($rows > 0) {
      mysql_data_seek($genero, 0);
	  $row_genero = mysql_fetch_assoc($genero);
  }
?>
                        </select></td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="capa_<?php echo $cnt1; ?>">Capa:</label></td>
                        <td><input type="file" name="capa_<?php echo $cnt1; ?>" id="capa_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("filme", "capa", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="lancamento_<?php echo $cnt1; ?>">Lan&ccedil;amento:</label></td>
                        <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsfilme['lancamento']),"Y"))) {echo "checked";} ?> type="checkbox" name="lancamento_<?php echo $cnt1; ?>" id="lancamento_<?php echo $cnt1; ?>" value="Y" />
                            <?php echo $tNGs->displayFieldError("filme", "lancamento", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_filme_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfilme['kt_pk_filme']); ?>" />
                    <?php } while ($row_rsfilme = mysql_fetch_assoc($rsfilme)); ?>
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
                      <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
                    </div>
                  </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></td>
        </tr>
      </table>
    <?php
	echo $tNGs->getErrorMsg();
?><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#FFC904"><p><span class="resultado_estatistica"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  JrGames VideoLocadora&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($genero);
?>
