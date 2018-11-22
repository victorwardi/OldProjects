<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');
?>
<?php
mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = "SELECT * FROM novidades ORDER BY id DESC LIMIT 4 OFFSET 3 ";
$RsNovidades = mysql_query($query_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);
$totalRows_RsNovidades = mysql_num_rows($RsNovidades);

mysql_select_db($database_ConBD, $ConBD);
$query_RsEventos = "SELECT * FROM evento ORDER BY id DESC";
$RsEventos = mysql_query($query_RsEventos, $ConBD) or die(mysql_error());
$row_RsEventos = mysql_fetch_assoc($RsEventos);
$totalRows_RsEventos = mysql_num_rows($RsEventos);

$maxRows_RsFotos = 2;
$pageNum_RsFotos = 0;
if (isset($_GET['pageNum_RsFotos'])) {
  $pageNum_RsFotos = $_GET['pageNum_RsFotos'];
}
$startRow_RsFotos = $pageNum_RsFotos * $maxRows_RsFotos;

mysql_select_db($database_ConBD, $ConBD);
$query_RsFotos = "SELECT * FROM galerias ORDER BY id DESC";
$query_limit_RsFotos = sprintf("%s LIMIT %d, %d", $query_RsFotos, $startRow_RsFotos, $maxRows_RsFotos);
$RsFotos = mysql_query($query_limit_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);

if (isset($_GET['totalRows_RsFotos'])) {
  $totalRows_RsFotos = $_GET['totalRows_RsFotos'];
} else {
  $all_RsFotos = mysql_query($query_RsFotos);
  $totalRows_RsFotos = mysql_num_rows($all_RsFotos);
}
$totalPages_RsFotos = ceil($totalRows_RsFotos/$maxRows_RsFotos)-1;





// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsNovidades.imagem}");
$objDynamicThumb1->setResize(85, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb2->setFolder("uploads/fotos/");
$objDynamicThumb2->setRenameRule("{RsFotos.imagem}");
$objDynamicThumb2->setResize(100, 0, true);
$objDynamicThumb2->setWatermark(false);


?>

<?php 

// Sistema de notícias em Flash - Adapatado por Victor Caetano
  //conectando ao mysql
  $conn = @mysql_connect("localhost:3309", "arena","arena");  
  $db   = @mysql_select_db("arenafest", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `novidades` ORDER BY `id` DESC Limit 3";

  //Executando a instrução sql
  $sql  = @mysql_query($sql);

  //Pegando o numero de registros
  $rst = mysql_num_rows($sql);

  //Se tiver algum registro
  if($rst > 0) {

        //Abre/cria o arquivo tickers.xml com permissão para escrever
    $xml = fopen("tickers.xml", "w");

    //Escreve o cabeçalho e o primeiro nó do xml
    fwrite($xml, "\r\n");
    fwrite($xml, "<tickers>\r\n");

    //Para cada registro que tiver
    for($i=0; $i<$rst; $i++) {


 //Pegamos o valor de cada registro
      $titulo = utf8_encode(mysql_result($sql,$i,"titulo"));
      $coluna = utf8_encode(mysql_result($sql,$i,"resumo"));
      $data = utf8_encode(mysql_result($sql,$i,"data"));
      $imagem = utf8_encode(mysql_result($sql,$i,"imagem"));
      $id = utf8_encode(mysql_result($sql,$i,"id"));

         //Guardamos na variavel $conteudo as tags e os valores do xml
         $conteudo = "<ticker>\r\n";
         $conteudo .= "<titulo>$titulo</titulo>\r\n";
         $conteudo .= "<coluna>$coluna</coluna>\r\n";
         $conteudo .= "<data>$data</data>\r\n";
         $conteudo .= "<imagem>uploads/fotos/$imagem</imagem>\r\n";
         $conteudo .= "<link>http://www.arenafestshow.com.br/novidade.php?id=$id</link>\r\n";
         $conteudo .= "</ticker>\r\n";


      //Escrevendo no tickers.xml
      fwrite($xml, $conteudo);
    }

    //Finalizando com a última tag
    fwrite($xml, "</tickers>");
    
    //Fechando o arquivo
    fclose($xml);    

  }
?> 
<?php

require_once("enquete/dbConnect.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____ Arena Fest _________________________________________</title>
<bgsound src="propaganda.mp3" loop="false">
<link rel="stylesheet" href="enquete/css/ajax-poller.css" type="text/css">
	<script type="text/javascript" src="enquete/js/ajax.js"></script>
	<script type="text/javascript" src="enquete/js/ajax-poller.js">	</script>

<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="134" align="center" valign="top">
	<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','900','height','134','src','flash/topo','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','flash/topo' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="900" height="134">
      <param name="movie" value="flash/topo.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="900" height="134"></embed>
    </object>
    </noscript></td>
  </tr>
  <tr>
    <td height="56" align="center" valign="top"><img src="img/menu2.jpg" width="900" height="56" border="0" usemap="#Map" /></td>
  </tr>
  
  <tr>
    <td height="216" align="center" valign="top" background="img/fundo_meio.jpg"><!-- InstanceBeginEditable name="conteudo" -->
	<?php
	@include($_SERVER['DOCUMENT_ROOT']."/config/metatags.inc");
	?>	
      <table width="92%" border="0" cellpadding="0" cellspacing="6">
        <tr>
          <td height="249" colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">

            <tr>
              <td height="26" align="center" valign="top" ><table width="10%" border="0" cellpadding="0" cellspacing="0" class="borda_branca">
                <tr>
                  <th scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','467','height','240','src','capa','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','capa' ); //end AC code
          </script>
                  <noscript>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="467" height="240">
                    <param name="movie" value="capa.swf" />
                    <param name="quality" value="high" />
                    <embed src="capa.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="467" height="240"></embed>
                  </object>
                  </noscript></th>
                </tr>
              </table></td>
              <td align="left" valign="top"><?php do { ?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_solid" id="fotos">
                    <tr>
                      <th width="92" height="30" align="center" valign="middle" bgcolor="#F3F8A6" scope="col"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_branca" /></th>
                        <th width="385" height="52" align="left" valign="center" bgcolor="#FFFFFF" scope="col"><a href="novidade.php?id=<?php echo $row_RsNovidades['id'];?>"><?php echo $row_RsNovidades['titulo']; ?> - <?php echo $row_RsNovidades['data']; ?></a></th>
                      </tr>
                    </table>
                <?php } while ($row_RsNovidades = mysql_fetch_assoc($RsNovidades)); ?>
                <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <th align="right" scope="col"><a href="novidades.php" class="txt_galeria_descricao">+ ver todas as novidades</a></th>
                  </tr>
                </table></td>
            </tr>
            

            <tr>
              <td height="19" colspan="2" align="right" valign="top" class="linha_amarela_pontilhada">&nbsp;</td>
              </tr>
            <tr>
              <td height="19" align="right" valign="top">&nbsp;</td>
              <td align="right" valign="top">&nbsp;</td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col"><table width="200" border="0" cellpadding="0" cellspacing="2" class="borda_cinza">
                  <tr>
                    <th height="25" class="TITULOS" scope="col"><?php echo $row_RsEventos['titulo']; ?></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsEventos.capa}");?>" width="210" height="120" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>" class="txt_novidades_data"><?php echo $row_RsEventos['data']; ?></a></th>
                  </tr>
                </table>
				<?php  ($row_RsEventos = mysql_fetch_assoc($RsEventos)); ?>				</th>
                <th scope="col"><table width="200" border="0" cellpadding="0" cellspacing="2" class="borda_cinza">
                  <tr>
                    <th height="25" class="TITULOS" scope="col"><?php echo $row_RsEventos['titulo']; ?></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsEventos.capa}");?>" width="210" height="120" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>" class="txt_novidades_data"><?php echo $row_RsEventos['data']; ?></a></th>
                  </tr>
                </table>
				<?php  ($row_RsEventos = mysql_fetch_assoc($RsEventos)); ?>				</th>
                <th scope="col"><table width="200" border="0" cellpadding="0" cellspacing="2" class="borda_cinza">
                  <tr>
                    <th height="25" class="TITULOS" scope="col"><?php echo $row_RsEventos['titulo']; ?></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsEventos.capa}");?>" width="210" height="120" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>" class="txt_novidades_data"><?php echo $row_RsEventos['data']; ?></a></th>
                  </tr>
                </table>				
				<?php  ($row_RsEventos = mysql_fetch_assoc($RsEventos)); ?></th>
                <th scope="col"><table width="200" border="0" cellpadding="0" cellspacing="2" class="borda_cinza">
                  <tr>
                    <th height="25" class="TITULOS" scope="col"><?php echo $row_RsEventos['titulo']; ?></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsEventos.capa}");?>" width="210" height="120" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="col"><a href="evento.php?id=<?php echo $row_RsEventos['id']; ?>" class="txt_novidades_data"><?php echo $row_RsEventos['data']; ?></a></th>
                  </tr>
                </table></th>
              </tr>
            </table>            
          </td>
        </tr>
        <tr>
          <td width="55%" align="center" valign="top" bgcolor="#F3F8A6"><table width="98%" border="0" cellpadding="0" cellspacing="4" bgcolor="#F3F8A6">
              <tr>
                <td height="25" align="left" valign="middle" bgcolor="#F3F8A6" class="TITULOS">Galeria de Fotos </td>
              </tr>
              
              <tr>
                <td height="103" bgcolor="#F3F8A6"><?php do { ?>
                  <table width="100%" border="0" cellpadding="2" cellspacing="0" class="linha_branca">
                    <tr>
                      <th width="23%" align="left" valign="middle" scope="col"><table border="0" cellpadding="0" cellspacing="0" width="140">
                          <!-- fwtable fwsrc="fotos.png" fwbase="fotos.jpg" fwstyle="Dreamweaver" fwdocid = "1972568215" fwnested="0" -->
                          <tr>
                            <td><img src="../spacer.gif" width="18" height="1" border="0" alt="" /></td>
                            <td><img src="../spacer.gif" width="100" height="1" border="0" alt="" /></td>
                            <td><img src="../spacer.gif" width="22" height="1" border="0" alt="" /></td>
                            <td><img src="../spacer.gif" width="1" height="1" border="0" alt="" /></td>
                          </tr>
                          <tr>
                            <td colspan="3"><img name="fotos_r1_c1" src="img/fotos_r1_c1.jpg" width="140" height="18" border="0" id="fotos_r1_c1" alt="" /></td>
                            <td><img src="../spacer.gif" width="1" height="18" border="0" alt="" /></td>
                          </tr>
                          <tr>
                            <td><img name="fotos_r2_c1" src="img/fotos_r2_c1.jpg" width="18" height="75" border="0" id="fotos_r2_c1" alt="" /></td>
                            <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="verfotos.php?id=<?php echo $row_RsFotos['id'];?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" alt="<?php echo $row_RsFotos['titulo']; ?>" border="0" /></a></td>
                            <td><img name="fotos_r2_c3" src="img/fotos_r2_c3.jpg" width="22" height="75" border="0" id="fotos_r2_c3" alt="" /></td>
                            <td><img src="../spacer.gif" width="1" height="75" border="0" alt="" /></td>
                          </tr>
                          <tr>
                            <td colspan="3"><img name="fotos_r3_c1" src="img/fotos_r3_c1.jpg" width="140" height="22" border="0" id="fotos_r3_c1" alt="" /></td>
                            <td><img src="../spacer.gif" width="1" height="22" border="0" alt="" /></td>
                          </tr>
                        </table></th>
                      <th width="77%" align="left" valign="middle" scope="col"><a href="verfotos.php?id=<?php echo $row_RsFotos['id'];?>" class="galeria_txt"><?php echo $row_RsFotos['titulo']; ?> - <?php echo $row_RsFotos['data']; ?></a></th>
                    </tr>
                  </table>
                  <?php } while ($row_RsFotos = mysql_fetch_assoc($RsFotos)); ?></td>
              </tr>
              <tr>
                <td height="27" align="left" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td height="15" align="right"><a href="fotos.php">+ ver todos as galerias </a> </td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td height="76" align="center" valign="middle" bgcolor="#FFFFFF" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="promocao.php"><img src="img/propagandas/promo.jpg" alt="promo&ccedil;&otilde;es" width="453" height="100" border="0" /></a></th>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="76" align="center" valign="middle" bgcolor="#FFFFFF" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><img src="img/propagandas/contrate.jpg" alt="Contrate-nos" width="453" height="100" /></th>
                  </tr>
                </table></td>
              </tr>
          </table></td>
          <td width="45%" height="468" align="left" valign="top" bgcolor="#F3F8A6"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="4">
              <tr>
                <td align="center" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_4px_azul">
                  <tr>
                    <th bgcolor="#0272BA" scope="col"><a href="http://www.orkut.com/Community.aspx?cmm=41893445"><img src="img/propagandas/orkut.jpg" alt="Orkut" width="370" height="82" border="0" /></a></th>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_4px_azul">
                  <tr>
                    <th bgcolor="#0272BA" scope="col"><img src="img/propagandas/leo2.jpg" alt="Leo do Som" width="370" height="82" border="0" /></th>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="76" align="center" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_4px_azul">
                  <tr>
                    <th bgcolor="#0272BA" scope="col"><img src="img/propagandas/peter2.jpg" alt="Peter Miller" width="370" height="82" border="0" /></th>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="76" align="center" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_4px_azul">
                  <tr>
                    <th bgcolor="#0272BA" scope="col"><a href="http://www.agitocerto.com" target="_blank"><img src="img/propagandas/agito.jpg" alt="AgitoCerto.com" width="370" height="82" border="0" /></a></th>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td height="19" align="left" valign="middle" bgcolor="#F3F8A6" class="txt_galeria_descricao"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FBFBFB" class="tabela_enquete">
                  <tr>
                    <td height="25" bgcolor="#FFFFFF" class="TITULOS">Enquete</td>
                  </tr>
                  <tr>
                    <td><!-- inicio da Enquete -->
                        <form action="<?php echo $_SERVER['enquete/PHP_SELF']; ?>" onsubmit="return false" method="post">
                          <div id="mainContainer">
                            <div id="header"></div>
                            <div id="mainContent">
                              <?
		$pollerId = 1;	// Id of poller
		?>
                              <!-- START OF POLLER -->
                              <div class="poller">
                                <div class="poller_question" id="poller_question<?php echo $pollerId; ?>">
                                  <p>
                                    <?php		
			
			
			// Retreving poll from database
			$res = mysql_query("select * from poller where ID='$pollerId'");	
			if($inf = mysql_fetch_array($res)){
				echo "<p class=\"pollerTitle\">".$inf["pollerTitle"]."</p>";	// Output poller title
				
				$resOptions = mysql_query("select * from poller_option where pollerID='$pollerId' order by pollerOrder") or die(mysql_error());	// Find poll options, i.e. radio buttons
				while($infOptions = mysql_fetch_array($resOptions)){
					if($infOptions["defaultChecked"])$checked=" checked"; else $checked = "";
					echo "<p class=\"pollerOption\"><input$checked type=\"radio\" value=\"".$infOptions["ID"]."\" name=\"vote[".$inf["ID"]."]\" id=\"pollerOption".$infOptions["ID"]."\"><label for=\"pollerOption".$infOptions["ID"]."\" id=\"optionLabel".$infOptions["ID"]."\">".$infOptions["optionText"]."</label></p>";	
			
				}
			}			
			?>
                                    <br />
                                    <a href="#" onclick="castMyVote(<?php echo $pollerId; ?>,document.forms[0])"><img src="enquete/images/graph.gif" width="56" height="16" border="0" /></a></p>
                                </div>
                                <div class="poller_waitMessage" id="poller_waitMessage<? echo $pollerId; ?>"> Gerando os resultados... </div>
                                <div class="poller_results" id="poller_results<? echo $pollerId; ?>">
                                  <!-- This div will be filled from Ajax, so leave it empty -->
                                </div>
                              </div>
                              <!-- END OF POLLER -->
                              <script type="text/javascript">
		if(useCookiesToRememberCastedVotes){
			var cookieValue = Poller_Get_Cookie('dhtmlgoodies_poller_<? echo $pollerId; ?>');
			if(cookieValue && cookieValue.length>0)displayResultsWithoutVoting(<? echo $pollerId; ?>); // This is the code you can use to prevent someone from casting a vote. You should check on cookie or ip address
		
		}
		          </script>
                            </div>
                            <div class="clear"></div>
                          </div>
                        </form>
                      <!-- Fimd a Enquete --></td>
                  </tr>
                  <tr>
                    <td height="12">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              
          </table>          </td>
        </tr>
        
        
        <tr>
          <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <td height="25" class="TITULOS">Patroc&iacute;nios</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="200" colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><p><img src="img/patro.jpg" alt="Patrocinadores" width="874" height="200" /></p></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  
  <tr>
    <td height="150" align="center" valign="top"><img src="img/base.jpg" width="900" height="150" border="0" usemap="#Map2" /></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="rect" coords="8,3,48,29" href="index.php" alt="Home" />
<area shape="rect" coords="57,3,127,29" href="eventos.php" alt="Eventos" />
<area shape="rect" coords="133,4,184,30" href="fotos.php" alt="Fotos" />
<area shape="rect" coords="193,4,273,30" href="novidades.php" alt="Novidades" />
<area shape="rect" coords="284,3,385,30" href="patrocinios.php" alt="Patroc&iacute;nios" />
<area shape="rect" coords="394,3,483,30" href="quemsomos.php" alt="Quem Somos" />
<area shape="rect" coords="492,4,541,29" href="arena.php" alt="Arena" />
<area shape="rect" coords="551,1,621,30" href="contato.php" alt="Contato" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="28,111,261,141" href="http://www.saquabb.com.br/victor" alt="Webdesign: Victor Caetano" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RsEventos);

mysql_free_result($RsFotos);
?>

