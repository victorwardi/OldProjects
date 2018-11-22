<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<% key = Request.QueryString("Key") %>

  <frameset rows="60,*" cols="*" framespacing="0" frameborder="NO" border="0">
		<frame  src="topo.asp" name="topo" scrolling="NO" noresize>
		<frameset cols="117,*" frameborder="NO" border="0" framespacing="0">
		<frame src="thumbs.asp?key=<% =key %>" name="thumbs" scrolling="auto" noresize>
		<frame name="foto" src="foto.asp">
	</frameset>
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
