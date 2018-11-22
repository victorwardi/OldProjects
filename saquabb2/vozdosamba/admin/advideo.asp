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
<!--#include file="caminho.asp" -->
<%'Upload do video
Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

If (Upload.Form("Upload")<>"") Then
	
	Set File = Upload.Files(1)
	nomevideo = File.OriginalFileName
	File.SaveAs pasta & "videos\" & nomevideo
	
			
Session("video") = nomevideo
End If
	
'*** GRAVANDO
If (Upload.Form("Submit")<>"") Then

titulo=Upload.Form("titulo")
arquivo=Upload.Form("arquivo")
info=Upload.Form("info")

dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "videos", conn, 2, 2
rs.addnew
rs("titulo") = titulo 
rs("arquivo") = Session("video")
rs("info") = info
rs.update
rs.movelast
strID = rs("id")
rs.close
set rs= nothing
set conn = nothing

'*** DEPOIS DE GRAVAR LIMPAR A Session("imgnome")
Session.Contents.Remove("video")
Response.Redirect("default.asp")
End If
Set upl = Nothing 
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
<BODY>
<img src="../images/spacer.gif" width="1" height="5">
<table width="776" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000099">
  <tr>
    <td width="772" height="25" bgcolor="#000000"><div align="center"><span class="tur">Administrativo Voz do Samba</span></div></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#000000"><div align="center"><span class="tur">Adicionar V&iacute;deo </span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form action="advideo.asp" method="POST" enctype="multipart/form-data" target="_self" id=form>
        <div align="center">
          <center>
            <br>

            <table border="0" cellpadding="5" cellspacing="0" class="tbl">
              <tr>
                <td valign="top">Upload do v&iacute;deo: </td>
                <td><p>
                  <input name="video" type="file" class="caixa" id="video">
                </p>
                <p>
                  <input name="Upload" type="submit" id="Upload" value="Upload">              
                    </p></td>
              </tr>
              <tr>
                <td valign="top">T&iacute;tulo:</td>
                <td><input name="titulo" type="text" class="caixa" id="titulo3" value="" size="50"></td>
              </tr>
              <tr>
                <td valign="top">Info:</td>
                <td><textarea name="info" cols="47" rows="8" class="caixa" id="textarea" style="border-style: solid; border-width: 2"></textarea></td>
              </tr>
              <tr>
			  <% If  (Session("video")<>"") Then %>
                <td valign="top">V&iacute;deo Inserido:</td>
                <td>&nbsp;<%=Session("video")%></td>
				<% End If %>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="Submit" type="submit" id="Submit" value="Enviar"></td>
              </tr>
              <tr>
                <td colspan="2">                  <br>                  </td>
              </tr>
            </table>
            <br>
                    </center>
        </div>
    </form></td>
  </tr>
</table>

</BODY>
</HTML>