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

	$remetente = "pousaesmeralda@terra.com.br";
	$cabecalho = "From: \"Pousada Esmeralda \" <info@pousadaesmeralda.com.br>\n";
	$cabecalho = "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Formulario do site\n"; 
	$destinatario = "" . $_POST["Nome"] . "";
	$assunto = "Formulário De RESERVA";
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "E-mail enviado com sucesso!";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<link href="contato.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="4" bordercolor="#575C60" bgcolor="#999999" class="borda_menu">
  <tr>
    <th height="54" align="left" valign="top" scope="col"><img src="imagens/titulos/grandes/contato.jpg" alt="Contato" width="110" height="30" /></th>
  </tr>
  <tr>
    <th height="54" align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#575C60" bgcolor="#33CC33">
      <tr>
        <th height="42" align="left" valign="top" class="fonte11" scope="col"><ul>
          <li>Email: contato@realfotos.com.br<br />
                  <br />
          </li>
          <li>MSN (Victor) : saquabb@hotmail.com <br />
                  <br />
          </li>
          <li>MSN (Dudu) : dudumeier@hotmail.com </li>
        </ul></th>
      </tr>
      <tr>
        <th height="54" align="left" valign="top" scope="col"><div id="conteudo_interno" class="left">
          <h2>
            <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">&nbsp;&nbsp;&nbsp;".$msg."</b>" );  ?>
          </h2>
          <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Email','','RisEmail','Telefone','','R','Endereco','','R','Mensagem','','R');return document.MM_returnValue">
              <fieldset>
                <label for="Nome" class="titulo_coment">Nome:</label>
                <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                <label for="Email" class="titulo_coment">E-mail:</label>
                <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                <label for="Telefone" class="titulo_coment">Telefone:</label>
                <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                <label><span class="titulo_coment">Categoria:</span>
                  <select name="Categoria" class="textbox" id="Categoria">
                    <option>Selecione</option>
                    <option value="Cr&iacute;tica">Cr&iacute;tica</option>
                    <option value="Parceria">Parceria</option>
                    <option value="Outros">Outros</option>
                  </select>
                  <br />
                  </label>
                <label for="Endereco" class="titulo_coment">Endere&ccedil;o:</label>
                <input name="Endereco" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
                <label for="Mensagem" class="titulo_coment">Mensagem:</label>
                <textarea name="Mensagem" cols="36" rows="6" tabindex="5" class="textbox"></textarea>
                <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                </fieldset>
            </form>
          </div>
        </div></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
