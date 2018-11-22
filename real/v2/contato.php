<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);
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
	$cabecalho = "From: \"RealFotos\" <saquabb@hotmail.com>\n";
	$cabecalho = "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Formulario do site\n"; 
	$destinatario = $remetente;
	$assunto = "Mensagem do Contato RealFotos";
	
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
<html xmlns="http://www.w3.org/1999/xhtml">
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
</script><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<META NAME="author" CONTENT="Victor Caetano">
<META NAME="description" CONTENT="Victor Caetano - victor@saquabb.com.br">
<META NAME="keywords" CONTENT="sites, web, desenvolvimento, grafica, site, webdesign, cartaz, cartazes, bodyboard, saqua, saquarema, flyer, flyers, fotos, perfil, galeria, contato, fale, conosco, fotos, surf, surfe, noticias"/>
<title>Real Fotos.com.br</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<!-- InstanceBeginEditable name="head" -->
<link href="../contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
</head>

<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-2";
urchinTracker();
</script>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="right" valign="middle" scope="col"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
      <tr>
        <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
        <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
        <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
        <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
        <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th scope="row"><table width="774" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="59" scope="col">&nbsp;</th>
        </tr>
      <tr>
        <th height="98" align="center" valign="bottom" scope="row"><table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="left" valign="bottom" class="fonte_10px_preta" scope="col">Foto Destaque </th>
            </tr>
            <tr>
              <th align="center" valign="middle" class="fonte_10px_preta" scope="col"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/destaque/", "{destaque.foto}");?>" class="borda_destaque_8px" /></th>
            </tr>
            <tr>
              <th align="right" valign="top" class="fonte_10px_preta" scope="row">Atleta: <?php echo $row_destaque['atleta']; ?> - Local: <?php echo $row_destaque['local']; ?> - Foto: <?php echo $row_destaque['fotografo']; ?></th>
            </tr>
          </table></th>
      </tr>
      <tr>
        <th height="19" align="center" valign="middle" scope="row">&nbsp;</th>
        </tr>
      <tr>
        <th align="center" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Contato</th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th align="center" valign="middle" scope="row"><table width="100%" border="0" cellpadding="6" cellspacing="2" bordercolor="#FFFFFF">
                <tr>
                  <th height="39" align="left" valign="middle" class="fonte11" scope="col">Para entrar em contato conosco utilize os emails abaixo ou o formul&aacute;rio!</th>
                </tr>
                <tr>
                  <th height="42" align="left" valign="top" class="fonte11" scope="col"><ul>
                      <li class="link_12px_preto_n">Email: contato@realfotos.com.br<br />
                          <br />
                      </li>
                    <li class="link_12px_preto_n">MSN (Victor) : saquabb@hotmail.com <br />
                          <br />
                      </li>
                    <li class="link_12px_preto_n">MSN (Dudu) : dudumeier@hotmail.com </li>
                  </ul></th>
                </tr>
                <tr>
                  <th height="54" align="left" valign="top" scope="col"><div id="conteudo_interno" class="left">
                      <h2>
                        <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">&nbsp;&nbsp;&nbsp;".$msg."</b>" );  ?>
                      </h2>
                    <div>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Email','','RisEmail','Telefone','','R','Endereco','','R','Mensagem','','R');return document.MM_returnValue">
                          <fieldset class="link_12px_preto_n">
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
        <!-- InstanceEndEditable --></th>
        </tr>
      
      <tr>
        <th align="center" valign="middle" scope="row"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
          <tr>
            <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
            <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
            <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
            <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
            <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th class="fonte_10px_preta" scope="row">RealFotos.com.br&copy; - Todos os Direitos Reservados<br />
Desenvolvido por Victor Caetano </th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($destaque);
?>