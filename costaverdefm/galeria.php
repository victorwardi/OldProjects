<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_fotos = "-1";
if (isset($_GET['id'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_fotos = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_fotos);
$fotos = mysql_query($query_fotos, $CostaverdeFM) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

$colname_galeria = "-1";
if (isset($_GET['id'])) {
  $colname_galeria = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_galeria = sprintf("SELECT * FROM galeria WHERE id = %s", $colname_galeria);
$galeria = mysql_query($query_galeria, $CostaverdeFM) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_publicidade = "SELECT * FROM anuncios ORDER BY id ASC";
$publicidade = mysql_query($query_publicidade, $CostaverdeFM) or die(mysql_error());
$row_publicidade = mysql_fetch_assoc($publicidade);
$totalRows_publicidade = mysql_num_rows($publicidade);

$colname_slideshow = "-1";
if (isset($_GET['id'])) {
  $colname_slideshow = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_slideshow = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_slideshow);
$slideshow = mysql_query($query_slideshow, $CostaverdeFM) or die(mysql_error());
$row_slideshow = mysql_fetch_assoc($slideshow);
$totalRows_slideshow = mysql_num_rows($slideshow);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="author" content="Victor Caetano - saquabb@hotmail.com" />
<meta name="description" content="Site da Rádio Costa Verde Fm - Rio de Janeiro - Frequência: 91,7mhz FM" />
<meta name="keywords" content="radio online itaguai itaguaí rio de janeiro fm pagode axé funk musica música mp3 letras top 10 brasil brasileira promoção promocao festa fotos agito noite night" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>R&Aacute;DIO COSTA VERDE FM - A RADIO QUE TEM A CARA DO RIO - 91,7mhz</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/js.js" type="text/javascript"></script>


<!--SlideShow-->

	<link href="lightbox/css/lightboxEx.css" 	type="text/css" rel="stylesheet" media="screen">
	
	<script src="lightbox/js/prototype.js" 	type="text/javascript"></script>
	<script src="lightbox/js/scriptaculous.js" 	type="text/javascript"></script>
	<script src="lightbox/js/effects.js"		type="text/javascript"></script>
	<script src="lightbox/js/Sound.js" 		type="text/javascript"></script>
	<script src="lightbox/js/lightboxEx.js" 	type="text/javascript"></script>
	
	

</head>

<body onLoad="MM_preloadImages('img/topo_2.jpg');initLightbox()">
<table width="918" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <th width="918" height="85" scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="col"><script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','552','height','200','title','Costa Verde Fm','src','flash/topo','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','flash/topo' ); //end AC code
      </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="552" height="200" title="Costa Verde Fm">
              <param name="WMode" value="Transparent">
              <param name="movie" value="flash/topo.swf" />
              <param name="quality" value="high" />
              <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="552" height="200"></embed>
            </object>
          </noscript></th>
        <th align="left" valign="top" bgcolor="#61B672" scope="col"><a href="javascript:MM_openBrWindow('../online','','width=398,height=190')" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Radio OnLine','','img/topo_2.jpg',1)"><img src="img/topo_1.jpg" name="Radio OnLine" width="365" height="200" border="0" id="Radio OnLine" /></a></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th align="right" scope="row"><table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <th width="168" align="left" valign="top" scope="col"><table width="165" border="0" align="left" cellpadding="0" cellspacing="0" id="navigation">
          <tr>
            <td width="165"><a href="../index.php" class="navText">Home</a></td>
          </tr>
          <tr>
            <td><a href="destaques.php">Destaques</a></td>
          </tr>
          <tr>
            <td width="165"><a href="javascript:MM_openBrWindow('online','','width=398,height=190')" class="navText">R&aacute;dio Online </a></td>
          </tr>
          <tr>
            <td width="165"><a href="programacao.php" class="navText">Programa&ccedil;&atilde;o</a></td>
          </tr>
          <tr>
            <td><a href="promocoes.php" class="navText">Promo&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td><a href="fiqueligado.php" class="navText">Fique Ligado</a></td>
          </tr>
          <tr>
            <td><a href="galerias.php" class="navText">Galerias de Fotos </a></td>
          </tr>
          <tr>
            <td><a href="equipe.php">Equipe</a></td>
          </tr>
          <tr>
            <td><a href="top12.php" class="navText">Top 12 </a></td>
          </tr>
          <tr>
            <td><a href="javascript:MM_openBrWindow('chat','','width=780,height=600')" class="navText">Chat</a></td>
          </tr>
          <tr>
            <td><a href="recados.php">Recados</a></td>
          </tr>
          <tr>
            <td><a href="links.php" class="navText">Links</a></td>
          </tr>
          <tr>
            <td><a href="parceiros.php" class="navText">Parceiros</a></td>
          </tr>
          <tr>
            <td><a href="contato.php" class="navText">Contato</a></td>
          </tr>
        </table></th>
        <th width="750" align="left" valign="top" scope="col">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th width="71%" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="4">
                <tr>
                  <td height="16" align="left" valign="top" class="Titulo_Not"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="titulos">
                    <tr>
                      <th scope="col">Galeria de Fotos - <?php echo $row_galeria['nome']; ?> - <?php echo $row_galeria['data']; ?></th>
                    </tr>
                  </table></td>
                </tr>
                <tr>
					<!--SlideShow-->
					
                  <td height="17" align="left" valign="top" class="titulo_noticia"><a href="<?php echo tNG_showDynamicImage("", "fotos/", "{slideshow.arquivo}");?>" rel="lightbox[slide]" slideshowwidth=-1 slideshowheight=-1  alt="SlideShow"> Exibir Fotos em SlideShow</a>
	</div>
	
	<?php do { ?>
	  <a href="<?php echo tNG_showDynamicImage("", "fotos/", "{slideshow.arquivo}");?>" rel="lightbox[slide]"></a>
	  <?php } while ($row_slideshow = mysql_fetch_assoc($slideshow)); ?> </td>
				  
				  
				  
			<!--Fim do SlideShow-->
				  
			
                </tr>
                <tr>
                  <td height="17" align="left" valign="top" class="Titulo_Not"><table border="0" align="center">
                      <tr>
                        <?php
  do { // horizontal looper version 3
?>
                        <!--  litbox -->
                        <td><a href="<?php echo tNG_showDynamicImage("", "fotos/", "{fotos.arquivo}");?>" startslideshow=false slideshowwidth=-1 slideshowheight=-1 title="<?php echo $row_fotos['descricao']; ?> - foto: <?php echo $row_fotos['fotografo']; ?>" rel="lightbox[fotos]"  ><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{fotos.arquivo}", 94, 70, false); ?>" border="0" class="borda_preta_1px" /></a></td>
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
                  </table>                   </td>
                </tr>
                <tr>
                  <td height="35" align="left" valign="top" class="Titulo_Not">&nbsp;</td>
                </tr>
                <tr>
                  <td height="2" align="left" valign="top"></td>
                </tr>
              </table></th>
              <th width="29%" align="right" valign="top" scope="col"><table width="200" border="0" align="right" cellpadding="0" cellspacing="3" >
                <tr>
                  <td height="18" align="left" valign="middle" class="fonte11px_branca_negrito"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                      <tr>
                        <th scope="col">An&uacute;ncios</th>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="55"><?php do { ?>
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="top"><a href="anuncio.php?id=<?php echo $row_publicidade['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{publicidade.banner}", 200, 0, true); ?>" alt="<?php echo $row_publicidade['empresa']; ?>" border="0" class="borda_preta_1px" /></a></td>
                        </tr>
                      </table>
                    <?php } while ($row_publicidade = mysql_fetch_assoc($publicidade)); ?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></th>
            </tr>
          </table>
       </th>
        </tr>
    </table></th>
  </tr>
  <tr>
    <th height="35" align="center" valign="middle" bgcolor="#47BB6A" class="fonte11px_branca_negrito" scope="row"><p>R&aacute;dio Costa Verde FM - 91,7 mhz - A R&aacute;dio Que Tem A Cara do Rio <br />
        <span class="fonte11px_branca">Todos os Direitos Resevados - 2007 - </span><span class="fonte11px_branca">Desenvolvido por: </span><a href="mailto:saquabb@hotmail.com" class="fonte11px_branca_negrito">Victor Caetano </a></p>
    </th>
  </tr>
</table>
</body>

</html><?php
mysql_free_result($fotos);

mysql_free_result($galeria);

mysql_free_result($publicidade);

mysql_free_result($slideshow);
?>
