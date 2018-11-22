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
        $estado = "".$_POST["Estado"]."";
		$pais = "".$_POST["Pais"]."";
		$datachegada = "".$_POST["DataChegada"]."";
		$datapartida = "".$_POST["DataPartida"]."";
        $acomodacao = "".$_POST["Acomod"]."";
		$adultos = "".$_POST["Adultos"]."";
		$criancas = "".$_POST["Criancas"]."";
		$infos = "".$_POST["Infos"]."";
		$mensagem = "<html><head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" /><style type=\"text/css\">
</head>
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
	background-image: url(http://www.pousadaesmeralda.com.br/fundo_email.jpg);
}
.style1 {font-weight: bold; font-size: 12px; }
-->
</style>

<body>
<table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"http://www.pousadaesmeralda.com.br/mail/images/mail_03.jpg\">
  <tr>
    <td><img src=\"http://www.pousadaesmeralda.com.br/mail/images/mail_01.jpg\" alt=\"Central de Reservas - Hotel Pousada Esmeralda\"  border=\"0\" /></td>
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
        <td class=\"text\"><span class=\"titulo\">Informa&ccedil;&otilde;es para confimar a reserva (valores e condi&ccedil;&otilde;es):</span></td>
      </tr>
      <tr  >
        <td class=\"text\">Valor di&aacute;ria:</td>
      </tr>
      <tr  >
        <td class=\"text\">Valor total:</td>
      </tr>
      <tr  >
        <td class=\"text\">Data do Dep&oacute;sito: </td>
      </tr>
      <tr  >
        <td class=\"text\">Valor dep&oacute;sito: </td>
      </tr>
      <tr  >
        <td class=\"text\"><span class=\"titulo\">Outras informa&ccedil;&otilde;es:</span></td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"text\"><span class=\"texto_negrito\"><span class=\"titulo\">Informa&ccedil;&otilde;es para realiza&ccedil;&atilde;o do dep&oacute;sito banc&aacute;rio:</span></span></td>
      </tr>
      <tr  >
        <td class=\"text\">Banco do Brasil</td>
      </tr>
      <tr  >
        <td class=\"text\">Ag&ecirc;ncia: 1571-7</td>
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
        <td class=\"text\">A reserva s&oacute; ser&aacute; confirmada mediante envio do comprovante de dep&oacute;sito via:</td>
      </tr>
      <tr  >
        <td class=\"text\">email: info@pousadaesmeralda.com.br ou FAX: (24)  3352 1769</td>
      </tr>
      <tr  >
        <td class=\"text\">&nbsp;</td>
      </tr>
      <tr  >
        <td class=\"texto_negrito\"><span class=\"titulo\">Informa&ccedil;&otilde;es sobre a reserva</span>:</td>
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
        <td class=\"text\">Cidade: $cidade - Estado: $estado - Pa&iacute;s: $pais</td>
      </tr>
      <tr   >
        <td class=\"text\">Data de Chegada: $datachegada</td>
      </tr>
      <tr   >
        <td class=\"text\">Data de Sa&iacute;da: $datapartida</td>
      </tr>
      <tr   >
        <td class=\"text\">Tipo de Acomoda&ccedil;&atilde;o: $acomodacao</td>
      </tr>
      <tr   >
        <td class=\"text\">Quantidade de Adultos: $adultos</td>
      </tr>
      <tr   >
        <td class=\"text\">Quantidade de Crian&ccedil;as: $criancas</td>
      </tr>
      <tr   >
        <td class=\"text\">Informa&ccedil;&otilde;es Adicionais: $infos</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class=\"titulo\">Observa&ccedil;&otilde;es:</td>
      </tr>
      <tr>
        <td class=\"text\">Caso haja alguma mudan&ccedil;a nos dados fornecidos pelo formul&aacute;rio de reserva, favor entrar em contato com nossa Central de Reservas.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>

    </table></td>
  </tr>
  
  <tr>
    <td><img src=\"http://www.pousadaesmeralda.com.br/mail/images/mail_05.jpg\" alt=\"Hotel Pousada Esmeralda - (24) 3352-1769 - info@pousadaesmeralda.com.br\" border=\"0\" /></td>
  </tr>
</table>
</body></html>";
		
	}

	$remetente = "info@pousadaesmeralda.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"<" . $_POST["Nome"] . ">\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Hotel Pousada Esmeralda\n"; 
	$cabecalho .= "Content-Type: text/html; charset=iso-8859-1/n";
	$destinatario = "info@pousadaesmeralda.com.br";
	$assunto = "Solicitação de Reserva - Hotel Pousada Esmeralda";
	
	
	
	
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem n&atilde;o foi enviada.";
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
<style type="text/css">
<!--
.style5 {font-size: 11px;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}
.txt_verde {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {font-size: 10px}
body {
	background-color: #006600;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<table width="98%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="bakdark.jpg">
  <tr>
    <th align="center" scope="col"><table width="631" border="0" align="center" cellpadding="0" cellspacing="6">
      <tr>
        <th height="86" colspan="2" align="center" valign="middle" scope="col"><img src="logo.jpg" width="400" height="120" /></th>
      </tr>
      <tr>
        <td height="296" align="left" valign="top"><p><span class="txt_verde">Preencha o formul&aacute;rio abaixo corrretamente, para que possamos cadastrar sua reserva.</span></p>
            <p><span class="txt_verde">OBS: A reserva s&oacute; &eacute;  confirmada ap&oacute;s um   retorno nosso, que ser&aacute; feito assim que recebermos sua solicita&ccedil;&atilde;o. <br />
                    <br />
                Para maiores informa&ccedil;&otilde;es: <br />
                TEL: (24) 3352 1643 <br />
                FAX.: (24) 3352 1769 <br />
                (Das 8:00 horas &agrave;s   22:00 horas)<br />
          Email: <a href="mailto:info@pousadaesmeralda.com.br">info@pousadaesmeralda.com.br</a></span></p>
          <p><span class="txt_verde"><br /> 
            Aten&ccedil;&atilde;o - Observa&ccedil;&atilde;o importante:</span></p>
          <p><span class="txt_verde">Ao receber a resposta da solicita&ccedil;&atilde;o de reserva, favor habilitar o visualizador de imagens do seu programa de email, para que a mensagem seja exibida corretamente.</span></p>
          </td>
        <td width="210" rowspan="2" align="center" valign="top"><table width="210" border="4" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <th width="200" height="517" bgcolor="#FFFFFF" scope="col"><img src="reservas.jpg" alt="Reservas" width="200" height="515" border="0" /></th>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="403" align="left">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
          <table width="46%" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr>
              <td width="57%" align="left" valign="top"  class="fundo_tabela2"><div id="conteudo_interno" class="left">
                    <h1>
                      <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?></h1>
                    <div>
                      <table width="442" border="0" cellspacing="4" cellpadding="0">
                      <tr>
                        <td width="163" class="txt_verde">Nome:</td>
                        <td width="267"><input name="Nome" type="text" class="form_box" id="nome" size="40" maxlength="60" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Email:</td>
                        <td><input name="Email" type="text" class="form_box" id="email" size="40" maxlength="60" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Telefone:</td>
                        <td><input name="Telefone" type="text" value="Informe o DDD" class="form_box" id="telefone" size="25" maxlength="30" onfocus="if(this.value=='Informe o DDD')this.value='';" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Cidade:</td>
                        <td><input name="cidade" type="text" class="form_box" id="cidade" size="30" maxlength="50" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">UF:</td>
                        <td><input name="Estado" type="text" class="form_box" id="estado" size="5" maxlength="2" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Pa&iacute;s</td>
                        <td><input name="Pais" type="text" class="form_box" id="pais" value="Brasil" size="30" maxlength="30" onfocus="if(this.value=='Brasil')this.value='';"/></td>
                      </tr>
                      <tr>
                        <td><span class="txt_verde">
                          <label for="DataChegada">Data de Chegada:</label>
                        </span> <span class="style5">(Ex:11/11/05) </span></td>
                        <td><input name="DataChegada" type="text" class="form_box" id="chegada" size="20" maxlength="20" /></td>
                      </tr>
                      <tr>
                        <td><span class="txt_verde">
                          <label for="DataPartida">Data de Partida:</label>
                        </span><span class="style5">(Ex:11/11/05) </span></td>
                        <td><input name="DataPartida" type="text" class="form_box" id="partida" size="20" maxlength="20" /></td>
                      </tr>
                      
                      <tr>
                        <td><span class="txt_verde">Tipo de Acomoda&ccedil;&atilde;o</span></td>
                        <td><label for="Acomod">
                          <select name="Acomod" id="Acomod">
                            <option value="N&atilde;o Especificou">- Selecione -</option>
                            <option value="Chal&eacute; Master">Chal&eacute; Master</option>
                            <option value="Chal&eacute; Vip">Chal&eacute; Vip</option>
                            <option value="Chal&eacute; Vip Lua-de-Mel">Chal&eacute; Vip Lua-de-Mel</option>
                            <option value="Chal&eacute; Geminado c/ Lareiria">Chal&eacute; Geminado c/ Lareiria</option>
                            <option value="Chal&eacute; Geminado s/ Lareiria">Chal&eacute; Geminado s/ Lareiria</option>
                            <option value="Apartamento">Apartamento</option>
                          </select>
                        </label></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Quantidade Adultos:</td>
                        <td><input name="Adultos" type="text" class="form_box" id="adultos" size="5" maxlength="5" /></td>
                      </tr>
                      <tr>
                        <td class="txt_verde">Quantidade Crian&ccedil;as:</td>
                        <td><input name="Criancas" type="text" class="form_box" id="criancas" size="5" maxlength="5" /></td>
                      </tr>
                      
                      <tr>
                        <td><span class="txt_verde">
                          <label for="Infos">Informa&ccedil;&otilde;es Adicionais: </label>
                        </span><span class="style5"><br />
(Ex: Idades das crian&ccedil;as, camas separadas e etc.) </span></td>
                        <td><textarea name="Infos" cols="40" rows="4" class="form_box" id="informacao" ></textarea></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                          <label>
                          <input type="reset" name="Reset" id="button" value="Limpar Campos" />
                          </label></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                </div>
              </div></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table>
        <p>&nbsp;</p></th>
  </tr>
</table>
</body>
</html>
