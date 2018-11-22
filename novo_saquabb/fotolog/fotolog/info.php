<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
ini_set("session.use_trans_sid",1);
$ver = 0;
if (isset($_GET["nome"]) && isset($_GET["visualizar"])) {
	$login = $_GET["nome"];
	$query = "Select login from usuarios where login='$login'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	if ($row=mysql_fetch_array($resultado)) {
		$ver=1;
	} else {
		$ver=0;
	}
} else if (isset($_COOKIE["login"])) {
	$login = $_COOKIE["login"];
	$ver=1;
} else {
	header("Location: logar.php");
	exit;
}
if ($ver==1) {
	$query = "Select id from usuarios where login='$login'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$row=mysql_fetch_array($resultado);
	$id_usuario = $row["id"];
	$query = "Select * from config_usuarios where id_usuario=$id_usuario";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	if ($row=mysql_fetch_array($resultado)) {
		$background = $row["background"];
		$cor = $row["cor_texto"];
		$nome_fonte = $row["nome_fonte"];
		$style = $row["style"];
		$titulo = $row["titulo"];
	}
?>
<HTML>
<HEAD>
<TITLE>
cYbEr's FotoLog - Sessão Pessoal de :: <?php echo $login; ?> :: [Parceria #DIGRATIS in www.dgol.com.br]
</TITLE>
</HEAD>
<BODY bgcolor="<?php echo $background; ?>">
<center><font color="<?php echo $cor; ?>" face="<?php echo $nome_fonte; ?>"><?php echo '<' . $style . '>'; echo $titulo; echo '</' . $syle . '>' ?></font></center></p>
</b><p align="left"><font color="<?php echo $cor; ?>" face="<?php echo $nome_fonte; ?>">Número de Fotos Adicionadas: <?php 
$query = "Select id from tab_fotos where id_usuario=$id_usuario";
$resultado = mysql_query($query,$conexao) or die($error_conexao);
$total = mysql_num_rows($resultado);
echo $total; ?></font></p>
<p align="left"><font color="<?php echo $cor; ?>" face="<?php echo $nome_fonte; ?>">Número de Fotos no Favoritos de outros Usuários: <?php
echo "Não colocado ainda!"; ?></font>
<?php
echo "<table width='100%' border='0'>\n";
$temp = "Select * from config";
$resultado = mysql_query($temp,$conexao) or die($error_conexao);
if ($row=mysql_fetch_array($resultado)) {
	$path_user = $row["path_usuarios"];
}
$query = "Select * from tab_fotos where id_usuario=$id_usuario";
$resultado = mysql_query($query,$conexao) or die($error_conexao);
if($row=mysql_fetch_array($resultado)) {
	mysql_data_seek($resultado,0);
	while($row=mysql_fetch_array($resultado)) {
		$imagem = $row["imagem"];
		$id = $row["id"];
		$descricao = $row["descricao"];
		$autor = $login;
		echo "	<tr>
			    <td align='center'><a href='{$path_user}{$login}/fotos/{$imagem}' target='_blank'><img src='{$path_user}{$login}/fotos/{$imagem}' border='0'></a></td>
			  </tr>
			  <tr>
			    <td align='center'><font face='$nome_fonte' color='$cor'>Autor: $autor</font></td>
			  </tr><a name='$id'></a>";			  		
		$query2 = "Select * from tab_comentarios where id_foto=$id order by DATA_COMENTARIO DESC";
		$resultado2 = mysql_query($query2,$conexao) or die($error_conexao);
		if ($row2=mysql_fetch_array($resultado2)) {
			mysql_data_seek($resultado2,0);
			while($row2=mysql_fetch_array($resultado2)) {
				$comentario = $row2["comentario"];
				$autor_comentario = $row2["autor_comentario"];
				$autor_email = $row2["autor_email"];
				$data_comentario = $row2["data_comentario"];
				echo "<tr>
			    		<td align='center'><font face='$nome_fonte' color='$cor'>Enviado por: $autor_comentario</font></td>
					  </tr>
					  <tr>
					  	<td align='center'><font face='$nome_fonte' color='$cor'>Comentário: $comentario</font></td>
					  </tr>
					  <tr>
					  	<td align='center'><font face='$nome_fonte' color='$cor'>E-mail: $autor_email</font></td>
					  </tr>
					  <tr>
					  	<td align='center'><font face='$nome_fonte' color='$cor'>Data de Envio: $data_comentario</font></td>
					  </tr>
					  <tr>
					  	<td align='center'><font face='$nome_fonte' color='$cor'>&nbsp;</font></td>
					</tr>";
			}
		} else {
			echo "<tr>
					<td align='center'><font face='$nome_fonte' color='$cor'>Não há comentários para essa Foto.</font></td>
				 </tr>";
		}
		echo "<tr>
				<td align='center'><a href='comentar.php?foto=$id&autor=$autor'>Enviar Comentário</a></td>
			  </tr>
			  <tr>
				<td align='center'><hr></td>
			  </tr>";
	}
} else {
	echo "<tr>
		  	<td>Não há fotos enviadas por esse Usuário!</td>
		  </tr>";
}
} else {
	header("Location: index.php");
	exit;
}
?>