<%@LANGUAGE="VBSCRIPT"%>
<%
' *** Logout the current user.
MM_Logout = CStr(Request.ServerVariables("URL")) & "?MM_Logoutnow=1"
If (CStr(Request("MM_Logoutnow")) = "1") Then
  Session.Contents.Remove("MM_Username")
  Session.Contents.Remove("MM_UserAuthorization")
  MM_logoutRedirectPage = "../default2.asp"
  ' redirect with URL parameters (remove the "MM_Logoutnow" query param).
  if (MM_logoutRedirectPage = "") Then MM_logoutRedirectPage = CStr(Request.ServerVariables("URL"))
  If (InStr(1, UC_redirectPage, "?", vbTextCompare) = 0 And Request.QueryString <> "") Then
    MM_newQS = "?"
    For Each Item In Request.QueryString
      If (Item <> "MM_Logoutnow") Then
        If (Len(MM_newQS) > 1) Then MM_newQS = MM_newQS & "&"
        MM_newQS = MM_newQS & Item & "=" & Server.URLencode(Request.QueryString(Item))
      End If
    Next
    if (Len(MM_newQS) > 1) Then MM_logoutRedirectPage = MM_logoutRedirectPage & MM_newQS
  End If
  Response.Redirect(MM_logoutRedirectPage)
End If
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
<HTML>
<HEAD>
<TITLE>SAQUABB ADMIN</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
    <img src="../images/spacer.gif" width="1" height="5">
    <table width="464" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
      <tr>
        <td width="761" height="25" bgcolor="#FFFFFF"><div align="center"><span class="tur">Administrativo SaquaSurf</span></div></td>
      </tr>
      <tr>
        <td height="239" class="tbl"><div align="center">
          <p><strong>Parab&eacute;ns!!<br>
          Opera&ccedil;&atilde;o Realizada com Sucesso! </strong><br>
            </p>
          </div></td></tr>
      <tr>
        <td height="239" class="tbl"><div align="center">
            <p><strong>Parab&eacute;ns!!<br>
        Opera&ccedil;&atilde;o Realizada com Sucesso! </strong><br>
            </p>
        </div></td>
      </tr>
      <tr>
        <td height="239" class="tbl"><div align="center">
            <p><strong>Parab&eacute;ns!!<br>
        Opera&ccedil;&atilde;o Realizada com Sucesso! </strong><br>
            </p>
        </div></td>
      </tr>
      <tr>
        <td height="239" class="tbl"><div align="center">
            <p><strong>Parab&eacute;ns!!<br>
        Opera&ccedil;&atilde;o Realizada com Sucesso! </strong><br>
            </p>
        </div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
</table>
</BODY>
</HTML>