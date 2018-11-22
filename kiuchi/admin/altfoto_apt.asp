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
<!--#include file="../Connections/conex2.asp" -->
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

  MM_editConnection = MM_conex2_STRING
  MM_editTable = "apt_foto"
  MM_editColumn = "CodFoto"
  MM_recordId = "" + Request.Form("MM_recordId") + ""
  MM_editRedirectUrl = "listarfotos_apt.asp"
  MM_fieldsStr  = "descricao|value|fotografo|value|altura|value|largura|value|galeria|value|noticia|value"
  MM_columnsStr = "descricao|',none,''|fotografo|',none,''|altura|',none,''|largura|',none,''|CodGaleria|none,none,NULL|CodNoticia|none,none,NULL"

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
Dim RsFoto__MMColParam
RsFoto__MMColParam = "1"
If (Request.QueryString("CodFoto") <> "") Then 
  RsFoto__MMColParam = Request.QueryString("CodFoto")
End If
%>
<%
Dim RsFoto
Dim RsFoto_numRows

Set RsFoto = Server.CreateObject("ADODB.Recordset")
RsFoto.ActiveConnection = MM_conex2_STRING
RsFoto.Source = "SELECT *  FROM apt_foto  WHERE CodFoto = " + Replace(RsFoto__MMColParam, "'", "''") + ""
RsFoto.CursorType = 0
RsFoto.CursorLocation = 2
RsFoto.LockType = 1
RsFoto.Open()

RsFoto_numRows = 0
%>
<%
Dim RsGalerias
Dim RsGalerias_numRows

Set RsGalerias = Server.CreateObject("ADODB.Recordset")
RsGalerias.ActiveConnection = MM_conex2_STRING
RsGalerias.Source = "SELECT * FROM Galerias ORDER BY Cod ASC"
RsGalerias.CursorType = 0
RsGalerias.CursorLocation = 2
RsGalerias.LockType = 1
RsGalerias.Open()

RsGalerias_numRows = 0
%>
<%
Dim RsNoticias
Dim RsNoticias_numRows

Set RsNoticias = Server.CreateObject("ADODB.Recordset")
RsNoticias.ActiveConnection = MM_conex2_STRING
RsNoticias.Source = "SELECT CodNoticia, data  FROM apt ORDER BY CodNoticia DESC"
RsNoticias.CursorType = 0
RsNoticias.CursorLocation = 2
RsNoticias.LockType = 1
RsNoticias.Open()

RsNoticias_numRows = 2
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 20
Repeat1__index = 0
RsGalerias_numRows = RsGalerias_numRows + Repeat1__numRows
%>
<%
Dim Repeat2__numRows
Dim Repeat2__index

Repeat2__numRows = -1
Repeat2__index = 0
RsNoticias_numRows = RsNoticias_numRows + Repeat2__numRows
%>
<HTML>
<HEAD>
<TITLE>kiuchiimobiliaria</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="461" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
  <tr>
    <td width="809" height="25" bgcolor="#66CCCC"><div align="center"><span class="tur">Alterar Foto </span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
        <form ACTION="<%=MM_editAction%>" METHOD="POST" name="form1" target="_self" id=form>
          <div align="center">
            <center>
              <table width="459" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <td valign="top">&nbsp;</td>
                  <td><img src="../fotos/apt/<%=(RsFoto.Fields.Item("arquivo").Value)%>" alt=""></td>
                </tr>
                <tr>
                  <td valign="top">Descri&ccedil;&atilde;o:</td>
                  <td><textarea name="descricao" cols="45" rows="3" id="textarea9" style="border-style: solid; border-width: 2"><%=(RsFoto.Fields.Item("descricao").Value)%></textarea>
                  </td>
                </tr>
                <tr>
                  <td valign="top">Fot&oacute;grafo:</td>
                  <td><input name="fotografo" type="text" id="fotografo" value="<%=(RsFoto.Fields.Item("fotografo").Value)%>" size="50"></td>
                </tr>
                <tr>
                  <td valign="top"><font face="Verdana" size="2">Altura<span class="desc">:</span></font></td>
                  <td><span class="desc">
                    <input name="altura" type="text" id="autor5" value="<%=(RsFoto.Fields.Item("altura").Value)%>" size="20">
                  </span></td>
                </tr>
                <tr>
                  <td valign="top"><font face="Verdana" size="2">Largura:</font></td>
                  <td><input name="largura" type="text" id="autmail5" value="<%=(RsFoto.Fields.Item("largura").Value)%>" size="20"></td>
                </tr>
                <tr>
                  <td>Imovel:</td>
                  <td>
                    <select name="noticia" id="noticia">
                    <option value="" selected>Selecione um imovel</option>
<% While ((Repeat2__numRows <> 0) AND (NOT RsNoticias.EOF)) %>
					<option value="<%=(RsNoticias.Fields.Item("CodNoticia").Value)%>" selected<% If (RsNoticias.Fields.Item("CodNoticia").Value)=(RsFoto.Fields.Item("CodNoticia").Value) Then %> selected<% End If %>><%=(RsNoticias.Fields.Item("data").Value)%></option>
                    <% Repeat2__index=Repeat2__index+1
  Repeat2__numRows=Repeat2__numRows-1
  RsNoticias.MoveNext()
  Wend %>                    
				    </select>  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit" id="submit5" value="Enviar"></td>
                </tr>
              </table>
              <br>
            </center>
          </div>
      
                    
          

          
          <input type="hidden" name="MM_recordId" value="<%= RsFoto.Fields.Item("CodFoto").Value %>">
          <input type="hidden" name="MM_update" value="form1">
        </form></td>
  </tr>
</table>
</BODY>
</HTML>
<%
RsFoto.Close()
Set RsFoto = Nothing
%>
<%
RsGalerias.Close()
Set RsGalerias = Nothing
%>
<%
RsNoticias.Close()
Set RsNoticias = Nothing
%>
