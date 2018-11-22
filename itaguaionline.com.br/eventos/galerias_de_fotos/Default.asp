<%@LANGUAGE="VBSCRIPT"%>
<% Option Explicit

Response.Expires = 0
Response.Buffer = True
%>
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

Dim NCompra
NCompra = (RsAlbum.Fields.Item("NCompra").Value)
%>
<html>
<head>
<title>Saquabb.com.br</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset rows="109,*" cols="*" frameborder="NO" border="0" framespacing="0">
  <frame src="topo.asp?Cod=<%=RsAlbum__MMColParam %>" name="topo" scrolling="NO" noresize>
  <frameset rows="*" cols="*,130" framespacing="0" frameborder="NO" border="0">
    <frame src="descricao.asp?Cod=<%=RsAlbum__MMColParam %>" name="principal" scrolling="AUTO">
    <frame src="thumbs.asp?Cod=<%=RsAlbum__MMColParam %>&NCompra=<%=Ncompra%>&th=1" name="thumbs" scrolling="auto" noresize>
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
<%
RsAlbum.Close()
Set RsAlbum = Nothing
%>
