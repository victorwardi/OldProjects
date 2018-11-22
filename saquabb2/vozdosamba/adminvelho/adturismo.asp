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
' *** Insert Record: set variables

If (CStr(Request("MM_insert")) = "form1") Then

  MM_editConnection = MM_conSurf_STRING
  MM_editTable = "Turismo"
  MM_editRedirectUrl = "adminlink.asp"
  MM_fieldsStr  = "tipo|value|nome|value|telefone|value|endereco|value|email|value|site|value|comentarios|value"
  MM_columnsStr = "tipo|',none,''|nome|',none,''|telefone|',none,''|endereco|',none,''|email|',none,''|site|',none,''|comentarios|',none,''"

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
<HTML>
<HEAD>
<TITLE>SaquaSurf</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="776" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000099">
  <tr>
    <td width="772" height="25" bgcolor="#000000"><div align="center"><span class="tur">Administrativo SaquaSurf</span></div></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#000000"><div align="center"><span class="tur">Adicionar Turismo</span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form name="form1" action="<%=MM_editAction%>" method="POST" target="_self" id=form><div align="center"><center>
        <table width="443" border="0" cellpadding="5" cellspacing="0" class="tbl">
              <tr>
                <td width="96" valign="top">Tipo:</td>
                <td width="327"><select name="tipo" class="caixa" id="tipo">
                  <option value="pousada">Pousada</option>
                  <option value="hotel">Hotel</option>
                  <option value="surfshop">Surf-Shop</option>
                  <option value="restaurante">Restaurante</option>
                  <option value="cyber">Cyber</option>
                </select></td>
              </tr>
              <tr>
                <td valign="top">Nome:</td>
                <td><input name="nome" type="text" class="caixa" id="titulo5" size="50"></td>
              </tr>
              <tr>
                <td valign="top"><span class="desc"><font face="Verdana" size="2">Telefone:</font></span></td>
                <td><span class="desc">
                  <input name="telefone" type="text" class="caixa" id="data5" size="50">
            </span></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">Endere&ccedil;o</font><span class="desc"><font face="Verdana" size="2">:</font></span></td>
                <td><span class="desc">
                  <input name="endereco" type="text" class="caixa" id="autor5" size="50">
                </span></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">E-mail:</font></td>
                <td><input name="email" type="text" class="caixa" id="autmail5" size="50"></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">Site:</font></td>
                <td><input name="site" type="text" class="caixa" id="autmail5" size="50"></td>
              </tr>
              <tr>
                <td valign="top">Coment&aacute;rios:</td>
                <td><textarea name="comentarios" cols="45" rows="8" class="caixa" id="textarea9" style="border-style: solid; border-width: 2">
</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="Submit" type="submit" class="botaoOff" id="submit5" value="Enviar"></td>
              </tr>
            </table>
          </center>
        </div>
      
                <input type="hidden" name="MM_insert" value="form1">
      </form>      
    </td>
  </tr>
</table>
</BODY>
</HTML>
