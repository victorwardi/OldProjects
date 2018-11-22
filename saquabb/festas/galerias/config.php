<?php
function contarfotos($id)
{
 if(!(is_dir("fotos/$id")))
 { @mkdir("fotos/$id"); }
 $cont=0;
 $diretorio=@opendir("fotos/$id");
 while(($file=@readdir($diretorio)) !== false)
 {
    $extensao=strtolower(substr($file,strrpos($file,".")+1));
    if($file!="." AND $file!=".." AND ($extensao=="jpg" OR  $extensao=="jpeg"))  { $cont++; }
 }
 return $cont;
}
function colocarzeros($variavel,$casas)
{
 for($i=0;strlen($variavel)<$casas;$i++)
 { $variavel="0$variavel"; }
 return $variavel;
}
function organizararray($organizar,$ordem)
{
 //1 - nome do arquivo - ASC
 //2 - nome do arquivo - DESC
 //3 - data do arquivo - ASC
 //4 - data do arquivo - DESC
 if(count($organizar)==0) { return $organizar; }
 if($ordem==1)
 {
  foreach($organizar as $a)
  $sortAux[] = $a[0];
  @array_multisort($sortAux, SORT_ASC, $organizar);
  return $organizar;
 }
 if($ordem==2)
 {
  foreach($organizar as $a)
  $sortAux[] = $a[0];
  @array_multisort($sortAux, SORT_DESC, $organizar);
  return $organizar;
 }
 if($ordem==3)
 {
  foreach($organizar as $a)
  $sortAux[] = $a[1];
  @array_multisort($sortAux, SORT_ASC, $organizar);
  return $organizar;
 }
 if($ordem==4)
 {
  foreach($organizar as $a)
  $sortAux[] = $a[1];
  @array_multisort($sortAux, SORT_DESC, $organizar);
  return $organizar;
 }
 return $organizar;
}
?>