<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>:::: Exemplo de como tirar Cabe�alhos e Rodap�s ::::::::::::::::::::::::::::::::::::::::::::</title>
<!--
Esse c�digo abaixo CSS � respons�vel pela invisibilidade na impress�o, isto �, tudo que estiver entre as tags" <DIV align="center" class=noprint id=idControls> e </DIV> " aparece na Page mas desaparece na Impress�o, quando voc� clicar em Visualizar impress�o enteder�. Exemplo disso aqui s�o os Bot�es abaixo.
-->
<STYLE media=print>.noprint {
DISPLAY: none
}
</STYLE>
</head>
<body align="left" leftmargin="0" topmargin="0">
<!--
Abaixo segue um objeto que carrega as fun��es para executar os scripts, voc� deve fazer Download do ScriptX no site "http://www.meadroid.com/scriptx/sxdownload.asp", dentro do aquivo puxado "ScriptX.zip" existe outro arquivo chamado "smsx.cab" que dever� ser colocado em algum lugar do seu site para o cliente poder instalar, esse aquirvo cont�m outros arquivos de configura��o do Tipo .inf e DLLs.
Voc� pode copiar tambem esse arquivo no mesmo site onde demonstro o exemplo no endere�o: http://julianosc.f2g.net/arquivo/
Exemplo:
- copiar ScriptX.cab para seu site em /diretorio/ da� no objeto o codebase ficar� assim:
- codebase="http://www.seudominio.com.br/diretorio/smsx.cab#Version=6,1,431,2"

No meu exemplo optei em criar um diretorio com o nome "arquivo" e copiei o smsx.cab para l�, se voc�s optarem em colocar esse smsx.cab em um dominio fixo para todos os seus clintes, cuidado para nunca tirar o aquivo ou mudar de diret�rio, sen�o n�o mais funcionar� para seus clientes, pelo menos para aqueles usu�rios que ir�o usar sua p�gina ou programa pela primeira vez, mas aqueles que j� instalaram n�o ser�o prejudicados, pq essa instala��o � feita uma s� vez.Procure sempre colocar em um diret�rio de seu cliente, para n�o acontecer isso, � o que recomendo.
-->
<object id="factory" viewastext style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
codebase="http://julianosc.f2g.net/arquivo/smsx.cab#Version=6,1,431,2">
</object>
<script defer>
function window.onload() {
//aqui voc� coloca ou tira o t�tulo, no caso abaixo est� sem t�tulo
factory.printing.header = ""
//aqui voc� coloca ou tira o rodap�, no caso abaixo est� sem rodap�
factory.printing.footer = ""
// define a margem esquerda
factory.printing.leftMargin = 0.75
// define a margem Superior
factory.printing.topMargin = 1.5
// define a margem direita
factory.printing.rightMargin = 0.75
// define a margem inferior
factory.printing.bottomMargin = 1.5
// define se ser� retrato ou paisagem: Retrato=true e Paisagem=false
factory.printing.portrait = true

// Ativa o controle dos bot�es
var templateSupported = factory.printing.IsTemplateSupported();
var controls = idControls.all.tags("input");
for ( i = 0; i < controls.length; i++ ) {
controls[i].disabled = false;
if ( templateSupported && controls[i].className == "ie55" )
controls[i].style.display = "inline";
}
}
</script>
<script LANGUAGE="JavaScript">
//Essa fun��o JavaScript � respons�vel para chamar o comando de Visualiza��o de Impress�o do windows

function ieExecWB( intOLEcmd, intOLEparam ) {
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
if (!intOLEparam || intOLEparam < -1 || intOLEparam > 1 ) {
intOLEparam = 1;
}
WebBrowser1.ExecWB( intOLEcmd, intOLEparam );
WebBrowser1.outerHTML = "";
};

//Essa fun��o imprime direto para a impressora, mas o script q chama ela deve ser colocado no final antes do </body>
function printit(){
var NS = (navigator.appName == "Netscape");
var VERSION = parseInt(navigator.appVersion);

if (NS) {
window.print() ;
} else {
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = "";
}
}

//Essa fun��o JavaScript � respons�vel para chamar o comando de Impress�o do windows

function Imprimir() {
window.print();
}

//Essa fun��o envia direto para impressora, mas tem que ter pelo menos o drive dela instalado, sempre envia para a impressora indicada como padr�o.


//Essa fun��o JavaScript � respons�vel para cancelar e fechar a Janela

function fechar_janela() {
window.close();
}
</SCRIPT>

<p class="body">
<DIV align="center" class=noprint id=idControls>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30" bgcolor="#C0C0C0">
<tr>
<td width="100%" align="center">
<INPUT onClick="Imprimir()" type=button value="Imprimir Recibo"><INPUT onClick="ieExecWB(7)" type=button value="Visualizar Impress�o"><INPUT onClick="fechar_janela()" type=button value="Cancelar">
</td>
</tr>
</table></DIV>
<p>Caros Colegas</p>
<p>Para voc�s entenderem melhor coloquei o c�digo com diversos coment�rios,
basta clicar no bot�o lado direito do mouse e &quot;exibir c�digo fonte&quot; copiar todo
o conte�do para um editor web e come�ar a usar.</p>
<p>Esse ScriptX foi uma dica do Colega <b><font size="4">Roberto Stzutski </font>
</b>pertencente a comunidade do <a href="http://www.phpbrasil.com">
www.phpbrasil.com</a>, alterei algumas coisas e outras.</p>
<p>Quando comecei a procurar uma solu��o para esse problema, s� recebi resposta
que n�o era poss�vel ou que deveria entrar na configura��o de cada impressora e
mudar, mas sei que nossos programas nunca deve mudar a configura��o do Sistema
Operacional do Cliente, por isso n�o desisti e a� est� o resultado, agora
compartinhado com outros companheiros.</p>
<p>Hospedei aqui nesse servidor gratis, e acaba sendo mais uma dica para meus colegas, o endere�o de cadastro � o seguinte: <A HREF="http://www.f2g.net/free/">http://www.f2g.net/free/</A>, que por sinal � muito facil e ainda n�o tem propaganda.
<p>Espero que ajudem</p>
<p>Atenciosamente</p>
<p>Juliano</p>
<p><a href="mailto:jabsc@ibest.com.br">jabsc@ibest.com.br</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<script Language="Javascript">
printit();

//Pode-se da� chamar a fun��o fechar_janela() sem que o cliente perceba
</script>
</body>

</html>