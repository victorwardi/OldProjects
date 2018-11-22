<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim Rs_atletas
Dim Rs_atletas_numRows

Set Rs_atletas = Server.CreateObject("ADODB.Recordset")
Rs_atletas.ActiveConnection = MM_conSurf_STRING
Rs_atletas.Source = "SELECT * FROM atletas ORDER BY titulo ASC"
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
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style61 {
	font-size: 12px;
	font-weight: bold;
	color: #000000;
}
.style62 {
	color: #FF0000;
	font-size: 11px;
}
.style63 {font-size: 11px}
.style64 {
	color: #0066FF;
	font-size: 11px;
}
-->
</style>
<!-- InstanceEndEditable -->

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
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="21%" align="left" scope="col"><img src="imagens/topo/modelos/topo_r4_c1.jpg" width="170" height="64"></th>
                    <th width="48%" align="center" valign="top" scope="col"><img src="imagens/topo/topos/atletas.jpg" width="165" height="61"></th>
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
              <td align="center" valign="top" background="imagens/fundo_tabela.jpg">
                <table align="center">
                  <tr>
                    <%
  ' Horizontal Looper version 3
  While ((Repeat_Rs_atletas__numRowsHL <> 0) AND (NOT Rs_atletas.EOF))
%>
                    <td><table width="120" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th align="center" valign="middle" scope="col">&nbsp;</th>
                          </tr>
                          <tr>
                            <td height="108" align="center" valign="middle"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atletas.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><img src="fotos/atletas/<%=(Rs_atletas.Fields.Item("foto").Value)%>" alt="<%=(Rs_atletas.Fields.Item("titulo").Value)%>" border="0" class="brd"></a></td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle" class="style60 style61"><%=(Rs_atletas.Fields.Item("titulo").Value)%></td>
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
                </td>
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
              <th scope="col"><img src="retalhos/cadastro.jpg" width="150" height="31"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="retalhos/meio_publi.jpg"><br>
                <table width="90%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col">Quer ter seu perfil aqui no Saquabb?<br>
  Ent&atilde;o <a href="bblagos/cadastro.doc"><span class="style64">Clique Aqui</span></a>. Voc&ecirc; ir&aacute; Baixar um arquivo <span class="style63">Word</span>, onde respoder&aacute; as perguntas, que dever&atilde;o se enviadas para o e-mail  <span class="style62">victor@saquabb.com.br</span>  juntamente com fotos, sendo essencial que seja enviada uma foto de Rosto.</th>
                </tr>
              </table>              <p align="center">&nbsp;</p></td></tr>
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
