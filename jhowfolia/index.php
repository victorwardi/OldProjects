<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

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
$query_RsNovidades = "SELECT * FROM noticias ORDER BY id DESC LIMIT 4 OFFSET 3";
$RsNovidades = mysql_query($query_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);
$totalRows_RsNovidades = mysql_num_rows($RsNovidades);

mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = "SELECT * FROM galerias ORDER BY id DESC";
$RsGalerias = mysql_query($query_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);
$totalRows_RsGalerias = mysql_num_rows($RsGalerias);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsGalerias.imagem}");
$objDynamicThumb1->setResize(100, 75, false);
$objDynamicThumb1->setWatermark(false);

?>
<?php
require_once("enquete/dbConnect.php");
require_once("geraxml.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>||    Jhow Folia    ||</title>
<link rel="stylesheet" href="enquete/css/ajax-poller.css" type="text/css">
	<script type="text/javascript" src="enquete/js/ajax.js"></script>
	<script type="text/javascript" src="enquete/js/ajax-poller.js">	</script>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
</head>
<body>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="img/recortes/images/img_01.png" alt="JhowFolia.com.br" width="800" height="225" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_02.png" alt="Menu" width="800" height="62" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="210" align="left" valign="top" background="img/recortes/images/img_03.png"><!-- InstanceBeginEditable name="conteudo" -->
    <?php
	@include($_SERVER['DOCUMENT_ROOT']."/config/metatags.inc");
	?>	
      <div>
        <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="53%"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','400','height','240','class','contorno_1px','title','Novidades','src','noticias','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','noticias' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="400" height="240" class="contorno_1px" title="Novidades">
              <param name="movie" value="noticias.swf" />
              <param name="quality" value="high" />
              <embed src="noticias.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="400" height="240"></embed>
            </object>
</noscript></td>
            <td width="47%" align="left" valign="top">
            <div>
            <h1 class="titulo_novidades">Mais Novidades</h1>
            <?php do { ?>
              <div class="lista_novidade"><span class="titulo"><?php echo $row_RsNovidades['data']; ?></span><br />
<?php echo $row_RsNovidades['titulo']; ?></div>
              <?php } while ($row_RsNovidades = mysql_fetch_assoc($RsNovidades)); ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div>
              <h1 class="titulo_novidades">&Uacute;ltimas Galerias de Fotos</h1>
              

                
              <table width="99%" border="0" cellpadding="0" cellspacing="6" class="linha_trecajada">
                <tr>
                  <td width="15%" align="left" valign="middle"><table width="121" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="3"><img src="img/recortes/moldura/foto_r1_c1.jpg" width="120" height="10" /></td>
                      </tr>
                      <tr>
                        <td width="10"><img src="img/recortes/moldura/foto_r2_c1.jpg" width="10" height="75" /></td>
                        <td width="100"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="100" height="75" border="0" /></td>
                        <td width="11"><img src="img/recortes/moldura/foto_r2_c3.jpg" width="10" height="75" /></td>
                      </tr>
                      <tr>
                        <td colspan="3"><img src="img/recortes/moldura/foto_r3_c1.jpg" width="120" height="10" /></td>
                      </tr>
                  </table></td>
                  <td width="85%" align="left" valign="middle" class="novidades_titulo"><a href="album.php?id=<?php echo $row_RsGalerias['id'];?>" class="titulo"><?php echo $row_RsGalerias['titulo']; ?></a></td>
                </tr>
              </table>
            </div></td>
      <td>
      <h1 class="titulo_novidades">Enquete</h1><div>
                  <!-- inicio da Enquete -->
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
                  <!-- Fimd a Enquete -->
            </div></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td align="center" background="img/recortes/images/img_03.png"><img src="img/recortes/images/img_.png" width="800" height="100" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_07.png" width="800" height="205" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_08.png" alt="Rodap&eacute;" width="800" height="47" /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="31,14,82,45" href="index.php" alt="Home" />
<area shape="rect" coords="91,14,190,45" href="conteudo.php?pg=programacao" alt="Programa&ccedil;&atilde;o" />
<area shape="rect" coords="196,15,276,43" href="conteudo.php?pg=ingressos" />
<area shape="rect" coords="282,12,409,44" href="conteudo.php?pg=pontos" alt="Pontos de Vendas" />
<area shape="rect" coords="416,12,561,45" href="conteudo.php?pg=entrega" alt="Entrega de Abad&aacute;s" />
<area shape="rect" coords="569,12,640,45" href="conteudo.php?pg=evento" alt="O Evento" />
<area shape="rect" coords="649,12,695,44" href="fotos.php" alt="Fotos" />
<area shape="rect" coords="705,13,768,45" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RsGalerias);
?> 
