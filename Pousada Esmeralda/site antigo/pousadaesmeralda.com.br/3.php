
<?php


setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$nome = "".$_POST["Nome"]."";
		$email = "".$_POST["Email"]."";
		$telefone = "".$_POST["Telefone"]."";
		$cidade = "".$_POST["Cidade"]."";
        $estado = "".$_POST["estado"]."";
		$pais = "".$_POST["pais"]."";
		$datachegada = "".$_POST["DataChegada"]."";
		$datapartida = "".$_POST["DataPartida"]."";
        $acamodacao = "".$_POST["Acomodacao"]."";
		$adultos = "".$_POST["Adultos"]."";
		$criancas = "".$_POST["Criancas"]."";
		$infos = "".$_POST["Infos"]."";
		$mensagem = "<HTML><style type=\"text/css\">
		<!--
.borda {
}
.texto_negrito {
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #284203;
}
.text {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
.titulo {
	font-size: 12px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-style: normal;
	color: #284203;
}
body,td,th {
}
body {
	background-color: #284203;
}
.style1 {font-weight: bold; font-size: 12px; }
-->
</style>

<BODY>
<table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"http://www.pousadaesmeralda.com.br/mail/images/mail_03.jpg\">
  <tr>
    <td><img src=\"http://www.pousadaesmeralda.com.br/mail/images/mail_01.jpg\" alt=\"Central de Reservas - Pousada Esmeralda\" width=\"488\" height=\"168\" border=\"0\" /></td>
  </tr>
  <tr>
    <td><table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"2\">
      <tr  >
        <td class=\"text\">Sr(a), $nome, obrigado por entrar em contato com a Central de Reservas do Hotel Pousada Esmeralda.</td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"text\"><span class=\"titulo\">Informações para confimar a reserva (valores e condições):</span></td>
      </tr>
      <tr  >
        <td class=\"text\">Valor diária:</td>
      </tr>
      <tr  >
        <td class=\"text\">Valor total:</td>
      </tr>
      <tr  >
        <td class=\"text\">Data do Depósito:;</td>
      </tr>
      <tr  >
        <td class=\"text\">Valor depósito:</td>
      </tr>
      <tr  >
        <td class=\"text\"><span class=\"titulo\">Outras informações:</span></td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"text\"><span class=\"texto_negrito\"><span class=\"titulo\">Informações para realização do depósito bancário:</span></span></td>
      </tr>
      <tr  >
        <td class=\"text\">Banco do Brasil</td>
      </tr>
      <tr  >
        <td class=\"text\">Agência: 1571-7</td>
      </tr>
      <tr  >
        <td class=\"text\">Conta Corrente: 11457- X</td>
      </tr>
      <tr  >
        <td class=\"text\">Favorecido: Hotel Pousada Esmeralda</td>
      </tr>
      <tr  >
        <td class=\"text\">CNPJ: 36.513.166/0001-59</td>
      </tr>
      <tr  >
        <td class=\"text\">A reserva só será confirmada mediante envio do comprovante de depósito via:</td>
      </tr>
      <tr  >
        <td class=\"text\">email: info@pousadaesmeralda.com.br ou FAX: (24)  3352 1769</td>
      </tr>
      <tr  >
        <td class=\"text\">Funcionamento: 8:00 às 22:00 hrs</td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"texto_negrito\"><span class=\"titulo\">Informações sobre a reserva</span>:</td>
      </tr>
      <tr  >
        <td class=\"text\">Nome: $nome</td>
      </tr>
      <tr  >
        <td class=\"text\">Email: $email</td>
      </tr>
      <tr   >
        <td class=\"text\">Telefone: $telefone</td>
      </tr>
      <tr   >
        <td class=\"text\">Cidade: $cidade - Estado: $estado - País: $pais</td>
      </tr>
      <tr   >
        <td class=\"text\">Data de Chegada: $datachegada</td>
      </tr>
      <tr   >
        <td class=\"text\">Data de Saída: $datapartida</td>
      </tr>
      <tr   >
        <td class=\"text\">Tipo de Acomodação: $acomodacao</td>
      </tr>
      <tr   >
        <td class=\"text\">Quantidade de Adultos: $adultos</td>
      </tr>
      <tr   >
        <td class=\"text\">Quantidade de Crianças: $criancas</td>
      </tr>
      <tr   >
        <td class=\"text\">Informações Adicionais: $infos</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class=\"titulo\">Observações:</td>
      </tr>
      <tr>
        <td class=\"text\">Caso haja alguma mudança nos dados fornecidos pelo formulário de reserva, favor entrar em contato com nossa Central de Reservas.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>

    </table></td>
  </tr>
  
  <tr>
    <td><img src=\"http://www.pousadaesmeralda.com.br/mail/images/mail_05.jpg\" alt=\"\" width=\"488\" height=\"88\" /></td>
  </tr>
</table>
</body></HTML>";
		
	}

	$remetente = "victor@saquabb.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"<" . $_POST["Nome"] . ">\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Hotel Pousada Esmeralda\n"; 
	$cabecalho .= "Content-Type: text/html; charset=iso-8859-1/n";
	$destinatario = "victor@saquabb.com.br";
	$assunto = "".$_POST["Nome"].", solicitou um pedido de reserva.";
	
	
	
	
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado!";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="4">
  <tr>
    <td width="57%" align="center" valign="top"  class="fundo_tabela2"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
      <tr>
        <td height="20" align="left" class="ProdutoNomeBranca"><strong class="ProdutoNomeBranca">&raquo;</strong> Indique este produto a um amigo!</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  class="fundo_tabela2" align="left" valign="top"><div id="conteudo_interno" class="left">
      <h2>
        <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
      </h2>
      <div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
          <label for="Nome" class="txt_novidades_data">Seu Nome:</label>
          <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
          <label for="Email" class="txt_novidades_data">Seu E-mail:</label>
          <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
          <label for="NomeAmigo" class="txt_novidades_data">Nome do seu Amigo:</label>
          <input name="DataChegada" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
          <label for="EmailAmigo" class="txt_novidades_data">E-mail do seu Amigo:</label>
          <input name="DataPartida" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
          <!-- Invisivel-->
          <div id="mail">
            <label for="titulo" class="txt_novidades_data">Titulo:</label>
            <input name="Cidade" type="text" class="textbox" tabindex="5" value="" size="37" maxlength="50" />
            <label for="foto" class="txt_novidades_data">foto:</label>
            <input name="foto" type="text" class="textbox" tabindex="5" value="" size="37" maxlength="50" />
            <label for="Criancas" class="txt_novidades_data">Mensagem:</label>
            <textarea name="Adultos" cols="37" rows="5" class="textbox" id="desc" tabindex="6"></textarea>
          </div>
          <!--  FIm Invisivel-->
          <label for="mensagem" class="txt_novidades_data">Mensagem para seu Amigo:</label>
          <textarea name="Infos" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
          <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
        </form>
      </div>
    </div></td>
  </tr>
</table>
</body>
</html>
