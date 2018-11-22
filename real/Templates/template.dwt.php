<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Real Fotos.com.br</title>
<!-- TemplateEndEditable -->
<link href="../v2/css/stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
</head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="right" valign="middle" scope="col"><table width="592" border="0" cellpadding="4" cellspacing="0" id="menu">
      <tr>
        <th width="45" align="center" valign="middle" class="menu" scope="col"><a href="../v2/index.php">home</a></th>
        <th width="63" align="center" valign="middle" class="menu" scope="col"><a href="../v2/noticias.php">not&iacute;cias</a></th>
        <th width="67" align="center" valign="middle" class="menu" scope="col"><a href="../v2/galerias.php">galerias </a></th>
        <th width="109" align="center" valign="middle" class="menu" scope="col"><a href="../v2/quemsomos.php">quem somos</a></th>
        <th width="67" align="center" valign="middle" class="menu" scope="col"><a href="../v2/servicos.php">servi&ccedil;os</a></th>
        <th width="127" align="center" valign="middle" class="menu" scope="col"><a href="../v2/compre.php">compre sua foto </a></th>
        <th width="58" align="center" valign="middle" class="menu" scope="col"><a href="../v2/contato.php">contato</a></th>
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
        <th align="center" valign="top" scope="row"><!-- TemplateBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
            </tr>
          </table>
        <!-- TemplateEndEditable --></th>
        </tr>
      
      <tr>
        <th align="center" valign="middle" scope="row"><table width="592" border="0" cellpadding="4" cellspacing="0" id="menu">
          <tr>
            <th width="45" align="center" valign="middle" class="menu" scope="col"><a href="../v2/index.php">home</a></th>
            <th width="63" align="center" valign="middle" class="menu" scope="col"><a href="../v2/noticias.php">not&iacute;cias</a></th>
            <th width="67" align="center" valign="middle" class="menu" scope="col"><a href="../v2/galerias.php">galerias </a></th>
            <th width="109" align="center" valign="middle" class="menu" scope="col"><a href="../v2/quemsomos.php">quem somos</a></th>
            <th width="67" align="center" valign="middle" class="menu" scope="col"><a href="../v2/servicos.php">servi&ccedil;os</a></th>
            <th width="127" align="center" valign="middle" class="menu" scope="col"><a href="../v2/compre.php">compre sua foto </a></th>
            <th width="58" align="center" valign="middle" class="menu" scope="col"><a href="../v2/contato.php">contato</a></th>
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
</html>
<?php
mysql_free_result($destaque);
?>