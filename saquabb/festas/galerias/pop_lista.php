<?php
 include("config.php");
 if($ordem=="1") { $ordeminfo="nome ASC"; }
 if($ordem=="2") { $ordeminfo="nome DESC"; }
 if($ordem=="3") { $ordeminfo="data ASC"; }
 if($ordem=="4") { $ordeminfo="data DESC"; }

 $cont=0;
 $diretorio=@opendir("fotos/$id");
 while(($file=@readdir($diretorio)) !== false)
 {
    $extensao=strtolower(substr($file,strrpos($file,".")+1));
    if($file!="." AND $file!=".." AND ($extensao=="jpg" OR  $extensao=="jpeg"))
    {
     $arquivos[$cont][0]=$file;
     $arquivos[$cont][1]=filemtime("fotos/$id/$file");
     $cont++;
    }
 }
 $arquivos=organizararray($arquivos,$ordem);
 $total=count($arquivos);

 if($total>0 and $foto!="")
 {
  foreach($arquivos as $key => $row)
  { foreach($row as $cell) { if(strpos($cell,$foto)!== FALSE) { $iniciopag=$key; } } }
  if($foto!="" && $iniciopag!="") { $inicio=floor($iniciopag/10)+1; }
 }

 if($inicio=="") { $inicio=1; }
 $total_inicio=10*($inicio-1);
 $total_fim=$total_inicio+10;
 if($total_fim>$total)
 { $total_fim=$total; }
 else
 { $total_fim=$total_inicio+10; }
?>
<link href="../../css.css" rel="stylesheet" type="text/css" />

<table border="0" width="185" cellspacing="0" cellpadding="0">
        <tr>
                <td valign="top" align="center">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="332" align="center" valign="top">
                                <table bordercolor="#000000">
<?
for($i=$total_inicio;$i<$total_fim;$i++)
{

 ?>
                                        
                                        <tr>
                                                <td align="center"<? if($i+1==$total_fim) { ?> colspan="2"<? } ?>><table width="10" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td><a href="javascript:foto_loadXMLDoc('pop_foto.php?id=<?= $id; ?>&foto=<?= $arquivos[$i][0]; ?>');"><img src="imagem.php?x=75&y=40&img=fotos/<?= $id; ?>/<?= $arquivos[$i][0]; ?>" width="56" height="45" border="0" style="filter:alpha(opacity=60)" onmouseover="fadeGradativa(this,100,40,10)" onmouseout="fadeGradativa(this,60,20,10)" /></a></td>
                                                  </tr>
                                                </table></td>
 <?
 if($i<$total_fim-1)
 {
  $i++;
  ?>
                                                <td align="center"><table width="10" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td><a href="javascript:foto_loadXMLDoc('pop_foto.php?id=<?= $id; ?>&foto=<?= $arquivos[$i][0]; ?>');"><img src="imagem.php?x=75&y=40&img=fotos/<?= $id; ?>/<?= $arquivos[$i][0]; ?>" width="56" height="45" border="0" style="filter:alpha(opacity=60)" onmouseover="fadeGradativa(this,100,40,10)" onmouseout="fadeGradativa(this,60,20,10)" /></a></td>
                                                  </tr>
                                                </table></td>
  <?
 }
 ?>
                                        </tr>
 <?
}
?>
                            </table>
                                </td>
                        </tr>
                                </table>
                                </td>
                                </tr>
</table>