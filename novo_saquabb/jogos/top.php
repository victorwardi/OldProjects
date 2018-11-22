<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_saquabb, $saquabb);
$query_noticas = "SELECT * FROM noticias ORDER BY id DESC";
$noticas = mysql_query($query_noticas, $saquabb) or die(mysql_error());
$row_noticas = mysql_fetch_assoc($noticas);
$totalRows_noticas = mysql_num_rows($noticas);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="Baixaki Jogos_arquivos/baixakijogos.css" rel="stylesheet" type="text/css" />
<link href="Baixaki Jogos_arquivos/skin.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT src="Baixaki Jogos_arquivos/top.js" type=text/javascript></SCRIPT>
<body>
<div align="left">
<div class="sombrain" style="HEIGHT: 670px; BACKGROUND-COLOR: #151b1b">
  <div id="linhabig"><span class="titulo_branco">&nbsp;&nbsp;TOP 10 JOGOS </span><img 
id="bolinha" src="Baixaki Jogos_arquivos/b.gif" /></div>
  <div class="top_corpo">
    <div style="FONT-SIZE: 2px; HEIGHT: 5px"></div>
	
    <!-- Noticias 1 -->
	<div id="img1">    
	<center>
        <a href="#">
		<img height="200"  src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticas.imagem}", 355, 200, false); ?>" width="355" border="0" /></a>
      </center>
    </div>
    <div class="top_off" id="div1" onmouseover="over(1)">
	<div class="topoff corpadrao" id="topn1">1</div>
      <div class="top_titulo_branco">
	  <a href="http://baixakijogos.ig.com.br/pc/need-for-speed-pro-street"><?php echo $row_noticas['titulo']; ?></a></div>
      <span class="texto_cinza_12"><?php echo $row_noticas['coluna']; ?></span>	  </div>
	  
    <!-- Noticias 2 -->
	
    <div class="hide" id="img2">
      <center>
        <a href="http://baixakijogos.ig.com.br/pc/fifa-08"><img height="200" 
src="Baixaki Jogos_arquivos/1475_top.jpg" width="355" border="0" /></a>
      </center>
    </div>
    <div class="top_off" id="div2" onmouseover="over(2)">
      <div class="topoff corpadrao" id="topn2">2</div>
      <div class="top_titulo_branco"><a 
href="http://baixakijogos.ig.com.br/pc/fifa-08">FIFA 08</a></div>
      <span 
class="texto_cinza_12">pc . Esporte</span></div>
    <div class="hide" id="img3">
      <center>
        <a 
href="http://baixakijogos.ig.com.br/ps2/winning-eleven-pro-evolution-soccer-2007"><img 
height="200" src="Baixaki Jogos_arquivos/88_top.jpg" width="355" 
border="0" /></a>
      </center>
    </div>
    <div class="top_off" id="div3" onmouseover="over(3)">
      <div class="topoff corpadrao" id="topn3">3</div>
      <div class="top_titulo_branco"><a 
href="http://baixakijogos.ig.com.br/ps2/winning-eleven-pro-evolution-soccer-2007">Winning 
        Eleven: Pro Evolution Soccer 2007</a></div>
      <span class="texto_cinza_12">ps2 . Nota 
        87 . Esporte</span></div>
    <div class="hide" id="img4">
      <center>
        <a 
href="http://baixakijogos.ig.com.br/pc/the-sims-2-nightlife-vida-noturna-"><img 
height="200" src="Baixaki Jogos_arquivos/244_top.jpg" width="355" 
border="0" /></a>
      </center>
    </div>
    <div class="top_off" id="div4" onmouseover="over(4)">
      <div class="topoff corpadrao" id="topn4">4</div>
      <div class="top_titulo_branco"><a 
href="http://baixakijogos.ig.com.br/pc/the-sims-2-nightlife-vida-noturna-">The 
        Sims 2: Nightlife (Vida Noturna)</a></div>
      <span class="texto_cinza_12">pc . Nota 
        83 . Simulador</span></div>
  
 
    <div style="FONT-SIZE: 2px; HEIGHT: 5px"></div>
  </div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($noticas);
?>
