<?php require_once('Connections/conBD.php'); ?>
<?php
//MX Widgets3 include
require_once('includes/wdg/WDG.php');

// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_conBD = new KT_connection($conBD, $database_conBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("email", true, "text", "email", "", "", "Insira um email válido.");
$formValidation->addField("chegada", true, "date", "date", "", "", "Por favor, insira uma data válida.");
$formValidation->addField("partida", true, "date", "date", "", "", "Por favor, insira uma data válida.");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_contato = new tNG_multipleInsert($conn_conBD);
$tNGs->addTransaction($ins_contato);
// Register triggers
$ins_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$ins_contato->setTable("contato");
$ins_contato->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_contato->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_contato->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_contato->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_contato->addColumn("uf", "STRING_TYPE", "POST", "uf");
$ins_contato->addColumn("pais", "STRING_TYPE", "POST", "pais");
$ins_contato->addColumn("chegada", "DATE_TYPE", "POST", "chegada");
$ins_contato->addColumn("partida", "DATE_TYPE", "POST", "partida");
$ins_contato->addColumn("tipoAcomodacao", "STRING_TYPE", "POST", "tipoAcomodacao");
$ins_contato->addColumn("qtdAdulto", "STRING_TYPE", "POST", "qtdAdulto");
$ins_contato->addColumn("qtdCrianca", "STRING_TYPE", "POST", "qtdCrianca");
$ins_contato->addColumn("infoAdicionais", "STRING_TYPE", "POST", "infoAdicionais");
$ins_contato->setPrimaryKey("idContato", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_contato = new tNG_multipleUpdate($conn_conBD);
$tNGs->addTransaction($upd_contato);
// Register triggers
$upd_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_contato->setTable("contato");
$upd_contato->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_contato->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_contato->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_contato->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_contato->addColumn("uf", "STRING_TYPE", "POST", "uf");
$upd_contato->addColumn("pais", "STRING_TYPE", "POST", "pais");
$upd_contato->addColumn("chegada", "DATE_TYPE", "POST", "chegada");
$upd_contato->addColumn("partida", "DATE_TYPE", "POST", "partida");
$upd_contato->addColumn("tipoAcomodacao", "STRING_TYPE", "POST", "tipoAcomodacao");
$upd_contato->addColumn("qtdAdulto", "STRING_TYPE", "POST", "qtdAdulto");
$upd_contato->addColumn("qtdCrianca", "STRING_TYPE", "POST", "qtdCrianca");
$upd_contato->addColumn("infoAdicionais", "STRING_TYPE", "POST", "infoAdicionais");
$upd_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Make an instance of the transaction object
$del_contato = new tNG_multipleDelete($conn_conBD);
$tNGs->addTransaction($del_contato);
// Register triggers
$del_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_contato->setTable("contato");
$del_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscontato = $tNGs->getRecordset("contato");
$row_rscontato = mysql_fetch_assoc($rscontato);
$totalRows_rscontato = mysql_num_rows($rscontato);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/modelo.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="hotel, hoteis, hotéis, pousada, pousadas, serra, região serrana, ferias, itatiaia, hoteis em itatiaia, hotel em itatiaia, pousadas em itatiaia, pousada em itatiaia, cachoeira, parque, parque nacional, parque nacional de itatiaia, restaurante, lago, chalets, chale, chalet, chales, hospedagem, passeios, passeio, caminhada"/>
<meta name="description" content="Hotel Pousada Esmeralda - Parque Nacional do Itatiaia, KM 4,5 - (24) 3352-1643">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="author" content="Victor Caetano - victor@saquabb.com.br">
<meta name="language" content="pt-br">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Hotel Pousada Esmeralda - Itatiaia - RJ - Brasil</title>
<!-- InstanceEndEditable -->
<link href="../css/estilo.css" rel="stylesheet" type="text/css" media="all" />
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="../Scripts/shadedborder.js" type="text/javascript"></script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"> 
</script>
<script type="text/javascript"> 
_uacct = "UA-1480426-5";
urchinTracker();
</script>

<script language="javascript" type="text/javascript">

     var arredondar    = RUZEE.ShadedBorder.create({ corner:8, shadow:16 });
</script>
 
<!-- lightbox -->

<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->
    

<!-- InstanceBeginEditable name="head" -->
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
</script>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
</head>

<body>
<table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td align="right"><table width="63" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td width="24"><a href="../index.php"><img src="../imagens/layout/brasil.jpg" alt="Vers&atilde;o em portugu&ecirc;s" width="24" height="20" border="0" /></a></td>
        <td width="23"><a href="../eng/index.php"><img src="../imagens/layout/inglaterra.jpg" alt="English Version" width="24" height="20" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
</table>

<table width="200" height="652" border="0" align="center" cellpadding="0" cellspacing="0" id="conteudoTabela">
  <tr>
    <td height="522" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3"><img src="../imagens/layout/img_01.jpg" width="240" height="522" border="0" usemap="#Map" /></td>
        <td><img src="../imagens/layout/img_02.jpg" width="499" height="44" /></td>
        <td rowspan="3"><img src="../imagens/layout/img_03.jpg" width="19" height="522" /></td>
      </tr>
      <tr>
        <td height="241">		
   <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','499','height','258','src','../flash/intro','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','../flash/intro' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="499" height="258">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="../flash/intro.swf" />
      <param name="quality" value="high" />
      <embed src="../flash/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="499" height="258"></embed>
    </object></noscript></strong>       </td>
      </tr>
      <tr>
        <td height="220"><img src="../imagens/layout/img_05.jpg" width="499" height="220" border="0" usemap="#Map2" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="../imagens/separador.png" width="748" height="7" /></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<div id="divArredondado">
	<!-- InstanceBeginEditable name="conteudo" -->
<table width="98%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="bakdark.jpg">
  <tr>
    <th align="center" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="6" class="titulo">
      <tr>
        <td>Central de Reservas</td>
      </tr>
    </table>
      <table width="714" border="0" align="center" cellpadding="0" cellspacing="6">
      
      <tr>
        <td width="413" height="296" align="left" valign="top"><p><span  >Preencha o formul&aacute;rio abaixo corrretamente, para que possamos cadastrar sua reserva.</span></p>
            <p><span  >OBS: A reserva s&oacute; &eacute;  confirmada ap&oacute;s um   retorno nosso, que ser&aacute; feito assim que recebermos sua solicita&ccedil;&atilde;o. <br />
                    <br />
                Para maiores informa&ccedil;&otilde;es: <br />
                TEL: (24) 3352 1643 <br />
                FAX.: (24) 3352 1769 <br />
                (Das 8:00 horas &agrave;s   22:00 horas)<br />
          Email: info@pousadaesmeralda.com.br</span></p>
          <p><span  ><br /> 
            Aten&ccedil;&atilde;o - Observa&ccedil;&atilde;o importante:</span></p>
          <p><span  >Ao receber a resposta da solicita&ccedil;&atilde;o de reserva, favor habilitar o visualizador de imagens do seu programa de email, para que a mensagem seja exibida corretamente.</span></p>
          <table width="390" border="1" align="center" cellpadding="0" cellspacing="6" bordercolor="#669900" bgcolor="#66CC00">
            <tr>
              <td width="378" align="center"><div id="sucesso">
                <div align="center" class="sucesso">Mensagem enviada com sucesso. <br />
                  Obrigado!<br />
                  Em breve entraremos em contato.</div>
              </div></td>
            </tr>
          </table>          <p align="center">&nbsp;</p></td>
        <td width="283" align="center" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
          <tr>
            <td bgcolor="#FFFFFF"><img src="fotos/reserva.jpg" alt="Cachoeira V&eacute;u de noiva" width="250" height="330" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">&nbsp;
          <?php
	echo $tNGs->getErrorMsg();
?>
          <div class="KT_tng">
            <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
              <?php $cnt1 = 0; ?>
                <?php do { ?>
                  <?php $cnt1++; ?>
                  <?php 
// Show IF Conditional region1 
if (@$totalRows_rscontato > 1) {
?>
                    <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                    <?php } 
// endif Conditional region1
?>
                  <table cellpadding="2" cellspacing="2" class="KT_tngtable">
                    <tr>
                      <td width="229" bgcolor="#D7D2B5"  >Nome:</td>
                      <td width="457"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['nome']); ?>" size="50" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("contato", "nome", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Email:</td>
                      <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['email']); ?>" size="40" maxlength="255" />                        <span  ><?php echo $tNGs->displayFieldError("contato", "email", $cnt1); ?></span> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Telefone:</td>
                      <td><span id="sprytextfield1">
                      <input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['telefone']); ?>" size="25" maxlength="50" />
                      <span class="textfieldInvalidFormatMsg">Formato Inv&aacute;lido.</span></span><?php echo $tNGs->displayFieldError("contato", "telefone", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Cidade:</td>
                      <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['cidade']); ?>" size="40" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("contato", "cidade", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >UF:</td>
                      <td><select name="uf" id="uf">
                    <option value="Não Selecionou">Selecione</option>                    
                    <option value="RJ">RJ</option>
                    <option value="SP">SP</option>
                    <option value="MG">MG</option>
                    <option value="ES">ES</option>
                    <option value="RO">RO</option>
                    <option value="AC">AC</option>
                    <option value="AM">AM</option>
                    <option value="RR">RR</option>
                    <option value="PA">PA</option>
                    <option value="AP">AP</option>
                    <option value="TO">TO</option>
                    <option value="MA">MA</option>
                    <option value="PI">PI</option>
                    <option value="CE">CE</option>
                    <option value="RN">RN</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="AL">AL</option>
                    <option value="SE">SE</option>
                    <option value="BA">BA</option>
                    <option value="PR">PR</option>
                    <option value="SC">SC</option>
                    <option value="RS">RS</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="GO">GO</option>
                    <option value="DF">DF</option>
                 </select>
                          <?php echo $tNGs->displayFieldHint("uf");?> <?php echo $tNGs->displayFieldError("contato", "uf", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Pa&iacute;s</td>
                      <td><input type="text" name="pais" value="Brasil" onfocus="if(this.value=='Brasil')this.value='';" />
                      <?php echo $tNGs->displayFieldHint("pais");?> <?php echo $tNGs->displayFieldError("contato", "pais", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"><span  >
                        <label for="DataChegada">Data de Chegada:</label>
                      </span> <span class="style5">(Selecione) </span></td>
                      <td><input name="chegada_<?php echo $cnt1; ?>" id="chegada_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rscontato['chegada']); ?>" size="10" maxlength="255" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" wdg:readonly="true" />                      <span  ><?php echo $tNGs->displayFieldError("contato", "chegada", $cnt1); ?></span> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"><span  >
                        <label for="DataPartida">Data de Partida:</label>
                      </span><span class="style5">(Selecione) </span></td>
                      <td><input name="partida_<?php echo $cnt1; ?>" id="partida_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rscontato['partida']); ?>" size="10" maxlength="255" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" wdg:readonly="true" />                      <span  ><?php echo $tNGs->displayFieldError("contato", "partida", $cnt1); ?></span> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"><span  >Tipo de Acomoda&ccedil;&atilde;o</span></td>
                      <td><select name="tipoAcomodacao" id="tipoAcomodacao">
                            <option value="N&atilde;o Especificou">- Selecione -</option>
                            <option value="Chal&eacute; Master">Chal&eacute; Master</option>
                            <option value="Chal&eacute; Vip">Chal&eacute; Vip</option>
                            <option value="Chal&eacute; Vip Lua-de-Mel">Chal&eacute; Vip Lua-de-Mel</option>
                            <option value="Chal&eacute; Geminado c/ Lareiria">Chal&eacute; Geminado c/ Lareiria</option>
                            <option value="Chal&eacute; Geminado s/ Lareiria">Chal&eacute; Geminado s/ Lareiria</option>
                            <option value="Apartamento">Apartamento</option>
                          </select>
                        <?php echo $tNGs->displayFieldHint("tipoAcomodacao");?> <?php echo $tNGs->displayFieldError("contato", "tipoAcomodacao", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Quantidade de Adultos:</td>
                      <td><label>
                        <select name="qtdAdulto" id="qtdAdulto">
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          </select>
                        </label>                        <?php echo $tNGs->displayFieldError("contato", "qtdAdulto", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5"  >Quantidade de Crian&ccedil;as:</td>
                      <td><select name="qtdCrianca" id="qtdCrianca">
                          <option value="0"> 00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                        </select>                        <?php echo $tNGs->displayFieldError("contato", "qtdCrianca", $cnt1); ?> </td>
                      </tr>
                    <tr>
                      <td bgcolor="#D7D2B5" class="KT_th"><label for="infoAdicionais_<?php echo $cnt1; ?>"><span  >Informa&ccedil;&otilde;es Adicionais: </span><span class="style5"><br />
</span>(Ex: Idades das crian&ccedil;as, camas separadas e etc.) </label></td>
                      <td><textarea name="infoAdicionais_<?php echo $cnt1; ?>" id="infoAdicionais_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscontato['infoAdicionais']); ?></textarea>
                          <?php echo $tNGs->displayFieldHint("infoAdicionais");?> <?php echo $tNGs->displayFieldError("contato", "infoAdicionais", $cnt1); ?> </td>
                      </tr>
                  </table>
                  <input type="hidden" name="kt_pk_contato_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscontato['kt_pk_contato']); ?>" />
                  <?php } while ($row_rscontato = mysql_fetch_assoc($rscontato)); ?>
                <div class="KT_bottombuttons">
                  <div>
                    
                          <div align="left">
                            <?php 
      // Show IF Conditional region1
      if (@$_GET['idContato'] == "") {
      ?>
                             <input name="KT_Insert1" type="submit" class="botao" id="KT_Insert1" value="Enviar" />
                            <?php 
      // else Conditional region1
      } else { ?>
                            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                            <input type="hidden" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                            <?php }
      // endif Conditional region1
      ?>
                            <input type="hidden" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" />
                          </div>
                  </div>
                </div>
              </form>
            </div>
            <br class="clearfixplain" />
          </div>
          <p>&nbsp;</p></td>
        </tr>
    </table>
      <p>&nbsp;</p></th>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "phone_number", {format:"phone_custom", pattern:"(00)0000-0000", useCharacterMasking:true, validateOn:["blur"], isRequired:false});
//-->
</script>
<!-- InstanceEndEditable -->    </div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="../imagens/separador.png" width="748" height="7" /></td>
  </tr>
  
  <tr>
    <td align="center" valign="top">
    	<div id="divRodape"><table width="100%" border="0" cellspacing="6" cellpadding="0">
      <tr>
        <td><div align="center" class="txt">Hotel Pousada Esmeralda - Itatiaia - Rio de Janeiro - Brasil<br />
          Estrada do Parque Nacional Km 4,5<br />
          Telefone: [24] 3352-1643 Email: info@pousadaesmeralda.com.br</div></td>
      </tr>
    </table>
    </div>      </td>
  </tr>
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="60,334,173,355" href="../pacotes/index.php#pacotes" alt="Tarif&aacute;rio Balc&atilde;o" /><area shape="rect" coords="49,167,175,188" href="../index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="50,193,176,212" href="../hotel.php#link" alt="O Hotel" />
<area shape="rect" coords="51,219,173,240" href="../chalets.php#link" alt="Chalets" />
<area shape="rect" coords="55,247,171,270" href="../gastronomia.php#link" alt="Gastronomia" />
<area shape="rect" coords="56,275,173,297" href="../lazer.php#link" alt="Lazer" />
<area shape="rect" coords="58,300,170,324" href="../passeios.php#link" alt="Passeios" />
<area shape="rect" coords="60,368,172,390" href="../tarifario.php#link" alt="Tarif&aacute;rio Balc&atilde;o" />
<area shape="rect" coords="37,399,195,421" href="../reservas.php#link" alt="Reservas" />
<area shape="rect" coords="40,428,192,453" href="../luademel.php#link" alt="Lua-de-Mel" />
<area shape="rect" coords="40,459,189,481" href="../faleconosco.php#link" alt="Fale Conosco" />
<area shape="rect" coords="51,487,188,507" href="../comochegar.php#link" alt="Como Chegar" />
<area shape="rect" coords="18,20,222,156" href="../index.php" alt="Voltar para p&aacute;gina inicial" />
</map>




<map name="Map2" id="Map2"><area shape="rect" coords="371,77,481,186" href="../reservas.php#link" alt="Reservas Online" />
</map><script type="text/javascript">
    arredondar.render('divArredondado');
	arredondar.render('divRodape');
</script></body>
<!-- InstanceEnd --></html>