<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_fotos = 20;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'gatas' ORDER BY id_foto DESC";
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Albúm de Fotos - Victor Saquabb.com.br</title>

<!-- >>>>>>>>>>>>>> Relacionando os Scripts <<<<<<<<<<<<<<<<<<< -->
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>

<style type="text/css">
<!--
body {
	background-color: #0A0702;
}
.borda_foto {
	border: 1px solid #000000;
}
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

<body>
<table width="518" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="litbox/images/img/galeriaaaa_r1_c1.jpg" width="650" height="47" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" background="litbox/images/img/galeriaaaa_r3_c1.jpg"><table width="599" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="352"><table border="0" cellpadding="2">
              <tr>
                <?php
  do { // horizontal looper version 3
?>
                <td> 
				
				
				<a href="<?php echo tNG_showDynamicImage(".", "uploads/fotos/", "{fotos.arquivo}");?>" 
				rel="lightbox[<?php echo $row_fotos['galeria']; ?>]" 
				title="<?php echo $row_fotos['descricao']; ?> - Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?>">
				
				
				
				<img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{fotos.arquivo}", 140, 110, false); ?>" border="0" class="borda_foto" /></a>		
				
				
						</td>
                <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
              </tr>
            </table></td>
          </tr>
        </table></td>
  </tr>
  <tr>
    <td><img src="litbox/images/img/galeriaaaa_r5_c1.jpg" width="650" height="46" /></td>
  </tr>
    <tr>  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($fotos);
?>
