<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);

$maxRows_not = 10;
$pageNum_not = 0;
if (isset($_GET['pageNum_not'])) {
  $pageNum_not = $_GET['pageNum_not'];
}
$startRow_not = $pageNum_not * $maxRows_not;

mysql_select_db($database_fotos, $fotos);
$query_not = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_not = sprintf("%s LIMIT %d, %d", $query_not, $startRow_not, $maxRows_not);
$not = mysql_query($query_limit_not, $fotos) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);

if (isset($_GET['totalRows_not'])) {
  $totalRows_not = $_GET['totalRows_not'];
} else {
  $all_not = mysql_query($query_not);
  $totalRows_not = mysql_num_rows($all_not);
}
$totalPages_not = ceil($totalRows_not/$maxRows_not)-1;

$queryString_not = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_not") == false && 
        stristr($param, "totalRows_not") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_not = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_not = sprintf("&totalRows_not=%d%s", $totalRows_not, $queryString_not);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Real Fotos.com.br</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-2";
urchinTracker();
</script>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="right" valign="middle" scope="col"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
      <tr>
        <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
        <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
        <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
        <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
        <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th scope="row"><table width="774" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="59" scope="col">&nbsp;</th>
        </tr>
      <tr>
        <th height="98" align="center" valign="bottom" scope="row"><table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="left" valign="bottom" class="fonte_10px_preta" scope="col">Foto Destaque </th>
            </tr>
            <tr>
              <th align="center" valign="middle" class="fonte_10px_preta" scope="col"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/destaque/", "{destaque.foto}");?>" class="borda_destaque_8px" /></th>
            </tr>
            <tr>
              <th align="right" valign="top" class="fonte_10px_preta" scope="row">Atleta: <?php echo $row_destaque['atleta']; ?> - Local: <?php echo $row_destaque['local']; ?> - Foto: <?php echo $row_destaque['fotografo']; ?></th>
            </tr>
          </table></th>
      </tr>
      <tr>
        <th height="19" align="center" valign="middle" scope="row">&nbsp;</th>
        </tr>
      <tr>
        <th align="center" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Not&iacute;cias</th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td colspan="2"><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <?php
  do { // horizontal looper version 3
?>
                        <td width="378"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                              <tr>
                                  <td width="7%" align="left" valign="top"><a href="noticia.php?id=<?php echo $row_not['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/", "{not.imagem}", 100,75, false); ?>" border="0" class="borda_4pxcinza_escuto" /></a></td>
                                <td width="93%" align="left" valign="top"><p class="titulo_galerias"><?php echo $row_not['titulo']; ?><br />
                                    <?php echo $row_not['data']; ?><br />
                                      <a href="noticia.php?id=<?php echo $row_not['id']; ?>" class="link_12px_preto_n">Ver Not&iacute;cia </a></p></td>
                              </tr>
                                          </table></td>
                        <?php
    $row_not = mysql_fetch_assoc($not);
    if (!isset($nested_not)) {
      $nested_not= 1;
    }
    if (isset($row_not) && is_array($row_not) && $nested_not++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_not); //end horizontal looper version 3
?>
                    </tr>
                  </table>
                    <br />
                    <table border="0" width="50%" align="center">
                      <tr>
                        <td align="center" valign="middle"><?php if ($pageNum_not < $totalPages_not) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_not=%d%s", $currentPage, min($totalPages_not, $pageNum_not + 1), $queryString_not); ?>" class="titulo_galerias">Pr&oacute;xima P&aacute;gina</a>
                          <?php } // Show if not last page ?></td>
                        </tr>
                      <tr>
                        <td width="31%" align="center" valign="middle"><?php if ($pageNum_not > 0) { // Show if not first page ?>
                              <a href="<?php printf("%s?pageNum_not=%d%s", $currentPage, max(0, $pageNum_not - 1), $queryString_not); ?>" class="titulo_galerias">P&aacute;gina Anterior </a>
                              <?php } // Show if not first page ?>                        </td>
                        </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td width="17%">&nbsp;</td>
                  <td width="83%">&nbsp;</td>
                </tr>
              </table></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
        </tr>
      
      <tr>
        <th align="center" valign="middle" scope="row"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
          <tr>
            <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
            <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
            <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
            <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
            <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th class="fonte_10px_preta" scope="row">RealFotos.com.br&copy; - Todos os Direitos Reservados<br />
Desenvolvido por Victor Caetano </th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($destaque);

mysql_free_result($not);
?>