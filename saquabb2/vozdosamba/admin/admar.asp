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

<%
Dim Mes_data, Ano_data, Dia_data, Dias_data
 Mes_data = datepart("m",date)
 Ano_data = datepart("yyyy",date)
 Dia_data = datepart ("d",date)
nomefoto = Dia_data & "_" & Mes_data & "_" & Ano_data
datacerta =  Dia_data & "/" & Mes_data & "/" & Ano_data

Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

'Fazendo UPLOAD

If (Upload.Form("upload")<>"") Then

			Set File = Upload.Files(1)
			File.SaveAs pasta & "fotos\upload\" & File.OriginalFileName

		If File.ImageType <> "UNKNOWN" Then
			Set jpeg = Server.CreateObject("Persits.Jpeg")
			jpeg.Open( File.Path )
									
			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If
			
			jpeg.Width = 640
			jpeg.Height = 480
			
			SavePath = pasta & "fotos\mar\" & nomefoto & ".jpg" 
			nomefotodb=nomefoto&".jpg"
			Session("nomefotodb")=nomefotodb
			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If

			jpeg.Save SavePath
								
			jpeg.Width = 192
			jpeg.Height = 144

			SavePath = pasta & "fotos\mar\p_" & nomefoto & ".jpg"

			jpeg.Save SavePath

End If
End If

'Gravando no BD

If (Upload.Form("submit")<>"") Then

tamanho=Upload.Form("tamanho")
agua=Upload.Form("agua")
vento=Upload.Form("vento")
tempo=Upload.Form("tempo")
formacao=Upload.Form("formacao")
pico=Upload.Form("pico")
ondulacao=Upload.Form("ondulacao")
comentarios=Upload.Form("comentarios")

dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "mar", conn, 2, 2
rs.addnew

rs("tamanho") = tamanho
rs("data") = datacerta
rs("agua") = agua
rs("vento") = vento
rs("tempo") = tempo
rs("formacao") = formacao
rs("pico") = pico
rs("ondulacao") = ondulacao
rs("comentario") = comentarios 
rs("foto") = Session("nomefotodb")
rs.update
rs.movelast
strID = rs("id")
rs.close
set rs= nothing
set conn = nothing

'*** DEPOIS DE GRAVAR LIMPAR A Session("imgnome")
Session.Contents.Remove("nomefotodb")
Response.Redirect("default.asp")
End If
Set upl = Nothing %>
<HTML>
<HEAD>
<TITLE>Voz do Samba</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../xtra/formulario.css" rel="stylesheet" type="text/css">
</head>
<BODY>

      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="center" valign="top">
		  <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="480">
				</td>
              </tr>
              <tr> 
                <td><table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
					   
                      <form action="admar.asp" method="POST" enctype="multipart/form-data" target="_self" id=form>
					  				  
                        <div align="center">
                          <center>
                            <br>
                            <span class="titulo">ATUALIZA</span><br>
                            <br>
                            <table width="50%" border="0" cellpadding="5" cellspacing="0" class="tbl">
                              <tr>
                                <td width="379" valign="top" class="texto"><img src="../images/CARTAZSHOW.jpg" width="144" height="21"></td>
                                <td width="50%"><input name="foto" type="file" class="form1" id="foto">
                                <br>
                                <input name="upload" type="submit" class="form1" id="upload" value="upload"></td>
                              </tr>
                              <tr>
                                <td class="texto"><img src="../images/detalhes-shows.jpg" width="144" height="27"></td>
                                <td><textarea name="comentarios" cols="30" rows="3" class="form1" id="textarea2"></textarea></td>
                              </tr>
                              <tr>
                                <% If (Session("nomefotodb") <> "")Then %>
								<td colspan="2" class="tit"><% =Session("nomefotodb")%><br>
<img src="../fotos/mar/p_<%=Session("nomefotodb")%>" alt="" border="0"></td>
								<% End If %>

                              </tr>
                              <tr>
                                <td height="33" class="tit">&nbsp;</td>
                                <td><div align="center">
                                  <input name="submit" type="submit" class="form1" id="submit">
                                </div></td>
                              </tr>
                            </table>
                            <br>
                          </center>
                        </div>
                    </form>
				    </td>
                  </tr>
                </table><br>
                  <br>
                  <br>
                </td>
              </tr>
            </table>
          </td>
        </tr>
</table>
</BODY>
</HTML>