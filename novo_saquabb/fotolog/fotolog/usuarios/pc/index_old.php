<?php 
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
?>
<script language='javascript' type='text/javascript'>
location = window.location.href
for(x=0;x<=strlen(location);x++) {
	if (location.substring(x,x+1) == "/") {
		break;
	}
}
x = x + 1;
user = location.substring(x,strlen(location));
alert(user);
<?php
$query = "Select login from usuarios where login='$login'";
$resultado = mysql_query($query,$conexao) or die($error_conexao);
$retorno = mysql_num_rows($resultado);
if ($retorno>0) {
	?>
	local = <?php echo $path; ?> + "index.php?nome=" + user + "&visualizar=sim";
	alert(local);
	window.location.href = local;
	<?php 
} else {
	header("Location: " . $path . "/index.php");
}
?>
</script>