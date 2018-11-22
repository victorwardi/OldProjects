<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conex.asp" -->
<%
Dim Rs_novidades
Dim Rs_novidades_numRows

Set Rs_novidades = Server.CreateObject("ADODB.Recordset")
Rs_novidades.ActiveConnection = MM_conex_STRING
Rs_novidades.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
Rs_novidades.CursorType = 0
Rs_novidades.CursorLocation = 2
Rs_novidades.LockType = 1
Rs_novidades.Open()

Rs_novidades_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 4
Repeat1__index = 0
Rs_novidades_numRows = Rs_novidades_numRows + Repeat1__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
    scrolling="no"
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(figuras/fundo/home.jpg);
}
.style5 {
	font-size: 5px;
	color: #FFFFFF;
}
.fonte {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
.borda {	border: 1px solid #000000;}

.style6 {color: #55A5E2}
.style8 {color: #55A5E2; font-size: 4px; }
.brdnoticia2 {border: 1px solid #ffffff;}
.style7 {font-size: 10px}
.style9 {font-size: 9px; color: #FFFFFF; }
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style11 {font-size: 9px}
a:link {
	text-decoration: none;
	color: #FFFFFF;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.style14 {font-size: 9px; color: #33FF33; }
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body scroll="no">

<table width="471" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="480" align="left" valign="middle" scope="col"><table width="471" height="321" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <th align="left" valign="top" scope="col">&nbsp;</th>
          <th width="4" rowspan="3" align="center" valign="middle" scope="col"><span class="style5">|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|</span><span class="style5"><br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|<br>
|</span></th>
            <th scope="col">&nbsp;</th>
        </tr>
        <tr>
        <th width="234" height="189" align="left" valign="top" scope="col"><table width="234" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="234" height="150" valign="middle" scope="col"><table width="209" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <th height="25" bgcolor="#54A6E2" scope="col"><img src="figuras/retalhos/bem_vindo.jpg" width="200" height="30"></th>
                </tr>
            </table>
              <div align="center" class="style6">
                <table width="222" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="81" align="center" valign="middle" class="style14" scope="col"><img src="figuras/1.jpg" width="70" height="70"> </th>
                    <th width="141" class="style14" scope="col"><p class="fonte">Seja bem vindo aoWarDesign! Aqui voc&ecirc; encontra profissionais qualificados que tornar&atilde;o sua empresa muito mais sintonizada com o mundo atual!<br>
                      Criamos  WebSites, Logomarcas, Banners, Flyers e muito mais! </p>                      </th>
                  </tr>
                </table>
              </div></th>
          </tr>
          <tr>
            <th height="9" scope="col"><span class="style8">--</span></th>
          </tr>
        </table>
          <div align="center"><img src="figuras/retalhos/ultimos.jpg" width="200" height="30"></div></th>
        <th width="233" rowspan="2" align="center" valign="top" scope="col"><table width="233" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="233" height="30" valign="middle" scope="col"><table width="231" height="28" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <th scope="col"><img src="figuras/retalhos/news.jpg" width="200" height="30"></th>
                  </tr>
              </table>
                </th>
          </tr>
        </table>
          
          <% 
While ((Repeat1__numRows <> 0) AND (NOT Rs_novidades.EOF)) 
%>
          <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <th height="14" colspan="3" align="left" valign="top" scope="col"><table width="132" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="21" height="14" align="left" scope="col"><div align="right"><img src="figuras/seta_azul.gif" width="15" height="12"></div></th>
                      <th width="111" class="style1 style3" scope="col"><div align="left" class="style9 style10"><%=(Rs_novidades.Fields.Item("titulo").Value)%></div></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <th width="4" height="56" align="left" valign="top" scope="col">&nbsp;</th>
                <th width="72" align="left" valign="middle" scope="col"><div align="left"><span class="style7"><a href="javascript:nova_janela('ver_novidade.asp?CodNot=<%=(Rs_novidades.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')" target="_self"><img src="fotos/<%=(Rs_novidades.Fields.Item("foto").Value)%>" width="60" height="45" border="1" align="middle" class="brdnoticia2" bordercolor="#000000"></a></span></div></th>
                <th width="153" align="center" valign="middle" class="fonte" scope="col"><div align="left" class="style11"><%=(Rs_novidades.Fields.Item("resumo").Value)%></div></th>
              </tr>
              <tr>
                <th height="7" colspan="3" align="left" valign="top" scope="col">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="230" align="center" valign="top" class="style3 style5" scope="col">----------------------------------------------------------------------------------------------------------------</th>
                    </tr>
                </table></th>
              </tr>
            </table>
          <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  Rs_novidades.MoveNext()
Wend
%><br>          </th>
      </tr>
      <tr>
        <th height="113" align="center" valign="top" scope="col"><table width="80"  border="2" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="borda">
          <tr>
            <th bgcolor="#FFFFFF" scope="col"><iframe name="coments" width="200" height="120" frameborder="no" src="mural/sframe.asp"></iframe>&nbsp;</th>
          </tr>
        </table>          
          <span class="fonte"><a href="javascript:nova_janela('mural/comentar.htm','Comentar','scrollbars=1','400','400','true')">Comentar</a></span></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<%
Rs_novidades.Close()
Set Rs_novidades = Nothing
%>
