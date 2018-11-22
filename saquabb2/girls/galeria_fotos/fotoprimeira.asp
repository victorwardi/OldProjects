<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/congirls.asp" -->
<%
Dim RsFoto
Dim RsFoto_numRows

Set RsFoto = Server.CreateObject("ADODB.Recordset")
RsFoto.ActiveConnection = MM_congirls_STRING
RsFoto.Source = "SELECT * FROM fotos_galeria ORDER BY CodFoto DESC"
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
	margin-top: 5px;
	margin-right: 10px;
	margin-bottom: 10px;
	background-color: #FFFFFF;
	background-image: url();
}
.style3 {
	color: #333333;
	font-size: 11px;
}
.brd {
	border: 1px solid #333333;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style5 {
	color: #FF0000;
	font-size: 11px;
	font-style: italic;
}
a:visited {
	color: #FF3399;
}
a:link {
	color: #FF3399;
}
a:hover {
	color: #FF3399;
}
a:active {
	color: #FF3399;
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
<table width="100" border="0">
  
  <tr>
    <td><table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="middle"><div align="right"><span class="mar  style5">Foto:<%=(RsFoto.Fields.Item("fotografo").Value)%></span></div></td>
      </tr>
      <tr>
        <td align="center" valign="middle"><img src="..\fotos\galeria\<%=(RsFoto.Fields.Item("arquivo").Value)%>" class="brd"></td>
      </tr>
      <tr>
        <td height="27" valign="middle" class="nometur"><div align="center"><span class="style3"><%=(RsFoto.Fields.Item("descricao").Value)%></span></div></td>
      </tr>
      <tr>
        <td class="style3"><div align="center">
          <p><br>
            Quer sua foto nesta galeria?<br>
            <strong><a href="mailto:victorsaquabb@hotmail.com?subject= Foto Galeria Saquabb Girls">Clique aqui</a></strong>, n&atilde;o se esque&ccedil;a de dizer quem &eacute; a atleta e o fot&oacute;grafo. </p>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
