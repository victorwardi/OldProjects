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
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="author" content="Victor Caetano - victor@saquabb.com.br">
<meta name="language" content="pt-br">

<title>Hotel Pousada Esmeralda - Itatiaia - RJ - Brasil</title>

<link href="css/estilo.css" rel="stylesheet" type="text/css" media="all" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/shadedborder.js" type="text/javascript"></script>
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

<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->
    
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td align="right"><table width="63" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td width="24"><a href="index.php"><img src="imagens/layout/brasil.jpg" alt="Vers&atilde;o em portugu&ecirc;s" width="24" height="20" border="0" /></a></td>
        <td width="23"><a href="eng/index.php"><img src="imagens/layout/inglaterra.jpg" alt="English Version" width="24" height="20" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="200" height="652" border="0" align="center" cellpadding="0" cellspacing="0" id="conteudoTabela">
  <tr>
    <td height="522" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3"><img src="imagens/layout/img_01.jpg" width="240" height="522" border="0" usemap="#Map" /></td>
        <td><img src="imagens/layout/img_02.jpg" width="499" height="44" /></td>
        <td rowspan="3"><img src="imagens/layout/img_03.jpg" width="19" height="522" /></td>
      </tr>
      <tr>
        <td height="241">		
   <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','499','height','258','src','flash/intro','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','flash/intro' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="499" height="258">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="flash/intro.swf" />
      <param name="quality" value="high" />
      <embed src="flash/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="499" height="258"></embed>
    </object></noscript></strong>       </td>
      </tr>
      <tr>
        <td height="220"><img src="imagens/layout/img_05.jpg" width="499" height="220" border="0" usemap="#Map2" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="imagens/separador.png" width="748" height="7" /></td>
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
            <td width="413" height="296" align="left" valign="top"><p><span  >Preencha o formul&aacute;rio abaixo corrretamente, para que possamos cadastrar sua reserva.</span></p>
              <p><span  >OBS: A reserva s&oacute; &eacute;  confirmada ap&oacute;s um   retorno nosso, que ser&aacute; feito assim que recebermos sua solicita&ccedil;&atilde;o. <br />
                <br />
                Para maiores informa&ccedil;&otilde;es: <br />
                TEL: (24) 3352 1643 <br />
                (Das 8:00 horas &agrave;s   22:00 horas)<br />
                Email: info@pousadaesmeralda.com.br</span></p>
            <p><span  ><br /> 
              Aten&ccedil;&atilde;o - Observa&ccedil;&atilde;o importante:</span></p>
            <p><span  >Ao receber a resposta da solicita&ccedil;&atilde;o de reserva, favor habilitar o visualizador de imagens do seu programa de email, para que a mensagem seja exibida corretamente.</span></p>    
            <p>
                <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
              <p>        </td>
          <td width="283" align="center" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
            <tr>
              <td bgcolor="#FFFFFF"><img src="fotos/reserva.jpg" alt="Cachoeira V&eacute;u de noiva" width="250" height="330" /></td>
            </tr>
            </table></td>
        </tr>
          <tr>
            <td colspan="2" align="left" valign="top">
              
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="reserva">
                <table cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="229" bgcolor="#D7D2B5"  >Nome:</td>
                        <td width="457"><input type="text" name="Nome" value="" size="50" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Email:</td>
                        <td><input type="text" name="Email" value="" size="40" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Telefone:</td>
                        <td><span id="sprytextfield1">
                          <input type="text" name="Telefone" value="" size="25" maxlength="50" />
                          <span class="textfieldInvalidFormatMsg">Formato Inv&aacute;lido.</span></span></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Cidade:</td>
                        <td><input type="text" name="Cidade" value="" size="40" maxlength="255" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >UF:</td>
                        <td><select name="UF" id="uf">
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
                          </select></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Pa&iacute;s</td>
                        <td><input type="text" name="pais" value="Brasil" onfocus="if(this.value=='Brasil')this.value='';" /></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"><span  >
                      <label for="DataChegada">Data de Chegada:</label>
                      </span> <span class="style5">(Selecione) </span></td>
                        <td><input name="Data de Chegada" id="dataChegada" value="" size="10" maxlength="255"/>
                          <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataChegada);return false;" HIDEFOCUS>   <img class="PopcalTrigger" align="absmiddle" src="Scripts/calendar/calbtn.JPG" width="19" height="19" border="0" alt="Selecione a data de chegada.">                            </a>                          </td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"><span  >
                      <label for="DataPartida">Data de Partida:</label>
                      </span><span class="style5">(Selecione) </span></td>
                        <td><input name="Data de Partida" id="dataPartida"value="" size="10" maxlength="255"/>
                          <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reserva.dataPartida);return false;" HIDEFOCUS>   <img class="PopcalTrigger" align="absmiddle" src="Scripts/calendar/calbtn.JPG" width="19" height="19" border="0" alt="Selecione a data de partida."></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"><span  >Tipo de Acomoda&ccedil;&atilde;o</span></td>
                        <td><select name="Tipo Acomodacao" id="tipoAcomodacao">
                          <option value="N&atilde;o Especificou">- Selecione -</option>
                          <option value="Chal&eacute; Master">Chalet Master</option>
                          <option value="Chal&eacute; Superior">Chalet Superior</option>
                          <option value="Chal&eacute; Superior Lua-de-Mel">Chalet Superior Lua-de-Mel</option>
                          <option value="Chal&eacute; Geminado c/ Lareiria">Chalet Geminado c/ Lareiria</option>
                          <option value="Chal&eacute; Geminado s/ Lareiria">Chalet Geminado s/ Lareiria</option>
                          <option value="Apartamento">Apartamento</option>
                          </select></td>
                        </tr>
                  <tr>
                    <td bgcolor="#D7D2B5"  >Quantidade de Adultos:</td>
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
                    <td bgcolor="#D7D2B5"  >Quantidade de Crian&ccedil;as:</td>
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
                    <td bgcolor="#D7D2B5" class="KT_th"><span  >Informa&ccedil;&otilde;es Adicionais: </span><span class="style5"><br />
  </span>(Ex: Idades das crian&ccedil;as, camas separadas e etc.) </label></td>
                        <td><textarea name="Info Adicionais" cols="50" rows="5"></textarea></td>
                        </tr>
                  <tr>
                    <td bgcolor="#E5D8B5" class="KT_th">                  <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" /></td>
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
    <td align="center" valign="top"><img src="imagens/separador.png" width="748" height="7" /></td>
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
    <p>&nbsp;</p></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="60,334,173,355" href="../pacotes/index.php#pacotes" alt="Tarif&aacute;rio Balc&atilde;o" /><area shape="rect" coords="49,167,175,188" href="../index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="50,193,176,212" href="../hotel.php#link" alt="O Hotel" />
<area shape="rect" coords="51,219,173,240" href="../chalets.php#link" alt="Chalets" />
<area shape="rect" coords="55,247,171,270" href="../gastronomia.php#link" alt="Gastronomia" />
<area shape="rect" coords="56,275,173,297" href="../lazer.php#link" alt="Lazer" />
<area shape="rect" coords="58,300,170,324" href="../passeios.php#link" alt="Passeios" />
<area shape="rect" coords="60,367,172,389" href="../tarifario.php#link" alt="Tarif&aacute;rio Balc&atilde;o" />
<area shape="rect" coords="37,400,195,422" href="../reservas.php#link" alt="Reservas" />
<area shape="rect" coords="39,428,191,453" href="../luademel.php#link" alt="Lua-de-Mel" />
<area shape="rect" coords="40,460,189,482" href="../faleconosco.php#link" alt="Fale Conosco" />
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