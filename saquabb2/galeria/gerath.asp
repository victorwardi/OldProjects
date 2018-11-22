<%
	' IMPORTANT: This script must not contain any HTML tags

	' Create an instance of AspJpeg object
	Set jpeg = Server.CreateObject("Persits.Jpeg")

Path = Server.MapPath(Request("arquivo"))

	jpeg.Open Path

	If jpeg.OriginalHeight > jpeg.OriginalWidth Then
	jpeg.Width = 75
	jpeg.Height = 100
	Else
	jpeg.Width = 100
	jpeg.Height = 75
	End If

	' Apply sharpening if necessary
	' jpeg.Sharpen 1, 130

	' Send thumbnail data to client browser
	jpeg.SendBinary
%>