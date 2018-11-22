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

	$remetente = "contato@saquabloco.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: \n"; 
	$destinatario = $remetente;
	$assunto = "Mensagem do Contato do Site";
	
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>||    Jhow Folia    ||</title>
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
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link href="css/contato.css" rel="stylesheet" type="text/css" />
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
      <h2 class="titulo_pg">Contato</h2>
      <div id="texto">
      <p><strong>SAC</strong><br />
Servi&ccedil;o de Atendimento ao Cliente<br />
<br />
(22) <strong>9949-3341</strong><br />
(22) <strong>9923-2535</strong><br />
(21) <strong>9612-1099</strong><br />
<br />
Envie um e-mail para:<br />
contato@jhowfolia.com.br<br />
contato@netterra..com.br<strong></strong></p>
      <p>Ou, se preferir, utilize o formul&aacute;rio abaixo.</p>
      <h2>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
        </h2>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
                                      <label for="Nome" class="novidades_titulo">Nome:</label>
                                      <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Cidade" class="novidades_titulo">Cidade:</label>
                                      <input name="Cidade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Email" class="novidades_titulo">E-mail:</label>
                                      <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Telefone" class="novidades_titulo">Telefone:</label>
                                      <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Mensagem" class="novidades_titulo">Mensagem:</label>
                                      <textarea name="Mensagem" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
                                      <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                                      </fieldset>
                                    </form>
                                </div>
      </div>
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
