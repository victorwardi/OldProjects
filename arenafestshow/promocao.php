<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_ConBD, $ConBD);
$query_RsPromo = "SELECT * FROM promo ORDER BY id DESC";
$RsPromo = mysql_query($query_RsPromo, $ConBD) or die(mysql_error());
$row_RsPromo = mysql_fetch_assoc($RsPromo);
$totalRows_RsPromo = mysql_num_rows($RsPromo);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsPromo.imagem}");
$objDynamicThumb1->setResize(605, 0, true);
$objDynamicThumb1->setWatermark(false);

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

	$remetente = "contato@arenafestshow.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
	$assunto = "Promo Arena Fest";
	
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____ Arena Fest _________________________________________</title>
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
<link href="css/contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
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
      <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr>
          <td width="70%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="6">
            <tr>
              <td width="70%" height="25" align="left" valign="middle" class="TITULOS">Promo&ccedil;&atilde;o - <?php echo $row_RsPromo['titulo']; ?></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="txt_novidades_data"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="galeria_txt">Data: <?php echo $row_RsPromo['data']; ?></td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="4">
                
                <tr>
                  <th height="38" align="left" valign="top" class="txt_padrao" scope="row"><p class="txt_galeria_descricao">
                    <?php if ($row_RsPromo['ganhadores'] != "")
				   { // Show if recordset not empty ?></p>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_amarela_pontilhada">
                      <tr>
                        <th height="21" align="left" valign="top" class="txt_novidades_titulo" scope="col">Ganhadores</th>
                      </tr>
                    </table>
                    <br />
                    <span class="galeria_txt"><?php echo $row_RsPromo['ganhadores']; ?></span><br />
                    <?php } // Show if recordset not empty ?>
                    <span class="txt_padrao"><br />
                    </span>
                    <?php if($row_RsPromo['ganhadores'] == "") { // Show if recordset not empty ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <th height="26" align="left" valign="middle" class="txt_padrao" scope="col"><?php echo $row_RsPromo['materia']; ?></th>
                            </tr>
                        </table>
                      <?php } // Show if recordset not empty ?><br />                    </th>
                </tr>
                <tr>
                  <th height="26" align="left" valign="middle" class="txt_padrao" scope="row">&nbsp;</th>
                </tr>
                <tr>
                  <th height="26" align="left" valign="middle" class="txt_galeria_descricao" scope="row">                      * preencha todos os campos corretamente para concorrer! </th>
                </tr>
                <tr>
                  <th scope="row"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="2" >
                      <tr>
                        <td align="center"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#FFFFFF" class="fundo_tabela2">
                            <tr>
                              <th height="54" align="left" valign="top" scope="col"><div id="conteudo_interno" class="left">
                                  <h2>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
                                  </h2>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
                                      <label for="Nome" class="txt_novidades_data">Nome:</label>
                                      <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Cidade" class="txt_novidades_data">Cidade:</label>
                                      <input name="Cidade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Email" class="txt_novidades_data">E-mail:</label>
                                      <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Telefone" class="txt_novidades_data">Telefone:</label>
                                      <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Endereco" class="txt_novidades_data">Resposta:</label>
                                      <textarea name="Bairro" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
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
              </table></td>
            </tr>
            <tr>
              <td height="19" align="left" valign="top">&nbsp;</td>
            </tr>
          </table></td>
          <td width="30%" align="left" valign="top" bgcolor="#FFFFFF"><table width="91%" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><img src="img/propagandas/leo2p.jpg" alt="Leo do Som" width="240" height="53" /></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><img src="img/propagandas/peter2p.jpg" alt="Leo do Som" width="240" height="53" /></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="http://www.agitocerto.com" target="_blank"><img src="img/propagandas/agitop.jpg" alt="AgitoCerto.com" width="240" height="53" border="0" /></a><a href="contato.php"></a></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="contato.php"><img src="img/propagandas/anuncie.jpg" alt="Leo do Som" width="240" height="96" border="0" /></a></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="contato.php"><img src="img/propagandas/anuncie.jpg" alt="Leo do Som" width="240" height="96" border="0" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table></td>
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
mysql_free_result($RsPromo);
?>
