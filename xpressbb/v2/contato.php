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

	$remetente = "contato@xpressbb.com";
	$cabecalho = "From: \"Contato Xpressbb\" <contato@xpressbb.com>\n";
	$cabecalho = "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Formulario do Site\n"; 
	$destinatario = "contato@xpressbb.com";
	$assunto = "Mensagem do Contato Xpresbb.com";
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem enviada com sucesso!";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="author" CONTENT="Victor Caetano"/>
<META NAME="description" CONTENT="Victor Caetano - victor@saquabb.com.br"/>
<META NAME="keywords" CONTENT="sites, web, desenvolvimento, grafica, site, webdesign, cartaz, cartazes, bodyboard, saqua, saquarema, flyer, flyers, fotos, perfil, galeria, contato, fale, conosco, fotos, surf, surfe, noticias"/>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Xpressbb.com</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link href="contato.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' Email inválido!\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="692" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="conteudo">
  <tr>
    <th scope="col"><img src="img/topo_.jpg" alt="topo" width="700" height="200" border="0" usemap="#Map" /></th>
  </tr>
  <tr>
    <th height="215" align="left" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th align="left" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th colspan="2" align="left" valign="top" bgcolor="#585F89" class="titulo_not" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <th align="left" valign="middle" class="branco_14" scope="col">Contato</th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th width="9%" align="left" valign="top" scope="col"></th>
              <th width="91%" align="left" valign="top" class="fonte_menu" scope="col"></th>
            </tr>
            <tr>
              <th height="95" colspan="2" align="left" valign="top" scope="col"><p>Para entrar em contato conosco utilize o formul&aacute;rio abaixo ou os emails a seguir:</p>
                <ul>
                  <li>a5marques@hotmail.com</li>
                  <li>                    contato@xpressbb.com </li>
                </ul></th>
            </tr>
            <tr>
              <th height="25" colspan="2" align="left" valign="middle" bgcolor="#585F89" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <th align="left" valign="middle" class="branco_14" scope="col">Formul&aacute;rio de Contato </th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th colspan="2" align="left" valign="top" scope="col"><p class="fonte_menu">* Preencha todos os campos <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">&nbsp;&nbsp;&nbsp;".$msg."</b>" );  ?>
			  	
                <div id="conteudo_interno" class="left">
                <div>
			  	  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Email','','RisEmail','Telefone','','R','Endereco','','R','Mensagem','','R');return document.MM_returnValue">
					<fieldset>
					<label for="Nome" class="titulo_coment">Nome*:</label>
						<input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
						<label for="Email" class="titulo_coment">E-mail*:</label>
						<input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
						<label for="Telefone" class="titulo_coment">Telefone*:</label>
						<input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
						<label><span class="titulo_coment">Categoria*:</span>	</label>

						
						<select name="Categoria" class="textbox" id="Categoria">
                       <option>Selecione</option>
                       <option value="Cr&iacute;tica">Cr&iacute;tica</option>
                       <option value="Parceria">Parceria</option>
                       <option value="Encomenda de Prancha">Encomenda de Prancha</option>
                       <option value="Outros">Outros</option>
                        </select>
					
						
						<label for="Endereco" class="titulo_coment">Endere&ccedil;o*:</label>
						<input name="Endereco" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
						<label for="Mensagem" class="titulo_coment">Mensagem*:</label>
						<textarea name="Mensagem" cols="36" rows="6" tabindex="5" class="textbox"></textarea>
						<input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
					</fieldset>
				</form>
			  </div>
			</div></p></th>
            </tr>
          </table></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></th>
  </tr>
  <tr>
    <th height="35" align="left" valign="top" background="img/base.jpg" class="rodape" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="4" id="rodape">
        <tr>
          <th align="center" valign="middle" scope="col">Xpressbb.com&reg; - 2007 - Todos os direitos reservados<br />
Desenvolvido por: <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> </th>
        </tr>
    </table></th>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="7,179,62,195" href="index.php" alt="Home" />
<area shape="rect" coords="72,180,159,197" href="novidades.php" alt="Novidades" />
<area shape="rect" coords="171,179,247,195" href="pranchas.php" alt="Pranchas" />
<area shape="rect" coords="258,180,396,195" href="galeria.php" alt="Galeria de Fotos" />
<area shape="rect" coords="406,179,465,196" href="equipe.php" alt="Equipe" />
<area shape="rect" coords="476,178,607,195" href="onde.php" alt="Onde Encontrar" />
<area shape="rect" coords="620,177,690,196" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>