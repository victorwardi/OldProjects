<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_publicidade = "SELECT * FROM anuncios ORDER BY id ASC";
$publicidade = mysql_query($query_publicidade, $CostaverdeFM) or die(mysql_error());
$row_publicidade = mysql_fetch_assoc($publicidade);
$totalRows_publicidade = mysql_num_rows($publicidade);

$maxRows_recados = 10;
$pageNum_recados = 0;
if (isset($_GET['pageNum_recados'])) {
  $pageNum_recados = $_GET['pageNum_recados'];
}
$startRow_recados = $pageNum_recados * $maxRows_recados;

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_recados = "SELECT * FROM comentarios WHERE aprovado = 'Sim' ORDER BY id_coment DESC";
$query_limit_recados = sprintf("%s LIMIT %d, %d", $query_recados, $startRow_recados, $maxRows_recados);
$recados = mysql_query($query_limit_recados, $CostaverdeFM) or die(mysql_error());
$row_recados = mysql_fetch_assoc($recados);

if (isset($_GET['totalRows_recados'])) {
  $totalRows_recados = $_GET['totalRows_recados'];
} else {
  $all_recados = mysql_query($query_recados);
  $totalRows_recados = mysql_num_rows($all_recados);
}
$totalPages_recados = ceil($totalRows_recados/$maxRows_recados)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"/><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" --> 
<meta name="author" content="Victor Caetano - saquabb@hotmail.com" />
<meta name="description" content="Site da R�dio Costa Verde Fm - Rio de Janeiro - Frequ�ncia: 91,7mhz FM" />
<meta name="keywords" content="radio online itaguai itagua� rio de janeiro fm pagode ax� funk musica m�sica mp3 letras top 10 brasil brasileira promo��o promocao festa fotos agito noite night" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&Aacute;DIO COSTA VERDE FM - A RADIO QUE TEM A CARA DO RIO - 91,7mhz</title>
<!-- InstanceEndEditable -->
<link href="css/css.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/js.js" type="text/javascript"></script>

<!-- Inicio Google Analytics -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-3";
urchinTracker();
</script>
<!-- Fim Google Analytics -->
</head>

<body onLoad="MM_preloadImages('img/topo_2.jpg')">
<table width="918" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <th width="918" height="85" scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="col"><script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','552','height','200','title','Costa Verde Fm','src','flash/topo','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/topo' ); //end AC code
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
    <th align="right" scope="row"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <th width="168" align="left" valign="top" bgcolor="#D7FFDD" scope="col"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" id="navigation">
          <tr>
            <td width="165"><a href="index.php" class="navText">Home</a></td>
          </tr>
          <tr>
            <td><a href="destaques.php">Destaques</a></td>
          </tr>
          <tr>
            <td width="165"><a href="javascript:MM_openBrWindow('../online','','width=398,height=190')" class="navText">R&aacute;dio Online </a></td>
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
        </table>
       </th>
        <th width="750" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <th width="73%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
                    <tr>
                      <th scope="col">Recados</th>
                    </tr>
                  </table></th>
                </tr>
                <tr>
                  <th align="left" scope="row"> </th>
                </tr>
                <tr>
                  <th align="center" valign="top" scope="row"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                      <th height="46" align="center" valign="middle" class="top_musica_index" scope="col">Aten&ccedil;&atilde;o! O site Costa Verde Fm n&atilde;o se responsabiliza pelos  coment&aacute;rios de seus usu&aacute;rios! </th>
                    </tr>
                    <tr>
                      <th scope="row"><?php do { ?>
                          <table width="100%" border="0" cellspacing="2" cellpadding="0">
                            <tr>
                              <th scope="col"><table width="95%" border="0" align="center" cellpadding="4" cellspacing="0" class="borda_pont_preta_botton">
                                <tr>
                                  <th height="17" align="left" bgcolor="#D7FFDD" scope="col"><span class="top_cantor">De:</span> <span class="top_musica"><?php echo $row_recados['de']; ?> <span class="top_cantor">Para:</span> <?php echo $row_recados['para']; ?></span></th>
                                  </tr>
                                <tr>
                                  <th scope="row"><div align="left" class="recado"><?php echo $row_recados['comentario']; ?></div></th>
                                </tr>
                              </table></th>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                            </tr>
                                                    </table>
                          <?php } while ($row_recados = mysql_fetch_assoc($recados)); ?></th>
                    </tr>
                    <tr>
                      <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="borda_verde_1px" id="link">
                          <tr>
                            <th height="14" scope="col"><a href="javascript:MM_openBrWindow('comentar.php','','width=400,height=400')">+ Clique aqui para deixar seu recado </a></th>
                          </tr>
                        </table></th>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
              <th width="27%" align="right" valign="top" scope="col"><table width="200" border="0" align="right" cellpadding="0" cellspacing="1" >
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
        <!-- InstanceEndEditable --></th>
        </tr>
    </table></th>
  </tr>
  <tr>
    <th height="35" align="center" valign="middle" bgcolor="#47BB6A" class="fonte11px_branca_negrito" scope="row"><p>R&aacute;dio Costa Verde FM - 91,7 mhz - A R&aacute;dio Que Tem A Cara do Rio <br />
        <span class="fonte11px_branca">Todos os Direitos Resevados - 2007 - </span><span class="fonte11px_branca">Desenvolvido por: </span><a href="mailto:saquabb@hotmail.com" class="fonte11px_branca_negrito">Victor Caetano e Ded&eacute; Siqueira </a></p>
    </th>
  </tr>
</table>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($publicidade);

mysql_free_result($recados);
?>