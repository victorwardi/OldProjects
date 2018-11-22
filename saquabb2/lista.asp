

ASP     

Listando arquivos de um diretório 
Este exemplo mostra como listar arquivos de um diretório. 

<html> 
<head> 
<title>Listando um Diretório</title> 
<style> 
.td{ 
font-weight: bold; 
background-color: #CCCCCC; 
} 
</style> 
</head> 
<body> 
<% 
Set fs = server.CreateObject("Scripting.FileSystemObject") 
Set pasta = fs.GetFolder("c:\wwwroot\saquabb.com.br\") 
%> 
<table border="1"> 
<tr> 
<td class="td">Nome Do arquivo</td> 
<td class="td">Tamanho Do arquivo</td> 
<td class="td">Data Modificado</td> 
<td class="td">Tipo Do arquivo</td> 
<td class="td">Atributos</td> 
</tr> 
<% 
FOR EACH file IN pasta.Files 
%> 
<tr>
<td align="right"><a href="<%=file.name%>"><%=file.name%></a></td>
<td align="right"><%=formatnumber(file.size)%>kb</td><td align="right"><%
=file.datelastmodified%></td><td 
align="right"><%=file.type%></td><td 
align="right"><%=file.attributes%></td> 
</tr> 
<% 
NEXT 
%> 
</table> 
</body> 
</html>
 
