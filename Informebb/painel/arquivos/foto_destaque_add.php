<?php require_once('../../Connections/saquabb.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("arquivo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("arquivo");
  $uploadObj->setDbFieldName("arquivo");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("false", 540, 240);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_foto_destaque = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_foto_destaque);
// Register triggers
$ins_foto_destaque->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_foto_destaque->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_foto_destaque->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_destaque_edite.php");
$ins_foto_destaque->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_foto_destaque->setTable("foto_destaque");
$ins_foto_destaque->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_foto_destaque->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_foto_destaque = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_foto_destaque);
// Register triggers
$upd_foto_destaque->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_foto_destaque->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_foto_destaque->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_destaque_edite.php");
$upd_foto_destaque->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_foto_destaque->setTable("foto_destaque");
$upd_foto_destaque->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_foto_destaque->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_foto_destaque = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_foto_destaque);
// Register triggers
$del_foto_destaque->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_foto_destaque->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_destaque_edite.php");
$del_foto_destaque->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_foto_destaque->setTable("foto_destaque");
$del_foto_destaque->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfoto_destaque = $tNGs->getRecordset("foto_destaque");
$row_rsfoto_destaque = mysql_fetch_assoc($rsfoto_destaque);
$totalRows_rsfoto_destaque = mysql_num_rows($rsfoto_destaque);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/controle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: Painel de controle Saquabb ::</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<link href="painel.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="800" border="1" align="center" cellpadding="4" cellspacing="8" bordercolor="#EA8C06" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#FFFFFF" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#FFFFFF" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EA8C06" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#EA8C06" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto Destaque </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Not&iacute;cia</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Categoria </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Galeria</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">V&iacute;deos</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Perfil</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Coment&aacute;rios</span></th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><p class="style1">Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#7FA14D" scope="row"><span class="style1">Logout</span></th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th bgcolor="#7FA14D" scope="row">&nbsp;</th>
      </tr>
      
      
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#EA8C06" class="Titulo_Branco" scope="col">Adicionar Foto Destaque </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">&nbsp;
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
if (@$totalRows_rsfoto_destaque > 1) {
?>
                    <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                    <?php } 
// endif Conditional region1
?>
                    <table width="577" cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td width="142" class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo [540 X 240]:</label></td>
                        <td width="425"><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("foto_destaque", "arquivo", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_foto_destaque_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfoto_destaque['kt_pk_foto_destaque']); ?>" />
                    <?php } while ($row_rsfoto_destaque = mysql_fetch_assoc($rsfoto_destaque)); ?>
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
          <p>&nbsp;</p></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <th height="40" colspan="2" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Painel Administrativo desenvolvido por: Victor Caetano </th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
