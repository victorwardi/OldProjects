<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/conSurf.asp" -->
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
RsFoto.ActiveConnection = MM_conSurf_STRING
RsFoto.Source = "SELECT * FROM fotos WHERE CodGaleria = " + Replace(RsFoto__MMColParam, "'", "''") + " ORDER BY CodFoto DESC"
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
	background-image: url();
}
.style2 {color: #666666}
.style3 {color: #333333}
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
<div align="center"> <br>
    <br>
    <div id="Layer1" style="position:absolute; width:26px; height:58px; z-index:1; left: 95px; top: 57px;">
      <div align="center"> </div>
      <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" valign="middle"><img src="..\fotos\<%=(RsFoto.Fields.Item("arquivo").Value)%>" width="<%=(RsFoto.Fields.Item("largura").Value)%>" height="<%=(RsFoto.Fields.Item("altura").Value)%>" class="brd"></td>
        </tr>
        <tr>
          <td valign="middle" class="nometur"><div align="center"><span class="style3"><%=(RsFoto.Fields.Item("descricao").Value)%></span></div></td>
        </tr>
        <tr>
          <td valign="middle" class="mar style2"><div align="center">Foto: <span class="mar"><%=(RsFoto.Fields.Item("fotografo").Value)%></span></div></td>
        </tr>
        <tr>
          <td class="mar">&nbsp;</td>
        </tr>
      </table>
    </div>
</div>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
