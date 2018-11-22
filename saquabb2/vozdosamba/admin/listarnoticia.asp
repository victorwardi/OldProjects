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
<!--#include file="../Connections/conSurf.asp" -->
<%
' *** Edit Operations: declare variables

Dim MM_editAction
Dim MM_abortEdit
Dim MM_editQuery
Dim MM_editCmd

Dim MM_editConnection
Dim MM_editTable
Dim MM_editRedirectUrl
Dim MM_editColumn
Dim MM_recordId

Dim MM_fieldsStr
Dim MM_columnsStr
Dim MM_fields
Dim MM_columns
Dim MM_typeArray
Dim MM_formVal
Dim MM_delim
Dim MM_altVal
Dim MM_emptyVal
Dim MM_i

MM_editAction = CStr(Request.ServerVariables("SCRIPT_NAME"))
If (Request.QueryString <> "") Then
  MM_editAction = MM_editAction & "?" & Server.HTMLEncode(Request.QueryString)
End If

' boolean to abort record edit
MM_abortEdit = false

' query string to execute
MM_editQuery = ""
%>
<%
' *** Delete Record: declare variables

if (CStr(Request("MM_delete")) = "form1" And CStr(Request("MM_recordId")) <> "") Then

  MM_editConnection = MM_conSurf_STRING
  MM_editTable = "noticias"
  MM_editColumn = "CodNoticia"
  MM_recordId = "" + Request.Form("MM_recordId") + ""
  MM_editRedirectUrl = "listarnoticia.asp"

  ' append the query string to the redirect URL
  If (MM_editRedirectUrl <> "" And Request.QueryString <> "") Then
    If (InStr(1, MM_editRedirectUrl, "?", vbTextCompare) = 0 And Request.QueryString <> "") Then
      MM_editRedirectUrl = MM_editRedirectUrl & "?" & Request.QueryString
    Else
      MM_editRedirectUrl = MM_editRedirectUrl & "&" & Request.QueryString
    End If
  End If
  
End If
%>
<%
' *** Delete Record: construct a sql delete statement and execute it

If (CStr(Request("MM_delete")) <> "" And CStr(Request("MM_recordId")) <> "") Then

  ' create the sql delete statement
  MM_editQuery = "delete from " & MM_editTable & " where " & MM_editColumn & " = " & MM_recordId

  If (Not MM_abortEdit) Then
    ' execute the delete
    Set MM_editCmd = Server.CreateObject("ADODB.Command")
    MM_editCmd.ActiveConnection = MM_editConnection
    MM_editCmd.CommandText = MM_editQuery
    MM_editCmd.Execute
    MM_editCmd.ActiveConnection.Close

    If (MM_editRedirectUrl <> "") Then
      Response.Redirect(MM_editRedirectUrl)
    End If
  End If

End If
%>
<%
Dim RsAltNoticia
Dim RsAltNoticia_numRows

Set RsAltNoticia = Server.CreateObject("ADODB.Recordset")
RsAltNoticia.ActiveConnection = MM_conSurf_STRING
RsAltNoticia.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
RsAltNoticia.CursorType = 0
RsAltNoticia.CursorLocation = 2
RsAltNoticia.LockType = 1
RsAltNoticia.Open()

RsAltNoticia_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = -1
Repeat1__index = 0
RsAltNoticia_numRows = RsAltNoticia_numRows + Repeat1__numRows
%>
<HTML>
<HEAD>
<TITLE>Voz do Samba</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="772" height="25" class="texto"><div align="center"><span class="tur">Administrativo Voz do Samba </span></div></td>
  </tr>
  <tr>
    <td height="25" class="texto"><div align="center"><span class="tur">Alterar Not&iacute;cia </span></div></td>
  </tr>
  <tr>
    <td align="center">
	<form name="form1" method="POST" action="<%=MM_editAction%>">
	  <br>
	  <table width="739" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl">
      
      <% 
While ((Repeat1__numRows <> 0) AND (NOT RsAltNoticia.EOF)) 
%>
      <tr>
        <td width="36" height="18" align="center" valign="middle"><input name="MM_recordId" type="radio" value="<%=(RsAltNoticia.Fields.Item("CodNoticia").Value)%>"></td>
          <td width="703"><a href="altnoticia.asp?CodNot=<%=(RsAltNoticia.Fields.Item("CodNoticia").Value)%>" class="texto"><%=(RsAltNoticia.Fields.Item("data").Value)%> - <%=(RsAltNoticia.Fields.Item("titulo").Value)%></a></td>
      </tr>
      <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsAltNoticia.MoveNext()
Wend
%>
    </table>
	  <br>
      <input type="submit" name="Submit" value="Apagar">
      <input type="hidden" name="MM_delete" value="form1">
      </form>
	</td>
  </tr>
</table>
</BODY>
</HTML>
<%
RsAltNoticia.Close()
Set RsAltNoticia = Nothing
%>
