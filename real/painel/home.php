<?php require_once('../Connections/fotos.php'); ?>
<?php
mysql_select_db($database_fotos, $fotos);
$query_comentarios = "SELECT * FROM comentarios_not WHERE aprovado = 'N' ORDER BY id_coment DESC";
$comentarios = mysql_query($query_comentarios, $fotos) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

mysql_select_db($database_fotos, $fotos);
$query_galeria = "SELECT * FROM galeria";
$galeria = mysql_query($query_galeria, $fotos) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_fotos, $fotos);
$query_foto = "SELECT * FROM fotos_digitais";
$foto = mysql_query($query_foto, $fotos) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);

mysql_select_db($database_fotos, $fotos);
$query_fotografo = "SELECT * FROM fotografo";
$fotografo = mysql_query($query_fotografo, $fotos) or die(mysql_error());
$row_fotografo = mysql_fetch_assoc($fotografo);
$totalRows_fotografo = mysql_num_rows($fotografo);

mysql_select_db($database_fotos, $fotos);
$query_local = "SELECT * FROM `local`";
$local = mysql_query($query_local, $fotos) or die(mysql_error());
$row_local = mysql_fetch_assoc($local);
$totalRows_local = mysql_num_rows($local);

mysql_select_db($database_fotos, $fotos);
$query_comentes = "SELECT * FROM comentarios_not";
$comentes = mysql_query($query_comentes, $fotos) or die(mysql_error());
$row_comentes = mysql_fetch_assoc($comentes);
$totalRows_comentes = mysql_num_rows($comentes);

mysql_select_db($database_fotos, $fotos);
$query_design = "SELECT * FROM design";
$design = mysql_query($query_design, $fotos) or die(mysql_error());
$row_design = mysql_fetch_assoc($design);
$totalRows_design = mysql_num_rows($design);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - Real Fotos &amp; Design</title>
<!-- InstanceEndEditable -->
<link href="../stilo.css" rel="stylesheet" type="text/css" />
<link href="arquivos/painel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="700" border="1" cellpadding="0" cellspacing="2" bordercolor="#313639">
      
      <tr>
        <th height="46" colspan="2" align="center" valign="middle" bgcolor="#313639" scope="row"><img src="arquivos/img/topo2.jpg" width="600" height="80" /></th>
        </tr>
      <tr>
        <th width="153" height="501" align="center" valign="top" bgcolor="#313639" scope="row"><table width="100%" border="0" cellpadding="2" cellspacing="4" id="navigation">
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Galeria</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/galeria_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/galeria_edite.php">Editar/Excluir</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Foto</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/foto_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/foto_edite.php">Editar/Excluir</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Local</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/local_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/local_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Fot&oacute;grafo</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/fotografo_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/fotografo_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Design</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/design_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/design_edite.php">Editar/Excluir</a></th>
          </tr>
          
          
          
          
          
          
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Coment&aacute;rios</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/comentarios_aprovar.php">Aprovar/Excluir</a></th>
          </tr>
          
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Usu&aacute;rio</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/user_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="arquivos/user_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Logout</th>
          </tr>
          <tr>
            <th align="center" valign="middle" class="Titulo_galeria" scope="row"><a href="http://www.realfotos.com.br">Sair</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row">&nbsp;</th>
          </tr>
          
        </table></th>
        <td width="541" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="2" cellpadding="4">
            
            <tr>
              <th align="left" class="Titulo_galeria" scope="col">Bem Vindo ao Administrativo do Site RealFotos.com.br!</th>
            </tr>
            <tr>
              <th align="left" class="Titulo_galeria" scope="col"><table width="100%" border="1" cellpadding="4" cellspacing="2" bordercolor="#313639">
                <tr>
                  <th align="left" bgcolor="#313639" scope="col">Estat&iacute;sticas do Site </th>
                  </tr>
                <tr>
                  <th width="67%" align="left" class="menu" scope="row">Total de Galerias : <span class="estatiticas"><?php echo $totalRows_galeria ?></span> </th>
                  </tr>
                <tr>
                  <th align="left" class="menu" scope="row">Total de Fotos : <span class="estatiticas"><?php echo $totalRows_foto ?></span></th>
                  </tr>
                <tr>
                  <th align="left" class="menu" scope="row">Total de Fot&oacute;grafos : <span class="estatiticas"><?php echo $totalRows_fotografo ?></span></th>
                  </tr>
                <tr>
                  <th align="left" class="menu" scope="row">Total de Locais : <span class="estatiticas"><?php echo $totalRows_local ?></span></th>
                  </tr>
                <tr>
                  <th align="left" class="menu" scope="row">Total de Designs : <span class="estatiticas"><?php echo $totalRows_design ?></span></th>
                  </tr>
                <tr>
                  <th align="left" class="menu" scope="row">Total de Coment&aacute;rios : <span class="estatiticas"><?php echo $totalRows_comentes ?></span></th>
                  </tr>
                
              </table></th>
            </tr>
            <tr>
              <th align="left" class="Titulo_galeria" scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th align="left" scope="col"><table width="100%" border="1" cellpadding="4" cellspacing="2" bordercolor="#313639">
                <tr>
                  <th align="left" valign="middle" bgcolor="#313639" class="titulo_menu" scope="col">Falta(m) <?php echo $totalRows_comentarios ?> coment&aacute;rio(s) esperando &agrave; ser(em) aprovado(s)! </th>
                </tr>
                <tr>
                  <th scope="col"><?php do { ?>
                      <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#313639">
                        <tr>
                          <th align="center" valign="middle" bgcolor="#313639" class="titulo_coment" scope="col">Nome</th>
                          <th align="center" valign="middle" bgcolor="#313639" class="titulo_coment" scope="col">Coment&aacute;rio</th>
                        </tr>
                        <tr>
                            <th width="28%" align="center" valign="middle" class="titulo_coment" scope="col"><?php echo $row_comentarios['nome']; ?></th>
                          <th width="72%" align="left" valign="middle" class="titulo_coment" scope="col"><?php echo $row_comentarios['comentario']; ?></th>
                        </tr>
                                            </table>
                      <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></th>
                </tr>
                <tr>
                  <th bgcolor="#313639" scope="col"><a href="../painel/arquivos/comentarios_aprovar.php">Aprovar/Excluir Comentarios </a></th>
                </tr>
              </table></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      <tr>
        <th height="37" colspan="2" bgcolor="#313639" scope="row">&nbsp;</th>
        </tr>
    </table></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($comentarios);

mysql_free_result($galeria);

mysql_free_result($foto);

mysql_free_result($fotografo);

mysql_free_result($local);

mysql_free_result($comentes);

mysql_free_result($design);
?>
