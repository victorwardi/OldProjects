<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Bradock</title>
<!-- InstanceEndEditable -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','766','height','374','src','flash/header_V8','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/header_V8' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="766" height="374">
      <param name="movie" value="Templates/flash/header_V8.swf" />
      <param name="quality" value="high" />
      <embed src="Templates/flash/header_V8.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="766" height="374"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td height="19" background="imagens/recotes_02.jpg"><!-- InstanceBeginEditable name="conteudo" -->
    <link href="css/index.css" rel="stylesheet" type="text/css" />
<script src="moo.rd_1.3.1_mootools_1.2.js" type="text/javascript"></script>
<script type="text/javascript">
	window.addEvent('domready', function() {
		var imgs = $$('#thumbs img');
	
		var fx = new Fx.Cycles.fadeZoom('myElement', {
			autostart: true,
			duration:2000,
			steps: 6000,
			onAnimeIn: function(curr, next) {
				imgs.each(function(img, i) {
					if(i != this.count) img.removeClass('active');
					else img.addClass('active');
				}, this);
			}
		});
		
['1', '2', '3', '4'].each(function(el, i) {
            $('img'+el).addEvent('click', function() {
                if(fx.autostart) {
                    fx.autostart = $clear(fx.autostart);
                    fx.autostart = fx.next.periodical(fx.options.steps, fx);
                }
                fx.goTo(i);
            });
        });
	});
</script>
    
      <table width="766" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="539" rowspan="5" valign="top">	<div style="width:320px; margin:default;">

	<h2 style="color:#0099FF;">Destaques</h2>
	<div id="myElement">
		<img src="img/1.jpg" alt="1" />
		<img src="img/2.jpg" alt="2" />
		<img src="img/3.gif" alt="3" />
		<img src="img/4.jpg" alt="4" />	</div>
	
	<div id="thumbs">
		<img id="img1" class="active" src="img/1_little.jpg" alt="1" />
		<img id="img2" src="img/2_little.jpg" alt="2" />
		<img id="img3" src="img/3_little.gif" alt="3" />
		<img id="img4" src="img/4_little.jpg" alt="4" />	</div>
	
	</div>


            <p>casa em viltarur....  </p></td>
          <td width="227" height="20">aaaaaaaame          </td>
        </tr>
        <tr>
          <td height="246" align="center"><iframe src='http://selos.climatempo.com.br/selos/MostraSelo.php?CODCIDADE=323,285,291,292,321&SKIN=padrao' scrolling='no' frameborder='0' width=150 height='170' marginheight='0' marginwidth='0'></iframe></td>
        </tr>
        <tr>
          <td height="126">1</td>
        </tr>
        <tr>
          <td height="168">1</td>
        </tr>
        <tr>
          <td>1</td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="45"><img src="imagens/recotes_03.jpg" width="766" height="179" /></td>
  </tr>
  <tr>
    <td height="9"><img src="imagens/recotes_04.jpg" width="766" height="55" border="0" usemap="#Map" /></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="61,5,103,32" href="index.html" /><area shape="rect" coords="120,7,196,34" href="quem.php" />
<area shape="rect" coords="206,9,251,35" href="html antigas/vende.html" />
<area shape="rect" coords="263,8,309,37" href="html antigas/aluga.html" />
<area shape="rect" coords="318,5,412,38" href="pousada.php" />
<area shape="rect" coords="427,8,507,33" href="#" /><area shape="rect" coords="524,8,578,33" href="contato.html" />
</map></body>
<!-- InstanceEnd --></html>
