<?php require_once('../Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_noticia = "-1";
if (isset($_GET['id'])) {
  $colname_noticia = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_xpress, $xpress);
$query_noticia = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id DESC", $colname_noticia);
$noticia = mysql_query($query_noticia, $xpress) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);
$totalRows_noticia = mysql_num_rows($noticia);
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
          <th colspan="2" align="left" valign="top" bgcolor="#585F89" class="titulo_not" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
              <tr>
                <th align="left" valign="middle" class="branco_14" scope="col">Novidade - <?php echo $row_noticia['titulo']; ?></th>
              </tr>
          </table></th>
        </tr>
        <tr>
          <th width="9%" rowspan="2" align="left" valign="top" scope="col"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticia.foto}", 250, 0, true); ?>" class="borda_4px" /></th>
          <th align="left" valign="top" class="sub_not_data" scope="col"><span class="fonte">Data:</span> <?php echo $row_noticia['data']; ?> - <span class="fonte">Autor:</span> <?php echo $row_noticia['fonte']; ?></th>
        </tr>
        <tr>
          <th width="91%" align="left" valign="top" scope="col"><?php echo $row_noticia['materia']; ?></th>
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
mysql_free_result($noticia);
?>