<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/con_kiuchi.asp" -->
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
RsFoto.ActiveConnection = MM_con_kiuchi_STRING
RsFoto.Source = "SELECT * FROM fotos_galerias WHERE CodFoto = " + Replace(RsFoto__MMColParam, "'", "''") + ""
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
	background-color: #000000;
	background-image: url();
}
.style1 {color: #666666}
.style2 {color: #333333}
.brd {
	border: 4px solid #ffffff;
}
body,td,th {
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {color: #FFFFFF}
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
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><div align="center"><br>
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
          <td align="center" valign="middle"><img src="..\fotos\galeria\<%=(RsFoto.Fields.Item("arquivo").Value)%>" width="<%=(RsFoto.Fields.Item("largura").Value)%>" height="<%=(RsFoto.Fields.Item("altura").Value)%>" class="brd"></td>
        </tr>
        <tr>
          <td valign="middle" class="nometur style1"><div align="center" class="style3"><%=(RsFoto.Fields.Item("descricao").Value)%></div></td>
        </tr>
        <tr>
          <td valign="middle" class="mar"><div align="center"><span class="style3">Foto:</span> <span class="mar style3"><%=(RsFoto.Fields.Item("fotografo").Value)%></span></div></td>
        </tr>
        <tr>
          <td class="mar">&nbsp;</td>
        </tr>
      </table>
    <% End If %></th>
  </tr>
</table>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
