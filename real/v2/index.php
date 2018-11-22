<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);

$maxRows_RSgalerias = 6;
$pageNum_RSgalerias = 0;
if (isset($_GET['pageNum_RSgalerias'])) {
  $pageNum_RSgalerias = $_GET['pageNum_RSgalerias'];
}
$startRow_RSgalerias = $pageNum_RSgalerias * $maxRows_RSgalerias;

mysql_select_db($database_fotos, $fotos);
$query_RSgalerias = "SELECT * FROM galeria ORDER BY id DESC";
$query_limit_RSgalerias = sprintf("%s LIMIT %d, %d", $query_RSgalerias, $startRow_RSgalerias, $maxRows_RSgalerias);
$RSgalerias = mysql_query($query_limit_RSgalerias, $fotos) or die(mysql_error());
$row_RSgalerias = mysql_fetch_assoc($RSgalerias);

if (isset($_GET['totalRows_RSgalerias'])) {
  $totalRows_RSgalerias = $_GET['totalRows_RSgalerias'];
} else {
  $all_RSgalerias = mysql_query($query_RSgalerias);
  $totalRows_RSgalerias = mysql_num_rows($all_RSgalerias);
}
$totalPages_RSgalerias = ceil($totalRows_RSgalerias/$maxRows_RSgalerias)-1;

$maxRows_noticias = 3;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_fotos, $fotos);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $fotos) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

mysql_select_db($database_fotos, $fotos);
$query_onde = "SELECT * FROM onde ORDER BY id DESC";
$onde = mysql_query($query_onde, $fotos) or die(mysql_error());
$row_onde = mysql_fetch_assoc($onde);
$totalRows_onde = mysql_num_rows($onde);
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
              <th width="55%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                <tr>
                  <th height="250" align="center" valign="top" scope="col"><table width="92%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th height="20" align="left" valign="top" class="titulo_galerias" scope="col"><?php echo $row_RSgalerias['nome']; ?> - <?php echo $row_RSgalerias['data']; ?></th>
                      </tr>
                      <tr>
                        <th align="left" valign="top" scope="col"><p><a href="galeria.php?id=<?php echo $row_RSgalerias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/capa/", "{RSgalerias.imagem}");?>" width="400" height="200" border="0" class="borda_4pxcinza_escuto" /></a></p></th>
                      </tr>
                      <tr>
                        <th height="20" align="center" valign="top" scope="row"><span class="texto_11px_preto"><?php echo substr ($row_RSgalerias['descricao'],0, 55)."..."; ?> </span><span class="link_12px_preto_n"><a href="galeria.php?id=<?php echo $row_RSgalerias['id']; ?>" class="link_12px_preto_n">Ver galeria</a></span></th>
                      </tr>
                  </table></th>
                </tr>
                <tr>
                  <th align="left" valign="top" scope="col"> <?php  $row_RSgalerias = mysql_fetch_assoc($RSgalerias)?>
                      <?php do { ?>
                      <table width="100%" border="0" cellspacing="4" cellpadding="0">
                        <tr>
                          <th width="26%" align="center" valign="top" scope="col"><a href="galeria.php?id=<?php echo $row_RSgalerias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/capa/", "{RSgalerias.imagem}", 100, 0, true); ?>" width="100" height="50" border="0" class="borda_4pxcinza_escuto" /></a></th>
                          <th width="74%" align="left" valign="top" scope="col"><span class="titulo_galerias"><?php echo $row_RSgalerias['nome']; ?></span><span class="texto_11px_preto"><br />
                                <?php echo substr ($row_RSgalerias['descricao'],0, 45)."..."; ?><a href="#" class="texto_11px_preto"><br />
                                </a><span class="link_12px_preto_n"><a href="galeria.php?id=<?php echo $row_RSgalerias['id']; ?>" class="link_12px_preto_n">Ver galeria</a></span></span></th>
                        </tr>
                      </table>
                    <?php } while ($row_RSgalerias = mysql_fetch_assoc($RSgalerias)); ?></th>
                </tr>
                <tr>
                  <th align="right" valign="middle" bgcolor="#333333" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <th align="right" valign="middle" scope="row"><span class="titulo_galerias style1"><a href="galerias.php" class="titulo_branco_16px">ver todas as galerias </a></span></th>
                      </tr>
                  </table>                    </th>
                </tr>
                <tr>
                  <th align="right" valign="middle" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                      <th align="left" valign="middle" bgcolor="#666666" scope="row"><span class="titulo_galerias style1">Est&aacute; Procurando sua foto? Ache-a por aqui! </span></th>
                    </tr>
                  </table></th>
                </tr>
                <tr>
                  <th height="110" align="center" valign="middle" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><form id="form2" name="form2" method="get" action="resultado.php">
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_cinza_claro">
                      <tr>
                        <td align="left" valign="bottom" bgcolor="#CCCCCC" class="titulo_galerias">Procure pelo seu nome </td>
                        <td align="left" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="76%" align="left" valign="middle"><label>
                          <input name="busca" type="text" class="borda_cinza_claro"  size="52" />
                        </label></td>
                        <td width="24%" align="left" valign="middle"><label></label>
                          <table width="100%" border="0" cellspacing="0" cellpadding="4">
                            
                            <tr>
                              <td><input name="submit" type="submit"  value="buscar" /></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                                    </form>    </td>
                    </tr>
                    <tr>
                      <td><form id="local" name="local" method="get" action="resultado2.php">
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_cinza_claro">
                      <tr>
                        <td align="left" valign="bottom" bgcolor="#CCCCCC" class="titulo_galerias">Procure pelo nome da praia </td>
                        <td align="left" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="76%" align="left" valign="middle"><label>
                          <input name="busca" type="text" class="borda_cinza_claro"  size="52" />
                        </label></td>
                        <td width="24%" align="left" valign="middle"><label></label>
                            <table width="100%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td><input name="submit2" type="submit"  value="buscar" /></td>
                              </tr>
                          </table></td>
                      </tr>
                    </table>
                                                      </form></td>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
              <th width="45%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                <tr>
                  <th height="23" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <th align="left" valign="top" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tr>
                              <th align="left" valign="middle" bgcolor="#333333" scope="row"><span class="titulo_branco_16px">Not&iacute;cias</span></th>
                            </tr>
                        </table></th>
                      </tr>
                  </table></th>
                </tr>
                <tr>
                  <th align="center" valign="top" scope="col"><?php do { ?>
                      <table width="100%" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <th width="30%" align="center" valign="top" scope="col"><a href="noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/", "{noticias.imagem}", 100, 75, false); ?>" border="0" class="bora_2px" /></a></th>
                            <th width="70%" align="left" valign="top" scope="col"><?php echo $row_noticias['titulo']; ?><br />
                                <span class="texto_11px_preto"><?php echo $row_noticias['data']; ?></span><br />
                                <span class="link_12px_preto_n"><a href="noticia.php?id=<?php echo $row_noticias['id']; ?>" class="link_12px_preto_n"> Leia Mais </a></span></th>
                          </tr>
                          </table>
                      <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></th>
                </tr>
                <tr>
                  <th scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <th align="right" valign="middle" bgcolor="#666666" scope="row"><span class="titulo_galerias style1"><a href="noticias.php" class="titulo_branco_16px">Arquivo de Not&iacute;cias </a></span></th>
                      </tr>
                  </table></th>
                </tr>
                <tr>
                  <th scope="row"><p><a href="#"><img src="img/exclusiva.jpg" alt="exclusiva" width="330" height="80" border="0" /></a></p></th>
                </tr>
                <tr>
                  <th scope="row"><a href="http://www.orkut.com/Community.aspx?cmm=31770276" target="_parent"><img src="img/orkut.jpg" alt="Entre na Comunidade no Orkut!" width="332" height="50" border="0" /></a></th>
                </tr>
                <tr>
                  <th scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                      <th align="left" valign="middle" bgcolor="#666666" scope="row"><span class="titulo_galerias style1"><a href="#" class="titulo_branco_16px">Onde Estaremos! </a></span></th>
                    </tr>
                  </table></th>
                </tr>
                <tr>
                  <th align="center" valign="top" scope="row"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/", "{onde.imagem}");?>" class="borda_4pxcinza_escuto" /></th>
                </tr>
                <tr>
                  <th align="center" valign="top" scope="row"><div align="left">Evento: <span class="titulo_ligth"><?php echo $row_onde['evento']; ?></span><br />
                    Local: <span class="titulo_ligth"><?php echo $row_onde['local']; ?></span><br />
                    Data: <span class="titulo_ligth"><?php echo $row_onde['data']; ?></span><br />
                  </div></th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th colspan="2" scope="row">&nbsp;</th>
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

mysql_free_result($RSgalerias);

mysql_free_result($noticias);

mysql_free_result($onde);
?>