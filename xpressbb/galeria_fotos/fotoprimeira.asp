<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/con_kiuchi.asp" -->
<%
Dim RsFoto__MMColParam
RsFoto__MMColParam = "1"
If (Request.QueryString("CodGaleria") <> "") Then 
  RsFoto__MMColParam = Request.QueryString("CodGaleria")
End If
%>
<%
Dim RsFoto
Dim RsFoto_numRows

Set RsFoto = Server.CreateObject("ADODB.Recordset")
RsFoto.ActiveConnection = MM_con_kiuchi_STRING
RsFoto.Source = "SELECT * FROM fotos_galerias WHERE CodGaleria = " + Replace(RsFoto__MMColParam, "'", "''") + " ORDER BY CodFoto DESC"
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
.style2 {color: #666666}
.brd {
	border: 4px solid #ffffff;
}
body,td,th {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {color: #FFFFFF}
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
<div align="center">
  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle"><div align="center"><img src="..%5Cfotos%5Cgaleria%5C<%=(RsFoto.Fields.Item("arquivo").Value)%>" width="<%=(RsFoto.Fields.Item("largura").Value)%>" height="<%=(RsFoto.Fields.Item("altura").Value)%>" class="brd"></div></td>
    </tr>
    <tr>
      <td valign="middle" class="nometur"><div align="center"><span class="style4"><%=(RsFoto.Fields.Item("descricao").Value)%></span></div></td>
    </tr>
    <tr>
      <td valign="middle" class="mar style2"><div align="center"><span class="style4">Foto: </span><span class="mar style4"><%=(RsFoto.Fields.Item("fotografo").Value)%></span></div></td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
    </tr>
  </table>
</div>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
