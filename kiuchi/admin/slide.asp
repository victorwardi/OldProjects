<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
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
<!--#include file="config_caminho.asp" -->
<%

Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

If (Upload.Form("Upload")<>"") Then

numero = 1

	For Each File in Upload.Files

	destino= pasta & "fotos\slide\slide0" & numero & ".jpg"

	If UCase(Right(destino, 3)) <> "JPG" Then
		destino = destino & ".jpg"
	End If

	File.SaveAs pasta & "fotos\slide\" & File.OriginalFileName
		
			If File.ImageType <> "UNKNOWN" Then

			Set jpeg = Server.CreateObject("Persits.Jpeg")
			
			jpeg.Open( File.Path )
			
			Jpeg.Sharpen 1, 150
			
			If Jpeg.OriginalWidth = 300 AND Jpeg.OriginalHeight = 200 then
				File.SaveAs destino
			End If
			
			If Jpeg.OriginalWidth > 300 then
				Jpeg.Width = 300
				Jpeg.Height = 200
				Jpeg.Save destino
			End If
			
			numero = numero + 1
	End If
	Next
Response.Redirect("adminlink.asp")
End If
%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style3 {color: #FF0000; font-weight: bold; font-size: 24px; }
body {
	background-color: #CCCCCC;
}
-->
</style>
</head>

<body>
<form action="slide.asp" method="post" enctype="multipart/form-data" name="Formulario" id="Formulario">
        <br>
        <table width="422"  border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#999999" bgcolor="#CCCCCC" class="tdnot">
          <tr align="center" bgcolor="#66CC99">
            <td height="20" colspan="2" class="titmateria">Trocar Fotos do Slide </td>
          </tr>
          <tr>
            <td>foto 1:</td>
            <td><input name="file1" type="file" id="file1"></td>
          </tr>
          <tr>
            <td>foto 2:</td>
            <td><input name="file2" type="file" id="file2"></td>
          </tr>
          <tr>
            <td width="154">foto 3:</td>
            <td width="250"><input name="file3" type="file" id="file3"></td>
          </tr>
          <tr align="center">
            <td colspan="2"><input name="Upload" type="submit" id="Upload" value="Enviar"></td>
          </tr>
  </table>
        <p align="center"><span class="style3">Aten&ccedil;&atilde;o</span><br>
        </p>
        <div align="center">Tamanho das fotos a serem inseridas tem quer ser de<span class="style1"> 300X200</span> , favor redimension&aacute;-las antes<br>
        </div>
</form>
</body>
</html>
