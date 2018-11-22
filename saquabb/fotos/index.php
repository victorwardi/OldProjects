<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_capa = "SELECT * FROM galeria ORDER BY id DESC";
$capa = mysql_query($query_capa, $fotos) or die(mysql_error());
$row_capa = mysql_fetch_assoc($capa);
$totalRows_capa = mysql_num_rows($capa);

$maxRows_fotos = 3;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

mysql_select_db($database_fotos, $fotos);
$query_fotos = "SELECT * FROM fotos_digitais ORDER BY id_foto DESC";
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $fotos) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="105" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="552" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="102" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td><img name="index_r1_c1" src="imagens/index_r1_c1.jpg" width="1" height="17" border="0" id="index_r1_c1" alt="" /></td>
   <td rowspan="11"><img name="index_r1_c2" src="imagens/index_r1_c2.jpg" width="105" height="722" border="0" id="index_r1_c2" alt="" /></td>
   <td rowspan="2"><img src="imagens/index_r1_c3.jpg" alt="" name="index_r1_c3" width="552" height="90" border="0" usemap="#index_r1_c3Map" id="index_r1_c3" /></td>
   <td rowspan="11"><img name="index_r1_c4" src="imagens/index_r1_c4.jpg" width="102" height="722" border="0" id="index_r1_c4" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="10"><img name="index_r2_c1" src="imagens/index_r2_c1.jpg" width="1" height="705" border="0" id="index_r2_c1" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="73" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" align="center" valign="middle" bgcolor="#24282B"><a href="galeria.php?id=<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/capa/", "{capa.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img src="imagens/spacer.gif" width="1" height="331" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r5_c3" src="imagens/index_r5_c3.jpg" width="552" height="36" border="0" id="index_r5_c3" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img src="imagens/index_r6_c3.jpg" alt="" name="index_r6_c3" width="552" height="37" border="0" usemap="#index_r6_c3Map" id="index_r6_c3" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="37" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r7_c3" src="imagens/index_r7_c3.jpg" width="552" height="28" border="0" id="index_r7_c3" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td background="imagens/index_r8_c3.jpg"><table width="100%" border="0" cellspacing="2" cellpadding="0">
     <tr>
       <th width="44%" align="left" valign="middle" scope="col"><img src="imagens/bem.jpg" alt="bem vindo!" width="239" height="100" /></th>
       <th width="56%" scope="col"><table border="0">
           <tr>
             <?php
  do { // horizontal looper version 3
?>
               <td><a href="galeria.php?id=<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/fotos_digitais/", "{fotos.arquivo}", 92, 0, true); ?>" border="0" class="borda_galeria" /></a></td>
               <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
           </tr>
         </table></th>
     </tr>
   </table></td>
   <td><img src="imagens/spacer.gif" width="1" height="105" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r9_c3" src="imagens/index_r9_c3.jpg" width="552" height="48" border="0" id="index_r9_c3" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="48" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r10_c3" src="imagens/index_r10_c3.jpg" width="552" height="14" border="0" id="index_r10_c3" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="14" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r11_c3" src="imagens/index_r11_c3.jpg" width="552" height="32" border="0" id="index_r11_c3" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="32" border="0" alt="" /></td>
  </tr>
</table>

<map name="index_r1_c3Map" id="index_r1_c3Map"><area shape="rect" coords="470,60,496,86" href="index.php" /><area shape="rect" coords="499,61,525,85" href="contato.php" />
</map>
<map name="index_r6_c3Map" id="index_r6_c3Map"><area shape="rect" coords="8,8,99,27" href="index.php" />
<area shape="rect" coords="128,9,213,28" href="galerias.php" />
    <area shape="rect" coords="230,9,320,28" href="quemsomos.php" />
    <area shape="rect" coords="341,10,431,29" href="equipamento.php" />
    <area shape="rect" coords="465,8,527,25" href="contato.php" />
</map></body>
</html>
<?php
mysql_free_result($capa);

mysql_free_result($fotos);
?>
