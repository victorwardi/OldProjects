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

	$remetente = "contato@saquabloco.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
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
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>||    Ricardao - Modelo   ||</title>


<link href="contato.css" rel="stylesheet" type="text/css" />

</head>
<body>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td height="210" align="left" valign="top">
      <h2 class="titulo_pg">Contato</h2>
      <div id="texto">
      <p><strong>SAC</strong><br />
Servi&ccedil;o de Atendimento ao Cliente<br />
<br />
(22) <strong>9949-3341</strong><br />
(22) <strong>9923-2535</strong><br />
(21) <strong>9612-1099</strong><br />
<br />
Envie um e-mail para:<br />
contato@jhowfolia.com.br<br />
contato@netterra..com.br<strong></strong></p>
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
</body>
</html> 
