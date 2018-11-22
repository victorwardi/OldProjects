<?php require_once('../Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Inserir seu nome");
$formValidation->addField("data_nasc", true, "text", "", "", "", "Inserir sua data de nascimento");
$formValidation->addField("local_de", true, "text", "", "", "", "Inserir sua localidade");
$formValidation->addField("picos_preferidos", true, "text", "", "", "", "Inserir seus picos preferidos");
$formValidation->addField("prancha", true, "text", "", "", "", "Inserir a marca da sua prancha");
$formValidation->addField("pe_pato", true, "text", "", "", "", "Inserir a marca do seu pé-de-pato");
$formValidation->addField("tempo_de_bb", true, "text", "", "", "", "Inserir o tempo que você pratica o bodyboarding");
$formValidation->addField("patrocinio", true, "text", "", "", "", "Inserir seus patrocinios e apoios");
$formValidation->addField("manobra", true, "text", "", "", "", "Inserir sua manobra preferida");
$formValidation->addField("idolo", true, "text", "", "", "", "Inserir sua manobra preferida");
$formValidation->addField("filme", true, "text", "", "", "", "Inserir seu Filme de BB preferido");
$formValidation->addField("atividades", true, "text", "", "", "", "Inserir suas outras atividades");
$formValidation->addField("recado", true, "text", "", "", "", "Deixe um racado pra Galera do Saquabb");
$formValidation->addField("foto", true, "", "", "", "", "Insira sua foto");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../perfil/fotos/");
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
  $uploadObj->setFolder("../perfil/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(200);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil";
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);


// Make an insert transaction instance
$ins_perfil = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_perfil);
// Register triggers
$ins_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
$ins_perfil->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_perfil->setTable("perfil");
$ins_perfil->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_perfil->addColumn("data_nasc", "STRING_TYPE", "POST", "data_nasc");
$ins_perfil->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_perfil->addColumn("local_de", "STRING_TYPE", "POST", "local_de");
$ins_perfil->addColumn("picos_preferidos", "STRING_TYPE", "POST", "picos_preferidos");
$ins_perfil->addColumn("prancha", "STRING_TYPE", "POST", "prancha");
$ins_perfil->addColumn("pe_pato", "STRING_TYPE", "POST", "pe_pato");
$ins_perfil->addColumn("tempo_de_bb", "STRING_TYPE", "POST", "tempo_de_bb");
$ins_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$ins_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$ins_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$ins_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$ins_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$ins_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$ins_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_perfil->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_perfil = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_perfil);
// Register triggers
$upd_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_perfil->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_perfil->setTable("perfil");
$upd_perfil->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_perfil->addColumn("data_nasc", "STRING_TYPE", "POST", "data_nasc");
$upd_perfil->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_perfil->addColumn("local_de", "STRING_TYPE", "POST", "local_de");
$upd_perfil->addColumn("picos_preferidos", "STRING_TYPE", "POST", "picos_preferidos");
$upd_perfil->addColumn("prancha", "STRING_TYPE", "POST", "prancha");
$upd_perfil->addColumn("pe_pato", "STRING_TYPE", "POST", "pe_pato");
$upd_perfil->addColumn("tempo_de_bb", "STRING_TYPE", "POST", "tempo_de_bb");
$upd_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$upd_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$upd_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$upd_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$upd_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$upd_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$upd_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_perfil = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_perfil);
// Register triggers
$del_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_perfil->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_perfil->setTable("perfil");
$del_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsperfil = $tNGs->getRecordset("perfil");
$row_rsperfil = mysql_fetch_assoc($rsperfil);
$totalRows_rsperfil = mysql_num_rows($rsperfil);

 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastre-se!</title>
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
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<style type="text/css">
<!--

.style2 {font-size: 12px}
-->
</style>
<link href="css_form.css" rel="stylesheet" type="text/css" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<table id="form" width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="550" valign="baseline" bgcolor="#BAE9D5"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <img src="../imagens/formulario.jpg" width="550" height="80" />
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsperfil > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table id="form2" border="0" cellpadding="0" cellspacing="1" >
        <tr>
          <td width="213"  class="KT_th"><label for="nome_<?php echo $cnt1; ?>" class="fonte">Nome:</label></td>
          <td width="334"><input name="nome_<?php echo $cnt1; ?>" type="text" class="box" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['nome']); ?>" size="58" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("perfil", "nome", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="data_nasc_<?php echo $cnt1; ?>" class="fonte">Data de Nascimento (ex: 01/02/88): </label></td>
          <td bordercolor="#000000"><input name="data_nasc_<?php echo $cnt1; ?>" type="text" class="box" id="data_nasc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['data_nasc']); ?>" size="20" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("data_nasc");?> <?php echo $tNGs->displayFieldError("perfil", "data_nasc", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="mail_<?php echo $cnt1; ?>" class="fonte">E-mail:</label></td>
          <td><input name="mail_<?php echo $cnt1; ?>" type="text" class="box" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['mail']); ?>" size="40" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("perfil", "mail", $cnt1); ?> </span></td>
        </tr>
        <tr>
          <td class="KT_th"><label for="local_de_<?php echo $cnt1; ?>" class="fonte">Local de (cidade onde mora):</label></td>
          <td bordercolor="#000000"><input name="local_de_<?php echo $cnt1; ?>" type="text" class="box" id="local_de_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['local_de']); ?>" size="40" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("local_de");?> <?php echo $tNGs->displayFieldError("perfil", "local_de", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="picos_preferidos_<?php echo $cnt1; ?>" class="fonte">Picos Preferidos:</label></td>
          <td bordercolor="#000000"><input name="picos_preferidos_<?php echo $cnt1; ?>" type="text" class="box" id="picos_preferidos_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['picos_preferidos']); ?>" size="50" maxlength="100" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("picos_preferidos");?> <?php echo $tNGs->displayFieldError("perfil", "picos_preferidos", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="prancha_<?php echo $cnt1; ?>" class="fonte">Prancha (marca):</label></td>
          <td bordercolor="#000000"><input name="prancha_<?php echo $cnt1; ?>" type="text" class="box" id="prancha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['prancha']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("prancha");?> <?php echo $tNGs->displayFieldError("perfil", "prancha", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="pe_pato_<?php echo $cnt1; ?>" class="fonte">P&eacute;-de-pato:</label></td>
          <td bordercolor="#000000"><input name="pe_pato_<?php echo $cnt1; ?>" type="text" class="box" id="pe_pato_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['pe_pato']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("pe_pato");?> <?php echo $tNGs->displayFieldError("perfil", "pe_pato", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="tempo_de_bb_<?php echo $cnt1; ?>" class="fonte">Tempo que pratica o BB: </label></td>
          <td bordercolor="#000000"><input name="tempo_de_bb_<?php echo $cnt1; ?>" type="text" class="box" id="tempo_de_bb_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['tempo_de_bb']); ?>" size="15" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("tempo_de_bb");?> <?php echo $tNGs->displayFieldError("perfil", "tempo_de_bb", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="patrocinio_<?php echo $cnt1; ?>" class="fonte">Patroc&iacute;nio/Apoio:</label></td>
          <td bordercolor="#000000"><input name="patrocinio_<?php echo $cnt1; ?>" type="text" class="box" id="patrocinio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['patrocinio']); ?>" size="58" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("patrocinio");?> <span class="erro"><?php echo $tNGs->displayFieldError("perfil", "patrocinio", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="manobra_<?php echo $cnt1; ?>" class="fonte">Manobra Preferida:</label></td>
          <td bordercolor="#000000"><input name="manobra_<?php echo $cnt1; ?>" type="text" class="box" id="manobra_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['manobra']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("manobra");?> <?php echo $tNGs->displayFieldError("perfil", "manobra", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="idolo_<?php echo $cnt1; ?>" class="fonte">&Iacute;dolo do Esporte:</label></td>
          <td bordercolor="#000000"><input name="idolo_<?php echo $cnt1; ?>" type="text" class="box" id="idolo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['idolo']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("idolo");?> <?php echo $tNGs->displayFieldError("perfil", "idolo", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="filme_<?php echo $cnt1; ?>" class="fonte">Filme de BB:</label></td>
          <td bordercolor="#000000"><input name="filme_<?php echo $cnt1; ?>" type="text" class="box" id="filme_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['filme']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("filme");?> <?php echo $tNGs->displayFieldError("perfil", "filme", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="atividades_<?php echo $cnt1; ?>" class="fonte">Outras Atividades:</label></td>
          <td><input name="atividades_<?php echo $cnt1; ?>" type="text" class="box" id="atividades_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['atividades']); ?>" size="58" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("atividades");?> <?php echo $tNGs->displayFieldError("perfil", "atividades", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="recado_<?php echo $cnt1; ?>" class="fonte">Deixe seu recado pra galera do Saquabb:</label></td>
          <td><textarea name="recado_<?php echo $cnt1; ?>" cols="50" rows="5" class="box" id="recado_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsperfil['recado']); ?></textarea>
              <span class="erro"><?php echo $tNGs->displayFieldHint("recado");?> <?php echo $tNGs->displayFieldError("perfil", "recado", $cnt1); ?> </span></td>
        </tr>
        <tr>
          <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>" class="fonte">Foto:<br />
                <span class="erro">OBS: Foto de boa qualidade do<br />
                  seu rosto com no maximo de <em>200Kb</em></span> </label></td>
          <td><input name="foto_<?php echo $cnt1; ?>" type="file" class="box" id="foto_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("perfil", "foto", $cnt1); ?> </td>
        </tr>
      </table>
      <div align="center"><span class="form_validation_field_error_error_message style2"><br />
        </span><span class="erro">*Favor Preencher todos os campos! </span><br />
        <input type="hidden" name="kt_pk_perfil_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsperfil['kt_pk_perfil']); ?>" />
        <span class="KT_textnav">
        <input name="KT_Insert1" type="submit" class="inserir" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
        </span></div>
      <?php } while ($row_rsperfil = mysql_fetch_assoc($rsperfil)); ?>
    </form></td>
  </tr>
</table>
<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($perfil);
?>
