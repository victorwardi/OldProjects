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

$maxRows_RsNovidades = 5;
$pageNum_RsNovidades = 0;
if (isset($_GET['pageNum_RsNovidades'])) {
  $pageNum_RsNovidades = $_GET['pageNum_RsNovidades'];
}
$startRow_RsNovidades = $pageNum_RsNovidades * $maxRows_RsNovidades;

mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_RsNovidades = sprintf("%s LIMIT %d, %d", $query_RsNovidades, $startRow_RsNovidades, $maxRows_RsNovidades);
$RsNovidades = mysql_query($query_limit_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);

if (isset($_GET['totalRows_RsNovidades'])) {
  $totalRows_RsNovidades = $_GET['totalRows_RsNovidades'];
} else {
  $all_RsNovidades = mysql_query($query_RsNovidades);
  $totalRows_RsNovidades = mysql_num_rows($all_RsNovidades);
}
$totalPages_RsNovidades = ceil($totalRows_RsNovidades/$maxRows_RsNovidades)-1;

$maxRows_RsGalerias = 3;
$pageNum_RsGalerias = 0;
if (isset($_GET['pageNum_RsGalerias'])) {
  $pageNum_RsGalerias = $_GET['pageNum_RsGalerias'];
}
$startRow_RsGalerias = $pageNum_RsGalerias * $maxRows_RsGalerias;

mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = "SELECT * FROM galerias ORDER BY id DESC";
$query_limit_RsGalerias = sprintf("%s LIMIT %d, %d", $query_RsGalerias, $startRow_RsGalerias, $maxRows_RsGalerias);
$RsGalerias = mysql_query($query_limit_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);

if (isset($_GET['totalRows_RsGalerias'])) {
  $totalRows_RsGalerias = $_GET['totalRows_RsGalerias'];
} else {
  $all_RsGalerias = mysql_query($query_RsGalerias);
  $totalRows_RsGalerias = mysql_num_rows($all_RsGalerias);
}
$totalPages_RsGalerias = ceil($totalRows_RsGalerias/$maxRows_RsGalerias)-1;

$maxRows_RsDepoimentos = 2;
$pageNum_RsDepoimentos = 0;
if (isset($_GET['pageNum_RsDepoimentos'])) {
  $pageNum_RsDepoimentos = $_GET['pageNum_RsDepoimentos'];
}
$startRow_RsDepoimentos = $pageNum_RsDepoimentos * $maxRows_RsDepoimentos;

mysql_select_db($database_ConBD, $ConBD);
$query_RsDepoimentos = "SELECT * FROM depoimentos WHERE aprovado = 'sim' ORDER BY id DESC";
$query_limit_RsDepoimentos = sprintf("%s LIMIT %d, %d", $query_RsDepoimentos, $startRow_RsDepoimentos, $maxRows_RsDepoimentos);
$RsDepoimentos = mysql_query($query_limit_RsDepoimentos, $ConBD) or die(mysql_error());
$row_RsDepoimentos = mysql_fetch_assoc($RsDepoimentos);

if (isset($_GET['totalRows_RsDepoimentos'])) {
  $totalRows_RsDepoimentos = $_GET['totalRows_RsDepoimentos'];
} else {
  $all_RsDepoimentos = mysql_query($query_RsDepoimentos);
  $totalRows_RsDepoimentos = mysql_num_rows($all_RsDepoimentos);
}
$totalPages_RsDepoimentos = ceil($totalRows_RsDepoimentos/$maxRows_RsDepoimentos)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsGalerias.imagem}");
$objDynamicThumb1->setResize(80, 60, false);
$objDynamicThumb1->setWatermark(false);
?>
<?php

require_once("enquete/dbConnect.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Victor Caetano Preuss Sthel Wardi - victor@saquabb.com.br - http://www.saquabb.com.br" />

<title>SaquaBloco, o Melhor Bloco de Saquarema</title>
<link rel="stylesheet" href="enquete/css/ajax-poller.css" type="text/css">
	<script type="text/javascript" src="enquete/js/ajax.js"></script>
	<script type="text/javascript" src="enquete/js/ajax-poller.js">	</script>

<link href="css.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<style type="text/css">
<!--
#popup {
	position:absolute;
	left:271px;
	top:97px;
	width:101px;
	height:80px;
	z-index:1;
}
-->
</style>
</head>

<body>
<div id="popup"><img src="flyer_.jpg" alt="Swing $ Simpatia" width="450" height="690" border="0" usemap="#Map3" />
<map name="Map3" id="Map3"><area shape="rect" coords="363,-1,450,25" href="#" alt="Fechar" onclick="MM_showHideLayers('popup','','hide')" />
</map></div>
<table width="617" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="523" align="center" valign="middle" scope="col"><img src="img/jpg/bandeira.jpg" width="523" height="346" /></th>
    <th width="94" align="center" valign="middle" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','277','height','346','src','flash/menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','flash/menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="277" height="346">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="flash/menu.swf" />
      <param name="quality" value="high" />
      <embed src="flash/menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="277" height="346"></embed>
    </object></noscript></th>
  </tr>
  <tr>
    <td height="48" colspan="2" align="center" valign="middle"><img src="img/jpg/titulos.jpg" width="800" height="57" /></td>
  </tr>
  <tr>
    <td height="163" colspan="2" align="center" valign="top" background="img/png/fundo_tabela.png">	<?php
	@include($_SERVER['DOCUMENT_ROOT']."/config/metatags.inc");
	?>	
        <table width="88%" border="0" cellpadding="0">
          
          <tr>
            <td width="62%" rowspan="2" align="left" valign="top"><?php do { ?>
              <div class="titulos_novidades"> <a href="novidades/novidade.php?id=<?php echo $row_RsNovidades['id'] ;?>"><?php echo $row_RsNovidades['titulo']; ?></a></div>
                <?php } while ($row_RsNovidades = mysql_fetch_assoc($RsNovidades)); ?>              <div id="fotos">
              <img src="img/titulos/album.jpg" alt="&Aacute;lbuns de Fotos" width="205" height="38" />
              	<?php do { ?>
              	  <table width="98%" border="0" cellpadding="0" cellspacing="6" class="linha_trecajada">
                    <tr>
                      <td width="24%"><a href="fotos/album.php?id=<?php echo $row_RsGalerias['id'] ;?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="80" height="60" border="0" class="borda_foto" /></a></td>
          <td width="76%" align="left" valign="middle"><p class="novidades_titulo"><a href="fotos/album.php?id=<?php echo $row_RsGalerias['id'] ;?>"><?php echo $row_RsGalerias['titulo']; ?></a><br />
                              <span class="novidade_texto"><?php echo $row_RsGalerias['data']; ?></span></p></td>
                    </tr>
                  </table>
              	  <?php } while ($row_RsGalerias = mysql_fetch_assoc($RsGalerias)); ?></div></td>
            <td width="38%" height="221" align="left" valign="top"><table width="95%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="img/titulos/depo.jpg" alt="Depoimentos" width="150" height="23" /></td>
              </tr>
              <tr>
                <td align="center" valign="top">                        </td>
              </tr>
              <tr>
                <td><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="img/recortes/depo/images/depo_01.jpg" width="240" height="17" /></td>
                  </tr>
                  <tr>
                    <td background="img/recortes/depo/images/depo_02.jpg"> <?php do { ?>
                    <div class="depoimento_marcacao">
                      <div class="depoimento"><?php echo $row_RsDepoimentos['depoimento']; ?><br />
                        <strong>Ass:</strong> <span class="depoimento_ass"><?php echo $row_RsDepoimentos['nome']; ?> <strong>-</strong> <?php echo $row_RsDepoimentos['cidade']; ?></span></div>
                    </div>
                    <?php } while ($row_RsDepoimentos = mysql_fetch_assoc($RsDepoimentos)); ?><div class="depoimento_ass"><div class="depoimento">
                      <div align="center">
                        <p><a href="depoimentos/">Clique para ver todos os depoimentos</a><br />
                          <br />
                            <a href="depoimentos/escrever.php"><img src="img/titulos/escrever.jpg" alt="Escrever Depoimento" width="140" height="20" border="0" /></a><br />
                            <br />
</p>
                      </div>
                    </div>
                    </div>         </td>
                  </tr>
                  <tr>
                    <td><img src="img/recortes/depo/images/depo_04.jpg" width="240" height="34" /></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
              </td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="256" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="192"><img src="img/titulos/opine.jpg" width="90" height="23" /></td>
              </tr>
              <tr>
                <td align="left" valign="top"><div>
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
              
            </table></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle"><img src="img/png/menu_baixo.png" width="800" height="42" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="img/png/rodape.png" width="800" height="74" border="0" usemap="#Map2" /></td>
  </tr>
</table>
                                                         
<map name="Map" id="Map">
  <area shape="rect" coords="92,10,182,28" href="index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="197,8,278,30" href="novidades" alt="Novidades" />
<area shape="rect" coords="290,8,410,27" href="fotos" alt="&Aacute;lbum de Fotos" />
<area shape="rect" coords="421,6,484,28" href="bloco" alt="O Bloco" />
<area shape="rect" coords="498,7,578,28" href="integrantes" alt="Integrantes" />
<area shape="rect" coords="594,9,691,28" href="faleconosco" alt="Fale Conosco" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="650,53,754,70" href="http://www.saquabb.com.br/victor" target="_blank" alt="Acesse meu Portif&oacute;lio - Victor Caetano" />
<area shape="rect" coords="139,53,241,73" href="#" alt="Andr&eacute; Pesco&ccedil;o" onclick="MM_openBrWindow('andre.php','','width=400,height=500')" />
</map>
</body>
</html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RsGalerias);

mysql_free_result($RsDepoimentos);
?>
