<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
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
  $uploadObj->setResize("true", 500, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_ConBD, $ConBD);
$query_Rs_galeria = "SELECT * FROM galerias ORDER BY id DESC";
$Rs_galeria = mysql_query($query_Rs_galeria, $ConBD) or die(mysql_error());
$row_Rs_galeria = mysql_fetch_assoc($Rs_galeria);
$totalRows_Rs_galeria = mysql_num_rows($Rs_galeria);

// Make an insert transaction instance
$ins_fotos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_fotos);
// Register triggers
$ins_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_editar.php");
$ins_fotos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_fotos->setTable("fotos");
$ins_fotos->addColumn("id", "STRING_TYPE", "POST", "galeria");
$ins_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_fotos);
// Register triggers
$upd_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_editar.php");
$upd_fotos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_fotos->setTable("fotos");
$upd_fotos->addColumn("id", "STRING_TYPE", "POST", "galeria");
$upd_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Make an instance of the transaction object
$del_fotos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_fotos);
// Register triggers
$del_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "foto_editar.php");
$del_fotos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_fotos->setTable("fotos");
$del_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos = $tNGs->getRecordset("fotos");
$row_rsfotos = mysql_fetch_assoc($rsfotos);
$totalRows_rsfotos = mysql_num_rows($rsfotos);
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
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFF66">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
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
        <td class="titulo">Eventos</td>
      </tr>
      <tr>
        <td><a href="evento_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="evento_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Promo&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="promo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="promo_editar.php">Editar/Excluir</a></td>
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
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
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
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Inserir Foto </td>
        </tr>
        <tr>
          <td>&nbsp;
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
if (@$totalRows_rsfotos > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="id_<?php echo $cnt1; ?>">Galeria:</label></td>
                        <td><label>
                          <select name="galeria" id="galeria">
                            <option value="" <?php if (!(strcmp("", $row_rsfotos['id']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Galeria -</option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_Rs_galeria['id']?>"<?php if (!(strcmp($row_Rs_galeria['id'], $row_rsfotos['id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Rs_galeria['titulo']?></option>
                            <?php
} while ($row_Rs_galeria = mysql_fetch_assoc($Rs_galeria));
  $rows = mysql_num_rows($Rs_galeria);
  if($rows > 0) {
      mysql_data_seek($Rs_galeria, 0);
	  $row_Rs_galeria = mysql_fetch_assoc($Rs_galeria);
  }
?>
                          </select>
                        </label>
                          <?php echo $tNGs->displayFieldHint("id");?> <?php echo $tNGs->displayFieldError("fotos", "id", $cnt1); ?> </td></tr>
                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o:</label></td>
                        <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['descricao']); ?>" size="50" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("fotos", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo:</label></td>
                        <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("fotos", "arquivo", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_fotos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfotos['kt_pk_fotos']); ?>" />
                    <?php } while ($row_rsfotos = mysql_fetch_assoc($rsfotos)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['id_foto'] == "") {
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
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por: Lobster Designer" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Rs_galeria);
?>
