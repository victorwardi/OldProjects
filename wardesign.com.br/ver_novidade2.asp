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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
	background-color: #55A5E2;
}
.fonte {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
.borda {	border: 1px solid #000000;}
.style15 { color: #CCCCCC}

body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #FF6600;
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
.style2 {	font-size: 14px;
	font-weight: bold;
}
.style16 {	font-size: 12;
	font-weight: bold;
	color: #000000;
}
</style>
</head>

<body>
<table width="381" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="3" scope="col">&nbsp;</th>
    <th width="378" scope="col"><table width="378" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <th width="436" align="left" valign="middle" scope="col"><p>&nbsp;</p></th>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th align="left" valign="middle" bgcolor="#55A5E2" scope="col"><table width="378" cellspacing="0" cellpadding="0">
            <tr>
              <td width="16"><img src="figuras/retalhos/cantoesquerdo.gif" width="15" height="15"></td>
              <td width="343" height="15" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="17" height="15"><img src="figuras/retalhos/cantodireito.gif" width="15" height="15"></td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF"><table width="356" height="66" border="0" align="center" cellpadding="2" cellspacing="2">
                  <tr>
                    <td height="23" colspan="2" align="center" class="tit"><div align="left"><span class="style16">&nbsp;<%=(RsVerNot.Fields.Item("titulo").Value)%></span></div></td>
                  </tr>
                  <tr>
                    <td width="98" height="25" bgcolor="#FFFFFF">Data: <strong><%=(RsVerNot.Fields.Item("data").Value)%></strong></td>
                    <% if (RsVerNot.Fields.Item("autmail").Value) <> ""then %>
                    <td width="135" bgcolor="#FFFFFF"><div align="center"><span class="mar">Por </span><a href="mailto:<%=(RsVerNot.Fields.Item("autmail").Value)%>" class="autor"><strong><%=(RsVerNot.Fields.Item("autor").Value)%> </strong></a></div></td>
                    <% else %>
                    <td width="103" bgcolor="#FFFFFF"><div align="center">Por <strong><%=(RsVerNot.Fields.Item("autor").Value)%></strong></div></td>
                    <% end if %>
                  </tr>
                  <tr>
                    <td colspan="2" bgcolor="#FFFFFF" >
                      <% if  (Not Fotos.eof) then %>
                      <table width="200" border="5" align="right" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#F4F4F4">
                        <tr>
                          <td valign="top" bgcolor="#FFFFFF">
                            <% while (Not Fotos.eof) %>
                            <img src="images/spacer.gif" width="1" height="4" >
                            <table width="192" height="162" border="1" cellpadding="0" cellspacing="0" bordercolor="#55A5E2" bgcolor="#55A5E2" class="borda">
                              <tr>
                                <td width="192" height="58" valign="top"><a href="javascript:openPictureWindow_Fever('fotos/<%=(Fotos.Fields.Item("arquivo").Value)%>','<%=(Fotos.Fields.Item("largura").Value)%>','<%=(Fotos.Fields.Item("altura").Value)%>','Foto - AT!TUDE','10','10')"><img src="fotos/192x144_<%=(Fotos.Fields.Item("arquivo").Value)%>" width="192" height="144" border="0" align="absmiddle"></a><span class="style6"><br>
                                      <%=(Fotos.Fields.Item("descricao").Value)%>
                                      <% If (Fotos.Fields.Item("fotografo").Value) <> "" then response.Write(" - Foto: ") End If%>
                                  <%=(Fotos.Fields.Item("fotografo").Value)%> </span></td>
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
        <th align="left" valign="middle" scope="col">&nbsp;</th>
      </tr>
    </table></th>
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
