<?php require_once('../../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../../");

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_galeria_ex = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_galeria_ex);
// Register triggers
$ins_galeria_ex->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_galeria_ex->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_galeria_ex->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$ins_galeria_ex->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_galeria_ex->setTable("galeria_ex");
$ins_galeria_ex->addColumn("turma", "STRING_TYPE", "POST", "turma");
$ins_galeria_ex->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_galeria_ex->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_galeria_ex->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_galeria_ex->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_galeria_ex->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_galeria_ex = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_galeria_ex);
// Register triggers
$upd_galeria_ex->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_galeria_ex->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_galeria_ex->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$upd_galeria_ex->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_galeria_ex->setTable("galeria_ex");
$upd_galeria_ex->addColumn("turma", "STRING_TYPE", "POST", "turma");
$upd_galeria_ex->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_galeria_ex->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_galeria_ex->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_galeria_ex->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_galeria_ex->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_galeria_ex = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_galeria_ex);
// Register triggers
$del_galeria_ex->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_galeria_ex->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$del_galeria_ex->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_galeria_ex->setTable("galeria_ex");
$del_galeria_ex->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgaleria_ex = $tNGs->getRecordset("galeria_ex");
$row_rsgaleria_ex = mysql_fetch_assoc($rsgaleria_ex);
$totalRows_rsgaleria_ex = mysql_num_rows($rsgaleria_ex);

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
	
  $logoutGoTo = "../../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../../uploads/fotos/");
  $deleteObj->setDbFieldName("imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger
?>
<?php
//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../../../uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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
?>
<?php
mysql_select_db($database_ConBD, $ConBD);
$query_RsTurmas = "SELECT * FROM turma ORDER BY turma ASC";
$RsTurmas = mysql_query($query_RsTurmas, $ConBD) or die(mysql_error());
$row_RsTurmas = mysql_fetch_assoc($RsTurmas);
$totalRows_RsTurmas = mysql_num_rows($RsTurmas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/novo_painel.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../../../css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
	left: 414px;
	top: 260px;
}
-->
</style>
<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<!-- InstanceEndEditable -->
<link href="../../../painel/arquivos/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="../../../img/bg_01.gif"><div align="left"><a href="../../../index.php"><img src="../../../img/logo.gif" width="198" height="138" border="0" /></a></div></td>
            <td width="770" height="180" valign="top" background="../../../img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="middle"><div align="center"><img src="../../../img/logo_02.gif" width="419" height="101" /></div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../../../img/div_02.gif"><div align="left">
                          <table width="740" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">Voc&ecirc; est&aacute; em &gt; </div></td>
                              <td width="100" class="titulo_01"><a href="../../../index.php">p&aacute;gina inicial &gt; </a></td>
                              <td width="69" class="titulo_01"><div align="left"><a href="../../../aescola/index.php">a escola &gt;</a></div></td>
                              <td width="471" class="titulo_01"><div align="left">&Aacute;rea Exclusiva &gt; Painel Administrativo</div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="540" align="center" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="540" align="left" valign="top" background="../../../img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td height="300" colspan="2"><div align="left">
                    <table width="98%" border="0" align="left" cellpadding="4" cellspacing="2">
                      
                      <tr>
                        <td align="left" bgcolor="#CFDFEF" class="txt_big_01">MENU</td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Alunos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_aluno.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="aluno_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Turmas</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_turma.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="turma_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">Fotos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_foto.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="fotos_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">&Aacute;lbuns</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_album.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="album_editar.php">Editar/Excluir</a></td>
                      </tr>
                      <tr>
                        <td align="left" class="form_01">V&iacute;deos</td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="inserir_video.php">Inserir</a></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#CFDFEF"><a href="video_editar.php">Editar/Excluir</a></td>
                      </tr>
                    </table>
                  </div>                    <div align="right"></div></td>
                  </tr>
                <tr>
                  <td width="6"><div align="left"></div></td>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
            <td width="30" height="540" align="left" valign="top"><div align="left"></div></td>
            <td width="740" height="540" align="left" valign="top"><div align="left">
              <table width="740" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="24" valign="middle" bgcolor="#008BE1"><div align="right">
                    <table width="200" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="180" class="txt_01"><div align="right"><a href="<?php echo $logoutAction ?>">Sair</a></div></td>
                        <td width="20"><div align="left"></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                
                <tr>
                  <td height="26"><!-- InstanceBeginEditable name="conteudo" -->
<div class="KT_tng"><h1 class="data_02">
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
          &Aacute;lbum</h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rsgaleria_ex > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="turma_<?php echo $cnt1; ?>">Turma:</label></td>
                <td><select name="turma" id="turma">
                  <option value="- não selecionou -" <?php if (!(strcmp("- não selecionou -", $row_rsgaleria_ex['turma']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Turma</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_RsTurmas['turma']?>"<?php if (!(strcmp($row_RsTurmas['turma'], $row_rsgaleria_ex['turma']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsTurmas['turma']?></option>
                  <?php
} while ($row_RsTurmas = mysql_fetch_assoc($RsTurmas));
  $rows = mysql_num_rows($RsTurmas);
  if($rows > 0) {
      mysql_data_seek($RsTurmas, 0);
	  $row_RsTurmas = mysql_fetch_assoc($RsTurmas);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldHint("turma");?> <?php echo $tNGs->displayFieldError("galeria_ex", "turma", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgaleria_ex['titulo']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("galeria_ex", "titulo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
                <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgaleria_ex['data']); ?>" size="10" maxlength="10" />
                    <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("galeria_ex", "data", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgaleria_ex['descricao']); ?>" size="32" maxlength="100" />
                    <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("galeria_ex", "descricao", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
                <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("galeria_ex", "imagem", $cnt1); ?> </td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_galeria_ex_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsgaleria_ex['kt_pk_galeria_ex']); ?>" />
            <?php } while ($row_rsgaleria_ex = mysql_fetch_assoc($rsgaleria_ex)); ?>
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
              <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../../includes/nxt/back.php')" />
            </div>
          </div>
        </form>
      </div>
      <br class="clearfixplain" />
    </div>
    <p>&nbsp;</p>
    <link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
    <script src="../../../includes/common/js/base.js" type="text/javascript"></script>
    <script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
    <script src="../../../includes/skins/style.js" type="text/javascript"></script>
    <?php echo $tNGs->displayValidationRules();?>
    <script src="../../../includes/nxt/scripts/form.js" type="text/javascript"></script>
    <script src="../../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
    <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
    </script>
                  <!-- InstanceEndEditable --></td>
                </tr>
                <tr>
                  <td height="26">&nbsp;</td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="../../../img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="../../../img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="../../../img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="../../../comochegar/index.html"><img src="../../../img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="../../../img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../../../img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsTurmas);
?>
