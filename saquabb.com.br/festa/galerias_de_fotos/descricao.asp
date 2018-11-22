<%@LANGUAGE="VBSCRIPT"%>
<% Option Explicit

Response.Expires = 0
Response.Buffer = True
%>
<!--#include file="../../Connections/conSurf.asp" -->
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
RsAlbum.ActiveConnection = MM_conSurf_STRING
RsAlbum.Source = "SELECT * FROM Albuns WHERE cod = " + Replace(RsAlbum__MMColParam, "'", "''") + " ORDER BY cod DESC"
RsAlbum.CursorType = 0
RsAlbum.CursorLocation = 2
RsAlbum.LockType = 1
RsAlbum.Open()

RsAlbum_numRows = 0
%>
<html>
<head>
<title>SaquaOnline.com.br</title>
<link rel="StyleSheet" href="/novo/album/_system/styles.css">
<link href="../stilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #000000;
}
body,td,th {
	color: #FFFFFF;
}
-->
</style></head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false"> 

<table width="97%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="91%" align="center" valign="middle"><table width="95%" height="95%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="middle"><div align="justify" class="texto12">
          <div align="center"><br>
		    <img src="/publicidade/banner2.jpg" width="400" height="300"><br>
          </div>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<%
RsAlbum.Close()
Set RsAlbum = Nothing
%>
