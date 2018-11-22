<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Reservas On Line Hotel Pousada Esmeralda</title>
</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" link="#FFC488" vlink="#00FF00"
alink="#006231" background="../feriados/fundoreserva1.jpg" text="#0000FF">
<%
if Request.QueryString("Nome")="" or Request.QueryString("T9")="" then Call Pre Else Call Ver

Sub Pre()
Response.Write("<p align='center'><small><strong><font face='Verdana' color='#0000A0'>Não é possível Continuar sem, no mínimo, NOME e EMAIL !<BR><a href='javascript:history.back(1)'>Volta</a></font></strong></small>")
End Sub

Sub Ver()
%>
<div align="center"><center>

<table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center"><font face="Tahoma" color="#004080"><strong><small>CONFIRMANDO
    SEUS DADOS<br>
    <small><a href="javascript:history.back(1)">Se Houver Algum Erro VOLTE AQUI</a></small></small></strong></font></p>
    <hr>
    <form method="GET" action="http://www.pousadaesmeralda.com.br/Mailer/envia.asp"
    name="FrmPre">
      <p><font face="Tahoma" color="#004080"><strong><small><small>Nome&nbsp; :<input
      type="text" name="Nome" size="54" value="<%=Request.QueryString("Nome")%>"> <br>
      End.&nbsp;&nbsp;&nbsp; :<input type="text" name="End" size="54"
      value="<%=Request.QueryString("End")%>"><br>
      Bairro&nbsp; :<input type="text" name="Bairro" size="16"
      value="<%=Request.QueryString("Bairro")%>">&nbsp; Cidade:<input type="text" name="Cidade"
      size="15" value="<%=Request.QueryString("Cidade")%>"> UF: <select SIZE="1" NAME="UF"
      tabindex="8">
        <option value="<%=Request.QueryString("UF")%>"><%=Request.QueryString("UF")%></option>
      </select> <br>
      CEP&nbsp;&nbsp;&nbsp;&nbsp; :<input type="text" name="CEP" size="10"
      value="<%=Request.QueryString("CEP")%>">DDD:</small><input type="text" name="DDD" size="3"
      value="<%=Request.QueryString("DDD")%>"><small>Tel(R):<input type="text" name="TELR"
      size="12" value="<%=Request.QueryString("TELR")%>"> Tel(C) :<input type="text" name="TELC"
      size="10" value="<%=Request.QueryString("TELC")%>"> <br>
      Celular :<input type="text" name="CEL" size="16" value="<%=Request.QueryString("CEL")%>">E-Mail:<input
      type="text" name="Email" size="28" value="<%=Request.QueryString("T9")%>"><br>
      Periodo:<select name="D1" size="1">
        <option value="<%=Request.QueryString("D1")%>"><%=Request.QueryString("D1")%></option>
      </select><select name="M1" size="1">
        <option value="<%=Request.QueryString("M1")%>"><%=Request.QueryString("M1")%></option>
      </select><select name="A1" size="1">
        <option value="<%=Request.QueryString("A1")%>"><%=Request.QueryString("A1")%></option>
      </select> Até:<select name="D2" size="1">
        <option value="<%=Request.QueryString("D2")%>"><%=Request.QueryString("D2")%></option>
      </select><select name="M2" size="1">
        <option value="<%=Request.QueryString("M2")%>"><%=Request.QueryString("M2")%></option>
      </select><select name="A2" size="1">
        <option value="<%=Request.QueryString("A2")%>"><%=Request.QueryString("A2")%></option>
      </select><br>
      Chegada: <select name="Chegada" size="1">
        <option value="<%=Request.QueryString("Chegada")%>"><%=Request.QueryString("Chegada")%></option>
      </select> Data/Depósito:<input type="text" name="DataDep" size="9"
      value="<%=Request.QueryString("DataDep")%>">Valor:<input type="text" name="Valor"
      size="10" value="<%=Request.QueryString("Valor")%>"></small></small></strong></font></p>
      <hr>
      <div align="left"><p><font face="Tahoma" color="#004080"><strong><small><small>Acomodações:<select
      name="Acomod" size="1">
        <option value="<%=Request.QueryString("Acomod")%>"><%=Request.QueryString("Acomod")%></option>
      </select> Quant.Pessoas:</small><select name="Adultos" size="1">
        <option value="<%=Request.QueryString("Adultos") & " Adultos"%>"><%=Request.QueryString("Adultos")%></option>
      </select><select name="Casal" size="1">
        <option value="<%=Request.QueryString("Casal")%>"><%=Request.QueryString("Casal")%></option>
      </select><select name="Chd" size="1">
        <option value="<%=Request.QueryString("Chd")%>"><%=Request.QueryString("Chd")%></option>
      </select><br>
      <small>Comentários:</small><br>
      <textarea rows="2" name="OBS" cols="59"><%=Request.QueryString("OBS")%></textarea></small></strong></font></p>
      </div><div align="center"><center><p><font face="Tahoma" color="#004080"><strong><small><small><a
      href="javascript:history.back(1)">Se Houver Algum Erro VOLTE AQUI<br>
      </a></small><br>
      <input type="submit" value="Envia os dados para Reserva"
      style="font-family: Verdana; background-color: rgb(0,0,0); color: rgb(0,255,0); font-size: 12"></small></strong></font></p>
      </center></div>
    </form>
    </td>
  </tr>
</table>
</center></div><%End Sub%>

</body>
</html>
