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

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../../uploads/fotos/");
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
  $uploadObj->setFolder("../../../uploads/fotos/");
  $uploadObj->setResize("true", 134, 0);
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

mysql_select_db($database_ConBD, $ConBD);
$query_RsTurma = "SELECT * FROM turma order by turma asc";
$RsTurma = mysql_query($query_RsTurma, $ConBD) or die(mysql_error());
$row_RsTurma = mysql_fetch_assoc($RsTurma);
$totalRows_RsTurma = mysql_num_rows($RsTurma);

$colname_RsFoto = "-1";
if (isset($_GET['id_usuario'])) {
  $colname_RsFoto = $_GET['id_usuario'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsFoto = sprintf("SELECT * FROM usuarios WHERE id_usuario = %s", GetSQLValueString($colname_RsFoto, "int"));
$RsFoto = mysql_query($query_RsFoto, $ConBD) or die(mysql_error());
$row_RsFoto = mysql_fetch_assoc($RsFoto);
$totalRows_RsFoto = mysql_num_rows($RsFoto);

// Make an insert transaction instance
$ins_usuarios = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_usuarios);
// Register triggers
$ins_usuarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_usuarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
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
$upd_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
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
$del_usuarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/novo_painel.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>|| Oficina Criativa ||</title>
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
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
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
                  <td height="26"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
                      <script src="../../../includes/nxt/scripts/form.js" type="text/javascript"></script>
                      <script src="../../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
                      <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
                      </script>
                    <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td align="left" valign="top">&nbsp;<span class="data_02">
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
                              Aluno</span>
                              <div class="KT_tng">
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
                                  <table cellpadding="4" cellspacing="0" class="KT_tngtable">
                                    
                                    
                                    <tr>
                                      <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                                      <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['nome']); ?>" size="60" maxlength="200" />
                                          <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("usuarios", "nome", $cnt1); ?> </td>
                                      <td width="105" rowspan="5" align="center" valign="top"><?php if ($totalRows_RsFoto > 0) { // Show if recordset not empty ?>
                                        <img src="<?php echo tNG_showDynamicImage("../../../", "../../../uploads/fotos/", "{rsusuarios.foto}");?>" class="borda_azul" />
                                        <?php } // Show if recordset not empty ?></td>
                                    </tr>
                                    <tr>
                                      <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                                      <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['email']); ?>" size="40" maxlength="200" />
                                          <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("usuarios", "email", $cnt1); ?> </td>
                                      </tr>
                                    <tr>
                                      <td class="KT_th"><label for="senha_<?php echo $cnt1; ?>">Senha:</label></td>
                                      <td><input type="text" name="senha_<?php echo $cnt1; ?>" id="senha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusuarios['senha']); ?>" size="25" maxlength="100" />
                                          <?php echo $tNGs->displayFieldHint("senha");?> <?php echo $tNGs->displayFieldError("usuarios", "senha", $cnt1); ?> </td>
                                      </tr>
                                    <tr>
                                      <td class="KT_th"><label for="turma_<?php echo $cnt1; ?>">Turma:</label></td>
                                      <td><label>
                                        <select name="turma" id="turma">
                                          <option value="- não selecionou - " <?php if (!(strcmp("- não selecionou - ", $row_rsusuarios['turma']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Turma -</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_RsTurma['turma']?>"<?php if (!(strcmp($row_RsTurma['turma'], $row_rsusuarios['turma']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsTurma['turma']?></option>
                                          <?php
} while ($row_RsTurma = mysql_fetch_assoc($RsTurma));
  $rows = mysql_num_rows($RsTurma);
  if($rows > 0) {
      mysql_data_seek($RsTurma, 0);
	  $row_RsTurma = mysql_fetch_assoc($RsTurma);
  }
?>
                                        </select>
                                      </label>
                                        <?php echo $tNGs->displayFieldHint("turma");?> <?php echo $tNGs->displayFieldError("usuarios", "turma", $cnt1); ?> </td>
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
                                    <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../../includes/nxt/back.php')" />
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
mysql_free_result($RsTurma);

mysql_free_result($RsFoto);
?>
