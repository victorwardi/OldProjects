<%Response.Cookies("User")=Request.QueryString("Nome")%>
<%Response.Cookies("Email")=Request.QueryString("Email")%>
<%Response.Cookies("User").Expires = "01/Jan/2002"%>
<%Response.Cookies("Email").Expires = "01/Jan/2002"%>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Confirmado Recebimento</title>
</head>

<body bgcolor="#000000">
<%

TEXTO=Request.QueryString("Nome") & VbCrLf & VbCrLf & _
      "Seu pedido foi encaminhado para nossa Central de Reservas" & VbCrLf & _ 
      "com cópia para você, para acompanhamento." & VbCrLf & _ 
      "Em breve entraremos em contato , para podermos confirmar seu pedido, " & VbCrLf & _ 
      "ou mesmo sugerir alternativas, se for o caso." & VbCrLf & _ 
      "Este E-Mail, já é uma pré reserva, que será concretizada após o " & VbCrLf & _ 
      "pagamento de 50% do valor do período e enviado por Fax para 024 352 1769," & VbCrLf & _ 
	   "ou para o Fax 011 5031 5700." & VbCrLf & VbCrLf & _ 
      "Após todos os detalhes acertados, nossa Central de Reservas lhe fornecerá" & VbCrLf & _
      "os detalhes Bancários para a concretização final da Reserva." & VbCrLf & _
      "Se o formulário foi preenchido corretamente, sua Ficha de Check-In " & VbCrLf & _
      "também já estará preenchida, para poupar seu tempo." & VbCrLf & _
      "Seja Benvindo ao seu Lazer e Descanso, e ao prazer do Hotel Pousada Esmeralda" & VbCrLf & _
      "Parque Nacional de Itatiaia-RJ" & VbCrLf & _
      "Reservas: (São Paulo) 011 5031 0013 (Itatiaia) 024 352 1769 e 024 352 1643"  & VbCrLf & _
	  "E-Mail: info@pousadaesmeralda.com.br  ou  pousadaesmeralda@rede1.com.br" & VbCrLf & VbCrLf & _
	  "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" & VbCrLf & VbCrLf & _
       "Nome: " & Request.QueryString("Nome") & VbCrLf & _
       "Endereço : " & Request.QueryString("End") & VbCrLf & _
       "Bairro: " & Request.QueryString("Bairro") & VbCrLf & _
       "Cidade: " & Request.QueryString("Cidade") & "-" & Request.QueryString("UF") & VbCrLf & _
       "CEP :" & Request.QueryString("CEP") & VbCrLf & _
	    "DDD :" & Request.QueryString("DDD") & VbCrLf & _
       "TEL Res: " & Request.QueryString("TELR") & VbCrLf & _
       "Tel Com: " & Request.QueryString("TELC") & VbCrLf & _
       "Celular: " & Request.QueryString("CEL") & VbCrLf & _
		"E-Mail : " & Request.QueryString("Email") & VbCrLf & _
       "Periodo: " & Request.QueryString("D1") & "/" & Request.QueryString("M1") & "/" & Request.QueryString("A1") & " <=> " & Request.QueryString("D2") & "/" & Request.QueryString("M2") & "/" & Request.QueryString("A2") & VbCrLf & _
       "Na Chegada: " & Request.QueryString("Chegada") & VbCrLf & _
       "Deposito em:" & Request.QueryString("DataDep") & VbCrLf & _
       "VALOR: " & Request.QueryString("Valor") & VbCrLf & _
       "Acomodações: " & Request.QueryString("Acomod") & VbCrLf & _
       "Adultos: " & Request.QueryString("Adultos") & VbCrLf & _
       "Casal : " & Request.QueryString("Casal") & VbCrLf & _
       "Chd : " & Request.QueryString("Chd") & VbCrLf & _
       "OBS: " & Request.QueryString("OBS")



Set Mail = Server.CreateObject("Persits.MailSender")

Mail.Host = "127.0.0.1" ' Specify a valid SMTP server
Mail.From = "pousadaesmeralda@rede1.com.br"
Mail.FromName = "Pousada Esmeralda" ' Specify sender's name 
Mail.AddAddress Request.QueryString("Email")
Mail.AddReplyTo "pousadaesmeralda@rede1.com.br"
Mail.AddBCC "suporte@rede1.com.br"
Mail.AddBCC "pousadaesmeralda@rede1.com.br"
Mail.Subject = "Reservas Descanso.com.br"
Mail.Body = TEXTO
Mail.IsHTML = True 



On Error Resume Next
Mail.Send
If Err <> 0 Then
Response.Write "Houve o seguinte Erro no Processamento: " & Err.Description & " - REDE1 Internet"

End If




%>
<div align="center"><center>

<table border="1" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="50%"><p align="center"><img src="esmeraldanovo.jpg" WIDTH="327" HEIGHT="153"></td>
  </tr>
  <tr>
    <td width="50%"><p align="center"><font face="Verdana" color="#FFFFD9"><small>SUA
    SOLICITAÇÃO DE RESERVA FOI RECEBIDA</small>.<br>
    <small>OBRIGADO</small><br>
    </font><font face="Verdana" color="#C6C600"><a href="../" target="_top"><img
    src="volta.gif" alt="VOLTA" border="0" WIDTH="43" HEIGHT="37"></a></font></td>
  </tr>
</table>
</center></div>
</body>
</html>

<html><script language="JavaScript"></script></html>