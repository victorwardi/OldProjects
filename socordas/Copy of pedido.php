<?php require_once('Connections/socordas.php'); ?>
<?php
mysql_select_db($database_socordas, $socordas);
$query_fornecedor = "SELECT * FROM fornecedor ORDER BY nome ASC";
$fornecedor = mysql_query($query_fornecedor, $socordas) or die(mysql_error());
$row_fornecedor = mysql_fetch_assoc($fornecedor);
$totalRows_fornecedor = mysql_num_rows($fornecedor);

mysql_select_db($database_socordas, $socordas);
$query_Cliente = "SELECT * FROM cliente ORDER BY nome ASC";
$Cliente = mysql_query($query_Cliente, $socordas) or die(mysql_error());
$row_Cliente = mysql_fetch_assoc($Cliente);
$totalRows_Cliente = mysql_num_rows($Cliente);

mysql_select_db($database_socordas, $socordas);
$query_frete = "SELECT * FROM frete ORDER BY nome DESC";
$frete = mysql_query($query_frete, $socordas) or die(mysql_error());
$row_frete = mysql_fetch_assoc($frete);
$totalRows_frete = mysql_num_rows($frete);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">

<head>
	<meta http-equiv="Content-Type"  content="application/xhtml+xml; charset=iso-8859-1" />
	<meta name="author" content="Leandro Vieira Pinho [ leandro@plugsites.net ]" />
	<meta name="language" content="pt-br" />
	
	<title>Exemplo do m&eacute;todo: insertAfter</title>

	<script type="text/javascript" src="file:///C|/Documents and Settings/Victor/Desktop/Curso_Ajax_Imasters_by_silverblade/js/perform.js"></script>
	
	<style type="text/css" media="screen">
		/*<![CDATA[*/
		<!--
			@import "file:///C|/Documents and Settings/Victor/Desktop/Curso_Ajax_Imasters_by_silverblade/css/style.css";
		-->
		/*]]>*/
		#box {
			border: 3px double #f00;
			padding: 10px;
			margin-bottom: 10px;
			width: 90%;
			background-color: #fcc;
		}
		#box h1 {
			margin-bottom: 10px;
		}
	</style>
<script type="text/javascript">
<!--
function insertTag(what) {
	// 1�
	var newElement = document.createElement(what); 
	// 2�
	newElement.appendChild(document.createTextNode("MERDA."));
	// 3�
	var referencia = document.getElementById("tit"); 
	// 4�
	var parentTag = referencia.parentNode; 
	// 5�
	parentTag.insertBefore(newElement, referencia.nextSibling);
}

//-->
</script>
</head>

<body>

<div id="global">

<h1 id="header">Web Sites com Ajax</h1>

<div id="conteudo">
  <div id="curso">
		
		<h2>Exemplo do m�todo: insertAfeter</h2>
		
		<noscript>
			<p>O exemplo est� impossibilitado de ser executado.</p>
			<p>Motivo: o JavaScript do seu browser est� desativado.</p>
			<p><a href="file:///C|/Documents and Settings/Victor/Desktop/Curso_Ajax_Imasters_by_silverblade/noscript.htm" title="Ative o JavaScript do seu browser">Saiba como ativ�-lo.</a></p>
		</noscript>
		
		<p><a href="#" onclick="javascript:insertTag('p'); return false;">Criar novo elemento</a></p>
		
		<div id="box">
			<h1 id="tit">Lorem ipsum dolor sit amet</h1>
		</div>
		
		<form id="form1" method="post" action="">
		  Protudo:
		  <label>
		  <input type="text" name="textfield" />
		  </label>
                </form>
		<p>&nbsp;</p>
	</div>
</div>
<!-- conteudo -->

<div id="sideBar">

</div>
<!-- / Sidebar -->
	
<div id="frameScroll">
	<a href="#" title="Ocultar / Exibir o menu" id="optFrameScroll">
		<img src="file:///C|/Documents and Settings/Victor/Desktop/Curso_Ajax_Imasters_by_silverblade/exe_scripts/cap2/img/icn/icone_frame_scroll_hide.jpg" width="6" height="50" alt="" />
	</a>
</div>

<div id="rodape">

</div>
<!-- Rodape -->

</div>
<!-- / Global -->

</body>
</html>
<?php
mysql_free_result($fornecedor);

mysql_free_result($Cliente);

mysql_free_result($frete);
?>