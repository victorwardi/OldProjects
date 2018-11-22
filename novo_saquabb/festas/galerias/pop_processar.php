<?
include("../conectar.php");
include("config.php");

$qstring=split("&", $QUERY_STRING);
$action=$qstring[0];

//$tabela5 = ag_eventos
//$tabela6 = ag_comentarios

/////////////////////////////////////////////////////////////////////////////////
if($action=="votar")
{
 $resultado = mysql_query("SELECT * FROM $tabela5 WHERE id=$id LIMIT 1");
 $vot_soma = mysql_result($resultado,0,"vot_soma");
 $vot_votos = mysql_result($resultado,0,"vot_votos");
 $vot_soma+=$voto;
 $vot_votos++;
 $resultado = "UPDATE $tabela5 SET vot_soma='$vot_soma',vot_votos='$vot_votos' WHERE id=$id";
 @mysql_query($resultado);
 setcookie("topgga_$id","sim",time()+120);
 header("Location: pop_topo.php?id=$id");
}
/////////////////////////////////////////////////////////////////////////////////
if($action=="comentar")
{
 $data=date("Ymd",time()-3600);
 $hora=date("H:i",time()-3600);
 $ip=$_SERVER['REMOTE_ADDR'];
 $usuarioid=$_SESSION['us_id'];
 $resultado = "INSERT INTO `$tabela6` (`id` , `eventoid` , `foto` , `nome` , `data` , `hora` , `comentario`, `ip`, `usuarioid`) ";
 $resultado .="VALUES ('', '$id', '$foto', '$nome', '$data', '$hora', '$comentario', '$ip', '$usuarioid')";
 @mysql_query($resultado);
 exit(header("Location: pop_foto.php?id=$id&foto=$foto&infomensagem=Comentário enviado com sucesso!"));
}
/////////////////////////////////////////////////////////////////////////////////
if($action=="adicionaraoalbum")
{
 include("pop_pro_adicionar.php");
}
/////////////////////////////////////////////////////////////////////////////////
if($action=="adicionaraoalbum_pro")
{
 $usuarioid=$_SESSION['us_id'];
 $resultado = mysql_query("SELECT * FROM $tabela3 WHERE usuarioid='$usuarioid' AND eventoid='$id' AND fotonome='$foto'");
 if(@mysql_num_rows($resultado)>0)
 { exit(header("Location: pop_foto.php?id=$id&foto=$foto&infomensagem=A foto $foto já está no seu álbum de fotos!")); }

 $resultado = "INSERT INTO `$tabela3` (`id` , `usuarioid` , `eventoid` , `fotonome` , `comentario`) ";
 $resultado .="VALUES ('', '$usuarioid', '$id', '$foto', '$comentario')";
 @mysql_query($resultado);
 exit(header("Location: pop_foto.php?id=$id&foto=$foto&infomensagem=A foto $foto foi adicionada ao seu álbum com sucesso!"));
}
/////////////////////////////////////////////////////////////////////////////////
if($action=="enviar")
{
 include("pop_pro_enviar.php");
}
/////////////////////////////////////////////////////////////////////////////////
?>