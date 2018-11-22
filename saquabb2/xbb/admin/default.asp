<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/con_kiuchi.asp" -->
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
  MM_rsUser.ActiveConnection = MM_con_kiuchi_STRING
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
<TITLE>Administra&ccedil;&atilde;o Kiuchi Imobiliaria!</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #6699CC;
	background-image: url();
}
.style6 {color: #FFFFFF}
.style7 {color: #000000}
.style9 {
	font-size: 36px;
	color: #FFFFFF;
}
.style10 {font-size: 36px}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5"><table width="464" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000099">
  <tr>
    <td width="791" height="182" bgcolor="#6699CC"><form action="<%=MM_LoginAction%>" method="POST" name="login" id="login">
      <table width="400" height="300" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" valign="middle"><span class="menulk style9"><span class="menulk  style10">Administrativo XPRESSBB </span></span>            <table width="263" border="0" align="center" cellpadding="0" cellspacing="0">
            <!--DWLayoutTable-->
            <tr>
              <td width="109" height="18"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr>
              <td height="18" class="desc style7"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td colspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr>
              <td height="18"><span class="desc style7"><strong>Login:</strong></span> </td>
              <td colspan="2" valign="top"><input name = "txtlogin2" type = "text"></td>
            </tr>
            <tr>
              <td height="18" class="desc style7"><strong>Senha:</strong></td>
              <td colspan="2"><input name = "txtsenha2" type = "password"></td>
            </tr>
            <tr>
              <td height="32"> <span class="desc style7"></span></td>
              <td width="174" height="32"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td width="174"><input name="submit2" type = "submit" value = "Enviar"></td>
            </tr>
            <tr>
              <td height="18" class="style6"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td colspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="style6"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<br>

</BODY>
</HTML>