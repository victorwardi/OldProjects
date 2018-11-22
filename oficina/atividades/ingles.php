<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');
 include("../inc/arquivos.php"); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_ConBD, $ConBD);
$query_RsFotos = "SELECT * FROM fotos WHERE id = '48' ORDER BY id_foto DESC";
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);

mysql_select_db($database_ConBD, $ConBD);
$query_RsVideos = "SELECT * FROM videos WHERE id = '48' ORDER BY id_video DESC";
$RsVideos = mysql_query($query_RsVideos, $ConBD) or die(mysql_error());
$row_RsVideos = mysql_fetch_assoc($RsVideos);
$totalRows_RsVideos = mysql_num_rows($RsVideos);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsVideos.capa}");
$objDynamicThumb2->setResize(134, 44, false);
$objDynamicThumb2->setWatermark(false);


// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.arquivo}");
$objDynamicThumb1->setResize(59, 59, false);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Oficina Criativa ||</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
	left: 414px;
	top: 260px;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- lightBOX-->
<link rel="stylesheet" href="../Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<!-- lightBOX-->
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="../img/bg_01.gif"><div align="left"><a href="../index.php"><img src="../img/logo.gif" width="198" height="138" border="0" /></a></div></td>
            <td width="770" height="180" valign="top" background="../img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="top"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="520" height="150" align="center" valign="middle"><div align="center"><img src="../img/logo_02.gif" width="419" height="101" /></div></td>
                        <td width="250" height="150" align="left" valign="top"><div align="center">
                          <table width="220" height="120" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="middle" bgcolor="#FFFFFF"><div align="center">
                                <table width="190" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="data_01"><div align="left">&Aacute;rea</div></td>
                                  </tr>
                                  <tr>
                                    <td class="titulo_01"><div align="left">Exclusiva</div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left"> <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                                        <label></label>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="1">
                                            <tr>
                                              <td width="22%" align="left" class="txt_06">Login:</td>
                                              <td colspan="2" align="left"><input name="login" type="text" class="form_01" id="login" size="26" /></td>
                                            </tr>
                                            <tr>
                                              <td align="left" class="txt_06">Senha</td>
                                              <td colspan="2" align="left"><input name="senha" type="password" class="form_01" id="senha" size="26" /></td>
                                            </tr>
                                            <tr>
                                              <td align="left">&nbsp;</td>
                                              <td width="43%" align="left"><label>
                                                <a href="#">Esqueceu a<br />
Senha ?</a></label></td>
                                              <td width="35%" align="right"><input type="image" name="imageField" id="imageField" src="../img/bt_entrar_01.gif" /></td>
                                            </tr>
                                          </table>
                                        
                                        </form></div></td>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../img/div_02.gif"><div align="left">
                          <table width="740" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">
                                <div align="left">Voc&ecirc; est&aacute; em &gt; </div>
                              </div></td>
                              <td width="100" class="titulo_01"><div align="left"><a href="../index.php">p&aacute;gina inicial &gt; </a></div></td>
                              <td width="80" class="titulo_01"><div align="left"><a href="index.php">atividades &gt; </a></div></td>
                              <td width="460" class="titulo_01"><div align="left">ingl&ecirc;s</div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="540" align="center" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="540" align="left" valign="top" background="../img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="6" height="30"><div align="left"></div></td>
                  <td height="30"><div align="center"></div></td>
                </tr>
                <tr>
                  <td width="6" height="300"><div align="left"></div></td>
                  <td height="300" align="right" valign="top"><div align="right">
                    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','214','height','300','src','../flash/menu_atividades1','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/menu_atividades1' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="214" height="300">
                      <param name="wmode" value="transparent"/> 
		     <param name="movie" value="../flash/menu_atividades1.swf" />
                      <param name="quality" value="high" />
                      <embed src="../flash/menu_atividades1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="214" height="300"></embed>
                    </object>
                  </noscript></div></td>
                </tr>
                <tr>
                  <td width="6"><div align="left"></div></td>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="left">
                    <table width="190" border="2" cellpadding="0" cellspacing="0" bordercolor="#0089E1">
                      <tr>
                        <td height="23" bgcolor="#0089E1" class="titulo_02"><div align="center">Agenda</div></td>
                      </tr>
                      <tr>
                        <td height="128" align="center" valign="middle"><div align="center">
                          <table width="170" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="40" valign="top"><div align="left">
                                  <table width="170" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="30" height="40"><table width="30" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['semana'];?></div></td>
                                          </tr>
                                          <tr>
                                            <td class="data_02"><div align="center"><?php echo $row_RsAgenda['dia'];?></div></td>
                                          </tr>
                                          <tr>
                                            <td class="titulo_01"><div align="center"><?php echo $row_RsAgenda['mes'];?></div></td>
                                          </tr>
                                      </table></td>
                                      <td width="140" height="40" valign="top" class="titulo_01"><div align="right"><?php echo $row_RsAgenda['titulo'];?></div></td>
                                    </tr>
                                  </table>
                              </div></td>
                            </tr>
                            <tr>
                              <td height="10" valign="top"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td height="50" valign="top" class="txt_01"><div align="left">
                                  <p><?php echo $row_RsAgenda['descricao'];?> </p>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
            <td width="30" height="540" align="left" valign="top"><div align="left"></div></td>
            <td width="740" height="540" align="left" valign="top"><div align="left">
              <table width="740" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="24" valign="middle" bgcolor="#EF4A6C"><div align="center">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr class="select_link_01">
                        <td><div align="center"><a href="artes.php">Artes</a></div></td>
                        <td><div align="center"><a href="biblioteca.php">Biblioteca</a></div></td>
                        <td><div align="center"><a href="brinquedoteca.php">Brinquedoteca</a></div></td>
                        <td><div align="center"><a href="educacaofisica.php">Educa&ccedil;&atilde;o F&iacute;sica </a></div></td>
                        <td><div align="center"><a href="informatica.php">Inform&aacute;tica</a></div></td>
                        <td><div align="center">Ingl&ecirc;s</div></td>
                        <td><div align="center"><a href="musica.php">M&uacute;sica</a></div></td>
                        <td><div align="center"><a href="teatro.php">Teatro</a></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="26"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="570" valign="top"><div align="left">
                          <table width="570" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"><img src="../img/titulo_atividades_01.gif" width="129" height="29" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="titulo_01"><div align="left">Ingl&ecirc;s</div></td>
                            </tr>
                            <tr>
                              <td height="20"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td class="txt_big_01">                                <p align="justify">J&aacute; se sabe que iniciar o ensino de l&iacute;nguas desde cedo  apresenta vantagens consider&aacute;veis para a aprendizagem: facilita a capacidade de  ouvir e pronunciar os sons espec&iacute;ficos do idioma.<br />
                                <br />
                                  Consideramos que os alunos que chegam ao Grupo I, por j&aacute;  utilizarem com compet&ecirc;ncia a l&iacute;ngua materna, t&ecirc;m maiores condi&ccedil;&otilde;es de entrar em  contato com uma outra l&iacute;ngua e de compreender seus principais aspectos.  Introduzimos ent&atilde;o, a partir do Grupo I, situa&ccedil;&otilde;es de aprendizagem da l&iacute;ngua  inglesa, que &eacute; fundamental para o dia-a-dia na cultura do mundo globalizado,  que ter&atilde;o continuidade at&eacute; o 5&deg; Ano do Ensino Fundamental. <br />
                                  <br />
                                  O ensino do idioma ingl&ecirc;s na Oficina Criativa visa levar o  aluno a um primeiro contato com este idioma de uso internacional, de forma  prazerosa, associando os assuntos apresentados &agrave; viv&ecirc;ncia dos alunos de acordo  com sua idade e faixa de desenvolvimento cognitivo.<br />
                                  <br />
                                  Na Educa&ccedil;&atilde;o Infantil (Grupo I, II e III) o trabalho &eacute;  baseado na oralidade, atrav&eacute;s de m&uacute;sicas, jogos e desenhos. Essa forma de  trabalho segue no Ensino Fundamental, tendo como base os livros adotados. <br />
                                  <br />
                                  Em todas as s&eacute;ries &eacute; desenvolvido um trabalho que visa  desinibir o aluno, deixando-o apto a ingressar a qualquer momento em um curso  de ingl&ecirc;s.<br />
                                  <br />
                                  Esta aula &eacute; desenvolvida por um professor especialista, o  qual procura garantir um melhor desenvolvimento das diferentes compet&ecirc;ncias  ling&uuml;&iacute;sticas de uma nova l&iacute;ngua: falar, ouvir e futuramente ler e escrever.</p></td>
                            </tr>
                          </table>
                        </div></td>
                        <td width="30" valign="top"><div align="left"></div></td>
                        <td width="140" valign="top"><div align="left">
                          <table width="140" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"><img src="../img/titulo_fotosevideos_01.gif" width="128" height="32" /></div></td>
                            </tr>
                            <tr>
                              <td height="13"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td><div align="left">
                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="140"><table width="140" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                          <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                          <td width="10" height="65"><div align="center"></div></td>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                          <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                        </tr>
                                        <tr>
                                          <td width="65" height="10"><div align="center"></div></td>
                                          <td width="10" height="10"><div align="center"></div></td>
                                          <td width="65" height="10"><div align="center"></div></td>
                                        </tr>
                                        <tr>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                          <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                          <td width="10" height="65"><div align="center"></div></td>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                          <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                        </tr>
                                        <tr>
                                          <td width="65" height="10"><div align="center"></div></td>
                                          <td width="10" height="10"><div align="center"></div></td>
                                          <td width="65" height="10"><div align="center"></div></td>
                                        </tr>
                                        <tr>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                          <?php $row_RsFotos = mysql_fetch_assoc($RsFotos); ?>
                                          <td width="10" height="65"><div align="center"></div></td>
                                          <td width="65" height="65" bgcolor="#EF4A6C"><div align="center"><a href="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="59" height="59" border="0" /></a></div></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td width="140" height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                                  </tr>
                                  <tr>
                                    <td class="data_01"><div align="left">V&iacute;deo</div></td>
                                  </tr>
                                  <tr>
                                    <td class="titulo_01"><div align="left"><?php echo $row_RsVideos['descricao_video']; ?></div></td>
                                  </tr>
                                  <tr>
                                    <td height="20"><div align="left"></div></td>
                                  </tr>
                                  <tr>
                                    <td height="50" bgcolor="#EF4A6C"><div align="center"><a href="../fotosevideos/videos.php?id_video=<?php echo $row_RsVideos['id_video']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></div></td>
                                  </tr>
                                  <tr>
                                    <td height="25"><div align="left"><img src="../img/div_03.gif" width="130" height="3" /></div></td>
                                  </tr>
                                  <tr>
                                    <td width="140"><div align="left"><a href="../fotosevideos/index.php">mais fotos e v&iacute;deos...</a></div></td>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="50"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <table width="740" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="140" height="100" bgcolor="#EF4A6C"><div align="center"><img src="../img/desenho_01.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#EF4A6C"><div align="center"><img src="../img/desenho_02.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#EF4A6C"><div align="center"><img src="../img/desenho_03.jpg" width="134" height="94" /></div></td>
                        <td width="60" height="100"><div align="center"></div></td>
                        <td width="140" height="100" bgcolor="#EF4A6C"><div align="center"><img src="../img/desenho_04.jpg" width="134" height="94" /></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="../img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="../img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="../img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="../comochegar/index.html"><img src="../img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="../img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
