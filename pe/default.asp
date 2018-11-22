<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<script>

// KIUCHI IMOBILIARIA SUA MELHOR OPÇÃO!!!

// ==============================
// Set the following variables...
// ==============================

// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 4000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 3;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

// ESPECIFIQUE SUAS IMAGENS NOS NOMES ABAIXO
// Specify the image files...
// To add more images, just continue
// the pattern, adding to the array below.
// To use fewer images, remove lines
// starting at the end of the Picture array.
// Caution: The number of Pictures *must*
// equal the number of Captions!

Picture[1]  = 'imagens/fotos/slide/01.jpg';
Picture[2]  = 'imagens/fotos/slide/02.jpg';
Picture[3]  = 'imagens/fotos/slide/03.jpg';

var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}

</script>
<head>
<title>Hotel Pousada Esmeralda - Itatiaia - RJ</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #59504B;
}
.fonte_color {
	color: #EADDCD;
	font-weight: lighter;
}
.style1 {
	color: #FFFFFF;
	font-size: 10px;
}
.brd_menu {	border:6px solid #ffffff;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style2 {font-size: 12px}
.style3 {
	color: #666666;
	font-size: 9px;
}
.style5 {
	font-size: 10px;
	color: #806E5A;
	font-weight: bold;
}
.style7 {color: #FFFFFF; font-size: 11px; }
-->
</style>
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
</script>
</head>

<body>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" valign="middle" bgcolor="#403B37" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr align="center" valign="middle">
        <th width="51%" height="412" valign="top" scope="col"><table width="95%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th align="center" valign="middle" scope="col"><img src="imagens/logo.jpg" width="100" height="88"></th>
          </tr>
          <tr>
            <td align="center">
                <script>runSlideShow()</script></td>
          </tr>
          <tr>
            <td align="center" valign="top"><img src="imagens/nome.jpg" width="360" height="50"><br>              <img src="imagens/barra.jpg" width="279" height="8"></td>
          </tr>
        </table>
          <table width="95%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">P&aacute;gina Principal</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">O Hotel </strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Chal&eacute;s</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Lazer - Passeios </strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Tarif&aacute;rio</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Promo&ccedil;&otilde;es</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Reservas</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Lua-de-Mel</strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="75%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                  <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Como Chegar </strong></th>
                </tr>
                <tr align="left" valign="top">
                  <td height="5" colspan="2" class="fonte_color style3">------------------------------------------------------------------------------------------</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="middle">&nbsp;</td>
            </tr>
          </table>          </th>
        <th width="49%" rowspan="2" valign="top" scope="col"><p>&nbsp;</p>
        <table width="95%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
          <tr>
            <th height="200" align="center" valign="middle" bgcolor="#EADDCD" scope="col"><table width="98%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="col"><div align="left">
                    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th align="left" scope="col"><img src="imagens/o_hotel.jpg" width="143" height="25"></th>
                      </tr>
                      <tr>
                        <td height="77"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <th width="39%" height="84" scope="col"><img src="imagens/principal.jpg" width="117" height="77"></th>
                              <th width="61%" scope="col">&nbsp;</th>
                            </tr>
                          </table>                          </td>
                      </tr>
                    </table>
                  </div></th>
                </tr>
                <tr>
                  <td align="center" bgcolor="#EADDCD"><img src="imagens/barra_clara.jpg" width="309" height="5"></td>
                </tr>
                <tr>
                  <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th align="left" scope="col"><img src="imagens/galeria.jpg" width="143" height="25"></th>
                    </tr>
                    <tr>
                      <td><table height="121"  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <th width="110" height="98" align="center" valign="middle" scope="col"><img src="imagens/fotos/01.jpg" width="102" height="98" border="0" usemap="#Map"></th>
                          <th width="110" align="center" valign="middle" scope="col"><img src="imagens/fotos/02.jpg" width="102" height="98" border="0" usemap="#Map2"></th>
                          <th width="110" align="center" valign="middle" scope="col"><img src="imagens/fotos/03.jpg" width="102" height="98" border="0" usemap="#Map3"></th>
                        </tr>
                        <tr align="center" valign="middle">
                          <th height="20" colspan="3" class="fonte_color  style5" scope="col">Veja todas as fotos da Galeria </th>
                          </tr>
                      </table>                        </td>
                    </tr>
                  </table></td>
                </tr>
            </table></th>
          </tr>
        </table>          
        <br>
        <table width="95%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" valign="middle" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="col"><table width="95%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="5%" height="20" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                      <th width="95%" align="left" scope="col"><strong class="fonte_color style2">Promo&ccedil;&otilde;es</strong></th>
                    </tr>
                    <tr>
                      <th colspan="2" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr align="left" valign="top">
                          <td width="44%" height="5" class="fonte_color style3"><img src="imagens/promo.jpg" width="138" height="86"></td>
                          <td width="56%" height="5" class="fonte_color style3"> <br>
                              <span class="style7">Clique aqui e saiba mais sobre as promo&ccedil;&otilde;es!</span> </td>
                        </tr>
                      </table></th>
                      </tr>
                  </table></th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <td align="center" valign="middle"><img src="imagens/barra.jpg" width="279" height="8"></td>
            </tr>
            <tr>
              <td height="156" align="center" valign="middle"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th height="135" scope="col"><table width="95%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="6%" scope="col"><img src="imagens/marcador.jpg" width="10" height="13"></th>
                      <th width="94%" align="left" scope="col"><strong class="fonte_color style2">Nossa Localiza&ccedil;&atilde;o </strong></th>
                    </tr>
                    <tr align="center" valign="middle">
                      <td height="114" colspan="2" class="fonte_color style3"><table width="322" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th width="132" scope="col"><table width="120" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                                <tr>
                                  <th width="120" scope="col"><img src="imagens/mapa.jpg" width="138" height="86"></th>
                                </tr>
                            </table></th>
                            <th width="167" align="center" valign="middle" class="style1" scope="col">Localizada no Parque Nacional do Itatiaia, em uma &aacute;rea com muito verde,  tranquilidade e conforto.<br>
                              Clique aqui e saiba mais! </th>
                          </tr>
                      </table></td>
                    </tr>
                  </table></th>
                </tr>
              </table></td>
            </tr>
          </table>                </th>
      </tr>
      <tr align="center" valign="middle">
        <td height="242" align="center" valign="top"><table width="92%" cellpadding="0" cellspacing="0" bordercolor="#EADDCD">
          <tr>
            <th height="221" scope="col"><img src=imagens/fotos/slide/01.jpg name=PictureBox width=330 height=200 class="brd_menu">
                <script>runSlideShow()</script></th>
          </tr>
        </table>
        </td>
        </tr>
      <tr align="center" valign="middle">
        <td colspan="2">&nbsp;</td>
        </tr>
    </table></th>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="29,76,69,86" href="#" onClick="openPictureWindow_Fever('undefined','imagens/fotos/slide/01.jpg','330','200','fotos','200','100')">
</map>
<map name="Map2">
  <area shape="rect" coords="30,75,70,85" href="#" onClick="openPictureWindow_Fever('jpg','imagens/fotos/restaurante01.jpg','396','257','fotos','','')">
</map>
<map name="Map3">
  <area shape="rect" coords="31,76,68,85" href="#" onClick="openPictureWindow_Fever('jpg','imagens/fotos/restaurante02.jpg','347','230','fotos','','')">
</map>
</body>
</html>
