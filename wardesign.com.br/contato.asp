<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%
Dim Mail
	If Request("Send") <> "" Then
		Set Mail = Server.CreateObject("Persits.MailSender")
		Mail.Host = "smtp.prosa.com.br"

		Mail.From = "victor@saquabb.com.br"
		Mail.FromName = "Wardesign - Contato"
		Mail.AddAddress "victor@saquabb.com.br"
		Mail.AddBcc "victor@saquabb.com.br"
		Mail.Subject = "Contato Wardesign"
		Mail.Body = "Nome " & Request.Form("nome") & chr(13) & chr(10) & "E-mail: " & Request.Form("email") & chr(13) & chr(10) & "Telefone: " & Request.Form("tel") & chr(13) & chr(10) & "Comentarios: " & Request.Form("comentarios") & chr(13) & chr(10) & "IP: " & Request.ServerVariables("REMOTE_ADDR")

		strErr = ""
		bSuccess = False
		On Error Resume Next ' catch errors
		Mail.Send	' send message
		If Err <> 0 Then ' error occurred
			strErr = Err.Description
		else
			bSuccess = True
		End If
	End If
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(figuras/fundo/contato.jpg);
}
.fonte {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
.borda {	border: 1px solid #000000;}

.style6 {color: #666666}
.style7 {color: #000000}
a:link {
	color: #666666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666666;
}
a:hover {
	text-decoration: none;
	color: #87C2EA;
}
a:active {
	text-decoration: none;
	color: #666666;
}
.cat {	font-size: 10px;
	font-weight:bold;
	color: #FF9900;
}
.style23 {
	font-size: 14px;
	font-weight: bold;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style24 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000; font-weight: bold; }
</style>
</head>

<body>
<div align="left"></div>
<div align="left"></div>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td><table width="372" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <th width="372" height="157" align="center" valign="middle" scope="col"><br>
            <table width="306" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <th width="306" height="25" bgcolor="#D3D3D3" scope="col"><img src="figuras/retalhos/contato.jpg" width="200" height="40"></th>
              </tr>
            </table>
            <div align="center" class="style6">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" class="titpropaganda">
                    <div align="center">
                      <% If strErr <> "" Then %>
                      <FONT COLOR="#FF0000">Erro ocorrido : <I>
                      <% = strErr %>
                      </I></FONT><br>
                      <% End If %>
                      <% If bSuccess Then %>
                      <span class="style23">Mensagem enviada com sucesso.<br>
                Obrigado.</span></div></td>
                  <% End If %>
                </tr>
                <tr>
                  <td align="center" class="style24"> Respons&aacute;vel: <span class="style6">Victor Caetano Wardi </span>Cel: <span class="style6">(22) 9267-9505</span> <br>
MSN: <span class="style6">victorsaquabb@hotmail.com </span><br>
Entre em contato conosco e saiba mais sobre pre&ccedil;os e formas de Pagamento </td>
                </tr>
                <tr>
                  <td align="left" valign="middle"><form action="contato.asp" method="POST">
                      <table width="307" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#990000">
                        <tr>
                          <td width="342"><table width="307" border="0" align="left" cellpadding="3" cellspacing="0" class="tdnot">
                              <tr>
                                <td height="10" colspan="2"></td>
                              </tr>
                              <tr bgcolor="#FFFF99">
                                <td width="80" align="right" bgcolor="#D3D3D3"> <span class="style7">Nome:</span><br>
                                </td>
                                <td width="250" bgcolor="#D3D3D3"><input name="nome" type="text" id="nome" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                              </tr>
                              <tr>
                                <td align="right"><span class="style7">E-mail:</span></td>
                                <td><input name="email" type="text" id="email2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                              </tr>
                              <tr>
                                <td align="right"><span class="style7">Telefone:</span></td>
                                <td bgcolor="#D3D3D3"><input name="tel" type="text" id="evento2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                              </tr>
                              <tr>
                                <td align="right"><span class="style7">Mensagem:</span></td>
                                <td><textarea name="comentarios" rows="4" cols="28" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input name="Send" type="submit" class="caixa" id="send3" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" value="Enviar"></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                      <div align="left"></div>
                      <div align="left"></div>
                      <div align="left"></div>
                  </form></td>
                </tr>
              </table>
          </div></th>
      </tr>
    </table></td>
  </tr>
</table>
<div align="center"></div>
</body>
</html>
