<?php require_once('../../Connections/ConBD.php'); ?><?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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
  $deleteObj->setFolder("../../uploads/fotos/");
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
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 215, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_vereadores = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_vereadores);
// Register triggers
$ins_vereadores->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_vereadores->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_vereadores->registerTrigger("END", "Trigger_Default_Redirect", 99, "vereador_editar.php");
$ins_vereadores->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_vereadores->setTable("vereadores");
$ins_vereadores->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_vereadores->addColumn("apelido", "STRING_TYPE", "POST", "apelido");
$ins_vereadores->addColumn("partido", "STRING_TYPE", "POST", "partido");
$ins_vereadores->addColumn("aniversario", "STRING_TYPE", "POST", "aniversario");
$ins_vereadores->addColumn("participacaoNaCamara", "STRING_TYPE", "POST", "participacaoNaCamara");
$ins_vereadores->addColumn("homenageados", "STRING_TYPE", "POST", "homenageados");
$ins_vereadores->addColumn("telefoneGabinete", "STRING_TYPE", "POST", "telefoneGabinete");
$ins_vereadores->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_vereadores->addColumn("site", "STRING_TYPE", "POST", "site");
$ins_vereadores->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_vereadores->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_vereadores->addColumn("login", "STRING_TYPE", "POST", "login");
$ins_vereadores->addColumn("senha", "STRING_TYPE", "POST", "senha");
$ins_vereadores->setPrimaryKey("vereadorID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_vereadores = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_vereadores);
// Register triggers
$upd_vereadores->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_vereadores->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_vereadores->registerTrigger("END", "Trigger_Default_Redirect", 99, "vereador_editar.php");
$upd_vereadores->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_vereadores->setTable("vereadores");
$upd_vereadores->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_vereadores->addColumn("apelido", "STRING_TYPE", "POST", "apelido");
$upd_vereadores->addColumn("partido", "STRING_TYPE", "POST", "partido");
$upd_vereadores->addColumn("aniversario", "STRING_TYPE", "POST", "aniversario");
$upd_vereadores->addColumn("participacaoNaCamara", "STRING_TYPE", "POST", "participacaoNaCamara");
$upd_vereadores->addColumn("homenageados", "STRING_TYPE", "POST", "homenageados");
$upd_vereadores->addColumn("telefoneGabinete", "STRING_TYPE", "POST", "telefoneGabinete");
$upd_vereadores->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_vereadores->addColumn("site", "STRING_TYPE", "POST", "site");
$upd_vereadores->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_vereadores->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_vereadores->addColumn("login", "STRING_TYPE", "POST", "login");
$upd_vereadores->addColumn("senha", "STRING_TYPE", "POST", "senha");
$upd_vereadores->setPrimaryKey("vereadorID", "NUMERIC_TYPE", "GET", "vereadorID");

// Make an instance of the transaction object
$del_vereadores = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_vereadores);
// Register triggers
$del_vereadores->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_vereadores->registerTrigger("END", "Trigger_Default_Redirect", 99, "vereador_editar.php");
$del_vereadores->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_vereadores->setTable("vereadores");
$del_vereadores->setPrimaryKey("vereadorID", "NUMERIC_TYPE", "GET", "vereadorID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsvereadores = $tNGs->getRecordset("vereadores");
$row_rsvereadores = mysql_fetch_assoc($rsvereadores);
$totalRows_rsvereadores = mysql_num_rows($rsvereadores);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<style type="text/css">
<!--
body,td,th {
	color: #666666;
}
body {
	background-color: #ECEFF4;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" bgcolor="#657D99"><table width="100%" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td width="5%" height="87"><a href="../../index.php"><img src="../../img/logo_02.jpg" width="73" height="79" border="0" /></a></td>
        <td width="95%" align="right"><img src="TOPO.jpg" width="650" height="79" /></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FEDDA5"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#657D99"><img src="../../img/titulo_menu_01.gif" width="62" height="12" class="titulo" /></td>
      </tr>
      <tr>
        <td bgcolor="#FEDDA5">&nbsp;</td>
      </tr>
      <tr>
        <td class="titulo">Not&iacute;cias</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="noticia_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="noticia_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos</td>
      </tr>
      <tr>
        <td><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="galeria_editar.php">Editar/Excluir</a></td>
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
        <td class="titulo">Galeria Conhe&ccedil;a a C&acirc;mara</td>
      </tr>
      <tr>
        <td><a href="camara_inserir.php">Inserir Foto</a></td>
      </tr>
      <tr>
        <td><a href="camara_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td class="titulo">Lei</td>
      </tr>
      <tr>
        <td><a href="lei_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="lei_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Indica&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="inscricao_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="inscricao_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Licita&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="licitacao_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="licitacao_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Vereador</td>
      </tr>
      <tr>
        <td><a href="vereador_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="vereador_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Comiss&otilde;es</td>
      </tr>
      <tr>
        <td><a href="comissoes_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="comissoes_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Mesa Diretora</td>
      </tr>
      
      <tr>
        <td><a href="mesa_inserir.php?MesaID=1">Editar</a></td>
      </tr>
      
      <tr>
        <td bgcolor="#657D99" class="titulo">Logout</td>
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
    <script language="javascript" type="text/javascript" src="../../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple"
});
</script>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Vereador</td>
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
if (@$totalRows_rsvereadores > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['nome']); ?>" size="50" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("vereadores", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="apelido_<?php echo $cnt1; ?>">Como &eacute; conhecido:</label></td>
                        <td><input type="text" name="apelido_<?php echo $cnt1; ?>" id="apelido_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['apelido']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("apelido");?> <?php echo $tNGs->displayFieldError("vereadores", "apelido", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="partido_<?php echo $cnt1; ?>">Partido:</label></td>
                        <td><input type="text" name="partido_<?php echo $cnt1; ?>" id="partido_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['partido']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("partido");?> <?php echo $tNGs->displayFieldError("vereadores", "partido", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="aniversario_<?php echo $cnt1; ?>">Anivers&aacute;rio:</label></td>
                        <td><input type="text" name="aniversario_<?php echo $cnt1; ?>" id="aniversario_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['aniversario']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("aniversario");?> <?php echo $tNGs->displayFieldError("vereadores", "aniversario", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="participacaoNaCamara_<?php echo $cnt1; ?>">Participacao na C&acirc;mara:</label></td>
                        <td><textarea name="participacaoNaCamara_<?php echo $cnt1; ?>" id="participacaoNaCamara_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsvereadores['participacaoNaCamara']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("participacaoNaCamara");?> <?php echo $tNGs->displayFieldError("vereadores", "participacaoNaCamara", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="homenageados_<?php echo $cnt1; ?>">Homenageados:</label></td>
                        <td><textarea name="homenageados_<?php echo $cnt1; ?>" id="homenageados_<?php echo $cnt1; ?>" cols="50" rows="10"><?php echo KT_escapeAttribute($row_rsvereadores['homenageados']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("homenageados");?> <?php echo $tNGs->displayFieldError("vereadores", "homenageados", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="telefoneGabinete_<?php echo $cnt1; ?>">Telefone Gabinete:</label></td>
                        <td><input type="text" name="telefoneGabinete_<?php echo $cnt1; ?>" id="telefoneGabinete_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['telefoneGabinete']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("telefoneGabinete");?> <?php echo $tNGs->displayFieldError("vereadores", "telefoneGabinete", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="telefone_<?php echo $cnt1; ?>">Telefone:</label></td>
                        <td><input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['telefone']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("vereadores", "telefone", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="site_<?php echo $cnt1; ?>">Site:</label></td>
                        <td><input type="text" name="site_<?php echo $cnt1; ?>" id="site_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['site']); ?>" size="40" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("site");?> <?php echo $tNGs->displayFieldError("vereadores", "site", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                        <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['email']); ?>" size="40" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("vereadores", "email", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                        <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("vereadores", "foto", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="login_<?php echo $cnt1; ?>">Login:</label></td>
                        <td><input type="text" name="login_<?php echo $cnt1; ?>" id="login_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['login']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("login");?> <?php echo $tNGs->displayFieldError("vereadores", "login", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="senha_<?php echo $cnt1; ?>">Senha:</label></td>
                        <td><input type="text" name="senha_<?php echo $cnt1; ?>" id="senha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsvereadores['senha']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("senha");?> <?php echo $tNGs->displayFieldError("vereadores", "senha", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_vereadores_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsvereadores['kt_pk_vereadores']); ?>" />
                    <?php } while ($row_rsvereadores = mysql_fetch_assoc($rsvereadores)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['vereadorID'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'vereadorID')" />
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
    <td colspan="2" bgcolor="#8C9EB4"><div align="center">
      <table width="730" border="0" cellspacing="0" cellpadding="0">
        <tr class="txt_01">
          <td><div align="left"><span class="txt_03">&copy; 2008 C&acirc;mara Municipal de Mangaratiba - Todos os direitos reservados.</span></div></td>
          <td height="25"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../../img/logo_lobster_01.gif" width="83" height="23" border="0" /></a></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
