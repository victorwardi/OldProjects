<?php require_once('../Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$maxRows_noticias = 3;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_xpress, $xpress);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $xpress) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

$maxRows_oferta = 3;
$pageNum_oferta = 0;
if (isset($_GET['pageNum_oferta'])) {
  $pageNum_oferta = $_GET['pageNum_oferta'];
}
$startRow_oferta = $pageNum_oferta * $maxRows_oferta;

mysql_select_db($database_xpress, $xpress);
$query_oferta = "SELECT * FROM ofertas ORDER BY id DESC";
$query_limit_oferta = sprintf("%s LIMIT %d, %d", $query_oferta, $startRow_oferta, $maxRows_oferta);
$oferta = mysql_query($query_limit_oferta, $xpress) or die(mysql_error());
$row_oferta = mysql_fetch_assoc($oferta);

if (isset($_GET['totalRows_oferta'])) {
  $totalRows_oferta = $_GET['totalRows_oferta'];
} else {
  $all_oferta = mysql_query($query_oferta);
  $totalRows_oferta = mysql_num_rows($all_oferta);
}
$totalPages_oferta = ceil($totalRows_oferta/$maxRows_oferta)-1;

$maxRows_recados = 3;
$pageNum_recados = 0;
if (isset($_GET['pageNum_recados'])) {
  $pageNum_recados = $_GET['pageNum_recados'];
}
$startRow_recados = $pageNum_recados * $maxRows_recados;

mysql_select_db($database_xpress, $xpress);
$query_recados = "SELECT * FROM comentario ORDER BY id DESC";
$query_limit_recados = sprintf("%s LIMIT %d, %d", $query_recados, $startRow_recados, $maxRows_recados);
$recados = mysql_query($query_limit_recados, $xpress) or die(mysql_error());
$row_recados = mysql_fetch_assoc($recados);

if (isset($_GET['totalRows_recados'])) {
  $totalRows_recados = $_GET['totalRows_recados'];
} else {
  $all_recados = mysql_query($query_recados);
  $totalRows_recados = mysql_num_rows($all_recados);
}
$totalPages_recados = ceil($totalRows_recados/$maxRows_recados)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="author" CONTENT="Victor Caetano"/>
<META NAME="description" CONTENT="Victor Caetano - victor@saquabb.com.br"/>
<META NAME="keywords" CONTENT="sites, web, desenvolvimento, grafica, site, webdesign, cartaz, cartazes, bodyboard, saqua, saquarema, flyer, flyers, fotos, perfil, galeria, contato, fale, conosco, fotos, surf, surfe, noticias"/>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Xpressbb.com</title>

<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="692" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="conteudo">
  <tr>
    <th scope="col"><img src="img/topo_.jpg" alt="topo" width="700" height="200" border="0" usemap="#Map" /></th>
  </tr>
  <tr>
    <th height="215" align="left" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr>
          <th width="43%" align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
              <tr>
                <th align="left" valign="top" scope="col"><img src="img/nov.jpg" alt="Novidades" width="200" height="20" /></th>
              </tr>
              <tr>
                <th align="center" valign="top" scope="col"><a href="novidade.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.foto}", 290, 0, true); ?>" border="0" class="borda_4px" /></a></th>
              </tr>
              <tr>
                <th height="26" class="titulo_not" scope="row"><a href="novidade.php?id=<?php echo $row_noticias['id']; ?>"><?php echo $row_noticias['titulo']; ?></a></th>
              </tr>
              <tr>
                <th align="left" valign="top" scope="row">
				 <?php ($row_noticias = mysql_fetch_assoc($noticias)); ?>
				<?php do { ?>
                    <table width="100%" border="0" cellpadding="0" cellspacing="2" class="linha_baixo_1px">
                      <tr>
                        <td width="15%" align="left" valign="top" class="sub_not_data"><a href="novidade.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.foto}", 60, 45, false); ?>" border="0" class="borda_4px" /></a></td>
                        <td width="85%" height="19" align="left" valign="top" class="sub_not_data"><span class="sub_not"><a href="novidade.php?id=<?php echo $row_noticias['id']; ?>"><?php echo $row_noticias['titulo']; ?></a><br />
                        </span><?php echo $row_noticias['data']; ?></td>
                      </tr>
                    </table>
                    <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></th>
              </tr>
              <tr>
                <th height="20" align="right" valign="middle" bgcolor="#6999C1" class="fonte_menu" scope="row"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <th align="right" valign="middle" scope="col"><a href="novidades.php">+ Arquivo</a></th>
                  </tr>
                </table>                  </th>
              </tr>
              <tr>
                <th align="left" valign="middle" scope="row"><img src="img/gal.jpg" alt="Galeria de Fotos" width="200" height="20" /></th>
              </tr>
              <tr>
                <th scope="row"><p><img src="img/onde.jpg" alt="onde encontrar!" width="250" height="142" class="borda_4px" /></p>                </th>
              </tr>
              <tr>
                <th align="left" valign="middle" scope="row"><br />
                  <ul><li> <span class="fonte_menu"><a href="http://www.lacquashop.com.br">www.lacquashop.com.br</a> </span></li>
                  <li><span class="fonte_menu"><a href="http://www.lacquashop.com.br">www.vibbeshop.com</a></span><br />
                  </li>
                  </ul>
                <p align="center" class="fonte_menu">Em breve outros pontos de venda! </p></th>
              </tr>
            </table></th>
          <th width="57%" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <th align="left" valign="top" class="branco_14" scope="col"><img src="img/ofertas.jpg" alt="Ofertas" width="200" height="20" /></th>
            </tr>
            <tr>
              <th scope="row"><?php do { ?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_branca">
                    <tr>
                      <th width="19%" align="center" valign="top" scope="col"><span class="total"><a href="oferta.php?id=<?php echo $row_oferta['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{oferta.foto}", 0, 100, true); ?>" border="0" class="borda_4px" /><br />
                      </a></span></th>
                      <th width="81%" align="left" valign="top" class="total" scope="col"><?php echo $row_oferta['nome']; ?><br />
                        <span class="sub_not_data"><a href="oferta.php?id=<?php echo $row_oferta['id']; ?>"><?php echo $row_oferta['descricao'] ; ?></a></span></th>
                    </tr>
                    </table>
                  <?php } while ($row_oferta = mysql_fetch_assoc($oferta)); ?></th>
            </tr>
            <tr>
              <th height="20" align="right" valign="middle" bgcolor="#6999C1" class="fonte_menu" scope="row"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <th align="right" valign="middle" scope="col"><a href="ofertas.php">+ Ofertas</a></th>
                </tr>
              </table>                </th>
            </tr>
            <tr>
              <th align="left" scope="row"><img src="img/msg.jpg" alt="Mensagens" width="200" height="20" /></th>
            </tr>
            <tr>
              <th scope="row"><?php do { ?>
                  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="borda">
                    <tr>
                        <th align="left" bgcolor="#6999C1" class="sub_not" scope="col"><?php echo $row_recados['nome']; ?> - <?php echo $row_recados['email']; ?></th>
                    </tr>
                    <tr>
                        <th align="left" class="sub_not_data" scope="row"><?php echo $row_recados['comentario']; ?></th>
                    </tr>
                    </table>
                <?php } while ($row_recados = mysql_fetch_assoc($recados)); ?></th>
            </tr>
            <tr>
              <th bgcolor="#6999C1" scope="row"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                  <th width="51%" align="left" valign="middle" class="branco_14" scope="col"><a href="recados.php" class="total">Ver Todos as  Mensagens </a></th>
                  <th width="49%" align="right" valign="middle" class="branco_14" scope="col"><a href="escrever.php" class="fonte">Escrever mensagem </a></th>
                </tr>
              </table></th>
            </tr>
          </table></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></th>
  </tr>
  <tr>
    <th height="35" align="left" valign="top" background="img/base.jpg" class="rodape" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="4" id="rodape">
        <tr>
          <th align="center" valign="middle" scope="col">Xpressbb.com&reg; - 2007 - Todos os direitos reservados<br />
Desenvolvido por: <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> </th>
        </tr>
    </table></th>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="7,179,62,195" href="index.php" alt="Home" />
<area shape="rect" coords="72,180,159,197" href="novidades.php" alt="Novidades" />
<area shape="rect" coords="171,179,247,195" href="pranchas.php" alt="Pranchas" />
<area shape="rect" coords="258,180,396,195" href="galeria.php" alt="Galeria de Fotos" />
<area shape="rect" coords="406,179,465,196" href="equipe.php" alt="Equipe" />
<area shape="rect" coords="476,178,607,195" href="onde.php" alt="Onde Encontrar" />
<area shape="rect" coords="620,177,690,196" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($oferta);

mysql_free_result($recados);

mysql_free_result($noticias);


?>
