<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="hotel, hoteis, hotéis, pousada, pousadas, serra, região serrana, ferias, itatiaia, hoteis em itatiaia, hotel em itatiaia, pousadas em itatiaia, pousada em itatiaia, cachoeira, parque, parque nacional, parque nacional de itatiaia, restaurante, lago, chalets, chale, chalet, chales, hospedagem, passeios, passeio, caminhada"/>
<meta name="description" content="Site do Webdesigner Victor Caetano - Desenvolvimento de Sites, logomarcas, Flyers.">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="author" content="Victor Caetano - victor@saquabb.com.br">
<meta name="language" content="pt-br">

<title>Hotel Pousada Esmeralda - Itatiaia - RJ - Brasil</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAApkcKcx_wWl250Eh6wBXUDhS15F02ebcwpUXLsSMOe-efr7NJaBSQW5YMFS7Xw9H4uE4vCXeNpBO4Qg" type="text/javascript"></script>
<script type="text/javascript">
	
	var gdir;
	var map;
	
    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("mapa"));
        gdir = new GDirections(map, document.getElementById("directions"));
        var center = new GLatLng(-22.894995, -42.471128);
        map.setCenter(center, 17);
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var marker = new GMarker(center, {draggable: true});
		
        GEvent.addListener(marker, "click", function()
		{
			marker.closeInfoWindow();
		});

        map.addOverlay(marker);
		marker.openInfoWindowHtml( "<b>Livraria Templar</b><br>Av. Saquarema, 5245 - Centro - Bacaxá - Saquarema - RJ" );

      }
    }

    function setDirections() {
	  $('mapa').setStyle( { width: '560px', 'float': 'left' } );
	  $('directions').setStyle( { width: '250px', 'float': 'right' } );
	  var fromAddress = document.getElementById('origem').value;
      gdir.load("from: " + fromAddress + " to: Av. Saquarema, 5245, Bacaxá, Saquarema, RJ",
                { "locale": 'pt-br' });
    }



    </script>

<link href="css/estilo.css" rel="stylesheet" type="text/css" media="all" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/shadedborder.js" type="text/javascript"></script>

<script language="javascript" type="text/javascript">

     var arredondar    = RUZEE.ShadedBorder.create({ corner:8, shadow:16 });
</script>
 
<!-- lightbox -->

<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->
</head>

<body  onload="initialize()" onunload="GUnload()" >
<table width="200" height="652" border="0" align="center" cellpadding="0" cellspacing="0" id="conteudoTabela">
  <tr>
    <td height="522" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3"><img src="imagens/layout/img_01.jpg" width="240" height="522" border="0" usemap="#Map" /></td>
        <td><img src="imagens/layout/img_02.jpg" width="499" height="44" /></td>
        <td rowspan="3"><img src="imagens/layout/img_03.jpg" width="19" height="522" /></td>
      </tr>
      <tr>
        <td height="241">		
   <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','499','height','258','src','flash/intro','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','flash/intro' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="499" height="258">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="flash/intro.swf" />
      <param name="quality" value="high" />
      <embed src="flash/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="499" height="258"></embed>
    </object></noscript></strong>       </td>
      </tr>
      <tr>
        <td height="220"><img src="imagens/layout/img_05.jpg" width="499" height="220" border="0" usemap="#Map2" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="imagens/separador.png" width="748" height="7" /></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<div id="divArredondado">
	
      <table width="100%" border="0" cellpadding="2" cellspacing="6">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#E5D8B5">
            <tr>
              <td height="36" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="6" class="titulo">
                <tr>
                  <td>Como Chegar</td>
                  </tr>
                </table></td>
                </tr>
            <tr>
              <td width="59%">&nbsp;</td>
                <td width="41%" align="left" valign="top"><p class="txt"><strong>Estrada do Parque Nacional   Km 4</strong></p>
                  <p class="txt"><strong>H&oacute;spedes vindos do Rio:</strong> sa&iacute;da   no km 317 da Dutra, seguir em dire&ccedil;&atilde;o ao Parque Nacional, dobrar a 1&ordf; entrada a   esquerda antes da &aacute;rea militar, seguir em frente 1,5 km j&aacute; chegando ao Hotel   Pousada Esmeralda.<br />
                    <br />
                    <strong>H&oacute;spedes vindos de S&atilde;o Paulo:</strong> ap&oacute;s o ped&aacute;gio, sa&iacute;da no   km 318 da Dutra, fazer o retorno por baixo da rodovia e seguir em dire&ccedil;&atilde;o ao   Parque Nacional. Dobrar a 1&ordf; entrada a esquerda antes da &aacute;rea militar, seguir em   frente 1,5 km j&aacute; chegando ao Hotel Pousada   Esmeralda.<strong><br />
                    </strong></p></td>
              </tr>
            <tr>
              <td colspan="2">
              
              <div id="conteudo_interno" class="left">
      <p>A Livraria Templar est&aacute; situada &agrave; <strong>Av. Saquarema, 5245 - Centro - Bacax&aacute; - Saquarema - RJ<br />
        CEP: 28993-000</strong><br />
        <br />
        <strong>Trace sua rota</strong><br />
      <div style="vertical-align:baseline;">Origem:
        <input name="origem" type="text" class="textbox" id="origem" style="margin:0px;" />
        &nbsp;<strong><a href="javascript:setDirections();">Como Chegar</a></strong></div>
      <br />
      </p>
      <div id="directions"></div>
      <div id="mapa"></div>
    </div>
              
              
              </td>
              </tr>
            </table></td>
          </tr>
      </table>
        </div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="imagens/separador.png" width="748" height="7" /></td>
  </tr>
  
  <tr>
    <td align="center" valign="top">
    	<div id="divRodape"><table width="100%" border="0" cellspacing="6" cellpadding="0">
      <tr>
        <td><div align="center" class="txt">Hotel Pousada Esmeralda - Itatiaia - Rio de Janeiro - Brasil<br />
          Estrada do Parque Nacional Km 4,5<br />
          Telefone: [24] 3352-1643 Fax: [24] 3352-1769</div></td>
      </tr>
    </table>
    </div>      </td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="49,167,175,188" href="index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="50,193,176,216" href="hotel.php" alt="O Hotel" />
<area shape="rect" coords="53,222,173,246" href="chalets.php" alt="Chalets" />
<area shape="rect" coords="57,254,173,277" href="gastronomia.php" alt="Gastronomia" />
<area shape="rect" coords="57,282,174,304" href="lazer.php" alt="Lazer" />
<area shape="rect" coords="59,308,171,332" href="passeios.php" alt="Passeios" />
<area shape="rect" coords="59,336,174,362" href="tarifariobalcao.php" alt="Tarif&aacute;rio Balc&atilde;o" />
<area shape="rect" coords="37,369,194,395" href="tarifariopromocional.php" alt="Tarif&aacute;rio Promocional" />
<area shape="rect" coords="37,397,195,421" href="reservas.php" alt="Reservas" />
<area shape="rect" coords="37,424,189,449" href="luademel.php" alt="Lua-de-Mel" />
<area shape="rect" coords="40,456,189,480" href="faleconosco.php" alt="Fale Conosco" />
<area shape="rect" coords="50,485,187,510" href="comochegar.php" alt="Como Chegar" />
<area shape="rect" coords="18,20,222,156" href="index.php" alt="Voltar para p&aacute;gina inicial" />
</map>




<map name="Map2" id="Map2"><area shape="rect" coords="371,77,481,186" href="reservas.php" alt="Reservas Online" />
</map><script type="text/javascript">
    arredondar.render('divArredondado');
	arredondar.render('divRodape');
</script>
</body>
</html>
