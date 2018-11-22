<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("/");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Inserir seu nome");
$formValidation->addField("data_nasc", true, "text", "", "", "", "Inserir sua data de nascimento");
$formValidation->addField("mail", true, "text", "", "", "", "Inserir seu email");
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
$formValidation->addField("recado", true, "text", "", "", "", "Deixe um racado");
$formValidation->addField("foto", true, "", "", "", "", "Insira sua foto");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("perfil/fotos/");
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
  $uploadObj->setFolder("perfil/fotos/");
  $uploadObj->setResize("true", 300, 0);
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
$ins_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok_bb.php");
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
$upd_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok_bb.php");
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
$del_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok_bb.php");
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>____InFORmeBB.COM_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link href="perfil/css_form.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
                <table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                      <tr>
                        <th align="left" valign="middle" scope="col"><img src="imagens/recorte/titulos/cadasstrese.jpg" alt="Casdastre-se" width="300" height="40" border="0" /></th>
                      </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="left" scope="col">Para cadastrar seu perfil no inFORmeBB preencha corretamente todos os campos! </th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <td><table id="form" width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="550" valign="baseline"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
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
          <td width="191" align="left" valign="top" bgcolor="#FFFFFF"  class="comentario"><label for="nome_<?php echo $cnt1; ?>" class="fonte">Nome:</label></td>
          <td width="356" bgcolor="#FFFFFF"><input name="nome_<?php echo $cnt1; ?>" type="text" class="box" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['nome']); ?>" size="58" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("perfil", "nome", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="data_nasc_<?php echo $cnt1; ?>" class="fonte">Data de Nascimento (ex: 01/02/88): </label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="data_nasc_<?php echo $cnt1; ?>" type="text" class="box" id="data_nasc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['data_nasc']); ?>" size="20" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("data_nasc");?> <?php echo $tNGs->displayFieldError("perfil", "data_nasc", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="mail_<?php echo $cnt1; ?>" class="fonte">E-mail:</label></td>
          <td bgcolor="#FFFFFF"><input name="mail_<?php echo $cnt1; ?>" type="text" class="box" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['mail']); ?>" size="40" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("perfil", "mail", $cnt1); ?> </span></td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="local_de_<?php echo $cnt1; ?>" class="fonte">Local de (cidade onde mora):</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="local_de_<?php echo $cnt1; ?>" type="text" class="box" id="local_de_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['local_de']); ?>" size="40" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("local_de");?> <?php echo $tNGs->displayFieldError("perfil", "local_de", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="picos_preferidos_<?php echo $cnt1; ?>" class="fonte">Picos Preferidos:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="picos_preferidos_<?php echo $cnt1; ?>" type="text" class="box" id="picos_preferidos_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['picos_preferidos']); ?>" size="50" maxlength="100" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("picos_preferidos");?> <?php echo $tNGs->displayFieldError("perfil", "picos_preferidos", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="prancha_<?php echo $cnt1; ?>" class="fonte">Prancha (marca):</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="prancha_<?php echo $cnt1; ?>" type="text" class="box" id="prancha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['prancha']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("prancha");?> <?php echo $tNGs->displayFieldError("perfil", "prancha", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="pe_pato_<?php echo $cnt1; ?>" class="fonte">P&eacute;-de-pato:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="pe_pato_<?php echo $cnt1; ?>" type="text" class="box" id="pe_pato_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['pe_pato']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("pe_pato");?> <?php echo $tNGs->displayFieldError("perfil", "pe_pato", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="tempo_de_bb_<?php echo $cnt1; ?>" class="fonte">Tempo que pratica o BB: </label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="tempo_de_bb_<?php echo $cnt1; ?>" type="text" class="box" id="tempo_de_bb_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['tempo_de_bb']); ?>" size="15" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("tempo_de_bb");?> <?php echo $tNGs->displayFieldError("perfil", "tempo_de_bb", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="patrocinio_<?php echo $cnt1; ?>" class="fonte">Patroc&iacute;nio/Apoio:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="patrocinio_<?php echo $cnt1; ?>" type="text" class="box" id="patrocinio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['patrocinio']); ?>" size="58" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("patrocinio");?> <span class="erro"><?php echo $tNGs->displayFieldError("perfil", "patrocinio", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="manobra_<?php echo $cnt1; ?>" class="fonte">Manobra Preferida:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="manobra_<?php echo $cnt1; ?>" type="text" class="box" id="manobra_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['manobra']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("manobra");?> <?php echo $tNGs->displayFieldError("perfil", "manobra", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="idolo_<?php echo $cnt1; ?>" class="fonte">&Iacute;dolo do Esporte:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="idolo_<?php echo $cnt1; ?>" type="text" class="box" id="idolo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['idolo']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("idolo");?> <?php echo $tNGs->displayFieldError("perfil", "idolo", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="filme_<?php echo $cnt1; ?>" class="fonte">Filme de BB:</label></td>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><input name="filme_<?php echo $cnt1; ?>" type="text" class="box" id="filme_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['filme']); ?>" size="32" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("filme");?> <?php echo $tNGs->displayFieldError("perfil", "filme", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="atividades_<?php echo $cnt1; ?>" class="fonte">Outras Atividades:</label></td>
          <td bgcolor="#FFFFFF"><input name="atividades_<?php echo $cnt1; ?>" type="text" class="box" id="atividades_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['atividades']); ?>" size="58" maxlength="50" />
              <span class="erro"><?php echo $tNGs->displayFieldHint("atividades");?> <?php echo $tNGs->displayFieldError("perfil", "atividades", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="comentario"><label for="recado_<?php echo $cnt1; ?>" class="fonte">Deixe seu recado :</label></td>
          <td bgcolor="#FFFFFF"><textarea name="recado_<?php echo $cnt1; ?>" cols="50" rows="5" class="box" id="recado_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsperfil['recado']); ?></textarea>
              <span class="erro"><?php echo $tNGs->displayFieldHint("recado");?> <?php echo $tNGs->displayFieldError("perfil", "recado", $cnt1); ?> </span></td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF" class="KT_th"><label for="foto_<?php echo $cnt1; ?>" class="fonte"><span class="fonte">Foto:</span><br />
                <span class="erro">OBS: Foto de boa qualidade com no maximo de <em>200Kb</em></span> </label></td>
          <td bgcolor="#FFFFFF"><input name="foto_<?php echo $cnt1; ?>" type="file" class="box" id="foto_<?php echo $cnt1; ?>" size="32" />
              <span class="erro"><?php echo $tNGs->displayFieldError("perfil", "foto", $cnt1); ?></span> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class="KT_th"><span class="form_validation_field_error_error_message style2"><br />
          </span><span class="erro">*Favor Preencher todos os campos! </span></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
      <div align="center"><br />
        <input type="hidden" name="kt_pk_perfil_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsperfil['kt_pk_perfil']); ?>" />
        <span class="KT_textnav">
        <input name="KT_Insert1" type="submit" class="box" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
        </span></div>
      <?php } while ($row_rsperfil = mysql_fetch_assoc($rsperfil)); ?>
    </form></td>
  </tr>
</table>                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>

<?php
mysql_free_result($perfil);
?>
