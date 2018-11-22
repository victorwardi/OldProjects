<?php
 include("config.php");
 header("Content-Type: text/html; charset=iso-8859-1");
 $cont=0;
 $diretorio=@opendir("fotos/$id");
 while(($file=@readdir($diretorio)) !== false)
 {
    $extensao=strtolower(substr($file,strrpos($file,".")+1));
    if($file!="." AND $file!=".." AND ($extensao=="jpg" OR  $extensao=="jpeg"))
    {
     $cont++;
     $arquivos[$cont][0]=$file;
     $arquivos[$cont][1]=filemtime("fotos/$id/$file");
    }
 }
 $arquivos=organizararray($arquivos,$ordem);
 $total=count($arquivos);

 if($foto=="" or $foto=="undefined") { $foto=$arquivos[0][0]; }

 if(file_exists("fotos/$id/$foto"))
 {
  $pinfo=@getimagesize("fotos/$id/$foto");
  $largura = $pinfo[0];
  $altura = $pinfo[1];
  if($largura>440)
  { $largura=440; }
 }
 if($foto=="")
 {
  die();
 }

 if($total>0)
 {
  foreach($arquivos as $key => $row)
  { foreach($row as $cell) { if(strpos($cell,$foto)!== FALSE) { $foto_pos=$key; } } }
 }


 if(file_exists("fotos/$id/$foto.txt"))
 {
  $fp2=@fopen("fotos/$id/$foto.txt","a+");
  $arquivo2=@file("fotos/$id/$foto.txt");
  $mensagem=@implode("<br>",$arquivo2);
  @fclose($fp2);
 }
?>
<link href="../../css.css" rel="stylesheet" type="text/css" />
<font face="Tahoma" color="#000000" style="font-size: 8.5pt">
<table width="10" border="1" cellpadding="0" cellspacing="4" bordercolor="#000000" bgcolor="#FFFFFF">
  <tr>
    <td><img src="fotos/<?= $id; ?>/<?= $foto; ?>" width="<?= $largura; ?>" border="0" /></td>
  </tr>
</table>
<br>
<?
 if($mensagem!="")
 {
 ?><center><?= $mensagem; ?><?
 }
?>