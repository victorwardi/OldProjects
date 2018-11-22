<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_perfil = 12;
$pageNum_perfil = 0;
if (isset($_GET['pageNum_perfil'])) {
  $pageNum_perfil = $_GET['pageNum_perfil'];
}
$startRow_perfil = $pageNum_perfil * $maxRows_perfil;

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil WHERE aprovado = 'y' ORDER BY id DESC";
$query_limit_perfil = sprintf("%s LIMIT %d, %d", $query_perfil, $startRow_perfil, $maxRows_perfil);
$perfil = mysql_query($query_limit_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);

if (isset($_GET['totalRows_perfil'])) {
  $totalRows_perfil = $_GET['totalRows_perfil'];
} else {
  $all_perfil = mysql_query($query_perfil);
  $totalRows_perfil = mysql_num_rows($all_perfil);
}
$totalPages_perfil = ceil($totalRows_perfil/$maxRows_perfil)-1;

$queryString_perfil = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_perfil") == false && 
        stristr($param, "totalRows_perfil") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_perfil = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_perfil = sprintf("&totalRows_perfil=%d%s", $totalRows_perfil, $queryString_perfil);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
          <table width="617" border="0" cellpadding="2" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <td height="16" align="left" valign="middle" bgcolor="#017C9E" class="Titulo_Branco">Perfil dos Atletas </td>
            </tr>
            <tr>
              <td height="136" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="6">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                    <td width="130"><table width="130" border="0" cellspacing="4" cellpadding="2">
                        <tr>
                          <td width="126" height="100" align="center" valign="top"><table width="10" border="0" cellpadding="0" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                              <tr>
                                <td><a href="exibir_perfil.php?id=<?php echo $row_perfil['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{perfil.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="borda_gatinhas" /></a></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25" align="center" valign="top" class="fonte_titulo_not"><?php echo $row_perfil['nome']; ?></td>
                        </tr>
                    </table></td>
                    <?php
    $row_perfil = mysql_fetch_assoc($perfil);
    if (!isset($nested_perfil)) {
      $nested_perfil= 1;
    }
    if (isset($row_perfil) && is_array($row_perfil) && $nested_perfil++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_perfil); //end horizontal looper version 3
?>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="14" align="center" valign="middle">Voc&ecirc; est&aacute; vendo do perfil <span class="fonte_titulo_not"><?php echo ($startRow_perfil + 1) ?></span> ao perfil <span class="fonte_titulo_not"><?php echo min($startRow_perfil + $maxRows_perfil, $totalRows_perfil) ?></span> em um total de <span class="fonte_titulo_not"><?php echo $totalRows_perfil ?> </span> perfis.&nbsp;
                  <table border="0" width="50%" align="center">
                    <tr>
                      <td width="23%" height="41" align="center" class="fonte_not"><?php if ($pageNum_perfil > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, 0, $queryString_perfil); ?>">Primeira</a>
                          <?php } // Show if not first page ?>
                      </td>
                      <td width="31%" align="center" class="fonte_not"><?php if ($pageNum_perfil > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, max(0, $pageNum_perfil - 1), $queryString_perfil); ?>">Anterior</a>
                          <?php } // Show if not first page ?>
                      </td>
                      <td width="23%" align="center" class="fonte_not"><?php if ($pageNum_perfil < $totalPages_perfil) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, min($totalPages_perfil, $pageNum_perfil + 1), $queryString_perfil); ?>">Pr&oacute;xima</a>
                          <?php } // Show if not last page ?>
                      </td>
                      <td width="23%" align="center" class="fonte_not"><?php if ($pageNum_perfil < $totalPages_perfil) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, $totalPages_perfil, $queryString_perfil); ?>">&Uacute;ltima</a>
                          <?php } // Show if not last page ?>
                      </td>
                    </tr>
                </table></td>
            </tr>
            <tr>
              <td height="123" align="center" valign="bottom"><img src="imagens/cadastre-se2.jpg" alt="cadastre-se" width="570" height="100" border="0" usemap="#Map" class="borda_tabela" />
                  <map name="Map" id="Map">
                    <area shape="rect" coords="439,58,571,99" href="javascript:abrir_janela('perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')" />
                </map></td>
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
mysql_free_result($perfil);

mysql_free_result($perfil);
?>