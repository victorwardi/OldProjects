<%@LANGUAGE="VBSCRIPT"%>
<!-- #include file="../ktml2/includes/ktedit/activex.asp"-->
<%
dim include: include=1
      dim useTemplates: useTemplates=1
      dim useIntrospection: useIntrospection=1
      dim KT_display
%>
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
<!--#include file="../Connections/con_kiuchi.asp" -->
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

If (CStr(Request("MM_update")) = "form1" And CStr(Request("MM_recordId")) <> "") Then

  MM_editConnection = MM_con_kiuchi_STRING
  MM_editTable = "noticia"
  MM_editColumn = "CodNoticia"
  MM_recordId = "" + Request.Form("MM_recordId") + ""
  MM_editRedirectUrl = "adminlink.asp"
  MM_fieldsStr  = "titulo2|value|materia|value|resumo|value|data2|value|autor2|value|autmail2|value"
  MM_columnsStr = "titulo|',none,''|materia|',none,''|resumo|',none,''|data|',none,''|autor|',none,''|autmail|',none,''"

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
Dim Rscasa__MMColParam
Rscasa__MMColParam = "1"
If (Request.QueryString("codnot") <> "") Then 
  Rscasa__MMColParam = Request.QueryString("codnot")
End If
%>
<%
Dim Rscasa
Dim Rscasa_numRows

Set Rscasa = Server.CreateObject("ADODB.Recordset")
Rscasa.ActiveConnection = MM_con_kiuchi_STRING
Rscasa.Source = "SELECT * FROM noticia WHERE codnoticia = " + Replace(Rscasa__MMColParam, "'", "''") + " ORDER BY codnoticia DESC"
Rscasa.CursorType = 0
Rscasa.CursorLocation = 2
Rscasa.LockType = 1
Rscasa.Open()

Rscasa_numRows = 0
%>
<HTML>
<HEAD>
<TITLE></TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.style1 {color: #000000}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="463" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
  <tr>
    <td width="459" height="25" bgcolor="#66CCCC"><div align="center"><span class="tur style1">:: Alterar Apartamento :: </span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
        <form ACTION="<%=MM_editAction%>" METHOD="POST" name="form1" target="_self" id=form>
          <div align="center">
            <center>
              <table width="459" border="0" cellpadding="5" cellspacing="0" class="tbl">
                <tr>
                  <td valign="top"><span class="desc"><font face="Verdana" size="2">C&oacute;digo:<br>
    (</font></span><font size="2" face="Verdana">noticia<span class="desc">-xxx)</span></font></td>
                  <td><span class="desc">
                    <input name="data2" type="text" id="data5" value="<%=(Rscasa.Fields.Item("data").Value)%>" size="13">
                  </span></td>
                </tr>
                <tr>
                  <td valign="top">Categoria:</td>
                  <td><input name="titulo2" type="text" id="titulo5" value="<%=(Rscasa.Fields.Item("titulo").Value)%>" size="50"></td>
                </tr>
                <tr>
                  <td valign="top">Detalhes:</td>
                  <td><input name="materia" type="hidden" id="materia" value="<%=(Server.HTMLEncode( Rscasa.Fields.Item("materia").Value  & ""))%>">
                    <%
   KT_display = "Cut,Copy,Paste,Toggle Vis/Invis,Toggle WYSIWYG,Bold,Italic,Underline,Align Left,Align Center,Align Right,Align Justify,Background Color,Foreground Color,Undo,Redo,Bullet List,Numbered List,Indent,Outdent,HR,Font Type,Font Size,Insert Link,Clean Word,Heading List"
   call showActivex("materia", 500, 150, false, KT_display, "../ktml2/", "../ktml2/includes/styles/KT_styles.css", "../../../ktml2/images/uploads/", "../../../ktml2/files/uploads/", "English (UK)", -1, "english", "yes", "no")
%></td>
                </tr>
                <tr>
                  <td valign="top">Descri&ccedil;&atilde;o:</td>
                  <td><textarea name="resumo" cols="45" rows="4" id="textarea10" style="border-style: solid; border-width: 2"><%=(Rscasa.Fields.Item("resumo").Value)%></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><input name="Submit" type="submit" id="submit5" value="Enviar"></td>
                </tr>
              </table>
              <br>
            </center>
          </div>
      
                    
          

          <input type="hidden" name="MM_update" value="form1">
          <input type="hidden" name="MM_recordId" value="<%= Rscasa.Fields.Item("CodNoticia").Value %>">
</form></td>
  </tr>
</table>
</BODY>
</HTML>
<%
Rscasa.Close()
Set Rscasa = Nothing
%>
