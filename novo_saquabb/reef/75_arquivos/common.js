// image rollover script for the main navigation
function registerImageGif(imgName) {
	eval(imgName + "over = new Image()");
	eval(imgName + "over.src = \"75_arquivos/" + imgName + ".gif\"");
	eval(imgName + " = new Image()");
	eval(imgName + ".src = \"75_arquivos/" + imgName + ".gif\"");
}
function registerImageJpg(imgName) {
	eval(imgName + "over = new Image()");
	eval(imgName + "over.src = \"75_arquivos/" + imgName + ".jpg\"");
	eval(imgName + " = new Image()");
	eval(imgName + ".src = \"75_arquivos/" + imgName + ".jpg\"");
}

function on(imgID) {
	img = document.getElementById(imgID);
	img.src = eval(imgID + "over.src");
}

function off(imgID) {
	img = document.getElementById(imgID);
	img.src = eval(imgID + ".src");
}

//register main navigation rollovers
registerImageGif("home");
registerImageGif("products");
registerImageGif("team");
registerImageGif("missreef");
registerImageGif("news");
registerImageGif("dealers");
registerImageGif("company");
registerImageGif("bonus");
registerImageGif("contactus");


if(document.images) {
	search_button_on = new Image();
	search_button_on.src = "75_arquivos/search_button_over.gif";
	search_button_off = new Image();
	search_button_off.src = "75_arquivos/search_button.gif";
	
	right3darrow_on = new Image();
	right3darrow_on.src = "75_arquivos/right3darrow_over.gif";
	right3darrow_off = new Image();
	right3darrow_off.src = "75_arquivos/right3darrow.gif";

	contactarrow_on = new Image();
	contactarrow_on.src = "75_arquivos/contactarrow_over.gif";
	contactarrow_off = new Image();
	contactarrow_off.src = "75_arquivos/contactarrow.gif";
}

//General rollover function for most of the buttons
function ButtonFX(btn, t) {
	if (document.getElementById) {
	document.getElementById(btn).src = (t? eval(btn+"_on.src") : eval(btn+"_off.src"));
	}
}

//function to get objects in the DOM
function getobject(obj){
	if (document.getElementById)
		return document.getElementById(obj);
	else if (document.all)
		return document.all[obj];
}

function showHowToApply(actn) {
	howLayer = getobject("howtopopup");
	if(actn == "show") {
		howLayer.style.visibility = "visible";
		howLayer.style.display = "block";
	} 
	else if(actn == "hide") {
		howLayer.style.visibility = "hidden";
		howLayer.style.display = "none";
	}	
	
}

