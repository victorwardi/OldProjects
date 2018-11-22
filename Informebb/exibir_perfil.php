<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$colname_perfil = "-1";
if (isset($_GET['id'])) {
  $colname_perfil = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_perfil = sprintf("SELECT * FROM perfil WHERE id = %s AND aprovado = 'y' ORDER BY id DESC", $colname_perfil);
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

$maxRows_mais_perfil = 25;
$pageNum_mais_perfil = 0;
if (isset($_GET['pageNum_mais_perfil'])) {
  $pageNum_mais_perfil = $_GET['pageNum_mais_perfil'];
}
$startRow_mais_perfil = $pageNum_mais_perfil * $maxRows_mais_perfil;

$colname_mais_perfil = "-1";
if (isset($_GET['id'])) {
  $colname_mais_perfil = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_mais_perfil = sprintf("SELECT * FROM perfil WHERE id <> %s AND aprovado = 'y' ORDER BY rand() ", $colname_mais_perfil);
$query_limit_mais_perfil = sprintf("%s LIMIT %d, %d", $query_mais_perfil, $startRow_mais_perfil, $maxRows_mais_perfil);
$mais_perfil = mysql_query($query_limit_mais_perfil, $saquabb) or die(mysql_error());
$row_mais_perfil = mysql_fetch_assoc($mais_perfil);

if (isset($_GET['totalRows_mais_perfil'])) {
  $totalRows_mais_perfil = $_GET['totalRows_mais_perfil'];
} else {
  $all_mais_perfil = mysql_query($query_mais_perfil);
  $totalRows_mais_perfil = mysql_num_rows($all_mais_perfil);
}
$totalPages_mais_perfil = ceil($totalRows_mais_perfil/$maxRows_mais_perfil)-1;

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
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style1 {color: #999999}
-->
</style><!-- InstanceEndEditable -->
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
          <table width="100%" border="0" cellpadding="0" cellspacing="8">
            <tr>
              <td align="center" valign="top"><table width="650" border="0" cellpadding="4" cellspacing="0">
                <tr>
                  <td height="22" colspan="2" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                    <tr>
                      <th align="left" valign="middle" scope="col"><img src="imagens/recorte/titulos/bodyboarders.jpg" alt="bodyboarders" width="300" height="40" border="0" /></th>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td width="49%" align="center" valign="top"><table width="34%" height="40" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                      <tr>
                        <td align="center" valign="middle"><img src="<?php echo tNG_showDynamicImage("", "perfil/fotos/", "{perfil.foto}");?>" class="perfil_borda_foto" /></td>
                      </tr>
                  </table></td>
                  <td width="51%" align="left" valign="top"><table width="93%" border="0" cellpadding="0" cellspacing="4">
                      <tr>
                        <td height="19" colspan="2" align="left" valign="top" class="perfil_nome"><?php echo $row_perfil['nome']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Data de Nascimento:</span> <span class="fonte_not"><?php echo $row_perfil['data_nasc']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Local de:</span> <span class="fonte_not"><?php echo $row_perfil['local_de']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Tempo de Bodyboard: </span><span class="fonte_not"><?php echo $row_perfil['tempo_de_bb']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_not">Picos Preferidos:</span> <span class="fonte_not"><?php echo $row_perfil['picos_preferidos']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Prancha:</span> <span class="fonte_not"><?php echo $row_perfil['prancha']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">P&eacute;-de-pato:</span> <span class="fonte_not"><?php echo $row_perfil['pe_pato']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Manobra Preferida: </span><span class="fonte_not"><?php echo $row_perfil['manobra']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">&Iacute;dolo:</span> <span class="fonte_not"><?php echo $row_perfil['idolo']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Filme de BB: </span><span class="fonte_not"><?php echo $row_perfil['filme']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Outras Atividades: </span><span class="fonte_not"><?php echo $row_perfil['atividades']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Patrocinio/Apoio:</span> <span class="fonte_not"><?php echo $row_perfil['patrocinio']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Recado para Galera: </span><span class="fonte_not"><?php echo $row_perfil['recado']; ?> </span></td>
                      </tr>
                      <tr>
                        <td width="20%" align="left" valign="middle">&nbsp;</td>
                        <td width="80%" align="left" valign="middle">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="15" colspan="2" align="left" valign="middle" bgcolor="#FF6600"><span class="mais_festa">* Mais Bodyboarders </span></td>
                </tr>
                <tr>
				
                  <td height="13" colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><table width="208" border="0" cellspacing="5" cellpadding="0">
                    
                    <tr>
                      <td width="198"><table width="100%" border="0">
                        <tr>
                          <?php
  do { // horizontal looper version 3
?>
                            <td><table width="111%" border="0" cellpadding="2" cellspacing="4">
                                <tr>
                                  <td width="37" align="left" valign="top"><a href="exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{mais_perfil.foto}", 35, 42, false); ?>" width="35" height="42" border="0" class="borda_tabela" /></a></td>
                                  <td width="135" align="left" valign="top"><a href="exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><span class="fonte_titulo_not"><?php echo $row_mais_perfil['nome']; ?></span></a></td>
                                </tr>
                            </table></td>
                            <?php
    $row_mais_perfil = mysql_fetch_assoc($mais_perfil);
    if (!isset($nested_mais_perfil)) {
      $nested_mais_perfil= 1;
    }
    if (isset($row_mais_perfil) && is_array($row_mais_perfil) && $nested_mais_perfil++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_mais_perfil); //end horizontal looper version 3
?>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                
              </table>
              <p><img src="imagens/cadastre-se2.jpg" alt="Cadastre-se" width="570" height="100" border="0" usemap="#Map" class="borda_foto_noticia" />
                <map name="Map" id="Map">
                  <area shape="rect" coords="439,56,567,102" href="javascript:abrir_janela('perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')" alt="Clique Aqui" />
                </map>
              </p></td>
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
mysql_free_result($perfil);

mysql_free_result($mais_perfil);
?>