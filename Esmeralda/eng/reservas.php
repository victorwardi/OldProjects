<?php
setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	
	$mensagem .= "======== INFORMAÇÕES DE RESERVA - HOTEL POUSADA ESMERALDA ========";

	$mensagem .= "\n\nObrigado! O Hotel Pousada Esmeralda agradece pela preferência. Abaixo se encontram as informações 		necessárias para confirmação de sua reserva!";

	$mensagem .= "\n\nValor da Diária: R$ ";

	$mensagem .= "\n\nValor Total: R$ ";

	$mensagem .= "\n\nValor do Depósito: R$";

	$mensagem .= "\n\nData do Depósito: ";

	$mensagem .= "\n\nBanco: Banco Do Brasil";

	$mensagem .= "\n\nAgência: 1571-7";

	$mensagem .= "\n\nC/C: 11457- X";
	
	$mensagem .= "\n\nFavorecido: Hotel Pousada Esmeralda";
	
	$mensagem .= "\n\nCNPJ: 36.513.166/0001-59";
	
	$mensagem .= "\n\nOBS: A Reserva só será confirmada mediante comprovante de depósito";
	
	$mensagem .= "\n\nVia: email: info@pousadaesmeralda.com.br <mailto:info@pousadaesmeralda.com.br> ou FAX: (24)  3352 1769";
	
	$mensagem .= "\n\nFuncionamento:: 8:00 às 22:00 hrs";
	
	$mensagem .= "\n\n======== ABAIXO, AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO DE RESERVA ========n\n";
		
		
	
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n\n";
	}

	$remetente = "info@pousadaesmeralda.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
	$assunto = "Mensagem de Reserva do Site";
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado!";
	}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="hotel, hoteis, hotéis, pousada, pousadas, serra, região serrana, ferias, itatiaia, hoteis em itatiaia, hotel em itatiaia, pousadas em itatiaia, pousada em itatiaia, cachoeira, parque, parque nacional, parque nacional de itatiaia, restaurante, lago, chalets, chale, chalet, chales, hospedagem, passeios, passeio, caminhada"/>
<meta name="description" content="">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="author" content="Victor Caetano - victor@saquabb.com.br">
<meta name="language" content="pt-br">

<title>Hotel Pousada Esmeralda - Itatiaia - RJ - Brasil</title>

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
    
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="200" height="652" border="0" align="center" cellpadding="0" cellspacing="0" id="conteudoTabela">
  <tr>
    <td height="522" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3"><img src="../imagens/layout/eng/layout_eng_01.jpg" width="240" height="522" border="0" usemap="#Map" /></td>
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
        <td height="220"><img src="../imagens/layout/eng/img_05_eng.jpg" width="499" height="220" border="0" usemap="#Map2" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="../imagens/separador.png" width="748" height="7" /></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<div id="divArredondado">
	
<table width="98%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="6" class="titulo">
      <tr>
        <td><a name="link" id="link">Central de Reservas</a></td>
        </tr>
      </table>
        <table width="714" border="0" align="center" cellpadding="0" cellspacing="6">
          
          <tr>
            <td width="413" height="296" align="left" valign="top"><p>Fill out the form below corrretamente so that we can register your booking.</p>
              <p>NOTE: The reservation is confirmed only after our feedback, which will be made once we receive your request. <br />
                <br />
                For more information: <br />
                TEL: (24) 3352 1643 (From 8:00 pm to 22:00 pm) <br />
                Email: info@pousadaesmeralda.com.br<br />
                <br />
                Attention - Important Note:</p>
<p>Upon receiving the   response of the reservation request, please enable the image viewer of   your email program, so that the message is displayed correctly.</p>
<p>
  <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
<p>        
<table cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#d7d2b5">
      <label for="DataChegada2">Arrival Date:</label>
      (Select)</td>
    <td><input name="dataChegada" id="dataChegada2" value="" size="10" maxlength="255" />
      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataChegada);return false;" hidefocus=""><img src="http://www.pousadaesmeralda.com.br/Scripts/calendar/calbtn.JPG" alt="Select the date of arrival." width="19" align="absmiddle" border="0" height="19" /></a></td>
  </tr>
  <tr>
    <td bgcolor="#d7d2b5">
      <label for="DataPartida2">Data de Partida:</label>
      (Selecione)
      <label for="DataPartida2">Departure Date:</label>
      (Select)</td>
    <td><input name="dataPartida" id="dataPartida2" value="" size="10" maxlength="255" />
      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataPartida);return false;" hidefocus=""><img src="http://www.pousadaesmeralda.com.br/Scripts/calendar/calbtn.JPG" alt="Select the departure date." width="19" align="absmiddle" border="0" height="19" /></a></td>
  </tr>
  <tr>
    <td bgcolor="#d7d2b5">Tipo de Acomoda&ccedil;&atilde;o Accommodation Type</td>
    <td><select name="Tipo Acomodacao2" id="Tipo Acomodacao">
      <option value="N&atilde;o Especificou"> - Select - </option>
      <option value="Chal&eacute; Master"> Chalet Master </option>
      <option value="Chal&eacute; Superior"> Superior Chalet </option>
      <option value="Chal&eacute; Superior Lua-de-Mel"> Superior Chalet honeymoon </option>
      <option value="Chal&eacute; Geminado c/ Lareiria"> Chalet Twin w / Lareiria </option>
      <option value="Chal&eacute; Geminado s/ Lareiria"> Chalet Twin s / Lareiria </option>
      <option value="Apartamento"> Apartment </option>
    </select></td>
  </tr>
  <tr>
    <td bgcolor="#d7d2b5">Quantidade de Adultos: Number of Adults:</td>
    <td><select name="Quantidade Adulto2" id="Quantidade Adulto">
      <option value="01"> 01 </option>
      <option value="02"> 02 </option>
      <option value="03"> 03 </option>
      <option value="04"> 04 </option>
      <option value="05"> 05 </option>
      <option value="06"> 06 </option>
      <option value="07"> 07 </option>
      <option value="08"> 08 </option>
      <option value="09"> 09 </option>
      <option value="10"> 10 </option>
      <option value="11"> 11 </option>
      <option value="12"> 12 </option>
      <option value="13"> 13 </option>
      <option value="14"> 14 </option>
      <option value="15"> 15 </option>
      <option value="16"> 16 </option>
      <option value="17"> 17 </option>
      <option value="18"> 18 </option>
      <option value="19"> 19 </option>
      <option value="20"> 20 </option>
    </select></td>
  </tr>
  <tr>
    <td bgcolor="#d7d2b5"> Number of Children:</td>
  </tr>
</table></td>
          <td width="283" align="center" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
            <tr>
              <td bgcolor="#FFFFFF"><img src="../fotos/reserva.jpg" alt="Cachoeira V&eacute;u de noiva" width="250" height="330" /></td>
            </tr>
            </table></td>
        </tr>
          <tr>
            <td colspan="2" align="left" valign="top">
              
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="reserva">
                <table cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="229" bgcolor="#D7D2B5"  >Name:</td>
                        <td width="457"><input type="text" name="Nome" value="" size="50" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Email:</td>
                        <td><input type="text" name="Email" value="" size="40" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Tel:</td>
                        <td><span id="sprytextfield1">
                          <input type="text" name="Telefone" value="" size="25" maxlength="50" />
                          <span class="textfieldInvalidFormatMsg">Formato Inv&aacute;lido.</span></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >City:</td>
                        <td><input type="text" name="Cidade" value="" size="40" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Country:</td>
                    <td><input type="text" name="pais" onfocus="if(this.value=='Brasil')this.value='';" /></td>
                  </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"><label for="DataChegada3">Arrival Date:</label>
(Select)</td>
                        <td><input name="Data de Chegada" id="dataChegada" value="" size="10" maxlength="255"/>
                          <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataChegada);return false;" HIDEFOCUS>   <img class="PopcalTrigger" align="absmiddle" src="../Scripts/calendar/calbtn.JPG" width="19" height="19" border="0" alt="Selecione a data de chegada.">                            </a>                          </td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"><label for="DataPartida3">Departure Date:</label>
(Select)</td>
                        <td><input name="Data de Partida" id="dataPartida"value="" size="10" maxlength="255"/>
                          <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataPartida);return false;" HIDEFOCUS>   <img class="PopcalTrigger" align="absmiddle" src="../Scripts/calendar/calbtn.JPG" width="19" height="19" border="0" alt="Selecione a data de partida."></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5">Accommodation Type:</td>
                        <td><select name="Acomodation Type" id="tipoAcomodacao">
                          <option value="N&atilde;o Especificou">- Selecione -</option>
                          <option value="Chal&eacute; Master">Master Chalet</option>
                          <option value="Chal&eacute; Superior">Superior Chalet</option>
                          <option value="Chal&eacute; Superior Lua-de-Mel">Superior Chalet Honeymoon</option>
                          <option value="Chal&eacute; Geminado c/ Lareiria">Twin Chalet with Fireplace</option>
                          <option value="Chal&eacute; Geminado s/ Lareiria">Twin Chalet without Fireplace</option>
                          <option value="Apartamento">Apartment</option>
                          </select></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  > Number of Adults:</td>
                        <td><label>
                          <select name="Quantidade Adulto" id="qtdAdulto">
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
                          </label></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  > Number of Children:</td>
                        <td><select name="Quantidade CHD" id="qtdCrianca">
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
                          </select></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5" class="KT_th">Additional Information: <br />
                       (Ex: Ages of children, twin beds and etc.).                      </label></td>
                        <td><textarea name="Info Adicionais" cols="50" rows="5"></textarea></td>
                        </tr>
                  <tr>
                    <td bgcolor="#E5D8B5" class="KT_th">                  <input name="submit" id="botao" type="submit" tabindex="6" value="Send" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  </table>
                  </form></td>
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

    </div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="../imagens/separador.png" width="748" height="7" /></td>
  </tr>
  
  <tr>
    <td align="center" valign="top">
    	<div id="divRodape"><table width="100%" border="0" cellspacing="6" cellpadding="0">
     <tr>
        <td><div align="center" class="txt">Hotel Pousada Esmeralda - Itatiaia - Rio de Janeiro - Brazil<br />
          National Park Road, Km 4,5<br />
          Phone: [55] [24] 3352-1643 Email: info@pousadaesmeralda.com.br</div></td>
      </tr>
    </table>
    </div>      </td>
  </tr>
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="60,329,173,350" href="../pacotes/index.php#pacotes" alt="Tarif&aacute;rio Balc&atilde;o" /><area shape="rect" coords="49,167,175,188" href="../index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="50,193,176,212" href="../hotel.php#link" alt="O Hotel" />
<area shape="rect" coords="51,219,173,240" href="../chalets.php#link" alt="Chalets" />
<area shape="rect" coords="55,247,171,270" href="../gastronomia.php#link" alt="Gastronomia" />
<area shape="rect" coords="56,275,173,297" href="../lazer.php#link" alt="Lazer" />
<area shape="rect" coords="58,300,170,324" href="../passeios.php#link" alt="Passeios" />
<area shape="rect" coords="60,354,172,376" href="../tarifario.php#link" alt="Tarif&aacute;rio Balc&atilde;o" />
<area shape="rect" coords="36,381,194,403" href="../tarifario.php#link" alt="Tarif&aacute;rio Promocional" />
<area shape="rect" coords="37,406,195,428" href="../reservas.php#link" alt="Reservas" />
<area shape="rect" coords="39,432,191,457" href="../luademel.php#link" alt="Lua-de-Mel" />
<area shape="rect" coords="40,462,189,484" href="../faleconosco.php#link" alt="Fale Conosco" />
<area shape="rect" coords="50,490,187,510" href="../comochegar.php#link" alt="Como Chegar" />
<area shape="rect" coords="18,20,222,156" href="../index.php" alt="Voltar para p&aacute;gina inicial" />
</map>



<map name="Map2" id="Map2"><area shape="rect" coords="371,77,481,186" href="reservas.php#link" alt="Reservas Online" />
</map><script type="text/javascript">
    arredondar.render('divArredondado');
	arredondar.render('divRodape');
</script>
<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="Scripts/calendar/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
</body>
</html>