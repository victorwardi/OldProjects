<?php require_once('Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_capa = 3;
$pageNum_capa = 0;
if (isset($_GET['pageNum_capa'])) {
  $pageNum_capa = $_GET['pageNum_capa'];
}
$startRow_capa = $pageNum_capa * $maxRows_capa;

mysql_select_db($database_fotos, $fotos);
$query_capa = "SELECT * FROM galeria ORDER BY id DESC";
$query_limit_capa = sprintf("%s LIMIT %d, %d", $query_capa, $startRow_capa, $maxRows_capa);
$capa = mysql_query($query_limit_capa, $fotos) or die(mysql_error());
$row_capa = mysql_fetch_assoc($capa);

if (isset($_GET['totalRows_capa'])) {
  $totalRows_capa = $_GET['totalRows_capa'];
} else {
  $all_capa = mysql_query($query_capa);
  $totalRows_capa = mysql_num_rows($all_capa);
}
$totalPages_capa = ceil($totalRows_capa/$maxRows_capa)-1;

$maxRows_design = 7;
$pageNum_design = 0;
if (isset($_GET['pageNum_design'])) {
  $pageNum_design = $_GET['pageNum_design'];
}
$startRow_design = $pageNum_design * $maxRows_design;

mysql_select_db($database_fotos, $fotos);
$query_design = "SELECT * FROM design ORDER BY id ASC";
$query_limit_design = sprintf("%s LIMIT %d, %d", $query_design, $startRow_design, $maxRows_design);
$design = mysql_query($query_limit_design, $fotos) or die(mysql_error());
$row_design = mysql_fetch_assoc($design);

if (isset($_GET['totalRows_design'])) {
  $totalRows_design = $_GET['totalRows_design'];
} else {
  $all_design = mysql_query($query_design);
  $totalRows_design = mysql_num_rows($all_design);
}
$totalPages_design = ceil($totalRows_design/$maxRows_design)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/modelo.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>_______ REAL?! ____________Fotos &amp; Design _________________________________</title>
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
<base href="http://www.realfotos.com.br/" />

<!--Fireworks 8 Dreamweaver 8 target.  Created Tue Feb 27 10:36:14 GMT-0300 (Hora oficial do Brasil) 2007-->
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="imagens/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body bgcolor="#313639">
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="104" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="552" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="103" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td><img name="index2_r1_c1" src="imagens/index2_r1_c1.jpg" width="1" height="17" border="0" id="index2_r1_c1" alt="" /></td>
   <td rowspan="2" colspan="3"><img src="imagens/index2_r1_c2.jpg" alt="" name="index2_r1_c2" width="759" height="91" border="0" usemap="#index2_r1_c2Map" id="index2_r1_c2" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index2_r2_c1" src="imagens/index2_r2_c1.jpg" width="1" height="74" border="0" id="index2_r2_c1" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="74" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="index2_r3_c1" src="imagens/index2_r3_c1.jpg" width="105" height="332" border="0" id="index2_r3_c1" alt="" /></td>
   <td align="center" valign="middle"><a href="galeria.php?id=<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "fotos/capa/", "{capa.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
   <td><img name="index2_r3_c4" src="imagens/index2_r3_c4.jpg" width="103" height="332" border="0" id="index2_r3_c4" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="332" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="index2_r4_c1" src="imagens/index2_r4_c1.jpg" width="760" height="34" border="0" id="index2_r4_c1" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4" align="center" valign="top" bgcolor="#575C60"><table width="80%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <th bgcolor="#575C60" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#24282B" class="borda_menu">
         <tr>
           <th width="9%" height="28" align="center" valign="middle" class="menu" scope="col"><a href="index.php">Home</a></th>
           <th width="2%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="22%" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">Galerias de Fotos </a></th>
           <th width="2%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="14%" align="center" valign="middle" class="menu" scope="col"><a href="design.php">Design</a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="21%" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">Quem Somos </a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="14%" align="center" valign="middle" class="menu" scope="col"><a href="servico.php">Servi&ccedil;os</a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="13%" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">Contato</a></th>
         </tr>
       </table></th>
     </tr>
     <tr>
       <th scope="row"><!-- InstanceBeginEditable name="conteudo" -->
         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#575C60" bgcolor="#34393C">
           <tr>
             <th height="108" align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#575C60" bgcolor="#34393C" class="borda_menu">
               <tr>
                 <th width="46%" height="108" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <th align="left" valign="middle" scope="col"><img src="imagens/titulos/bem.jpg" width="130" height="20" /></th>
                     </tr>
                     <tr>
                       <th scope="row">&nbsp;</th>
                     </tr>
                 </table></th>
                 <th width="54%" align="left" valign="top" scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="2">
                     <tr>
                       <th align="left" valign="middle" scope="col"><img src="imagens/titulos/ult_gal.jpg" width="130" height="20" /></th>
                     </tr>
                     <tr>
                       <th align="left" valign="top" scope="row"><table border="0">
                           <tr>
                             <?php
  do { // horizontal looper version 3
?>
                             <td><table width="40%" border="0" cellspacing="0" cellpadding="0">
                                 <tr>
                                   <th align="center" valign="middle" scope="col"><span class="texto_galeria"><a href="galeria/<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/capa/", "{capa.imagem}", 105, 0, true); ?>" border="0" class="borda_galeria" /></a></span></th>
                                 </tr>
                                 <tr>
                                   <th align="center" valign="middle" scope="row"><span class="texto_galeria"><?php echo $row_capa['nome']; ?></span></th>
                                 </tr>
                             </table></td>
                             <?php
    $row_capa = mysql_fetch_assoc($capa);
    if (!isset($nested_capa)) {
      $nested_capa= 1;
    }
    if (isset($row_capa) && is_array($row_capa) && $nested_capa++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_capa); //end horizontal looper version 3
?>
                           </tr>
                       </table></th>
                     </tr>
                 </table></th>
               </tr>
             </table>
               <table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_menu">
                 <tr>
                   <th align="left" valign="top" scope="col"><img src="imagens/titulos/design.jpg" alt="Design" width="90" height="20" /></th>
                 </tr>
                 <tr>
                   <th height="74" align="center" valign="middle" scope="row"><table border="0" cellpadding="2" cellspacing="1">
                     <tr>
                       <?php
  do { // horizontal looper version 3
?>
                       <td><a href="<?php echo tNG_showDynamicImage("", "design/", "{design.arquivo}");?>" 
				rel="lightbox[<?php echo $row_design['design']; ?>]" 
				title="<?php echo $row_design['descricao']; ?> &lt;br /&gt;
Autor: <?php echo $row_design['autor']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "design/", "{design.arquivo}", 78,55, false); ?>" border="0" class="borda_galeria" /></a></td>
                       <?php
    $row_design = mysql_fetch_assoc($design);
    if (!isset($nested_design)) {
      $nested_design= 1;
    }
    if (isset($row_design) && is_array($row_design) && $nested_design++ % 7==0) {
      echo "</tr><tr>";
    }
  } while ($row_design); //end horizontal looper version 3
?>
                     </tr>
                   </table></th>
                 </tr>
               </table>
               <table width="102%" border="0" cellpadding="0" cellspacing="0" class="borda_menu">
                 <tr>
                   <th colspan="6" align="left" valign="top" bgcolor="#34393C" scope="col"><img src="imagens/titulos/publ.jpg" alt="Publicidade" width="130" height="20" /></th>
                 </tr>
                 <tr>
                   <th width="29%" height="56" align="center" valign="middle" scope="row"><a href="http://www.saquabb.com.br" target="_blank"><img src="imagens/parceiros/saquabb.jpg" alt="Saquabb.com.br" width="150" height="40" border="0" /></a></th>
                   <td width="10%" align="center" valign="middle">&nbsp;</td>
                   <td width="15%" align="center" valign="middle">&nbsp;</td>
                   <td width="17%" align="center" valign="middle">&nbsp;</td>
                   <td width="8%" align="center" valign="middle">&nbsp;</td>
                   <td width="21%" align="center" valign="middle">&nbsp;</td>
                 </tr>
               </table></th>
           </tr>
         </table>
       <!-- InstanceEndEditable --></th>
     </tr>
     <tr>
       <th scope="row"><table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#24282B" class="borda_menu">
         <tr>
           <th class="texto_rodape2" scope="col">Proibida c&oacute;pia total ou parcial de qualquer conte&uacute;do deste site, sem autoriza&ccedil;&atilde;o! </th>
         </tr>
       </table></th>
     </tr>
     <tr>
       <th height="18" class="texto_rodape2" scope="row">RealFotos.com.br&reg; - 2007 - Todos os direitos reservados </th>
     </tr>
     <tr>
       <th height="76" align="center" valign="middle" scope="row"><a href="http://www.saquaonline.com.br" target="_blank"><img src="imagens/saquaonline.jpg" alt="SaquaOnline" width="60" height="55" border="0" /></a></th>
     </tr>
     
     
   </table></td>
   <td><img src="imagens/spacer.gif" width="1" height="265" border="0" alt="" /></td>
  </tr>
</table>

<map name="index2_r1_c2Map" id="index2_r1_c2Map"><area shape="rect" coords="577,63,601,83" href="index.php" alt="Home" />
<area shape="rect" coords="604,63,631,84" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($capa);

mysql_free_result($design);
?>
