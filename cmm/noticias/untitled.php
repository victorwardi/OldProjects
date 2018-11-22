<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>:::: Exemplo de como tirar Cabeçalhos e Rodapés ::::::::::::::::::::::::::::::::::::::::::::</title>
<!--
Esse código abaixo CSS é responsável pela invisibilidade na impressão, isto é, tudo que estiver entre as tags" <DIV align="center" class=noprint id=idControls> e </DIV> " aparece na Page mas desaparece na Impressão, quando você clicar em Visualizar impressão entederá. Exemplo disso aqui são os Botões abaixo.
-->
<STYLE media=print>.noprint {
DISPLAY: none
}
</STYLE>
</head>
<body align="left" leftmargin="0" topmargin="0">
<!--
Abaixo segue um objeto que carrega as funções para executar os scripts, você deve fazer Download do ScriptX no site "http://www.meadroid.com/scriptx/sxdownload.asp", dentro do aquivo puxado "ScriptX.zip" existe outro arquivo chamado "smsx.cab" que deverá ser colocado em algum lugar do seu site para o cliente poder instalar, esse aquirvo contém outros arquivos de configuração do Tipo .inf e DLLs.
Você pode copiar tambem esse arquivo no mesmo site onde demonstro o exemplo no endereço: http://julianosc.f2g.net/arquivo/
Exemplo:
- copiar ScriptX.cab para seu site em /diretorio/ daí no objeto o codebase ficará assim:
- codebase="http://www.seudominio.com.br/diretorio/smsx.cab#Version=6,1,431,2"

No meu exemplo optei em criar um diretorio com o nome "arquivo" e copiei o smsx.cab para lá, se vocês optarem em colocar esse smsx.cab em um dominio fixo para todos os seus clintes, cuidado para nunca tirar o aquivo ou mudar de diretório, senão não mais funcionará para seus clientes, pelo menos para aqueles usuários que irão usar sua página ou programa pela primeira vez, mas aqueles que já instalaram não serão prejudicados, pq essa instalação é feita uma só vez.Procure sempre colocar em um diretório de seu cliente, para não acontecer isso, é o que recomendo.
-->
<object id="factory" viewastext style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
codebase="http://julianosc.f2g.net/arquivo/smsx.cab#Version=6,1,431,2">
</object>
<script defer>
function window.onload() {
//aqui você coloca ou tira o título, no caso abaixo está sem título
factory.printing.header = ""
//aqui você coloca ou tira o rodapé, no caso abaixo está sem rodapé
factory.printing.footer = ""
// define a margem esquerda
factory.printing.leftMargin = 0.75
// define a margem Superior
factory.printing.topMargin = 1.5
// define a margem direita
factory.printing.rightMargin = 0.75
// define a margem inferior
factory.printing.bottomMargin = 1.5
// define se será retrato ou paisagem: Retrato=true e Paisagem=false
factory.printing.portrait = true

// Ativa o controle dos botões
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
//Essa função JavaScript é responsável para chamar o comando de Visualização de Impressão do windows

function ieExecWB( intOLEcmd, intOLEparam ) {
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
if (!intOLEparam || intOLEparam < -1 || intOLEparam > 1 ) {
intOLEparam = 1;
}
WebBrowser1.ExecWB( intOLEcmd, intOLEparam );
WebBrowser1.outerHTML = "";
};

//Essa função imprime direto para a impressora, mas o script q chama ela deve ser colocado no final antes do </body>
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

//Essa função JavaScript é responsável para chamar o comando de Impressão do windows

function Imprimir() {
window.print();
}

//Essa função envia direto para impressora, mas tem que ter pelo menos o drive dela instalado, sempre envia para a impressora indicada como padrão.


//Essa função JavaScript é responsável para cancelar e fechar a Janela

function fechar_janela() {
window.close();
}
</SCRIPT>

<p class="body">
<DIV align="center" class=noprint id=idControls>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30" bgcolor="#C0C0C0">
<tr>
<td width="100%" align="center">
<INPUT onClick="Imprimir()" type=button value="Imprimir Recibo"><INPUT onClick="ieExecWB(7)" type=button value="Visualizar Impressão"><INPUT onClick="fechar_janela()" type=button value="Cancelar">
</td>
</tr>
</table></DIV>
<p>Caros Colegas</p>
<p>Para vocês entenderem melhor coloquei o código com diversos comentários,
basta clicar no botão lado direito do mouse e &quot;exibir código fonte&quot; copiar todo
o conteúdo para um editor web e começar a usar.</p>
<p>Esse ScriptX foi uma dica do Colega <b><font size="4">Roberto Stzutski </font>
</b>pertencente a comunidade do <a href="http://www.phpbrasil.com">
www.phpbrasil.com</a>, alterei algumas coisas e outras.</p>
<p>Quando comecei a procurar uma solução para esse problema, só recebi resposta
que não era possível ou que deveria entrar na configuração de cada impressora e
mudar, mas sei que nossos programas nunca deve mudar a configuração do Sistema
Operacional do Cliente, por isso não desisti e aí está o resultado, agora
compartinhado com outros companheiros.</p>
<p>Hospedei aqui nesse servidor gratis, e acaba sendo mais uma dica para meus colegas, o endereço de cadastro é o seguinte: <A HREF="http://www.f2g.net/free/">http://www.f2g.net/free/</A>, que por sinal é muito facil e ainda não tem propaganda.
<p>Espero que ajudem</p>
<p>Atenciosamente</p>
<p>Juliano</p>
<p><a href="mailto:jabsc@ibest.com.br">jabsc@ibest.com.br</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<script Language="Javascript">
printit();

//Pode-se daí chamar a função fechar_janela() sem que o cliente perceba
</script>
</body>

</html>