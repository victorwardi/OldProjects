<?
include("config.php");
if($envia){
	
	$Email = new Email($usar_smtp);
	$Email->set_obrigatorios($campos_obrigatorios);
	$Email->testa_valores($_POST);

	# Seta os campos para envio
	$Email->From 		= $_POST['Email']; 	# Email de Remetente
	$Email->FromName 	= $_POST['Nome'];	# Nome Remetente
	$Email->AddAddress($email_destino, $nome_destino); # Email Destino
	$Email->Subject 	= $Assunto;			# Assunto
	
	# Envia Email
	$Email->envia();
	$Email->msg_resposta($msg_resposta, $_POST['Nome'], $_POST['Email']);
	
	# Exibe dados na tela -  Use a variável $conteudo caso queira exibir o corpo da mensagem
	$conteudo = $Email->conteudo; 
	# Exibe mensagens de erro e sucesso(Coloque a variavel $msg em qualquer lugar da página)
	$Email->mostra_msg();
	$msg = $Email->msg;
	$msg .= $Email->erro;
}
?> 

<!-- Estilos-->
<style type="text/css">
<!--
.texto      	{font: 13px Verdana; text-decoration: none; color: #000000}
.texto_peq		{font: 10px Verdana; text-decoration: none; color: #666666}
.titulo			{font: bold 13px Verdana; text-decoration: none; color: #003366}
.form_campos	{background-color: #FFFFFF; font: 12px Verdana; border-style: groove}
.form_botao 	{background-color: #EBEBEB; font: 12px Verdana;	border: 1px solid #CCCCCC;
}
-->
</style>
<!-- Estilos-->
<!-- Nome da Aplicação - estas linhas podem ser removidas-->
<table width="350" border="1" align="center" cellpadding="6" cellspacing="0" bordercolor="#EEEEEE">
    <tr>
      <td class="titulo"><? echo $app_nome; ?></td>
	</tr>
</table>  
<!-- Nome da Aplicação-->

<? if($msg != ''){ ?>
<!-- Mensagens - Pode ser movido mas não removido, caso remova, as mensagens não serão exibidas-->
<br>  
<table width="350" border="1" align="center" cellpadding="6" cellspacing="0" bordercolor="#EEEEEE">
    <tr>
      <td><? echo $msg.$erro; ?></td>
	</tr>
</table>  
<!-- Mensagens-->
<? } ?>
<form name="frm" method="post" action="<? $PHP_SELF; ?>?envia=1">
  <table width="350" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EEEEEE">
    <tr>
      <td><table width="300" border="0" cellpadding="6" cellspacing="0">
          <tr> 
            <td valign="top" width="100" nowrap><font class="texto">Nome:</font></td>
            <td> <input class="form_campos" type="text" name="Nome" size="34" value="<? echo $_POST['Nome']; ?>"> 
            </td>
          </tr>
          <tr> 
            <td width="100" valign="top" nowrap><font class="texto">Cidade</font></td>
            <td> <input class="form_campos" type="text" name="Cidade" size="20" <? echo $_POST['Cidade']; ?>> 
            </td>
          </tr>
          <tr> 
            <td width="100" valign="top" nowrap><font class="texto">Estado:</font></td>
            <td> <input class="form_campos" type="text" name="Estado" size="20" <? echo $_POST['Estado']; ?>> 
            </td>
          </tr>
          <tr> 
            <td width="100" valign="top" nowrap><font class="texto">E-mail:</font></td>
            <td> <input class="form_campos" type="text" name="Email" size="34" <? echo $_POST['Email']; ?>> 
            </td>
          </tr>
          <tr> 
            <td width="100" valign="top" nowrap><font class="texto">Assunto:</font></td>
            <td> <select class="form_campos" name="Assunto">
                <option class="form_campos" value="Opinião" selected>Opinião</option>
                <option class="form_campos" value="Sugestão">Sugestão</option>
                <option class="form_campos" value="Parceria">Parceria</option>
                <option class="form_campos" value="Reclamação">Reclamação</option>
                <option class="form_campos" value="Sem assunto">Outros</option>
              </select> </td>
          </tr>
          <tr> 
            <td width="100" valign="top" nowrap><font class="texto">Mensagem:</font></td>
            <td> <textarea class="form_campos" name="Mensagem" cols="34" rows="6"><? echo $_POST['Mensagem']; ?></textarea> 
            </td>
          </tr>
          <tr> 
            <td colspan="2" valign="middle"> <br> <div align="center"> 
                <input name="submit" type="submit" class="form_botao" value="Enviar Mensagem">
                <input class="form_botao" type="reset" name="Limpar" value="Limpar Form">
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </form>
  
<!-- Nome do Autor - estas linhas podem ser removidas-->
<table width="350" border="1" align="center" cellpadding="6" cellspacing="0" bordercolor="#EEEEEE">
    <tr>
      <td class="texto_peq"><? echo $app_autor; ?> - <? echo $app_link; ?></td>
	</tr>
</table>  
<!-- Nome da Aplicação-->