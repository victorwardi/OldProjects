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

	$remetente = "contato@saquabb.com.br";
	$cabecalho = "From: \"victor caetano\" <contato@saquabb.com.br>\n";
	$cabecalho = "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Formulario do site\n"; 
	$destinatario = $remetente;
	$assunto = "Formulário Intnet";
	
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Intnet :: Saquarema :: (22) 2653-3522 / 2653-4156</title>
	<meta name="title" content="Intnet">
	<meta name="url" content="http://www.intnet.com.br"> 
	<meta name="description" content="Intnet Provedor de internet.">
	<meta name="keywords" content="intnet, saquarema, internet, provedor">
	<link href="fotos/contato.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
	function abrirsuporte(URL)
	{
		var width = 550;
		var height = 430;
		var left = 50;
		var top = 5;
		window.open(URL,'eee', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=yes, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
	}
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
			if (p<1 || p==(val.length-1)) errors+='- '+nm+' : preencha com um e-mail válido.\n';
		  } else if (test!='R') { num = parseFloat(val);
			if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
			if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
			  min=test.substring(8,p); max=test.substring(p+1);
			  if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
		} } } else if (test.charAt(0) == 'R') errors += '- '+nm+' é requerido.\n'; }
	  } if (errors) alert('Os seguintes erro(s) ocorreram:\n'+errors);
	  document.MM_returnValue = (errors == '');
	}
</script>
<body>
	<div id="geral">
		<div id="topo">
			<a href="index.php"><img src="img/topo_logo.jpg" alt="Intnet" width="172" height="70" border="0" /></a>
		    <img src="img/topo_desenho.jpg" width="370" height="70" />
			<img src="img/topo_telefone.jpg" alt="Tel: (22) 2653-3522" width="215" height="70" />
			<p id="data" class="right"><?php echo strftime("Saquarema, %d de %B de %Y") ?>. </p>
		</div>
		<div id="conteudo" class="left">
			<div id="menu" class="left">
				<ul>
					<li><p>Intnet</p></li>
					<li><a href="index.php">Home</a></li>
					<li><a href="segundavia.php">2&ordf; Via do Boleto</a></li>
					<li><a href="extrato.php">Extrato de conex&atilde;o </a></li>
					<li><a href="trocarsenha.php">Trocar senha</a></li>
					<li><a href="http://webmail.prosa.com.br/" target="_blank">Webmail</a></li>
					<li><a href="http://200.220.193.253/medidor/meter.php" target="_blank">Teste de velocidade </a></li>
					<li><a href="suporte.php">Suporte</a></li>
					<li><a href="faleconosco.php">Fale Conosco </a></li>
					<li><p>Saquarema</p></li>
					<li><a href="http://www.brasilviagem.com/pontur/?CodCid=9" target="_blank">Turismo</a></li>
					<li><a href="http://www.saquarema.rj.gov.br/" target="_blank">Prefeitura</a></li>
					<li><a href="http://br.weather.com/weather/tenday/BRXX0667?x=4&amp;y=18" target="_blank">Previs&atilde;o do Tempo </a></li>
					<li><p>Indicadores</p></li>
					<li><a href="http://www.bovespa.com.br/Cotacoes2000/PosicaoGeral.asp" target="_blank">Bovespa</a></li>
					<li><a href="http://www.andima.com.br/previa/resultados/previa.html" target="_blank">Andima</a></li>
				</ul>
			</div>
			<div id="conteudo_interno" class="left">
				<h2>FALE CONOSCO </h2>
				<?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">&nbsp;&nbsp;&nbsp;".$msg."</b>" );  ?>
			  	<div>Telefones: <strong>(22) 2653-3522 / 2653-4156</strong><br />
			    Endere&ccedil;o:<strong> Rua Beatriz Amaral, n&ordm;199, sala 04 &ndash; Bacax&aacute; - Saquarema - RJ (no pr&eacute;dio da Lapec Laborat&oacute;rio).<br />
			    </strong>E-mail suporte:<strong> <a href="mailto:suporte_intnet@saquarema.com.br">suporte_intnet@saquarema.com.br</a><br />
			    </strong>E-mail comercial: <strong><a href="mailto:comercial_intnet@saquarema.com.br">comercial_intnet@saquarema.com.br</a> <br />
			    <br />
			    </strong>Ou utilize o formul&aacute;rio abaixo:<br />
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Email','','RisEmail','Telefone','','R','Endereco','','R','Mensagem','','R');return document.MM_returnValue">
					<fieldset>
						<legend title="Entre em contato conosco" >Contato</legend>
						<label for="Nome">Nome:</label>
						<input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
						<label for="Email">E-mail:</label>
						<input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
						<label for="Telefone">Telefone:</label>
						<input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
						<label for="Endereco">Endere&ccedil;o:</label>
						<input name="Endereco" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
						<label for="Mensagem">Mensagem:</label>
						<textarea name="Mensagem" cols="36" rows="6" tabindex="5" class="textbox"></textarea>
						<input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
					</fieldset>
				</form>
			  </div>
			</div>
			<div class="left"><a href="cobertura.php"><img src="img/home_cobertura.gif" width="159" height="101" border="0" /></a></div>
			<div class="left"><a href="suporte.php"><img src="img/home_suporte.gif" width="159" height="101" border="0" /></a></div>
			<div class="left"><a href="faleconosco.php"><img src="img/home_contato.gif" width="159" height="102" border="0" /></a></div>
		</div>
		<div class="clear"></div>
		<div id="rodape">
			<p class="left">&copy; Intnet. Todos os direitos reservados.</p>
			<img class="right" src="img/web.gif" alt="Web by: Daniel Ramos" />
		</div>
	</div>
</body>
</html>