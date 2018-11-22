<?php
  //conectando ao mysql
  $conn = @mysql_connect("localhost", "root","582041");  
  $db   = @mysql_select_db("saquabb", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `noticias` ORDER BY `id` DESC Limit 7";

  //Executando a instrução sql
  $sql  = @mysql_query($sql);

  //Pegando o numero de registros
  $rst = mysql_num_rows($sql);

  //Se tiver algum registro
  if($rst > 0) {

        //Abre/cria o arquivo tickers.xml com permissão para escrever
    $xml = fopen("registros.xml", "w");

    //Escreve o cabeçalho e o primeiro nó do xml
    fwrite($xml, "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n");
    fwrite($xml, "<tickers>\r\n");

    //Para cada registro que tiver
    for($i=0; $i<$rst; $i++) {

      //Pegamos o valor de cada registro
      $titulo = utf8_encode(mysql_result($sql,$i,"titulo"));
      $coluna = utf8_encode(mysql_result($sql,$i,"coluna"));
      $data = utf8_encode(mysql_result($sql,$i,"data"));
      $imagem = utf8_encode(mysql_result($sql,$i,"imagem"));
      $id = utf8_encode(mysql_result($sql,$i,"id"));

         //Guardamos na variavel $conteudo as tags e os valores do xml
         $conteudo = "<ticker>\r\n";
         $conteudo .= "<titulo>$titulo</titulo>\r\n";
         $conteudo .= "<coluna>$coluna</coluna>\r\n";
         $conteudo .= "<data>$data</data>\r\n";
         $conteudo .= "<imagem>../uploads/fotos/$imagem</imagem>\r\n";
         $conteudo .= "<link>http://www.saquabb.com.br/exibir_noticia.php?id=$id</link>\r\n";
         $conteudo .= "</ticker>\r\n";

      //Escrevendo no tickers.xml
      fwrite($xml, $conteudo);
    }

    //Finalizando com a última tag
    fwrite($xml, "</tickers>");
    
    //Fechando o arquivo
    fclose($xml);    

  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="256" height="250">
    <param name="movie" value="capa.swf" />
    <param name="quality" value="high" />
    <embed src="capa.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="256" height="250"></embed>
  </object>
</div>
</body>
</html>

