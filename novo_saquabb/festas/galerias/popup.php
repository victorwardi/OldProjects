<?
 include("config.php");

 if(file_exists("fotos/$id/descricao.txt"))
 {
  $fp2=@fopen("fotos/$id/descricao.txt","a+");
  $descricao=@file("fotos/$id/descricao.txt");
  @fclose($fp2);
 }

 $cont=0;
 $diretorio=@opendir("fotos/$id");
 while(($file=@readdir($diretorio)) !== false)
 {
    $extensao=strtolower(substr($file,strrpos($file,".")+1));
    if($file!="." AND $file!=".." AND ($extensao=="jpg" OR  $extensao=="jpeg"))
    {
     $cont++;
     $arquivos[$cont][0]=$file;
     $arquivos[$cont][1]=filemtime("fotos/$id");
    }
 }
 $arquivos=organizararray($arquivos,$ordem);
 $total=count($arquivos);
 $totalpaginas=ceil($total/10+1);
?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Saquabb.com.br - <?= $descricao[1]; ?></title>
<title></title>
<style type="text/css">
<!--
.fundo {
	background-image: url(imagens/fundo.jpg);
	background-repeat: no-repeat;
	background-position: topo;
}
-->
</style>
</head>

<body style="font-family: Tahoma" topmargin="0" leftmargin="0">

<script language="JavaScript">
fadeGradativaObjects = new Object();
fadeGradativaTimers = new Object();

function fadeGradativa(object, destOp, rate, delta){
if (!document.all)
return
    if (object != "[object]"){
        setTimeout("fadeGradativa("+object+","+destOp+","+rate+","+delta+")",0);
        return;
    }

    clearTimeout(fadeGradativaTimers[object.sourceIndex]);

    diff = destOp-object.filters.alpha.opacity;
    direction = 1;
    if (object.filters.alpha.opacity > destOp){
        direction = -1;
    }
    delta=Math.min(direction*diff,delta);
    object.filters.alpha.opacity+=direction*delta;

    if (object.filters.alpha.opacity != destOp){
        fadeGradativaObjects[object.sourceIndex]=object;
        fadeGradativaTimers[object.sourceIndex]=setTimeout("fadeGradativa(fadeGradativaObjects["+object.sourceIndex+"],"+destOp+","+rate+","+delta+")",rate);
    }
}

var req;
function lista_loadXMLDoc(url)
{
    req = null;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = lista_processReqChange;
        req.open("GET", url, true);
        req.send(null);
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = lista_processReqChange;
            req.open("GET", url, true);
            req.send();
        }
    }
}
function lista_processReqChange()
{
 if (req.readyState == 4)
 {
  if (req.status == 200) { document.getElementById('lista').innerHTML = req.responseText; }
  else { alert("Houve um problema ao obter os dados:\n" + req.statusText); }
 }
 else
 {
  document.getElementById('lista').innerHTML = "Carregando...";
 }
}

var req2;
function foto_loadXMLDoc(url)
{
    req2 = null;
    if (window.XMLHttpRequest) {
        req2 = new XMLHttpRequest();
        req2.onreadystatechange = foto_processReqChange;
        req2.open("GET", url, true);
        req2.send(null);
    } else if (window.ActiveXObject) {
        req2 = new ActiveXObject("Microsoft.XMLHTTP");
        if (req2) {
            req2.onreadystatechange = foto_processReqChange;
            req2.open("GET", url, true);
            req2.send();
        }
    }
}
function foto_processReqChange()
{
 if (req2.readyState == 4)
 {
  if (req2.status == 200) { document.getElementById('foto').innerHTML = req2.responseText; }
  else { alert("Houve um problema ao obter os dados:\n" + req2.statusText); }
 }
 else
 {
  document.getElementById('foto').innerHTML = "Carregando...";
 }
}

function destacar(inicio)
{
 i=0;
 for(i=1;i<<?= $totalpaginas; ?>;i++)
 {
  document.getElementById('num'+i).style.font='8pt tahoma';
 }
 document.getElementById('num'+inicio).style.font='bold 13pt tahoma';
}

</script>

<table width="700" height="443" border="0" cellpadding="0" cellspacing="0" class="fundo">
        <tr>
                <td height="92" colspan="2" valign="bottom"><font size="1"><b>
                  <div style="margin: 3px; float: right"><?= $total; ?> fotos</div></b></font>
          </td>
        </tr>
        <tr>
                <td width="186" height="215" align="center"><font style="font-size: 8pt">
          <div id="lista"></div>
          </font></td>
                <td width="514" rowspan="2" align="center"><font style="font-size: 8pt">
          <div id="foto" style="overflow-x: hidden; overflow: auto; width: 440; height:370; scrollbar-base-color: #CCCCCC;"></div></font></td>
        </tr>
        <tr>
          <td width="186" height="50" align="center" valign="top">
                        <font style="font-size: 6.5pt">Páginas:</font><br>
                  <span style="font-size: 8px"><font style="font-size: 8pt">
                  <?php
                        for($i=1;$i<$totalpaginas;$i++)
                        {
                         if($i==$inicio)
                         { ?> 
                  <u>
                  <?= $i; ?>
                  </u> 
                  <? }
                         else
                         { ?> 
                  <a id="num<?= $i; ?>" href="javascript:destacar(<?= $i; ?>);lista_loadXMLDoc('pop_lista.php?id=<?= $id; ?>&inicio=<?= $i; ?>');" target="_self" style="text-decoration: none; color: #000000">
                  <?= $i; ?>
                  </a> 
                  <? }
                         if($i==8 or $i==15) { ?>
                  <br>
                  <? }
                         elseif($i<$totalpaginas-1) { ?>
                  -
                  <? }
                        }
                        ?>
          </font></b>                        </span></td>
        </tr>
</table>

<script>
lista_loadXMLDoc('pop_lista.php?id=<?= $id; ?>');
destacar(1);
</script>

</body>

</html>