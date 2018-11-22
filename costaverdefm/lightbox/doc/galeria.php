<?php require_once('../../Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_fotos = "SELECT * FROM fotos ORDER BY id_foto ASC";
$fotos = mysql_query($query_fotos, $CostaverdeFM) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/screen.css" 		type="text/css" rel="stylesheet" media="screen">
	<link href="../css/lightboxEx.css" 	type="text/css" rel="stylesheet" media="screen">
	
	<script src="../js/prototype.js" 	type="text/javascript"></script>
	<script src="../js/scriptaculous.js" 	type="text/javascript"></script>
	<script src="../js/effects.js"		type="text/javascript"></script>
	<script src="../js/Sound.js" 		type="text/javascript"></script>
	<script src="../js/lightboxEx.js" 	type="text/javascript"></script>
</head>

<body>

<div class="section clearfix">

	<h2>&nbsp;</h2>

	
	<h3 style="clear: both;">Slideshow</h3>
	<div class="thumbnail">
	<a href="<?php echo tNG_showDynamicImage("../../", "../../fotos/", "{fotos.arquivo}");?>" rel="lightbox[fotos]" slideshowwidth=-1 slideshowheight=-1><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../fotos/", "{fotos.arquivo}", 100, 75, true); ?>" alt="SlideShow"></a>
	</div>
	
	<?php do { ?>
	  <a href="<?php echo tNG_showDynamicImage("../../", "../../fotos/", "{fotos.arquivo}");?>" rel="lightbox[fotos]"></a>
	  <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>
	
</div>

</body>
</html>
<?php
mysql_free_result($fotos);
?>