<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>::: Saquabb - Galeria de Fotos ::::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<% Cod = Request.QueryString("Cod") %>

  
</frameset>
<noframes><body>
</body></noframes>
</html><frameset rows="94,*" cols="*" framespacing="0" frameborder="NO" border="0" bordercolor="#000000">
		<frame  src="/galeria_fotos/topo.asp" name="topo" scrolling="NO" noresize>
		<frameset rows="*" cols="200,*" framespacing="0" frameborder="no" border="0" bordercolor="#666666">
		<frame src="/galeria_fotos/thumbs.asp?Cod=<% =Cod %>" name="thumbs" frameborder="no" scrolling="no" noresize>
		<frame name="foto" src="/galeria_fotos/fotoprimeira.asp?CodGaleria=<% =Cod %>" scrolling="no">
    </frameset>
</frameset>