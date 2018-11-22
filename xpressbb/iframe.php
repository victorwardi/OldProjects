<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_noticia = 4;
$pageNum_noticia = 0;
if (isset($_GET['pageNum_noticia'])) {
  $pageNum_noticia = $_GET['pageNum_noticia'];
}
$startRow_noticia = $pageNum_noticia * $maxRows_noticia;

mysql_select_db($database_xpress, $xpress);
$query_noticia = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticia = sprintf("%s LIMIT %d, %d", $query_noticia, $startRow_noticia, $maxRows_noticia);
$noticia = mysql_query($query_limit_noticia, $xpress) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);

if (isset($_GET['totalRows_noticia'])) {
  $totalRows_noticia = $_GET['totalRows_noticia'];
} else {
  $all_noticia = mysql_query($query_noticia);
  $totalRows_noticia = mysql_num_rows($all_noticia);
}
$totalPages_noticia = ceil($totalRows_noticia/$maxRows_noticia)-1;

$maxRows_ofertas = 3;
$pageNum_ofertas = 0;
if (isset($_GET['pageNum_ofertas'])) {
  $pageNum_ofertas = $_GET['pageNum_ofertas'];
}
$startRow_ofertas = $pageNum_ofertas * $maxRows_ofertas;

mysql_select_db($database_xpress, $xpress);
$query_ofertas = "SELECT * FROM ofertas ORDER BY id DESC";
$query_limit_ofertas = sprintf("%s LIMIT %d, %d", $query_ofertas, $startRow_ofertas, $maxRows_ofertas);
$ofertas = mysql_query($query_limit_ofertas, $xpress) or die(mysql_error());
$row_ofertas = mysql_fetch_assoc($ofertas);

if (isset($_GET['totalRows_ofertas'])) {
  $totalRows_ofertas = $_GET['totalRows_ofertas'];
} else {
  $all_ofertas = mysql_query($query_ofertas);
  $totalRows_ofertas = mysql_num_rows($all_ofertas);
}
$totalPages_ofertas = ceil($totalRows_ofertas/$maxRows_ofertas)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style10 {font-size: 10px}
.style8 {	font-size: 11px;
	color: #CA320D;
}
.style9 {color: #000000}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #666666;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style11 {font-size: 10}
.borda {
	border: 1px solid #000000;
}
.style14 {color: #FFFFFF}
.style16 {font-size: 10px; color: #FF0000; }
.mao {
	cursor: hand;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col"><table width="92%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="27%" height="298" align="center" valign="top" scope="col"><table width="54%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="Untitled2_r1_c1" src="images/fale_topo.jpg" width="148" height="5" border="0" id="Untitled2_r1_c1" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="images/fale_fundo.jpg"><table width="71%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col"><table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CB2E00">
                        <tr>
                          <th height="22" scope="col"><img src="images/fale_conosco.jpg" width="106" height="20" /></th>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th width="144" scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <td height="176" align="center" valign="bottom" background="imagens_retalhos/fale_conosco_fundo.jpg"><table border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <th scope="col"><iframe src="comentarios/comentario.php" name="coments" width="135" height="150" frameborder="no" id="coments"></iframe>
                                 
                                <div align="center"></div></th>
                            </tr>
                          </table>
                          <img src="comentarios/comentar.jpg" width="100" height="20" border="0" class="mao" onclick="MM_openBrWindow('comentarios/inserir.php','','width=360,height=250')" /></td>
                      </tr>
                      
                    </table></td>
                  </tr>
                  
                </table>
                </td>
            </tr>
            <tr>
              <td align="center" valign="top"><img name="Untitled2_r5_c1" src="images/fale_base.jpg" width="148" height="6" border="0" id="Untitled2_r5_c1" alt="" /></td>
            </tr>
          </table>
            <a href="onde.php"><img src="images/propaganda.gif" alt="Encomendas" width="142" height="70" border="0" /></a></th>
        <th width="73%" align="center" valign="top" scope="col"><table width="88%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img src="images/destaque_topo.jpg" width="382" height="7" /></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="images/destaque_fundo.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th align="center" valign="middle" scope="col"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <th bgcolor="#C83300" scope="col"><div align="left"><img src="images/destaque.jpg" width="86" height="21" /></div></th>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <th width="44%" align="center" valign="top" scope="col"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <th height="23" align="center" valign="middle" scope="col"><div align="right" class="style8 style10">
                                  <div align="center"><?php echo $row_noticia['data']; ?></div>
                                </div></th>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><span class="style10"><a href="exibir_not.php?id=<?php echo $row_noticia['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticia.foto}", 100, 75, false); ?>" border="0" class="borda" /></a></a></span></td>
                              </tr>
                              <tr>
                                <td><div align="center" class="style8 style9 style10"><a href="exibir_not.php?id=<?php echo $row_noticia['id']; ?>"><?php echo substr($row_noticia['titulo'] ,0,40)."..."; ?></a></div>                                  </td>
                              </tr>
                            </table>
                              <br /><?php $row_noticia = mysql_fetch_assoc($noticia);?></th>
                          <th width="2%" height="160" align="center" valign="middle" scope="col"><p><img src="images/barra_meio.jpg" width="5" height="134" /></p></th>
                          <th width="54%" align="center" valign="middle" scope="col">
                              <?php do { ?>
                                <table width="98%" border="0" cellspacing="2" cellpadding="0">
                                  <tr>
                                    <th width="11%" height="13" align="left" valign="middle" scope="col"><a href="exibir_not.php?id=<?php echo $row_noticia['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticia.foto}", 50, 35, false); ?>" border="0" class="borda" /></a></th>
                                    <th width="89%" align="left" valign="top" scope="col"><div align="left" class="style9 style10"><a href="exibir_not.php?id=<?php echo $row_noticia['id']; ?>"><?php echo substr($row_noticia['titulo'] ,0,25)."..."; ?></a> </div></th>
                                  </tr>
                                </table>
                                <?php } while ($row_noticia = mysql_fetch_assoc($noticia)); ?>
                              <p class="style10"><a href="arquivo.php">Arquivo de  Not&iacute;cias </a><br />
                              </p></th>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <th width="63%" bgcolor="#CA320D" scope="col"><div align="left"><img src="images/oferta.jpg" width="65" height="20" /></div></th>
                          <th width="37%" align="center" valign="middle" bgcolor="#CA320D" class="style10 style14" scope="col"><a href="ofertas.php" class="barnco">Mais ofertas</a> </th>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="95" align="center" valign="middle"><table width="95%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="78" align="center" valign="middle"><table border="0" cellspacing="4">
                          <tr>
                            <?php
  do { // horizontal looper version 3
?>
                              <td><table width="17%" border="0" cellpadding="0" cellspacing="1">
                                  <tr>
                                    <td align="center" valign="middle"><a href="exibir_oferta.php?id=<?php echo $row_ofertas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{ofertas.foto}", 100, 75, false); ?>" border="0" class="borda" /></a></td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle"><span class="style10"><a href="exibir_oferta.php?id=<?php echo $row_ofertas['id']; ?>"><?php echo substr ($row_ofertas['nome'],0,17); ?></a> </span></td>
                                  </tr>
                              </table></td>
                              <?php
    $row_ofertas = mysql_fetch_assoc($ofertas);
    if (!isset($nested_ofertas)) {
      $nested_ofertas= 1;
    }
    if (isset($row_ofertas) && is_array($row_ofertas) && $nested_ofertas++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_ofertas); //end horizontal looper version 3
?>
                          </tr>
                        </table>
</td>
                        </tr>
                    </table>
                    </tr>
              </table></td>
            </tr>
            <tr>
              <td height="18" align="center" valign="top"><img src="images/destaque_base.jpg" width="382" height="7" /></td>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($noticia);

mysql_free_result($ofertas);
?>

