<?php require_once('../../Connections/saquabb.php'); ?>
<?php require_once('../../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

$colname_comentarios = "-1";
if (isset($_GET['id'])) {
  $colname_comentarios = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_comentarios = sprintf("SELECT * FROM comentarios_gf WHERE id = %s AND aprovado = 'y' ORDER BY id_coment DESC", $colname_comentarios);
$comentarios = mysql_query($query_comentarios, $saquabb) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

$colname_gabriel = "-1";
if (isset($_GET['id'])) {
  $colname_gabriel = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_gabriel = sprintf("SELECT * FROM gabriel WHERE id = %s ORDER BY id DESC", $colname_gabriel);
$gabriel = mysql_query($query_gabriel, $saquabb) or die(mysql_error());
$row_gabriel = mysql_fetch_assoc($gabriel);
$totalRows_gabriel = mysql_num_rows($gabriel);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" href="../../litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../../litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../../litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../../litbox/js/lightbox.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {
	color: #000000;
	font-size: 14px;
}
.style3 {
	font-size: 14px;
	font-weight: bolder;
	color: #333333;
}
-->
</style><!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="617" border="0" cellpadding="4" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <td width="60%" height="17" align="left" bgcolor="#FFFFFF" class="Titulo_Branco"><span class="perfil_nome"><img src="../imagens/coluna_gabriel.jpg" alt="gabriel _ Qu&eacute; se eu?" width="602" height="200" /></span></td>
            </tr>
            
            <tr>
              <td align="center" valign="middle" class="perfil_nome"><div align="center" class="style3">
                <div align="left"><?php echo $row_gabriel['titulo']; ?></div>
              </div></td>
            </tr>
            <tr>
              <td height="36" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                  <tr>
                    <td height="20" align="left" class="style2"><?php echo $row_gabriel['data']; ?> </td>
                  </tr>
                  <tr>
                    <td height="108" align="left" bgcolor="#FFFFFF"><table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td width="54"><table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                          <tr>
                            <td width="41" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../../uploads/fotos/", "{gabriel.foto1}");?>" rel="lightbox" title="<?php echo $row_gabriel['desc1']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_gabriel['fotografo1']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{gabriel.foto1}", 200, 0, true); ?>" border="0" /></a></td>
                          </tr>
                        </table>
                          <br />
                          <?php 
// Show If File Exists (region3)
if (tNG_fileExists("../../uploads/fotos/", "{gabriel.foto2}")) {
?>
                            <table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td width="41" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../../uploads/fotos/", "{gabriel.foto2}");?>" rel="lightbox" title="<?php echo $row_gabriel['desc2']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_gabriel['fotografo2']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{gabriel.foto2}", 200, 0, true); ?>" border="0" /></a></td>
                              </tr>
                            </table>
                            <?php } 
// EndIf File Exists (region3)
?>
                          <?php 
// Show If File Exists (region2)
if (tNG_fileExists("../../uploads/fotos/", "{gabriel.foto3}")) {
?>
                            <br />
                            <table align="center" width="201" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td width="191" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../../uploads/fotos/", "{gabriel.foto3}");?>" rel="lightbox" title="<?php echo $row_gabriel['desc3']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_gabriel['fotografo3']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{gabriel.foto3}", 200, 0, true); ?>" border="0" /></a></td>
                              </tr>
                            </table>
                            <?php } 
// EndIf File Exists (region2)
?></td>
                      </tr>
                    </table>
                    <div align="justify"><?php echo $row_gabriel['materia']; ?></div></td>
                  </tr>
                </table>                </td>
            </tr>
            <tr>
              <td height="17" align="left" valign="top" bgcolor="#017C9E" class="mais_festa">Para conferir todos os artigos desta coluna <a href="arquivo.php">clique aqui!</a> </td>
            </tr>
            <tr>
              <td height="17" align="left" valign="top" bgcolor="#017C9E"><span class="Titulo_Branco">Coment&aacute;rios</span></td>
            </tr>
            <tr>
              <td height="236" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                
                <tr>
                  <td align="left" valign="top"><p>O Saquabb.com.br n&atilde;o publicar&aacute; coment&aacute;rios ofensivos, desrespeitosos  e que venham h&aacute; prejudicar ou insultar quem quer que seja! <br />
                    Todos os coment&aacute;rios s&atilde;o analisados para depois serem  publicados!<br />
                    N&atilde;o estamos proibindo que sejam feitas cr&iacute;ticas, apenas que  nosso site n&atilde;o se torne um antro de fofocas!<br />
                    Desde j&aacute;, agradecemos &agrave; compreens&atilde;o!<strong><br />
                      <br />
                    </strong></p></td>
                </tr>
                <tr>
                  <td><?php do { ?>
                      <?php 
// Show If Field Has Changed (region2)
if (tNG_fieldHasChanged("region2", $row_comentarios['id_coment'])) {
?>
                          <?php if ($totalRows_comentarios > 0) { // Show if recordset not empty ?>
                            <table width="100%" border="0" cellpadding="4" cellspacing="0">
                              <tr>
                                <td align="left" bgcolor="#017C9E" class="mais_festa"><strong><?php echo $row_comentarios['nome']; ?> - <?php echo $row_comentarios['mail']; ?> - <?php echo $row_comentarios['cidade']; ?></strong></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" bgcolor="#FFFFFF" class="fonte_not"><?php echo $row_comentarios['comentario']; ?></td>
                              </tr>
                            </table>
                            <?php } // Show if recordset not empty ?>
                          <?php } 
// EndIf Field Has Changed (region2)
?>
                      <br />
                      <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="126" height="22" border="0" cellpadding="0" cellspacing="2" bgcolor="#298CAC" class="borda_tabela">
                      <tr>
                        <td width="122" align="center" valign="middle" bgcolor="#298CAC"><a href="javascript:abrir_janela('comentar.php?id=<?php echo $row_gabriel['id']; ?>','Saquabb','','420','400','true')" class="mais_festa">Comentar</a></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="21" align="center" valign="top" bgcolor="#298CAC"><span class="mais_festa">Os pontos de vista expressos nesta coluna, ou coment&aacute;rios, s&atilde;o de responsabilidade exclusiva de seus autores e n&atilde;o representam a opini&atilde;o do Site. </span></td>
            </tr>
        </table>
        <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="../../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($gabriel);

mysql_free_result($comentarios);

mysql_free_result($gabriel);
?>