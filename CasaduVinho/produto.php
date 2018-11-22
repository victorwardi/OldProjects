<?php require_once('Connections/ConBD.php'); ?>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true) ?>
<?php
if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n";
	}

	$remetente = "contato@cantodovinho.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
	$assunto = "Pedido de Compra pelo Site";
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado!";
	}
}
?>
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
$query_RsListaPais = "SELECT * FROM pais ORDER BY nome ASC";
$RsListaPais = mysql_query($query_RsListaPais, $ConBD) or die(mysql_error());
$row_RsListaPais = mysql_fetch_assoc($RsListaPais);
$totalRows_RsListaPais = mysql_num_rows($RsListaPais);

mysql_select_db($database_ConBD, $ConBD);
$query_RsBannerCima = "SELECT * FROM banner_cima ORDER BY id DESC";
$RsBannerCima = mysql_query($query_RsBannerCima, $ConBD) or die(mysql_error());
$row_RsBannerCima = mysql_fetch_assoc($RsBannerCima);
$totalRows_RsBannerCima = mysql_num_rows($RsBannerCima);

mysql_select_db($database_ConBD, $ConBD);
$query_RsBannerLateral = "SELECT * FROM banner_lateral ORDER BY id DESC";
$RsBannerLateral = mysql_query($query_RsBannerLateral, $ConBD) or die(mysql_error());
$row_RsBannerLateral = mysql_fetch_assoc($RsBannerLateral);
$totalRows_RsBannerLateral = mysql_num_rows($RsBannerLateral);

$colname_RsProdutos = "-1";
if (isset($_GET['id'])) {
  $colname_RsProdutos = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsProdutos = sprintf("SELECT * FROM produtos WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_RsProdutos, "int"));
$RsProdutos = mysql_query($query_RsProdutos, $ConBD) or die(mysql_error());
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);
$totalRows_RsProdutos = mysql_num_rows($RsProdutos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("Uploads/");
$objDynamicThumb1->setRenameRule("{RsProdutos.foto}");
$objDynamicThumb1->setResize(150, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Canto do Vinho</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script type="text/JavaScript">
<!--
function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' deve ser endereço de email.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' está faltando\n'; }
  } if (errors) alert('Os Seguintes Erros Ocorreram:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>

	<!-- LightBox -->

		<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
		<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
		<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
		<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
    
   	<!-- Fim do LightBox --> 
    
<!-- InstanceEndEditable -->
</head>

<body>
<table width="872" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="872" align="center" valign="top" scope="row"><table width="872" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="44%" align="left" scope="row"><img src="img/logo.png" alt="" name="logo" width="387" height="69" border="0" usemap="#logoMap" id="logo" /></th>
        <td width="7%"><img name="pesquisar" src="img/pesquisar.png" width="115" height="69" border="0" id="pesquisar" alt="" /></td>
        <td width="49%" align="left" valign="middle" background="img/index_r1_c4.png">
        <!-- Formulário de busca de Produtos -->        <!-- Fim da Busca -->
        <table width="66%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <th width="73%" height="23" scope="row">&nbsp;</th>
            <td width="27%">&nbsp;</td>
          </tr>
          <tr>
            <form action="busca.php" method="get">
            
            <th align="left" scope="row"><input name="busca" type="text" class="txt_vinho_12px_normal" id="busca" onfocus="if(this.value=='Digite o nome do produto')this.value='';" value="Digite o nome do produto" size="32" maxlength="50" /> </th>
          
            <td align="center">
          
                 <input type="image" name="imageField" id="imageField" src="img/OK.png" />            </td>
            </form>
          </tr>
        </table></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th align="center" valign="top" scope="row"><img src="img/img2/menu.png" alt="" name="menu" width="872" height="45" border="0" usemap="#menuMap" id="menu" /></th>
  </tr>
  <tr>
    <th align="left" valign="top" background="img/fundo_tabela.png" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="32%" align="right" valign="top" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th colspan="2" align="left" scope="row"><img src="img/menu_lista.png" width="296" height="53" /></th>
            </tr>
          <tr>
            <th width="90%" height="258" align="right" valign="top" scope="row"><table width="92%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="top" class="txt_vinho_12px_normal" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="right" valign="top" class="txt_vinho_12px_normal" scope="row"><table width="95%" height="24" border="0" cellpadding="0" cellspacing="6">
                    <tr>
                      <th align="left" valign="middle" class="txt_vinho_12px" scope="row">Localize os produtos pelo pa&iacute;s. </th>
                      </tr>
                  </table></th>
              </tr>
              <tr>
                <th align="center" valign="top" class="txt_vinho_12px_normal" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="right" valign="top" scope="row"><?php do { ?>
                    <table width="94%" height="24" border="0" cellpadding="0" cellspacing="6">
                      <tr>
                        <th width="8%" align="left" valign="middle" scope="row"><img src="img/seta.jpg" width="11" height="11" /></th>
                        <td width="92%" align="left" valign="middle" class="txt_vinho_12px"><a href="pais.php?pais=<?php echo $row_RsListaPais['nome'];?>"><?php echo $row_RsListaPais['nome']; ?></a></td>
                      </tr>
                    </table>
                    <?php } while ($row_RsListaPais = mysql_fetch_assoc($RsListaPais)); ?></th>
              </tr>
              <tr>
                <th align="left" valign="top" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th align="center" valign="top" scope="row">&nbsp;<a href="<?php echo $row_RsBannerLateral['link'];?>"><img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsBannerLateral.imagem}");?>" width="200" class="contorno_1px_vinho" /></a></th>
              </tr>
            </table>              </th>
            <td width="10%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th height="66" scope="row">&nbsp;</th>
              </tr>
              <tr>
                <th background="img/destaque_.png" scope="row"><img src="img/destaque_.png" width="29" height="39" border="0" /></th>
              </tr>
            </table></td>
          </tr>
        </table></th>
        <td width="68%" align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th height="119" align="left" valign="middle" scope="row"><div id="bannerCima"><a href="<?php echo $row_RsBannerCima['link'];?>"><img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsBannerCima.imagem}");?>" width="480" height="110" border="0" class="contorno_1px_vinho" /></a></div>                
                </th>
            </tr>
            <tr>
              <th align="left" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th height="39" align="left" scope="row"><img src="img/titulos/produtos.jpg" alt="Destaques" width="520" height="39" border="0" /></th>
                  </tr>
                  <tr>
                    <th align="left" valign="top" scope="row"> <table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr>
                        <th width="25%" scope="row">&nbsp;</th>
                        <td width="75%">&nbsp;</td>
                      </tr>
                      <tr>
                        <th rowspan="6" align="center" valign="top" scope="row"><a href="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsProdutos.imagem}");?>" rel="lightbox" title="<?php echo $row_RsProdutos['nome']; ?>" ><img src="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsProdutos.foto}");?>" border="0" /></a> <br />
                              <span class="txt_vinho_12px_normal"><a href="<?php echo tNG_showDynamicImage("", "Uploads/", "{RsProdutos.imagem}");?>" rel="lightbox" title="<?php echo $row_RsProdutos['nome']; ?>" >Ampliar foto</span></a></th>
                        <td align="left" valign="top" class="txtTituloProduto"><?php echo $row_RsProdutos['nome']; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="txtDescProduto"><?php echo $row_RsProdutos['descricao']; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="txt_vinho_12px">Produtor: <span class="txtDescProduto"><?php echo $row_RsProdutos['produtor']; ?></span></td>
                        </tr>
                      <tr>
                        <td align="left" valign="top" class="txt_vinho_12px">Pa&iacute;s: <span class="txtDescProduto"><?php echo $row_RsProdutos['pais']; ?></span></td>
                        </tr>
                      <tr>
                        <td align="left" valign="top" class="txtValorProduto">R$ <?php echo $row_RsProdutos['valor']; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2" background="img/separador.jpg" scope="row"><img src="img/separador.jpg" width="1" height="22" /></th>
                      </tr>
                      <tr>
                        <th colspan="2" align="left" valign="middle" class="txt_vinho_12px_normal" scope="row">Para comprar nossos produtos preencha corretamente o fomul&aacute;rio abaixo!<br />
                          Assim que recebermos seu pedido, um de nossos atendentes entrar&aacute; em contato.</th>
                      </tr>
                      <tr>
                        <th colspan="2" scope="row"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#FFFFFF" class="fundo_tabela2">
                            
                            <tr>
                              <th height="54" align="left" valign="top" scope="col"><div id="conteudo_interno" class="left">
                                  <p>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
                                  </p>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
                                      <label for="Nome" class="txt_novidades_data">Nome:</label>
                                      <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="100" class="textbox" />
                                      <label for="Endereço" class="txt_novidades_data">Endereço:</label>
                                      <input name="Endereço" type="text" tabindex="2" value="" size="37" maxlength="200" class="textbox" />
                                      <label for="Email" class="txt_novidades_data">E-mail:</label>
                                      <input name="Email" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Telefone" class="txt_novidades_data">Telefone:</label>
                                      <input name="Telefone" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Produto" class="txt_novidades_data">Produto:</label>
                                      <input name="Produto" type="text" tabindex="5" value="<?php echo $row_RsProdutos['nome']; ?>" size="37" maxlength="50" class="textbox" />
                                      <label for="Quantidade" class="txt_novidades_data">Quantidade:</label>
                                      <input name="Quantidade" type="text" tabindex="6" value="1 Garrafa" size="37" maxlength="50" class="textbox" />
                                      <label for="Endereco" class="txt_novidades_data">Mensagem:</label>
                                      <textarea name="Endereço" cols="37" rows="5" class="textbox" tabindex="7"></textarea>
                                      <input name="submit" id="botao" type="submit" tabindex="8" value="Enviar" />
                                      </fieldset>
                                    </form>
                                </div>
                              </div></th>
                            </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th colspan="2" scope="row">&nbsp;</th>
                      </tr>
                      <tr>
                        <th colspan="2" background="img/separador.jpg" scope="row">&nbsp;</th>
                      </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row">&nbsp;</th>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></th>
            </tr>
          </table>          </td>
      </tr>
      
    </table></th>
  </tr>
  
  <tr>
    <th align="center" valign="top" scope="row"><img src="img/rodape.png" alt="" name="rodape" width="872" height="110" border="0" usemap="#rodapeMap" id="rodape" /></th>
  </tr>
</table>

<map name="menuMap" id="menuMap"><area shape="rect" coords="384,2,431,38" href="index.php" alt="Home" />
<area shape="rect" coords="436,1,510,39" href="produtos.php" alt="Produtos" />
<area shape="rect" coords="518,1,604,39" href="promo.php" alt="Promo&ccedil;&otilde;es" />
<area shape="rect" coords="608,1,707,40" href="quemsomos.php" alt="Quem Somos" /><area shape="rect" coords="712,2,815,38" href="fale.php" alt="Fale Conosco" />
</map>
<map name="logoMap" id="logoMap"><area shape="rect" coords="56,4,367,67" href="index.php" alt="Canto do Vinho" />
</map>

<map name="rodapeMap" id="rodapeMap"><area shape="rect" coords="748,91,841,109" href="http://www.saquabb.com.br/victor" target="_blank" alt="Web: Victor Caetano" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsListaPais);

mysql_free_result($RsBannerCima);

mysql_free_result($RsBannerLateral);

mysql_free_result($RsProdutos);
?>
