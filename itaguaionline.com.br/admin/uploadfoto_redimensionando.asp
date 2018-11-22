<HTML>
<HEAD>
<TITLE>Upload Foto</TITLE>
</HEAD>
<BODY>
<%
	Set Upload = Server.CreateObject("Persits.Upload")
	
	Count = Upload.Save("C:\wwwroot\saquabb.com.br\fotos\upload")

	If Count = 0 Then
		Response.Write "Nenhuma imagem selecionada. <A HREF=""adfoto.asp"">Tente denovo</A>."
		Response.End
	Else

		Set File = Upload.Files(1)

		If File.ImageType <> "UNKNOWN" Then

			Set jpeg = Server.CreateObject("Persits.Jpeg")
			
			jpeg.Open( File.Path )

			jpeg.Width = 400
			jpeg.Height = 300
			

			SavePath = "C:\wwwroot\saquabb.com.br\fotos\400x300_" & File.ExtractFileName

			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If

			jpeg.Save SavePath
			
					
			jpeg.Width = 192
			jpeg.Height = 144

			SavePath = "C:\wwwroot\saquabb.com.br\fotos\th_" & File.ExtractFileName

			jpeg.Save SavePath


			Response.Write "Fotos enviadas com sucesso.<br><br>"
			Response.Write "" & File.ExtractFileName & "</B> and <B>" & SavePath & "</B>"

		Else			
			Response.Write "Não é uma imagem válida. <A HREF=""form.asp"">Try again</A>."
			Response.End
		End If
	End If
%>
</BODY>
</HTML>