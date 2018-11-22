<?php require_once('../../Connections/CostaverdeFM.php'); ?>
<?php require_once('../../Connections/CostaverdeFM.php'); ?><?php
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_galeria = "SELECT * FROM galeria";
$galeria = mysql_query($query_galeria, $CostaverdeFM) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_fotos = "SELECT * FROM fotos";
$fotos = mysql_query($query_fotos, $CostaverdeFM) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_mp3 = "SELECT * FROM mp3";
$mp3 = mysql_query($query_mp3, $CostaverdeFM) or die(mysql_error());
$row_mp3 = mysql_fetch_assoc($mp3);
$totalRows_mp3 = mysql_num_rows($mp3);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_promo = "SELECT * FROM promo";
$promo = mysql_query($query_promo, $CostaverdeFM) or die(mysql_error());
$row_promo = mysql_fetch_assoc($promo);
$totalRows_promo = mysql_num_rows($promo);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_recados = "SELECT * FROM comentarios WHERE aprovado = 'N' ORDER BY id_coment DESC";
$recados = mysql_query($query_recados, $CostaverdeFM) or die(mysql_error());
$row_recados = mysql_fetch_assoc($recados);
$totalRows_recados = mysql_num_rows($recados);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle Costa Verde FM</title>
<!-- InstanceEndEditable -->
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="home.php">Home</a></th>
          </tr>
        </table></th>
      </tr>
      
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fotos </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="foto_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Galerias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="galeria_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Top 12 </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <th scope="row"><a href="top_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Mp3</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="mp3_edite.php"> Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Recados</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="row"><a href="recados_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fique Ligado </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="ligado_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Promo&ccedil;&otilde;es</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="promo_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Equipe</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="equipe_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Programa</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="programa_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <th align="left" class="top_num" scope="col">Bem Vindo ao Painel de Controle do Site Costa Verde FM! </th>
              </tr>
              <tr>
                <th align="left" class="top_musica" scope="row">Utilize o menu ao lado para gerenciar o conte&uacute;do do site. </th>
              </tr>
              <tr>
                <th align="left" scope="row"><table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#D7FFDD" class="borda_preta_1px">
                  <tr>
                    <th height="24" align="left" bgcolor="#3A9456" class="titulo_anuncio" scope="col">Estat&iacute;sticas</th>
                  </tr>
                  <tr>
                    <th align="left" scope="row"><span class="top_cantor">Galeria de Fotos  cadastradas:</span> <span class="fonte11px_preta_bold"><?php echo $totalRows_galeria ?></span> </th>
                  </tr>
                  <tr>
                    <th align="left" scope="row"> <span class="top_cantor">Fotos cadastradas</span>: <span class="fonte11px_preta_bold"><?php echo $totalRows_fotos ?> </span></th>
                  </tr>
                  <tr>
                    <th align="left" scope="row"><span class="top_cantor">Mp3 cadastradas</span>: <span class="fonte11px_preta_bold"><?php echo $totalRows_mp3 ?> </span></th>
                  </tr>
                  <tr>
                    <th align="left" scope="row"><span class="top_cantor">Promo&ccedil;&otilde;es  cadastradas</span>: <span class="fonte11px_preta_bold"><?php echo $totalRows_promo ?> </span></th>
                  </tr>
                  <tr>
                    <th align="left" scope="row">&nbsp;</th>
                  </tr>
                </table></th>
              </tr>
              <tr>
                <th align="left" scope="row"><table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#D7FFDD" class="borda_preta_1px">
                  <tr>
                    <th height="24" align="left" bgcolor="#3A9456" class="titulo_anuncio" scope="col">Recados Aguardando Aprova&ccedil;&atilde;o: <span class="fonte11px_branca_negrito"><?php echo $totalRows_recados ?> </span></th>
                  </tr>

                  <tr>
                    <th align="left" scope="row"><?php do { ?>
                          <?php if ($totalRows_recados > 0) { // Show if recordset not empty ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="4" class="borda_pont_preta_botton">
                              <tr>
                                <th width="39%" height="24" scope="col">De: <span class="recado"><?php echo $row_recados['de']; ?></span>  Para: <span class="recado"><?php echo $row_recados['para']; ?></span></th>
                              <th width="46%" class="recado" scope="col"><span class="top_cantor">Recado:</span> <?php echo $row_recados['comentario']; ?></th>
                              <th width="15%" scope="col"><a href="recados_add.php?id_coment=<?php echo $row_recados['id_coment']; ?>" class="top_cantor">Aprovar/Excluir</a></th>
                            </tr>
                                </table>
                            <?php } // Show if recordset not empty ?>
                          <?php } while ($row_recados = mysql_fetch_assoc($recados)); ?></th>
                  </tr>
                </table></th>
              </tr>
              <tr>
                <th align="left" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="left" scope="row">&nbsp;</th>
              </tr>
            </table></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#3A9456"><span class="fonte11px_branca_negrito">Painel de Controle Desenvolvido por Victor Caetano e Ded&eacute; Siqueira </span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($galeria);

mysql_free_result($fotos);

mysql_free_result($mp3);

mysql_free_result($promo);

mysql_free_result($recados);
?>
