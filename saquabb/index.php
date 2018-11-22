<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_atletas = 20;
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

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM galeria ORDER BY id DESC";
$galeria = mysql_query($query_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

$maxRows_recodset_foto = 4;
$pageNum_recodset_foto = 0;
if (isset($_GET['pageNum_recodset_foto'])) {
  $pageNum_recodset_foto = $_GET['pageNum_recodset_foto'];
}
$startRow_recodset_foto = $pageNum_recodset_foto * $maxRows_recodset_foto;

mysql_select_db($database_saquabb, $saquabb);
$query_recodset_foto = "SELECT * FROM fotos WHERE galeria = 'saquabb' ORDER BY id_foto DESC";
$query_limit_recodset_foto = sprintf("%s LIMIT %d, %d", $query_recodset_foto, $startRow_recodset_foto, $maxRows_recodset_foto);
$recodset_foto = mysql_query($query_limit_recodset_foto, $saquabb) or die(mysql_error());
$row_recodset_foto = mysql_fetch_assoc($recodset_foto);

if (isset($_GET['totalRows_recodset_foto'])) {
  $totalRows_recodset_foto = $_GET['totalRows_recodset_foto'];
} else {
  $all_recodset_foto = mysql_query($query_recodset_foto);
  $totalRows_recodset_foto = mysql_num_rows($all_recodset_foto);
}
$totalPages_recodset_foto = ceil($totalRows_recodset_foto/$maxRows_recodset_foto)-1;

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

$maxRows_vem_ai = 2;
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
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC  LIMIT 5 OFFSET 3";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);
?>
<?php
  //conectando ao mysql
  $conn = @mysql_connect("localhost", "root","582041");  
  $db   = @mysql_select_db("saquabb", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `noticias` ORDER BY `id` DESC Limit 4";

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
         $conteudo .= "<link>http://www.saquabb.com.br/exibir_noticia.php?id=$id</link>\r\n";
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
<table width="739" height="720" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="53" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a><img src="imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="198" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td align="center" valign="top"><table width="190" height="389" border="0" cellpadding="0" cellspacing="1">
              <tr>
                <td height="336" align="center" valign="top"><table  width="190" height="336" cellpadding="0" cellspacing="2" class="borda_fundo_noticas">
                    <tr>
                      <td height="330" align="center" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle">Principal</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="index.php">Home</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="arquivo.php">Arquivo de Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="galerias.php">Galerias de Fotos</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="perfil.php">Perfil dos Atletas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="contato.php">Fale Conosco </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_variedades" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">BBLagos</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="bblagos/index.php">Not&iacute;cias</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/circuito.php">O Circuito </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/etapas.php">Etapas 2006 </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/ranking.php">Ranking</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_girls" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">Saquabb Girls </td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="girls/index.php">Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_bblagos" width="100%" border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td align="left" valign="middle" class="tiutlo_not">Variedades</td>
                              </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festas/index.php">Fotos das Festas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="vemai.php">Vem a&iacute;... </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festa_anuncio.php">Anuncie sua Festa </a></td>
                          </tr>
                          
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="190" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                    <tr>
                      <td align="left" valign="middle" bgcolor="#333333"><img src="imagens/titulos/publicidade.jpg" width="118" height="20" /></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="imagens/publicidade/logorb.jpg" alt="RB Provider" width="170" height="54" border="0" /></a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><a href="http://ww.saquab.com.br"><img src="imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="170" height="64" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td height="58" align="center" valign="middle"><a href="http://www.redsdesign.com.br"><img src="imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="170" height="50" border="0" longdesc="http://www.redsdesign.com.br" /></a></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><br />
                        <a href="http://www.gnunes.net"><img src="imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="170" height="50" border="0" class="borda_tabela" /></a><br />
                      <br /></td>
                    </tr>
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
        <td width="539" height="193" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <th scope="row"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <td align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" class="borda_tabela">
                            <tr>
                              <td width="308" height="20" align="left" valign="middle" class="tiutlo_not"><img src="imagens/titulos/destaque.jpg" width="118" height="20" /></td>
                            </tr>
                            <tr>
                              <td height="87" align="center" valign="top" id="espaco_celulas"><script type="text/javascript">objeto('capa','290','260')</script></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="borda_tabela">
                            <tr>
                              <td height="17" colspan="2" align="center" valign="middle"><div align="left"><span class="tiutlo_not"><img src="imagens/titulos/atl.jpg" width="118" height="20" /></span></div></td>
                            </tr>
                            <tr>
                              <td width="131" height="77" align="center" valign="top"><table width="144" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                                        <tr>
                                          <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="perfil_borda_foto" /></a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle"><span class="tiutlo_not"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></span></td>
                                  </tr>
                                </table>
                                  <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
                              <td width="153" align="center" valign="top" class="tiutlo_not"><table width="125" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="125" align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                                        <tr>
                                          <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="perfil_borda_foto" /></a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></td>
                                  </tr>
                                </table>
                                  <br />
                                  <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_pontilhada_noticias">
                                  <tr>
                                    <th scope="col"><table border="0">
                                      <tr>
                                        <?php
  do { // horizontal looper version 3
?>
                                        <td><table width="46%" border="0" cellpadding="2" cellspacing="0">
                                            <tr>
                                              <td width="7%" height="17" align="center" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}",40,40, false); ?>" alt="<?php echo $row_atletas['nome']; ?>" width="40" height="40" border="0" class="borda_tabela" /></a></td>
                                              </tr>
                                        </table></td>
                                        <?php
    $row_atletas = mysql_fetch_assoc($atletas);
    if (!isset($nested_atletas)) {
      $nested_atletas= 1;
    }
    if (isset($row_atletas) && is_array($row_atletas) && $nested_atletas++ % 6==0) {
      echo "</tr><tr>";
    }
  } while ($row_atletas); //end horizontal looper version 3
?>
                                      </tr>
                                    </table></th>
                                  </tr>
                                </table></td>
                            </tr>
                            <tr>
                              <td height="22" colspan="2" align="right" valign="middle" bgcolor="#FF6666" class="tiutlo_not"><a href="perfil.php"><img src="imagens/titulos/mais_atletas.jpg" width="94" height="16" border="0" /></a></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                      <table width="314" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_fotos">
                        <tr>
                          <td height="23" align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="68" align="center" valign="middle"><table border="0">
                              <tr>
                                <?php
  do { // horizontal looper version 3
?>
                                <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                    <tr>
                                      <td width="36"><a href="javascript:abrir_janela('album/index.php?galeria=saquabb','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{recodset_foto.arquivo}", 63, 48, false); ?>" width="63" height="48" border="0" /></a></td>
                                    </tr>
                                </table></td>
                                <?php
    $row_recodset_foto = mysql_fetch_assoc($recodset_foto);
    if (!isset($nested_recodset_foto)) {
      $nested_recodset_foto= 1;
    }
    if (isset($row_recodset_foto) && is_array($row_recodset_foto) && $nested_recodset_foto++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_recodset_foto); //end horizontal looper version 3
?>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  <td align="center" valign="top"><table width="254" border="0" cellpadding="1" cellspacing="0">
                      <tr>
                        <td align="center" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                                <tr>
                                  <td height="22"" colspan="2" align="left" valign="bottom" class="tiutlo_not" id=" height="20><img src="imagens/titulos/noticias.jpg" width="118" height="20" /></td>
                                </tr>
                                <tr>
                                  <td height="66" colspan="2" align="left" valign="top"><?php do { ?>
                                      <table width="100%" border="0" cellpadding="2">
                                        <tr>
                                          <td height="71" align="left" valign="top"><table width="99%" height="50" border="0" align="left" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                                              <tr>
                                                <td width="24%" rowspan="2" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticias.imagem}", 80, 60, false); ?>" width="80" height="60" hspace="5" border="0" align="center" class="borda_foto_noticia" /></a></td>
                                                <td width="76%" height="19" align="left" valign="top"><span class="tiutlo_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="tiutlo_not"><?php echo $row_noticias['coluna']; ?></a></span></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="top" class="fonte_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><?php echo substr($row_noticias['titulo'] ,0,40)."..."; ?></a></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                      </table>
                                      <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></td>
                                </tr>
                                <tr>
                                  <td height="16" colspan="2" align="right" valign="top" bgcolor="#3399FE"><a href="arquivo.php"><img src="imagens/titulos/mais_not.jpg" width="94" height="16" border="0" /></a></td>
                                </tr>
                                
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="center" valign="top"><table width="100" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td><img src="imagens/ondas.jpg" alt="ondas" width="249" height="70" border="0" usemap="#MapMap" class="borda_tabela" />
                                  <map name="MapMap" id="MapMap2">
                                    <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                                    <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                                    <area shape="rect" coords="174,53,235,63" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_niteroi_itam" />
                                </map></td>
                            </tr>
                          </table>
                            <table width="100" border="0" cellspacing="1" cellpadding="0">
                              <tr>
                                <td><map name="MapMap" id="MapMap">
                                    <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                                    <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                                    <area shape="rect" coords="174,53,235,63" href="#" />
                                  </map>
                                  <a href="http://www.orkut.com/Community.aspx?cmm=184137" target="_blank"><img src="imagens/orkut.jpg" alt="orkut" width="251" height="50" border="0" class="borda_tabela" /></a></td>
                              </tr>
                            </table>
                          <table width="253" border="0" cellspacing="1" cellpadding="0">
                              <tr>
                                <td><table width="253" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_gatinhas">
                                    <tr>
                                      <td width="240" height="23" align="left" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="64" align="center" valign="middle"><table border="0">
                                          <tr>
                                            <?php
  do { // horizontal looper version 3
?>
                                            <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                                <tr>
                                                  <td width="36"><a href="javascript:abrir_janela('gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{galeria_gatinhas.arquivo}", 100, 75, false); ?>" border="0" /></a></td>
                                                </tr>
                                            </table></td>
                                            <?php
    $row_galeria_gatinhas = mysql_fetch_assoc($galeria_gatinhas);
    if (!isset($nested_galeria_gatinhas)) {
      $nested_galeria_gatinhas= 1;
    }
    if (isset($row_galeria_gatinhas) && is_array($row_galeria_gatinhas) && $nested_galeria_gatinhas++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_galeria_gatinhas); //end horizontal looper version 3
?>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table>
                          <table width="253" border="0" cellspacing="1" cellpadding="0">
                              <tr>
                                <td><table width="253" border="0" cellpadding="0" cellspacing="0" class="borda_fundo_noticas">
                                    <tr>
                                      <td height="20" align="left" valign="middle" bgcolor="#009966"><img src="imagens/titulos/festa.jpg" width="118" height="20" /></td>
                                    </tr>
                                    <tr>
                                      <td height="60"><table width="100%" height="141" border="0" cellpadding="0" cellspacing="0" bgcolor="#D8F5CD">
                                          <tr>
                                            <td height="119" align="center" valign="middle"><table width="236" border="1" cellpadding="0" cellspacing="2" bordercolor="#666666" bgcolor="#FFFFFF">
                                                <tr>
                                                  <td><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{festa.imagem}");?>" border="0" /></a></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td height="18" align="center" valign="top"><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><?php echo $row_festa['nome']; ?></a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="14" align="left" valign="middle" bgcolor="#009966"><span class="tiutlo_not"><img src="imagens/titulos/vemai.jpg" width="118" height="20" /></span></td>
                                    </tr>
                                    <tr>
                                      <td width="48%" height="60" align="center" valign="top" bgcolor="#D8F5CD"><table border="0">
                                          <tr>
                                            <?php
  do { // horizontal looper version 3
?>
                                            <td width="108"><table width="22%" height="97" border="0" cellpadding="2" cellspacing="0">
                                                <tr>
                                                  <td height="60" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="vem.php?id=<?php echo $row_vem_ai['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{vem_ai.flyer}", 100, 75, false); ?>" border="0" class="borda_tabela" /></a></td>
                                                </tr>
                                                <tr>
                                                  <td height="37" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="javascript:abrir_janela('album/index.php?id=<?php echo $row_galeria['id']; ?>','Saquabb','','700','500','true')" class="tiutlo_not"><?php echo $row_vem_ai['nome']; ?></a></td>
                                                </tr>
                                            </table></td>
                                            <?php
    $row_vem_ai = mysql_fetch_assoc($vem_ai);
    if (!isset($nested_vem_ai)) {
      $nested_vem_ai= 1;
    }
    if (isset($row_vem_ai) && is_array($row_vem_ai) && $nested_vem_ai++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_vem_ai); //end horizontal looper version 3
?>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                      </tr>
                  </table></td>
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

mysql_free_result($recodset_foto);

mysql_free_result($galeria_gatinhas);

mysql_free_result($vem_ai);

mysql_free_result($festa);

mysql_free_result($noticias);

?>
