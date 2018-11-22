<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/conSurf.asp" -->
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
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	background-color: #FFFFFF;
	background-image: url(/galeria_fotos/img/meio.jpg);
}
.style1 {color: #666666}
.style2 {color: #333333}
.brd {
	border: 2px solid #333333;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body>
<div id="Layer1" style="position:absolute; width:200px; height:127px; z-index:1; left: 95px; top: 33px;">
  <div align="center"> <br>
      <br>
  </div>
  <% If (RsFoto__MMColParam = "1") Then %>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="172" height="26" class="mat">Escolha a foto a direita </td>
    </tr>
  </table>
  <% End If %>
  <% If (RsFoto__MMColParam <> "1") Then %>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle"><img src="..\fotos\<%=(RsFoto.Fields.Item("arquivo").Value)%>" width="<%=(RsFoto.Fields.Item("largura").Value)%>" height="<%=(RsFoto.Fields.Item("altura").Value)%>" class="brd"></td>
    </tr>
    <tr>
      <td valign="middle" class="nometur style1"><div align="center"><%=(RsFoto.Fields.Item("descricao").Value)%></div></td>
    </tr>
    <tr>
      <td valign="middle" class="mar"><div align="center"><span class="style2">Foto:</span> <span class="mar style1"><%=(RsFoto.Fields.Item("fotografo").Value)%></span></div></td>
    </tr>
    <tr>
      <td class="mar">&nbsp;</td>
    </tr>
  </table>
  <% End If %>
</div>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
