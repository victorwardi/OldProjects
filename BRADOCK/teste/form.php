<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script src="http://www.linkws.com/js/s_validate.js" type='text/javascript' charset="iso-8859-1"></script>
<script>
function validateForm_114482(form) {
	var validator = new Validator();
	validator.validateSimpleTextField(form.assunto,"Erro no campo: Assunto do contato");validator.validateSimpleTextField(form.nome,"Erro no campo: Nome");validator.validateEmailField(form.email,"Erro no campo: E-mail");validator.validateSimpleTextField(form.email,"Erro no campo: E-mail");validator.validateSimpleTextField(form.mensagem,"Erro no campo: Mensagem");
	if (validator.processLog()) {
		if (form.sendBtn) {
			form.sendBtn.disabled = true;
		}
		return true;
	} else {
		return false;
	}
}
</script>
<form method="post" action="../index.php" accept-charset="iso-8859-1" onSubmit="return validateForm_114482(this);" >
<input type="hidden" name="actionID" value="18">
<input type="hidden" name="_charset_" value="">
<input type="hidden" name="userProductID" value="114482">
<script>document.write("<input type='hidden' name='__referer_1' value='"+document.referrer+"'>");</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Assunto do contato</strong></font> </td>
	<td> </td>
	<td valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
	  <input name="assunto" value="" size="50" maxlength="128" class="fieldStyle" />
	</font></td>
</tr>

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nome</strong></font> </td>
	<td> </td>
	<td valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
	  <input name="nome" value="" size="50" maxlength="128" class="fieldStyle" />
	</font></td>
</tr>

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>E-mail</strong></font> </td>
	<td> </td>
	<td valign="top"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><input name="email" value="" size="50" maxlength="255" class="fieldStyle"></font></td>
</tr>

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Mensagem</strong></font> </td>
	<td> </td>
	<td valign="top"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><textarea name="mensagem" cols="40" rows="5" class="fieldStyle" onKeyDown="limitTextArea(this, this.form._COUNTER_FIELD_mensagem, 255);" onKeyUp="limitTextArea(this, this.form._COUNTER_FIELD_mensagem, 255);"></textarea><input class="fieldStyle" disabled name="_COUNTER_FIELD_mensagem" size="3" value="255"></font></td>
</tr>

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Telefone</strong></font> </td>
	<td> </td>
	<td valign="top"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><input name="tel" value="" size="25" maxlength="20" class="fieldStyle"></font></td>
</tr>

<tr> 
	<td width="150" valign="top" bgcolor="#F5F5F5"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cidade</strong></font> </td>
	<td> </td>
	<td valign="top"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><input name="cidade" value="" size="40" maxlength="60" class="fieldStyle"></font></td>
</tr>
</table>
<p> 
<input name="sendBtn" type="submit"  value="Enviar">
  
<input type="reset"  value="Limpar">
<br>
<br>

</p>
</form>


</body>
</html>
