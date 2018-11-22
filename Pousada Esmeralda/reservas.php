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
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hotel Pousada Esmeralda - Central de Reservas</title>
<style type="text/css">
<!--
.style5 {font-size: 11px;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}
.txt_verde {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {font-size: 10px}
body {
	background-color: #006600;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
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
</head>

<body>
<table width="98%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="bakdark.jpg">
  <tr>
    <th align="center" scope="col"><table width="631" border="0" align="center" cellpadding="0" cellspacing="6">
      <tr>
        <th height="86" colspan="2" align="center" valign="middle" scope="col"><img src="logo.jpg" width="400" height="120" /></th>
      </tr>
      <tr>
        <td height="296" align="left" valign="top"><p><span class="txt_verde">Preencha o formul&aacute;rio abaixo corrretamente, para que possamos cadastrar sua reserva.</span></p>
            <p><span class="txt_verde">OBS: A reserva s&oacute; &eacute;  confirmada ap&oacute;s um   retorno nosso, que ser&aacute; feito assim que recebermos sua solicita&ccedil;&atilde;o. <br />
                    <br />
                Para maiores informa&ccedil;&otilde;es: <br />
                TEL: (24) 3352 1643 <br />
                FAX.: (24) 3352 1769 <br />
                (Das 8:00 horas &agrave;s   22:00 horas)<br />
          Email: <a href="mailto:info@pousadaesmeralda.com.br">info@pousadaesmeralda.com.br</a></span></p>
          <p><span class="txt_verde"><br /> 
            Aten&ccedil;&atilde;o - Observa&ccedil;&atilde;o importante:</span></p>
          <p><span class="txt_verde">Ao receber a resposta da solicita&ccedil;&atilde;o de reserva, favor habilitar o visualizador de imagens do seu programa de email, para que a mensagem seja exibida corretamente.</span></p>          </td>
        <td width="210" rowspan="2" align="center" valign="top"><table width="210" border="4" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <th width="200" height="517" bgcolor="#FFFFFF" scope="col"><img src="reservas.jpg" alt="Reservas" width="200" height="515" border="0" /></th>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="403" align="left" valign="top">&nbsp;
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
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                    <tr>
                      <td width="87" class="txt_verde">Nome:</td>
                      <td width="341"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['nome']); ?>" size="32" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("contato", "nome", $cnt1); ?> </td>
                    </tr>
                    <tr>
                      <td class="txt_verde">Email:</td>
                      <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['email']); ?>" size="32" maxlength="255" />                        <span class="txt_verde"><?php echo $tNGs->displayFieldError("contato", "email", $cnt1); ?></span> </td>
                    </tr>
                    <tr>
                      <td class="txt_verde">Telefone:</td>
                      <td><span id="sprytextfield1">
                      <input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['telefone']); ?>" size="32" maxlength="50" />
                      <span class="textfieldInvalidFormatMsg">Formato Inv&aacute;lido.</span></span><?php echo $tNGs->displayFieldError("contato", "telefone", $cnt1); ?> </td>
                    </tr>
                    <tr>
                      <td class="txt_verde">Cidade:</td>
                      <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['cidade']); ?>" size="32" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("contato", "cidade", $cnt1); ?> </td>
                    </tr>
                    <tr>
                      <td class="txt_verde">UF:</td>
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
                      <td class="txt_verde">Pa&iacute;s</td>
                      <td><input type="text" name="pais" value="Brasil" onfocus="if(this.value=='Brasil')this.value='';" />
                      <?php echo $tNGs->displayFieldHint("pais");?> <?php echo $tNGs->displayFieldError("contato", "pais", $cnt1); ?> </td>
                    </tr>
                    <tr>
                      <td><span class="txt_verde">
                        <label for="DataChegada">Data de Chegada:</label>
                      </span> <span class="style5">(Selecione) </span></td>
                      <td><input name="chegada_<?php echo $cnt1; ?>" id="chegada_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rscontato['chegada']); ?>" size="10" maxlength="255" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" wdg:readonly="true" />                      <span class="txt_verde"><?php echo $tNGs->displayFieldError("contato", "chegada", $cnt1); ?></span> </td>
                    </tr>
                    <tr>
                      <td><span class="txt_verde">
                        <label for="DataPartida">Data de Partida:</label>
                      </span><span class="style5">(Selecione) </span></td>
                      <td><input name="partida_<?php echo $cnt1; ?>" id="partida_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rscontato['partida']); ?>" size="10" maxlength="255" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" wdg:readonly="true" />                      <span class="txt_verde"><?php echo $tNGs->displayFieldError("contato", "partida", $cnt1); ?></span> </td>
                    </tr>
                    <tr>
                      <td><span class="txt_verde">Tipo de Acomoda&ccedil;&atilde;o</span></td>
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
                      <td class="txt_verde">Quantidade de Adultos:</td>
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
                      <td class="txt_verde">Quantidade de Crian&ccedil;as:</td>
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
                      <td class="KT_th"><label for="infoAdicionais_<?php echo $cnt1; ?>"><span class="txt_verde">Informa&ccedil;&otilde;es Adicionais: </span><span class="style5"><br />
(Ex: Idades das crian&ccedil;as, camas separadas e etc.) </span></label></td>
                      <td><textarea name="infoAdicionais_<?php echo $cnt1; ?>" id="infoAdicionais_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscontato['infoAdicionais']); ?></textarea>
                          <?php echo $tNGs->displayFieldHint("infoAdicionais");?> <?php echo $tNGs->displayFieldError("contato", "infoAdicionais", $cnt1); ?> </td>
                    </tr>
                  </table>
                  <input type="hidden" name="kt_pk_contato_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscontato['kt_pk_contato']); ?>" />
                  <?php } while ($row_rscontato = mysql_fetch_assoc($rscontato)); ?>
                <div class="KT_bottombuttons">
                  <div>
                    <?php 
      // Show IF Conditional region1
      if (@$_GET['idContato'] == "") {
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
                    <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" />
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
</body>
</html>