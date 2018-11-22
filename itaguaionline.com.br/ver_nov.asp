<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conex.asp" -->
<%
Dim Rs_nov__MMColParam
Rs_nov__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  Rs_nov__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim Rs_nov
Dim Rs_nov_numRows

Set Rs_nov = Server.CreateObject("ADODB.Recordset")
Rs_nov.ActiveConnection = MM_conex_STRING
Rs_nov.Source = "SELECT * FROM noticias WHERE CodNoticia = " + Replace(Rs_nov__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
Rs_nov.CursorType = 0
Rs_nov.CursorLocation = 2
Rs_nov.LockType = 1
Rs_nov.Open()

Rs_nov_numRows = 0
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
<title>VAI ROLAR</title>
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
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.brdnoticia {border: 1px solid #000000;}
.style11 {
	color: #333333;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style12 {
	color: #CC0000;
	font-weight: bold;
}
.style17 {color: #FFFFFF; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
}
.style13 {font-size: 9px; color: #666666; }
.style9 {font-size: 9px; color: #FFFFFF; }
-->
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="500" height="245" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="505" scope="col"><table border="0" cellpadding="0" cellspacing="0" width="500">
      <!-- fwtable fwsrc="Untitled" fwbase="news.jpg" fwstyle="Dreamweaver" fwdocid = "1449933125" fwnested="0" -->
      <tr>
        <td><img src="imagens_retalhos/not/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="25" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="78" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="15" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="13" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="21" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="8" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="8" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="21" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="7" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="27" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="23" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="17" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="20" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="19" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="8" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="8" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="13" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="20" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="17" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="8" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="1" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="12" colspan="2"><img name="news_r1_c1" src="imagens_retalhos/not/news_r1_c1.jpg" width="34" height="80" border="0" alt=""></td>
        <td rowspan="8" colspan="2"><img name="news_r1_c3" src="imagens_retalhos/not/news_r1_c3.jpg" width="18" height="64" border="0" alt=""></td>
        <td rowspan="4" colspan="4"><img name="news_r1_c5" src="imagens_retalhos/not/news_r1_c5.jpg" width="100" height="14" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r1_c9" src="imagens_retalhos/not/news_r1_c9.jpg" width="6" height="14" border="0" alt=""></td>
        <td rowspan="7"><img name="news_r1_c10" src="imagens_retalhos/not/news_r1_c10.jpg" width="15" height="57" border="0" alt=""></td>
        <td rowspan="2" colspan="4"><img name="news_r1_c11" src="imagens_retalhos/not/news_r1_c11.jpg" width="46" height="7" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r1_c15" src="imagens_retalhos/not/news_r1_c15.jpg" width="8" height="7" border="0" alt=""></td>
        <td rowspan="4" colspan="3"><img name="news_r1_c16" src="imagens_retalhos/not/news_r1_c16.jpg" width="36" height="14" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r1_c19" src="imagens_retalhos/not/news_r1_c19.jpg" width="27" height="7" border="0" alt=""></td>
        <td rowspan="4" colspan="2"><img name="news_r1_c20" src="imagens_retalhos/not/news_r1_c20.jpg" width="29" height="14" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r1_c22" src="imagens_retalhos/not/news_r1_c22.jpg" width="17" height="7" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r1_c23" src="imagens_retalhos/not/news_r1_c23.jpg" width="20" height="14" border="0" alt=""></td>
        <td rowspan="2" colspan="3"><img name="news_r1_c24" src="imagens_retalhos/not/news_r1_c24.jpg" width="36" height="7" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r1_c27" src="imagens_retalhos/not/news_r1_c27.jpg" width="11" height="14" border="0" alt=""></td>
        <td rowspan="2" colspan="2"><img name="news_r1_c28" src="imagens_retalhos/not/news_r1_c28.jpg" width="18" height="7" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r1_c30" src="imagens_retalhos/not/news_r1_c30.jpg" width="10" height="14" border="0" alt=""></td>
        <td><img name="news_r1_c31" src="imagens_retalhos/not/news_r1_c31.jpg" width="11" height="1" border="0" alt=""></td>
        <td rowspan="2" colspan="4"><img name="news_r1_c32" src="imagens_retalhos/not/news_r1_c32.jpg" width="58" height="7" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="1" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="news_r2_c31" src="imagens_retalhos/not/news_r2_c31.jpg" width="11" height="13" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="news_r3_c11" src="imagens_retalhos/not/news_r3_c11.jpg" width="13" height="7" border="0" alt=""></td>
        <td colspan="2"><img name="news_r3_c12" src="imagens_retalhos/not/news_r3_c12.jpg" width="27" height="1" border="0" alt=""></td>
        <td rowspan="2" colspan="2"><img name="news_r3_c14" src="imagens_retalhos/not/news_r3_c14.jpg" width="14" height="7" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r3_c19" src="imagens_retalhos/not/news_r3_c19.jpg" width="27" height="7" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r3_c22" src="imagens_retalhos/not/news_r3_c22.jpg" width="17" height="7" border="0" alt=""></td>
        <td rowspan="2" colspan="3"><img name="news_r3_c24" src="imagens_retalhos/not/news_r3_c24.jpg" width="36" height="7" border="0" alt=""></td>
        <td rowspan="2" colspan="2"><img name="news_r3_c28" src="imagens_retalhos/not/news_r3_c28.jpg" width="18" height="7" border="0" alt=""></td>
        <td colspan="4"><img name="news_r3_c32" src="imagens_retalhos/not/news_r3_c32.jpg" width="58" height="1" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="1" border="0" alt=""></td>
      </tr>
      <tr>
        <td colspan="2"><img name="news_r4_c12" src="imagens_retalhos/not/news_r4_c12.jpg" width="27" height="6" border="0" alt=""></td>
        <td colspan="4"><img name="news_r4_c32" src="imagens_retalhos/not/news_r4_c32.jpg" width="58" height="6" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img name="news_r5_c5" src="imagens_retalhos/not/news_r5_c5.jpg" width="78" height="15" border="0" alt=""></td>
        <td rowspan="4" colspan="4"><img name="news_r5_c6" src="imagens_retalhos/not/news_r5_c6.jpg" width="28" height="50" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r5_c11" src="imagens_retalhos/not/news_r5_c11.jpg" width="13" height="33" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r5_c12" src="imagens_retalhos/not/news_r5_c12.jpg" width="6" height="50" border="0" alt=""></td>
        <td rowspan="4" colspan="22"><div align="center">Anuncie aqui!</div></td>
        <td rowspan="4"><img name="news_r5_c35" src="imagens_retalhos/not/news_r5_c35.jpg" width="8" height="50" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="15" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="news_r6_c5" src="imagens_retalhos/not/news_r6_c5.jpg" width="78" height="35" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="18" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="6"><img name="news_r7_c11" src="imagens_retalhos/not/news_r7_c11.jpg" width="13" height="33" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="10" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img name="news_r8_c10" src="imagens_retalhos/not/news_r8_c10.jpg" width="15" height="7" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="7" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="news_r9_c3" src="imagens_retalhos/not/news_r9_c3.jpg" width="9" height="12" border="0" alt=""></td>
        <td rowspan="4" colspan="3"><img name="news_r9_c4" src="imagens_retalhos/not/news_r9_c4.jpg" width="93" height="16" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r9_c7" src="imagens_retalhos/not/news_r9_c7.jpg" width="10" height="16" border="0" alt=""></td>
        <td rowspan="4" colspan="3"><img name="news_r9_c8" src="imagens_retalhos/not/news_r9_c8.jpg" width="27" height="16" border="0" alt=""></td>
        <td rowspan="4" colspan="2"><img name="news_r9_c12" src="imagens_retalhos/not/news_r9_c12.jpg" width="27" height="16" border="0" alt=""></td>
        <td colspan="2"><img name="news_r9_c14" src="imagens_retalhos/not/news_r9_c14.jpg" width="14" height="6" border="0" alt=""></td>
        <td colspan="2"><img name="news_r9_c16" src="imagens_retalhos/not/news_r9_c16.jpg" width="29" height="6" border="0" alt=""></td>
        <td colspan="2"><img name="news_r9_c18" src="imagens_retalhos/not/news_r9_c18.jpg" width="34" height="6" border="0" alt=""></td>
        <td colspan="2"><img name="news_r9_c20" src="imagens_retalhos/not/news_r9_c20.jpg" width="29" height="6" border="0" alt=""></td>
        <td rowspan="4"><img name="news_r9_c22" src="imagens_retalhos/not/news_r9_c22.jpg" width="17" height="16" border="0" alt=""></td>
        <td rowspan="4" colspan="4"><img name="news_r9_c23" src="imagens_retalhos/not/news_r9_c23.jpg" width="56" height="16" border="0" alt=""></td>
        <td rowspan="4" colspan="4"><img name="news_r9_c27" src="imagens_retalhos/not/news_r9_c27.jpg" width="39" height="16" border="0" alt=""></td>
        <td rowspan="2" colspan="2"><img name="news_r9_c31" src="imagens_retalhos/not/news_r9_c31.jpg" width="24" height="12" border="0" alt=""></td>
        <td rowspan="3" colspan="3"><img name="news_r9_c33" src="imagens_retalhos/not/news_r9_c33.jpg" width="45" height="13" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="3" colspan="3"><img name="news_r10_c14" src="imagens_retalhos/not/news_r10_c14.jpg" width="22" height="10" border="0" alt=""></td>
        <td rowspan="3"><img name="news_r10_c17" src="imagens_retalhos/not/news_r10_c17.jpg" width="21" height="10" border="0" alt=""></td>
        <td rowspan="3"><img name="news_r10_c18" src="imagens_retalhos/not/news_r10_c18.jpg" width="7" height="10" border="0" alt=""></td>
        <td colspan="2"><img name="news_r10_c19" src="imagens_retalhos/not/news_r10_c19.jpg" width="33" height="6" border="0" alt=""></td>
        <td rowspan="3"><img name="news_r10_c21" src="imagens_retalhos/not/news_r10_c21.jpg" width="23" height="10" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="news_r11_c3" src="imagens_retalhos/not/news_r11_c3.jpg" width="9" height="4" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r11_c19" src="imagens_retalhos/not/news_r11_c19.jpg" width="27" height="4" border="0" alt=""></td>
        <td rowspan="2"><img name="news_r11_c20" src="imagens_retalhos/not/news_r11_c20.jpg" width="6" height="4" border="0" alt=""></td>
        <td rowspan="2" colspan="2"><img name="news_r11_c31" src="imagens_retalhos/not/news_r11_c31.jpg" width="24" height="4" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="1" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img name="news_r12_c33" src="imagens_retalhos/not/news_r12_c33.jpg" width="20" height="3" border="0" alt=""></td>
        <td colspan="2"><img name="news_r12_c34" src="imagens_retalhos/not/news_r12_c34.jpg" width="25" height="3" border="0" alt=""></td>
        <td><img src="imagens_retalhos/not/spacer.gif" width="1" height="3" border="0" alt=""></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td height="127" align="center" valign="middle"><table width="397" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="397" align="center" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td align="center" valign="middle"><span class="style7"><img src="fotos/<%=(Rs_nov.Fields.Item("foto").Value)%>" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></td>
      </tr>
      <tr>
        <td align="center"> <span class="style12"></span></td>
      </tr>
      <tr>
        <td align="center"><p class="style12"><%=(Rs_nov.Fields.Item("materia").Value)%></p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p>
          <p class="style12">&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFCC00"><table width="492" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <th width="237" align="left" class="style9" scope="col"> ItaguaiOnline.com.br 2005 </th>
        <th width="255" align="center" class="style9" scope="col"><div align="center"></div>          <table width="226" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th width="85" align="right" scope="col"><div align="center">Criado por : </div></th>
              <th width="155" scope="col"><table width="155" height="15" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <th width="24" height="15" bgcolor="#CC0000" scope="col">&nbsp;</th>
                    <th width="131" height="20" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><span class="style13">XpressionDesign.com.br</span></th>
                  </tr>
              </table></th>
            </tr>
        </table></th>
      </tr>
    </table>    </td>
  </tr>
</table>
</body>
</html>
<%
Rs_nov.Close()
Set Rs_nov = Nothing
%>
