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
  $uploadObj->setResize("true", 134, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_usuarios = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_usuarios);
// Register triggers
$ins_usuarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_usuarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_usuarios->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_usuarios->setTable("usuarios");
$ins_usuarios->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_usuarios->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_usuarios->addColumn("senha", "STRING_TYPE", "POST", "senha");
$ins_usuarios->addColumn("turma", "STRING_TYPE", "POST", "turma");
$ins_usuarios->addColumn("serie", "STRING_TYPE", "POST", "serie");
$ins_usuarios->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_usuarios->setPrimaryKey("id_usuario", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_usuarios = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_usuarios);
// Register triggers
$upd_usuarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_usuarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_usuarios->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_usuarios->setTable("usuarios");
$upd_usuarios->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_usuarios->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_usuarios->addColumn("senha", "STRING_TYPE", "POST", "senha");
$upd_usuarios->addColumn("turma", "STRING_TYPE", "POST", "turma");
$upd_usuarios->addColumn("serie", "STRING_TYPE", "POST", "serie");
$upd_usuarios->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_usuarios->setPrimaryKey("id_usuario", "NUMERIC_TYPE", "GET", "id_usuario");

// Make an instance of the transaction object
$del_usuarios = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_usuarios);
// Register triggers
$del_usuarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_usuarios->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_usuarios->setTable("usuarios");
$del_usuarios->setPrimaryKey("id_usuario", "NUMERIC_TYPE", "GET", "id_usuario");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsusuarios = $tNGs->getRecordset("usuarios");
$row_rsusuarios = mysql_fetch_assoc($rsusuarios);
$totalRows_rsusuarios = mysql_num_rows($rsusuarios);
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
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg_01.gif);
	background-color: #009CE7;
}
.style2 {
	color: #008BE1;
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="topo.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="2">
      <tr>
        <td bgcolor="#DEE7F8" class="style2">Menu</td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">V&iacute;deos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Agenda</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
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
          <td class="titulo">Titulo</td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1>
                <?php 
// Show IF Conditional region1 
if (@$_GET['id_usuario'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
                Usuarios </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsusuarios > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['nome']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("usuarios", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                        <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['email']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("usuarios", "email", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="senha_<?php echo $cnt1; ?>">Senha:</label></td>
                        <td><input type="text" name="senha_<?php echo $cnt1; ?>" id="senha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['senha']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("senha");?> <?php echo $tNGs->displayFieldError("usuarios", "senha", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="turma_<?php echo $cnt1; ?>">Turma:</label></td>
                        <td><input type="text" name="turma_<?php echo $cnt1; ?>" id="turma_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['turma']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("turma");?> <?php echo $tNGs->displayFieldError("usuarios", "turma", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="serie_<?php echo $cnt1; ?>">Serie:</label></td>
                        <td><input type="text" name="serie_<?php echo $cnt1; ?>" id="serie_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['serie']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("serie");?> <?php echo $tNGs->displayFieldError("usuarios", "serie", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                        <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("usuarios", "foto", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_usuarios_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsusuarios['kt_pk_usuarios']); ?>" />
                    <?php } while ($row_rsusuarios = mysql_fetch_assoc($rsusuarios)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['id_usuario'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_usuario')" />
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
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
