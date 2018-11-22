<%@LANGUAGE="VBSCRIPT"%>
<%
' *** Logout the current user.
MM_Logout = CStr(Request.ServerVariables("URL")) & "?MM_Logoutnow=1"
If (CStr(Request("MM_Logoutnow")) = "1") Then
  Session.Contents.Remove("MM_Username")
  Session.Contents.Remove("MM_UserAuthorization")
  MM_logoutRedirectPage = "../default.asp"
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
<TITLE>Goth Box Party</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #000000;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<base target="principal">
</head>
<body>
<table height="63" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl">
      <tr>
        <td height="21" class="texto"><img src="../botao/botaoadm/noticia_sup.jpg" width="94" height="18"></td>
        <td class="tur"><img src="../botao/botaoadm/fotos_sup.jpg" width="94" height="18"></td>
        <td class="tur">&nbsp;<img src="../botao/botaoadm/flyer.jpg" width="94" height="18"></td>
        <td class="tur"><img src="../botao/botaoadm/galerias_sup.jpg" width="94" height="18"></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
              <td width="100%"><a href="adnoticia.asp"><img src="../botao/botaoadm/addnoticia.jpg" width="137" height="18" border="0"></a></td>
            </tr>
            <tr>
              <td><a href="listarnoticia.asp"><img src="../botao/botaoadm/modnoticia.jpg" width="137" height="18" border="0"></a></td>
            </tr>
        </table></td>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
              <td width="100%"><a href="adfoto.asp"><img src="../botao/botaoadm/addfoto.jpg" width="137" height="18" border="0"></a></td>
            </tr>
            <tr>
              <td><a href="listarfotos.asp"><img src="../botao/botaoadm/modfoto.jpg" width="137" height="18" border="0"></a></td>
            </tr>
        </table></td>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
              <td><a href="admar.asp"><img src="../botao/botaoadm/atflyer.jpg" width="137" height="18" border="0"></a></td>
            </tr>
            <tr>
              <td width="100%"><p class="texto"><a href="../default.asp" target="_parent"><img src="../botao/botaoadm/sair.jpg" width="79" height="18" border="0"></a></p></td>
            </tr>
        </table></td>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
              <td width="100%"><a href="adgaleria.asp"><img src="../botao/botaoadm/addgaleria.jpg" width="137" height="18" border="0"></a></td>
            </tr>
            <tr>
              <td><a href="adfotogaleria.asp"><img src="../botao/botaoadm/addfotogaleria.jpg" width="213" height="18" border="0"></a></td>
            </tr>
        </table></td>
      </tr>
    </table>
</BODY>
</HTML>