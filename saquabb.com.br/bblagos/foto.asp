<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/conexao.asp" -->
<%
Dim Recordset1
Dim Recordset1_numRows

Set Recordset1 = Server.CreateObject("ADODB.Recordset")
Recordset1.ActiveConnection = MM_conexao_STRING
Recordset1.Source = "SELECT *  FROM high_quality_photos  ORDER BY cod ASC"
Recordset1.CursorType = 0
Recordset1.CursorLocation = 2
Recordset1.LockType = 1
Recordset1.Open()

Recordset1_numRows = 0
%><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Galeria de Fotos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.brd {border: 1px solid #000000;
}
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style2 {
	font-size: 12px;
	color: #FFFFFF;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
	color: #FFFFFF;
}
.style4 {color: #000000}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<script language="JavaScript" src="../banco_de_dados/java.js"></script>
<body>
<span class="style1 style2"></span>
<table width="770" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="4" scope="col"><img src="../high_quality_photos/topo.jpg" width="770" height="80"></th>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#3367CD"><div align="center"><span class="style3">Clique sobre o &Aacute;lbum Desejado!! </span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="4"><div align="center">
      <p>&nbsp;</p>
      </div></td>
  </tr>
  <tr>
    <td width="193" align="center" valign="top"><table width="159" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFCC00" class="brd">
      <tr>
        <th width="159" align="center" valign="middle" scope="col"><p class="style1 style2"><a href="javascript:MM_openBrWindow('high_quality_photos/galerias_de_fotos/?Cod=<%=(Recordset1.Fields.Item("cod").Value)%>','Saquabb','','770','600','true')"><img src="high_quality_photos/fotos/<%=(Recordset1.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" class="brd"></a></p></th>
      </tr>
      <tr>
        <td><div align="center" class="style2"><strong><%=(Recordset1.Fields.Item("nome").Value)%></strong></div></td>
      </tr>
    </table>
    <div align="center"></div></td>
    <td width="193" align="center" valign="top"><% Recordset1.MoveNext() %>
      <table width="159" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFCC00" class="brd">
      <tr>
        <th width="159" align="center" valign="middle" class="style4" scope="col"><p class="style5"><a href="javascript:MM_openBrWindow('high_quality_photos/galerias_de_fotos/?Cod=<%=(Recordset1.Fields.Item("cod").Value)%>','Saquabb','','770','600','true')"><img src="high_quality_photos/fotos/<%=(Recordset1.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" #invalid_attr_id="1px solid #000000"></a></p></th>
      </tr>
      <tr>
        <td><div align="center" class="style2"><strong><%=(Recordset1.Fields.Item("nome").Value)%></strong></div></td>
      </tr>
    </table>
    <div align="center"></div></td>
    <td width="193" align="center" valign="top"><% Recordset1.MoveNext() %><table width="159" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFCC00" class="brd">
      <tr>
        <th width="159" align="center" valign="middle" scope="col"><p class="style1 style2"><a href="javascript:MM_openBrWindow('high_quality_photos/galerias_de_fotos/?Cod=<%=(Recordset1.Fields.Item("cod").Value)%>','Saquabb','','770','600','true')"><img src="high_quality_photos/fotos/<%=(Recordset1.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" class="brd"></a></p></th>
      </tr>
      <tr>
        <td><div align="center" class="style2"><strong><%=(Recordset1.Fields.Item("nome").Value)%></strong></div></td>
      </tr>
    </table>
    <div align="center"></div></td>
    <td width="210" align="center" valign="top"><% Recordset1.MoveNext() %><table width="159" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFCC00" class="brd">
      <tr>
        <th width="159" align="center" valign="middle" scope="col"><p class="style1 style2"><a href="javascript:MM_openBrWindow('high_quality_photos/galerias_de_fotos/?Cod=<%=(Recordset1.Fields.Item("cod").Value)%>','Saquabb','','770','600','true')"><img src="high_quality_photos/fotos/<%=(Recordset1.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" class="brd"></a></p></th>
      </tr>
      <tr>
        <td><div align="center" class="style2"><strong><%=(Recordset1.Fields.Item("nome").Value)%></strong></div></td>
      </tr>
    </table>
    <div align="center"></div></td>
  </tr>
</table>
<div align="center"></div>
<div align="center"></div>
</body>
</html>
<%
Recordset1.Close()
Set Recordset1 = Nothing
%>
