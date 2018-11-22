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

<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.fonte_14 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: lighter;
	color: #000000;
}
.fonte_14_negrito {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bolder;
	color: #000000;
}
-->
</style>
<!-- InstanceEndEditable -->
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
              <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Servi&ccedil;os</th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="8">
                  <tr>
                    <th align="left" valign="top" scope="col"><div align="justify">
                      <p class="fonte_14">&Eacute; sempre assim: <span class="fonte_14_negrito">mar  cl&aacute;ssico</span>, todos dentro d&rsquo;&aacute;gua e ningu&eacute;m quer sair para fotografar. Na maioria  das vezes o &uacute;nico registro da melhor onda, o <span class="fonte_14_negrito">melhor tubo</span> e a manobra mais  insana s&atilde;o <span class="fonte_14_negrito">guardados na mem&oacute;ria</span>.<br />
                          <br />
                          A equipe <span class="fonte_14_negrito"> Real?!</span>  Fotos e Design, especializada em fotografia de esportes aqu&aacute;ticos como <span class="fonte_14_negrito">surf</span> e  <span class="fonte_14_negrito">bodyboarding</span>, veio para que voc&ecirc; possa ter a oportunidade de ter registrado os  melhores momentos da sua ca&iacute;da.<br />
                          <br />
                          Sendo no <span class="fonte_14_negrito">free surf</span>,  <span class="fonte_14_negrito">competi&ccedil;&atilde;o</span> ou uma <span class="fonte_14_negrito">sess&atilde;o marcada</span>, voc&ecirc; ter&aacute; acesso &agrave;s suas fotos em <span class="fonte_14_negrito">formato  digital</span> ou j&aacute; <span class="fonte_14_negrito">impresso</span>.<br />
                          Para isso, <span class="fonte_14_negrito">Real?!</span>  Fotos e Design conta com uma equipe pronta para atend&ecirc;-lo com equipamentos e  servi&ccedil;os de qualidade e comprometimento de <span class="fonte_14_negrito">alto padr&atilde;o</span>, fazendo com que a sua  imagem possa ser t&atilde;o empolgante quanto a realidade em que voc&ecirc; a viveu.<br />
                          Al&eacute;m das  fotografias, a <span class="fonte_14_negrito">Real?!</span> executa trabalhos de design para propagandas externas ou  de interesses pessoais como cartazes de campeonatos, curr&iacute;culo de atletas,  entre outros.</p>
                      <p class="fonte_14"> Abaixo est&atilde;o  relacionados os pedidos mais requisitados &agrave; nossa equipe e seus respectivos  pre&ccedil;os. Caso voc&ecirc; desejar mais informa&ccedil;&otilde;es sobre outros tipos de servi&ccedil;os e  pre&ccedil;os, entre em contato conosco <a href="contato.php" class="titulo_galerias">clicando aqui </a></p>
                      <p>&bull; Foto fora d&rsquo;&aacute;gua em formato digital (CD): R$5,00  (unidade).</p>
                      <p>&bull; Foto fora d&rsquo;&aacute;gua em formato digital e revelada no tamanho  10x15cm (CD): R$7,00 (unidade).<br />
                        <br />
  &bull; Foto fora d&rsquo;&aacute;gua em formato digital e revelada no tamanho  20x30cm (CD): R$10,00 (unidade).<br />
  <br />
  &bull; Foto dentro d&rsquo;&aacute;gua em formato digital (CD): R$7,00  (unidade).<br />
  <br />
  &bull; Foto dentro d&rsquo;&aacute;gua em formato digital e revelada no  tamanho 10x15cm (CD): R$9,00 (unidade).<br />
  <br />
  &bull; Foto dentro d&rsquo;&aacute;gua em formato digital e revelada no  tamanho 20x30cm (CD): R$12,00 (unidade).</p>
                    </div></th>
                  </tr>
                </table>                <p>&nbsp;</p></th>
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
?>