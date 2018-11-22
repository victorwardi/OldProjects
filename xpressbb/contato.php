<?
if( !empty( $Email ) && is_array( $HTTP_POST_VARS ) )
{
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $HTTP_POST_VARS ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n";
	}
	$remetente = "contato@xpressbb.com" ;
	$cabecalho = "From: \"Site XpressBB.com\" <".$remetente.">\n"; 
	$cabecalho .= "X-Mailer: Formulário do site\n"; 
	$destinatario = "contato@xpressbb.com";
	$assunto = "Contato Site XpressBB.com";
	
	// Envia o e-mail
	if(!mail($destinatario, $assunto, $mensagem, $cabecalho))
		$msg = "Falha no envio da mensagem!";
	else 
		$msg = "E-mail enviado com sucesso!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/contato.css" rel="stylesheet" type="text/css">

			<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 20px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<title>Contato</title>
</head>

<body>
<form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
				<fieldset>
					<legend title="Entre em contato conosco">Contato Xpressbb.com <br>
					</legend>
					<label for="Nome">Nome:</label>
					<input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
					<label for="Email">E-mail:</label>
					<input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
					<label for="Telefone">Telefone:</label>
					<input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
					<label for="Endereco">Categoria:</label>
					<select name="Categoria" class="textbox" id="Categoria">
					  <option>Selecione</option>
					  <option value="Cr&iacute;tica">Cr&iacute;tica</option>
					  <option value="Comprar">Comprar</option>
					  <option value="Parceria">Parceria</option>
					  <option value="Outros">Outros</option>
                </select>
					<label for="Mensagem">Mensagem: </label>
					<textarea name="Mensagem" cols="50" rows="4" tabindex="5" class="textbox"></textarea>
					<label class="nada">&nbsp;</label>
					<input name="Submit" id="botao" type="submit" tabindex="6" value="Enviar" />
				</fieldset>
			</form>
</body>
</html>
