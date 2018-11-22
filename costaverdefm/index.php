<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_promo = "SELECT * FROM promo ORDER BY id DESC";
$promo = mysql_query($query_promo, $CostaverdeFM) or die(mysql_error());
$row_promo = mysql_fetch_assoc($promo);
$totalRows_promo = mysql_num_rows($promo);

$maxRows_top = 6;
$pageNum_top = 0;
if (isset($_GET['pageNum_top'])) {
  $pageNum_top = $_GET['pageNum_top'];
}
$startRow_top = $pageNum_top * $maxRows_top;

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_top = "SELECT * FROM top ORDER BY id ASC";
$query_limit_top = sprintf("%s LIMIT %d, %d", $query_top, $startRow_top, $maxRows_top);
$top = mysql_query($query_limit_top, $CostaverdeFM) or die(mysql_error());
$row_top = mysql_fetch_assoc($top);

if (isset($_GET['totalRows_top'])) {
  $totalRows_top = $_GET['totalRows_top'];
} else {
  $all_top = mysql_query($query_top);
  $totalRows_top = mysql_num_rows($all_top);
}
$totalPages_top = ceil($totalRows_top/$maxRows_top)-1;

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC LIMIT 3 OFFSET 3";
$noticias = mysql_query($query_noticias, $CostaverdeFM) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_galerias = "SELECT * FROM galeria ORDER BY id DESC";
$galerias = mysql_query($query_galerias, $CostaverdeFM) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_publicidade = "SELECT * FROM anuncios ORDER BY id ASC";
$publicidade = mysql_query($query_publicidade, $CostaverdeFM) or die(mysql_error());
$row_publicidade = mysql_fetch_assoc($publicidade);
$totalRows_publicidade = mysql_num_rows($publicidade);

$maxRows_recados = 3;
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

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_ligado = "SELECT * FROM ligado ORDER BY id DESC";
$ligado = mysql_query($query_ligado, $CostaverdeFM) or die(mysql_error());
$row_ligado = mysql_fetch_assoc($ligado);
$totalRows_ligado = mysql_num_rows($ligado);


  //conectando ao mysql
  $conn = @mysql_connect("localhost", "saquabb_cvfm","cvfm");  
  $db   = @mysql_select_db("saquabb_costaverde", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `noticias` ORDER BY `id` DESC Limit 3";

  //Executando a instrução sql
  $sql  = @mysql_query($sql);

  //Pegando o numero de registros
  $rst = mysql_num_rows($sql);

  //Se tiver algum registro
  if($rst > 0) {

        //Abre/cria o arquivo tickers.xml com permissão para escrever
    $xml = fopen("tickers.xml", "w");

    //Escreve o cabeçalho e o primeiro nó do xml
    fwrite($xml, "\r\n");
    fwrite($xml, "<tickers>\r\n");

    //Para cada registro que tiver
    for($i=0; $i<$rst; $i++) {

      //Pegamos o valor de cada registro
      $titulo = utf8_encode(mysql_result($sql,$i,"titulo"));
      $data = utf8_encode(mysql_result($sql,$i,"data"));
      $imagem = utf8_encode(mysql_result($sql,$i,"imagem"));
      $id = utf8_encode(mysql_result($sql,$i,"id"));

         //Guardamos na variavel $conteudo as tags e os valores do xml
         $conteudo = "<ticker>\r\n";
         $conteudo .= "<titulo>$titulo</titulo>\r\n";
         $conteudo .= "<coluna>$coluna</coluna>\r\n";
         $conteudo .= "<data>$data</data>\r\n";
         $conteudo .= "<imagem>fotos/$imagem</imagem>\r\n";
         $conteudo .= "<link>noticia.php?id=$id</link>\r\n";
         $conteudo .= "</ticker>\r\n";

      //Escrevendo no tickers.xml
      fwrite($xml, $conteudo);
    }

    //Finalizando com a última tag
    fwrite($xml, "</tickers>");
    
    //Fechando o arquivo
    fclose($xml);    

  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"/><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" --> 
<meta name="author" content="Victor Caetano - saquabb@hotmail.com" />
<meta name="description" content="Site da Rádio Costa Verde Fm - Rio de Janeiro - Frequência: 91,7mhz FM" />
<meta name="keywords" content="radio online itaguai itaguaí rio de janeiro fm pagode axé funk musica música mp3 letras top 10 brasil brasileira promoção promocao festa fotos agito noite night" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&Aacute;DIO COSTA VERDE FM - A R&Aacute;DIO QUE TEM A CARA DO RIO - 91,7mhz</title>
<!-- InstanceEndEditable -->
<link href="css/css.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
<!-- InstanceEndEditable -->
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="45%" height="562" align="center" valign="top"><table width="47%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','320','height','220','class','borda_preta_1px','title','Destaques','src','flash/destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/destaque' ); //end AC code
                      </script>
                              <noscript>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="320" height="220" class="borda_preta_1px" title="Destaques">
                                <param name="movie" value="flash/destaque.swf" />
                                <param name="quality" value="high" />
                                <embed src="flash/destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="320" height="220"></embed>
                              </object>
                              </noscript>                            </td>
                          </tr>
                          <tr>
                            <td align="center"><?php do { ?>
                                <table width="100%" border="0" cellpadding="2" class="borda_pont_preta_baixo">
                                  <tr>
                                    <td width="18%" align="left" valign="top"><a href="noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{noticias.imagem}", 50, 35, false); ?>" border="0" class="borda_preta_1px" /></a></td>
                                    <td width="82%" align="left" valign="top" class="top_cantor"><a href="noticia.php?id=<?php echo $row_noticias['id']; ?>" class="top_cantor"><?php echo $row_noticias['titulo']; ?></a><br />
                                    <span class="top_musica"><?php echo $row_noticias['data']; ?></span></td>
                                  </tr>
                                </table>
                                    <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="2" class="borda_verde_1px" id="link">
                              <tr>
                                <th align="center" scope="col"><a href="noticias.php" class="top_cantor">+ Not&iacute;cias </a></th>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="118" align="center" valign="top"><table width="320" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" class="fonte11px_branca_negrito"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                                  <tr>
                                    <th scope="col">Promo&ccedil;&otilde;es</th>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><?php do { ?>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="borda_pont_preta_botton">
                                      <tr>
                                        <td width="12%" height="38" align="left"><a href="promocao.php?id=<?php echo $row_promo['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{promo.imagem}", 60, 40, false); ?>" alt="<?php echo $row_promo['titulo']; ?>" border="0" class="borda_preta_1px" /></a></td>
                                        <td width="88%" align="left" valign="top"><a href="promocao.php?id=<?php echo $row_promo['id']; ?>" class="top_cantor"><?php echo $row_promo['nome']; ?></a><br />                                          <span class="top_musica"><?php echo $row_promo['data']; ?></span><br /></td>
                                      </tr>
                                    </table>
                                  <?php } while ($row_promo = mysql_fetch_assoc($promo)); ?>
                                  <br /></td>
                              </tr>
                              <tr>
                                <td height="26" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="2" bordercolor="#006600" class="borda_verde_1px" id="link">
                                  <tr>
                                    <th scope="col"><a href="promocoes.php" class="top_cantor">+ Promo&ccedil;&otilde;es </a></th>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="118" align="center" valign="top"><table width="320" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="fonte11px_branca_negrito"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                                  <tr>
                                    <th scope="col">Galerias de Fotos </th>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><?php do { ?>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="borda_pont_preta_botton">
                                      <tr>
                                        <td width="12%" height="38" align="left" valign="middle"><a href="galeria.php?id=<?php echo $row_galerias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{galerias.imagem}", 60, 40, false); ?>" alt="<?php echo $row_galerias['nome']; ?>" border="0" class="borda_preta_1px" /></a></td>
                                        <td width="88%" align="left" valign="top"><span class="top_cantor"><a href="galeria.php?id=<?php echo $row_galerias['id']; ?>" class="top_cantor"><?php echo $row_galerias['nome']; ?></a></span><br />
                                          <span class="top_musica"></span><span class="top_musica"><?php echo $row_galerias['data']; ?></span><br /></td>
                                      </tr>
                                    </table>
                                  <?php } while ($row_galerias = mysql_fetch_assoc($galerias)); ?>
                                  <br /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="borda_verde_1px" id="link">
                                  <tr>
                                    <th scope="col"><a href="galerias.php" class="top_cantor">+Galerias</a></th>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              
                            </table></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                      <td width="26%" align="left" valign="top"><table width="66%" border="0" cellspacing="0" cellpadding="2">
                          
                          <tr>
                            <td><table width="190" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                                  <tr>
                                    <th scope="col">Fique Ligado </th>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                      <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tr>
                                          <td colspan="2" align="left" valign="top"><a href="javascript:MM_openBrWindow('chat','','width=780,height=600')"></a></map>
                                            <span class="top_cantor">
											<?php echo $row_ligado['titulo']; ?></span></td>
                                        </tr>
                                        <tr>
                                          <td width="33%" align="center" valign="top"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{ligado.imagem}", 60, 42, false); ?>" border="0" class="borda_preta_1px" /></td>
                                          <td width="67%" align="left" valign="top" class="top_musica"><a href="verligado.php?id=<?php echo $row_ligado['id']; ?>" class="top_musica"><?php echo substr ($row_ligado['descricao'] ,0,70).""; ?></a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tr>
                                          <td width="33%" rowspan="2" align="center" valign="top"><a href="javascript:MM_openBrWindow('chat','','width=780,height=600')"><img src="img/caht.jpg" alt="Entrar No Chat" width="60" height="42" border="0"  class="borda_preta_1px" /></a>
                                              </td>
                                          <td width="67%" align="left" valign="top" class="top_cantor">Chat Online!</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top" class="top_musica"><a href="javascript:MM_openBrWindow('chat','','width=780,height=600')" class="top_musica">Entre no Bate-Papo e converse com a galera!</a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="20"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                                        <tr>
                                          <th scope="col">Recados</th>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  </table>                                  </td>
                              </tr>
                              <tr>
                                <td height="14" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <th align="center" valign="top" scope="col"><?php do { ?>
                                          <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pont_preta_botton">
                                            <tr>
                                              <th align="left" valign="middle" scope="col">De: <span class="top_musica"><?php echo $row_recados['de']; ?></span></th>
                                            </tr>
                                            <tr>
                                              <th align="left" valign="middle" scope="row">Para: <span class="top_musica"><?php echo $row_recados['para']; ?></span></th>
                                            </tr>
                                            <tr>
                                              <th align="left" valign="middle" scope="row">Recado:<span class="top_musica"> <?php echo $row_recados['comentario']; ?></span></th>
                                            </tr>
                                            </table>
                                          <?php } while ($row_recados = mysql_fetch_assoc($recados)); ?></th>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="34" align="center" valign="bottom"><table width="80%" border="0" cellpadding="0" cellspacing="2" class="borda_verde_1px" id="link">
                              <tr>
                                <th scope="col"><a href="javascript:MM_openBrWindow('comentar.php','','width=400,height=400')" class="top_cantor">Deixe seu recado</a></th>
                              </tr>
                            </table>                              </td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="116"><table width="190" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <th width="190" height="19" align="left" class="fonte11px_preta_bold" scope="col"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulo_top12">
                                  <tr>
                                    <th scope="col">Top Hits </th>
                                  </tr>
                                </table></th>
                              </tr>
                              <tr>
                                <th height="54" align="center" valign="top" scope="row"> <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#FF9900">
                                    <tr>
                                      <td height="50"><?php do { ?>
                                          <table width="100%" border="0" cellpadding="4" cellspacing="0" id="top">
                                            <tr>
                                              <td width="14%" height="17" align="center" valign="middle"><span class="top_num"><?php echo $row_top['top']; ?></span></td>
                                              <td width="86%" align="left" valign="top"><p><span class="top_musica"><a href="top12.php" class="top_musica_index"><?php echo $row_top['musica']; ?><br />
                                              </a><?php echo $row_top['cantor']; ?></span></p></td>
                                            </tr>
                                          </table>
                                        <?php } while ($row_top = mysql_fetch_assoc($top)); ?></td>
                                    </tr>
                                </table></th>
                              </tr>
                              <tr>
                                <th height="14" align="center" valign="top" bgcolor="#FF9900" class="fonte11px_branca_negrito" scope="row"><a href="top12.php" class="fonte11px_branca_negrito">Ver Top Completo </a></th>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="18">&nbsp;</td>
                          </tr>
                        </table>
                      <p>&nbsp;</p></td>
                      <td width="29%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td align="center"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0" >
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
                                      <td align="center" valign="top"><a href="anuncio.php?id=<?php echo $row_publicidade['id']; ?>"></a><a href="anuncio.php?id=<?php echo $row_publicidade['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{publicidade.banner}", 200, 0, true); ?>" alt="<?php echo $row_publicidade['empresa']; ?>" border="0" class="borda_preta_1px" /></a></td>
                                    </tr>
                                  </table>
                                  <?php } while ($row_publicidade = mysql_fetch_assoc($publicidade)); ?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                      </table></td>
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


mysql_free_result($top);

mysql_free_result($noticias);

mysql_free_result($galerias);

mysql_free_result($publicidade);

mysql_free_result($recados);

mysql_free_result($ligado);

mysql_free_result($promo);
?>
