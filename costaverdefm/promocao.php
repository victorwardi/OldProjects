<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_promocao = "-1";
if (isset($_GET['id'])) {
  $colname_promocao = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_promocao = sprintf("SELECT * FROM promo WHERE id = %s ORDER BY id DESC", $colname_promocao);
$promocao = mysql_query($query_promocao, $CostaverdeFM) or die(mysql_error());
$row_promocao = mysql_fetch_assoc($promocao);
$totalRows_promocao = mysql_num_rows($promocao);

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_publicidade = "SELECT * FROM anuncios ORDER BY id DESC";
$publicidade = mysql_query($query_publicidade, $CostaverdeFM) or die(mysql_error());
$row_publicidade = mysql_fetch_assoc($publicidade);
$totalRows_publicidade = mysql_num_rows($publicidade);
?>
<?php
setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

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

	$remetente = "saquabb@hotmail.com";
	$cabecalho = "From: \"Costa Verde FM\" <saquabb@hotmail.com>\n";
	$cabecalho = "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Costa Verde FM\n"; 
	$destinatario = $remetente;
	$assunto = "Promocao Site";
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado por Participar!";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"/><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" --> 
<meta name="author" content="Victor Caetano - saquabb@hotmail.com" />
<meta name="description" content="Site da Rádio Costa Verde Fm - Rio de Janeiro - Frequência: 91,7mhz FM" />
<meta name="keywords" content="radio online itaguai itaguaí rio de janeiro fm pagode axé funk musica música mp3 letras top 10 brasil brasileira promoção promocao festa fotos agito noite night" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&Aacute;DIO COSTA VERDE FM - A RADIO QUE TEM A CARA DO RIO - 91,7mhz</title>
<link href="css/contato.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--
function MM_validateForm() { //v4.0
	  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
	  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
		if (val) { nm=val.name; if ((val=val.value)!="") {
		  if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
			if (p<1 || p==(val.length-1)) errors+='- '+nm+' : preencha com um e-mail válido.\n';
		  } else if (test!='R') { num = parseFloat(val);
			if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
			if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
			  min=test.substring(8,p); max=test.substring(p+1);
			  if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
		} } } else if (test.charAt(0) == 'R') errors += '*** '+nm+' é requerido ***\n'; }
	  } if (errors) alert('Os seguintes erro(s) ocorreram:\n'+errors);
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
<!-- InstanceEndEditable -->
<link href="css/css.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/js.js" type="text/javascript"></script>

<!-- Inicio Google Analytics -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-3";
urchinTracker();
</script>
<!-- Fim Google Analytics -->
</head>

<body onLoad="MM_preloadImages('img/topo_2.jpg')">
<table width="918" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <th width="918" height="85" scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="col"><script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','552','height','200','title','Costa Verde Fm','src','flash/topo','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/topo' ); //end AC code
      </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="552" height="200" title="Costa Verde Fm">
              <param name="WMode" value="Transparent">
              <param name="movie" value="flash/topo.swf" />
              <param name="quality" value="high" />
              <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="552" height="200"></embed>
            </object>
          </noscript></th>
        <th align="left" valign="top" bgcolor="#61B672" scope="col"><a href="javascript:MM_openBrWindow('../online','','width=398,height=190')" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Radio OnLine','','img/topo_2.jpg',1)"><img src="img/topo_1.jpg" name="Radio OnLine" width="365" height="200" border="0" id="Radio OnLine" /></a></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th align="right" scope="row"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <th width="168" align="left" valign="top" bgcolor="#D7FFDD" scope="col"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" id="navigation">
          <tr>
            <td width="165"><a href="index.php" class="navText">Home</a></td>
          </tr>
          <tr>
            <td><a href="destaques.php">Destaques</a></td>
          </tr>
          <tr>
            <td width="165"><a href="javascript:MM_openBrWindow('../online','','width=398,height=190')" class="navText">R&aacute;dio Online </a></td>
          </tr>
          <tr>
            <td width="165"><a href="programacao.php" class="navText">Programa&ccedil;&atilde;o</a></td>
          </tr>
          <tr>
            <td><a href="promocoes.php" class="navText">Promo&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td><a href="fiqueligado.php" class="navText">Fique Ligado</a></td>
          </tr>
          <tr>
            <td><a href="galerias.php" class="navText">Galerias de Fotos </a></td>
          </tr>
          <tr>
            <td><a href="equipe.php">Equipe</a></td>
          </tr>
          <tr>
            <td><a href="top12.php" class="navText">Top 12 </a></td>
          </tr>
          <tr>
            <td><a href="javascript:MM_openBrWindow('chat','','width=780,height=600')" class="navText">Chat</a></td>
          </tr>
          <tr>
            <td><a href="recados.php">Recados</a></td>
          </tr>
          <tr>
            <td><a href="links.php" class="navText">Links</a></td>
          </tr>
          <tr>
            <td><a href="parceiros.php" class="navText">Parceiros</a></td>
          </tr>
          <tr>
            <td><a href="contato.php" class="navText">Contato</a></td>
          </tr>
        </table>
       </th>
        <th width="750" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <th width="61%" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr>
                        <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
                            <tr>
                              <th scope="col">Promo&ccedil;&atilde;o</th>
                            </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th align="center" valign="top" scope="row"><table width="73%" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <th align="left" class="top_num" scope="col"><?php echo $row_promocao['nome']; ?> - <?php echo $row_promocao['data']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;<img src="<?php echo tNG_showDynamicImage("", "fotos/", "{promocao.imagem}");?>" alt="<?php echo $row_promocao['nome']; ?>" class="borda_preta_1px" /></th>
                          </tr>
                          <tr>
                            <th align="left" class="recado" scope="row"><?php echo $row_promocao['descricao']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                          </tr>
                          <tr>
                            <th height="30" align="left" valign="top" scope="row"><span class="top_num">Para participar desta promo&ccedil;&atilde;o preencha o formul&aacute;rio abaixo!<br />
                                <span class="top_musica">* preencha todos os campos corretamente.</span></span></th>
                          </tr>
                          <tr>
                            <th scope="row"><table width="500" border="0" align="center" cellpadding="0" cellspacing="2">
  
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#FFFFFF">
      

      <tr>
        <th height="54" align="left" valign="top" scope="col"><div id="conteudo_interno" class="left">
            <h2>
              <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
            </h2>
          <div>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Idade','','R','Email','','RisEmail','Telefone','','R','Bairro','','R');return document.MM_returnValue">
                <fieldset class="link_12px_preto_n">
                <label for="Nome" class="titulo_coment">Nome Completo:</label>
                <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                <label for="Idade" class="titulo_coment">Idade:</label>
                <input name="Idade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                <label for="Email" class="titulo_coment">E-mail:</label>
                <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                <label for="Telefone" class="titulo_coment">Telefone:</label>
                <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
               
                <label for="Endereco" class="titulo_coment">Bairro:</label>
                <input name="Bairro" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
                 <label for="Promocao" class="titulo_coment">Promoção:</label>
                <input name="Promocao" type="text" tabindex="5" value="<?php echo $row_promocao['nome']; ?>" size="37" maxlength="50" class="textbox" />
                <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                </fieldset>
              </form>
          </div>
        </div></th>
      </tr>
    </table></td>
  </tr>
</table></th>
                          </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th scope="row">&nbsp;</th>
                      </tr>
                  </table></th>
                  <th width="39%" align="right" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td align="center"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="1" >
                        <tr>
                          <td height="18" align="left" valign="middle" class="fonte11px_branca_negrito"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="titulos">
                              <tr>
                                <th scope="col">An&uacute;ncios</th>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="55"><?php do { ?>
                              <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top"><a href="anuncio.php?id=<?php echo $row_publicidade['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "fotos/", "{publicidade.banner}", 200, 0, true); ?>" alt="<?php echo $row_publicidade['empresa']; ?>" border="0" class="borda_preta_1px" /></a></td>
                                </tr>
                              </table>
                            <?php } while ($row_publicidade = mysql_fetch_assoc($publicidade)); ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
        </tr>
    </table></th>
  </tr>
  <tr>
    <th height="35" align="center" valign="middle" bgcolor="#47BB6A" class="fonte11px_branca_negrito" scope="row"><p>R&aacute;dio Costa Verde FM - 91,7 mhz - A R&aacute;dio Que Tem A Cara do Rio <br />
        <span class="fonte11px_branca">Todos os Direitos Resevados - 2007 - </span><span class="fonte11px_branca">Desenvolvido por: </span><a href="mailto:saquabb@hotmail.com" class="fonte11px_branca_negrito">Victor Caetano e Ded&eacute; Siqueira </a></p>
    </th>
  </tr>
</table>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($promocao);

mysql_free_result($publicidade);
?>
