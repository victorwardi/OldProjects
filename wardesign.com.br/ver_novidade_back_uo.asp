<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/conex.asp" -->
<%
Dim RsVerNot__MMColParam
RsVerNot__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  RsVerNot__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim RsVerNot
Dim RsVerNot_numRows

Set RsVerNot = Server.CreateObject("ADODB.Recordset")
RsVerNot.ActiveConnection = MM_conex_STRING
RsVerNot.Source = "SELECT * FROM noticias WHERE CodNoticia = " + Replace(RsVerNot__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
RsVerNot.CursorType = 0
RsVerNot.CursorLocation = 2
RsVerNot.LockType = 1
RsVerNot.Open()

RsVerNot_numRows = 0
%>
<%
Dim Fotos__MMColParam
Fotos__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  Fotos__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim Fotos
Dim Fotos_numRows

Set Fotos = Server.CreateObject("ADODB.Recordset")
Fotos.ActiveConnection = MM_conex_STRING
Fotos.Source = "SELECT * FROM fotos WHERE CodNoticia = " + Replace(Fotos__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
Fotos.CursorType = 0
Fotos.CursorLocation = 2
Fotos.LockType = 1
Fotos.Open()

Fotos_numRows = 0
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NEWS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #55A5E2;
	scrollbar-face-color:#D8D7D5;
	scrollbar-highlight-color:#D8D7D5;
	scrollbar-3dlight-color:#D8D7D5;
	scrollbar-darkshadow-color:#D8D7D5;
	scrollbar-shadow-color:#D8D7D5;
	scrollbar-arrow-color:#000000;
	scrollbar-track-color:#D8D7D5;
}
.fonte {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
.borda {	border: 1px solid #000000;}

body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #000000;
}
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
a:hover {
	color: #FF6600;
}
a:active {
	color: #FFFFFF;
}
.style6 {color: #FFFFFF}
.style16 {	font-size: 12;
	font-weight: bold;
	color: #000000;
}

.style17 {font-size: 14px}
.style19 {color: #000000}
.style23 {color: #333399; font-weight: bold; }
.style24 {
	font-size: 12px;
	color: #FF0000;
}
.style25 {
	color: #0000FF;
	font-style: italic;
}
</style>
</head>

<body>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="416" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15"><img src="figuras/retalhos/cantoesquerdo.gif" width="15" height="15"></td>
        <td width="384" height="15" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="15" height="15"><img src="figuras/retalhos/cantodireito.gif" width="15" height="15"></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#FFFFFF"><table width="407" height="66" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td height="10" colspan="2" align="center" class="tit"><div align="left">
                <p align="center" class="style16">&nbsp;<span class="style17">:: <%=(RsVerNot.Fields.Item("titulo").Value)%>::</span></p>
                </div></td>
            </tr>
            <tr>
              <td height="11" colspan="2" align="center" class="style23 style24"><%=(RsVerNot.Fields.Item("resumo").Value)%></td>
            </tr>
            <tr>
              <td width="114" height="25" bgcolor="#FFFFFF"><span class="style19">Data: <strong><%=(RsVerNot.Fields.Item("data").Value)%></strong></span></td>
              <% if (RsVerNot.Fields.Item("autmail").Value) <> ""then %>
              <td width="184" align="right" bgcolor="#FFFFFF"><div align="center" class="style19">
                <div align="right"><span class="mar">Por: </span><a href="mailto:<%=(RsVerNot.Fields.Item("autmail").Value)%>" class="style25"><%=(RsVerNot.Fields.Item("autor").Value)%> </a></div>
              </div></td>
              <% else %>
              <td width="89" align="right" bgcolor="#FFFFFF"><div align="center" class="style19">
                <div align="right">Por: <span class="style25"><%=(RsVerNot.Fields.Item("autor").Value)%></span></div>
              </div></td>
              <% end if %>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#FFFFFF" >
                <div align="justify">
                  <% if  (Not Fotos.eof) then %>
                </div>
                <table width="200" border="5" align="right" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#F4F4F4">
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF">
                      <% while (Not Fotos.eof) %>
                      <img src="images/spacer.gif" width="1" height="4" >
                      <table width="130" border="1" cellpadding="0" cellspacing="0" bordercolor="#55A5E2" bgcolor="#55A5E2">
                        <tr>
                          <td width="192" height="58" valign="top"><div align="center"><a href="javascript:openPictureWindow_Fever('fotos/<%=(Fotos.Fields.Item("arquivo").Value)%>','<%=(Fotos.Fields.Item("largura").Value)%>','<%=(Fotos.Fields.Item("altura").Value)%>','Foto - AT!TUDE','10','10')"><img src="fotos/foto_<%=(Fotos.Fields.Item("arquivo").Value)%>" width="120" height="90" border="0" align="absmiddle" class="borda"></a><span class="style6"><br>
                                    <%=(Fotos.Fields.Item("descricao").Value)%>
                                    <% If (Fotos.Fields.Item("fotografo").Value) <> "" then response.Write(" - Foto: ") End If%>
                                    <%=(Fotos.Fields.Item("fotografo").Value)%> </span></div></td>
                        </tr>
                      </table>
                      <% Fotos.MoveNext() 
Wend %></td>
                  </tr>
                </table>
                <% end if  %>
                <% response.write replace((RsVerNot.Fields.Item("materia").Value), vbcrlf,"<br>")%></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="figuras/retalhos/cantodireitoesquerdo.gif" width="15" height="15"></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td><img src="figuras/retalhos/cantodireitobaixo.gif" width="15" height="15"></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
</body>
</html>
<%
RsVerNot.Close()
Set RsVerNot = Nothing
%>
<%
Fotos.Close()
Set Fotos = Nothing
%>
