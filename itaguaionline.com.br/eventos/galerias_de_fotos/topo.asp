<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../../Connections/conex.asp" -->
<%
Dim RsAlbum__MMColParam
RsAlbum__MMColParam = "1"
If (Request.QueryString("cod") <> "") Then 
  RsAlbum__MMColParam = Request.QueryString("cod")
End If
%>
<%
Dim RsAlbum
Dim RsAlbum_numRows

Set RsAlbum = Server.CreateObject("ADODB.Recordset")
RsAlbum.ActiveConnection = MM_conex_STRING
RsAlbum.Source = "SELECT * FROM Albuns WHERE cod = " + Replace(RsAlbum__MMColParam, "'", "''") + " ORDER BY cod DESC"
RsAlbum.CursorType = 0
RsAlbum.CursorLocation = 2
RsAlbum.LockType = 1
RsAlbum.Open()

RsAlbum_numRows = 0
%>

<html>
<head>
<title>Saquabb.com.br</title>
<link rel="StyleSheet" href="/novo/album/_system/styles.css">
<link href="../stilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style32 {
	color: #000000;
	font-size: 10px;
	font-family: Verdana;
}
.style33 {font-size: 14px; color: #FFFFFF; font-family: "Trebuchet MS";}
.style34 {
	color: #FFD600;
	font-size: 2px;
}
.style37 {color: #000000}
-->
</style></head>
<body> 

<table width="650"  border="0" cellpadding="0" cellspacing="0" background="">
  <tr>
    <td height="101" align="right" valign="top" background="imagens/fundo_festa.jpg"><table width="100" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td></td>
      </tr>
    </table>
    <table width="200" height="73" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFF00">
      <tr>
        <td width="198" height="33"></td>
      </tr>
      <tr>
        <td height="30" valign="top"><p>
<marquee scrollamount="5" width="145" bgcolor="#000000" style="color: #00ccff; font-size: 17px">
EVENTO: <%=(RsAlbum.Fields.Item("nome").Value)%> - <%=(RsAlbum.Fields.Item("data").Value)%> - FOTÓGRAFO: <%=(RsAlbum.Fields.Item("fotografo").Value)%> </marquee>&nbsp;&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
  <tr valign="top" bgcolor="#FFD600">
    <td height="2" bgcolor="#FFFFFF"><span class="txt style34"><span class="style37">--</span></span></td>
  </tr>
</table>
<table width="167" height="78" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr valign="bottom">
    <td height="14" colspan="2"><span class="titbranco14"><span class="titbranco14 data  style16"><span class="txt style25">Data: </span></span></span><span class="style33"><span class="style15 style25  style32"><%=(RsAlbum.Fields.Item("data").Value)%></span></span></td>
  </tr>
  <tr>
    <td width="146" height="22" valign="middle" class="txt style25 style23"><strong>Evento: </strong><span class="style30"><%=(RsAlbum.Fields.Item("nome").Value)%></span></td>
    <td width="21" valign="middle" class="txt style25 style23">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td height="24" colspan="2"><span class="txt style24  style23"><span class="txt style24  style26"><span class="style29"><strong>Fot&oacute;grafo: </strong></span></span></span><span class="style16 txt style24"><span class="style25"><span class="style30 txt"><%=(RsAlbum.Fields.Item("fotografo").Value)%></span></span></span></td>
  </tr>
</table>
</body>
</html>
<%
RsAlbum.Close()
Set RsAlbum = Nothing
%>