
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function datahora()
{
                dia = new Date();
				  ano = dia.getYear();

				  mes = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")

				  dia_semana = new Array("Dom","Seg","Ter","Qua","Qui","Sex","Sáb"); 
				  'dia_semana = new Array("Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado");'

				document.writeln("&nbsp"+ "<font size='1' face=verdana color='#FFCC00'>" + "<B>" + dia_semana[dia.getDay()] + ", " + dia.getDate() + " de " +  mes[dia.getMonth()] + " de " + ano + "&nbsp");
}

function openPictureWindow_Fever(imageName,imageWidth,imageHeight,alt,posLeft,posTop) {
	newWindow = window.open("","newWindow","width="+imageWidth+",height="+imageHeight+",left="+posLeft+",top="+posTop);
	newWindow.document.open();
	newWindow.document.write('<html><title>'+alt+'</title><body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onBlur="self.close()">'); 
	newWindow.document.write('<img src='+imageName+' width='+imageWidth+' height='+imageHeight+' alt='+alt+'>'); 
	newWindow.document.write('</body></html>');
	newWindow.document.close();
	newWindow.focus();
}

function abrir_janela(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
  }
  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}
	
//Check the enquiry form is filled in correctly
function CheckForm () { 

	//Initialise variables
	var errorMsg = "";

	//Check for a first name
	if (document.form1.nome.value == ""){
		errorMsg += "\n\tNome \t- Preencha seu nome";	
	}
	
	//Check for a last name
	if (document.form1.assunto.value == ""){
		errorMsg += "\n\tAssunto \t- Preencha o campo assunto";
	}
	 	
	//Check for an e-mail address and that it is valid
	if ((document.form1.email.value == "") || (document.form1.email.value.length > 0 && (document.form1.email.value.indexOf("@",0) == - 1 || document.form1.email.value.indexOf(".",0) == - 1))) { 
		errorMsg += "\n\tE-mail \t- Preencha com um e-mail válido.";
	}
			
	//Check for an enquiry
	if (document.form1.mensagem.value == "") { 
 		errorMsg += "\n\tMensagem \t\t- Escreva sua mensagem";
	}
		
	//If there is aproblem with the form then display an error
	if (errorMsg != ""){
		msg = "______________________________________________________________\n\n";
		msg += "Sua mensagem não foi enviada.\n";
		msg += "Corrija o(s) problema(s) e clique em enviar novamente.\n";
		msg += "______________________________________________________________\n\n";
		msg += "Os seguintes campos precisam ser corrigidos: -\n";
		
		errorMsg += alert(msg + errorMsg + "\n\n");
		return false;
	}
	
	return true;
}

// tirar defeito do flash no IE

function objeto(nome,largura,altura){

document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"'+
' codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"'+
' width="'+largura+'" height="'+altura+'" id="'+nome+'" align="middle">');

document.write('<param name="allowScriptAccess" value="sameDomain" />');

document.write('<param name="movie" value="'+nome+'.swf" />');

document.write('<param name="quality" value="high" />');
            
document.write('<param name="menu" value="false" />');

document.write('<param name="wmode" value="transparent" />');

document.write('<embed src="'+nome+'.swf" quality="high" menu="false" wmode="transparent" '+
' width="'+largura+'" height="'+altura+'" name="'+nome+'" align="middle"'+
' allowScriptAccess="sameDomain" type="application/x-shockwave-flash"'+
' pluginspage="http://www.macromedia.com/go/getflashplayer" />');

document.write('</object>');

}

<!-- abrir galeria
function AbrirGaleria(id)
{
 window.open("festas/galerias/popup.php?id="+id,"","resizable=no,toolbar=no,status=0,menubar=no,scrollbars=no,width=700,height=480");
}

<!-- corrigir trasparencia do PNG no IE

function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
	{
	   var arVersion = navigator.appVersion.split("MSIE")
	   var version = parseFloat(arVersion[1])
	   if ((version >= 5.5) && (document.body.filters)) 
	   {
		  for(var i=0; i<document.images.length; i++)
		  {
			 var img = document.images[i]
			 var imgName = img.src.toUpperCase()
			 if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
			 {
				var imgID = (img.id) ? "id='" + img.id + "' " : ""
				var imgClass = (img.className) ? "class='" + img.className + "' " : ""
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
				var imgStyle = "display:inline-block;" + img.style.cssText 
				if (img.align == "left") imgStyle = "float:left;" + imgStyle
				if (img.align == "right") imgStyle = "float:right;" + imgStyle
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
				var strNewHTML = "<span " + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
				img.outerHTML = strNewHTML
				i = i-1
			 }
		  }
	   }    
	}
	window.attachEvent("onload", correctPNG);
//-->