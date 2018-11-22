<?php
$local = $_SERVER['DOCUMENT_ROOT']."/".$fotolog;
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
ini_set("session.use_trans_sid",1);
?>
<HTML>
<HEAD>
<TITLE>
cYbEr's FotoLog - WWW.CYBERSFOTOLOG.COM.BR - [Parceria: #DIGRATIS in www.dgol.com.br]
</TITLE>
</HEAD>
<BODY>
<p align="left">Seja Bem-Vindo <?php
if (!$_COOKIE["login"]) {
	$usuario = "Visitante";
} else {
	$usuario = $_COOKIE["login"];
}
echo "<b><i>" . $usuario . "!</b></i></p>";
if ($usuario != "Visitante") {
	print "<p align='left'><a href='conta.php'>Minha Conta</a></p>";
} else {
	print "<p align='left'><a href='logar.php'>Logar</a></p>";
}
?>
<p align="left"><a href="logoff.php">Sair</a></p>
<p align="left"><a href="upload.php">Upload</a></p>
<?php
$query = "Select * from tab_fotos order by DATA_POST DESC LIMIT 0,5";
$resultado = mysql_query($query,$conexao) or die($error_conexao);
$retorno = mysql_num_rows($resultado);
if ($retorno>0) {
	print "<table width='20%' border='0' align='left'>
		  <tr>
		    <td bgcolor='#0033FF'><div align='center'><font color='#FFFFFF'>Novas Fotos</font></div></td>
		  </tr>";
	mysql_data_seek($resultado,0);
	while($row=mysql_fetch_array($resultado)) {
		$link = $row["imagem"];
		$id = $row["id"];
		$user = $row["id_usuario"];
		$descricao = $row["descricao"];
		$query2 = "Select login from usuarios where id=$user";
		$resultado2 = mysql_query($query2,$conexao) or die($error_conexao);
		$row2=mysql_fetch_array($resultado2);
		$login = $row2["login"];
		$query3 = "Select * from config";
		$resultado3 = mysql_query($query3,$conexao) or die($error_conexao);
		if ($row3=mysql_fetch_array($resultado3)) {
			$path_principal = $row3["path_principal"];
			$path_usuarios = $row3["path_usuarios"];
		}
		?>
		<tr> 
    <td><a href=" <?php echo $path_principal . 'info.php?nome=' . $login . '&visualizar=sim#' . $id ?>"><img src=" <?php echo $path_principal . 'usuarios/' . $login . '/fotos/' . $link; ?>" alt=" <?php echo $descricao; ?>" width="180" height="40"></a></td>
  </tr>
  <tr>
    <td>Autor: <?php echo $login; ?></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
		 <?php 
	}
}
?>
  
</table>
</BODY>


</HTML>