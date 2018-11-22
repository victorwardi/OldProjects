<%
	' IMPORTANT: This script must not contain any HTML tags

	' Create an instance of AspJpeg object
	Set jpeg = Server.CreateObject("Persits.Jpeg")

Path = Server.MapPath(Request("arquivo"))

	jpeg.Open Path

	
If Request("compra") = "" then
	If jpeg.OriginalHeight > jpeg.OriginalWidth Then
	jpeg.Width = 70
	jpeg.Height = 100
	Else
	jpeg.Width = 100
	jpeg.Height = 70
	End If
Else
	If jpeg.OriginalHeight > jpeg.OriginalWidth Then
	jpeg.Width = 144
	jpeg.Height = 192
	Else
	jpeg.Width = 192
	jpeg.Height = 144
	End If
End If

	' Apply sharpening if necessary
	' jpeg.Sharpen 1, 130

	' Send thumbnail data to client browser
	jpeg.SendBinary
%>