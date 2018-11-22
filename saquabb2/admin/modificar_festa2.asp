<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
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
' *** Update Record: set variables

If (CStr(Request("MM_update")) = "Formulario" And CStr(Request("MM_recordId")) <> "") Then

  MM_editConnection = MM_conSurf_STRING
  MM_editTable = "Albuns"
  MM_editColumn = "Cod"
  MM_recordId = "" + Request.Form("MM_recordId") + ""
  MM_editRedirectUrl = "modificar_festa.asp"
  MM_fieldsStr  = "nome|value|data|value|fotografo|value|pasta|value|tipo|value"
  MM_columnsStr = "nome|',none,''|data|',none,''|fotografo|',none,''|pasta|',none,''|tipo|',none,''"

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
' *** Update Record: construct a sql update statement and execute it

If (CStr(Request("MM_update")) <> "" And CStr(Request("MM_recordId")) <> "") Then

  ' create the sql update statement
  MM_editQuery = "update " & MM_editTable & " set "
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
      MM_editQuery = MM_editQuery & ","
    End If
    MM_editQuery = MM_editQuery & MM_columns(MM_i) & " = " & MM_formVal
  Next
  MM_editQuery = MM_editQuery & " where " & MM_editColumn & " = " & MM_recordId

  If (Not MM_abortEdit) Then
    ' execute the update
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
RsAlbuns.ActiveConnection = MM_conSurf_STRING
RsAlbuns.Source = "SELECT * FROM Albuns ORDER BY cod DESC"
RsAlbuns.CursorType = 0
RsAlbuns.CursorLocation = 2
RsAlbuns.LockType = 1
RsAlbuns.Open()

RsAlbuns_numRows = 0
%>
<%
Dim RsTiposEvento
Dim RsTiposEvento_numRows

Set RsTiposEvento = Server.CreateObject("ADODB.Recordset")
RsTiposEvento.ActiveConnection = MM_conSurf_STRING
RsTiposEvento.Source = "SELECT * FROM Albuns_tipo ORDER BY Tipo ASC"
RsTiposEvento.CursorType = 0
RsTiposEvento.CursorLocation = 2
RsTiposEvento.LockType = 1
RsTiposEvento.Open()

RsTiposEvento_numRows = 0
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
 <form ACTION="<%=MM_editAction%>" METHOD="POST" name="Formulario" id="Formulario">
        <br>
        <table  border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="tdnot">
          <tr align="center" bgcolor="#FFFFFF">
            <td width="406" height="20" colspan="2" class="destaquepreto"><div align="left"><span class="style1"> ..:: Modificar Festa </span></div></td>
          </tr>
          <tr>
            <td>Foto de Capa: </td>
            <td><img src="/festa/fotos/<%=(RsAlbuns.Fields.Item("thumb").Value)%>"></td>
          </tr>
          <tr>
            <td>T&iacute;tulo:</td>
            <td><input name="nome" type="text" class="input" id="nome" value="<%=(RsAlbuns.Fields.Item("nome").Value)%>" size="30"></td>
          </tr>
          <tr>
            <td>Data:</td>
            <td><input name="data" type="text" class="input" id="data" value="<%=(RsAlbuns.Fields.Item("data").Value)%>" size="15"></td>
          </tr>
          <tr>
            <td>Fot&oacute;grafo:</td>
            <td><input name="fotografo" type="text" class="input" id="fotografo" value="<%=(RsAlbuns.Fields.Item("fotografo").Value)%>" size="20"></td>
          </tr>
          <tr>
            <td>Pasta (Nome da pasta que jogou no FTP):</td>
            <td><input name="pasta" type="text" class="input" id="pasta" value="<%=(RsAlbuns.Fields.Item("pasta").Value)%>" size="20"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="Submit" type="submit" value="Enviar"></td>
          </tr>
        </table>
      <br>
      <input type="hidden" name="MM_update" value="Formulario">
      <input type="hidden" name="MM_recordId" value="<%= RsAlbuns.Fields.Item("cod").Value %>">
</form>
</body>
</html>
<%
RsAlbuns.Close()
Set RsAlbuns = Nothing
%>
