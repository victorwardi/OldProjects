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
<!--#include file="caminho.asp" -->
<%
'***UPLOAD ARQUIVOS

Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

titulo=Upload.Form("titulo")
materia=Upload.Form("materia")
resumo=Upload.Form("resumo")
data=Upload.Form("data")
autor=Upload.Form("autor")
autmail=Upload.Form("autmail")


If (Upload.Form("Upload")<>"") Then
	Set File = Upload.Files(1)

    Sub CountThisUser()
    Dim objFSO, objFS, file, intCount
    file = Server.MapPath("hits.txt")
    Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
    If objFSO.FileExists(file) Then
    Set objFS = objFSO.OpenTextFile(file, 1)
    Else
    Set objFS = objFSO.CreateTextFile(file, True)
    End If
    If Not objFS.AtEndOfStream Then
    intCount = objFS.ReadAll
    Else
    intCount = 0
    End If
    objFS.Close
    intCount = intCount + 1
    Session("count")= intCount
    Set objFS = objFSO.OpenTextFile(file, 2)
    objFS.Write intCount
    objFS.Close
    Set objFSO = Nothing
    Set objFS = Nothing
    End Sub

    If IsEmpty(Session("count")) Then
    Call Countthisuser
    End if

nomecompletoimg="th_" & Session("count") & ".jpg"
destino= pasta & "fotos\" & nomecompletoimg

	File.SaveAs pasta & "fotos\upload\" & File.OriginalFileName
	
			If File.ImageType <> "UNKNOWN" Then

			Set jpeg = Server.CreateObject("Persits.Jpeg")
			
			jpeg.Open( File.Path )
			
			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If
				
			jpeg.Width = 100
			jpeg.Height = 75

			SavePath = destino

			jpeg.Save SavePath
			
	'***TRATANDO NOME DAS IMAGENS E ARRAY	
	Session("nomedb") = nomecompletoimg
	End If
	
	
End If

'*** GRAVANDO
If (Upload.Form("Submit")<>"") Then


titulo=Upload.Form("titulo")
materia=Upload.Form("materia")
resumo=Upload.Form("resumo")
data=Upload.Form("data")
autor=Upload.Form("autor")
autmail=Upload.Form("autmail")

dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "noticias", conn, 2, 2
rs.addnew
rs("titulo") = titulo 
rs("materia") = materia
rs("resumo") = resumo
rs("data") = data
rs("autor") = autor
rs("autmail") = autmail 
rs("foto") = Session("nomedb")
rs.update
rs.movelast
strID = rs("CodNoticia")
rs.close
set rs= nothing
set conn = nothing

'*** DEPOIS DE GRAVAR LIMPAR A Session("imgnome")
Session.Contents.Remove("nomedb")
Session.Contents.Remove("count")
Response.Redirect("default.asp")
End If
Set upl = Nothing 
%>

<HTML>
<HEAD>
<TITLE>SaquaSurf</TITLE>
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
<img src="../images/spacer.gif" width="1" height="5">
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="772" height="25"><div align="center"><span class="texto">Administrativo Goth Box Party </span></div></td>
  </tr>
  <tr>
    <td height="25"><div align="center"><span class="texto">Adicionar Not&iacute;cia </span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form action="adnoticia.asp" method="post" enctype="multipart/form-data" target="_self" id=form>
        <div align="center">
          <center>
            <table width="402" border="0" cellpadding="5" cellspacing="0" class="tbl">
<% if (Session("nomedb")="") then%>

              <tr>
                <td width="132" valign="top" class="texto">Foto Miniatura</td>
                <td width="250"><p>                        <input name="foto" type="file" class="form1" id="foto5" size="30">
                  </p>
                    <p>
                      <input name="Upload" type="submit" class="form1" value="upload">
                  </p></td>
              </tr>
			  
<%
End If
if (Session("nomedb")<>"") then%>
              <tr>
                <td colspan="2" valign="top"><table width="215" border="0" cellpadding="0" cellspacing="0" class="tbl">
                    <tr valign="baseline">
                      <td height="21" valign="top" class="texto">Miniatura</td>
                    </tr>
                    <tr>
                      <td height="26" valign="bottom"><% =Session("nomedb")%>
                      </td>
                    </tr>
                    <tr>
                      <td height="36" valign="top"><img src="../fotos/<%=Session("nomedb")%>" alt="" border="0"></td>
                    </tr>
                    
                </table> </td>
              </tr>
<%  End If %>			  
              <tr>
                <td valign="top" class="texto">Titulo:</td>
                <td><input name="titulo" type="text" class="form1" id="titulo5" value="<%=titulo%>" size="50"></td>
              </tr>
              <tr>
                <td valign="top" class="texto">Resumo:</td>
                <td><textarea name="resumo" cols="45" rows="4" class="form1" id="textarea9" style="border-style: solid; border-width: 2"><%=materia%></textarea></td>
              </tr>
              <tr>
                <td valign="top" class="texto">Mat&eacute;ria:</td>
                <td><textarea name="materia" cols="45" rows="8" class="form1" id="textarea9" style="border-style: solid; border-width: 2"><%=materia%></textarea></td>
              </tr>
              <tr>
                <td valign="top" class="texto"><font size="2" face="Verdana" class="texto">Data:</font><font face="Verdana" size="2">&nbsp;</font></td>
                <td><span class="desc">
                  <input name="data" type="text" class="form1" id="data5" value="<%=data%>" size="13">
            </span></td>
              </tr>
              <tr>
                <td valign="top" class="texto"><font face="Verdana">Autor:</font></td>
                <td><span class="desc">
                  <input name="autor" type="text" class="form1" id="autor5" value="<%=autor%>" size="20">
                </span></td>
              </tr>
              <tr>
                <td valign="top" class="texto"><font face="Verdana">E-mail do Auto</font><font face="Verdana" size="2">r:</font></td>
                <td><input name="autmail" type="text" class="form1" id="autmail5" value="<%=autmail%>" size="20"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="submit" type="submit" class="form1" id="submit5"></td>
              </tr>
            </table>
          </center>
        </div>
      </form>      
    </td>
  </tr>
</table>
</BODY>
</HTML>
