<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
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
%>
<!--#include file="config_caminho.asp" -->

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
' *** Insert Record: set variables

If (CStr(Request("MM_insert")) = "form2") Then

  MM_editConnection = MM_conexao_STRING
  MM_editTable = "ranking"
  MM_editRedirectUrl = "ranking.asp"
  MM_fieldsStr  = "nome|value|colocacao|value|pontos|value"
  MM_columnsStr = "nome|',none,''|colocacao|',none,''|pontos|',none,''"

  ' create the MM_fields and MM_columns arrays
  MM_fields = Split(MM_fieldsStr, "|")
  MM_columns = Split(MM_columnsStr, "|")
  
  ' set the form values
  For MM_i = LBound(MM_fields) To UBound(MM_fields) Step 2
    MM_fields(MM_i+1) = CStr(Request.Form(MM_fields(MM_i)))
  Next

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
' *** Insert Record: construct a sql insert statement and execute it

Dim MM_tableValues
Dim MM_dbValues

If (CStr(Request("MM_insert")) <> "") Then

  ' create the sql insert statement
  MM_tableValues = ""
  MM_dbValues = ""
  For MM_i = LBound(MM_fields) To UBound(MM_fields) Step 2
    MM_formVal = MM_fields(MM_i+1)
    MM_typeArray = Split(MM_columns(MM_i+1),",")
    MM_delim = MM_typeArray(0)
    If (MM_delim = "none") Then MM_delim = ""
    MM_altVal = MM_typeArray(1)
    If (MM_altVal = "none") Then MM_altVal = ""
    MM_emptyVal = MM_typeArray(2)
    If (MM_emptyVal = "none") Then MM_emptyVal = ""
    If (MM_formVal = "") Then
      MM_formVal = MM_emptyVal
    Else
      If (MM_altVal <> "") Then
        MM_formVal = MM_altVal
      ElseIf (MM_delim = "'") Then  ' escape quotes
        MM_formVal = "'" & Replace(MM_formVal,"'","''") & "'"
      Else
        MM_formVal = MM_delim + MM_formVal + MM_delim
      End If
    End If
    If (MM_i <> LBound(MM_fields)) Then
      MM_tableValues = MM_tableValues & ","
      MM_dbValues = MM_dbValues & ","
    End If
    MM_tableValues = MM_tableValues & MM_columns(MM_i)
    MM_dbValues = MM_dbValues & MM_formVal
  Next
  MM_editQuery = "insert into " & MM_editTable & " (" & MM_tableValues & ") values (" & MM_dbValues & ")"

  If (Not MM_abortEdit) Then
    ' execute the insert
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
}
.style3 {color: #000000}
-->
</style></head>

<body>
<div align="left"></div>
<div align="left">
  <form method="post" action="<%=MM_editAction%>" name="form2">
    <table width="524" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr align="center" valign="middle" bgcolor="#0099FF">
        <td width="524" nowrap bgcolor="#FFFFFF"><table width="524"  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <th width="520" height="25" bgcolor="#0099FF" scope="col"><span class="style3">Ranking</span></th>
          </tr>
          <tr>
            <th height="20" bgcolor="#FFFFFF" scope="col"><table width="98%" height="139"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" valign="middle" nowrap bordercolor="#000000">Nome:</td>
                <td align="left" valign="middle" bordercolor="#000000">
                  <input type="text" name="nome" value="" size="32">                </td>
                <th scope="col">&nbsp;</th>
              </tr>
              <tr>
                <td align="center" valign="middle" nowrap bordercolor="#000000">Colocac&atilde;o:</td>
                <td align="left" valign="middle" bordercolor="#000000">
                  <input type="text" name="colocacao" value="" size="32">                </td>
                <th scope="col">&nbsp;</th>
              </tr>
              <tr>
                <td align="center" valign="middle" nowrap bordercolor="#000000">Pontos:</td>
                <td align="left" valign="middle" bordercolor="#000000">
                  <input type="text" name="pontos" value="" size="32">                </td>
                <th scope="col">&nbsp;</th>
              </tr>
              <tr>
                <td align="right" valign="baseline" nowrap bordercolor="#000000">&nbsp;</td>
                <td valign="baseline" bordercolor="#000000">
                  <input name="submit" type="submit" value="Inserir">
                </td>
                <th scope="col">&nbsp;</th>
              </tr>
            </table></th>
          </tr>
        </table></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2">
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>
