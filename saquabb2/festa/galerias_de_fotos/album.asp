<% 
Option Explicit 
On Error Resume Next
Dim album_dir, album_file, welcome_text, slideShowDelay,imgPerRow

' System Setup [Do Not Change, unless necessary]
album_dir = "/novo/album/" 
album_file = "album.asp"
welcome_text = "Saquabb.com.br"
slideShowDelay = 3000 '[in ms. sets the delay between transitions]
imgPerRow = 4' Images per row, when displayed using thumbnail
' End System Setup
%>

<html>
<head>
<title>Saquabb.com.br</title>
<link rel="StyleSheet" href="<%=album_dir%>_system/styles.css">
<base target="principal">
</head>
<body bgcolor="#FFFFFF" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">


<!-- #include file="_system/album.inc" -->
  
</body>

</html>