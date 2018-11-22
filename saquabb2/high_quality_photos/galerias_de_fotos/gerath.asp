<%
	' IMPORTANT: This script must not contain any HTML tags

	' Create an instance of AspJpeg object
	Set jpeg = Server.CreateObject("Persits.Jpeg")

Path = Server.MapPath(Request("arquivo"))

	jpeg.Open Path
	
	If jpeg.OriginalHeight > jpeg.OriginalWidth Then
	jpeg.Width = 120
	jpeg.Height = 90
	

	Else
	jpeg.Width = 90
	jpeg.Height = 68
	
	End If

	' Apply sharpening if necessary
	' jpeg.Sharpen 1, 130

	' Send thumbnail data to client browser
	jpeg.SendBinary
%>