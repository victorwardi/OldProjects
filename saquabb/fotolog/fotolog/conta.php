<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
if (isset($_COOKIE["login"])) {
	$login = $_COOKIE["login"];
	?>
	<HTML>
	<HEAD>
	
	</HEAD>
	<BODY>
	<a href='editar.php?tipo=Informacoes&nome=<?php echo $login; ?>&logado=sim'>Editar Informações</a><br>
	<a href='editar.php?tipo=PaginaPessoal&nome=<?php echo $login; ?>&logado=sim'>Editar Página Pessoal</a><br>
	<a href='editar.php?tipo=Fotos&nome=<?php echo $login; ?>&logado=sim'>Editar Fotos Adicionadas</a><br>
	<a href='favoritos.php?nome=<?php echo $login; ?>&logado=sim'>Visualizar Favoritos</a><br>
	<a href='estatisticas.php?nome=<?php echo $login; ?>&logado=sim'>Visualizar Estatísticas Pessoais</a><br>
	</BODY>
	</HTML>
	
	<?php 
} else {
	header("Location: logar.php");
	exit;
}

?>