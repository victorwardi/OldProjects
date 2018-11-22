<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim RsVer_atleta__MMColParam
RsVer_atleta__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  RsVer_atleta__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim RsVer_atleta
Dim RsVer_atleta_numRows

Set RsVer_atleta = Server.CreateObject("ADODB.Recordset")
RsVer_atleta.ActiveConnection = MM_conSurf_STRING
RsVer_atleta.Source = "SELECT * FROM atletas WHERE CodNoticia = " + Replace(RsVer_atleta__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
RsVer_atleta.CursorType = 0
RsVer_atleta.CursorLocation = 2
RsVer_atleta.LockType = 1
RsVer_atleta.Open()

RsVer_atleta_numRows = 0
%>
<%
Dim Fotos__MMColParam
Fotos__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  Fotos__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim Fotos
Dim Fotos_numRows

Set Fotos = Server.CreateObject("ADODB.Recordset")
Fotos.ActiveConnection = MM_conSurf_STRING
Fotos.Source = "SELECT * FROM fotos WHERE CodNoticia = " + Replace(Fotos__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
Fotos.CursorType = 0
Fotos.CursorLocation = 2
Fotos.LockType = 1
Fotos.Open()

Fotos_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = -1
Repeat1__index = 0
Fotos_numRows = Fotos_numRows + Repeat1__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ATLETAS SAQUABB ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript"> <br>

<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<br>

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style5 {font-size: 11px}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; }
.style7 {color: #FFFFFF}
.style9 {font-size: 9px}
.style10 {color: #000000}
.brdnoticia {border: 1px solid #000000;}
-->
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<div id="Layer1" style="position:absolute; width:500px; height:661px; z-index:1; left: 0; top: 0;">
  <table width="450" height="517" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF9900">
    <tr>
      <td height="474" align="center" valign="top" bordercolor="#000000" bgcolor="#FFDAA6"><table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style2"><table border="0" cellpadding="0" cellspacing="0" width="500">
            <!-- fwtable fwsrc="Untitled" fwbase="topo.jpg" fwstyle="Dreamweaver" fwdocid = "477476161" fwnested="0" -->
            <tr>
              <td><img src="imagens/spacer.gif" width="7" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="10" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="39" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="33" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="7" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="9" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="8" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="8" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="15" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="29" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="17" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="24" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="23" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="11" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="29" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="37" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="20" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="23" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="25" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="13" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="18" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="6" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="30" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="35" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="7" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="7" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="10" height="1" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt=""></td>
            </tr>
            <tr>
              <td colspan="8"><img name="topo_r1_c1" src="imagens/topo_r1_c1.jpg" width="121" height="10" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r1_c9" src="imagens/topo_r1_c9.jpg" width="44" height="16" border="0" alt=""></td>
              <td rowspan="3"><img name="topo_r1_c11" src="imagens/topo_r1_c11.jpg" width="17" height="26" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r1_c12" src="imagens/topo_r1_c12.jpg" width="47" height="16" border="0" alt=""></td>
              <td rowspan="3" colspan="2"><img name="topo_r1_c14" src="imagens/topo_r1_c14.jpg" width="40" height="26" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r1_c16" src="imagens/topo_r1_c16.jpg" width="57" height="16" border="0" alt=""></td>
              <td rowspan="3"><img name="topo_r1_c18" src="imagens/topo_r1_c18.jpg" width="23" height="26" border="0" alt=""></td>
              <td colspan="2"><img name="topo_r1_c19" src="imagens/topo_r1_c19.jpg" width="38" height="10" border="0" alt=""></td>
              <td rowspan="10" colspan="2"><img name="topo_r1_c21" src="imagens/topo_r1_c21.jpg" width="24" height="98" border="0" alt=""></td>
              <td rowspan="7" colspan="5"><img name="topo_r1_c23" src="imagens/topo_r1_c23.jpg" width="89" height="67" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="10" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="3" colspan="2"><img name="topo_r2_c1" src="imagens/topo_r2_c1.jpg" width="17" height="29" border="0" alt=""></td>
              <td colspan="2" rowspan="11" background="fotos/atletas/<%=(RsVer_atleta.Fields.Item("foto").Value)%>">&nbsp;</td>
              <td rowspan="2" colspan="4"><img name="topo_r2_c5" src="imagens/topo_r2_c5.jpg" width="32" height="16" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r2_c19" src="imagens/topo_r2_c19.jpg" width="38" height="16" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="6" border="0" alt=""></td>
            </tr>
            <tr>
              <td colspan="2"><img name="topo_r3_c9" src="imagens/topo_r3_c9.jpg" width="44" height="10" border="0" alt=""></td>
              <td colspan="2"><img name="topo_r3_c12" src="imagens/topo_r3_c12.jpg" width="47" height="10" border="0" alt=""></td>
              <td colspan="2"><img name="topo_r3_c16" src="imagens/topo_r3_c16.jpg" width="57" height="10" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="10" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="3" colspan="3"><img name="topo_r4_c5" src="imagens/topo_r4_c5.jpg" width="24" height="24" border="0" alt=""></td>
              <td colspan="13" rowspan="6" background="imagens/topo_r4_c8.jpg"><div align="left"><span class="style5 style4 style2"><strong><span class="style1"><%=(RsVer_atleta.Fields.Item("titulo").Value)%></span></strong></span></div></td>
              <td><img src="imagens/spacer.gif" width="1" height="13" border="0" alt=""></td>
            </tr>
            <tr>
              <td><img name="topo_r5_c1" src="imagens/topo_r5_c1.jpg" width="7" height="6" border="0" alt=""></td>
              <td rowspan="9"><img name="topo_r5_c2" src="imagens/topo_r5_c2.jpg" width="10" height="78" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="6" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="8"><img name="topo_r6_c1" src="imagens/topo_r6_c1.jpg" width="7" height="72" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="5" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="8"><img name="topo_r7_c5" src="imagens/topo_r7_c5.jpg" width="7" height="73" border="0" alt=""></td>
              <td><img name="topo_r7_c6" src="imagens/topo_r7_c6.jpg" width="9" height="17" border="0" alt=""></td>
              <td rowspan="8"><img name="topo_r7_c7" src="imagens/topo_r7_c7.jpg" width="8" height="73" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="17" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="7"><img name="topo_r8_c6" src="imagens/topo_r8_c6.jpg" width="9" height="56" border="0" alt=""></td>
              <td colspan="3"><img name="topo_r8_c23" src="imagens/topo_r8_c23.jpg" width="72" height="12" border="0" alt=""></td>
              <td rowspan="3" colspan="2"><img name="topo_r8_c26" src="imagens/topo_r8_c26.jpg" width="17" height="31" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="12" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="5" colspan="2"><img name="topo_r9_c23" src="imagens/topo_r9_c23.jpg" width="65" height="38" border="0" alt=""></td>
              <td rowspan="2"><img name="topo_r9_c25" src="imagens/topo_r9_c25.jpg" width="7" height="19" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="10" border="0" alt=""></td>
            </tr>
            <tr>
              <td colspan="13"><img name="topo_r10_c8" src="imagens/topo_r10_c8.jpg" width="274" height="9" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="9" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="2" colspan="7"><img name="topo_r11_c8" src="imagens/topo_r11_c8.jpg" width="127" height="14" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r11_c15" src="imagens/topo_r11_c15.jpg" width="66" height="14" border="0" alt=""></td>
              <td colspan="3"><img name="topo_r11_c17" src="imagens/topo_r11_c17.jpg" width="68" height="7" border="0" alt=""></td>
              <td rowspan="4" colspan="2"><img name="topo_r11_c20" src="imagens/topo_r11_c20.jpg" width="31" height="25" border="0" alt=""></td>
              <td rowspan="5"><img name="topo_r11_c22" src="imagens/topo_r11_c22.jpg" width="6" height="32" border="0" alt=""></td>
              <td rowspan="4" colspan="2"><img name="topo_r11_c25" src="imagens/topo_r11_c25.jpg" width="14" height="25" border="0" alt=""></td>
              <td rowspan="5"><img name="topo_r11_c27" src="imagens/topo_r11_c27.jpg" width="10" height="32" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="7" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="4"><img name="topo_r12_c17" src="imagens/topo_r12_c17.jpg" width="20" height="25" border="0" alt=""></td>
              <td rowspan="4"><img name="topo_r12_c18" src="imagens/topo_r12_c18.jpg" width="23" height="25" border="0" alt=""></td>
              <td rowspan="4"><img name="topo_r12_c19" src="imagens/topo_r12_c19.jpg" width="25" height="25" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="7" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="2" colspan="2"><img name="topo_r13_c3" src="imagens/topo_r13_c3.jpg" width="72" height="11" border="0" alt=""></td>
              <td rowspan="3" colspan="2"><img name="topo_r13_c8" src="imagens/topo_r13_c8.jpg" width="23" height="18" border="0" alt=""></td>
              <td colspan="3"><img name="topo_r13_c10" src="imagens/topo_r13_c10.jpg" width="70" height="5" border="0" alt=""></td>
              <td rowspan="3" colspan="4"><img name="topo_r13_c13" src="imagens/topo_r13_c13.jpg" width="100" height="18" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="5" border="0" alt=""></td>
            </tr>
            <tr>
              <td rowspan="2" colspan="2"><img name="topo_r14_c1" src="imagens/topo_r14_c1.jpg" width="17" height="13" border="0" alt=""></td>
              <td rowspan="2" colspan="3"><img name="topo_r14_c10" src="imagens/topo_r14_c10.jpg" width="70" height="13" border="0" alt=""></td>
              <td rowspan="2" colspan="2"><img name="topo_r14_c23" src="imagens/topo_r14_c23.jpg" width="65" height="13" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="6" border="0" alt=""></td>
            </tr>
            <tr>
              <td><img name="topo_r15_c3" src="imagens/topo_r15_c3.jpg" width="39" height="7" border="0" alt=""></td>
              <td colspan="4"><img name="topo_r15_c4" src="imagens/topo_r15_c4.jpg" width="57" height="7" border="0" alt=""></td>
              <td colspan="2"><img name="topo_r15_c20" src="imagens/topo_r15_c20.jpg" width="31" height="7" border="0" alt=""></td>
              <td><img name="topo_r15_c25" src="imagens/topo_r15_c25.jpg" width="7" height="7" border="0" alt=""></td>
              <td><img name="topo_r15_c26" src="imagens/topo_r15_c26.jpg" width="7" height="7" border="0" alt=""></td>
              <td><img src="imagens/spacer.gif" width="1" height="7" border="0" alt=""></td>
            </tr>
          </table></td>
        </tr>
      </table>
        <table width="476" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="344" align="left" valign="top"><span class="style6"><%=(RsVer_atleta.Fields.Item("materia").Value)%></span></td>
            <td width="5" align="left" valign="top">&nbsp;</td>
            <td width="127" align="left" valign="top"><div align="center">
              <p class="style7">&nbsp;</p>
              <p class="style7">&nbsp;</p>
              <p class="style7">&nbsp;</p>
              <p class="style10">&nbsp;</p>
              <p class="style10"><strong>Fotos</strong></p>
              <% 
While ((Repeat1__numRows <> 0) AND (NOT Fotos.EOF)) 
%>
              <table width="127" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="127" align="left" valign="top"><div align="center"><span class="style7"><a href="javascript:openPictureWindow_Fever('fotos/atletas/<%=(Fotos.Fields.Item("arquivo").Value)%>','<%=(Fotos.Fields.Item("largura").Value)%>','<%=(Fotos.Fields.Item("altura").Value)%>','SAQUABB','10','10')"><img src="fotos/atletas/100x75_<%=(Fotos.Fields.Item("arquivo").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></a></span></div></td>
                  </tr>
                  <tr>
                    <td class="style7 style9"><div align="center" class="style2 style10"><%=(Fotos.Fields.Item("descricao").Value)%></div></td>
                  </tr>
                  <tr>
                    <td class="style7 style9"><span class="style10"><span class="style2">Foto:<%=(Fotos.Fields.Item("fotografo").Value)%></span></span></td>
                  </tr>
                  <tr>
                    <td height="12" valign="middle" class="style7 style9"><div align="center" class="style10">------------------------------------</div></td>
                  </tr>
                </table>
              <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  Fotos.MoveNext()
Wend
%>
</div></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
      </table>        </td>
    </tr>
    <tr>
      <td height="40" align="center" valign="top" bordercolor="#000000" background="imagens/base_atletas.jpg" bgcolor="#FFDAA6">&nbsp;</td>
    </tr>
  </table>
</div>

</body>
</html>
<%
RsVer_atleta.Close()
Set RsVer_atleta = Nothing
%>
<%
Fotos.Close()
Set Fotos = Nothing
%>

