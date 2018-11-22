<?php 
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
?>
<script language='javascript' type='text/javascript'>
local = window.location.href
alert(local)
for(x=0;x<=strlen(local);x++) {
	if (local.substr(x,x+1) == "/") {
		break;
	}
}
alert(x);
local = location.substring(x,strlen(location));
alert(local);
</script>
<?php 


?>
