<?php require_once('Connections/saquabb.php'); ?>
<?php require_once("js/storeAddress.php");?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_atletas = 5;
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
$query_galeria = "SELECT * FROM galeria WHERE nome <> 'gabriel' AND nome <> 'ovni' ORDER BY id DESC";
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

$maxRows_galeria_gatinhas = 2;
$pageNum_galeria_gatinhas = 0;
if (isset($_GET['pageNum_galeria_gatinhas'])) {
  $pageNum_galeria_gatinhas = $_GET['pageNum_galeria_gatinhas'];
}
$startRow_galeria_gatinhas = $pageNum_galeria_gatinhas * $maxRows_galeria_gatinhas;

mysql_select_db($database_saquabb, $saquabb);
$query_galeria_gatinhas = "SELECT * FROM fotos WHERE galeria = 'gatas' ORDER BY id_foto DESC";
$query_limit_galeria_gatinhas = sprintf("%s LIMIT %d, %d", $query_galeria_gatinhas, $startRow_galeria_gatinhas, $maxRows_galeria_gatinhas);
$galeria_gatinhas = mysql_query($query_limit_galeria_gatinhas, $saquabb) or die(mysql_error());
$row_galeria_gatinhas = mysql_fetch_assoc($galeria_gatinhas);

if (isset($_GET['totalRows_galeria_gatinhas'])) {
  $totalRows_galeria_gatinhas = $_GET['totalRows_galeria_gatinhas'];
} else {
  $all_galeria_gatinhas = mysql_query($query_galeria_gatinhas);
  $totalRows_galeria_gatinhas = mysql_num_rows($all_galeria_gatinhas);
}
$totalPages_galeria_gatinhas = ceil($totalRows_galeria_gatinhas/$maxRows_galeria_gatinhas)-1;

$maxRows_vem_ai = 3;
$pageNum_vem_ai = 0;
if (isset($_GET['pageNum_vem_ai'])) {
  $pageNum_vem_ai = $_GET['pageNum_vem_ai'];
}
$startRow_vem_ai = $pageNum_vem_ai * $maxRows_vem_ai;

mysql_select_db($database_saquabb, $saquabb);
$query_vem_ai = "SELECT * FROM vem_ai ORDER BY id DESC";
$query_limit_vem_ai = sprintf("%s LIMIT %d, %d", $query_vem_ai, $startRow_vem_ai, $maxRows_vem_ai);
$vem_ai = mysql_query($query_limit_vem_ai, $saquabb) or die(mysql_error());
$row_vem_ai = mysql_fetch_assoc($vem_ai);

if (isset($_GET['totalRows_vem_ai'])) {
  $totalRows_vem_ai = $_GET['totalRows_vem_ai'];
} else {
  $all_vem_ai = mysql_query($query_vem_ai);
  $totalRows_vem_ai = mysql_num_rows($all_vem_ai);
}
$totalPages_vem_ai = ceil($totalRows_vem_ai/$maxRows_vem_ai)-1;

mysql_select_db($database_saquabb, $saquabb);
$query_festa = "SELECT * FROM festas ORDER BY id DESC";
$festa = mysql_query($query_festa, $saquabb) or die(mysql_error());
$row_festa = mysql_fetch_assoc($festa);
$totalRows_festa = mysql_num_rows($festa);

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC LIMIT 3 OFFSET 3";
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

$maxRows_gabriel = 2;
$pageNum_gabriel = 0;
if (isset($_GET['pageNum_gabriel'])) {
  $pageNum_gabriel = $_GET['pageNum_gabriel'];
}
$startRow_gabriel = $pageNum_gabriel * $maxRows_gabriel;

mysql_select_db($database_saquabb, $saquabb);
$query_gabriel = "SELECT * FROM gabriel ORDER BY id DESC";
$query_limit_gabriel = sprintf("%s LIMIT %d, %d", $query_gabriel, $startRow_gabriel, $maxRows_gabriel);
$gabriel = mysql_query($query_limit_gabriel, $saquabb) or die(mysql_error());
$row_gabriel = mysql_fetch_assoc($gabriel);

if (isset($_GET['totalRows_gabriel'])) {
  $totalRows_gabriel = $_GET['totalRows_gabriel'];
} else {
  $all_gabriel = mysql_query($query_gabriel);
  $totalRows_gabriel = mysql_num_rows($all_gabriel);
}
$totalPages_gabriel = ceil($totalRows_gabriel/$maxRows_gabriel)-1;
?>
<?php
  //conectando ao mysql
  $conn = @mysql_connect("localhost", "root","582041");  
  $db   = @mysql_select_db("saquabb", $conn);

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
         $conteudo .= "<link>http://www.saquabb.com.br/noticia.php?id=$id</link>\r\n";
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
<title>_____________Saquabb.com.br_____________________________________________</title>

<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
 <script type="text/javascript" src="mail/js/prototype.js"></script>
    <script type="text/javascript" src="mail/js/mailingList.js"></script>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:260px;
	height:70px;
	z-index:1;
	left: 17px;
	top: 21px;
	background-color: #FFFF33;
	overflow: hidden;
}
-->
</style>
</head>
<script language="JavaScript" src="java.js"></script>
<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-1";
urchinTracker();
</script>
<table width="601" height="396" border="0" align="center" cellpadding="0" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a><img src="imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="140" align="center" valign="top" bgcolor="#E6F9FD"><table border="0" cellpadding="0" cellspacing="8" class="conteudo_esquerdo_borda_meio">
          <tr>
            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Principal</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="8"><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td width="106" align="left" valign="middle" class="fonte_not"><a href="index.php">Home</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="arquivo.php">Arquivo de Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="galerias.php">Galerias de Fotos</a> </td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="videos.php">V&iacute;deos</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="perfil.php">Perfil dos Atletas </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="contato.php">Fale Conosco </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">BBLagos</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/gabriel/gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">OVNI</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ovni/ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ovni/galeria.php">Galeria de Fotos </a></td>
          </tr>
          
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Saquabb Girls </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="girls/index.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Variedades</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="festas/index.php">Fotos das Festas </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="vemai.php">Vem a&iacute;... </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="festa_anuncio.php">Anuncie sua Festa </a></td>
          </tr>
        </table>
          <table width="140" border="0" cellpadding="0" cellspacing="2" bgcolor="#E6F9FD">
            <tr>
              <td width="133" height="21" align="left" valign="middle"><img src="imagens/titulos/publicidade.jpg" width="128" height="16" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="imagens/publicidade/logorb.jpg" alt="RB Provider" width="120" height="38" border="0" /></a></td>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.saqua.com.br"><img src="imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="120" height="45" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.redsdesign.com.br"><img src="imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="120" height="35" border="0" longdesc="http://www.redsdesign.com.br" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.gnunes.net"><img src="imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="120" height="35" border="0" class="borda_tabela" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        <br /></td>
        <td width="627" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <th align="center" valign="top" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="65%" align="left" valign="top" scope="col"><table width="400" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th width="227" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                        <tr>
                          <th scope="col"><script type="text/javascript">objeto('capa_grande','400','240')</script></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th align="left" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                        <tr>
                          <th height="88" align="left" valign="top" scope="col"><a href="http://www.ciamasters.com.br/pop.php?id=242">
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="60">
                              <param name="movie" value="banner427x60.swf" />
                              <param name="quality" value="high" />
                              <embed src="banner427x60.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="60"></embed>
                            </object>
                          </a><a href="promo_video.php"></a></th>
                        </tr>
                        <tr>
                          <th height="25" align="left" valign="top" scope="col"><span class="tiutlo_not"><img src="imagens/titulos/noticias.jpg" width="118" height="20" /></span></th>
                        </tr>
                        <tr>
                          <th height="25" align="left" valign="top" scope="col"><?php do { ?>
                              <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                                  <tr>
                                    <th width="15%" height="41" align="center" valign="middle" scope="col"><a href="noticia/<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticias.imagem}", 50, 30, false); ?>" width="50" height="30" hspace="5" border="0" align="center" /></a></th>
                                    <th width="85%" align="left" valign="middle" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_noticias['coluna']; ?> - <?php echo $row_noticias['data']; ?></span><a href="noticia/<?php echo $row_noticias['id']; ?>" class="fonte_not"><br />
                                    <?php echo substr($row_noticias['titulo'] ,0,50).""; ?></a></th>
                                  </tr>
                                </table>
                              <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></th>
                        </tr>
                      </table></th>
                    </tr>
                        <tr>
                          <th height="19" align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="162" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <th width="158" align="center" valign="middle" scope="col"><a href="arquivo.php" class="mais_festa">+ Arquivo de Not&iacute;cias</a></th>
                            </tr>
                          </table></th>
                    </tr>
                    <tr>
                      <th align="left" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                        <tr>
                          <th height="30" align="left" valign="middle" scope="col"><img src="imagens/titulos/que.jpg" width="128" height="20" /></th>
                        </tr>
                        <tr>
                          <th height="30" align="left" valign="middle" scope="col"><?php do { ?>
                              <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                                <tr>
                                  <th width="15%" height="41" align="center" valign="middle" scope="col"><a href="bblagos/gabriel/exibir.php?id=<?php echo $row_gabriel['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{gabriel.foto1}", 63, 48, false); ?>" width="63" height="48" border="0" /></a><a href="noticia/<?php echo $row_noticias['id']; ?>"></a></th>
                                  <th width="85%" align="left" valign="middle" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_gabriel['titulo']; ?></span><a href="bblagos/gabriel/exibir.php?id=<?php echo $row_gabriel['id']; ?>" class="fonte_not"><br />
                                    <?php echo $row_gabriel['data']; ?></a></th>
                                </tr>
                                </table>
                              <?php } while ($row_gabriel = mysql_fetch_assoc($gabriel)); ?>
                              <br /></th>
                        </tr>
                        <tr>
                          <th height="19" align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="95" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <th width="158" align="center" valign="middle" scope="col"><a href="bblagos/gabriel/gabriel.php" class="mais_festa">+ Arquivo </a></th>
                            </tr>
                          </table></th>
                        </tr>
                        <tr>
                          <th height="30" align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/titulos/galeria.jpg" width="128" height="20" /></span></th>
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
                          <th height="19" align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="142" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <th align="center" valign="middle" class="mais_festa" scope="col"><a href="galerias.php">+ Galerias de Fotos </a></th>
                            </tr>
                          </table>                            </th>
                        </tr>
                        <tr>
                          <th height="30" align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/titulos/videos.jpg" width="128" height="20" /></span></th>
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
                              <?php } while ($row_videos = mysql_fetch_assoc($videos)); ?><br /></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo_esquerdo_borda_meio">
                        <tr>
                          <th height="19" align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="85" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <th align="center" valign="middle" class="mais_festa" scope="col"><a href="videos.php">+ V&iacute;deos </a></th>
                            </tr>
                          </table></th>
                        </tr>
                        <tr>
                          <th height="30" align="left" valign="middle" scope="col"><span class="tiutlo_not"><img src="imagens/titulos/gatinhas.jpg" width="128" height="20" /></span></th>
                        </tr>
                        <tr>
                          <th height="25" align="left" valign="top" scope="col"> <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                            <tr>
                              <th height="41" scope="col"><table width="400" height="100" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#24282B"   background="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{galeria_gatinhas.arquivo}", 450, 0, true); ?>" 	background-position= "center center" class="borda_gatinhas" id="ver">
                                  <tr>
                                    <th width="100%" height="100%" align="center" valign="bottom"   scope="col"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">+ Visualizar</a></th>
                                  </tr>
                                </table></th>
                            </tr>
                          </table></th>
                        </tr>
                      </table></th>
                    </tr>
                    <tr>
                      <th align="left" valign="top" scope="row"><a href="http://www.ciamasters.com.br/pop.php?id=242"></a></th>
                    </tr>
                  </table></th>
                  <th width="35%" align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#C7F0EC" class="conteudo_esquerdo_borda">
                    
                    <tr>
                      <th scope="row"><table width="100%" border="0" cellpadding="4" cellspacing="8" class="Tabela_Conteudo">
                        
                        <tr>
                          <th height="170" align="center" valign="top" background="imagens/mail.jpg" scope="col"><table width="100%" height="170" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <th scope="col">        <?php
if ( "1" == "2" ) {
    echo "Fatal error, please check code.<br />";
}
else {
?>
    <form id="addressForm" action="index.php" method="get">
         
        <p>
          <input  name="address" type="text" id="address" size="25" maxlength="100" />
          
          <input type="submit" value="Cadastrar">
          <br />
          <?php echo(storeAddress()); ?>        </p> 
        <p id="response"></p>
    </form>
    
<?php
}
?></th>
                            </tr>
                          </table>                      </th>
                        </tr>
                        
                      </table>
                        <table width="100%" border="0" cellpadding="4" cellspacing="8" class="Tabela_Conteudo">
                          <tr>
                            <th height="15" align="left" valign="middle" bgcolor="#017C9E" class="borda_titulo_menu" scope="col">Perfil dos Atletas </th>
                          </tr>
                          <tr>
                            <th align="center" valign="top" scope="col"><?php do { ?>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="atletas" id="admin">
                                  <tr>
                                    <th width="46" height="46" align="center" valign="middle" bgcolor="#007B9D" scope="col"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}",38,40, false); ?>" border="0" align="center" /></th>
                                    <th width="149" height="39" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><?php echo substr($row_atletas['nome'] ,0,14).""; ?></a></th>
                                  </tr>
                                </table>
                              <?php } while ($row_atletas = mysql_fetch_assoc($atletas)); ?></th>
                          </tr>
                          <tr>
                            <th align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th align="right" valign="middle" scope="col"><a href="perfil.php" class="mais_festa">+ Mais Atletas</a></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellpadding="4" cellspacing="8" class="Tabela_Conteudo">
                          <tr>
                            <th height="15" align="left" valign="middle" bgcolor="#017C9E" class="borda_titulo_menu" scope="col">Previs&atilde;o das Ondas </th>
                          </tr>
                          <tr>
                            <th height="30" align="center" valign="top" bgcolor="#017C9E" scope="col"><form id="form1" name="form1" method="post" action="">                            
                              <p>
                                <select name="ondas" onchange="MM_jumpMenu('parent',this,1)">
                                  <option>- Selecione a Praia -</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_saqua_praiav">Saquarema - Praia da Vila</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_saqua_itauna">Saquarema - Ita&uacute;na</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_niteroi_itam">Itacoatiara - Meio</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_niteroi_itacocd">Itacoatiara - Pampo</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_niteroi_itacoce">Itacoatiara - Cost&atilde;o</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_rio_saoconrado">S&atilde;o Conrado</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_rio_copacabana">Copacabana</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_cabofrio_forte">Cabo Frio - Praia do Forte</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_arraial_grande">Arraial do Cabo - P. Grande</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_buzios_geribam">B&uacute;zios - Gerib&aacute; - Meio</option>
                                  <option value="http://www.waves.com.br/wavescheck.asp?pico=rj_buzios_geribad">B&uacute;zios - Gerib&aacute; - C. Direito</option>
                                </select>
                                <br />
                                <br />
                                <img src="imagens/titulos/waves.jpg" width="180" height="20" /><br />
                              </p>
                              </form>      
						    </th>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellpadding="4" cellspacing="8" class="Tabela_Conteudo">
                          <tr>
                            <th height="15" align="left" valign="middle" bgcolor="#017C9E" class="borda_titulo_menu" scope="col">Festas e Agitos </th>
                          </tr>
                          <tr>
                            <th align="center" valign="top" scope="col"><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"></a>
                                <table width="100%" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="festa_borda" id="festa">
                                  <tr>
                                    <th height="63" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#FDFDFD" scope="col"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{festa.imagem}");?>" width="187" height="100" border="0" /><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"></a></th>
                                  </tr>
                                  <tr>
                                    <th height="38" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#FDFDFD" scope="col"><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><?php echo $row_festa['nome']; ?></a></th>
                                  </tr>
                              </table></th>
                          </tr>
                          <tr>
                            <th align="right" valign="middle" bgcolor="#017C9E" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <th align="right" valign="middle" scope="col"><a href="festas/index.php" class="mais_festa">+ Fotos das Festas</a><a href="perfil.php" class="mais_festa"></a></th>
                              </tr>
                            </table>                              </th>
                          </tr>
                        </table></th>
                    </tr>
                    <tr>
                      <th scope="row"><table width="218" border="0" cellpadding="4" cellspacing="8" bgcolor="#C7F0EC" >
                        <tr>
                          <th height="15" align="left" valign="middle" bgcolor="#017C9E" class="borda_titulo_menu" scope="col">Vem a&iacute;... </th>
                        </tr>
                        <tr>
                          <th height="103" scope="col"><a href="vem.php?id=<?php echo $row_vem_ai['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{vem_ai.flyer}", 192, 0, true); ?>" border="0" /></a>
                            <?php do { ?>
                                <table width="100%" border="0" cellpadding="4" cellspacing="0" class="borda_pontilhada_noticias">
                                  <tr>
                                    <th align="left" class="fonte_not" scope="col"><span class="fonte_titulo_not"><?php echo $row_vem_ai['nome']; ?></span><br />
                                      <a href="vem.php?id=<?php echo $row_vem_ai['id']; ?>"><?php echo $row_vem_ai['data']; ?></a></th>
                                  </tr>
                                </table>
                            <?php } while ($row_vem_ai = mysql_fetch_assoc($vem_ai)); ?></th>
                        </tr>
                        <tr>
                          <th height="21" scope="col">&nbsp;</th>
                        </tr>
                        
                      </table>
                      </th>
                    </tr>
                    
                  </table></th>
                </tr>
              </table></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
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

mysql_free_result($galeria_gatinhas);

mysql_free_result($vem_ai);

mysql_free_result($festa);

mysql_free_result($noticias);

mysql_free_result($videos);

mysql_free_result($gabriel);
?>
