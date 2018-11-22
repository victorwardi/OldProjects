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
<TITLE>Voz do Samba</TITLE>
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
    <table width="775" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000099">
      <tr>
        <td height="25" bgcolor="#000066"><div align="center"><span class="tur">Administrativo Voz do Samba</span></div></td>
      </tr>
      <tr>
        <td height="239"><table width="577" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#ABD7F8" class="tbl">
          <tr>
            <td height="21" bgcolor="#0000CC" class="tur">&nbsp;Not&iacute;cias</td>
            <td bgcolor="#0000CC" class="tur">&nbsp;Mar e V&iacute;deo </td>
            <td bgcolor="#0000CC" class="tur">&nbsp;Galerias</td>
          </tr>
          <tr>
            <td><table width="180" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td width="100%"><a href="adnoticia.asp" class="nometur">Adicionar Not&iacute;cia </a></td>
              </tr>
              <tr>
                <td><a href="listarnoticia.asp" class="nometur">Modificar Not&iacute;cia</a></td>
              </tr>
            </table></td>
            <td><table width="180" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td><a href="admar.asp" class="nometur">Atualizar Condi&ccedil;&otilde;es do Mar</a></td>
              </tr>
              <tr>
                <td width="100%"><p><a href="advideo.asp" class="nometur">Adicionar V&iacute;deo</a></p></td>
              </tr>
            </table></td>
            <td><table width="180" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td width="100%"><a href="adgaleria.asp" class="nometur">Adicionar Galeria </a></td>
              </tr>
              <tr>
                <td><a href="adfotogaleria.asp" class="nometur">Adicionar Fotos &agrave; Galeria </a></td>
              </tr>
            </table>            </td>
          </tr>
          <tr>
            <td><table width="180" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td width="100%"><a href="adfoto.asp" class="nometur">Adicionar Foto</a></td>
              </tr>
              <tr>
                <td><a href="listarfotos.asp" class="nometur">Modificar Foto </a></td>
              </tr>
            </table>              </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="26" bgcolor="#0000CC" class="tur">&nbsp;Turismo</td>
            <td bgcolor="#0000CC">&nbsp;</td>
            <td bgcolor="#0000CC">&nbsp;</td>
          </tr>
          <tr>
            <td><table width="180" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td width="100%"><a href="adturismo.asp" class="nometur">Adicionar Turismo </a></td>
              </tr>
              <tr>
                <td><a href="listarnoticia.asp" class="nometur">Modificar Turismo </a></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
          <br>
        </td>
      </tr>
      <tr>
        <td height="25" bgcolor="#000066"><div align="right"><span class="tur"><a href="<%= MM_Logout %>">Sair&nbsp;</a>&nbsp;</span></div></td>
      </tr>
    </table>
    </BODY>
</HTML>