<%@LANGUAGE="VBSCRIPT"%>
<%
' *** Restrict Access To Page: Grant or deny access to this page
MM_authorizedUsers=""
MM_authFailedURL="default.asp"
MM_grantAccess=false
If Session("MM_Username") <> "" Then
  If (true Or CStr(Session("MM_UserAuthorization"))="") Or _
         (InStr(1,MM_authorizedUsers,Session("MM_UserAuthorization"))>=1) Then
    MM_grantAccess = true
  End If
End If
If Not MM_grantAccess Then
  MM_qsChar = "?"
  If (InStr(1,MM_authFailedURL,"?") >= 1) Then MM_qsChar = "&"
  MM_referrer = Request.ServerVariables("URL")
  if (Len(Request.QueryString()) > 0) Then MM_referrer = MM_referrer & "?" & Request.QueryString()
  MM_authFailedURL = MM_authFailedURL & MM_qsChar & "accessdenied=" & Server.URLEncode(MM_referrer)
  Response.Redirect(MM_authFailedURL)
End If
%>
<!--#include file="../../Connections/conexao.asp" -->
<%
Dim Rs_update
Dim Rs_update_numRows

Set Rs_update = Server.CreateObject("ADODB.Recordset")
Rs_update.ActiveConnection = MM_conexao_STRING
Rs_update.Source = "SELECT * FROM ranking_m ORDER BY colocacao ASC"
Rs_update.CursorType = 0
Rs_update.CursorLocation = 2
Rs_update.LockType = 1
Rs_update.Open()

Rs_update_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = -1
Repeat1__index = 0
Rs_update_numRows = Rs_update_numRows + Repeat1__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #0066FF;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.linha {
	border-bottom-style: solid;
	border-bottom-color: #000000;
	border-bottom-width: 1px;	
	
}
.style5 {font-size: 14px}
-->
</style></head>

<body>
<table width="524" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <th height="20" bgcolor="#0099FF" scope="col"><span class="style5">Ranking Mirim </span></th>
  </tr>
  <tr>
    <td align="center">    <table width="60%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="25" scope="col">&nbsp;</th>
        <th width="100" scope="col">Coloca&ccedil;&atilde;o</th>
        <th width="250" scope="col">Atleta</th>
        <th width="150" height="25" scope="col">Pontos</th>
      </tr>
      <tr>
        <td colspan="4">
          <% 
While ((Repeat1__numRows <> 0) AND (NOT Rs_update.EOF)) 
%>
          <table width="500" border="0" cellpadding="0" cellspacing="0" class="linha">
            <tr>
                <th width="25" scope="col"><a href="atualizar_ranking_m.asp?Cod=<%=(Rs_update.Fields.Item("Cod").Value)%>"><img src="bola.jpg" alt="Editar" width="10" height="10" border="0"></a></th>
                <th width="100" scope="col"><%=(Rs_update.Fields.Item("colocacao").Value)%></th>
                <th width="250" height="25" scope="col"><a href="atualizar_ranking_m.asp?Cod=<%=(Rs_update.Fields.Item("Cod").Value)%>"><%=(Rs_update.Fields.Item("nome").Value)%></a></th>
                <th width="150" height="20" scope="col"><%=(Rs_update.Fields.Item("pontos").Value)%></th>
            </tr>
                  </table>
          <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  Rs_update.MoveNext()
Wend
%></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>      
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<%
Rs_update.Close()
Set Rs_update = Nothing
%>
