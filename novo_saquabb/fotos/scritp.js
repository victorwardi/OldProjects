// JavaScript Document
function abre_pop (url, winname, width, height) {
	var trails = "width=" + width + ",height=" + height + ",toolbar=no,directories=no,status=yes,scrollbars=yes,resizable=no,menubar=no,location=no";
	newWindow = window.open(url,winname,trails);
	//old.close();
}

function abrir (url, name, params, Wwidth, Wheight) {
	Swidth = screen.width;
	Sheight = screen.height;

	Wleft = (Swidth / 2) - (Wwidth / 2) - 8;
	Wtop = (Sheight / 2) - (Wheight / 2) - 20;

	params = params+",left="+Wleft+",top="+Wtop+",width="+Wwidth+",height="+Wheight;

	ww=window.open(url, name, params);

	//return (ww);
}


function mudacor(name)
{document.all[name].style.backgroundColor="#FDA803";}
function normalcor(name)
{document.all[name].style.backgroundColor="#FFE2AB";}

function goDestaque(link){
	varww = open_center('link' + id,'comprafoto','scrollbars=no,statusbar=no,links=no,toolbars=no,location=no',620,560);
};