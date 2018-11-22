<%
	' IMPORTANT: This script must not contain any HTML tags

	' Create an instance of AspJpeg object
	Set jpeg = Server.CreateObject("Persits.Jpeg")

Path = Server.MapPath(Request("arquivo"))

	jpeg.Open Path
	
	If jpeg.OriginalHeight > jpeg.OriginalWidth Then
	jpeg.Width = 80
	jpeg.Height = 53
	

	Else
	jpeg.Width = 80
	jpeg.Height = 53
	
	End If

	' Apply sharpening if necessary
	' jpeg.Sharpen 1, 130

	' Send thumbnail data to client browser
	jpeg.SendBinary
%>