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
<%
<!--#include file="../Connections/conSurf.asp" -->

%>
<!--#include file="caminho.asp" -->
<%
Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

titulo=Upload.Form("titulo")

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

nomecompletoimg= & Session("count") & ".jpg"
destino= pasta & "fotos\galeria\" & nomecompletoimg

	File.SaveAs pasta & "fotos\galeria\" & File.OriginalFileName
	
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
			
	Session("nomedb") = nomecompletoimg
	End If
End If

If (Upload.Form("Submit")<>"") Then


descricao=Upload.Form("descricao")
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ="&pasta&"\banco_de_dados\db.mdb" 
dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "fotos_galeria", conn, 2, 2
rs.addnew
rs("descricao") = descricao
rs("fotografo") = fotografo
rs("arquivo") = Session("nomedb")
rs.update
rs.movelast
strID = rs("CodFoto")
rs.close
set rs= nothing
set conn = nothing

Session.Contents.Remove("nomedb")
Session.Contents.Remove("count")
Response.Redirect("default.asp")
End If
Set upl = Nothing 
%>

<HTML>
<HEAD>
<TITLE>SAQUABB ADMIN</TITLE>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="464" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF3366">
  <tr>
    <td width="899" height="25" bgcolor="#FF99CC"><div align="center"><span class="tur">:: Adicionar Foto na Galeria ::</span></div></td>
  </tr>
  <tr>
    <td><form action="add_foto_galeria.asp" method="post" enctype="multipart/form-data" target="_self" id=form>
        <div align="center">
          <center>
            <table width="459" border="0" align="left" cellpadding="5" cellspacing="0" class="tbl">
              <tr>
                <td valign="top">Foto Miniatura<br>
                (Vai ser<br>
                redimensionada<br>
                para 100x75):</td>
                <td><p>                        <input name="foto" type="file" id="foto5" size="30">
                  </p>
                    <p>
                      <input name="Upload" type="submit" value="upload">
                  </p></td>
              </tr>
			  <% if (Session("nomedb")<>"") then%>
              <tr>
                <td>&nbsp;</td>
                <td><table width="215" border="0" cellpadding="0" cellspacing="0" class="tbl">
                    <tr>
                      <td height="26" valign="bottom"><% =Session("nomedb")%>                      </td>
                    </tr>
                    <tr>
                      <td height="36" valign="top"><img src="../fotos/galeria/<%=Session("nomedb")%>" alt="" border="0"></td>
                    </tr>
                </table></td>
              </tr>
			   <%  End If %>
               <tr>
                 <td valign="top">Descri&ccedil;&atilde;o:</td>
                 <td><input name="descricao" type="text" id="titulo5" value="<%=descricao%>" size="50"></td>
               </tr>
               <tr>
                 <td valign="top">Fot&oacute;grafo:</td>
                 <td><input name="fotografo" type="text" id="titulo5" value="<%=fotografo%>" size="50"></td>
               </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="submit" type="submit" id="submit5"></td>
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
