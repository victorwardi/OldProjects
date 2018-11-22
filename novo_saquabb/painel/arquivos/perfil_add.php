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
  $deleteObj->setFolder("../../perfil/fotos/");
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
  $uploadObj->setFolder("../../perfil/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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
$ins_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$ins_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$ins_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$ins_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$ins_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$ins_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$ins_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_perfil->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado", "");
$ins_perfil->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_perfil = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_perfil);
// Register triggers
$upd_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
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
$upd_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$upd_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$upd_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$upd_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$upd_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$upd_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$upd_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_perfil->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado");
$upd_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_perfil = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_perfil);
// Register triggers
$del_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
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
</head>

<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#E6F9FD" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#E6F9FD" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" bgcolor="#017C9E" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#017C9E" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Not&iacute;cia</th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Se&ccedil;&atilde;o de Not&iacute;cias </th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Foto</th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Galeria</th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos</th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos Enviados </th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Perfil</th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Festas</th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Vem ai </th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Coment&aacute;rios</th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Coment&aacute;rios Gabriel</p>          </th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#E6F9FD" scope="row">Logout</th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#E6F9FD"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#017C9E" class="Titulo_Branco" scope="col">Perfil</th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1 class="titulo_painel">
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
              </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsperfil > 1) {
?>
                      <h2 class="titulo_painel"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['nome']); ?>" size="45" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("perfil", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="data_nasc_<?php echo $cnt1; ?>">Data_nasc:</label></td>
                        <td><input type="text" name="data_nasc_<?php echo $cnt1; ?>" id="data_nasc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['data_nasc']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("data_nasc");?> <?php echo $tNGs->displayFieldError("perfil", "data_nasc", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="mail_<?php echo $cnt1; ?>">Mail:</label></td>
                        <td><input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['mail']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("perfil", "mail", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="local_de_<?php echo $cnt1; ?>">Local_de:</label></td>
                        <td><input type="text" name="local_de_<?php echo $cnt1; ?>" id="local_de_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['local_de']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("local_de");?> <?php echo $tNGs->displayFieldError("perfil", "local_de", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="picos_preferidos_<?php echo $cnt1; ?>">Picos_preferidos:</label></td>
                        <td><input type="text" name="picos_preferidos_<?php echo $cnt1; ?>" id="picos_preferidos_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['picos_preferidos']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("picos_preferidos");?> <?php echo $tNGs->displayFieldError("perfil", "picos_preferidos", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="prancha_<?php echo $cnt1; ?>">Prancha:</label></td>
                        <td><input type="text" name="prancha_<?php echo $cnt1; ?>" id="prancha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['prancha']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("prancha");?> <?php echo $tNGs->displayFieldError("perfil", "prancha", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="pe_pato_<?php echo $cnt1; ?>">Pe_pato:</label></td>
                        <td><input type="text" name="pe_pato_<?php echo $cnt1; ?>" id="pe_pato_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['pe_pato']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("pe_pato");?> <?php echo $tNGs->displayFieldError("perfil", "pe_pato", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="tempo_de_bb_<?php echo $cnt1; ?>">Tempo_de_bb:</label></td>
                        <td><input type="text" name="tempo_de_bb_<?php echo $cnt1; ?>" id="tempo_de_bb_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['tempo_de_bb']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("tempo_de_bb");?> <?php echo $tNGs->displayFieldError("perfil", "tempo_de_bb", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="manobra_<?php echo $cnt1; ?>">Manobra:</label></td>
                        <td><input type="text" name="manobra_<?php echo $cnt1; ?>" id="manobra_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['manobra']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("manobra");?> <?php echo $tNGs->displayFieldError("perfil", "manobra", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="idolo_<?php echo $cnt1; ?>">Idolo:</label></td>
                        <td><input type="text" name="idolo_<?php echo $cnt1; ?>" id="idolo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['idolo']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("idolo");?> <?php echo $tNGs->displayFieldError("perfil", "idolo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="filme_<?php echo $cnt1; ?>">Filme:</label></td>
                        <td><input type="text" name="filme_<?php echo $cnt1; ?>" id="filme_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['filme']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("filme");?> <?php echo $tNGs->displayFieldError("perfil", "filme", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="atividades_<?php echo $cnt1; ?>">Atividades:</label></td>
                        <td><input type="text" name="atividades_<?php echo $cnt1; ?>" id="atividades_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['atividades']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("atividades");?> <?php echo $tNGs->displayFieldError("perfil", "atividades", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="patrocinio_<?php echo $cnt1; ?>">Patrocinio:</label></td>
                        <td><input type="text" name="patrocinio_<?php echo $cnt1; ?>" id="patrocinio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['patrocinio']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("patrocinio");?> <?php echo $tNGs->displayFieldError("perfil", "patrocinio", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="recado_<?php echo $cnt1; ?>">Recado:</label></td>
                        <td><textarea name="recado_<?php echo $cnt1; ?>" cols="32" id="recado_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsperfil['recado']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("recado");?> <?php echo $tNGs->displayFieldError("perfil", "recado", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                        <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("perfil", "foto", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="aprovado_<?php echo $cnt1; ?>">Aprovado:</label></td>
                        <td><select name="aprovado" id="aprovado">
                          <option value="" <?php if (!(strcmp("", $row_rsperfil['aprovado']))) {echo "selected=\"selected\"";} ?>>- Selecione uma op&ccedil;&atilde;o -</option><option value="Y" <?php if (!(strcmp("Y", $row_rsperfil['aprovado']))) {echo "selected=\"selected\"";} ?>>Sim</option>
                          <option value="N" <?php if (!(strcmp("N", $row_rsperfil['aprovado']))) {echo "selected=\"selected\"";} ?>>N&atilde;o</option>
                        </select>
                          <?php echo $tNGs->displayFieldError("perfil", "aprovado", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_perfil_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsperfil['kt_pk_perfil']); ?>" />
                    <?php } while ($row_rsperfil = mysql_fetch_assoc($rsperfil)); ?>
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
    <th colspan="2" bgcolor="#E6F9FD" scope="row"><img src="../../imagens/rodape.jpg" width="775" height="40" /></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
