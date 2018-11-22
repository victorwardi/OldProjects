<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../galeria_fotos/Connections/conSurf.asp" -->
<%
Dim Recordset1
Dim Recordset1_numRows

Set Recordset1 = Server.CreateObject("ADODB.Recordset")
Recordset1.ActiveConnection = MM_conSurf_STRING
Recordset1.Source = "SELECT arquivo, CodFoto, descricao FROM fotos"
Recordset1.CursorType = 0
Recordset1.CursorLocation = 2
Recordset1.LockType = 1
Recordset1.Open()

Recordset1_numRows = 0
%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100" height="70" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img name="" src="fotos\<%=(Recordset1.Fields.Item("arquivo").Value)%>" width="100" height="70" alt="<%=(Recordset1.Fields.Item("descricao").Value)%>"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<%
Recordset1.Close()
Set Recordset1 = Nothing
%>
