<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%
Dim Mail
	If Request("Send") <> "" Then
		Set Mail = Server.CreateObject("Persits.MailSender")
		Mail.Host = "smtp.prosa.com.br"

		Mail.From = "victor@saquabb.com.br"
		Mail.FromName = "XpressBB - Contato"
		Mail.AddAddress "saquabb@hotmial.com"
		Mail.AddBcc "victosaquabb@hotmial.com"
		Mail.Subject = "Contato XpressBB"
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
<html>
<head>
<title>XPRESS BODYBOARDING</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 24pt;
	color: #336699;
	font-family: Arial, Helvetica, sans-serif;
}
.style23 {	font-size: 14px;
	font-weight: bold;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style24 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000; font-weight: bold; }
.style6 {color: #666666}
.style7 {color: #000000}
-->
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (SUPERIOR3.psd) -->
<table id="Table_01" width="774" height="936" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">
			<img src="images/xpress_01.gif" width="126" height="179" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="images/xpress_02.gif" width="610" height="187" alt=""></td>
		<td rowspan="19">
			<img src="images/xpress_03.gif" width="37" height="935" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="179" alt=""></td>
	</tr>
	<tr>
		<td rowspan="16">
			<img src="images/xpress_04.gif" width="38" height="718" alt=""></td>
		<td colspan="2" rowspan="15">
			<img src="images/xpress_05.gif" width="15" height="706" alt=""></td>
		<td>
			<img src="images/xpress_06.gif" width="73" height="8" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/xpress_07.gif" width="153" height="13" alt=""></td>
		<td rowspan="15" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td height="682" valign="top" bgcolor="#FFFFFF"><table width="510" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th height="52" align="left" valign="bottom" scope="col"><div align="left">
                    <table width="200" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col"><div align="left"><span class="style1">Contato</span> </div></th>
                      </tr>
                    </table>
                  </div></th>
                </tr>
                <tr>
                  <td height="292"><div align="left"></div>
                    <div align="left"></div>
                    <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <th scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <td><table width="372" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <th width="372" height="157" align="center" valign="middle" scope="col"><br>
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
                                        <td align="center" class="style24"> Respons&aacute;vel: Aur&eacute;lio Marques Cel: (xx)xxxx-xxxx<br>                    
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
                                                      <td width="80" align="right" bgcolor="#FFFFFF"> <span class="style7">Nome:</span><br>                                                      </td>
                                                      <td width="250" bgcolor="#FFFFFF"><input name="nome" type="text" id="nome" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                      <td align="right"><span class="style7">E-mail:</span></td>
                                                      <td><input name="email" type="text" id="email2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                      <td align="right"><span class="style7">Telefone:</span></td>
                                                      <td bgcolor="#FFFFFF"><input name="tel" type="text" id="evento2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
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
                  <div align="center"></div></td>
                </tr>
              </table></td>
          </tr>
      </table></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="index.asp"><img src="images/xpress_09.gif" alt="" width="151" height="28" border="0"></a></td>
		<td rowspan="12">
			<img src="images/xpress_10.gif" width="2" height="234" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="28" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_11.gif" width="151" height="11" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="shapes.htm"><img src="images/xpress_12.gif" alt="" width="151" height="29" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_13.gif" width="151" height="9" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="9" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="portifolio.htm"><img src="images/xpress_14.gif" alt="" width="151" height="27" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="27" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_15.gif" width="151" height="13" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="equipe.htm"><img src="images/xpress_16.gif" alt="" width="151" height="25" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="25" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_17.gif" width="151" height="18" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="vendas.htm"><img src="images/xpress_18.gif" alt="" width="151" height="23" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_19.gif" width="151" height="20" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="contato.asp"><img src="images/xpress_20.gif" alt="" width="151" height="17" border="0" ,></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="17" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_21.gif" width="151" height="14" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2" bgcolor="#CCCCCC">&nbsp;			</td>
		<td rowspan="2">
			<img src="images/xpress_23.gif" width="2" height="463" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="451" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/xpress_24.gif" width="7" height="12" alt=""></td>
		<td>
			<img src="images/xpress_25.gif" width="8" height="12" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="12" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/xpress_26.gif" width="736" height="8" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" bgcolor="#CCCCCC"><div align="center"><img src="imagens/visualizacao.jpg" width="500" height="15"> </div></td>
		<td>
			<img src="images/spacer.gif" width="1" height="30" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="38" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="73" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="78" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="530" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="37" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>