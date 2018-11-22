<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$maxRows_fotos = 5;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'gatas' ORDER BY id_foto DESC";
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>________________ SAQUA BLOCO 2007 ________________________</title>
<link href="saquabloco.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet"  href="leightbox/css/screen2.css" type="text/css" media="screen,projection">

	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>	
	<script src="litbox/js/effects.js" type="text/javascript"></script>	
	
	<!--  Scripts para abrir paginas na ligthbox	-->	
	
	<script src="leightbox/scripts/lightbox2.js" type="text/javascript"></script>
	<script src="leightbox/scripts/prototype2.js" type="text/javascript"></script>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.borda_foto {	border: 2px solid #FFFFFF;
}
-->
</style></head>

<body>
<table width="628" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_lado_baixo"> <!----------- Divs COMPONENTES --------------->
 
 
 <div id="componentes" class="leightbox">
 	<p class="footer">
	<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>	
		<p>
			<iframe src="componentes.htm" scrolling="no" name="coments" width="380" height="200" frameborder="no" id="coments"></iframe>
	</p>
	<p class="footer">
	<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
</div>
 
  <!----------- Div ENREDO --------------->
  
  <div id="enredo" class="leightbox">
 	<p class="footer">
	<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>	
		<p>
	<h1>Curta sem moderação</h1>
Por: Tiago Bravo

<br />
<br />

Vamos botar fogo na cidade<br />

Passar felicidade<br />

Saqua bloco vem aí<br />
<br />
<br />


Vamos injetar samba na veia<br />

Vem com agente e incendeia<br />

Ninguém vai resistir<br />
<br />


Não vamos pensar na quarta-feira<br />

Entra aí na brincadeira<br />

“Tamo” aqui pra curtir<br />
<br />
<br />


[Beba beba não se acanhe<br />

Só não beba até cair] (Bis)<br />
<br /><br />



[Saqua Bloco surgiu<br />

Seu espaço dominou<br />

Pra conseguir basta acreditar<br />
<br />


É o clamor do povo<br />

Ano q vem tem de novo<br />

Chegou pra ficar] (2º)<br />
<br />


[A gente bebe<br />

De cerveja à vinagre<br />

E quando vê mulher<br />

Fica igual “Biguá” no bagre] (Refrão)<br />
<br />

	</p>
	<p class="footer">
		<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
</div>
 
 <!----------- Div ENSAIOS --------------->
  
  <div id="ensaios" class="leightbox">
 	<p class="footer">
	<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
	<h1>Ensaios</h1>	
		<p>
			Todas as Sextas-Feira <br />
Rua XXXX XXXX	</p><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br /><br />
<br />



	<p class="footer">
	<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
</div>
 

 
 <!----------- Div CONTATO --------------->
  
  <div id="contato" class="leightbox">
 	<p class="footer">
		<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
	<h1>Contato</h1>	
		<p class="negrito">
	MSN: Saquabloco@hotmail.com<br />
	Tel: (22) 2651 xxxx
	
	
	
	<br />
<br />

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
	</p>
	<p class="footer">
		<a href="#" class="lbAction" rel="deactivate">Fechar Janela</a>	</p>
</div>
 
    <!----------- Fim das Divs com os Conteudos --------------->
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fundo_menu.jpg" class="borda_baixo">
      <tr>
        
		<td width="32%"><img src="img/2007.jpg" alt="Saqua Bloco 2007" width="200" height="38" /></td>
		
        <td width="19%"><a href="componentes" rel="componentes" class="lbOn" ><img src="img/componentes.jpg" alt="Componentes" width="116" height="38" border="0" /></a></td>
		
		
        <td width="11%"><a href="enredo" rel="enredo" class="lbOn" ><img src="img/enredo.jpg" alt="Enredo" width="67" height="38" border="0" /></a></td>
		
		
        <td width="13%" align="center"><a href="ensaios" rel="ensaios" class="lbOn" ><img src="img/ensaios.jpg" alt="Ensaios" width="69" height="38" border="0" /></a></td>
		
		<td width="10%"><img src="img/fotos.jpg" alt="Fotos" width="61" height="38" border="0" /></td>
		
        <td width="14%"><a href="contato" rel="contato" class="lbOn" ><img src="img/contato.jpg" alt="Contato" width="84" height="38" border="0" /></td>
		
		
        <td width="1%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="391"><img src="img/logo.jpg" alt="SaquaBloco" width="388" height="330" class="borda_ladodir_baixo" /></td>
    <td width="231" align="center" valign="top" bgcolor="#0076BC"><p><br />
        <a href="http://www.orkut.com/Community.aspx?cmm=19214451" target="_blank"><img src="img/orkut.jpg" alt="orkut" width="216" height="61" border="0" class="borda_foto" /></a><br />
          <br />
    <img src="img/camisass.jpg" alt="Compre a Camisa!" width="216" height="61" class="borda_foto" /><br />
    <br />
    <img src="img/ensaio.jpg" alt="Ensaios!" width="216" height="61" class="borda_foto" /><br />
    <br />
    <img src="img/galeria_fotos.jpg" alt="Galeria de Fotos" width="216" height="61" class="borda_foto" />	</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0076BC" class="borda_cima_baixo">
      <tr>
        <td width="14%"><a href="img/logo.jpg"  title="Teste" rel="lightbox"><img src="img/foto.jpg"  alt="Fotos" width="116" height="89" border="0" /></a></td>
        <td width="86%" align="center" valign="middle"><table border="0" cellpadding="2">
          <tr>
            <?php
  do { // horizontal looper version 3
?>
            <td><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{fotos.arquivo}");?>" rel="lightbox[<?php echo $row_fotos['galeria']; ?>]" title="<?php echo $row_fotos['descricao']; ?> - Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{fotos.arquivo}", 90, 68, false); ?>" border="0" class="borda_foto" /></a> </td>
            <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
          </tr>
        </table>          <a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{fotos.arquivo}");?>" rel="lightbox[<?php echo $row_fotos['galeria']; ?>]" title="<?php echo $row_fotos['descricao']; ?> - Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?>"></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="right" bgcolor="#FFFFFF"><img src="img/victor.jpg" alt="Desenvolvido por Victor Caetano" width="196" height="26" /></td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($fotos);
?>