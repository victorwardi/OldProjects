<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/conSurf.asp" -->
<%
' *** Validate request to log in to this site.
MM_LoginAction = Request.ServerVariables("URL")
If Request.QueryString<>"" Then MM_LoginAction = MM_LoginAction + "?" + Server.HTMLEncode(Request.QueryString)
MM_valUsername=CStr(Request.Form("txtlogin2"))
If MM_valUsername <> "" Then
  MM_fldUserAuthorization=""
  MM_redirectLoginSuccess="home.asp"
  MM_redirectLoginFailed="default.asp"
  MM_flag="ADODB.Recordset"
  set MM_rsUser = Server.CreateObject(MM_flag)
  MM_rsUser.ActiveConnection = MM_conSurf_STRING
  MM_rsUser.Source = "SELECT login, senha"
  If MM_fldUserAuthorization <> "" Then MM_rsUser.Source = MM_rsUser.Source & "," & MM_fldUserAuthorization
  MM_rsUser.Source = MM_rsUser.Source & " FROM usuarios WHERE login='" & Replace(MM_valUsername,"'","''") &"' AND senha='" & Replace(Request.Form("txtsenha2"),"'","''") & "'"
  MM_rsUser.CursorType = 0
  MM_rsUser.CursorLocation = 2
  MM_rsUser.LockType = 3
  MM_rsUser.Open
  If Not MM_rsUser.EOF Or Not MM_rsUser.BOF Then 
    ' username and password match - this is a valid user
    Session("MM_Username") = MM_valUsername
    If (MM_fldUserAuthorization <> "") Then
      Session("MM_UserAuthorization") = CStr(MM_rsUser.Fields.Item(MM_fldUserAuthorization).Value)
    Else
      Session("MM_UserAuthorization") = ""
    End If
    if CStr(Request.QueryString("accessdenied")) <> "" And false Then
      MM_redirectLoginSuccess = Request.QueryString("accessdenied")
    End If
    MM_rsUser.Close
    Response.Redirect(MM_redirectLoginSuccess)
  End If
  MM_rsUser.Close
  Response.Redirect(MM_redirectLoginFailed)
End If
%>
<HTML>
<HEAD>
<TITLE>Goth Box Party</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style>
<link href="../xtra/formulario.css" rel="stylesheet" type="text/css">
</head>
<img src="../images/spacer.gif" width="1" height="5"><table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="772" height="25"><div align="center"><span class="texto">Administrativo Goth Box Party</span></div></td>
  </tr>
  <tr>
    <td height="182"><form action="<%=MM_LoginAction%>" method="POST" name="login" id="login">
      <table width="263" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="263" border="0" align="center" cellpadding="5" cellspacing="0">
            <!--DWLayoutTable-->
            <tr>
              <td height="27" colspan="2">&nbsp;<span class="texto">Login</span></td>
            </tr>
            <tr>
              <td height="32" colspan="2"> <span class="texto">Entre com seu login e senha.</span></td>
            </tr>
            <tr>
              <td width="109" height="18"><span class="texto">Login:</span> </td>
              <td width="174" valign="top"><input name = "txtlogin2" type = "text" class="form1"></td>
            </tr>
            <tr>
              <td height="18"><span class="texto">Senha:</span></td>
              <td><input name = "txtsenha2" type = "password" class="form1"></td>
            </tr>
            <tr>
              <td height="18"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td><input name="submit2" type = "submit" class="form1" value = "Enviar"></td>
            </tr>
            <tr>
              <td height="29" colspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </form></td>
  </tr>
</table>
</BODY>
</HTML>