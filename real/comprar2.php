<?php require_once('Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_capa = 3;
$pageNum_capa = 0;
if (isset($_GET['pageNum_capa'])) {
  $pageNum_capa = $_GET['pageNum_capa'];
}
$startRow_capa = $pageNum_capa * $maxRows_capa;

mysql_select_db($database_fotos, $fotos);
$query_capa = "SELECT * FROM galeria ORDER BY id DESC";
$query_limit_capa = sprintf("%s LIMIT %d, %d", $query_capa, $startRow_capa, $maxRows_capa);
$capa = mysql_query($query_limit_capa, $fotos) or die(mysql_error());
$row_capa = mysql_fetch_assoc($capa);

if (isset($_GET['totalRows_capa'])) {
  $totalRows_capa = $_GET['totalRows_capa'];
} else {
  $all_capa = mysql_query($query_capa);
  $totalRows_capa = mysql_num_rows($all_capa);
}
$totalPages_capa = ceil($totalRows_capa/$maxRows_capa)-1;

mysql_select_db($database_fotos, $fotos);
$query_fotos = "SELECT * FROM fotos_digitais ORDER BY id_foto DESC";
$fotos = mysql_query($query_fotos, $fotos) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/modelo.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>_______ REAL?! ____________Fotos &amp; Design _________________________________</title>
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
<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
<base href="http://www.realfotos.com.br/" />

<!--Fireworks 8 Dreamweaver 8 target.  Created Tue Feb 27 10:36:14 GMT-0300 (Hora oficial do Brasil) 2007-->
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="imagens/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="head" -->
<link href="contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
</head>
<body bgcolor="#313639">
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="104" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="552" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="103" height="1" border="0" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td><img name="index2_r1_c1" src="imagens/index2_r1_c1.jpg" width="1" height="17" border="0" id="index2_r1_c1" alt="" /></td>
   <td rowspan="2" colspan="3"><img src="imagens/index2_r1_c2.jpg" alt="" name="index2_r1_c2" width="759" height="91" border="0" usemap="#index2_r1_c2Map" id="index2_r1_c2" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index2_r2_c1" src="imagens/index2_r2_c1.jpg" width="1" height="74" border="0" id="index2_r2_c1" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="74" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="index2_r3_c1" src="imagens/index2_r3_c1.jpg" width="105" height="332" border="0" id="index2_r3_c1" alt="" /></td>
   <td align="center" valign="middle"><a href="galeria.php?id=<?php echo $row_capa['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "fotos/capa/", "{capa.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
   <td><img name="index2_r3_c4" src="imagens/index2_r3_c4.jpg" width="103" height="332" border="0" id="index2_r3_c4" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="332" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="index2_r4_c1" src="imagens/index2_r4_c1.jpg" width="760" height="34" border="0" id="index2_r4_c1" alt="" /></td>
   <td><img src="imagens/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4" align="center" valign="top" bgcolor="#575C60"><table width="80%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <th bgcolor="#575C60" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#24282B" class="borda_menu">
         <tr>
           <th width="9%" height="28" align="center" valign="middle" class="menu" scope="col"><a href="index.php">Home</a></th>
           <th width="2%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="22%" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">Galerias de Fotos </a></th>
           <th width="2%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="14%" align="center" valign="middle" class="menu" scope="col"><a href="design.php">Design</a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="21%" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">Quem Somos </a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="14%" align="center" valign="middle" class="menu" scope="col"><a href="servico.php">Servi&ccedil;os</a></th>
           <th width="1%" align="center" valign="middle" class="menu" scope="col">|</th>
           <th width="13%" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">Contato</a></th>
         </tr>
       </table></th>
     </tr>
     <tr>
       <th scope="row"><!-- InstanceBeginEditable name="conteudo" -->
         <table width="100%" border="0" cellpadding="0" cellspacing="4" bordercolor="#575C60" bgcolor="#34393C" class="borda_menu">
           <tr>
             <th height="54" align="left" valign="top" scope="col"><img src="imagens/titulos/grandes/comprar.jpg" alt="Contato" width="180" height="30" /></th>
           </tr>
           <tr>
             <th height="54" align="left" valign="top" scope="col"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#575C60" bgcolor="#34393C">
               
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
						<label for="cod" class="titulo">C&oacute;digo da Foto :</label>
					<input name="CÃ³digo da Foto" type="text" class="textbox2" id="cod" tabindex="3" value="<?php echo $row_fotos['id_foto']; ?>" size="30" maxlength="30" />
					
					<label for="Tipo" class="titulo">Tipo da Foto :</label>
					<select name="Tipo de Foto" class="textbox2" id="Categoria">
					  <option> - Selecione - </option>
					  <option value="10X15">impress&atilde;o - 10X15</option>
					  <option value="15X20">impress&atilde;o - 15X20</option>
					   <option value="20X30">impress&atilde;o - 20X30</option>
					  <option value="Digital">Digital</option>
              </select>
					<label for="quant" class="titulo">Quantidade de C&oacute;pias  :</label>
					<select name="Quantidade" class="textbox2" id="quantidade">
					  <option> - Selecione - </option>
					  <option value="1">1 c&oacute;pia</option>
					  <option value="2">2 c&oacute;pias</option>
					  <option value="3">3 c&oacute;pias</option>
                    </select>

						  
						</label>
						<label for="Endereco" class="titulo_coment">Endere&ccedil;o:</label>
						<input name="Endereco" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
						<label for="Mensagem" class="titulo_coment">Mensagem:</label>
						<textarea name="Mensagem" cols="36" rows="6" tabindex="5" class="textbox"></textarea>
						<input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
					</fieldset>
				</form>
			  </div>
			</div>                   </th>
               </tr>
             </table></th>
           </tr>
         </table>
       <!-- InstanceEndEditable --></th>
     </tr>
     <tr>
       <th scope="row"><table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#24282B" class="borda_menu">
         <tr>
           <th class="texto_rodape2" scope="col">Proibida c&oacute;pia total ou parcial de qualquer conte&uacute;do deste site, sem autoriza&ccedil;&atilde;o! </th>
         </tr>
       </table></th>
     </tr>
     <tr>
       <th height="18" class="texto_rodape2" scope="row">RealFotos.com.br&reg; - 2007 - Todos os direitos reservados </th>
     </tr>
     <tr>
       <th height="76" align="center" valign="middle" scope="row"><a href="http://www.saquaonline.com.br" target="_blank"><img src="imagens/saquaonline.jpg" alt="SaquaOnline" width="60" height="55" border="0" /></a></th>
     </tr>
     
     
   </table></td>
   <td><img src="imagens/spacer.gif" width="1" height="265" border="0" alt="" /></td>
  </tr>
</table>

<map name="index2_r1_c2Map" id="index2_r1_c2Map"><area shape="rect" coords="577,63,601,83" href="index.php" alt="Home" />
<area shape="rect" coords="604,63,631,84" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($capa);

mysql_free_result($fotos);
?>
