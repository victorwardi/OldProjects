<%@LANGUAGE="VBSCRIPT"%>

<!--#include file="../Connections/con_kiuchi.asp" -->
<%
Dim RsFoto
Dim RsFoto_numRows

Set RsFoto = Server.CreateObject("ADODB.Recordset")
RsFoto.ActiveConnection = MM_con_kiuchi_STRING
RsFoto.Source = "SELECT * FROM fotos_galerias ORDER BY CodFoto DESC"
RsFoto.CursorType = 0
RsFoto.CursorLocation = 2
RsFoto.LockType = 1
RsFoto.Open()

RsFoto_numRows = 0
%>
<%
Dim galeria
Dim galeria_numRows

Set galeria = Server.CreateObject("ADODB.Recordset")
galeria.ActiveConnection = MM_con_kiuchi_STRING
galeria.Source = "SELECT * FROM Galerias ORDER BY Cod DESC"
galeria.CursorType = 0
galeria.CursorLocation = 2
galeria.LockType = 1
galeria.Open()

galeria_numRows = 0
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
	background-color: #CCCCCC;
	background-image: url(http://www.saquabb.com.br/galeria_fotos/img/meio.jpg);
}
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
<div align="center">
    
  <br>
  <br>
  <div id="Layer1" style="position:absolute; width:382px; height:58px; z-index:1; left: 95px; top: 57px;">
    <div align="center"> </div>
    <table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="152" class="mar"><div align="center"><%=(galeria.Fields.Item("Titulo").Value)%></div></td>
      </tr>
      <tr>
        <td class="mar"><div align="center"><%=(galeria.Fields.Item("descricao").Value)%></div></td>
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
<%
galeria.Close()
Set galeria = Nothing
%>
