<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../galeria_fotos/Connections/conSurf.asp" -->
<%
Dim RsFoto__MMColParam
RsFoto__MMColParam = "1"
If (Request.QueryString("CodFoto") <> "") Then 
  RsFoto__MMColParam = Request.QueryString("CodFoto")
End If
%>
<%
Dim RsFoto
Dim RsFoto_numRows

Set RsFoto = Server.CreateObject("ADODB.Recordset")
RsFoto.ActiveConnection = MM_conSurf_STRING
RsFoto.Source = "SELECT *  FROM fotos  WHERE CodFoto = " + Replace(RsFoto__MMColParam, "'", "''") + ""
RsFoto.CursorType = 0
RsFoto.CursorLocation = 2
RsFoto.LockType = 1
RsFoto.Open()

RsFoto_numRows = 0
%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/galeria_fotos/xtra/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<table width="100%" height="331" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><img height="<%=(RsFoto.Fields.Item("altura").Value)%>" width="<%=(RsFoto.Fields.Item("largura").Value)%>" src="..\fotos\<%=(RsFoto.Fields.Item("arquivo").Value)%>"></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="nometur"><%=(RsFoto.Fields.Item("descricao").Value)%></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="mar">Foto: <span class="mar"><%=(RsFoto.Fields.Item("fotografo").Value)%></span></td>
  </tr>
  <tr>
    <td class="mar">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
