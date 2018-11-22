<?php
setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	$mensagem .= "Mensagem do Fale Conosco\n";
	$mensagem .= "============================\n\n";
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n";
	}

	$remetente = "info@pousadaesmeralda.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
	$assunto = "Mensagem do Fale Conosco do Site";
	
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
    

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','499','height','258','src','../flash/intro','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','../flash/intro' ); //end AC code
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
	<!-- InstanceBeginEditable name="conteudo" -->
    <link href="css/contato.css" rel="stylesheet" type="text/css" />
      <table width="100%" border="0" cellpadding="2" cellspacing="6">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#E5D8B5">
            <tr>
              <td height="36" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="6" class="titulo">
                  <tr>
                    <td><a name="link" id="link">Fale Conosco</a></td>
                  </tr>
                </table></td>
              </tr>
            
            <tr>
              <td width="67%" align="left" valign="top" bgcolor="#E5D8B5"><div id="texto">
              <p><strong>Telefone</strong><br />
                <br />                
                 <strong>[24] 3352-1643</strong><br />
                               
                <br />
                Envie um e-mail para:<br />
                info@pousadaesmeralda.com.br<br />
                </p>
              <p>Ou, se preferir, utilize o formul&aacute;rio abaixo.</p>
              <p>
                <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?><div><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><fieldset class="link_12px_preto_n">
                <label for="Nome" class="novidades_titulo">Nome:</label>
                  <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                  <label for="Cidade" class="novidades_titulo">Cidade:</label>
                  <input name="Cidade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                  <label for="Email" class="novidades_titulo">E-mail:</label>
                  <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                  <label for="Telefone" class="novidades_titulo">Telefone:</label>
                  <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                  <label for="Mensagem" class="novidades_titulo">Mensagem:</label>
                  <textarea name="Mensagem" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
                  <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                  </fieldset>
                </form>
              </div>
            </div></td>
              <td width="33%" align="left" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
                <tr>
                  <td bgcolor="#FFFFFF"><img src="fotos/reserva.jpg" alt="Cachoeira V&eacute;u de noiva" width="250" height="330" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width="67%" align="center" valign="top" bgcolor="#E5D8B5">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
    <!-- InstanceEndEditable -->    </div></td>
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="60,334,173,355" href="pacotes/index.php#pacotes" alt="Tarif&aacute;rio Balc&atilde;o" /><area shape="rect" coords="49,167,175,188" href="index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="50,193,176,212" href="hotel.php#link" alt="O Hotel" />
<area shape="rect" coords="51,219,173,240" href="chalets.php#link" alt="Chalets" />
<area shape="rect" coords="55,247,171,270" href="gastronomia.php#link" alt="Gastronomia" />
<area shape="rect" coords="56,275,173,297" href="lazer.php#link" alt="Lazer" />
<area shape="rect" coords="58,300,170,324" href="passeios.php#link" alt="Passeios" />
<area shape="rect" coords="60,368,172,390" href="tarifario.php#link" alt="Tarif&aacute;rio Balc&atilde;o" />
<area shape="rect" coords="37,399,195,421" href="reservas.php#link" alt="Reservas" />
<area shape="rect" coords="40,428,192,453" href="luademel.php#link" alt="Lua-de-Mel" />
<area shape="rect" coords="40,459,189,481" href="faleconosco.php#link" alt="Fale Conosco" />
<area shape="rect" coords="51,487,188,507" href="comochegar.php#link" alt="Como Chegar" />
<area shape="rect" coords="18,20,222,156" href="index.php" alt="Voltar para p&aacute;gina inicial" />
</map>




<map name="Map2" id="Map2"><area shape="rect" coords="371,77,481,186" href="reservas.php#link" alt="Reservas Online" />
</map><script type="text/javascript">
    arredondar.render('divArredondado');
	arredondar.render('divRodape');
</script></body>
<!-- InstanceEnd --></html>
