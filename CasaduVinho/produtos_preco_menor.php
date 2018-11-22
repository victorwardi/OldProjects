<?php require_once('Connections/ConBD.php'); ?>
<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_ConBD, $ConBD);
$query_RsListaPais = "SELECT * FROM pais ORDER BY nome ASC";
$RsListaPais = mysql_query($query_RsListaPais, $ConBD) or die(mysql_error());
$row_RsListaPais = mysql_fetch_assoc($RsListaPais);
$totalRows_RsListaPais = mysql_num_rows($RsListaPais);

mysql_select_db($database_ConBD, $ConBD);
$query_RsBannerCima = "SELECT * FROM banner_cima ORDER BY id DESC";
$RsBannerCima = mysql_query($query_RsBannerCima, $ConBD) or die(mysql_error());
$row_RsBannerCima = mysql_fetch_assoc($RsBannerCima);
$totalRows_RsBannerCima = mysql_num_rows($RsBannerCima);

mysql_select_db($database_ConBD, $ConBD);
$query_RsBannerLateral = "SELECT * FROM banner_lateral ORDER BY id DESC";
$RsBannerLateral = mysql_query($query_RsBannerLateral, $ConBD) or die(mysql_error());
$row_RsBannerLateral = mysql_fetch_assoc($RsBannerLateral);
$totalRows_RsBannerLateral = mysql_num_rows($RsBannerLateral);

$maxRows_RsProdutos = 10;
$pageNum_RsProdutos = 0;
if (isset($_GET['pageNum_RsProdutos'])) {
  $pageNum_RsProdutos = $_GET['pageNum_RsProdutos'];
}
$startRow_RsProdutos = $pageNum_RsProdutos * $maxRows_RsProdutos;

mysql_select_db($database_ConBD, $ConBD);
$query_RsProdutos = "SELECT * FROM produtos ORDER BY valor ASC";
$query_limit_RsProdutos = sprintf("%s LIMIT %d, %d", $query_RsProdutos, $startRow_RsProdutos, $maxRows_RsProdutos);
$RsProdutos = mysql_query($query_limit_RsProdutos, $ConBD) or die(mysql_error());
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);

if (isset($_GET['totalRows_RsProdutos'])) {
  $totalRows_RsProdutos = $_GET['totalRows_RsProdutos'];
} else {
  $all_RsProdutos = mysql_query($query_RsProdutos);
  $totalRows_RsProdutos = mysql_num_rows($all_RsProdutos);
}
$totalPages_RsProdutos = ceil($totalRows_RsProdutos/$maxRows_RsProdutos)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("Uploads/");
$objDynamicThumb1->setRenameRule("{RsProdutos.foto}");
$objDynamicThumb1->setResize(150, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Canto do Vinho</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="872" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="872" align="center" valign="top" scope="row"><table width="872" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="44%" align="left" scope="row"><img src="img/logo.png" alt="" name="logo" width="387" height="69" border="0" usemap="#logoMap" id="logo" /></th>
        <td width="7%"><img name="pesquisar" src="img/pesquisar.png" width="115" height="69" border="0" id="pesquisar" alt="" /></td>
        <td width="49%" align="left" valign="middle" background="img/index_r1_c4.png">
        <!-- Formulário de busca de Produtos -->        <!-- Fim da Busca -->
        <table width="66%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <th width="73%" height="23" scope="row">&nbsp;</th>
            <td width="27%">&nbsp;</td>
          </tr>
          <tr>
            <form action="busca.php" method="get">
            
            <th align="left" scope="row"><input name="busca" type="text" class="txt_vinho_12px_normal" id="busca" onfocus="if(this.value=='Digite o nome do produto')this.value='';" value="Digite o nome do produto" size="32" maxlength="50" /> </th>
          
            <td align="center">
          
                 <input type="image" name="imageField" id="imageField" src="img/OK.png" />            </td>
            </form>
          </tr>
        </table></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th align="center" valign="top" scope="row"><img src="img/img2/menu.png" alt="" name="menu" width="872" height="45" border="0" usemap="#menuMap" id="menu" /></th>
  </tr>
  <tr>
    <th align="left" valign="top" background="img/fundo_tabela.png" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="32%" align="right" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th colspan="2" align="left" scope="row"><img src="img/menu_lista.png" width="296" height="53" /></th>
            </tr>
          <tr>
            <th width="90%" height="258" align="right" valign="top" scope="row"><table width="92%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="top" class="txt_vinho_12px_normal" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="right" valign="top" class="txt_vinho_12px_normal" scope="row"><table width="95%" height="24" border="0" cellpadding="0" cellspacing="6">
                    <tr>
                      <th align="left" valign="middle" class="txt_vinho_12px" scope="row">Localize os produtos pelo pa&iacute;s. </th>
                      </tr>
                  </table></th>
              </tr>
              <tr>
                <th align="center" valign="top" class="txt_vinho_12px_normal" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="right" valign="top" scope="row"><?php do { ?>
                    <table width="94%" height="24" border="0" cellpadding="0" cellspacing="6">
                      <tr>
                        <th width="8%" align="left" valign="middle" scope="row"><img src="img/seta.jpg" width="11" height="11" /></th>
                        <td width="92%" align="left" valign="middle" class="txt_vinho_12px"><a href="pais.php?pais=<?php echo $row_RsListaPais['nome'];?>"><?php echo $row_RsListaPais['nome']; ?></a></td>
                      </tr>
                    </table>
                    <?php } while ($row_RsListaPais = mysql_fetch_assoc($RsListaPais)); ?></th>
              </tr>
              <tr>
                <th align="left" valign="top" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="center" valign="top" scope="row">&nbsp;<a href="<?php echo $row_RsBannerLateral['link'];?>"><img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsBannerLateral.imagem}");?>" width="200" class="contorno_1px_vinho" /></a></th>
              </tr>
            </table>              </th>
            <td width="10%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th height="66" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th background="img/destaque_.png" scope="row"><img src="img/destaque_.png" width="29" height="39" border="0" /></th>
              </tr>
            </table></td>
          </tr>
        </table></th>
        <td width="68%" align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th height="119" align="left" valign="middle" scope="row"><div id="bannerCima"><a href="<?php echo $row_RsBannerCima['link'];?>"><img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsBannerCima.imagem}");?>" width="480" height="110" border="0" class="contorno_1px_vinho" /></a></div>                
                </th>
            </tr>
            <tr>
              <th align="left" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th height="39" align="left" scope="row"><img src="img/titulos/produtos.jpg" alt="Destaques" width="520" height="39" border="0" /></th>
                  </tr>
                  <tr>
                    <th align="left" valign="top" scope="row">&nbsp;</th>
                  </tr>
                  <tr>
                    <th height="22" align="left" valign="top" scope="row"><span class="txt_vinho_12px_normal">Produtos ordenados pelos <span class="txt_vinho_12px">menores pre&ccedil;os</span>.</span></th>
                  </tr>
                  <tr>
                    <th align="left" valign="top" scope="row"><span class="txt_vinho_12px_normal">Ordenar por: <a href="produtos_preco_maior.php">Maior Pre&ccedil;o</a></span></th>
                  </tr>
                  <tr>
                    <th align="left" valign="top" scope="row">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="left" valign="top" scope="row"><?php do { ?>
                      <table width="100%" border="0" cellspacing="3" cellpadding="0">
                        <tr>
                          <th width="25%" scope="row">&nbsp;</th>
                          <td width="75%">&nbsp;</td>
                        </tr>
                        <tr>
                          <th rowspan="4" align="center" valign="top" scope="row">&nbsp;<img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsProdutos.foto}");?>" /></th>
                          <td align="left" valign="top" class="txtTituloProduto"><?php echo $row_RsProdutos['nome']; ?></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="txtDescProduto"><?php echo $row_RsProdutos['descricao']; ?></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="txtValorProduto">R$ <?php echo $row_RsProdutos['valor']; ?></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><a href="produto.php?id=<?php echo $row_RsProdutos['id']; ?>"><img src="img/comprar.jpg" alt="mais detalhes" width="120" height="28" border="0" /></a></td>
                        </tr>
                        <tr>
                          <th colspan="2" background="img/separador.jpg" scope="row"><img src="img/separador.jpg" width="1" height="22" /></th>
                        </tr>
                      </table>
                      <?php } while ($row_RsProdutos = mysql_fetch_assoc($RsProdutos)); ?></th>
                  </tr>
                  <tr>
                    <th scope="row">&nbsp;</th>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></th>
            </tr>
          </table>          </td>
      </tr>
      
    </table></th>
  </tr>
  
  <tr>
    <th align="center" valign="top" scope="row"><img src="img/rodape.png" alt="" name="rodape" width="872" height="110" border="0" usemap="#rodapeMap" id="rodape" /></th>
  </tr>
</table>

<map name="menuMap" id="menuMap"><area shape="rect" coords="384,2,431,38" href="index.php" alt="Home" />
<area shape="rect" coords="436,1,510,39" href="produtos.php" alt="Produtos" />
<area shape="rect" coords="518,1,604,39" href="promo.php" alt="Promo&ccedil;&otilde;es" />
<area shape="rect" coords="608,1,707,40" href="quemsomos.php" alt="Quem Somos" /><area shape="rect" coords="712,2,815,38" href="fale.php" alt="Fale Conosco" />
</map>
<map name="logoMap" id="logoMap"><area shape="rect" coords="56,4,367,67" href="index.php" alt="Canto do Vinho" />
</map>

<map name="rodapeMap" id="rodapeMap"><area shape="rect" coords="748,91,841,109" href="http://www.saquabb.com.br/victor" target="_blank" alt="Web: Victor Caetano" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsListaPais);

mysql_free_result($RsBannerCima);

mysql_free_result($RsBannerLateral);

mysql_free_result($RsProdutos);
?>
