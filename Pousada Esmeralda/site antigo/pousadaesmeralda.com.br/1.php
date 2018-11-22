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
<title>Hotel Pousada Esmeralda</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #FFFFFF;
	background-image: url();
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style4 {font-size: 10px; color: #FF9900; }
.txt_verde {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style5 {	font-size: 11px;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
-->
</script>
</head>

<body>
<table width="98%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="bakdark.jpg">
  <tr>
    <th align="center" scope="col"><table width="631" border="0" align="center" cellpadding="0" cellspacing="6">
      <tr>
        <th height="86" colspan="2" align="center" valign="middle" scope="col"><img src="logo.jpg" width="400" height="120" /></th>
      </tr>
      <tr>
        <td height="197" align="left" valign="top"><p>FORMUL&Aacute;RIO DE RESERVAS<br />
                <br />
                <span class="txt_verde">Preencha o formul&aacute;rio abaixo corrretamente, para que possamos cadastrar sua reserva.</span></p>
            <p><span class="txt_verde">OBS: A reserva s&oacute; &eacute;  confirmada ap&oacute;s um   retorno nosso, que ser&aacute; feito assim que recebermos sua solicita&ccedil;&atilde;o. <br />
                  <br />
              Para maiores informa&ccedil;&otilde;es: <br />
              TEL: (24) 3352 1643 <br />
              FAX.: (24) 3352 1769 <br />
              (Das 8:00 horas &agrave;s   22:00 horas)<br />
            Email: <a href="mailto:info@pousadaesmerlda.com.br">info@pousadaesmeralda.com.br</a></span></p>
            <p><br /><?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
                      </p></td>
        <td width="210" rowspan="2" align="center" valign="top"><table width="210" border="4" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <th width="200" height="517" bgcolor="#FFFFFF" scope="col"><img src="reservas.jpg" alt="Reservas" width="200" height="515" border="0" /></th>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="403" align="left"><form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="" id="form">
            <table width="353" border="0" cellspacing="0" cellpadding="1">
              <tr>
                <td>&nbsp;                  </td>
              </tr>
              <tr>
                <td></td>
              </tr>
              
              <tr>
                <td width="353"><div align="left" class="style2">
                    <table width="120" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="110"><div align="left" class="txt_verde"><label for="Nome">Nome:</label></div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left">
                    <table width="120" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="110"><div align="left"><span class="txt_verde"><label for="Email">Email:</label></span></div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left">
                    <table width="165" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="155"><div align="left"><span class="txt_verde"><label for="Telefone">Telefone:</label></span></div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left">
                    <table width="165" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="155"><div align="left"><span class="txt_verde"><label for="Cidade">Cidade:</label></span></div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="bottom"><div align="left">
                          <table width="165" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="155"><div align="left" class="txt_verde"><label for="Estado">Estado:</label> </div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th scope="col">&nbsp;</th>
                      <td valign="bottom"><div align="left">
                          <table width="165" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="155"><div align="left" class="txt_verde"><label for="Pais">Pa&iacute;s: </label></div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <td valign="bottom"><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td valign="bottom"><div align="left"></div></td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="bottom"><div align="left">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><div align="left"></div></td>
                              <td><div align="left"><span class="txt_verde"><label for="DataChegada"></label></span></div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th scope="col">&nbsp;</th>
                      <td valign="bottom"><div align="left">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="4"><div align="left"></div></td>
                              <td width="181"><div align="left"><span class="txt_verde"><label for="DataPartida"></label></span></div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <td valign="bottom"><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td valign="bottom"><div align="left"></div></td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><div align="left"></div></td>
                        <td class="txt_verde"><div align="left"><label for="Acomodacao">Tipo de Acomoda&ccedil;&atilde;o:</label></div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="48%" valign="bottom"><div align="left">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="4"><div align="left"></div></td>
                              <td width="184" align="left"><div align="left"><span class="txt_verde"><label for="Adultos">Quantidade de Adultos:</label></span> </div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th width="4%" scope="col">&nbsp;</th>
                      <td width="45%" valign="bottom"><div align="left">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="4"><div align="left"></div></td>
                              <td width="169" align="left"><div align="left" class="txt_verde"><label for="Criancas">Quantidade de Crian&ccedil;as: </label><span class="style5"> </span></div></td>
                            </tr>
                          </table>
                      </div></td>
                      <th width="3%" scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <td align="left" valign="bottom"><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td align="left" valign="middle"><div align="left"></div></td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="left">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="365" align="left">&nbsp;</td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td height="72" valign="bottom"><div align="left"></div></td>
              </tr>
              <tr>
                <td><div align="left">
                    <table width="300" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="158"><div align="left"> </div></td>
                        <td width="66"><div align="right">
                            <input name="input"  type="submit"  value="Enviar" />
                        </div></td>
                        <td width="76"><div align="right">
                           
                            <input name="reset" type="reset" value="Limpar Campos" />
                        </div></td>
                      </tr>
                    </table>
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
