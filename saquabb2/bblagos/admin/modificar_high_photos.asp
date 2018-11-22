<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="../Connections/conexao.asp" -->
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

if (CStr(Request("MM_delete")) = "Formulario" And CStr(Request("MM_recordId")) <> "") Then

  MM_editConnection = MM_conexao_STRING
  MM_editTable = "high_quality_photos"
  MM_editColumn = "Cod"
  MM_recordId = "" + Request.Form("MM_recordId") + ""
  MM_editRedirectUrl = "modificar_high_photos.asp"

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
Dim RsAlbuns
Dim RsAlbuns_numRows

Set RsAlbuns = Server.CreateObject("ADODB.Recordset")
RsAlbuns.ActiveConnection = MM_conexao_STRING
RsAlbuns.Source = "SELECT *  FROM high_quality_photos  ORDER BY cod DESC"
RsAlbuns.CursorType = 0
RsAlbuns.CursorLocation = 2
RsAlbuns.LockType = 1
RsAlbuns.Open()

RsAlbuns_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 20
Repeat1__index = 0
RsAlbuns_numRows = RsAlbuns_numRows + Repeat1__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
  <form ACTION="<%=MM_editAction%>" METHOD="POST" name="Formulario" id="Formulario">
        <br>
        <br>
        <table  border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="tdnot">
          <tr align="center" bgcolor="#FF9900">
            <td width="406" height="20" bgcolor="#0099FF" class="destaquepreto"><p align="center" class="style1">Galerias de Fotos -  Modificar/Remover</p></td>
          </tr>
          <tr align="center">
            <td height="20" class="destaquepreto">
              <div align="center"><br>
              </div>
              <table width="254" border="0" align="center" cellpadding="0" cellspacing="0" class="tdnot">
                <% 
While ((Repeat1__numRows <> 0) AND (NOT RsAlbuns.EOF)) 
%>
                <tr>
                  <td width="29" height="21" align="center">
                    <input name="MM_recordId" type="radio" value="<%=(RsAlbuns.Fields.Item("Cod").Value)%>"></td>
                  <td width="183"><a href="modificar_high_photos2.asp?Cod=<%=(RsAlbuns.Fields.Item("Cod").Value)%>"><%=(RsAlbuns.Fields.Item("nome").Value)%></a></td>
                </tr>
                <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsAlbuns.MoveNext()
Wend
%>
              </table>
              <div align="center"><br>
                  <input type="submit" name="Submit" value="Apagar">
                  <br>
              </div>
              <input type="hidden" name="MM_delete" value="Formulario"></td>
          </tr>
    </table>
        <br>
<br>
</form>
</body>
</html>
<%
RsAlbuns.Close()
Set RsAlbuns = Nothing
%>
