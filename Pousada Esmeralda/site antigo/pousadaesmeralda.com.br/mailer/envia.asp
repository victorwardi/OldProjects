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

TEXTO="<html><head><meta HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=iso-8859-1'>" & _ 
      "</head><body TEXT='#000000' BGCOLOR='#000000' LINK='#000000' VLINK='#000000' ALINK='#000000' " & _ 
      "BACKGROUND='http://www.pousadaesmeralda.com.br/back1.jpg' topmargin='0'> " & _ 
      "<table border='0' width='100%' height='438' background='http://www.pousadaesmeralda.com.br/feriados/fundoreserva1.jpg'>" & _ 
      "<tr><td width='100%' height='434' valign='top'><div align='right'><table border='0' " & _ 
      "cellpadding='0' cellspacing='0' width='76%'><tr><td width='100%'><div align='left'><table " & _ 
      "border='0' cellpadding='0' cellspacing='0' width='84%'><tr><td width='20%'><font face='Tahoma' " & _ 
      "color='#8B6F34'><strong><small>Nome: " & Request.QueryString("Nome") & "</small></strong></font></td>" & _ 
      "</tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Endereço: " & _ 
      Request.QueryString("End") & "</small></strong></font></td></tr><tr><td width='20%'><font " & _ 
      "face='Tahoma' color='#8B6F34'><strong><small>Bairro: " & Request.QueryString("Bairro") & _ 
      "</small></strong></font></td></tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong>" & _ 
      "<small>Cidade: " & Request.QueryString("Cidade") & "-" & Request.QueryString("UF") & _ 
      "</small></strong></font></td></tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong>" & _ 
      "<small>CEP: " & Request.QueryString("CEP") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>DDD: " & Request.QueryString("DDD") & _ 
      "</small></strong></font></td></tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong>" & _ 
      "<small>Tel. Res.: " & Request.QueryString("TELR") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Tel. Com.: " & Request.QueryString("TELC") & _ 
      "</small></strong></font></td></tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong>" & _ 
      "<small>Celular: " & Request.QueryString("CEL") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>" & _ 
      "Email: " & Request.QueryString("Email") & "</small></strong></font></td></tr><tr><td width='20%'>" & _ 
      "<font face='Tahoma' color='#8B6F34'><strong><small>Período: " & _ 
      Request.QueryString("D1") & "/" & Request.QueryString("M1") & "/" & Request.QueryString("A1") & " <=> " & Request.QueryString("D2") & "/" & Request.QueryString("M2") & "/" & Request.QueryString("A2") & _ 
      "</small></strong></font></td></tr><tr><td width='20%'><font face='Tahoma' color='#8B6F34'><strong>" & _
      "<small>Chegada: " & Request.QueryString("Chegada") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Depósito em: " & _ 
      Request.QueryString("DataDep") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Acomodações: " & _ 
      Request.QueryString("Acomod") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Adultos: " & _ 
      Request.QueryString("Adultos") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Casal: " & _ 
      Request.QueryString("Casal") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>CHD: " & _ 
      Request.QueryString("Chd") & "</small></strong></font></td></tr><tr>" & _ 
      "<td width='20%'><font face='Tahoma' color='#8B6F34'><strong><small>Obs.: " & _ 
      Request.QueryString("OBS") & "</small></strong></font></td></tr></table></div><p>" & _ 
      "</td></tr></table></div></td></tr></table></body></html>"




TEXTO1="<html><head><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>" & _ 
          "</head><body background='http://www.pousadaesmeralda.com.br/paisanoite.jpg' " & _ 
          "bgcolor='#000000' topmargin='0'><table border='0' cellpadding='4' cellspacing='4' width='62%' " & _ 
          "><tr><td width='100%'><small><font color='#FFFF80' face='Tahoma'>" & _ 
          Request.QueryString("Nome") & "<br><br>Seu pedido foi encaminhado para nossa Central de Reservas" & _ 
          "<br>com cópia para você, para acompanhamento.<br>" & _ 
          "Em breve entraremos em contato , para podermos confirmar seu pedido,<br>" & _ 
          "ou mesmo sugerir alternativas, se for o caso.<br>Este E-Mail, já é uma pré reserva, que será " & _ 
          "concretizada após o<br>pagamento de 50% do valor do período e enviado por Fax para 024 352 1769," & _ 
          "<br>ou para o Fax 011 5031 5700.<br><br>Após todos os detalhes acertados, nossa Central de " & _ 
          "Reservas lhe fornecerá<br>os detalhes Bancários para a concretização final da Reserva.<br>" & _ 
          "Se o formulário foi preenchido corretamente, sua Ficha de Check-In<br>" & _ 
          "também já estará preenchida, para poupar seu tempo.<br>" & _ 
          "Seja Benvindo ao seu Lazer e Descanso, e ao prazer do Hotel Pousada<br>" & _ 
          "Esmeralda<br>Parque Nacional de Itatiaia-RJ<br>Reservas: (São Paulo) 011 5031 0013 " & _ 
          "(Itatiaia) 024 352 1769 e 024 352 1643<br>E-Mail: <a href='mailto:info@pousadaesmeralda.com.br'>" & _ 
          "info@pousadaesmeralda.com.br</a>&nbsp; ou&nbsp; <a href='mailto:pousadaesmeralda@rede1.com.br'>" & _ 
          "pousadaesmeralda@rede1.com.br</a><br><br><br><br>" & _ 
          "Nome: " & Request.QueryString("Nome") & "<br>" & _
          "Endereço : " & Request.QueryString("End") & "<br>" & _
          "Bairro: " & Request.QueryString("Bairro") & "<br>" & _
          "Cidade: " & Request.QueryString("Cidade") & "-" & Request.QueryString("UF") & "<br>" & _
          "CEP :" & Request.QueryString("CEP") & "<br>" & _
	       "DDD :" & Request.QueryString("DDD") & "<br>" & _
          "TEL Res: " & Request.QueryString("TELR") & "<br>" & _
          "Tel Com: " & Request.QueryString("TELC") & "<br>" & _
          "Celular: " & Request.QueryString("CEL") & "<br>" & _
		   "E-Mail : " & Request.QueryString("Email") & "<br>" & _
          "Periodo: " & Request.QueryString("D1") & "/" & Request.QueryString("M1") & "/" & Request.QueryString("A1") & " <=> " & Request.QueryString("D2") & "/" & Request.QueryString("M2") & "/" & Request.QueryString("A2") & "<br>" & _
          "Na Chegada: " & Request.QueryString("Chegada") & "<br>" & _
          "Deposito em:" & Request.QueryString("DataDep") & "<br>" & _
          "VALOR: " & Request.QueryString("Valor") & "<br>" & _
          "Acomodações: " & Request.QueryString("Acomod") & "<br>" & _
          "Adultos: " & Request.QueryString("Adultos") & "<br>" & _
          "Casal : " & Request.QueryString("Casal") & "<br>" & _
          "Chd : " & Request.QueryString("Chd") & "<br>" & _
          "OBS: " & Request.QueryString("OBS") & "</font></small></td></tr></table></body></html>"



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
    <td width="50%"><p align="center"><img src="../apart2.jpg" WIDTH="283" HEIGHT="185"></td>
  </tr>
  <tr>
    <td width="50%"><p align="center"><font face="Verdana" color="#80FF80"><small>SUA
    SOLICITAÇÃO DE RESERVA FOI RECEBIDA</small>.<br>
    <small>OBRIGADO</small><br>
    </font><font face="Verdana" color="#C6C600"><a href="http://www.pousadaesmeralda.com.br/"
    target="_top"><img src="http://www.pousadaesmeralda.com.br/volta.gif" alt="VOLTA"
    border="0" WIDTH="43" HEIGHT="37"></a></font></td>
  </tr>
</table>
</center></div>
</body>
</html>

<html><script language="JavaScript"></script></html>