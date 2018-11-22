<?php require_once('Connections/saquabb.php'); ?>
<?php require_once('geraxml.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_atletas = 15;
$pageNum_atletas = 0;
if (isset($_GET['pageNum_atletas'])) {
  $pageNum_atletas = $_GET['pageNum_atletas'];
}
$startRow_atletas = $pageNum_atletas * $maxRows_atletas;

mysql_select_db($database_saquabb, $saquabb);
$query_atletas = "SELECT * FROM perfil WHERE aprovado = 'y' ORDER BY id DESC";
$query_limit_atletas = sprintf("%s LIMIT %d, %d", $query_atletas, $startRow_atletas, $maxRows_atletas);
$atletas = mysql_query($query_limit_atletas, $saquabb) or die(mysql_error());
$row_atletas = mysql_fetch_assoc($atletas);

if (isset($_GET['totalRows_atletas'])) {
  $totalRows_atletas = $_GET['totalRows_atletas'];
} else {
  $all_atletas = mysql_query($query_atletas);
  $totalRows_atletas = mysql_num_rows($all_atletas);
}
$totalPages_atletas = ceil($totalRows_atletas/$maxRows_atletas)-1;

$maxRows_galeria = 3;
$pageNum_galeria = 0;
if (isset($_GET['pageNum_galeria'])) {
  $pageNum_galeria = $_GET['pageNum_galeria'];
}
$startRow_galeria = $pageNum_galeria * $maxRows_galeria;

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM galeria ORDER BY id DESC";
$query_limit_galeria = sprintf("%s LIMIT %d, %d", $query_galeria, $startRow_galeria, $maxRows_galeria);
$galeria = mysql_query($query_limit_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);

if (isset($_GET['totalRows_galeria'])) {
  $totalRows_galeria = $_GET['totalRows_galeria'];
} else {
  $all_galeria = mysql_query($query_galeria);
  $totalRows_galeria = mysql_num_rows($all_galeria);
}
$totalPages_galeria = ceil($totalRows_galeria/$maxRows_galeria)-1;

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC LIMIT 4 OFFSET 3";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

$maxRows_videos = 3;
$pageNum_videos = 0;
if (isset($_GET['pageNum_videos'])) {
  $pageNum_videos = $_GET['pageNum_videos'];
}
$startRow_videos = $pageNum_videos * $maxRows_videos;

mysql_select_db($database_saquabb, $saquabb);
$query_videos = "SELECT * FROM videos ORDER BY id DESC";
$query_limit_videos = sprintf("%s LIMIT %d, %d", $query_videos, $startRow_videos, $maxRows_videos);
$videos = mysql_query($query_limit_videos, $saquabb) or die(mysql_error());
$row_videos = mysql_fetch_assoc($videos);

if (isset($_GET['totalRows_videos'])) {
  $totalRows_videos = $_GET['totalRows_videos'];
} else {
  $all_videos = mysql_query($query_videos);
  $totalRows_videos = mysql_num_rows($all_videos);
}
$totalPages_videos = ceil($totalRows_videos/$maxRows_videos)-1;


mysql_select_db($database_saquabb, $saquabb);
$query_mais_noticias = "SELECT * FROM noticias ORDER BY id DESC LIMIT 10 OFFSET 7";
$mais_noticias = mysql_query($query_mais_noticias, $saquabb) or die(mysql_error());
$row_mais_noticias = mysql_fetch_assoc($mais_noticias);
$totalRows_mais_noticias = mysql_num_rows($mais_noticias);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{noticias.imagem}");
$objDynamicThumb1->setResize(50, 30, false);
$objDynamicThumb1->setWatermark(false);
?>

<?php
  //conectando ao mysql
 $conn = @mysql_connect("localhost", "infobb_infobb","info2000");  
  $db   = @mysql_select_db("infobb_infobb", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `noticias` ORDER BY `id` DESC Limit 3";

  //Executando a instrução sql
  $sql  = @mysql_query($sql);

  //Pegando o numero de registros
  $rst = mysql_num_rows($sql);

  //Se tiver algum registro
  if($rst > 0) {

        //Abre/cria o arquivo tickers.xml com permissão para escrever
    $xml = fopen("registros.xml", "w");

    //Escreve o cabeçalho e o primeiro nó do xml
    fwrite($xml, "\r\n");
    fwrite($xml, "<tickers>\r\n");

    //Para cada registro que tiver
    for($i=0; $i<$rst; $i++) {

      //Pegamos o valor de cada registro
      $titulo = utf8_encode(mysql_result($sql,$i,"titulo"));
      $coluna = utf8_encode(mysql_result($sql,$i,"coluna"));
      $data = utf8_encode(mysql_result($sql,$i,"data"));
      $imagem = utf8_encode(mysql_result($sql,$i,"imagem"));
      $id = utf8_encode(mysql_result($sql,$i,"id"));

         //Guardamos na variavel $conteudo as tags e os valores do xml
         $conteudo = "<ticker>\r\n";
         $conteudo .= "<titulo>$titulo</titulo>\r\n";
         $conteudo .= "<coluna>$coluna</coluna>\r\n";
         $conteudo .= "<data>$data</data>\r\n";
         $conteudo .= "<imagem>uploads/fotos/$imagem</imagem>\r\n";
         $conteudo .= "<link>http://www.informebb.com/exibir_noticia.php?id=$id</link>\r\n";
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_______inFORmeBB.com_____________________________________________</title>

<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              
              <tr>
                <th width="51%" align="left" valign="top" scope="row"><table width="400" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                    <tr>
                      <th width="467" height="88" align="left" valign="top" scope="col"><a href="http://www.ciamasters.com.br/pop.php?id=242"></a><a href="promo_video.php"></a>
                        <table width="310" border="0" cellpadding="0" cellspacing="0" class="borda_foto_noticia">
                          <tr>
                            <th scope="col">							
								  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','400','height','240','src','capa_grande','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','capa_grande' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="240">
      <param name="movie" value="capa_grande.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="capa_grande.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="240"></embed>
    </object>
    </noscript>
							
						</th>
                          </tr>
                        </table></th>
                    </tr>

                </table></th>
                <th width="49%" align="left" valign="top" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="conteudo_esquerdo_borda_meio">
                    <th height="25" align="center" valign="top" scope="col"><table width="98%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                      <tr>
                        <th align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/recorte/ultimas_not.jpg" width="150" height="30" /></span></th>
                      </tr>
                    </table></th>
                  </tr>
                  <tr class="conteudo_esquerdo_borda_meio">
                    <th height="25" align="center" valign="top" scope="col"><?php do { ?>
                        <table width="98%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                          <tr>
                            <th width="15%" height="41" align="center" valign="middle" scope="col"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="50" height="30" hspace="5" border="0" align="center" /></a></th>
                            <th width="85%" align="left" valign="middle" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_noticias['coluna']; ?> - <?php echo $row_noticias['data']; ?></span><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><br />
                                  <?php echo substr($row_noticias['titulo'] ,0,50).""; ?></a></th>
                          </tr>
                        </table>
                        <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></th>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                </th>
              </tr>
              <tr>
                <th height="19" colspan="2" align="right" valign="middle" background="imagens/recorte/fundo_tab.jpg" bgcolor="#CCE0A0" scope="col"><table width="153" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <th width="158" align="center" valign="middle" scope="col"><a href="arquivo.php" class="mais_festa">* Arquivo de Not&iacute;cias</a></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <th align="left" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                    <tr>
                      <th height="30" align="left" valign="middle" scope="col"><table width="98%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                        <tr>
                          <th align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/recorte/outras_not.jpg" width="150" height="30" /></span></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th height="30" align="left" valign="middle" scope="col"><?php do { ?>
                          <table width="98%" border="0" cellpadding="0" cellspacing="6" class="borda_pontilhada_noticias">
                                <tr>
                                  <th align="left" valign="middle" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <th width="10" align="left" valign="top" class="fonte_titulo_not" scope="col">*</th>
                                          <th align="left" valign="top" scope="col"><span class="fonte_titulo_not"><?php echo $row_mais_noticias['coluna']; ?> - <?php echo $row_mais_noticias['data']; ?></span><br />
                                          <span class="fonte_not"><a href="exibir_noticia.php?id=<?php echo $row_mais_noticias['id']; ?>"><?php echo $row_mais_noticias['titulo']; ?></a></span></th>
                                        </tr>
                                      </table></th>
                                </tr>
                                </table>
                          <?php } while ($row_mais_noticias = mysql_fetch_assoc($mais_noticias)); ?></th>
                    </tr>
                    <tr>
                      <th height="13" align="left" valign="middle" scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <th height="19" align="right" valign="middle" background="imagens/recorte/fundo_tab.jpg" bgcolor="#CCE0A0" scope="col"><table width="118" border="0" cellspacing="0" cellpadding="2">
                          <tr>
                            <th width="158" align="center" valign="middle" scope="col"><a href="arquivo.php" class="mais_festa">* Mais Not&iacute;cias </a></th>
                          </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th height="30" align="left" valign="middle" scope="col"><table width="98%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                        <tr>
                          <th align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/recorte/galerias.jpg" width="150" height="30" /></span></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th height="25" align="left" valign="top" scope="col"><?php do { ?>
                          <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                            <tr>
                              <th width="15%" height="41" scope="col"><a href="galeria.php?galeria=<?php echo $row_galeria['nome']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{galeria.imagem}", 63, 48, false); ?>" width="63" height="48" border="0" /></a><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"></a></th>
                              <th width="85%" align="left" valign="top" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_galeria['nome']; ?></span><a href="galeria.php?galeria=<?php echo $row_galeria['nome']; ?>" class="fonte_not"><br />
                              </a><a href="galeria.php?galeria=<?php echo $row_galeria['nome']; ?>"><?php echo $row_galeria['descricao']; ?></a></th>
                            </tr>
                          </table>
                        <br />
                          <?php } while ($row_galeria = mysql_fetch_assoc($galeria)); ?></th>
                    </tr>
                    <tr>
                      <th height="19" align="right" valign="middle" background="imagens/recorte/fundo_tab.jpg" bgcolor="#CCE0A0" scope="col"><table width="142" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <th align="center" valign="middle" class="mais_festa" scope="col"><a href="galerias.php">* Mais Galerias de Fotos </a></th>
                          </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th height="30" align="left" valign="middle" scope="col"><table width="98%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                        <tr>
                          <th align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/recorte/videos.jpg" width="140" height="30" /></span></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th height="25" align="left" valign="top" scope="col"><?php do { ?>
                          <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                            <tr>
                              <th width="15%" height="41" scope="col"><a href="video.php?id=<?php echo $row_videos['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{videos.capa}", 63, 48, false); ?>" width="63" height="48" border="0" /></a><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"></a></th>
                              <th width="85%" align="left" valign="top" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_videos['titulo']; ?></span><a href="galeria.php?galeria=<?php echo $row_galeria['nome']; ?>" class="fonte_not"><br />
                              </a><a href="video.php?id=<?php echo $row_videos['id']; ?>">Enviado por: <?php echo $row_videos['autor']; ?></a></th>
                            </tr>
                          </table>
                        <?php } while ($row_videos = mysql_fetch_assoc($videos)); ?>
                        <br /></th>
                    </tr>
                </table></th>
                <th align="center" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                  <tr>
                    <th align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/recorte/bodyboarders.jpg" width="150" height="30" /></span></th>
                  </tr>
                </table>
                  <table width="100%" border="0" cellpadding="4" cellspacing="4">
                  
                  <tr>
                    <th align="center" valign="top" scope="col"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_pontilhada_noticias" id="admin">
                          <tr>
                            <th width="46" height="46" align="center" valign="middle" bgcolor="#7FA14D" scope="col"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}",38,40, false); ?>" border="0" align="center" /></th>
                            <th height="39" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <th align="left" valign="middle" scope="col"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="fonte_not"><?php echo substr($row_atletas['nome'] ,0,28).""; ?></a></th>
                              </tr>
                            </table>                              <a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"></a></th>
                          </tr>
                        </table>
                      <?php } while ($row_atletas = mysql_fetch_assoc($atletas)); ?></th>
                  </tr>
                  <tr>
                    <th align="right" valign="middle" background="imagens/recorte/fundo_tab.jpg" bgcolor="#CCE0A0" scope="col"><table width="89%" height="12" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <th align="right" valign="middle" scope="col"><a href="perfil.php" class="mais_festa">* Mais Atletas</a></th>
                        </tr>
                    </table></th>
                  </tr>
                </table></th>
              </tr>
              <tr>
                <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                    <tr>
                      <th height="19" align="right" valign="middle" background="imagens/recorte/fundo_tab.jpg" bgcolor="#CCE0A0" scope="col"><table width="85" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <th align="center" valign="middle" class="mais_festa" scope="col"><a href="videos.php">* Mais V&iacute;deos </a></th>
                          </tr>
                      </table></th>
                    </tr>
                    
                    
                </table></th>
                <th scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="left" valign="top" scope="row"><a href="http://www.ciamasters.com.br/pop.php?id=242"></a></th>
                <th align="left" valign="top" scope="row">&nbsp;</th>
              </tr>
            </table>
          <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($atletas);

mysql_free_result($galeria);

mysql_free_result($noticias);

mysql_free_result($videos);

mysql_free_result($mais_noticias);
?>
