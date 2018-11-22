<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_publicidade = "SELECT * FROM anuncios ORDER BY id ASC";
$publicidade = mysql_query($query_publicidade, $CostaverdeFM) or die(mysql_error());
$row_publicidade = mysql_fetch_assoc($publicidade);
$totalRows_publicidade = mysql_num_rows($publicidade);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"/><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" --> 
<meta name="author" content="Victor Caetano - saquabb@hotmail.com" />
<meta name="description" content="Site da Rádio Costa Verde Fm - Rio de Janeiro - Frequência: 91,7mhz FM" />
<meta name="keywords" content="radio online itaguai itaguaí rio de janeiro fm pagode axé funk musica música mp3 letras top 10 brasil brasileira promoção promocao festa fotos agito noite night" />
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
                      <th scope="col">Links</th>
                    </tr>
                  </table></th>
                </tr>
                <tr>
                  <th align="left" scope="row"> </th>
                </tr>
                <tr>
                  <th height="1240" align="center" valign="top" scope="row"><table width="93%" align="center" cellpadding="0" cellspacing="0" id="links">
                    <tbody>
                      <tr>
                        <td width="49%" align="left" valign="top"><p align="left"><strong><br />
                        </strong><strong class="top_num">Samba &amp; Pagode</strong></p>
                            <ul class="top_musica">
                              <li class="top_musica"><a href="http://www.arlindocruz.com.br/site.htm" target="_blank" class="top_musica">Arlindo Cruz</a> </li>
                              <li class="top_musica"><a href="http://www.atitude4.com.br/" target="_blank">Atitude   4</a> </li>
                              <li class="top_musica"><a href="http://www.bethcarvalho.com.br/" target="_blank">Beth   Carvalho</a> </li>
                              <li class="top_musica"><a href="http://www.delcioluiz.com.br" target="_blank">Delcio Luiz</a> </li>
                              <li class="top_musica"><a href="http://www.dudunobre.com.br/" target="_blank">Dudu   Nobre</a> </li>
                              <li class="top_musica"><a href="http://www.grupoexaltasamba.com.br" target="_blank">Exaltasamba</a> </li>
                              <li class="top_musica"><a href="http://www.fundodequintal.com.br/" target="_blank">Fundo de Quintal</a> </li>
                              <li class="top_musica"><a href="http://www.grupodisfarce.com.br" target="_blank">Grupo Disfarce</a> </li>
                              <li class="top_musica"><a href="http://www.gustavolins.com.br" target="_blank">Gustavo Lins</a> </li>
                              <li class="top_musica"><a href="http://www.imaginasamba.com.br/site/" target="_blank">Imaginasamba</a> </li>
                              <li class="top_musica"><a href="http://www.inimigosdahp.com.br/" target="_blank">Inimigos da HP</a> </li>
                              <li class="top_musica"><a href="http://www.jeitomoleque.com.br/" target="_blank">Jeito Moleque</a> </li>
                              <li class="top_musica"><a href="http://www.trama.com.br/leci_brandao/" target="_blank">Leci Brand&atilde;o</a> </li>
                              <li class="top_musica"><a href="http://www.martinhodavila.com.br/" target="_blank">Martinho da Vila</a> </li>
                              <li class="top_musica"><a href="http://www.molejo.com.br/" target="_blank">Molejo</a> </li>
                              <li class="top_musica"><a href="http://www.ostravessos.com.br/" target="_blank">Os   Travessos</a> </li>
                              <li class="top_musica"><a href="http://www.grupopiquenovo.com.br" target="_blank">Pique Novo</a> </li>
                              <li class="top_musica"><a href="http://www.grupopixote.com.br/" target="_blank">Pixote</a> </li>
                              <li class="top_musica"><a href="http://www.gruposorrisomaroto.com.br/" target="_blank">Sorriso Maroto</a> </li>
                              <li class="top_musica"><a href="http://www.swingesimpatia.com.br" target="_blank">Swing &amp; Simpatia</a> </li>
                              <li class="top_musica"><a href="http://www.zecapagodinho.com.br" target="_blank" class="top_musica">Zeca   Pagodinho</a> </li>
                            </ul>
                          <p align="left"><br />
                              <strong class="top_num">Ax&eacute;</strong></p>
                          <ul>
                            <!-- <li><a href="http://www.alcioneamarrom.com.br/" target="_blank" class="linkpreto">Alcione</a></li>-->
                              <li class="top_musica"><a href="http://www.araketu.com" target="_blank">Ara Ketu</a> </li>
                            <li class="top_musica"><a href="http://www.babadonovo.com/" target="_blank">Babado   Novo</a> </li>
                            <li class="top_musica"><a href="http://www.companhiadocalypso.com.br/" target="_blank">Calypso</a> </li>
                            <li class="top_musica"><a href="http://www.carlinhosbrown.com.br/" target="_blank">Carlinhos Brown</a> </li>
                            <li class="top_musica"><a href="http://www.cheiro.com.br/" target="_blank">Cheiro de   Amor</a> </li>
                            <li class="top_musica"><a href="http://www.chicletecombanana.com.br/" target="_blank">Chiclete com Banana</a> </li>
                            <li class="top_musica"><a href="http://www.danielamercury.art.br/" target="_blank">Daniela Mercury</a> </li>
                            <li class="top_musica"><a href="http://www.harmoniadosamba.art.br/" target="_blank">Harmonia do Samba</a> </li>
                            <li class="top_musica"><a href="http://www.ivetesangalo.com.br/" target="_blank">Ivete Sangalo</a> </li>
                            <li class="top_musica"><a href="http://www.jammileumanoites.com.br/" target="_blank">Jammil e Uma Noites</a> </li>
                            <li class="top_musica"><a href="http://www.netinho.com.br/" target="_blank">Netinho</a> </li>
                            <li class="top_musica"><a href="http://www.olodum.com.br/" target="_blank">Olodum</a> </li>
                            <li class="top_musica"><a href="http://www.rapazolla.com.br/" target="_blank">Rapazolla</a> </li>
                            <li class="top_musica"><a href="http://www.timbalada.com" target="_blank">Timbalada</a> </li>
                          </ul>
                          <p><strong><br />
                              <span class="top_num">Pop &amp; Rock</span></strong></p>
                          <ul>
                              <li class="top_musica"><a href="http://charliebrownjr.uol.com.br/" target="_blank">Charlie Brown Jr</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/engenheirosdohawaii/" target="_blank">Engenheiros do Hawaii </a> </li>
                            <li class="top_musica"><a href="http://www.felipedylon.com.br/" target="_blank">Felipe Dylon</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/fernandaabreu/home.htm" target="_blank">Fernanda Abreu</a> </li>
                            <li class="top_musica"><a href="http://www.gabrielopensador.com.br/" target="_blank">Gabriel, o Pensador</a> </li>
                            <li class="top_musica"><a href="http://www.jotaquest.com.br/" target="_blank">Jota   Quest</a> </li>
                            <li class="top_musica"><a href="http://www.kidabelha.com.br/" target="_blank">Kid   Abelha</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/kellykey/inicio.htm" target="_blank">Kelly Key</a> </li>
                            <li class="top_musica"><a href="http://klb.uol.com.br/" target="_blank">KLB</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/loshermanos/" target="_blank">Los Hermanos</a> </li>
                            <li class="top_musica"><a href="http://www.lukaonline.com.br/" target="_blank">Luka</a> </li>
                            <li class="top_musica"><a href="http://www.lulusantos.com.br/" target="_blank">Lulu   Santos</a> </li>
                            <li class="top_musica"><a href="http://www.marcelod2.com.br/" target="_blank">Marcelo   D2 </a> </li>
                            <li class="top_musica"><a href="http://www.margarethmenezes.com.br/" target="_blank">Margareth Menezes</a> </li>
                            <li class="top_musica"><a href="http://www.nativos.com.br/" target="_blank">Nativos</a> </li>
                            <li class="top_musica"><a href="http://www.orappa.com/" target="_blank">O Rappa</a> </li>
                            <li class="top_musica"><a href="http://www.papasdalingua.com.br" target="_blank">Papas da L&iacute;ngua</a> </li>
                            <li class="top_musica"><a href="http://www.renatorusso.com.br/" target="_blank">Renato Russo</a> </li>
                            <li class="top_musica"><a href="http://www.ritalee.com.br/" target="_blank">Rita   Lee</a> </li>
                            <li class="top_musica"><a href="http://www.roupanova.art.br/" target="_blank">Roupa   Nova</a> </li>
                            <li class="top_musica"><a href="http://sandyejunior.uol.com.br/" target="_blank">Sandy e Junior</a> </li>
                            <li class="top_musica"><a href="http://www.skank.com.br/" target="_blank">Skank</a> </li>
                            <li class="top_musica"><a href="http://www.titas.net/" target="_blank">Tit&atilde;s</a> </li>
                            <li class="top_musica"><a href="http://www.vinny.com.br/" target="_blank">Vinny</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/wanessacamargo/" target="_blank">Wanessa Camargo</a> </li>
                            <li class="top_musica"><a href="http://nxzero.uol.com.br/" target="_blank">NXZero</a> </li>
                          </ul>
                          <p><strong><br />
                              <span class="top_num">Reggae</span></strong></p>
                          <ul>
                              <li class="top_musica"><a href="http://www.adaonegro.com.br/" target="_blank">Ad&atilde;o   Negro </a> </li>
                            <li class="top_musica"><a href="http://www.armandinhoebanda.com.br/" target="_blank">Armandinho</a> </li>
                            <li class="top_musica"><a href="http://www.bandaplantaeraiz.com.br/" target="_blank">Banda Planta e Raiz </a> </li>
                            <li class="top_musica"><a href="http://www.maskavo.com.br/" target="_blank">Maskavo</a> </li>
                            <li class="top_musica"><a href="http://www.muzenza.com.br" target="_blank">Muzenza</a> </li>
                            <li class="top_musica"><a href="http://www.natiruts.com/" target="_blank">Natiruts</a> </li>
                            <li class="top_musica"><a href="http://www.ondar.com.br/" target="_blank">Onda R </a> </li>
                            <li class="top_musica"><a href="http://www2.bandapontodeequilibrio.com.br/" target="_blank">Ponto de Equil&iacute;brio</a> </li>
                            <li class="top_musica"><a href="http://www2.uol.com.br/tribodejah/" target="_blank">Tribo de Jah </a></li>
                          </ul>
                          <p>&nbsp;</p>
                          </td>
                        <td width="49%" align="left" valign="top"><p align="left"><strong><br />
                        </strong><strong class="top_num">Rom&acirc;ntico</strong></p>
                            <ul class="top_musica">
                              <li class="top_musica"><a href="http://www.alexandrepires.art.br/" target="_blank">Alexandre Pires</a> </li>
                              <li class="top_musica"><a href="http://www.caetanoveloso.com.br/" target="_blank">Caetano Veloso</a> </li>
                              <li class="top_musica"><a href="http://www.djavan.com.br/" target="_blank">Djavan</a> </li>
                              <li class="top_musica"><a href="http://www.gilbertogil.com.br/" target="_blank">Gilberto Gil </a> </li>
                              <li class="top_musica"><a href="http://www.marjorieestiano.com.br/" target="_blank">Marjorie Estiano</a> </li>
                              <li class="top_musica"><a href="http://www.sandradesa.com.br/sandradesa.htm" target="_blank">Sandra de </a><a href="http://www.sandradesa.com.br/sandradesa.htm" target="_blank">S&aacute;</a> </li>
                            </ul>
                          <p align="left"><strong><br />
                              <span class="top_num">Funk</span></strong></p>
                          <ul>
                              <li class="top_musica"><a href="http://www.bondedotigrao.com.br" target="_blank">Bonde do Tigr&atilde;o</a> </li>
                            <li class="top_musica"><a href="http://www.buchecha.com.br/" target="_blank">Buchecha</a> </li>
                            <li class="top_musica"><a href="http://www.latino.com.br/" target="_blank">Latino</a> </li>
                            <li class="top_musica"><a href="http://www.perlla.com.br/" target="_blank">Perlla</a> </li>
                            <li class="top_musica"><a href="http://www.tatiquebrabarraco.com.br/" target="_blank">Tati Quebra Barraco</a> </li>
                          </ul>
                          <p align="left"><strong><br />
                              <span class="top_num">Dj`s</span></strong></p>
                          <ul class="top_musica">
                              <li><a href="http://www.djmeme.com.br/" target="_blank">Dj   Mem&ecirc;</a> </li>
                            <li><a href="http://www.djmp4.com.br/" target="_blank">Dj Mp4</a> </li>
                            <li><a href="http://www.bigmix.com.br" target="_blank">Dj   Marlboro</a> </li>
                          </ul>
                          <p align="left"><strong><br />
                              <span class="top_num">Escolas de Samba</span></strong></p>
                          <ul class="top_musica">
                              <li><a href="http://www.beija-flor.com.br/" target="_blank">Beija-Flor</a> </li>
                            <li><a href="http://www.grescaprichososdepilares.com.br/" target="_blank">Caprichosos de Pilares</a> </li>
                            <li><a href="http://www.gresestaciodesa.com.br/" target="_blank">Est&aacute;cio de S&aacute;</a> </li>
                            <li><a href="http://www.granderio.org.br/xdefault.asp" target="_blank">Grande Rio </a> </li>
                            <li><a href="http://www.imperatrizleopoldinense.com.br/" target="_blank">Imperatriz Leopoldinense</a> </li>
                            <li><a href="http://www.imperioserrano.com/" target="_blank">Imp&eacute;rio Serrano</a> </li>
                            <li><a href="http://www.mangueira.com.br/" target="_blank">Mangueira</a> </li>
                            <li><a href="http://www.mocidadeindependente.com.br/index/" target="_blank">Mocidade de Padre Miguel</a> </li>
                            <li><a href="http://www.gresportela.com.br/site/index2.php" target="_blank">Portela</a> </li>
                            <li><a href="http://www.salgueiro.com.br/candaces/" target="_blank">Salgueiro</a> </li>
                            <li><a href="http://www.saoclemente.com.br/hpmenu.htm" target="_blank">S&atilde;o Clemente</a> </li>
                            <li><a href="http://www.gresunidosdevilaisabel.com.br" target="_blank">Vila Isabel</a> </li>
                            <li><a href="http://www.unidosdoviradouro.com.br/" target="_blank">Viradouro</a> </li>
                          </ul>
                          <p align="left"><strong><br />
                              <span class="top_num">Esportes</span></strong></p>
                          <ul class="top_musica">
                              <li><a href="http://www.doda.com.br/2005/" target="_blank">Doda</a> </li>
                            <li><a href="http://www.felipemassa.com/" target="_blank">Felipe   Massa</a> </li>
                            <li><a href="http://www.oscar14.com.br/flash/index.html" target="_blank">Oscar Schmidt</a> </li>
                            <li><a href="http://www.sandrodias.com.br/" target="_blank">Sandro   Dias</a> </li>
                            <li><a href="http://www.torben-grael.com/" target="_blank">Torben   Grael</a> </li>
                          </ul>
                          <p align="left" class="top_num"><strong><br />
                            Diversos</strong></p>
                          <ul>
                              <li class="top_musica"><a href="http://odia.terra.com.br/" target="_blank">Jornal O   Dia</a> </li>
                            <li class="top_musica"><a href="http://www.mvhp.com.br/" target="_blank">MV Portal de   Cifras</a> </li>
                            <li class="top_musica"><a href="http://www.rioaxe.com.br/" target="_blank">Rio   Ax&eacute;</a> </li>
                            <li class="top_musica"><a href="http://www.sambando.com.br/" target="_blank">Sambando.com</a> </li>
                          </ul>
                          <p align="left"><span class="top_musica"><strong></strong></span><strong><br />
                              <span class="top_num">Gravadoras</span></strong></p>
                          <ul>
                              <li class="top_musica"><a href="http://www.sonybmg.com.br/" target="_blank">Sony/BMG</a> </li>
                            <li class="top_musica"><a href="http://www.deckdisc.com.br" target="_blank">Deck   Disc</a> </li>
                            <li class="top_musica"><a href="http://www.emimusicbrasil.com.br" target="_blank">Emi   Music</a> </li>
                            <li class="top_musica"><a href="http://www.universalmusic.com.br" target="_blank">Universal</a> </li>
                            <li class="top_musica"><a href="http://www.trama.com.br" target="_blank">Trama</a> </li>
                            <li class="top_musica"><a href="http://www.warnermusic.com.br/" target="_blank">Warner Music</a> </li>
                          </ul>
                          <p><br />
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
                          </p>                          </td>
                      </tr>
                    </tbody>
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
?>
