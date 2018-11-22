<?php
setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n";
	}

	$remetente = "ricardo_saqua@netterra.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = "ricardo_saqua@hotmail.com";
	$assunto = "Mensagem do Contato do Site";
	
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>contato</title>
<link href="css/contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','766','height','374','src','flash/header_V8','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/header_V8' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="766" height="374">
      <param name="movie" value="Templates/flash/header_V8.swf" />
      <param name="quality" value="high" />
      <embed src="Templates/flash/header_V8.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="766" height="374"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td height="19" background="imagens/recotes_02.jpg"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="766" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="539">
          <table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td height="210" align="left" valign="top">
      <h2 class="titulo_pg">Contato</h2>
      <div id="texto">
      
Envie um e-mail para:<br />
ricardo_saqua@hotmail.com<br />
xxxxxxxxxxx<strong></strong></p>
      <p>Ou, se preferir, utilize o formul&aacute;rio abaixo.</p>
      <h2>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
        </h2>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
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
      </div>
      </div>
</td>
  </tr>
  </table>
          
          
          
          
            <p>&nbsp; </p></td>
          <td width="227"><p>........</p>
          </td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="45"><img src="imagens/recotes_03.jpg" width="766" height="179" /></td>
  </tr>
  <tr>
    <td height="9"><img src="imagens/recotes_04.jpg" width="766" height="55" border="0" usemap="#Map" /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="61,5,103,32" href="#" /><area shape="rect" coords="121,7,197,34" href="#" /><area shape="rect" coords="206,9,251,35" href="#" /><area shape="rect" coords="262,8,308,37" href="#" /><area shape="rect" coords="318,5,412,38" href="#" /><area shape="rect" coords="427,8,507,33" href="#" /><area shape="rect" coords="523,8,577,33" href="#" /></map></body>
<!-- InstanceEnd --></html>
