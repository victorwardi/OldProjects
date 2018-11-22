<%@LANGUAGE="VBSCRIPT"%>
<!-- #include file="../ktml2/includes/ktedit/activex.asp"-->
<%
dim include: include=1
      dim useTemplates: useTemplates=1
      dim useIntrospection: useIntrospection=1
      dim KT_display
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
<%
<!--#include file="../Connections/conex2.asp" -->


'***UPLOAD ARQUIVOS

Dim String_reverse, arquivo, strimgnome
Dim aimgnome
Dim aimgtamanho
Dim aimgtipo
Dim totalaimgnome
Dim visivelmaisrecente, visivelfolhasarvore, tituloprojeto, subtituloprojeto, descricaoprojeto, codcliente, codprodserv, datafinalizacao, codprojeto
Dim nomeimagem, tamanhoimagem, tipoimagem, img, nomecompletoimg

pasta = "C:\Inetpub\wwwroot\kiuchi\"
'quando for publicar na internet deixe o caminho assim: pasta = "C:\wwwroot\saquabb.com.br\" '
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
destino= pasta & "fotos\sala\" & nomecompletoimg

	File.SaveAs pasta & "fotos\sala\original\" & File.OriginalFileName
	
			If File.ImageType <> "UNKNOWN" Then

			Set jpeg = Server.CreateObject("Persits.Jpeg")
			
			jpeg.Open( File.Path )
			
			If UCase(Right(SavePath, 1)) <> "JPG" Then
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
strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ="&pasta&"\banco_de_dados\db.mdb" 
dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "sala", conn, 2, 2
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
Response.Redirect("adminlink.asp")
End If
Set upl = Nothing 
%>

<HTML>
<HEAD>
<TITLE></TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.style2 {color: #000000}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="463" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr>
    <td width="459" height="25" align="center" bgcolor="#66CC99"><div align="center"><span class="tur"><span class="style2">:: Adicionar Sala:: </span></span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form action="add_sala.asp" method="post" enctype="multipart/form-data" target="_self" id=form>
        <div align="center">
          <center>
            <table width="459" border="0" cellpadding="5" cellspacing="0" class="tbl">
              <tr>
                <td valign="top"><div align="center"><span class="desc"><font face="Verdana" size="2">C&oacute;digo:<br>
(</font></span><font face="Verdana" size="2">SL<span class="desc">-xxx) </span></font></div></td>
                <td><span class="desc">
                  <input name="data" type="text" id="data5" value="<%=data%>" size="13">
                </span></td>
              </tr>
              <tr>
                <td width="58" valign="top"><div align="center">Categoria:                    <span class="mar">Venda/Aluguel</span></div></td>
                <td width="381"><input name="titulo" type="text" id="titulo5" value="<%=titulo%>" size="50">                </td>
              </tr>
              <tr>
                <td valign="top"><div align="center">Detalhes:</div></td>
                <td><p>
                  <input name="materia" type="hidden" id="materia" value="<%=(Server.HTMLEncode(materia & ""))%>">
                  <%
   KT_display = "Cut,Copy,Paste,Toggle WYSIWYG,Bold,Italic,Underline,Align Left,Align Center,Align Right,Align Justify,Background Color,Foreground Color,Undo,Redo,Bullet List,Numbered List,Indent,Outdent,HR,Font Type,Font Size,Insert Link,Clean Word,Heading List"
   call showActivex("materia", 500, 150, false, KT_display, "../ktml2/", "../ktml2/includes/styles/KT_styles.css", "../../../ktml2/images/uploads/", "../../../ktml2/files/uploads/", "English (UK)", -1, "english", "yes", "no")
%>
</p>
                </td>
              </tr>
              <tr>
                <td valign="top"><div align="center">Descri&ccedil;&atilde;o:</div></td>
                <td><textarea name="resumo" cols="45" rows="4" id="textarea10" style="border-style: solid; border-width: 2"><%=resumo%></textarea></td>
              </tr>
              <tr>
                <td><div align="center"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td valign="top"><div align="center">Foto Miniatura<br>                
                  100X75</div></td>
                <td><p><br>
                        <input name="foto" type="file" id="foto5" size="30">
                  </p>
                    <p>
                      <input name="Upload" type="submit" value="upload">
                  </p></td>
              </tr>
              <tr>
                <td><div align="center"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center"></div></td>
                <td><table width="215" border="0" cellpadding="0" cellspacing="0" class="tbl">
                    <% if (Session("nomedb")<>"") then%>
                    <tr>
                      <td height="22" colspan="4" valign="top" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr valign="baseline">
                      <td height="21" colspan="4" valign="top" class="mat">Miniatura</td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4" valign="top"><img src="img/spacer.gif" width="1" height="1"></td>
                    </tr>
                    <tr>
                      <td height="26" colspan="4" valign="bottom"><% =Session("nomedb")%>
                      </td>
                    </tr>
                    <tr>
                      <td height="36" colspan="2" valign="top"><img src="../fotos/sala/<%=Session("nomedb")%>" alt="" border="0"></td>
                      <td width="185" valign="baseline">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="19" colspan="4" valign="top" class="textoNormalCorpo9"><img src="img/spacer.gif" width="1" height="1"> </td>
                    </tr>
                    <%  End If %>
                </table></td>
              </tr>
              <tr>
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
