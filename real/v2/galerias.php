<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);

$maxRows_galerias = 12;
$pageNum_galerias = 0;
if (isset($_GET['pageNum_galerias'])) {
  $pageNum_galerias = $_GET['pageNum_galerias'];
}
$startRow_galerias = $pageNum_galerias * $maxRows_galerias;

mysql_select_db($database_fotos, $fotos);
$query_galerias = "SELECT * FROM galeria ORDER BY id DESC";
$query_limit_galerias = sprintf("%s LIMIT %d, %d", $query_galerias, $startRow_galerias, $maxRows_galerias);
$galerias = mysql_query($query_limit_galerias, $fotos) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);

if (isset($_GET['totalRows_galerias'])) {
  $totalRows_galerias = $_GET['totalRows_galerias'];
} else {
  $all_galerias = mysql_query($query_galerias);
  $totalRows_galerias = mysql_num_rows($all_galerias);
}
$totalPages_galerias = ceil($totalRows_galerias/$maxRows_galerias)-1;
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
              <th align="left" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Galerias de Fotos </th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="row"> <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <?php
  do { // horizontal looper version 3
?>
                    <td><table width="100" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <th align="center" valign="middle" scope="col">&nbsp;<a href="galeria.php?id=<?php echo $row_galerias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/capa/", "{galerias.imagem}", 250, 125, false); ?>" border="0" class="borda_4pxcinza_escuto" /></a></th>
                          </tr>
                          <tr>
                            <th align="center" valign="middle" class="link_12px_preto_n" scope="row"><a href="galeria.php?id=<?php echo $row_galerias['id']; ?>" class="link_12px_preto_n"><?php echo $row_galerias['nome']; ?> - <?php echo $row_galerias['data']; ?></a></th>
                          </tr>
                                  </table></td>
                    <?php
    $row_galerias = mysql_fetch_assoc($galerias);
    if (!isset($nested_galerias)) {
      $nested_galerias= 1;
    }
    if (isset($row_galerias) && is_array($row_galerias) && $nested_galerias++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_galerias); //end horizontal looper version 3
?>
                </tr>
              </table>
                <p>&nbsp;</p></th>
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

mysql_free_result($galerias);
?>