<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim Rs_atletas
Dim Rs_atletas_numRows

Set Rs_atletas = Server.CreateObject("ADODB.Recordset")
Rs_atletas.ActiveConnection = MM_conSurf_STRING
Rs_atletas.Source = "SELECT * FROM Albuns ORDER BY cod DESC"
Rs_atletas.CursorType = 0
Rs_atletas.CursorLocation = 2
Rs_atletas.LockType = 1
Rs_atletas.Open()

Rs_atletas_numRows = 0
%>
<%
Dim Repeat_Rs_atletas__numRowsHL
Dim Repeat_Rs_atletas__indexHL

Repeat_Rs_atletas__numRowsHL = -1
Repeat_Rs_atletas__indexHL = 0
Rs_atletas_numRows = Rs_atletas_numRows + Repeat_Rs_atletas__numRowsHL
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>SAQUABB.com.br _________ By Wardesign.com.br _____________________________________________________________________________</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-image:  url(imagens/fundo.gif);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.brd {border: 1px solid #000000;
}
.style23 {
	font-size: 10px;
	color: #FF6600;
	font-weight: bold;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 10px;
	font-weight: bold;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style59 {
	font-size: 10px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
}
.style60 {font-weight: bolder; font-family: Geneva, Arial, Helvetica, sans-serif;}
a {
	font-weight: bold;
}
.linha {
	border-bottom-style: solid;
	border-bottom-color: #000000;
	border-bottom-width: 1px;	
	
}
.mao {
	cursor: hand;
}
-->
</style>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->

</head>

<body>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="brd">
  <tr>
    <th align="center" valign="top" scope="col"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
      <tr>
        <th align="center" valign="top" scope="col"><table  border="0" cellpadding="0" cellspacing="0">
            <tr align="left" valign="top">
              <th colspan="3" scope="col"><img src="imagens/topo/modelos/topo_r1_c1.jpg" width="779" height="17"></th>
            </tr>
            <tr>
              <th rowspan="2" scope="col"><img src="imagens/topo/modelos/topo_r2_c1.jpg" width="10" height="139"></th>
              <td height="43"><img src="publicidade/saquabb_publicidade.gif" width="468" height="60"></td>
              <td rowspan="2" align="left" valign="top"><img src="imagens/topo/modelos/topo_r2_c5.jpg" width="301" height="139" border="0" usemap="#Map2"></td>
            </tr>
            <tr>
              <td align="left" valign="top"><img src="imagens/topo/modelos/topo_r3_c2.jpg" width="468" height="79" border="0" usemap="#Map"></td>
            </tr>
            <tr>
              <td colspan="3"><!-- InstanceBeginEditable name="titulo" -->
               <script language="JavaScript" type="text/JavaScript">
<!--
function openPictureWindow_Fever(imageType,imageName,imageWidth,imageHeight,alt,posLeft,posTop) {  // v4.01
	newWindow = window.open("","newWindow","width="+imageWidth+",height="+imageHeight+",scrollbars=no,left="+posLeft+",top="+posTop);
	newWindow.document.open();
	newWindow.document.write('<html><title>'+alt+'</title><body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onBlur="self.close()">'); 
	if (imageType == "swf"){
	newWindow.document.write('<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"'+imageWidth+'\" height=\"'+imageHeight+'\">');
	newWindow.document.write('<param name=movie value=\"'+imageName+'\"><param name=quality value=high>');
	newWindow.document.write('<embed src=\"'+imageName+'\" quality=high pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"'+imageWidth+'\" height=\"'+imageHeight+'\">');
	newWindow.document.write('</embed></object>');	}else{
	newWindow.document.write('<img src=\"'+imageName+'\" width='+imageWidth+' height='+imageHeight+' alt=\"'+alt+'\">'); 	}
	newWindow.document.write('</body></html>');
	newWindow.document.close();
	newWindow.focus();
}
//-->
</script> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="21%" align="left" scope="col"><img src="imagens/topo/modelos/topo_r4_c1.jpg" width="170" height="64"></th>
                    <th width="48%" align="center" valign="top" scope="col"><img src="imagens/topo/topos/festa.jpg" width="288" height="61"></th>
                    <th width="31%" align="right" valign="top" scope="col"><img src="imagens/topo/modelos/topo_r4_c4.jpg" width="319" height="64"></th>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></td>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="80%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="tabela_principal" -->
          <table width="610" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" valign="bottom" scope="col"><img src="imagens/topo_tabela.jpg" width="610" height="7"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="imagens/fundo_tabela.jpg"><table align="center">
                <tr>
                  <%
  ' Horizontal Looper version 3
  While ((Repeat_Rs_atletas__numRowsHL <> 0) AND (NOT Rs_atletas.EOF))
%>
                  <td width="140"><table width="143" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th align="center" valign="middle" scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <td height="108" align="center" valign="middle"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(Rs_atletas.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><img src="festa/fotos/<%=(Rs_atletas.Fields.Item("thumb").Value)%>" border="0" class="brd"></a></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" class="style60 style61"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(Rs_atletas.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(Rs_atletas.Fields.Item("nome").Value)%></a></td>
                      </tr>
                  </table></td>
                  <%
    'Horizontal Looper version 3
    Repeat_Rs_atletas__indexHL=Repeat_Rs_atletas__indexHL+1
    Repeat_Rs_atletas__numRowsHL=Repeat_Rs_atletas__numRowsHL-1
    Rs_atletas.MoveNext()
    if len(nested_Rs_atletas)<=0 then
      nested_Rs_atletas = 1
    end if
    if ((Repeat_Rs_atletas__numRowsHL <> 0) AND (NOT Rs_atletas.EOF) AND (nested_Rs_atletas mod 4 = 0)) then
      Response.Write "</tr><tr>"
    end if
    nested_Rs_atletas = nested_Rs_atletas + 1
    'end horizontal looper version 3
  Wend
%>
                </tr>
              </table>                
                <br></td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="imagens/base_tabela.jpg" width="610" height="7"></td>
            </tr>
          </table>
          <br>
           <!-- InstanceEndEditable --></th>
        <th width="20%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="publicidade" -->
          <table width="150"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img src="retalhos/vai_rolar.jpg" width="150" height="31"></th>
            </tr>
            <tr>
              <td height="25" align="center" valign="middle" background="retalhos/meio_publi.jpg"><p onClick="openPictureWindow_Fever('undefined','flyer/flyer.jpg','400','600','SAQUABB.com.br _________ By Wardesign.com.br _____________________________________________________________________________','','')"><span class="mao">Clique aqui para ampliar</span><br>
              </p>                </td>
            </tr>
            <tr>
              <td align="center" valign="top" background="retalhos/meio_publi.jpg"><img src="flyer/flyer.jpg" width="144" height="300" class="brd"></td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="retalhos/base_publi.jpg" width="150" height="12"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="10" align="center" valign="top" background="retalhos/fundo_base.jpg" scope="col"><img src="retalhos/fundo_base.jpg" width="1" height="10"></th>
          </tr>
          <tr>
            <td height="25" align="center" valign="middle" background="retalhos/meio_fundo.jpg" bgcolor="#D65501"><span class="style59"><a href="home.asp">Home</a> -<a href="arquivo.asp"> Not&iacute;cias</a> - <a href="galerias.asp">Galerias</a> -<a href="atletas.asp"> Atletas</a> - <a href="festa.asp">Festas</a> - <a href="contato.asp" class="style60">Contato</a></span> </td>
          </tr>
          <tr>
            <td background="retalhos/fundo_base_invert.jpg"><img src="retalhos/fundo_base_invert.jpg" width="1" height="10"></td>
          </tr>
        </table></th>
      </tr>
      <tr valign="middle" bgcolor="#FFE6CC">
        <th height="25" colspan="2" align="center" scope="col"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="style23" scope="col"> Saquabb.com.br &copy; 2005 . Todos os Direitos Reservados . Desenvolvido Por <a href="http://www.wardesign.com.br">Wardesign.com.br </a> </th>
          </tr>
        </table></th>
        </tr>
    </table></td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="62,60,105,79" href="home.asp">
  <area shape="rect" coords="120,42,186,61" href="arquivo.asp">
  <area shape="rect" coords="201,31,268,46" href="galerias.asp">
  <area shape="rect" coords="283,26,341,47" href="atletas.asp">
  <area shape="rect" coords="357,28,412,58" href="festa.asp">
  <area shape="rect" coords="424,46,482,76" href="contato.asp">
  <area shape="rect" coords="466,59,479,75" href="#">
  <area shape="rect" coords="25,67,44,86" href="contato.asp">
  <area shape="rect" coords="2,69,15,83" href="home.asp">
</map>
<map name="Map2">
  <area shape="rect" coords="-3,120,15,135" href="contato.asp">
</map>
</body>
<!-- InstanceEnd --></html>
<%
Rs_atletas.Close()
Set Rs_atletas = Nothing
%>
